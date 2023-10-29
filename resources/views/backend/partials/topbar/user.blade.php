<div class="dropdown dropdown-end">
    <div class="flex items-center gap-4 cursor-pointer" tabindex="0">
        <span class="avatar w-9 h-9 cursor-pointer">
            <div class="rounded-full bg-base-100">
                <img src="{{ auth()->user()->photo_url }}" alt="profile photo"/>
            </div>
        </span>
        <div class="hidden lg:block">
            <p class="text-sm font-medium -mb-1">{{ auth()->user()->name }} {{ auth()->user()->last_name }}</p>
            <p class="text-sm text-slate-400">{{ auth()->user()->email }}</p>
        </div>
    </div>

    <ul tabindex="0" class="mt-4 z-[1] p-3 text-slate-500 shadow-xl menu menu-sm dropdown-content bg-white dark:bg-slate-950 rounded-box w-52 space-y-2">
        <li>
            <a href="{{ route('backend.profile.index') }}" class="justify-between" wire:navigate>
                {{ __('backend.profile') }}
            </a>
        </li>
        <li>
            <form action="{{ route('backend.logout') }}" method="POST">
                @csrf
                <button>{{ __('backend.logout') }}</button>
            </form>
        </li>
    </ul>
</div>
