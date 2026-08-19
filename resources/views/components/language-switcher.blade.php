@php
    $locales = config('localization.supported');
    $current = app()->getLocale();
@endphp

<div {{ $attributes->class(['flex items-center gap-1 rounded-full bg-white/10 p-0.5 text-xs font-semibold']) }} role="group" aria-label="{{ __('Language switcher') }}">
    @foreach ($locales as $code => $label)
        <a
            href="{{ route('locale.switch', $code) }}"
            aria-current="{{ $current === $code ? 'true' : 'false' }}"
            @class([
                'rounded-full px-2.5 py-1 uppercase transition-colors',
                'bg-white text-primary-dark' => $current === $code,
                'text-white/80 hover:text-white' => $current !== $code,
            ])
        >
            {{ $code }}
        </a>
    @endforeach
</div>
