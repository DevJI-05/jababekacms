@props(['date', 'title', 'description' => null, 'href' => '#', 'image' => null, 'gradient' => 'from-amber-100 via-orange-50 to-amber-200', 'dark' => false, 'compact' => false])

@if ($compact)
    <a href="{{ $href }}" {{ $attributes->class(['group flex items-center gap-3 rounded border border-slate-200 bg-white p-3 transition-shadow hover:shadow-md']) }}>
        <div class="relative size-16 shrink-0 overflow-hidden rounded bg-gradient-to-br {{ $gradient }}">
            @if ($image)
                <img src="{{ $image }}" alt="" class="absolute inset-0 size-full object-cover">
            @endif
        </div>

        <div class="min-w-0 flex-1">
            <span class="inline-block rounded bg-primary px-2 py-0.5 text-[11px] font-semibold text-white">{{ $date }}</span>
            <h3 class="mt-1 truncate font-bold leading-snug text-primary group-hover:text-accent">{{ $title }}</h3>
        </div>

        <span class="flex size-8 shrink-0 items-center justify-center rounded bg-accent text-white transition-colors group-hover:bg-primary">
            <svg class="size-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M17.25 8.25 21 12m0 0-3.75 3.75M21 12H3" /></svg>
        </span>
    </a>
@else
    <a href="{{ $href }}" {{ $attributes->class(['group flex flex-col overflow-hidden rounded border border-slate-200 bg-white transition-shadow hover:shadow-md']) }}>
        <div class="relative h-36 shrink-0 overflow-hidden bg-gradient-to-br {{ $gradient }}">
            @if ($image)
                <img src="{{ $image }}" alt="" class="absolute inset-0 size-full object-cover">
            @endif
            <span class="absolute left-3 top-3 rounded bg-primary px-2 py-1 text-xs font-semibold text-white">{{ $date }}</span>
        </div>

        <div class="flex flex-1 flex-col gap-2 p-4">
            <div class="flex items-start gap-2">
                <svg class="mt-0.5 size-4 shrink-0 text-primary" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 7.5v11.25m-18 0A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75m-18 0v-7.5A2.25 2.25 0 0 1 5.25 9h13.5A2.25 2.25 0 0 1 21 11.25v7.5" /></svg>
                <h3 class="font-bold leading-snug text-primary group-hover:text-accent">{{ $title }}</h3>
            </div>
            @if ($description)
                <p class="flex-1 text-sm text-slate-600">{{ $description }}</p>
            @endif
            <span class="flex justify-end">
                <span @class([
                    'flex size-8 items-center justify-center rounded text-white transition-colors',
                    'bg-primary group-hover:bg-accent' => $dark,
                    'bg-accent group-hover:bg-primary' => ! $dark,
                ])>
                    <svg class="size-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M17.25 8.25 21 12m0 0-3.75 3.75M21 12H3" /></svg>
                </span>
            </span>
        </div>
    </a>
@endif
