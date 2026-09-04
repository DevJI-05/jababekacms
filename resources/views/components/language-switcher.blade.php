@php
    $locales = config('localization.supported');
    $current = app()->getLocale();
@endphp

<div {{ $attributes->class(['flex items-center gap-0.5 rounded-full border border-primary p-0.5 text-xs font-semibold']) }} role="group" aria-label="{{ __('Language switcher') }}">
    @foreach ($locales as $code => $label)
        <a
            href="{{ route('locale.switch', $code) }}"
            aria-current="{{ $current === $code ? 'true' : 'false' }}"
            @class([
                'rounded-full px-2.5 py-1 uppercase transition-colors',
                'bg-primary text-white' => $current === $code,
                'text-primary hover:bg-surface-mint' => $current !== $code,
            ])
        >
            {{ $code }}
        </a>
    @endforeach
</div>
