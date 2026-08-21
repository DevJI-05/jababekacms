@if ($paginator->hasPages())
    <nav role="navigation" aria-label="{{ __('Pagination Navigation') }}" class="flex flex-wrap items-center justify-center gap-2">
        @if ($paginator->onFirstPage())
            <span class="flex size-10 items-center justify-center rounded border border-slate-200 text-slate-300" aria-hidden="true">
                <svg class="size-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5 8.25 12l7.5-7.5" /></svg>
            </span>
        @else
            <a href="{{ $paginator->previousPageUrl() }}" rel="prev" class="flex size-10 items-center justify-center rounded border border-slate-200 text-primary hover:border-accent hover:text-accent" aria-label="{{ __('pagination.previous') }}">
                <svg class="size-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5 8.25 12l7.5-7.5" /></svg>
            </a>
        @endif

        @foreach ($elements as $element)
            @if (is_string($element))
                <span class="flex size-10 items-center justify-center text-sm font-medium text-slate-400">{{ $element }}</span>
            @endif

            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <span aria-current="page" class="flex size-10 items-center justify-center rounded bg-primary text-sm font-semibold text-white">{{ $page }}</span>
                    @else
                        <a href="{{ $url }}" class="flex size-10 items-center justify-center rounded border border-slate-200 text-sm font-semibold text-primary hover:border-accent hover:text-accent" aria-label="{{ __('Go to page :page', ['page' => $page]) }}">{{ $page }}</a>
                    @endif
                @endforeach
            @endif
        @endforeach

        @if ($paginator->hasMorePages())
            <a href="{{ $paginator->nextPageUrl() }}" rel="next" class="flex size-10 items-center justify-center rounded border border-slate-200 text-primary hover:border-accent hover:text-accent" aria-label="{{ __('pagination.next') }}">
                <svg class="size-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5" /></svg>
            </a>
        @else
            <span class="flex size-10 items-center justify-center rounded border border-slate-200 text-slate-300" aria-hidden="true">
                <svg class="size-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5" /></svg>
            </span>
        @endif
    </nav>
@endif
