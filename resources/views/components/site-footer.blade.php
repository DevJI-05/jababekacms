@php
    $footer = \App\Models\FooterSetting::current();
@endphp

<footer class="bg-primary text-white">
    <div class="mx-auto grid max-w-7xl grid-cols-1 gap-10 px-4 py-10 sm:grid-cols-2 lg:grid-cols-4">
        <div>
            <h3 class="mb-4 font-bold">{{ __('Quick Links') }}</h3>
            <ul class="space-y-2 text-sm">
                @foreach ($footer->quick_links ?? [] as $link)
                    <li>
                        <a href="{{ $link['url'] }}" class="flex items-center gap-1.5 text-white/85 hover:text-white hover:underline">
                            <svg class="size-3" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"><path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5" /></svg>
                            {{ $link['label'] }}
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>

        <div>
            <h3 class="mb-4 font-bold">{{ __('Keep Up to Date') }}</h3>
            <ul class="space-y-2 text-sm">
                @foreach ($footer->keep_up_to_date_links ?? [] as $link)
                    <li>
                        <a href="{{ $link['url'] }}" class="flex items-center gap-1.5 text-white/85 hover:text-white hover:underline">
                            <svg class="size-3" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"><path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5" /></svg>
                            {{ $link['label'] }}
                        </a>
                    </li>
                @endforeach
            </ul>
            <button type="button" class="mt-4 rounded border border-white/60 px-4 py-2 text-sm font-semibold hover:bg-white/10">
                {{ $footer->subscribe_label ?: __('Subscribe to eNews') }}
            </button>

            <h3 class="mb-3 mt-6 font-bold">{{ __('Follow Us') }}</h3>
            <div class="flex gap-2">
                @foreach ($footer->socialLinks() as $social)
                    <a href="{{ $social['url'] }}" aria-label="{{ ucfirst($social['network']) }}" class="flex size-8 items-center justify-center rounded-full bg-accent hover:bg-white hover:text-primary">
                        <svg class="size-4" viewBox="0 0 24 24" fill="currentColor"><circle cx="12" cy="12" r="10" /></svg>
                    </a>
                @endforeach
            </div>
        </div>

        <div>
            <h3 class="mb-4 font-bold">{{ __('Contact') }}</h3>
            <ul class="space-y-3 text-sm text-white/85">
                @if ($footer->phone)
                    <li class="flex items-center gap-2">
                        <svg class="size-4 shrink-0" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M2.25 6.75c0 8.284 6.716 15 15 15h1.5a2.25 2.25 0 0 0 2.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106a1.125 1.125 0 0 0-1.173.417l-.97 1.293a11.25 11.25 0 0 1-5.964-5.964l1.293-.97a1.125 1.125 0 0 0 .417-1.173L8.963 3.102a1.125 1.125 0 0 0-1.091-.852H6.5A2.25 2.25 0 0 0 2.25 4.5v2.25Z" /></svg>
                        {{ $footer->phone }}
                    </li>
                @endif
                @if ($footer->email)
                    <li class="flex items-center gap-2">
                        <svg class="size-4 shrink-0" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 0 1-2.25 2.25h-15a2.25 2.25 0 0 1-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25m19.5 0v.243a2.25 2.25 0 0 1-1.07 1.916l-7.5 4.615a2.25 2.25 0 0 1-2.36 0L3.32 8.91a2.25 2.25 0 0 1-1.07-1.916V6.75" /></svg>
                        {{ $footer->email }}
                    </li>
                @endif
                @if ($footer->address)
                    <li class="flex items-start gap-2">
                        <svg class="mt-0.5 size-4 shrink-0" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" /><path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1 1 15 0Z" /></svg>
                        {{ $footer->address }}
                    </li>
                @endif
            </ul>
        </div>

        <div class="relative overflow-hidden rounded bg-primary-dark p-5">
            <x-brand-logo variant="white" class="h-9 w-auto" />
            @if ($footer->acknowledgement_primary)
                <p class="mt-4 text-xs leading-relaxed text-white/90">
                    {{ $footer->acknowledgement_primary }}
                </p>
            @endif
            @if ($footer->acknowledgement_secondary)
                <p class="mt-3 text-xs leading-relaxed text-white/80">
                    {{ $footer->acknowledgement_secondary }}
                </p>
            @endif
        </div>
    </div>

    <div class="border-t border-white/10">
        <div class="mx-auto flex max-w-7xl flex-wrap items-center justify-center gap-x-2 gap-y-1 px-4 py-4 text-center text-xs text-white/70">
            @foreach ($footer->legal_links ?? [] as $link)
                <a href="{{ $link['url'] }}" class="hover:underline">{{ $link['label'] }}</a> |
            @endforeach
            <span>{{ $footer->copyright() }}</span>
        </div>
    </div>
</footer>

<button
    type="button"
    data-back-to-top
    class="fixed bottom-6 right-6 z-30 hidden size-11 items-center justify-center rounded-full bg-primary text-white shadow-lg hover:bg-accent"
    aria-label="{{ __('Back to top') }}"
>
    <svg class="size-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="m4.5 15.75 7.5-7.5 7.5 7.5" /></svg>
</button>

<div data-cookie-banner class="fixed inset-x-0 bottom-0 z-40 hidden border-t border-slate-200 bg-white px-4 py-3">
    <div class="mx-auto flex max-w-7xl flex-wrap items-center justify-between gap-4">
        <p class="text-xs text-slate-600">
            {{ __('We use cookies to improve your experience on our site and to analyse traffic. By continuing to browse or by clicking "Accept", you consent to the use of cookies.') }}
            {{ __('Learn more in our') }} <a href="#" class="underline">{{ __('Privacy Policy') }}</a>.
        </p>
        <button type="button" data-cookie-accept class="shrink-0 rounded bg-primary px-4 py-2 text-xs font-semibold text-white hover:bg-accent">
            {{ __('Accept') }}
        </button>
    </div>
</div>
