<x-layout>
    
    <h1 class="title mt-2">{{ $user->username }}'s Posts &#9830; {{ $posts->total() }}</h1>

    <div class="grid grid-cols-2 gap-6">

        @foreach ($posts as $post)
            <x-flashCard :post="$post" />
        @endforeach

    </div>

    <div>
        {{ $posts->links() }}
    </div>

</x-layout>