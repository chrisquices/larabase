@canany(['update_settings', 'list_activity_logs'])
    <li class="space-y-2" x-data="{ show: {{ (request()->is(
        'backend/settings',
        'backend/activity-logs',
        'backend/activity-logs/*'
        )) ? 'true' : 'false' }} }">
        <span
            @class([
                'menu-dropdown-toggle',
                'bg-primary/10 rounded-lg !text-primary font-medium' => (request()->is(
                    'backend/settings',
                    'backend/activity-logs',
                    'backend/activity-logs/*'
                    ))])
            @click="show = !show" :class="{ 'menu-dropdown-show': show }">
            <x-heroicon-o-cog-6-tooth @class(['!mr-1', '!text-primary' => (request()->is(
                'backend/settings',
                'backend/activity-logs',
                'backend/activity-logs/*'
                ))])/>
            {{ __('backend.administrator_tools') }}
        </span>
        <ul class="menu-dropdown space-y-2" :class="{ 'menu-dropdown-show': show }">
            @can('update_settings')
                <li @class(['bg-primary/10 rounded-lg text-primary font-medium' => (request()->is(
                    'backend/settings',
                    'backend/activity-logs',
                    'backend/activity-logs/*'
                    ))])>
                    <a href="{{ route('backend.settings.index') }}" wire:navigate>
                        {{ __('backend.settings') }}
                    </a>
                </li>
            @endcan
        </ul>
    </li>
@endcanany
