@props(['slides' => [], 'autoplay' => true, 'interval' => 6000])

<section
    class="relative isolate w-full overflow-hidden bg-primary"
    data-carousel
    data-carousel-autoplay="{{ $autoplay ? '1' : '0' }}"
    data-carousel-interval="{{ $interval }}"
>
    @foreach ($slides as $i => $slide)
        <div
            data-carousel-slide="{{ $i }}"
            @class(['relative flex h-dvh w-full items-center md:h-[70vh] md:min-h-[420px]', 'hidden' => $i !== 0])
        >
            <div class="absolute inset-0 bg-linear-to-br {{ $slide['gradient'] ?? 'from-slate-600 via-slate-500 to-slate-700' }}">
                @if (! empty($slide['image']))
                    <img src="{{ $slide['image'] }}" alt="" class="absolute inset-0 size-full object-cover">
                @endif
                <div class="absolute inset-0 bg-linear-to-t from-black/70 via-black/30 to-black/10"></div>
            </div>

            <div class="relative z-10 mx-auto w-full max-w-7xl px-6 sm:px-12">
                <div class="max-w-xl text-white">
                    <h1 class="text-2xl font-bold leading-tight drop-shadow-sm sm:text-4xl md:text-5xl lg:text-6xl">{{ $slide['title'] }}</h1>
                    <p class="mt-4 text-base text-white/90 sm:text-lg md:text-xl">{{ $slide['description'] }}</p>
                    @if (! empty($slide['cta']))
                        <a href="{{ $slide['href'] ?? '#' }}" class="mt-6 inline-block rounded bg-white px-5 py-2.5 text-sm font-semibold text-primary shadow-lg hover:bg-slate-100 sm:mt-8 sm:px-6 sm:py-3 md:text-base">
                            {{ $slide['cta'] }}
                        </a>
                    @endif
                </div>
            </div>
        </div>
    @endforeach

    <button
        type="button"
        data-carousel-prev
        class="absolute left-3 top-1/2 z-20 hidden size-10 -translate-y-1/2 items-center justify-center rounded-full bg-white/90 text-primary shadow hover:bg-white md:flex md:left-6 md:size-12"
        aria-label="{{ __('Previous slide') }}"
    >
        <svg class="size-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5 8.25 12l7.5-7.5" /></svg>
    </button>
    <button
        type="button"
        data-carousel-next
        class="absolute right-3 top-1/2 z-20 hidden size-10 -translate-y-1/2 items-center justify-center rounded-full bg-white/90 text-primary shadow hover:bg-white md:flex md:right-6 md:size-12"
        aria-label="{{ __('Next slide') }}"
    >
        <svg class="size-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5" /></svg>
    </button>

    <div class="absolute inset-x-0 bottom-14 z-20 flex items-center justify-center gap-3 md:bottom-16">
        <button type="button" data-carousel-toggle class="flex size-6 items-center justify-center rounded-full bg-white/20 text-white hover:bg-white/30" aria-label="{{ __('Pause carousel') }}">
            <svg data-carousel-pause-icon class="size-3" viewBox="0 0 24 24" fill="currentColor"><path d="M6.75 5.25a.75.75 0 0 1 .75-.75h1.5a.75.75 0 0 1 .75.75v13.5a.75.75 0 0 1-.75.75h-1.5a.75.75 0 0 1-.75-.75V5.25Zm7.5 0a.75.75 0 0 1 .75-.75h1.5a.75.75 0 0 1 .75.75v13.5a.75.75 0 0 1-.75.75h-1.5a.75.75 0 0 1-.75-.75V5.25Z" /></svg>
            <svg data-carousel-play-icon class="hidden size-3" viewBox="0 0 24 24" fill="currentColor"><path d="M8 5v14l11-7L8 5Z" /></svg>
        </button>

        @foreach ($slides as $i => $slide)
            <button
                type="button"
                data-carousel-dot="{{ $i }}"
                @class(['size-2.5 rounded-full transition-colors', 'bg-white' => $i === 0, 'bg-white/40 hover:bg-white/60' => $i !== 0])
                aria-label="{{ __('Go to slide :number', ['number' => $i + 1]) }}"
            ></button>
        @endforeach
    </div>
</section>
