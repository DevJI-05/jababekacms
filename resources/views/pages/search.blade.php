@php
    /** @var \Illuminate\Support\Collection $results */
@endphp

<x-layouts.app :title="$title.' - '.config('app.name')">
    <section class="bg-surface py-10">
        <div class="mx-auto max-w-7xl px-4">
            <h1 class="text-2xl font-bold text-primary sm:text-3xl">{{ __('Search results') }}</h1>

            <form action="{{ route('search') }}" method="GET" class="relative mt-6 max-w-xl">
                <input
                    type="text"
                    name="q"
                    value="{{ $query }}"
                    placeholder="{{ __('Search this website') }}"
                    class="w-full rounded border border-slate-200 bg-white py-3 pl-4 pr-12 text-sm text-slate-900 placeholder:text-slate-400 focus:outline-none focus:ring-2 focus:ring-accent"
                >
                <button type="submit" class="absolute right-0 top-0 flex h-full items-center rounded-r px-4 text-slate-500" aria-label="{{ __('Search') }}">
                    <svg class="size-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" /></svg>
                </button>
            </form>

            @if ($query === '')
                <p class="mt-8 text-slate-600">{{ __('Enter a search term above to get started.') }}</p>
            @elseif ($results->isEmpty())
                <p class="mt-8 text-slate-600">{{ __('No results found for ":query".', ['query' => $query]) }}</p>
            @else
                <p class="mt-6 text-sm text-slate-500">
                    {{ trans_choice(':count result for ":query"|:count results for ":query"', $results->count(), ['count' => $results->count(), 'query' => $query]) }}
                </p>

                <x-card-grid class="mt-4">
                    @foreach ($results as $result)
                        <x-photo-card
                            :title="$result['title']"
                            :description="$result['description']"
                            :image="$result['image']"
                            :href="$result['href']"
                            :badge="$result['type']"
                        />
                    @endforeach
                </x-card-grid>
            @endif
        </div>
    </section>
</x-layouts.app>
