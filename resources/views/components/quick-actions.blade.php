@props(['tabs' => []])

<div class="relative z-20 mx-auto mt-6 max-w-4xl px-4 md:-mt-20" data-tabs>
    <div class="flex">
        @foreach ($tabs as $key => $tab)
            <button
                type="button"
                data-tab-trigger="{{ $key }}"
                @class([
                    'rounded-t-lg px-6 py-3 text-sm font-semibold transition-colors',
                    'bg-white text-primary' => $loop->first,
                    'bg-primary text-white hover:bg-primary-light' => ! $loop->first,
                ])
            >
                {{ $tab['label'] }}
            </button>
        @endforeach
    </div>

    <div class="rounded-b-lg rounded-tr-lg bg-white p-4 shadow-lg sm:p-6">
        @foreach ($tabs as $key => $tab)
            <div data-tab-panel="{{ $key }}" @class(['grid grid-cols-1 gap-x-6 gap-y-5 sm:grid-cols-2 md:grid-cols-3', 'hidden' => ! $loop->first])>
                @foreach ($tab['items'] as $item)
                    <a href="{{ $item['href'] ?? '#' }}" class="flex items-center gap-3 text-sm font-semibold text-primary hover:text-accent">
                        <span class="flex size-9 shrink-0 items-center justify-center rounded-full bg-surface text-accent">
                            {!! $item['icon'] !!}
                        </span>
                        {{ $item['label'] }}
                    </a>
                @endforeach
            </div>
        @endforeach
    </div>
</div>
