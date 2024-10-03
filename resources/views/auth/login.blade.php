<x-layout>

    <div class="flex items-center justify-center py-5">
        <h2 class="text-4xl font-bold">Login</h2>
    </div>

    @if (session('status'))
        <x-flashMsg msg="{{ session('status') }}" />
    @endif
    
    <div class="max-h-screen-sm border flex shadow-black bg-white rounded-3xl mt-6 mx-64">

        <form action="{{ route('login') }}" method="post" class="max-w-sm w-full mx-auto py-6">
            @csrf

            <div class="mb-5">
                <label for="email" class="block mb-2 text-sm font-medium text-black ">Your
                    email</label>
                <input type="text" id="email" name="email"
                    class="shadow-sm bg-gray-900 border border-gray-800 text-black text-sm rounded-lg focus:ring-slate-500 focus:border-slate-500 block w-full p-2.5 dark:bg-white dark:placeholder-gray-400  dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light 
                    @error('email') border-red-500 @enderror"
                    placeholder="name@flowbite.com" value="{{ old('email') }}" />
                @error('email')
                    <p class="text-red-500 text-sm">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-5">
                <label for="password" class="block mb-2 text-sm font-medium text-black ">Your
                    password</label>
                <input type="password" id="password" name="password"
                    class="shadow-sm bg-gray-900 border border-gray-800 text-black text-sm rounded-lg focus:ring-slate-500 focus:border-slate-500 block w-full p-2.5 dark:bg-white dark:placeholder-gray-400  dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light 
                @error('password') border-red-500 @enderror"
                    placeholder="name@flowbite.com" />
                @error('password')
                    <p class="text-red-500 text-sm">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex h-5 mb-4 justify-between items-start">

                <div>
                    <input id="remember" type="checkbox" name="remember"
                        class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-blue-300" />
                    <label for="remember" class="ms-2 text-sm font-medium text-gray-900">
                        Remember me
                    </label>
                </div>

                <a class="text-blue-500 text-sm mt-1" href="{{ route('password.request') }}">Forgot your password ?</a>
            </div>

            @error('failed')
                <p class="text-red-500 text-sm mb-2">{{ $message }}</p>
            @enderror

            <button type="submit"
                class="bg-cyan-700 text-gray-200 shadow-sm hover:bg-cyan-600 focus:bg-cyan-600 focus:ring-4 focus:outline-none font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                Login</button>
        </form>

    </div>
</x-layout>
