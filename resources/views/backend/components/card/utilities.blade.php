<div class="flex justify-between items-center">
    <div class="flex items-center">
        {{ $slot }}
    </div>

    <div class="dropdown dropdown-end dropdown-hover">
        <span tabindex="0" class="flex items-center cursor-pointer">
            <x-heroicon-o-funnel/>
            <x-heroicon-o-chevron-down class="ml-1 w-3 h-3"/>
        </span>
        <ul tabindex="0" class="dropdown-content z-[1] menu p-4 shadow rounded-box w-80 space-y-4 bg-white dark:bg-base-100 border-[1px] border-slate-200 dark:border-slate-700" wire:ignore>
            {{ $filters }}
        </ul>
    </div>
</div>
