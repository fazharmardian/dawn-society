@props(['msg', 'bg' => 'bg-green-500'])

<p class="mb-2 text-sm font-medium rounded-md text-white px-3 py-3 {{ $bg }}">
    {{ $msg }}
</p>