<x-layout>
    <h1 class="title mt-2">
        Latest Posts
    </h1>

    <div class="grid grid-cols-3 gap-6">

        @foreach ($posts as $post)
            <x-flashCard :post="$post" />
        @endforeach

    </div>                  

    <div>
        {{ $posts->links() }}
    </div>

</x-layout>
