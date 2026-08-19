@php
    $icon = fn (string $path) => '<svg class="size-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75">'.$path.'</svg>';

    $quickActionTabs = [
        'do-it-online' => [
            'label' => __('Do it Online'),
            'items' => [
                ['label' => __('Report It 24/7'), 'href' => '#', 'icon' => $icon('<path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126ZM12 15.75h.007v.008H12v-.008Z" />')],
                ['label' => __('Make a Payment'), 'href' => '#', 'icon' => $icon('<path stroke-linecap="round" stroke-linejoin="round" d="M2.25 8.25h19.5M2.25 9h19.5m-16.5 9h6m-6 0a2.25 2.25 0 0 1-2.25-2.25V6.75A2.25 2.25 0 0 1 5.25 4.5h13.5A2.25 2.25 0 0 1 21 6.75v9a2.25 2.25 0 0 1-2.25 2.25h-6" />')],
                ['label' => __('Provide Feedback'), 'href' => '#', 'icon' => $icon('<path stroke-linecap="round" stroke-linejoin="round" d="M8.625 12a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm7.5 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm-3.75 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Z" /><path stroke-linecap="round" stroke-linejoin="round" d="M21 12c0 4.556-4.03 8.25-9 8.25a9.764 9.764 0 0 1-2.555-.337A5.972 5.972 0 0 1 5.41 20.97a5.969 5.969 0 0 1-.474-.065 4.48 4.48 0 0 0 .978-2.025c.09-.457-.133-.901-.467-1.226C3.93 16.178 3 14.189 3 12c0-4.556 4.03-8.25 9-8.25s9 3.694 9 8.25Z" />')],
                ['label' => __('Register Your Pet'), 'href' => '#', 'icon' => $icon('<circle cx="7" cy="7.5" r="1.6"/><circle cx="12" cy="5.2" r="1.6"/><circle cx="17" cy="7.5" r="1.6"/><path stroke-linecap="round" stroke-linejoin="round" d="M12 12.75c-2.9 0-5.25 1.85-5.25 4.2 0 1.4 1.2 2.05 2.5 1.5.85-.36 1.7-.55 2.75-.55s1.9.19 2.75.55c1.3.55 2.5-.1 2.5-1.5 0-2.35-2.35-4.2-5.25-4.2Z" />')],
                ['label' => __('Check Your Bin Day'), 'href' => '#', 'icon' => $icon('<path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 7.5v11.25m-18 0A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75m-18 0v-7.5A2.25 2.25 0 0 1 5.25 9h13.5A2.25 2.25 0 0 1 21 11.25v7.5" />')],
                ['label' => __('Sign Up to eNews'), 'href' => '#', 'icon' => $icon('<path stroke-linecap="round" stroke-linejoin="round" d="M7.217 10.907a2.25 2.25 0 1 0 0 2.186m0-2.186c.18.324.283.696.283 1.093s-.103.77-.283 1.093m0-2.186 9.566-5.314m-9.566 7.5 9.566 5.314m0 0a2.25 2.25 0 1 0 3.935 2.186 2.25 2.25 0 0 0-3.935-2.186Zm0-12.814a2.25 2.25 0 1 0 3.933-2.185 2.25 2.25 0 0 0-3.933 2.185Z" />')],
            ],
        ],
        'services' => [
            'label' => __('Services'),
            'items' => [
                ['label' => __('Apply for a Permit'), 'href' => '#', 'icon' => $icon('<path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />')],
                ['label' => __('Book a Facility'), 'href' => '#', 'icon' => $icon('<path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 7.5v11.25m-18 0A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75m-18 0v-7.5A2.25 2.25 0 0 1 5.25 9h13.5A2.25 2.25 0 0 1 21 11.25v7.5" />')],
                ['label' => __('View Rates Notice'), 'href' => route('menu.show', 'property-and-pets'), 'icon' => $icon('<path stroke-linecap="round" stroke-linejoin="round" d="M9 12h3.75M9 15h3.75M9 18h3.75M3.75 6.75h16.5M3.75 6.75v10.5A2.25 2.25 0 0 0 6 19.5h12a2.25 2.25 0 0 0 2.25-2.25V6.75m-16.5 0V4.5A2.25 2.25 0 0 1 6 2.25h12a2.25 2.25 0 0 1 2.25 2.25v2.25" />')],
                ['label' => __('Lodge a Complaint'), 'href' => '#', 'icon' => $icon('<path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126ZM12 15.75h.007v.008H12v-.008Z" />')],
                ['label' => __('Find a Job'), 'href' => '#', 'icon' => $icon('<path stroke-linecap="round" stroke-linejoin="round" d="m11.42 15.17 2.496-3.03c.317-.384.74-.626 1.208-.766M11.42 15.17 2.995 21.75l3.163-3.163m5.262-3.417 3.417 3.417m-8.679-3.417 8.679 3.417m-8.679-3.417L2.995 21.75M18 8.25l-2.25-2.25L18 3.75l2.25 2.25L18 8.25Z" />')],
                ['label' => __('Community Engagements'), 'href' => '#', 'icon' => $icon('<path stroke-linecap="round" stroke-linejoin="round" d="M18 18.72a9.094 9.094 0 0 0 3.741-.479 3 3 0 0 0-4.682-2.72m.94 3.198.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0 1 12 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 0 1 6 18.719m12 0a5.971 5.971 0 0 0-.941-3.197m0 0A5.995 5.995 0 0 0 12 12.75a5.995 5.995 0 0 0-5.058 2.772m0 0a3 3 0 0 0-4.681 2.72 8.986 8.986 0 0 0 3.74.477m.94-3.197a5.971 5.971 0 0 0-.94 3.197M15 6.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm6 3a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Zm-13.5 0a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Z" />')],
            ],
        ],
    ];

    $eventGradients = ['from-lime-100 via-emerald-50 to-lime-200', 'from-sky-100 via-slate-50 to-sky-200', 'from-amber-100 via-orange-50 to-amber-200'];
    $newsGradients = ['from-slate-300 via-slate-200 to-slate-400', 'from-orange-200 via-amber-100 to-orange-300', 'from-slate-200 via-slate-100 to-slate-300', 'from-emerald-200 via-lime-100 to-emerald-300'];

    $whatsOnTitle = __("What's on");
@endphp

<x-layouts.app :title="config('app.name')" active-nav="">
    @if ($slides->isNotEmpty())
        <x-hero-carousel :slides="$slides" :autoplay="$carouselAutoplay" :interval="$carouselIntervalMs" />
    @endif

    <section class="bg-surface pb-12">
        <x-quick-actions :tabs="$quickActionTabs" />
    </section>

    <x-map-search />

    <section class="bg-surface py-12">
        <div class="mx-auto max-w-7xl px-4">
            <x-section-heading :title="$whatsOnTitle" :view-all-href="route('articles.events')" :view-all-label="__('View all events')" />

            @if ($featuredEvent)
                <div class="mt-6 grid grid-cols-1 gap-6 lg:grid-cols-3">
                    <div class="lg:col-span-2">
                        <x-event-card
                            :date="$featuredEvent->event_date?->format('d F Y')"
                            :title="$featuredEvent->title"
                            :description="$featuredEvent->excerpt"
                            :image="$featuredEvent->imageUrl()"
                            :gradient="$eventGradients[0]"
                            :href="route('articles.show', $featuredEvent->slug)"
                            :dark="true"
                            class="h-full"
                        />
                    </div>

                    <div class="flex flex-col gap-4">
                        @foreach ($compactEvents as $index => $event)
                            <x-event-card
                                :date="$event->event_date?->format('d F Y')"
                                :title="$event->title"
                                :image="$event->imageUrl()"
                                :gradient="$eventGradients[($index + 1) % count($eventGradients)]"
                                :href="route('articles.show', $event->slug)"
                                :compact="true"
                            />
                        @endforeach
                    </div>
                </div>
            @else
                <p class="py-8 text-center text-slate-600">{{ __('No upcoming events right now — check back soon.') }}</p>
            @endif
        </div>
    </section>

    <section class="bg-white py-12">
        <div class="mx-auto max-w-7xl px-4">
            <x-section-heading :title="__('Our News')" :view-all-href="route('articles.news')" :view-all-label="__('View all news')" />

            @if ($news->isNotEmpty())
                <div class="mt-6 grid grid-cols-1 gap-6 md:grid-cols-2">
                    @foreach ($news as $index => $item)
                        <x-news-card
                            :date="$item->published_at?->format('d F Y')"
                            :title="$item->title"
                            :description="$item->excerpt"
                            :image="$item->imageUrl()"
                            :gradient="$newsGradients[$index % count($newsGradients)]"
                            :href="route('articles.show', $item->slug)"
                            layout="horizontal"
                        />
                    @endforeach
                </div>
            @else
                <p class="py-8 text-center text-slate-600">{{ __('No news articles published yet.') }}</p>
            @endif
        </div>
    </section>
</x-layouts.app>
