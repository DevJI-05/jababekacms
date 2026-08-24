<x-layouts.app :title="$content->title.' - '.config('app.name')" :active-nav="$activeNav ?? ''" :breadcrumbs="$breadcrumbs ?? []">
    <x-page-hero :title="$content->title" :image="$content->imageUrl()" />

    <section class="bg-white py-12">
        <div class="mx-auto max-w-3xl px-4">
            @if ($content->description())
                <p class="text-lg text-slate-600">{{ $content->description() }}</p>
            @endif

            @if (! empty($content->urls))
                <div class="mt-6 flex flex-wrap gap-3">
                    @foreach ($content->urls as $link)
                        <x-pill-link :href="$link['url'] ?? '#'" class="!w-auto px-4 py-2">
                            {{ $link['label'] ?? $link['url'] }}
                        </x-pill-link>
                    @endforeach
                </div>
            @endif

            <x-rich-content :content="$content->body" class="mt-8" />
        </div>
    </section>
</x-layouts.app>
