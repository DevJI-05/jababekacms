@props(['cols' => 3])

@php
    $colsClass = match ((int) $cols) {
        2 => 'sm:grid-cols-2',
        4 => 'sm:grid-cols-2 lg:grid-cols-4',
        default => 'sm:grid-cols-2 lg:grid-cols-3',
    };
@endphp

<div {{ $attributes->merge(['class' => "grid grid-cols-1 {$colsClass} gap-6"]) }}>
    {{ $slot }}
</div>
