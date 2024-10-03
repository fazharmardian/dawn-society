<?php

namespace App\Http\Controllers;

use App\Events\UserSubscribed;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // Register User
    public function register(Request $request) {
        // Validate
        $field = $request->validate([
            'username' => ['required','max:255'],
            'email' => ['required','email', 'max:255', 'unique:users'],
            'password' => ['required','min:3', 'confirmed'],
        ]);

        // Register
        $user = User::create($field);
        
        // Login
        Auth::login($user);

        // Redirect
        return redirect()->route('dashboard');
    }

    // Verify email notice
    public function verifyNotice() {
        return view('auth.verify-email');
    }

    // Verify email handler
    public function verifyEmail(EmailVerificationRequest $request) {
        $request->fulfill();

        return redirect()->route('dashboard');
    }

    // Resend the Verification Email
    public function verifyHandler(Request $request) {
        $request->user()->sendEmailVerificationNotification();

        return back()->with('message', 'Verification link sent!');
    }

    // Login user
    public function login(Request $request) {
        // Validate
        $field = $request->validate([
            'email' => ['required','email', 'max:255'],
            'password' => ['required','min:3'],
        ]);

        // Try to Login
        if (Auth::attempt($field, $request->remember)) {
            return redirect()->intended('dashboard');
        } else {
            return back()->withErrors([
                'failed' => 'This provided credential do not match our record'
            ]);
        }
    }

    // Logout user
    public function logout(Request $request) {
        // Logout the user
        Auth::logout();

        // Invalidate user session
        $request->session()->invalidate();

        // Regenerate CSRF token
        $request->session()->regenerateToken();

        // Redirect to home
        return redirect('/');
    }
}
