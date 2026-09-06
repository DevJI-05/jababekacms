@props(['label' => 'POC Image', 'gradient' => 'from-primary/20 via-surface-mint to-accent/20', 'class' => 'h-full w-full'])

<div {{ $attributes->merge(['class' => "relative overflow-hidden bg-gradient-to-br $gradient $class"]) }}>
    <div class="absolute inset-0 bg-[linear-gradient(45deg,theme(colors.slate.400/25)_25%,transparent_25%,transparent_50%,theme(colors.slate.400/25)_50%,theme(colors.slate.400/25)_75%,transparent_75%,transparent)] bg-[length:16px_16px] opacity-40"></div>

    <div class="absolute inset-0 flex flex-col items-center justify-center gap-2 text-primary/70">
        <svg class="size-8" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path stroke-linecap="round" stroke-linejoin="round" d="M2.25 15.75 8.69 9.3a1.5 1.5 0 0 1 2.12 0l4.94 4.94m0 0 2.06-2.06a1.5 1.5 0 0 1 2.12 0l2.31 2.32M3 4.5h18a.75.75 0 0 1 .75.75v13.5a.75.75 0 0 1-.75.75H3a.75.75 0 0 1-.75-.75V5.25A.75.75 0 0 1 3 4.5Zm12.75 5.25a1.125 1.125 0 1 1-2.25 0 1.125 1.125 0 0 1 2.25 0Z" /></svg>
        <span class="text-[11px] font-bold uppercase tracking-wide">{{ $label }}</span>
    </div>
</div>
