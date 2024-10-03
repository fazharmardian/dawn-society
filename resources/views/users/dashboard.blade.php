<x-layout>
    <h1 class="title mt-2">Welcome {{ auth()->user()->username }}
        you have {{ $posts->total() }} posts
    </h1>

    {{-- Create Post Form --}}
    <div class="card mb-4">
        <h2 class="font-bold mb-4">Create a new post</h2>

        @if (session('success'))
            <x-flashMsg msg="{{ session('success') }}" />
        @elseif (session('delete'))
            <x-flashMsg msg="{{ session('delete') }}" bg="bg-red-500" />
        @endif


        <form action="{{ route('posts.store') }}" method="post" enctype="multipart/form-data">
            @csrf

            {{-- Post Title --}}
            <div class="mb-5">
                <label for="title" class="block mb-2 text-sm font-medium text-black ">
                    Title</label>
                <input type="text" id="title" name="title"
                    class="shadow-sm bg-gray-900 border border-gray-800 text-black text-sm rounded-lg focus:ring-slate-500 focus:border-slate-500 block w-full p-2.5 dark:bg-white dark:placeholder-gray-400  dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light 
                    @error('title') border-red-500 @enderror"
                    placeholder="Your post title" value="{{ old('title') }}" />
                @error('title')
                    <p class="text-red-500 text-sm">{{ $message }}</p>
                @enderror
            </div>

            {{-- Post Body --}}
            <div class="mb-5">
                <label for="body" class="block mb-2 text-sm font-medium text-black ">
                    Content</label>
                <textarea name="body" id="body" rows="5"
                    class="shadow-sm bg-gray-900 border border-gray-800 text-black text-sm rounded-lg focus:ring-slate-500 focus:border-slate-500 block w-full p-2.5 dark:bg-white dark:placeholder-gray-400  dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light 
                    @error('body') border-red-500 @enderror"
                    placeholder="Your post content">{{ old('body') }}</textarea>
                @error('body')
                    <p class="text-red-500 text-sm">{{ $message }}</p>
                @enderror
            </div>

            {{-- Post image --}}
            <div class="mb-4">
                <label for="image">Cover photo</label>
                <input type="file" name="image" id="image">
                @error('image')
                    <p class="text-red-500 text-sm">{{ $message }}</p>
                @enderror
            </div>

            {{-- Create post --}}
            <button type="submit"
                class="bg-cyan-700 text-gray-200 shadow-sm hover:bg-cyan-600 focus:bg-cyan-600 
                focus:ring-4 focus:outline-none font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                Post
            </button>
        </form>
    </div>

    {{-- User Posts --}}
    <h2 class="font-bold mb-2">Your Latest Post</h2>

    <div class="grid grid-cols-2 gap-6">

        @foreach ($posts as $post)
            <x-flashCard :post="$post">

                <div class="flex mb-8">
                    {{-- Update post --}}
                    <a href="{{ route('posts.edit', $post) }}"
                        class="bg-yellow-500 text-white mx2 px-3 py-2 text-xs rounded-md">Update</a>
                    {{-- Delete post --}}
                    <form action="{{ route('posts.destroy', $post) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button class="bg-red-500 text-white text-xs mx-2 px-3 py-2 rounded-md">
                            Delete
                        </button>
                    </form>
                </div>

            </x-flashCard>
        @endforeach

    </div>

    <div>
        {{ $posts->links() }}
    </div>

</x-layout>
