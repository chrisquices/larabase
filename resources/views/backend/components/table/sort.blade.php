@if($sortBy !== $column)
    <x-heroicon-o-ellipsis-vertical class="inline !h-3.5 !w-3.5" aria-hidden="true" wire:click="updateSortBy('{{ $column }}')"/>
@elseif($sortBy === $column && $sortDirection == 'desc')
    <x-heroicon-o-chevron-down class="inline !h-3.5 !w-3.5 text-slate-500 dark:text-slate-400 " aria-hidden="true" wire:click="updateSortBy('{{ $column }}')"/>
@else
    <x-heroicon-o-chevron-up class="inline !h-3.5 !w-3.5 text-slate-500 dark:text-slate-400 " aria-hidden="true" wire:click="updateSortBy('{{ $column }}')"/>
@endif
