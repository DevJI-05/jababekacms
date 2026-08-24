@php
    /** @var \Illuminate\Support\Collection $items */
@endphp

<x-layouts.app :title="$title.' - '.config('app.name')" :active-nav="$activeNav ?? ''" :breadcrumbs="$breadcrumbs ?? []">
    <x-page-hero :title="$title" :image="$image ?? null" />

    <section class="bg-surface py-10">
        <div class="mx-auto max-w-7xl px-4">
            <x-rich-content :content="$description" class="mb-8" />

            @if ($buttonUrl ?? null)
                <x-pill-link :href="$buttonUrl" class="!w-auto mb-8 px-5 py-2.5">
                    {{ $buttonLabel ?? __('Learn more') }}
                </x-pill-link>
            @endif

            @if ($items->isEmpty())
                @unless ($description)
                    <p class="py-12 text-center text-slate-600">{{ __('Content for this section is coming soon.') }}</p>
                @endunless
            @else
                <x-card-grid>
                    @foreach ($items as $item)
                        <x-photo-card
                            :title="$item['label']"
                            :description="$item['description']"
                            :image="$item['image']"
                            :icon="$item['icon']"
                            :href="$item['href']"
                        />
                    @endforeach
                </x-card-grid>
            @endif
        </div>
    </section>
</x-layouts.app>
