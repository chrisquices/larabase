<div>
    @if ($paginator->hasPages())
        <div>
            <nav role="navigation" aria-label="Pagination Navigation" class="flex justify-between mt-3">
            <span>
                {{-- Previous Page Link --}}
                @if ($paginator->onFirstPage())
                    <p rel="prev"
                            class="relative inline-flex items-center text-sm cursor-pointer font-medium text-slate-400 leading-5 rounded-md focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition ease-in-out duration-150">
                        {!! __('pagination.previous') !!}
                    </p>
                @else
                    <button wire:click="previousPage" wire:loading.attr="disabled" rel="prev"
                            class="relative inline-flex items-center text-sm cursor-pointer font-medium text-primary hover:text-primary/90 leading-5 rounded-md focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition ease-in-out duration-150">
                        {!! __('pagination.previous') !!}
                    </button>
                @endif
            </span>

                <p class="text-sm text-center">
                    Showing {{ $paginator->firstItem() ?? 0 }} to {{ $paginator->lastItem() ?? 0 }} of {{ $paginator->total() }}
                    results
                </p>

            <span>
                {{-- Next Page Link --}}
                @if ($paginator->hasMorePages())
                    <button wire:click="nextPage" wire:loading.attr="disabled" rel="next"
                            class="relative inline-flex items-center text-sm cursor-pointer font-medium text-primary hover:text-primary/90 leading-5 rounded-md focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition ease-in-out duration-150">
                        {!! __('pagination.next') !!}
                    </button>
                @else
                    <p rel="next"
                            class="relative inline-flex items-center text-sm cursor-pointer font-medium text-slate-400 leading-5 rounded-md focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition ease-in-out duration-150">
                        {!! __('pagination.next') !!}
                    </p>
                @endif
            </span>
            </nav>
        </div>
    @else
        <p class="text-sm text-center">
            Showing {{ $paginator->firstItem() ?? 0 }} to {{ $paginator->lastItem() ?? 0 }} of {{ $paginator->total() }}
            results
        </p>
    @endif
</div>
