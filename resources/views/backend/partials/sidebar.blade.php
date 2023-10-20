<div class="w-full lg:w-80 z-20">
    <div class="drawer lg:drawer-open">
        <input id="my-drawer-2" type="checkbox" class="drawer-toggle" hidden/>
        <div class="drawer-side">

            <label for="my-drawer-2" class="drawer-overlay"></label>

            <ul class="menu pt-[150px] lg:pt-6 h-full text-slate-500 dark:text-slate-400 gap-3 bg-base-100 px-5 w-[19rem]">

                @include('backend.partials.sidebar.dashboard')

                @include('backend.partials.sidebar.user-management')

            </ul>
        </div>
    </div>
</div>
