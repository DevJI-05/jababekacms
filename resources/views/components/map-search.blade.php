@props(['title' => null, 'placeholder' => null])

@php
    $title ??= __("Find What's Near You");
    $placeholder ??= __('Search this website');
@endphp

<section
    class="relative h-64 overflow-hidden bg-slate-300 md:h-72"
    style="background-image: repeating-linear-gradient(45deg, rgba(15,58,99,0.06) 0 2px, transparent 2px 40px), repeating-linear-gradient(-45deg, rgba(15,58,99,0.06) 0 2px, transparent 2px 40px);"
>
    <div class="absolute inset-0 bg-gradient-to-b from-slate-200/60 via-transparent to-slate-400/40"></div>

    <div class="absolute inset-0 flex items-center justify-center px-4">
        <div class="w-full max-w-xl rounded bg-primary/95 p-6 text-center text-white shadow-xl">
            <h2 class="flex items-center justify-center gap-2 text-lg font-bold">
                <svg class="size-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" /><path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1 1 15 0Z" /></svg>
                {{ $title }}
            </h2>
            <form class="relative mt-4">
                <input
                    type="text"
                    placeholder="{{ $placeholder }}"
                    class="w-full rounded bg-white py-2.5 pl-4 pr-12 text-sm text-slate-900 placeholder:text-slate-400 focus:outline-none focus:ring-2 focus:ring-accent"
                >
                <button type="submit" class="absolute right-0 top-0 flex h-full items-center rounded-r bg-accent px-4 text-white hover:bg-accent-dark" aria-label="{{ __('Search') }}">
                    <svg class="size-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" /></svg>
                </button>
            </form>
        </div>
    </div>
</section>
