<x-layouts.app
    :title="__('Our Tenants').' - '.config('app.name')"
    :description="__('Explore anchor tenants and the 2,000+ companies operating across Kota Jababeka\'s industrial estates and business parks.')"
    active-nav=""
>
    <x-page-hero :title="__('Our Tenants')" />

    <section class="bg-surface py-12">
        <div class="mx-auto max-w-[90rem] px-4">
            @if ($anchorTenants->isNotEmpty())
                <div class="rounded-lg border border-slate-200 bg-white p-4 sm:p-6">
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

            <div class="mt-10">
                @if ($tenantTabs->isNotEmpty())
                    <div data-tabs>
                        <div class="flex flex-wrap gap-2">
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

                        <div class="mt-6">
                            @foreach ($tenantTabs as $key => $tab)
                                <div data-tab-panel="{{ $key }}" @class(['hidden' => ! $loop->first])>
                                    @forelse ($tab['groups'] as $category => $categoryTenants)
                                        <div class="mb-10">
                                            @if ($key === 'all')
                                                <h2 class="text-lg font-extrabold text-brand-text">{{ $category }}</h2>
                                            @endif
                                            <div class="mt-4 grid grid-cols-1 gap-x-8 gap-y-2 rounded-lg border border-slate-200 bg-white p-4 sm:grid-cols-2 sm:p-6 lg:grid-cols-3">
                                                @foreach ($categoryTenants as $tenant)
                                                    <a href="{{ $tenant->slug ? route('tenants.show', $tenant->slug) : '#' }}" class="text-sm text-text-muted hover:text-accent">{{ $tenant->name }}</a>
                                                @endforeach
                                            </div>
                                        </div>
                                    @empty
                                        <p class="py-12 text-center text-slate-600">{{ __('No tenants listed yet in this category.') }}</p>
                                    @endforelse
                                </div>
                            @endforeach
                        </div>
                    </div>
                @else
                    <p class="py-12 text-center text-slate-600">{{ __('No tenants listed yet — check back soon.') }}</p>
                @endif
            </div>
        </div>
    </section>
</x-layouts.app>
