<?php

namespace App\Http\Controllers;

use App\Mail\WelcomeMail;
use App\Models\Post;
use App\Events\UserSubscribed;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller implements HasMiddleware
{
    public static function middleware(): array
    {
        return [
            new Middleware(['auth', 'verified'], except: ['index', 'show']),
        ];
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::latest()->paginate(9);

        return view('posts.index', ['posts' => $posts]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate
        $request->validate([
            'title' => ['required', 'max:255'],
            'body' => ['required'],
            'image' => ['nullable', 'file', 'max:3000', 'mimes:png,jpg,webp']
        ]);

        // Store images
        $path = null;
        
        if ($request->hasFile('image'))
        {
            $path = Storage::disk('public')->put('posts_image', $request->image);
        }
        
        // Create a Post
        $post = Auth::user()->posts()->create([
            'title' => $request->title,
            'body' => $request->body,
            'image' => $path
        ]);

        // Send email
        // Mail::to(Auth::user())->send(new WelcomeMail(Auth::user(), $post));

        // Redirect
        return back()->with('success','Your post was created succesfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        return view('posts.show', ['post'=> $post]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        // Authorize action
        Gate::authorize('modify', $post);

        return view ('posts.edit', ['post' => $post]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        // Authorize action
        Gate::authorize('modify', $post);

        // Validate
        $request->validate([
            'title' => ['required', 'max:255'],
            'body' => ['required'],
            'image' => ['nullable', 'file', 'max:3000', 'mimes:png,jpg,webp']
        ]);

        // Store images
        $path = $post->image ?? null;
        if ($request->hasFile('image')) {
            if ($post->image) {
                Storage::disk('public')->delete($post->image);
            }
            $path = Storage::disk('public')->put('posts_image', $request->image);
        }

        // Update a post
        $post->update([
            'title' => $request->title,
            'body' => $request->body,
            'image' => $path
        ]);

        // Redirect
        return redirect()->route('dashboard')->with('success','Your post was updated succesfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        // Authorize action
        Gate::authorize('modify', $post);

        // Delete post image
        if ($post->image) {
            Storage::disk('public')->delete($post->image);
        }

        // Delete a post
        $post->delete();

        // Redirect
        return back()->with('delete', 'Your post is deleted succesfully');
    }
}
