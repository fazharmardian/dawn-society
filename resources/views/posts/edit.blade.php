<x-layout>
    <a href="{{ route('dashboard') }}" class="block mb-2 mt-2 text-xs">&larr; Go back to dashboard</a>

    {{-- Create Post Form --}}
    <div class="card mb-4">
        <h2 class="font-bold mb-4">Edit a post</h2>

        @if (session('success'))
            <x-flashMsg msg="{{ session('success') }}" />
        @elseif (session('delete'))
            <x-flashMsg msg="{{ session('delete') }}" bg="bg-red-500" />
        @endif


        <form action="{{ route('posts.update', $post) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            {{-- Post Title --}}
            <div class="mb-5">
                <label for="title" class="block mb-2 text-sm font-medium text-black ">
                    Title</label>
                <input type="text" id="title" name="title"
                    class="shadow-sm bg-gray-900 border border-gray-800 text-black text-sm rounded-lg focus:ring-slate-500 focus:border-slate-500 block w-full p-2.5 dark:bg-white dark:placeholder-gray-400  dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light 
                    @error('title') border-red-500 @enderror"
                    placeholder="Your post title" value="{{ $post->title }}" />
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
                    placeholder="Your post content">{{ $post->body }}</textarea>
                @error('body')
                    <p class="text-red-500 text-sm">{{ $message }}</p>
                @enderror
            </div>

            {{-- Current Photo --}}
            @if ($post->image)
                <div class="h-72 rounded-lg w-1/4 object-cover overflow-hidden">
                    <label>Current cover photo</label>
                    <img src="{{ asset('storage/' . $post->image) }}" alt="">
                </div>
            @endif

            {{-- Post image --}}
            <div class="mb-4">
                <label for="image">Cover photo</label>
                <input type="file" name="image" id="image">
                @error('image')
                    <p class="text-red-500 text-sm">{{ $message }}</p>
                @enderror
            </div>

            <button type="submit"
                class="bg-cyan-700 text-gray-200 shadow-sm hover:bg-cyan-600 focus:bg-cyan-600 
                focus:ring-4 focus:outline-none font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                Update
            </button>
        </form>
    </div>

</x-layout>
