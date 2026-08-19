@php
    $eventGradients = ['from-lime-100 via-emerald-50 to-lime-200', 'from-sky-100 via-slate-50 to-sky-200', 'from-amber-100 via-orange-50 to-amber-200'];
    $newsGradients = ['from-slate-300 via-slate-200 to-slate-400', 'from-orange-200 via-amber-100 to-orange-300', 'from-slate-200 via-slate-100 to-slate-300', 'from-emerald-200 via-lime-100 to-emerald-300'];
@endphp

<x-layouts.app :title="$title.' - '.config('app.name')" :active-nav="$activeNav ?? ''" :breadcrumbs="$breadcrumbs ?? []">
    <x-page-hero :title="$title" />

    <section class="bg-surface py-12">
        <div class="mx-auto max-w-7xl px-4">
            @if ($articles->isEmpty())
                <p class="py-12 text-center text-slate-600">{{ __('Nothing to show here yet — check back soon.') }}</p>
            @else
                <x-card-grid>
                    @foreach ($articles as $item)
                        @if ($category->is_event)
                            <x-event-card
                                :date="$item->event_date?->format('d F Y')"
                                :title="$item->title"
                                :description="$item->excerpt"
                                :image="$item->imageUrl()"
                                :gradient="$eventGradients[$loop->index % count($eventGradients)]"
                                :href="route('articles.show', $item->slug)"
                            />
                        @else
                            <x-news-card
                                :date="$item->published_at?->format('d F Y')"
                                :title="$item->title"
                                :description="$item->excerpt"
                                :image="$item->imageUrl()"
                                :gradient="$newsGradients[$loop->index % count($newsGradients)]"
                                :href="route('articles.show', $item->slug)"
                                layout="horizontal"
                            />
                        @endif
                    @endforeach
                </x-card-grid>

                <div class="mt-10">
                    {{ $articles->links() }}
                </div>
            @endif
        </div>
    </section>
</x-layouts.app>
