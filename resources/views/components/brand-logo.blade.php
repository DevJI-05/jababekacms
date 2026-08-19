@props(['variant' => 'white', 'class' => 'h-10 w-auto'])

@php
    $sources = [
        'black' => asset('images/brand/logo-black.png'),
        'white' => asset('images/brand/logo-white.png'),
        'gold' => asset('images/brand/logo-gold.png'),
    ];
@endphp

<img
    src="{{ $sources[$variant] ?? $sources['white'] }}"
    alt="{{ config('app.name') }}"
    {{ $attributes->merge(['class' => $class]) }}
>
