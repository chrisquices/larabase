@canany(['list_users', 'list_roles', 'list_permissions'])
    <li class="space-y-2" x-data="{ show: {{ (request()->is('backend/users',
        'backend/users/*',
        'backend/roles',
        'backend/roles/*',
        'backend/permissions',
        'backend/permissions/*'
        )) ? 'true' : 'false' }} }">
        <span
            @class([
                'menu-dropdown-toggle',
                'bg-primary/10 rounded-lg !text-primary font-medium' => (request()->is('backend/users',
                    'backend/users/*',
                    'backend/roles',
                    'backend/roles/*',
                    'backend/permissions',
                    'backend/permissions/*'
                    ))])
            @click="show = !show" :class="{ 'menu-dropdown-show': show }">
            <x-heroicon-o-users @class(['!mr-1', '!text-primary' => (request()->is('backend/users',
                'backend/users/*',
                'backend/roles',
                'backend/roles/*',
                'backend/permissions',
                'backend/permissions/*'
                ))])/>
            {{ __('backend.user_management') }}
        </span>
        <ul class="menu-dropdown space-y-2" :class="{ 'menu-dropdown-show': show }">
            @can('list_users')
                <li @class(['bg-primary/10 rounded-lg text-primary font-medium' => (request()->is(
                    'backend/users',
                    'backend/users/*'
                    ))])>
                    <a href="{{ route('backend.users.index') }}" wire:navigate>
                        {{ __('backend.users') }}
                    </a>
                </li>
            @endcan
            @can('list_roles')
                <li @class(['bg-primary/10 rounded-lg text-primary font-medium' => (request()->is(
                    'backend/roles',
                    'backend/roles/*'
                    ))])>
                    <a href="{{ route('backend.roles.index') }}" wire:navigate>
                        {{ __('backend.roles') }}
                    </a>
                </li>
            @endcan
            @can('list_permissions')
                <li @class(['bg-primary/10 rounded-lg text-primary font-medium' => (request()->is(
                    'backend/permissions',
                    'backend/permissions/*'
                    ))])>
                    <a href="{{ route('backend.permissions.index') }}" wire:navigate>
                        {{ __('backend.permissions') }}
                    </a>
                </li>
            @endcan
        </ul>
    </li>
@endcanany
