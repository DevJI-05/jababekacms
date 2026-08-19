@props(['title', 'description', 'href' => '#', 'categories' => [], 'quickLinks' => []])

<div class="relative">
    <button
        type="button"
        data-mega-close
        class="absolute right-4 top-4 flex items-center gap-1 rounded border border-slate-200 p-1.5 text-xs text-slate-500 hover:bg-slate-50"
        aria-label="{{ __('Close menu') }}"
    >
        <svg class="size-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" /></svg>
    </button>

    <div class="mx-auto grid max-w-7xl grid-cols-1 gap-8 px-4 py-8 md:grid-cols-[minmax(0,1fr)_minmax(0,2fr)]">
        <div>
            <h2 class="text-xl font-bold text-primary">{{ $title }}</h2>
            <p class="mt-2 max-w-xs text-sm text-slate-600">{{ $description }}</p>
            <a href="{{ $href }}" class="mt-4 inline-block rounded border border-primary px-4 py-2 text-sm font-semibold text-primary hover:bg-primary hover:text-white">
                {{ __('Find out more') }}
            </a>
        </div>

        <div class="grid grid-cols-1 gap-x-10 gap-y-1 sm:grid-cols-2">
            @foreach ($categories as $category)
                <a href="{{ $category['href'] ?? '#' }}" class="flex items-center gap-3 rounded px-2 py-2.5 text-sm font-semibold text-primary hover:bg-slate-50">
                    <span class="shrink-0 text-accent">
                        @svg($category['icon'] ?? 'heroicon-o-link', 'size-5')
                    </span>
                    <span>{{ $category['label'] }}</span>
                </a>
            @endforeach
        </div>
    </div>

    @if (count($quickLinks) > 0)
        <div class="border-t border-slate-100 bg-surface px-4 py-4">
            <div class="mx-auto flex max-w-7xl flex-wrap items-center gap-3">
                <span class="text-sm font-semibold text-primary">{{ __('Quick links') }}</span>
                @foreach ($quickLinks as $link)
                    <x-pill-link :href="$link['href'] ?? '#'" class="!w-auto px-4 py-1.5 text-xs">
                        {{ $link['label'] }}
                    </x-pill-link>
                @endforeach
            </div>
        </div>
    @endif
</div>
