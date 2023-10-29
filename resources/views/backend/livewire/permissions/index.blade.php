<div>
    <x-backend.heading>
        <x-backend.card.title>{{ __('backend.permissions') }}</x-backend.card.title>

        <x-backend.table.search/>

        <x-backend.card.actions>
            @can('delete_permissions')
                <x-backend.danger-button wire:click="confirm('deleteMany', '{{ __('backend.are_you_sure_you_want_to_delete_the_selected_permissions?') }}')" :disabled="!count($selectedRecords)">{{ __('backend.delete_permissions') }}</x-backend.danger-button>
            @endcan
            @can('create_permissions')
                <x-backend.primary-button-link href="{{ route('backend.permissions.create') }}">{{ __('backend.create_permission') }}</x-backend.primary-button-link>
            @endcan
        </x-backend.card.actions>
    </x-backend.heading>

    <x-backend.card>
        <x-backend.card.utilities>
            <x-backend.table.records-per-page-options :recordsPerPageOptions="$recordsPerPageOptions"/>
            <x-backend.table.loader/>

            <x-slot name="filters">
                <x-backend.table.no-filters-found/>
            </x-slot>
        </x-backend.card.utilities>

        <x-backend.table>
            <x-backend.table.head>
                <x-backend.table.row>
                    @can('delete_permissions')
                        <x-backend.table.header></x-backend.table.header>
                    @endcan
                    <x-backend.table.header>
                        {{ __('backend.category') }}
                        @include('backend.components.table.sort', ['column' => 'category'])
                    </x-backend.table.header>
                    <x-backend.table.header>
                        {{ __('backend.name') }}
                        @include('backend.components.table.sort', ['column' => 'name'])
                    </x-backend.table.header>
                    <x-backend.table.header>
                        {{ __('backend.code') }}
                        @include('backend.components.table.sort', ['column' => 'code'])
                    </x-backend.table.header>
                    <x-backend.table.header></x-backend.table.header>
                </x-backend.table.row>
            </x-backend.table.head>
            <x-backend.table.body>
                @forelse($permissions as $permission)
                    <x-backend.table.row wireKey="{{ $permission->id }}">
                        @can('delete_permissions')
                            <x-backend.table.data-cell class="w-10">
                                <x-backend.checkbox id="ch-{{ $permission->id }}" value="{{ $permission->id }}" wire:model.live="selectedRecords"/>
                            </x-backend.table.data-cell>
                        @endcan
                        <x-backend.table.data-cell>{{ $permission->category }}</x-backend.table.data-cell>
                        <x-backend.table.row-header>{{ $permission->name }}</x-backend.table.row-header>
                        <x-backend.table.data-cell>{{ $permission->code }}</x-backend.table.data-cell>
                        <x-backend.table.data-cell class="flex justify-end gap-3">
                            @can('view_permissions')
                                <x-backend.anchor href="{{ route('backend.permissions.show', $permission) }}">
                                    <x-heroicon-o-magnifying-glass/>
                                </x-backend.anchor>
                            @endcan
                            @can('edit_permissions')
                                <x-backend.anchor href="{{ route('backend.permissions.edit', $permission) }}">
                                    <x-heroicon-o-pencil-square/>
                                </x-backend.anchor>
                            @endcan
                            @can('delete_permissions')
                                    <x-backend.anchor wire:click="confirm('delete({{ $permission->id }})', '{{ __('backend.are_you_sure_you_want_to_delete_this_permission?') }}')">
                                    <x-heroicon-o-trash/>
                                </x-backend.anchor>
                            @endcan
                        </x-backend.table.data-cell>
                    </x-backend.table.row>
                @empty
                    <x-backend.table.no-results-found/>
                @endforelse
            </x-backend.table.body>
        </x-backend.table>

        {{ $permissions->links('backend.components.table.pagination') }}

    </x-backend.card>

    @include('backend.partials.modals.confirm')

</div>
