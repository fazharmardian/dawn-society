@props(['post', 'full' => false])

<div class="card h-4/5">
    <div class="flex gap-6">
        {{-- Cover Photo --}}
        <div class="h-auto w-1/5 rounded-md overflow-hidden self-start">
            @if ($post->image)
                <img src="{{ asset('storage/' . $post->image) }}" alt="">
            @else
                <img class="object-cover object-center rounded-md" src="{{ asset('storage/posts_image/default.png') }}"
                    alt="There No Image">
            @endif
        </div>

        <div class="w-4/5">
            {{-- Title --}}
            <h1 class="font-bold text-xl">{{ $post->title }}</h1>

            {{-- Author & Date --}}
            <div class="text-xs font-ligth">
                <span>Posted {{ $post->created_at->diffForHumans() }} by</span>
                <a href="{{ route('posts.user', $post->user) }}" class="text-blue-500 font-medium">
                    {{ $post->user->username }}
                </a>
            </div>

            {{-- Body --}}
            @if ($full)
                <div class="text-sm mt-2">
                    <span>{{ $post->body }}</span>
                </div>
            @else
                <div class="text-sm mt-2">
                    <span>{{ Str::words($post->body, 6) }}</span>
                    @if (Str::of($post->body)->wordCount() > 6)
                        <a href="{{ route('posts.show', $post) }}" class="text-blue-500 ml-2">Read more &rarr;</a>
                    @endif
                </div>
            @endif
        </div>
    </div>

    <div class="flex items-center justify-end gap-4 mt-6">
        {{ $slot }}
    </div>
</div>
