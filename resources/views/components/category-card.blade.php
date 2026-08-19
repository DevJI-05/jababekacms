@props(['title', 'href' => '#', 'links' => []])

<div class="flex flex-col rounded border border-slate-200 bg-white">
    <div class="flex items-center gap-3 border-b border-slate-100 px-4 py-3.5">
        <span class="shrink-0 text-accent">{{ $icon ?? '' }}</span>
        <h3 class="font-bold text-primary">{{ $title }}</h3>
    </div>

    <ul class="flex-1 divide-y divide-slate-100">
        @foreach ($links as $link)
            <li>
                <a href="{{ $link['href'] ?? '#' }}" class="flex items-center gap-2 px-4 py-2.5 text-sm text-slate-700 hover:bg-slate-50 hover:text-primary">
                    <svg class="size-3 shrink-0 text-accent" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"><path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5" /></svg>
                    <span>{{ $link['label'] }}</span>
                </a>
            </li>
        @endforeach
    </ul>

    <div class="border-t-2 border-accent px-4 py-3">
        <a href="{{ $href }}" class="flex items-center gap-1.5 text-xs font-bold uppercase tracking-wide text-primary hover:text-accent">
            View all pages
            <svg class="size-3.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M17.25 8.25 21 12m0 0-3.75 3.75M21 12H3" /></svg>
        </a>
    </div>
</div>
