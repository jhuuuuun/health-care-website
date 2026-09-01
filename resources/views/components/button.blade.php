@props([
    'type' => 'button'
])

<button
    type="{{ $type }}"
    class="btn btn-success"
>
    {{ $slot }}
</button>