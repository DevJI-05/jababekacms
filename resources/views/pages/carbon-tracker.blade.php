@php
    $breakdown = [
        ['label' => __('Grid Electricity'), 'value' => 0.17, 'percent' => 21],
        ['label' => __('Diesel/Fuel'), 'value' => 0.54, 'percent' => 67],
        ['label' => __('Waste'), 'value' => 0.1, 'percent' => 12],
    ];
@endphp

<x-layouts.app :title="__('Carbon and Impact Tracker') . ' - ' . config('app.name')">
    <section class="mx-auto max-w-3xl px-4 py-16 text-center">
        <h1 class="text-2xl font-bold text-accent sm:text-3xl">{{ __('Carbon and Impact Tracker') }}</h1>
        <p class="mt-6 text-brand-text">
            {{ __('Measure your operational carbon footprint and monitor the environmental impact of your industrial estate through transparent, data-driven insights.') }}
        </p>
        <p class="mt-6 text-brand-text">
            {{ __('Carbon & Impact Tracker helps you understand where emissions come from, track environmental performance, and identify opportunities to build a more efficient and sustainable industrial ecosystem.') }}
        </p>
    </section>

    <section class="mx-auto max-w-5xl px-4 pb-16">
        <div class="grid grid-cols-1 gap-6 sm:grid-cols-2">
            {{-- Estimate form --}}
            <div class="rounded-lg bg-accent p-6 text-white">
                <h2 class="text-lg font-bold">{{ __('Estimate your monthly emissions') }}</h2>
                <p class="mt-1 text-sm text-white/80">
                    {{ __("Enter your facility's monthly consumption data. Results use Indonesia-specific emission factors per the GHG Protocol.") }}
                </p>

                <div class="mt-6 space-y-4">
                    <div>
                        <label class="mb-1 block text-sm">{{ __('Grid Electricity') }}</label>
                        <div class="flex items-center overflow-hidden rounded bg-white">
                            <input type="text" placeholder="e.g. 500000" class="w-full border-0 px-3 py-2 text-sm text-brand-text placeholder:text-neutral focus:outline-none focus:ring-0">
                            <span class="shrink-0 pr-3 text-xs text-neutral">{{ __('kWh/month') }}</span>
                        </div>
                    </div>

                    <div>
                        <label class="mb-1 block text-sm">{{ __('Diesel/Fuel Oil') }}</label>
                        <div class="flex items-center overflow-hidden rounded bg-white">
                            <input type="text" placeholder="e.g. 500" class="w-full border-0 px-3 py-2 text-sm text-brand-text placeholder:text-neutral focus:outline-none focus:ring-0">
                            <span class="shrink-0 pr-3 text-xs text-neutral">{{ __('liters/month') }}</span>
                        </div>
                    </div>

                    <div>
                        <label class="mb-1 block text-sm">{{ __('Water Consumption') }}</label>
                        <div class="flex items-center overflow-hidden rounded bg-white">
                            <input type="text" placeholder="e.g. 500" class="w-full border-0 px-3 py-2 text-sm text-brand-text placeholder:text-neutral focus:outline-none focus:ring-0">
                            <span class="shrink-0 pr-3 text-xs text-neutral">m3/month</span>
                        </div>
                    </div>

                    <div>
                        <label class="mb-1 block text-sm">{{ __('Waste Generated') }}</label>
                        <div class="flex items-center overflow-hidden rounded bg-white">
                            <input type="text" placeholder="e.g. 500" class="w-full border-0 px-3 py-2 text-sm text-brand-text placeholder:text-neutral focus:outline-none focus:ring-0">
                            <span class="shrink-0 pr-3 text-xs text-neutral">{{ __('kg/month') }}</span>
                        </div>
                    </div>
                </div>

                <button type="button" class="mt-8 w-full rounded bg-primary py-2.5 text-sm font-semibold text-white hover:bg-primary-dark">
                    {{ __('Calculate') }}
                </button>
            </div>

            {{-- Estimated footprint --}}
            <div class="rounded-lg bg-accent p-6 text-white">
                <h2 class="text-lg font-bold">{{ __('Estimated Monthly Footprint') }}</h2>

                <p class="mt-4 flex items-baseline gap-2">
                    <span class="text-5xl font-bold">0.81</span>
                    <span class="text-sm text-white/80">tCO<sub>2</sub>e</span>
                </p>

                <h3 class="mt-8 font-semibold">{{ __('Breakdown') }}</h3>
                <div class="mt-3 space-y-4">
                    @foreach ($breakdown as $row)
                        <div>
                            <div class="flex items-center justify-between text-xs">
                                <span>{{ $row['label'] }}</span>
                                <span class="text-white/80">{{ $row['value'] }} tCO<sub>2</sub>e</span>
                            </div>
                            <div class="mt-1.5 h-1.5 w-full overflow-hidden rounded-full bg-white/30">
                                <div class="h-full rounded-full bg-primary-light" style="width: {{ $row['percent'] }}%"></div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="mt-6 rounded-lg bg-white p-4 text-brand-text">
                    <h4 class="font-semibold">{{ __("That's equivalent to...") }}</h4>
                    <ul class="mt-3 space-y-3 text-sm text-slate-600">
                        <li class="flex items-start gap-2">
                            <svg class="mt-0.5 size-5 shrink-0 text-accent" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75"><path stroke-linecap="round" stroke-linejoin="round" d="M3 15c4-8 12-10 18-9-1 6-6 12-14 12H3v-3Z" /><path stroke-linecap="round" stroke-linejoin="round" d="M3 18c3-1 6-2 8-4" /></svg>
                            <span>{{ __('≈ 3 mangrove trees needed to absorb this CO₂ over 10 years') }}</span>
                        </li>
                        <li class="flex items-start gap-2">
                            <svg class="mt-0.5 size-5 shrink-0 text-accent" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75"><path stroke-linecap="round" stroke-linejoin="round" d="M3.75 16.5 5.4 11a2.25 2.25 0 0 1 2.14-1.5h9.02a2.25 2.25 0 0 1 2.14 1.5l1.65 5.5M3.75 16.5v2.25A.75.75 0 0 0 4.5 19.5h1.5a.75.75 0 0 0 .75-.75V16.5m-3-0h16.5m-16.5 0v2.25a.75.75 0 0 0 .75.75h1.5m14.25-3v2.25a.75.75 0 0 1-.75.75h-1.5a.75.75 0 0 1-.75-.75V16.5" /><circle cx="7" cy="16.5" r=".75" /><circle cx="17" cy="16.5" r=".75" /></svg>
                            <span>{{ __('≈ 4 months of car driving (average Indonesian passenger vehicle)') }}</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <section class="bg-surface">
        <div class="mx-auto flex max-w-5xl flex-col items-start justify-between gap-6 px-4 py-12 sm:flex-row sm:items-center">
            <div>
                <h2 class="text-2xl font-bold leading-tight text-brand-text">{{ __('Ready to reduce your footprint?') }}</h2>
                <p class="mt-3 max-w-md text-sm text-slate-600">
                    {{ __('Join the NZICC program and take the next step toward measurable carbon reduction and more sustainable industrial operations.') }}
                </p>
            </div>

            <button type="button" class="shrink-0 rounded bg-primary px-6 py-3 text-sm font-semibold text-white hover:bg-primary-dark">
                {{ __('Connect with the NZICC Team') }}
            </button>
        </div>
    </section>
</x-layouts.app>
