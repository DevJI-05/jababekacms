@props(['activeNav' => '', 'breadcrumbs' => []])

@php
    $menus = \App\Models\Menu::query()
        ->where('is_active', true)
        ->with(['subMenus' => fn ($query) => $query->where('is_active', true)])
        ->orderBy('sort_order')
        ->get();
@endphp

<div class="bg-white text-brand-text">
    <div class="mx-auto flex max-w-7xl items-center justify-end gap-2 px-4 py-1.5 text-xs sm:gap-4">
        <a href="#" class="hidden hover:underline sm:inline">{{ __('Skip to content') }}</a>
        <span class="hidden text-neutral sm:inline">|</span>
        <a href="#" class="hidden hover:underline sm:inline">{{ __('Accessibility') }}</a>
        <span class="hidden text-neutral sm:inline">|</span>
        <a href="#" class="hidden hover:underline sm:inline">{{ __('Connect with us') }}</a>
        <x-language-switcher class="sm:ml-2" />
        <button type="button" class="ml-2 flex items-center gap-1.5 rounded bg-primary px-2.5 py-1 font-semibold text-white sm:px-3">
            <svg class="size-3.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M14.857 17.082a23.848 23.848 0 0 0 5.454-1.31A8.967 8.967 0 0 1 18 9.75V9A6 6 0 0 0 6 9v.75a8.967 8.967 0 0 1-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 0 1-5.714 0m5.714 0a3 3 0 1 1-5.714 0" /></svg>
            <span class="hidden sm:inline">{{ __('Updates (:count)', ['count' => 1]) }}</span>
        </button>
    </div>
</div>

<header class="bg-white">
    <div class="mx-auto flex max-w-7xl items-center gap-4 px-4 py-3 md:gap-6 md:py-4">
        <a href="{{ route('home') }}" class="shrink-0 leading-tight">
            <x-brand-logo variant="color" class="h-8 w-auto object-contain object-left sm:h-10 md:h-12" />
        </a>

        <div class="ml-auto hidden flex-1 items-center justify-end gap-3 md:flex">
            <button type="button" class="flex items-center gap-2 rounded border border-primary/40 px-4 py-2 text-sm font-medium text-primary hover:bg-surface-mint">
                <svg class="size-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 21a9 9 0 1 0 0-18 9 9 0 0 0 0 18Zm0 0v-6m0 0V9m0 6H9m3 0h3" /></svg>
                {{ __('Report it 24/7') }}
            </button>
            <button type="button" class="flex items-center gap-2 rounded border border-primary/40 px-4 py-2 text-sm font-medium text-primary hover:bg-surface-mint">
                <svg class="size-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M2.25 6.75c0 8.284 6.716 15 15 15h1.5a2.25 2.25 0 0 0 2.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106a1.125 1.125 0 0 0-1.173.417l-.97 1.293a11.25 11.25 0 0 1-5.964-5.964l1.293-.97a1.125 1.125 0 0 0 .417-1.173L8.963 3.102a1.125 1.125 0 0 0-1.091-.852H6.5A2.25 2.25 0 0 0 2.25 4.5v2.25Z" /></svg>
                {{ __('Contact Us') }}
            </button>
            <form action="{{ route('search') }}" method="GET" class="relative hidden max-w-xs items-center md:flex">
                <input type="text" name="q" value="{{ request('q') }}" placeholder="{{ __('Search this website') }}" class="w-64 rounded border border-surface bg-white py-2 pl-3 pr-12 text-sm text-brand-text placeholder:text-neutral focus:outline-none focus:ring-2 focus:ring-accent">
                <button type="submit" class="absolute right-0 top-0 flex h-full items-center rounded-r bg-accent px-3 text-white hover:bg-accent-dark" aria-label="{{ __('Search') }}">
                    <svg class="size-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" /></svg>
                </button>
            </form>
        </div>

        <button
            type="button"
            data-mobile-menu-toggle
            aria-expanded="false"
            aria-controls="mobile-menu"
            class="ml-auto flex size-10 items-center justify-center rounded text-primary hover:bg-surface-mint md:hidden"
            aria-label="{{ __('Open menu') }}"
        >
            <svg data-mobile-menu-open-icon class="size-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" /></svg>
            <svg data-mobile-menu-close-icon class="hidden size-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" /></svg>
        </button>
    </div>
</header>

<nav class="relative hidden bg-white md:block" data-mega-nav>
    <div class="mx-auto max-w-7xl px-4">
        <ul class="flex items-center gap-8 text-sm font-semibold text-primary">
            @foreach ($menus as $menu)
                <li class="relative">
                    @if ($menu->subMenus->isNotEmpty())
                        <button
                            type="button"
                            data-mega-toggle="{{ $menu->slug }}"
                            aria-expanded="false"
                            class="flex items-center gap-1 border-b-2 py-4 {{ $activeNav === $menu->slug ? 'border-accent' : 'border-transparent hover:border-accent/50' }}"
                        >
                            {{ $menu->label() }}
                            <svg class="size-3.5 transition-transform" data-mega-chevron viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5" /></svg>
                        </button>
                    @else
                        <a href="{{ route('menu.show', $menu->slug) }}" class="flex items-center border-b-2 py-4 {{ $activeNav === $menu->slug ? 'border-accent' : 'border-transparent hover:border-accent/50' }}">
                            {{ $menu->label() }}
                        </a>
                    @endif
                </li>
            @endforeach
        </ul>
    </div>

    @foreach ($menus as $menu)
        @if ($menu->subMenus->isNotEmpty())
            <div data-mega-panel="{{ $menu->slug }}" class="absolute inset-x-0 top-full z-40 hidden border-t border-slate-200 bg-white shadow-xl">
                <x-mega-menu
                    :title="$menu->label()"
                    :description="$menu->description()"
                    :href="route('menu.show', $menu->slug)"
                    :categories="$menu->subMenus->map(fn ($subMenu) => [
                        'label' => $subMenu->label,
                        'href' => route('menu.section.show', [$menu->slug, $subMenu->slug]),
                        'icon' => $subMenu->icon,
                    ])->all()"
                />
            </div>
        @endif
    @endforeach
</nav>

<div id="mobile-menu" data-mobile-menu class="hidden border-b border-slate-200 bg-white md:hidden">
    <div class="max-h-[calc(100vh-4rem)] overflow-y-auto px-4 py-4">
        <form action="{{ route('search') }}" method="GET" class="relative flex items-center">
            <input type="text" name="q" value="{{ request('q') }}" placeholder="{{ __('Search this website') }}" class="w-full rounded border border-slate-200 bg-white py-2.5 pl-3 pr-11 text-sm text-slate-900 placeholder:text-slate-400 focus:outline-none focus:ring-2 focus:ring-accent">
            <button type="submit" class="absolute right-0 top-0 flex h-full items-center rounded-r px-3 text-slate-500" aria-label="{{ __('Search') }}">
                <svg class="size-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" /></svg>
            </button>
        </form>

        <div class="mt-4 flex flex-col gap-2">
            <button type="button" class="flex items-center gap-2 rounded border border-primary/30 px-4 py-2.5 text-sm font-medium text-primary hover:bg-surface">
                <svg class="size-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 21a9 9 0 1 0 0-18 9 9 0 0 0 0 18Zm0 0v-6m0 0V9m0 6H9m3 0h3" /></svg>
                {{ __('Report it 24/7') }}
            </button>
            <button type="button" class="flex items-center gap-2 rounded border border-primary/30 px-4 py-2.5 text-sm font-medium text-primary hover:bg-surface">
                <svg class="size-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M2.25 6.75c0 8.284 6.716 15 15 15h1.5a2.25 2.25 0 0 0 2.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106a1.125 1.125 0 0 0-1.173.417l-.97 1.293a11.25 11.25 0 0 1-5.964-5.964l1.293-.97a1.125 1.125 0 0 0 .417-1.173L8.963 3.102a1.125 1.125 0 0 0-1.091-.852H6.5A2.25 2.25 0 0 0 2.25 4.5v2.25Z" /></svg>
                {{ __('Contact Us') }}
            </button>
        </div>

        <ul class="mt-4 divide-y divide-slate-100 border-t border-slate-100 text-sm font-semibold text-primary">
            @foreach ($menus as $menu)
                <li>
                    @if ($menu->subMenus->isNotEmpty())
                        <button
                            type="button"
                            data-mobile-accordion-toggle
                            aria-expanded="false"
                            class="flex w-full items-center justify-between py-3"
                        >
                            {{ $menu->label() }}
                            <svg class="size-4 shrink-0 transition-transform" data-mobile-accordion-chevron viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5" /></svg>
                        </button>
                        <div data-mobile-accordion-panel class="hidden pb-3 pl-3">
                            <a href="{{ route('menu.show', $menu->slug) }}" class="block py-1.5 font-normal text-slate-600 hover:text-accent">{{ __('View all') }}</a>
                            @foreach ($menu->subMenus as $subMenu)
                                <a href="{{ route('menu.section.show', [$menu->slug, $subMenu->slug]) }}" class="block py-1.5 font-normal text-slate-600 hover:text-accent">{{ $subMenu->label }}</a>
                            @endforeach
                        </div>
                    @else
                        <a href="{{ route('menu.show', $menu->slug) }}" class="block py-3">{{ $menu->label() }}</a>
                    @endif
                </li>
            @endforeach
        </ul>
    </div>
</div>

@if (count($breadcrumbs) > 0)
    <div class="border-b border-slate-100 bg-white py-2 text-center text-xs text-slate-500">
        <div class="mx-auto max-w-7xl px-4">
            @foreach ($breadcrumbs as $label => $url)
                @if (! $loop->last)
                    <a href="{{ $url }}" class="hover:underline">{{ $label }}</a>
                    <span class="mx-1">&gt;</span>
                @else
                    <span>{{ $label }}</span>
                @endif
            @endforeach
        </div>
    </div>
@endif
