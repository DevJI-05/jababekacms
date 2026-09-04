@props(['variant' => 'color', 'class' => 'h-2 w-auto'])

@php
    $sources = [
        'color' => asset('images/brand/logo2.png'),
        'black' => asset('images/brand/logo-black.png'),
        'white' => asset('images/brand/logo-white.png'),
        'white-council' => asset('images/brand/logo-white-council.png'),
        'gold' => asset('images/brand/logo-gold.png'),
    ];
@endphp

<img
    src="{{ $sources[$variant] ?? $sources['color'] }}"
    alt="{{ config('app.name') }}"
    {{ $attributes->merge(['class' => $class]) }}
>
