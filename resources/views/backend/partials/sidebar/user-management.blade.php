@canany(['list_users', 'list_roles', 'list_permissions'])
    <li class="space-y-2" x-data="{ show: {{ (request()->is('backend/user-management/users', 'backend/user-management/users/*', 'backend/user-management/roles', 'backend/user-management/roles/*', 'backend/user-management/permissions', 'backend/user-management/permissions/*')) ? 'true' : 'false' }} }">
    <span
        @class([
            'menu-dropdown-toggle',
            'bg-primary/10 rounded-lg !text-primary font-medium' => (request()->is('backend/user-management/users', 'backend/user-management/users/*', 'backend/user-management/roles', 'backend/user-management/roles/*', 'backend/user-management/permissions', 'backend/user-management/permissions/*'))
        ])
        @click="show = !show" :class="{ 'menu-dropdown-show': show }">
        <x-heroicon-o-users @class(['!mr-1', '!text-primary' => (request()->is('backend/user-management/users', 'backend/user-management/users/*', 'backend/user-management/roles', 'backend/user-management/roles/*', 'backend/user-management/permissions', 'backend/user-management/permissions/*'))])/>
        {{ __('backend.user_management') }}
    </span>
        <ul class="menu-dropdown space-y-2" :class="{ 'menu-dropdown-show': show }">
            @can('list_users')
                <li @class(['bg-primary/10 rounded-lg text-primary font-medium' => (request()->is('backend/user-management/users', 'backend/user-management/users/*'))])>
                    <a href="{{ route('backend.user-management.users.index') }}">{{ __('backend.users') }}</a>
                </li>
            @endcan
            @can('list_roles')
                <li @class(['bg-primary/10 rounded-lg text-primary font-medium' => (request()->is('backend/user-management/roles', 'backend/user-management/roles/*'))])>
                    <a href="{{ route('backend.user-management.roles.index') }}">{{ __('backend.roles') }}</a>
                </li>
            @endcan
            @can('list_permissions')
                <li @class(['bg-primary/10 rounded-lg text-primary font-medium' => (request()->is('backend/user-management/permissions', 'backend/user-management/permissions/*'))])>
                    <a href="{{ route('backend.user-management.permissions.index') }}">{{ __('backend.permissions') }}</a>
                </li>
            @endcan
        </ul>
    </li>
@endcanany
