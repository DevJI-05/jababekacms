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

            @if ($content->body)
                <div class="mt-8 text-slate-700 [&_a]:text-primary [&_a]:underline [&_h2]:mt-6 [&_h2]:text-xl [&_h2]:font-bold [&_h2]:text-primary [&_h3]:mt-4 [&_h3]:text-lg [&_h3]:font-bold [&_h3]:text-primary [&_li]:mt-1 [&_ol]:mt-3 [&_ol]:list-decimal [&_ol]:pl-5 [&_p]:mt-3 [&_p]:leading-relaxed [&_ul]:mt-3 [&_ul]:list-disc [&_ul]:pl-5 first:[&_*]:mt-0">
                    {!! $content->body !!}
                </div>
            @endif
        </div>
    </section>
</x-layouts.app>
