<div class="flex justify-between items-center">
    <div class="flex items-center">
        {{ $slot }}
    </div>

    <div class="dropdown dropdown-end">
        <label tabindex="0" class="flex items-center cursor-pointer">
            <x-heroicon-o-funnel/>
            <x-heroicon-o-chevron-down class="ml-1 w-3 h-3"/>
        </label>
        <ul tabindex="0" class="dropdown-content z-[1] menu p-4 shadow bg-white dark:bg-slate-950 rounded-box w-80 space-y-4">
            {{ $filters }}
        </ul>
    </div>
</div>
