@php
    /** @var \Illuminate\Support\Collection $items */
@endphp

<x-layouts.app :title="$title.' - '.config('app.name')" :active-nav="$activeNav ?? ''" :breadcrumbs="$breadcrumbs ?? []">
    <x-page-hero :title="$title" :image="$image ?? null" />

    <section class="bg-surface py-10">
        <div class="mx-auto max-w-7xl px-4">
            @if ($description)
                <div class="mb-8 max-w-2xl text-slate-600 [&_a]:text-primary [&_a]:underline [&_h2]:mt-6 [&_h2]:text-xl [&_h2]:font-bold [&_h2]:text-primary [&_h3]:mt-4 [&_h3]:text-lg [&_h3]:font-bold [&_h3]:text-primary [&_li]:mt-1 [&_ol]:mt-3 [&_ol]:list-decimal [&_ol]:pl-5 [&_p]:mt-3 [&_p]:leading-relaxed [&_ul]:mt-3 [&_ul]:list-disc [&_ul]:pl-5 first:[&_*]:mt-0">
                    {!! $description !!}
                </div>
            @endif

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
