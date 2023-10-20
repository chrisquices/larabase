<div class="navbar flex-wrap lg:flex-nowrap bg-white dark:bg-slate-950 border-b-[1px] dark:border-slate-700  px-0 relative !z-40 pr-0 lg:pr-6">
    <div class="w-full lg:w-80 mt-2 lg:mt-0">
        <img src="{{ Vite::asset('resources/backend/img/logo-alt.svg') }}" alt="logo" class="h-8 mx-auto lg:mx-6 dark:hidden">
        <img src="{{ Vite::asset('resources/backend/img/logo-alt-white.svg') }}" alt="logo" class="h-8 mx-auto lg:mx-6 hidden dark:block">
    </div>
    <div class="flex grow w-full lg:w-auto justify-between items-center m-4 mb-3 lg:m-0 lg:mb-0 gap-4 mr-4 lg:mr-10">
        <div>
            <label for="my-drawer-2" class="drawer-button lg:hidden">
                <x-heroicon-o-bars-4 class="h-8 w-8"/>
            </label>
        </div>

        <livewire:backend.global-search/>

        <div class="flex gap-4">
            @include('backend.partials.topbar.themes')
            @include('backend.partials.topbar.user')
        </div>
    </div>
</div>
