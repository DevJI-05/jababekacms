<x-layouts.app :title="$article->title.' - '.config('app.name')" active-nav="" :breadcrumbs="$breadcrumbs ?? []">
    <x-page-hero :title="$article->title" :image="$article->imageUrl()" />

    <section class="bg-white py-12">
        <div class="mx-auto max-w-3xl px-4">
            <div class="flex flex-wrap items-center gap-2 text-xs">
                <span class="rounded bg-surface px-2 py-1 font-semibold text-primary">{{ $article->category->name }}</span>
                @if ($article->event_date)
                    <span class="rounded bg-primary px-2 py-1 font-semibold text-white">{{ $article->event_date->format('d F Y, g:i A') }}</span>
                @else
                    <span class="text-slate-500">{{ $article->published_at?->format('d F Y') }}</span>
                @endif
            </div>

            @if ($article->excerpt)
                <p class="mt-4 text-lg text-slate-600">{{ $article->excerpt }}</p>
            @endif

            <x-rich-content :content="$article->body" class="mt-8" />

            @if ($article->tags->isNotEmpty())
                <div class="mt-8 flex flex-wrap gap-2 border-t border-slate-100 pt-6">
                    @foreach ($article->tags as $tag)
                        <span class="rounded-full border border-slate-200 px-3 py-1 text-xs font-semibold text-slate-600">#{{ $tag->name }}</span>
                    @endforeach
                </div>
            @endif
        </div>
    </section>

    @if ($recommended->isNotEmpty())
        <section class="border-t border-slate-100 bg-surface py-12">
            <div class="mx-auto max-w-5xl px-4">
                <h2 class="text-xl font-bold text-primary">
                    {{ $article->category->is_event ? __('More events you might like') : __('You might also like') }}
                </h2>

                <x-card-grid cols="3" class="mt-6">
                    @foreach ($recommended as $item)
                        @if ($article->category->is_event)
                            <x-event-card
                                :date="$item->event_date?->format('d F Y')"
                                :title="$item->title"
                                :description="$item->excerpt"
                                :image="$item->imageUrl()"
                                :href="route('articles.show', $item->slug)"
                            />
                        @else
                            <x-news-card
                                :date="$item->published_at?->format('d F Y')"
                                :title="$item->title"
                                :description="$item->excerpt"
                                :image="$item->imageUrl()"
                                :href="route('articles.show', $item->slug)"
                                layout="horizontal"
                            />
                        @endif
                    @endforeach
                </x-card-grid>
            </div>
        </section>
    @endif
</x-layouts.app>
