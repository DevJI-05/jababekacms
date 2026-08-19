@props(['href' => '#'])

<a
    href="{{ $href }}"
    {{ $attributes->merge(['class' => 'block rounded border border-accent px-4 py-3 text-center text-sm font-semibold text-primary transition-colors hover:bg-surface']) }}
>
    {{ $slot }}
</a>
