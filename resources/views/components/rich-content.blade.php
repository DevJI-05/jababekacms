@props(['content'])

@if ($content)
    <div {{ $attributes->merge(['class' => 'text-slate-700 [&_a]:text-primary [&_a]:underline [&_h2]:mt-6 [&_h2]:text-xl [&_h2]:font-bold [&_h2]:text-primary [&_h3]:mt-4 [&_h3]:text-lg [&_h3]:font-bold [&_h3]:text-primary [&_img]:mt-3 [&_img]:h-auto [&_img]:max-w-full [&_img]:rounded-lg [&_li]:mt-1 [&_ol]:mt-3 [&_ol]:list-decimal [&_ol]:pl-5 [&_p]:mt-3 [&_p]:leading-relaxed [&_p:empty]:min-h-[1em] [&_ul]:mt-3 [&_ul]:list-disc [&_ul]:pl-5 first:[&_*]:mt-0']) }}>
        {!! $content !!}
    </div>
@endif
