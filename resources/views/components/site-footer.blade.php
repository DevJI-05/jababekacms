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
                        <svg class="size-4" viewBox="0 0 24 24" fill="currentColor">
                            @switch($social['network'])
                                @case('facebook')
                                    <path d="M22 12.06C22 6.5 17.52 2 12 2S2 6.5 2 12.06c0 5 3.66 9.16 8.44 9.94v-7.03H7.9v-2.91h2.54V9.85c0-2.5 1.49-3.89 3.77-3.89 1.09 0 2.24.2 2.24.2v2.46h-1.26c-1.24 0-1.63.77-1.63 1.56v1.88h2.78l-.44 2.91h-2.34V22c4.78-.78 8.44-4.94 8.44-9.94Z" />
                                    @break
                                @case('instagram')
                                    <path d="M12 2c-2.72 0-3.06.01-4.13.06-1.06.05-1.79.22-2.43.47a4.9 4.9 0 0 0-1.77 1.15 4.9 4.9 0 0 0-1.15 1.77c-.25.64-.42 1.37-.47 2.43C2.01 8.94 2 9.28 2 12s.01 3.06.06 4.13c.05 1.06.22 1.79.47 2.43a4.9 4.9 0 0 0 1.15 1.77 4.9 4.9 0 0 0 1.77 1.15c.64.25 1.37.42 2.43.47C8.94 21.99 9.28 22 12 22s3.06-.01 4.13-.06c1.06-.05 1.79-.22 2.43-.47a4.9 4.9 0 0 0 1.77-1.15 4.9 4.9 0 0 0 1.15-1.77c.25-.64.42-1.37.47-2.43.05-1.07.06-1.41.06-4.13s-.01-3.06-.06-4.13c-.05-1.06-.22-1.79-.47-2.43a4.9 4.9 0 0 0-1.15-1.77 4.9 4.9 0 0 0-1.77-1.15c-.64-.25-1.37-.42-2.43-.47C15.06 2.01 14.72 2 12 2Zm0 1.8c2.67 0 2.99.01 4.04.06.98.04 1.5.2 1.86.34.47.18.8.4 1.15.75.35.35.57.68.75 1.15.14.36.3.88.34 1.86.05 1.05.06 1.37.06 4.04s-.01 2.99-.06 4.04c-.04.98-.2 1.5-.34 1.86-.18.47-.4.8-.75 1.15-.35.35-.68.57-1.15.75-.36.14-.88.3-1.86.34-1.05.05-1.37.06-4.04.06s-2.99-.01-4.04-.06c-.98-.04-1.5-.2-1.86-.34a3.1 3.1 0 0 1-1.15-.75 3.1 3.1 0 0 1-.75-1.15c-.14-.36-.3-.88-.34-1.86-.05-1.05-.06-1.37-.06-4.04s.01-2.99.06-4.04c.04-.98.2-1.5.34-1.86.18-.47.4-.8.75-1.15.35-.35.68-.57 1.15-.75.36-.14.88-.3 1.86-.34 1.05-.05 1.37-.06 4.04-.06Zm0 3.05a5.15 5.15 0 1 0 0 10.3 5.15 5.15 0 0 0 0-10.3Zm0 8.5a3.35 3.35 0 1 1 0-6.7 3.35 3.35 0 0 1 0 6.7Zm5.36-8.7a1.2 1.2 0 1 1-2.4 0 1.2 1.2 0 0 1 2.4 0Z" />
                                    @break
                                @case('linkedin')
                                    <path d="M20.45 20.45h-3.56v-5.57c0-1.33-.02-3.04-1.85-3.04-1.86 0-2.14 1.45-2.14 2.94v5.67H9.34V9h3.41v1.56h.05c.48-.9 1.64-1.85 3.38-1.85 3.61 0 4.28 2.38 4.28 5.47v6.27ZM5.34 7.43a2.07 2.07 0 1 1 0-4.13 2.07 2.07 0 0 1 0 4.13ZM7.12 20.45H3.56V9h3.56v11.45Z" />
                                    @break
                                @case('youtube')
                                    <path d="M23.5 7.2s-.23-1.64-.94-2.36c-.9-.94-1.9-.95-2.36-1C17 3.5 12 3.5 12 3.5h-.01s-5 0-8.2.34c-.46.05-1.46.06-2.36 1C.63 5.56.4 7.2.4 7.2S.16 9.13.16 11.05v1.8c0 1.92.24 3.85.24 3.85s.23 1.64.94 2.36c.9.95 2.08.92 2.6 1.02C5.7 20.35 12 20.4 12 20.4s5.01-.01 8.2-.35c.46-.05 1.46-.06 2.36-1 .71-.72.94-2.36.94-2.36s.24-1.93.24-3.85v-1.8c0-1.92-.24-3.85-.24-3.85ZM9.68 15.14V8.66l6.2 3.25-6.2 3.23Z" />
                                    @break
                            @endswitch
                        </svg>
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

        <div>
            <x-brand-logo variant="white" class="h-20 w-56 object-cover object-center" />
            @if ($footer->acknowledgement())
                <p class="mt-4 text-xs leading-relaxed text-white/90">
                    {{ $footer->acknowledgement() }}
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
