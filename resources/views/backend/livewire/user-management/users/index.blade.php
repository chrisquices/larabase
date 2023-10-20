<div>
    <x-backend.heading>
        <x-backend.card.title>{{ __('backend.users') }}</x-backend.card.title>

        <x-backend.table.search/>

        <x-backend.card.actions>
            @can('delete_users')
                <x-backend.danger-button wire:click="confirm('deleteMany', '{{ __('backend.are_you_sure_you_want_to_delete_the_selected_users?') }}')" :disabled="!count($selectedRecords)">
                    {{ __('backend.delete_users') }}
                </x-backend.danger-button>
            @endcan
            @can('create_users')
                <x-backend.primary-button-link href="{{ route('backend.user-management.users.create') }}">{{ __('backend.create_user') }}</x-backend.primary-button-link>
            @endcan
        </x-backend.card.actions>
    </x-backend.heading>

    <x-backend.card>
        <x-backend.card.utilities>
            <x-backend.table.records-per-page-options :recordsPerPageOptions="$recordsPerPageOptions"/>
            <x-backend.table.loader/>

            <x-slot name="filters">
                <x-backend.table.filter.is-active/>
                <x-backend.table.filter.is-admin/>
            </x-slot>
        </x-backend.card.utilities>

        <x-backend.table>
            <x-backend.table.head>
                <x-backend.table.row>
                    @can('delete_users')
                        <x-backend.table.header></x-backend.table.header>
                    @endcan
                    <x-backend.table.header>
                        {{ __('backend.name') }}
                        @include('backend.components.table.sort', ['column' => 'name'])
                    </x-backend.table.header>
                    <x-backend.table.header>
                        {{ __('backend.last_name') }}
                        @include('backend.components.table.sort', ['column' => 'last_name'])
                    </x-backend.table.header>
                    <x-backend.table.header>
                        {{ __('backend.email') }}
                        @include('backend.components.table.sort', ['column' => 'email'])
                    </x-backend.table.header>
                    <x-backend.table.header>
                        {{ __('backend.email_verified_at') }}
                        @include('backend.components.table.sort', ['column' => 'email_verified_at'])
                    </x-backend.table.header>
                    <x-backend.table.header>
                        {{ __('backend.is_active') }}
                        @include('backend.components.table.sort', ['column' => 'is_active'])
                    </x-backend.table.header>
                    <x-backend.table.header>
                        {{ __('backend.is_admin') }}
                        @include('backend.components.table.sort', ['column' => 'is_admin'])
                    </x-backend.table.header>
                    <x-backend.table.header></x-backend.table.header>
                </x-backend.table.row>
            </x-backend.table.head>
            <x-backend.table.body>
                @forelse($users as $user)
                    <x-backend.table.row wireKey="{{ $user->id }}" redirectTo="{{ Gate::allows('view_users') ? route('backend.user-management.users.show', $user) : false }}">

                        @can('delete_users')
                            <x-backend.table.data-cell class="w-10">
                                @if(!$user->is_admin)
                                    @if($user->id != auth()->id())
                                        <x-backend.checkbox id="ch-{{ $user->id }}" value="{{ $user->id }}" wire:model.live="selectedRecords"/>
                                    @endif
                                @endif
                            </x-backend.table.data-cell>
                        @endcan
                        <x-backend.table.data-cell>{{ $user->name }}</x-backend.table.data-cell>
                        <x-backend.table.data-cell>{{ $user->last_name }}</x-backend.table.data-cell>
                        <x-backend.table.data-cell>{{ $user->email }}</x-backend.table.data-cell>
                        <x-backend.table.data-cell>{{ $user->email_verified_at_formatted ?? '-' }}</x-backend.table.data-cell>
                        <x-backend.table.data-cell>
                            @if($user->is_active)
                                <x-heroicon-o-check-circle class="!text-success"/>
                            @else
                                <x-heroicon-o-x-circle class="!text-error"/>
                            @endif
                        </x-backend.table.data-cell>
                        <x-backend.table.data-cell>
                            @if($user->is_admin)
                                <x-heroicon-o-check-circle class="!text-success"/>
                            @else
                                <x-heroicon-o-x-circle class="!text-error"/>
                            @endif
                        </x-backend.table.data-cell>
                        <x-backend.table.data-cell class="flex justify-end gap-3">
                            @can('view_users')
                                <x-backend.anchor href="{{ route('backend.user-management.users.show', $user) }}">
                                    <x-heroicon-o-magnifying-glass/>
                                </x-backend.anchor>
                            @endcan
                            @can('edit_users')
                                @if(!$user->is_admin)
                                    @if($user->id != auth()->id())
                                        <x-backend.anchor href="{{ route('backend.user-management.users.edit', $user) }}">
                                            <x-heroicon-o-pencil-square/>
                                        </x-backend.anchor>
                                    @endif
                                @endif
                            @endcan
                            @can('delete_users')
                                @if(!$user->is_admin)
                                    @if($user->id != auth()->id())
                                        <x-backend.anchor wire:click="confirm('delete({{ $user->id }})', '{{ __('backend.are_you_sure_you_want_to_delete_this_user?') }}')">
                                            <x-heroicon-o-trash/>
                                        </x-backend.anchor>
                                    @endif
                                @endif
                            @endcan
                        </x-backend.table.data-cell>
                    </x-backend.table.row>
                @empty
                    <x-backend.table.no-results-found/>
                @endforelse
            </x-backend.table.body>
        </x-backend.table>

        {{ $users->links('backend.components.table.pagination') }}

    </x-backend.card>

    @include('backend.partials.modals.confirm')

</div>
