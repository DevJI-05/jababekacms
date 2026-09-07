@php
    $icon = fn (string $path) => '<svg class="size-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75">'.$path.'</svg>';

    $quickActionTabs = [
        'business' => [
            'label' => __('For Business'),
            'items' => [
                ['label' => __('Explore Industrial Estates'), 'href' => route('menu.show', 'industrial-and-property'), 'icon' => $icon('<path stroke-linecap="round" stroke-linejoin="round" d="M3.75 21h16.5M4.5 3h15M5.25 3v18m13.5-18v18M9 6.75h1.5m-1.5 3h1.5m-1.5 3h1.5m3-6H15m-1.5 3H15m-1.5 3H15M9 21v-3.375c0-.621.504-1.125 1.125-1.125h3.75c.621 0 1.125.504 1.125 1.125V21" />')],
                ['label' => __('Investment Opportunities'), 'href' => route('menu.show', 'business-and-development'), 'icon' => $icon('<path stroke-linecap="round" stroke-linejoin="round" d="M12 6v12m-3-2.818.879.659c1.171.879 3.07.879 4.242 0 1.172-.879 1.172-2.303 0-3.182C13.536 12.219 12.768 12 12 12c-.725 0-1.45-.22-2.003-.659-1.106-.879-1.106-2.303 0-3.182s2.9-.879 4.006 0l.415.33M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />')],
                ['label' => __('Tenant Directory'), 'href' => route('menu.show', 'business-and-development'), 'icon' => $icon('<path stroke-linecap="round" stroke-linejoin="round" d="M20.25 14.15v4.25c0 1.094-.787 2.036-1.872 2.18-2.087.277-4.216.42-6.378.42s-4.291-.143-6.378-.42c-1.085-.144-1.872-1.086-1.872-2.18v-4.25m16.5 0a2.18 2.18 0 0 0 .75-1.661V8.706c0-1.081-.768-2.015-1.837-2.175a48.114 48.114 0 0 0-3.413-.387m4.5 8.006c-.194.165-.42.295-.673.38A23.978 23.978 0 0 1 12 15.75c-2.648 0-5.195-.429-7.577-1.22a2.16 2.16 0 0 1-.673-.38m0 0A2.18 2.18 0 0 1 3 12.489V8.706c0-1.081.768-2.015 1.837-2.175a48.111 48.111 0 0 1 3.413-.387m7.5 0V5.25A2.25 2.25 0 0 0 13.5 3h-3a2.25 2.25 0 0 0-2.25 2.25v.894m7.5 0a48.667 48.667 0 0 0-7.5 0" />')],
                ['label' => __('Property Listings'), 'href' => route('menu.show', 'industrial-and-property'), 'icon' => $icon('<path stroke-linecap="round" stroke-linejoin="round" d="M9 6.75V15m6-6v8.25m.503 3.498 4.875-2.437c.381-.19.622-.58.622-1.006V4.82c0-.836-.88-1.38-1.628-1.006l-3.869 1.934c-.317.159-.69.159-1.006 0L9.503 3.252a1.125 1.125 0 0 0-1.006 0L3.622 5.689C3.24 5.88 3 6.27 3 6.695V19.18c0 .836.88 1.38 1.628 1.006l3.869-1.934c.317-.159.69-.159 1.006 0l4.994 2.497c.317.158.69.158 1.006 0Z" />')],
                ['label' => __('Business Licensing & Permits'), 'href' => '#', 'icon' => $icon('<path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />')],
                ['label' => __('Careers at Jababeka'), 'href' => '#', 'icon' => $icon('<path stroke-linecap="round" stroke-linejoin="round" d="m11.42 15.17 2.496-3.03c.317-.384.74-.626 1.208-.766M11.42 15.17 2.995 21.75l3.163-3.163m5.262-3.417 3.417 3.417m-8.679-3.417 8.679 3.417m-8.679-3.417L2.995 21.75M18 8.25l-2.25-2.25L18 3.75l2.25 2.25L18 8.25Z" />')],
            ],
        ],
        'community' => [
            'label' => __('For Community'),
            'items' => [
                ['label' => __('City Life & Lifestyle'), 'href' => route('menu.show', 'city-life'), 'icon' => $icon('<path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12Z" />')],
                ['label' => __('Community Programs'), 'href' => route('menu.show', 'community'), 'icon' => $icon('<path stroke-linecap="round" stroke-linejoin="round" d="M18 18.72a9.094 9.094 0 0 0 3.741-.479 3 3 0 0 0-4.682-2.72m.94 3.198.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0 1 12 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 0 1 6 18.719m12 0a5.971 5.971 0 0 0-.941-3.197m0 0A5.995 5.995 0 0 0 12 12.75a5.995 5.995 0 0 0-5.058 2.772m0 0a3 3 0 0 0-4.681 2.72 8.986 8.986 0 0 0 3.74.477m.94-3.197a5.971 5.971 0 0 0-.94 3.197M15 6.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm6 3a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Zm-13.5 0a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Z" />')],
                ['label' => __('Facilities & Recreation'), 'href' => route('menu.show', 'city-life'), 'icon' => $icon('<path stroke-linecap="round" stroke-linejoin="round" d="M12 21v-8.25M15.75 21v-8.25M8.25 21v-8.25M3 9l9-6 9 6m-1.5 12V10.332A48.36 48.36 0 0 0 12 9.75c-2.551 0-5.056.2-7.5.582V21M3 21h18M12 6.75h.008v.008H12V6.75Z" />')],
                ['label' => __('Report an Issue'), 'href' => '#', 'icon' => $icon('<path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126ZM12 15.75h.007v.008H12v-.008Z" />')],
                ['label' => __('Visitor Information'), 'href' => '#', 'icon' => $icon('<path stroke-linecap="round" stroke-linejoin="round" d="m11.25 11.25.041-.02a.75.75 0 0 1 1.063.852l-.708 2.836a.75.75 0 0 0 1.063.853l.041-.021M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9-3.75h.008v.008H12V8.25Z" />')],
                ['label' => __('Subscribe to Updates'), 'href' => '#', 'icon' => $icon('<path stroke-linecap="round" stroke-linejoin="round" d="M7.217 10.907a2.25 2.25 0 1 0 0 2.186m0-2.186c.18.324.283.696.283 1.093s-.103.77-.283 1.093m0-2.186 9.566-5.314m-9.566 7.5 9.566 5.314m0 0a2.25 2.25 0 1 0 3.935 2.186 2.25 2.25 0 0 0-3.935-2.186Zm0-12.814a2.25 2.25 0 1 0 3.933-2.185 2.25 2.25 0 0 0-3.933 2.185Z" />')],
            ],
        ],
    ];

    $stats = [
        ['value' => '30+', 'label' => __('Years of Development'), 'icon' => '<path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 7.5v11.25m-18 0A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75m-18 0v-7.5A2.25 2.25 0 0 1 5.25 9h13.5A2.25 2.25 0 0 1 21 11.25v7.5" />'],
        ['value' => '2,000+', 'label' => __('Companies & Tenants'), 'icon' => '<path stroke-linecap="round" stroke-linejoin="round" d="M20.25 14.15v4.25c0 1.094-.787 2.036-1.872 2.18-2.087.277-4.216.42-6.378.42s-4.291-.143-6.378-.42c-1.085-.144-1.872-1.086-1.872-2.18v-4.25m16.5 0a2.18 2.18 0 0 0 .75-1.661V8.706c0-1.081-.768-2.015-1.837-2.175a48.114 48.114 0 0 0-3.413-.387m4.5 8.006c-.194.165-.42.295-.673.38A23.978 23.978 0 0 1 12 15.75c-2.648 0-5.195-.429-7.577-1.22a2.16 2.16 0 0 1-.673-.38m0 0A2.18 2.18 0 0 1 3 12.489V8.706c0-1.081.768-2.015 1.837-2.175a48.111 48.111 0 0 1 3.413-.387m7.5 0V5.25A2.25 2.25 0 0 0 13.5 3h-3a2.25 2.25 0 0 0-2.25 2.25v.894m7.5 0a48.667 48.667 0 0 0-7.5 0" />'],
        ['value' => '5,600+ Ha', 'label' => __('Total Development Area'), 'icon' => '<path stroke-linecap="round" stroke-linejoin="round" d="M9 6.75V15m6-6v8.25m.503 3.498 4.875-2.437c.381-.19.622-.58.622-1.006V4.82c0-.836-.88-1.38-1.628-1.006l-3.869 1.934c-.317.159-.69.159-1.006 0L9.503 3.252a1.125 1.125 0 0 0-1.006 0L3.622 5.689C3.24 5.88 3 6.27 3 6.695V19.18c0 .836.88 1.38 1.628 1.006l3.869-1.934c.317-.159.69-.159 1.006 0l4.994 2.497c.317.158.69.158 1.006 0Z" />'],
        ['value' => '8', 'label' => __('Industrial Estates & Business Parks'), 'icon' => '<path stroke-linecap="round" stroke-linejoin="round" d="M3.75 21h16.5M4.5 3h15M5.25 3v18m13.5-18v18M9 6.75h1.5m-1.5 3h1.5m-1.5 3h1.5m3-6H15m-1.5 3H15m-1.5 3H15M9 21v-3.375c0-.621.504-1.125 1.125-1.125h3.75c.621 0 1.125.504 1.125 1.125V21" />'],
        ['value' => '100,000+', 'label' => __('Working Population'), 'icon' => '<path stroke-linecap="round" stroke-linejoin="round" d="M18 18.72a9.094 9.094 0 0 0 3.741-.479 3 3 0 0 0-4.682-2.72m.94 3.198.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0 1 12 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 0 1 6 18.719m12 0a5.971 5.971 0 0 0-.941-3.197m0 0A5.995 5.995 0 0 0 12 12.75a5.995 5.995 0 0 0-5.058 2.772m0 0a3 3 0 0 0-4.681 2.72 8.986 8.986 0 0 0 3.74.477m.94-3.197a5.971 5.971 0 0 0-.94 3.197M15 6.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm6 3a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Zm-13.5 0a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Z" />'],
    ];

    $newsGradients = ['from-slate-300 via-slate-200 to-slate-400', 'from-primary/25 via-surface-mint to-primary/10', 'from-accent/25 via-surface-mint to-accent/10', 'from-slate-200 via-slate-100 to-slate-300'];

    $footer = \App\Models\FooterSetting::current();
@endphp

<x-layouts.app
    :title="config('app.name').' - Integrated Industrial Estate & Township'"
    :description="__('Kota Jababeka is Indonesia\'s first integrated industrial estate and township in Cikarang, home to 2,000+ tenants, industrial estates, education, and a growing Net Zero Industrial Ecosystem.')"
    active-nav=""
>
    {{-- 01. HERO — real hero slides from HeroSlide, autoplay driven by CarouselSetting --}}
    @if ($slides->isNotEmpty())
        <x-hero-carousel :slides="$slides" :autoplay="$carouselAutoplay" :interval="$carouselIntervalMs" />
    @endif

    <section class="bg-surface pb-12">
        <x-quick-actions :tabs="$quickActionTabs" />
    </section>

    <x-map-search />

    {{-- 02. ABOUT JABABEKA — excerpt & image pulled from the "About Kota Jababeka" content page --}}
    <section class="overflow-hidden bg-white pb-24">
        <div class="mx-auto max-w-[90rem] border-t border-surface px-4 pt-16">
            <div class="grid grid-cols-1 gap-10 lg:grid-cols-2 lg:items-center">
                <div>
                    <p class="text-xs font-bold uppercase tracking-widest text-accent">{{ __('About Jababeka') }}</p>
                    <h2 class="mt-2 text-2xl font-extrabold text-brand-text sm:text-3xl">{{ __('Building an Integrated City for a Better Future') }}</h2>

                    <div class="relative mt-6 h-56 w-full overflow-hidden rounded sm:h-64">
                        <div data-parallax data-parallax-speed="0.25" class="absolute inset-x-0 -top-12 -bottom-12">
                            @if ($aboutImage)
                                <img src="{{ $aboutImage }}" alt="" class="size-full object-cover">
                            @else
                                <x-dummy-placeholder label="About Image" class="size-full" />
                            @endif
                        </div>
                    </div>
                </div>

                <div>
                    <p class="text-sm leading-relaxed text-text-muted">
                        {{ $aboutExcerpt ?? __('Kota Jababeka is an integrated township designed to support businesses, communities, and a growing population. From industrial estates and commercial areas to residential, education, and lifestyle facilities, Jababeka continues to evolve as one of Indonesia\'s leading integrated cities.') }}
                    </p>

                    <a
                        href="{{ $aboutSubMenu ? route('menu.section.show', ['city-life', $aboutSubMenu->slug]) : route('menu.show', 'city-life') }}"
                        class="mt-6 inline-flex items-center gap-1.5 text-sm font-bold text-accent hover:text-accent-dark"
                    >
                        {{ __('Learn more about Jababeka') }} &rarr;
                    </a>
                </div>
            </div>

            <div class="mt-12 grid grid-cols-2 gap-4 sm:grid-cols-5">
                @foreach ($stats as $stat)
                    <div class="group flex items-center gap-3 rounded-xl border border-slate-200 bg-white p-4 shadow-sm transition-all hover:-translate-y-0.5 hover:border-primary/30 hover:shadow-lg">
                        <span class="flex size-12 shrink-0 items-center justify-center rounded-full bg-primary/10 text-primary transition-colors group-hover:bg-primary group-hover:text-white">
                            <svg class="size-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">{!! $stat['icon'] !!}</svg>
                        </span>
                        <div>
                            <p class="text-xl font-extrabold leading-tight text-primary">{{ $stat['value'] }}</p>
                            <p class="text-xs leading-snug text-text-muted">{{ $stat['label'] }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- 03. COMPANY HISTORY --}}
    <section class="bg-white pb-24">
        <div class="mx-auto max-w-[90rem] border-t border-surface px-4 pt-16">
            <h2 class="text-2xl font-extrabold text-brand-text sm:text-3xl">{{ __('From One Vision to a City Built for Tomorrow.') }}</h2>
            <p class="mt-2 text-sm text-text-muted">{{ __('Explore the milestones that shaped Jababeka — from 1989 to a growing Net Zero Industrial Ecosystem.') }}</p>

            @if ($historyEras->isNotEmpty())
                <div class="mt-10 flex flex-col gap-10">
                    @foreach ($historyEras as $era)
                        <div>
                            <div class="rounded-lg bg-surface-mint px-6 py-4">
                                @if ($era->year_range)
                                    <p class="text-xs font-bold uppercase tracking-widest text-primary">{{ $era->year_range }}</p>
                                @endif
                                <p class="text-lg font-extrabold uppercase tracking-wide text-brand-text">{{ $era->label() }}</p>
                            </div>

                            @if ($era->milestones->isNotEmpty())
                                <div class="mt-6 grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-4">
                                    @foreach ($era->milestones as $milestone)
                                        <div class="flex flex-col overflow-hidden rounded border border-slate-200">
                                            <div class="flex-1 p-4">
                                                <p class="text-xs font-bold text-primary">{{ $milestone->year }}</p>
                                                <p class="mt-1 text-sm font-bold text-brand-text">{{ $milestone->title() }}</p>
                                                <p class="mt-2 text-xs leading-relaxed text-text-muted">{{ $milestone->description() }}</p>
                                            </div>

                                            <div class="h-32 w-full">
                                                @php $primaryMedia = $milestone->primaryMedia(); @endphp
                                                @if ($primaryMedia && $primaryMedia['type'] === 'video')
                                                    <video src="{{ $primaryMedia['url'] }}" class="size-full object-cover" muted loop playsinline autoplay></video>
                                                @elseif ($primaryMedia)
                                                    <button
                                                        type="button"
                                                        class="group relative size-full cursor-zoom-in overflow-hidden"
                                                        data-milestone-trigger
                                                        data-image="{{ $primaryMedia['url'] }}"
                                                        data-year="{{ $milestone->year }}"
                                                        data-title="{{ $milestone->title() }}"
                                                        data-description="{{ $milestone->description() }}"
                                                    >
                                                        <img src="{{ $primaryMedia['thumbUrl'] }}" alt="{{ $milestone->title() }}" class="size-full object-cover transition duration-300 group-hover:scale-105" loading="lazy">
                                                        <span class="absolute inset-0 flex items-center justify-center bg-black/0 opacity-0 transition group-hover:bg-black/30 group-hover:opacity-100">
                                                            <svg class="size-6 text-white" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                                                                <path stroke-linecap="round" stroke-linejoin="round" d="M8 3.75H5.25a1.5 1.5 0 0 0-1.5 1.5V8m12-4.25h2.75a1.5 1.5 0 0 1 1.5 1.5V8m0 8v2.75a1.5 1.5 0 0 1-1.5 1.5H16m-8 0H5.25a1.5 1.5 0 0 1-1.5-1.5V16" />
                                                            </svg>
                                                        </span>
                                                    </button>
                                                @else
                                                    <x-dummy-placeholder :label="$milestone->year" class="size-full" />
                                                @endif
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            @endif
                        </div>
                    @endforeach
                </div>
            @else
                <div class="mt-10 flex h-64 items-center justify-center rounded border border-dashed border-slate-300 bg-surface-mint/40">
                    <p class="text-sm font-semibold text-text-muted">{{ __('Our content will be here') }}</p>
                </div>
            @endif
        </div>
    </section>

    {{-- History milestone lightbox --}}
    <div
        data-milestone-lightbox
        class="fixed inset-0 z-50 hidden items-center justify-center bg-black/90 p-4 sm:p-8"
        role="dialog"
        aria-modal="true"
        aria-label="{{ __('Milestone photo') }}"
    >
        <button
            type="button"
            data-milestone-lightbox-close
            class="absolute right-4 top-4 flex size-10 items-center justify-center rounded-full bg-white/10 text-white transition hover:bg-white/20 sm:right-6 sm:top-6"
            aria-label="{{ __('Close') }}"
        >
            <svg class="size-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
            </svg>
        </button>

        <div class="relative max-h-full w-full max-w-5xl overflow-hidden rounded-lg shadow-2xl">
            <img data-milestone-lightbox-image src="" alt="" class="max-h-[85vh] w-full object-contain bg-black">

            <div class="absolute inset-x-0 bottom-0 bg-gradient-to-t from-black/95 via-black/70 to-transparent px-5 pb-5 pt-16 sm:px-10 sm:pb-8 sm:pt-24">
                <p data-milestone-lightbox-year class="text-3xl font-extrabold tracking-tight text-primary sm:text-5xl"></p>
                <p data-milestone-lightbox-title class="mt-1 text-base font-bold text-white sm:text-xl"></p>
                <p data-milestone-lightbox-description class="mt-2 max-w-3xl text-sm leading-relaxed text-white/80 sm:text-base"></p>
            </div>
        </div>
    </div>

    {{-- 04. FUTURE DEVELOPMENT --}}
    @if ($futureDevelopments->isNotEmpty())
        <section class="bg-white pb-24">
            <div class="mx-auto max-w-[90rem] border-t border-surface px-4 pt-16">
                <div class="rounded-lg bg-surface-mint px-6 py-4">
                    <p class="text-lg font-extrabold uppercase tracking-wide text-brand-text">{{ __('Future Development') }}</p>
                </div>

                <div class="mt-6 flex flex-col gap-6">
                    @foreach ($futureDevelopments as $item)
                        <div class="flex flex-col gap-8 rounded border border-slate-200 p-6 lg:flex-row lg:items-center">
                            <div class="h-56 w-full shrink-0 overflow-hidden rounded lg:w-96">
                                @if ($item->imageUrl())
                                    <img src="{{ $item->imageUrl() }}" alt="{{ $item->title }}" class="size-full object-cover">
                                @else
                                    <x-dummy-placeholder label="Future Development" class="size-full" />
                                @endif
                            </div>

                            <div>
                                @if ($item->title)
                                    <h2 class="text-xl font-extrabold text-brand-text">{{ $item->title }}</h2>
                                @endif

                                <x-rich-content :content="$item->description" class="mt-3 text-sm" />
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    {{-- 05. OUR TENANTS --}}
    <section class="bg-white pb-24">
        <div class="mx-auto max-w-[90rem] border-t border-surface px-4 pt-16">
            <div class="text-center">
                <h2 class="text-2xl font-extrabold text-brand-text sm:text-3xl">{{ __('Our Tenants') }}</h2>
                <p class="mt-2 text-sm text-text-muted">{{ __('Trusted by leading companies') }}</p>
            </div>

            @if ($tenantTabs->isNotEmpty())
                <div class="mt-6" data-tabs>
                    <div class="flex flex-wrap justify-center gap-2">
                        @foreach ($tenantTabs as $key => $tab)
                            <button
                                type="button"
                                data-tab-trigger="{{ $key }}"
                                @class([
                                    'rounded px-4 py-1.5 text-sm font-semibold transition-colors',
                                    'bg-primary text-white shadow-sm' => $loop->first,
                                    'bg-white text-text-muted hover:bg-surface-mint hover:text-primary' => ! $loop->first,
                                ])
                            >
                                {{ $tab['label'] }}
                            </button>
                        @endforeach
                    </div>

                    @if ($anchorTenants->isNotEmpty())
                        <div class="mt-8 rounded-lg border border-slate-200 p-4 sm:p-6">
                            <p class="text-xs font-bold uppercase tracking-widest text-primary">{{ __('Anchor Tenants') }}</p>

                            <div class="mt-4 grid grid-cols-2 gap-4 sm:grid-cols-3 lg:grid-cols-6">
                                @foreach ($anchorTenants as $tenant)
                                    <a href="{{ $tenant->slug ? route('tenants.show', $tenant->slug) : '#' }}" class="flex h-20 items-center justify-center rounded border border-slate-200 bg-surface-mint px-4 transition-shadow hover:shadow-md">
                                        <img src="{{ $tenant->logoUrl() }}" alt="{{ $tenant->name }}" class="max-h-10 max-w-full object-contain" title="{{ $tenant->name }}">
                                    </a>
                                @endforeach
                            </div>
                        </div>
                    @endif

                    <div class="mt-8">
                        @foreach ($tenantTabs as $key => $tab)
                            <div data-tab-panel="{{ $key }}" @class(['hidden' => ! $loop->first])>
                                @if ($tab['items']->isNotEmpty())
                                    <div class="grid grid-cols-1 gap-x-8 gap-y-2 sm:grid-cols-2 lg:grid-cols-3">
                                        @foreach ($tab['items'] as $tenant)
                                            <a href="{{ $tenant->slug ? route('tenants.show', $tenant->slug) : '#' }}" class="text-sm text-text-muted hover:text-accent">{{ $tenant->name }}</a>
                                        @endforeach
                                    </div>
                                @else
                                    <p class="text-center text-sm text-text-muted">{{ __('No tenants listed yet in this category.') }}</p>
                                @endif
                            </div>
                        @endforeach
                    </div>
                </div>
            @elseif ($anchorTenants->isNotEmpty())
                <div class="mt-8 rounded-lg border border-slate-200 p-4 sm:p-6">
                    <p class="text-xs font-bold uppercase tracking-widest text-primary">{{ __('Anchor Tenants') }}</p>

                    <div class="mt-4 grid grid-cols-2 gap-4 sm:grid-cols-3 lg:grid-cols-6">
                        @foreach ($anchorTenants as $tenant)
                            <a href="{{ $tenant->slug ? route('tenants.show', $tenant->slug) : '#' }}" class="flex h-20 items-center justify-center rounded border border-slate-200 bg-surface-mint px-4 transition-shadow hover:shadow-md">
                                <img src="{{ $tenant->logoUrl() }}" alt="{{ $tenant->name }}" class="max-h-10 max-w-full object-contain" title="{{ $tenant->name }}">
                            </a>
                        @endforeach
                    </div>
                </div>
            @endif

            <div class="mt-8 text-center">
                <a href="{{ route('tenants.index') }}" class="inline-flex items-center gap-1.5 text-sm font-bold text-accent hover:text-accent-dark">
                    {{ __('Read More') }} &rarr;
                </a>
            </div>
        </div>
    </section>

    {{-- 08. NEWS & EVENTS — real Article data (events + news categories) --}}
    <section class="bg-white pb-24">
        <div class="mx-auto max-w-[90rem] border-t border-surface px-4 pt-16">
            <div class="text-center">
                <h2 class="text-2xl font-extrabold text-brand-text sm:text-3xl">{{ __("What's Happening in Jababeka") }}</h2>

                <div class="mt-4 inline-flex rounded border border-slate-200 bg-white p-1 text-sm font-semibold">
                    <span class="rounded bg-primary px-4 py-1.5 text-white">{{ __('All') }}</span>
                    <a href="{{ route('articles.news') }}" class="rounded px-4 py-1.5 text-text-muted hover:bg-surface-mint hover:text-brand-text">{{ __('News') }}</a>
                    <a href="{{ route('articles.events') }}" class="rounded px-4 py-1.5 text-text-muted hover:bg-surface-mint hover:text-brand-text">{{ __('Events') }}</a>
                </div>
            </div>

            @if ($highlights->isNotEmpty())
                <div class="mt-10 grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-4">
                    @foreach ($highlights as $index => $item)
                        <a href="{{ $item['href'] }}" class="group flex flex-col overflow-hidden rounded border border-slate-200 bg-white transition-shadow hover:shadow-md">
                            <div class="relative">
                                <div class="relative h-32 w-full overflow-hidden bg-gradient-to-br {{ $newsGradients[$index % count($newsGradients)] }}">
                                    @if ($item['image'])
                                        <img src="{{ $item['image'] }}" alt="" class="absolute inset-0 size-full object-cover">
                                    @endif
                                </div>
                                <span class="absolute left-3 top-3 rounded bg-primary px-2 py-1 text-[11px] font-bold text-white">{{ $item['badge'] }}</span>
                            </div>
                            <div class="flex flex-1 flex-col gap-2 p-4">
                                <span class="text-[11px] font-semibold text-accent">{{ $item['date'] }}</span>
                                <h3 class="flex-1 text-sm font-bold leading-snug text-brand-text group-hover:text-accent">{{ $item['title'] }}</h3>
                                <span class="text-xs font-bold uppercase tracking-wide text-accent group-hover:text-accent-dark">{{ $item['cta'] }} &rarr;</span>
                            </div>
                        </a>
                    @endforeach
                </div>
            @else
                <p class="mt-10 py-8 text-center text-text-muted">{{ __('No news or events published yet — check back soon.') }}</p>
            @endif

            <div class="mt-8 flex justify-center gap-6">
                <a href="{{ route('articles.events') }}" class="inline-flex items-center gap-1.5 text-sm font-bold text-accent hover:text-accent-dark">{{ __('View all events') }} &rarr;</a>
                <a href="{{ route('articles.news') }}" class="inline-flex items-center gap-1.5 text-sm font-bold text-accent hover:text-accent-dark">{{ __('View all news') }} &rarr;</a>
            </div>
        </div>
    </section>

    {{-- 09. CTA — contact details from FooterSetting --}}
    <section class="bg-olive pb-20">
        <div class="mx-auto flex max-w-[90rem] flex-col items-center gap-6 border-t border-primary-dark px-4 pt-14 text-center lg:flex-row lg:justify-between lg:text-left">
            <div>
                <h2 class="text-2xl font-extrabold text-white sm:text-3xl">{{ __('Ready to Explore Opportunities in Kota Jababeka?') }}</h2>
                <p class="mt-2 text-sm text-white/80">{{ __("Let's grow your business and build the future together.") }}</p>
            </div>

            <div class="flex shrink-0 flex-wrap justify-center gap-3">
                @if ($footer->email)
                    <a href="mailto:{{ $footer->email }}" class="rounded border border-white/70 px-5 py-3 text-sm font-bold text-white hover:bg-white/10">{{ __('Contact Us') }}</a>
                @endif
                <a href="{{ route('menu.show', 'business-and-development') }}" class="rounded bg-primary px-5 py-3 text-sm font-bold text-white hover:bg-primary-dark">{{ __('Explore Jababeka') }} &rarr;</a>
            </div>
        </div>
    </section>
</x-layouts.app>
