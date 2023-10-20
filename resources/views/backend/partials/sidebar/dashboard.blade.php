<li @class(['bg-primary/10 rounded-lg text-primary font-medium' => (request()->is('backend/dashboard', 'backend/dashboard/*'))])>
<a href="{{ route('backend.dashboard.index') }}">
        <x-heroicon-o-home @class(['!mr-1', '!text-primary' => (request()->is('backend/dashboard', 'backend/dashboard/*'))])/>
        {{ __('backend.dashboard') }}
    </a>
</li>
