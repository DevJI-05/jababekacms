@php
    /** @var \Illuminate\Contracts\Pagination\LengthAwarePaginator $results */
@endphp

<x-layouts.app :title="$title.' - '.config('app.name')">
    <x-page-hero :title="__('Search')" />

    <section class="bg-surface py-8">
        <div class="mx-auto max-w-7xl px-4">
            <div class="rounded border border-slate-200 bg-white p-4 sm:p-6">
                <form action="{{ route('search') }}" method="GET" class="flex flex-col gap-4 sm:flex-row sm:items-end">
                    <div class="flex-1">
                        <label for="search-q" class="mb-1 block text-sm font-semibold text-primary">{{ __('Search') }}</label>
                        <div class="flex items-center gap-2">
                            <input
                                id="search-q"
                                type="text"
                                name="q"
                                value="{{ $query }}"
                                placeholder="{{ __('Search this website') }}"
                                class="w-full rounded border border-slate-200 bg-white py-2.5 px-4 text-sm text-slate-900 placeholder:text-slate-400 focus:outline-none focus:ring-2 focus:ring-accent"
                            >
                            <button type="submit" class="flex shrink-0 items-center justify-center rounded border border-accent p-2.5 text-accent hover:bg-accent hover:text-white" aria-label="{{ __('Search') }}">
                                <svg class="size-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" /></svg>
                            </button>
                        </div>
                    </div>

                    <div class="sm:w-48">
                        <label for="search-type" class="mb-1 block text-sm font-semibold text-primary">{{ __('Page Type') }}</label>
                        <select
                            id="search-type"
                            name="type"
                            onchange="this.form.submit()"
                            class="w-full rounded border border-slate-200 bg-white py-2.5 px-3 text-sm text-slate-900 focus:outline-none focus:ring-2 focus:ring-accent"
                        >
                            @foreach ($pageTypes as $value => $label)
                                <option value="{{ $value }}" @selected($selectedType === $value)>{{ __($label) }}</option>
                            @endforeach
                        </select>
                    </div>
                </form>

                @if ($query !== '' && $selectedType !== 'all')
                    <a href="{{ route('search', ['q' => $query]) }}" class="mt-3 inline-block text-sm font-medium text-accent underline hover:text-accent-dark">
                        {{ __('Clear all filters') }}
                    </a>
                @endif
            </div>
        </div>
    </section>

    <section class="bg-surface pb-12">
        <div class="mx-auto max-w-7xl px-4">
            @if ($query === '')
                <p class="text-slate-600">{{ __('Enter a search term above to get started.') }}</p>
            @elseif ($results->total() === 0)
                <p class="text-slate-600">{{ __('No results found for ":query".', ['query' => $query]) }}</p>
            @else
                <p class="border-b border-slate-200 pb-4 text-sm text-slate-500">
                    {{ __('Showing :from-:to of :total results', ['from' => $results->firstItem(), 'to' => $results->lastItem(), 'total' => $results->total()]) }}
                </p>

                <div class="mt-2 divide-y divide-slate-200">
                    @foreach ($results as $result)
                        <div class="flex items-start gap-3 py-6">
                            <span class="mt-0.5 flex size-6 shrink-0 items-center justify-center rounded-full bg-primary text-white">
                                <svg class="size-3.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M11.25 4.5H6.75a1.5 1.5 0 0 0-1.5 1.5v13.5l6-3.375 6 3.375V6a1.5 1.5 0 0 0-1.5-1.5h-1.5" /></svg>
                            </span>
                            <div class="min-w-0">
                                <a href="{{ $result['href'] }}" class="text-lg font-bold text-primary hover:underline">{{ $result['title'] }}</a>
                                <p class="mt-0.5 text-xs font-semibold uppercase tracking-wide text-accent">{{ $result['type'] }}</p>
                                @if ($result['description'])
                                    <p class="mt-1.5 text-sm text-slate-600">{{ $result['description'] }}</p>
                                @endif
                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="mt-10">
                    {{ $results->links() }}
                </div>
            @endif
        </div>
    </section>
</x-layouts.app>
