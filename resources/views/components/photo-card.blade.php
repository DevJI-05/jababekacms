@props(['title', 'description' => null, 'href' => '#', 'image' => null, 'icon' => null, 'gradient' => 'from-slate-200 via-slate-100 to-slate-300', 'badge' => null])

<a href="{{ $href }}" class="group flex flex-col overflow-hidden rounded border border-slate-200 bg-white transition-shadow hover:shadow-md">
    <div class="relative h-40 shrink-0 overflow-hidden border-b-4 border-accent bg-gradient-to-br {{ $gradient }}">
        @if ($badge)
            <span class="absolute left-3 top-3 z-10 rounded bg-primary px-2 py-1 text-xs font-semibold text-white">{{ $badge }}</span>
        @endif

        @if ($image)
            <img src="{{ $image }}" alt="" class="absolute inset-0 size-full object-cover">
        @elseif ($icon)
            <div class="absolute inset-0 flex items-center justify-center text-primary/40">
                @svg($icon, 'size-10')
            </div>
        @else
            <div class="absolute inset-0 flex items-center justify-center text-primary/25">
                {{ $slot ?? '' }}
            </div>
        @endif
    </div>

    <div class="flex flex-1 flex-col gap-2 p-4">
        <h3 class="font-bold text-primary group-hover:text-accent">{{ $title }}</h3>
        @if ($description)
            <p class="flex-1 text-sm text-slate-600">{{ $description }}</p>
        @endif
        <span class="flex justify-end">
            <span class="flex size-8 items-center justify-center rounded bg-accent text-white transition-colors group-hover:bg-primary">
                <svg class="size-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M17.25 8.25 21 12m0 0-3.75 3.75M21 12H3" /></svg>
            </span>
        </span>
    </div>
</a>
