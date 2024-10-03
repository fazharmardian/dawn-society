<x-layout>
    <div class="flex items-center justify-center py-5">
        <h2 class="text-4xl font-bold">Register</h2>
    </div>
    <div class="max-h-screen-sm border flex shadow-black bg-white rounded-3xl mt-6 mx-64">

        <form action="{{ route('register') }}" method="post" class="max-w-sm w-full mx-auto py-6"
        x-data="formSubmit" @submit.prevent="submit">
            @csrf

            <div class="mb-5">
                <label for="username" class="block mb-2 text-sm font-medium text-black ">Your
                    username</label>
                <input type="text" id="username" name="username"
                    class="shadow-sm bg-gray-900 border border-gray-800 text-black text-sm rounded-lg focus:ring-slate-500 focus:border-slate-500 block w-full p-2.5 dark:bg-white dark:placeholder-gray-400  dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light 
                    @error('username') border-red-500 @enderror"
                    placeholder="name@flowbite.com" value="{{ old('username') }}"/>
                @error('username')
                    <p class="text-red-500 text-sm">{{ $message }}</p>
                @enderror
            </div>

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

            <div class="mb-5">
                <label for="password_confirmation" class="block mb-2 text-sm font-medium text-black ">Confirm
                    password</label>
                <input type="password" id="password_confirmation" name="password_confirmation"
                    class="shadow-sm bg-gray-900 border border-gray-800 text-black text-sm rounded-lg focus:ring-slate-500 focus:border-slate-500 block w-full p-2.5 dark:bg-white dark:placeholder-gray-400  dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light 
                    @error('password') border-red-500 @enderror"
                    placeholder="name@flowbite.com" />
            </div>

            <div class="flex items-center h-5 mb-4">
                <input id="subscribe" type="checkbox" name="subscribe"
                    class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-blue-300" />
                <label for="subscribe" class="ms-2 text-sm font-medium text-gray-900">
                    subscribe to our newsletter
                </label>
            </div>

            <button type="submit" x-ref="btn"
                class="bg-cyan-700 text-gray-200 shadow-sm hover:bg-cyan-600 focus:bg-cyan-600 focus:ring-4 focus:outline-none font-medium rounded-lg text-sm px-5 py-2.5 text-center">Register
                new account</button>
        </form>

    </div>
</x-layout>
