<x-layouts.app
    :title="$tenant->name.' - '.config('app.name')"
    :description="\Illuminate\Support\Str::limit(strip_tags($tenant->description ?? ''), 160) ?: __(':name is one of the tenants operating within Kota Jababeka\'s integrated industrial estate.', ['name' => $tenant->name])"
    :image="$tenant->logoUrl()"
    active-nav=""
>
    <x-page-hero :title="$tenant->name" />

    <section class="bg-white py-12">
        <div class="mx-auto max-w-3xl px-4">
            <div class="flex flex-wrap items-center gap-2 text-xs">
                @if ($tenant->category)
                    <span class="rounded bg-surface px-2 py-1 font-semibold text-primary">{{ $tenant->category }}</span>
                @endif
                @if ($tenant->is_anchor)
                    <span class="rounded bg-primary px-2 py-1 font-semibold text-white">{{ __('Anchor Tenant') }}</span>
                @endif
            </div>

            @if ($tenant->logoUrl())
                <div class="mt-6 flex h-24 w-48 items-center justify-center rounded border border-slate-200 bg-surface-mint px-4">
                    <img src="{{ $tenant->logoUrl() }}" alt="{{ $tenant->name }}" class="max-h-16 max-w-full object-contain">
                </div>
            @endif

            <x-rich-content :content="$tenant->description" class="mt-8" />

            @if ($tenant->address || $tenant->website)
                <div class="mt-8 grid grid-cols-1 gap-4 border-t border-slate-100 pt-6 sm:grid-cols-2">
                    @if ($tenant->address)
                        <div>
                            <p class="text-xs font-bold uppercase tracking-widest text-text-muted">{{ __('Address') }}</p>
                            <p class="mt-1 text-sm text-slate-700">{{ $tenant->address }}</p>
                        </div>
                    @endif

                    @if ($tenant->website)
                        <div>
                            <p class="text-xs font-bold uppercase tracking-widest text-text-muted">{{ __('Website') }}</p>
                            <a href="{{ $tenant->website }}" target="_blank" rel="noopener" class="mt-1 block text-sm text-accent hover:text-accent-dark">{{ $tenant->website }}</a>
                        </div>
                    @endif
                </div>
            @endif

            <div class="mt-8 border-t border-slate-100 pt-6">
                <a href="{{ route('tenants.index') }}" class="inline-flex items-center gap-1.5 text-sm font-bold text-accent hover:text-accent-dark">
                    &larr; {{ __('Back to all tenants') }}
                </a>
            </div>
        </div>
    </section>
</x-layouts.app>
