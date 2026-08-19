@props(['date', 'title', 'description', 'href' => '#', 'image' => null, 'gradient' => 'from-slate-300 via-slate-200 to-slate-400', 'layout' => 'vertical'])

@if ($layout === 'horizontal')
    <a href="{{ $href }}" class="group flex gap-4 rounded border border-slate-200 bg-white p-4 transition-shadow hover:shadow-md">
        <div class="relative h-28 w-28 shrink-0 overflow-hidden rounded bg-gradient-to-br {{ $gradient }} sm:h-32 sm:w-32">
            @if ($image)
                <img src="{{ $image }}" alt="" class="absolute inset-0 size-full object-cover">
            @endif
        </div>

        <div class="flex min-w-0 flex-1 flex-col gap-1.5">
            <span class="inline-block w-fit rounded bg-surface px-2 py-0.5 text-[11px] font-semibold text-primary">{{ $date }}</span>
            <h3 class="font-bold leading-snug text-primary group-hover:text-accent">{{ $title }}</h3>
            <p class="line-clamp-2 flex-1 text-sm text-slate-600">{{ $description }}</p>
            <span class="flex items-center gap-1 text-xs font-bold uppercase tracking-wide text-primary group-hover:text-accent">
                {{ __('Read more') }}
                <svg class="size-3.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M17.25 8.25 21 12m0 0-3.75 3.75M21 12H3" /></svg>
            </span>
        </div>
    </a>
@else
    <a href="{{ $href }}" class="group flex flex-col overflow-hidden rounded bg-primary transition-shadow hover:shadow-lg">
        <div class="relative h-36 shrink-0 overflow-hidden bg-gradient-to-br {{ $gradient }}">
            @if ($image)
                <img src="{{ $image }}" alt="" class="absolute inset-0 size-full object-cover">
            @endif
            <span class="absolute left-3 top-3 rounded bg-primary px-2 py-1 text-xs font-semibold text-white">{{ $date }}</span>
        </div>

        <div class="flex flex-1 flex-col gap-2 p-4">
            <h3 class="font-bold leading-snug text-white group-hover:text-accent-light">{{ $title }}</h3>
            <p class="flex-1 text-sm text-white/80">{{ $description }}</p>
            <span class="flex justify-end">
                <span class="flex size-8 items-center justify-center rounded bg-accent text-white transition-colors group-hover:bg-white group-hover:text-primary">
                    <svg class="size-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M17.25 8.25 21 12m0 0-3.75 3.75M21 12H3" /></svg>
                </span>
            </span>
        </div>
    </a>
@endif
