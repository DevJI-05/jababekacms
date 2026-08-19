@props(['title', 'viewAllHref' => null, 'viewAllLabel' => null])

@php
    $viewAllLabel ??= __('View all');
@endphp

<div class="flex items-center justify-between gap-4">
    <h2 class="text-xl font-bold text-primary sm:text-2xl">{{ $title }}</h2>

    @if ($viewAllHref)
        <a href="{{ $viewAllHref }}" class="flex shrink-0 items-center gap-1.5 text-xs font-bold uppercase tracking-wide text-primary hover:text-accent">
            {{ $viewAllLabel }}
            <svg class="size-3.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M17.25 8.25 21 12m0 0-3.75 3.75M21 12H3" /></svg>
        </a>
    @endif
</div>
