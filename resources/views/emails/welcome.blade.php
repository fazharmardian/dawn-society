<h1>Hi!, {{ $user->username }}</h1>

<div>
    <h2>You Posted {{ $post->title }}</h2>
    <p>{{ $post->body }}</p>

    <img src="{{ $message->embed('storage/' . $post->image) }}" alt="">
</div>