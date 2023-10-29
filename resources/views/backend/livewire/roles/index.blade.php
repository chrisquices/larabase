<div>
    <x-backend.heading>
        <x-backend.card.title>{{ __('backend.roles') }}</x-backend.card.title>

        <x-backend.table.search/>

        <x-backend.card.actions>
            @can('delete_roles')
                <x-backend.danger-button wire:click="confirm('deleteMany', '{{ __('backend.are_you_sure_you_want_to_delete_the_selected_roles?') }}')" :disabled="!count($selectedRecords)">{{ __('backend.delete_roles') }}</x-backend.danger-button>
            @endcan
            @can('create_roles')
                <x-backend.primary-button-link href="{{ route('backend.roles.create') }}">{{ __('backend.create_role') }}</x-backend.primary-button-link>
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
                    @can('delete_roles')
                        <x-backend.table.header></x-backend.table.header>
                    @endcan
                    <x-backend.table.header>
                        {{ __('backend.name') }}
                        @include('backend.components.table.sort', ['column' => 'name'])
                    </x-backend.table.header>
                    <x-backend.table.header></x-backend.table.header>
                </x-backend.table.row>
            </x-backend.table.head>
            <x-backend.table.body>
                @forelse($roles as $role)
                    <x-backend.table.row wireKey="{{ $role->id }}">
                        @can('delete_roles')
                            <x-backend.table.data-cell class="w-10">
                                <x-backend.checkbox id="ch-{{ $role->id }}" value="{{ $role->id }}" wire:model.live="selectedRecords"/>
                            </x-backend.table.data-cell>
                        @endcan
                        <x-backend.table.row-header>{{ $role->name }}</x-backend.table.row-header>
                        <x-backend.table.data-cell class="flex justify-end gap-3">
                            @can('view_roles')
                                <x-backend.anchor href="{{ route('backend.roles.show', $role) }}">
                                    <x-heroicon-o-magnifying-glass/>
                                </x-backend.anchor>
                            @endcan
                            @can('edit_roles')
                                <x-backend.anchor href="{{ route('backend.roles.edit', $role) }}">
                                    <x-heroicon-o-pencil-square/>
                                </x-backend.anchor>
                            @endcan
                            @can('delete_roles')
                                    <x-backend.anchor wire:click="confirm('delete({{ $role->id }})', '{{ __('backend.are_you_sure_you_want_to_delete_this_role?') }}')">
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

        {{ $roles->links('backend.components.table.pagination') }}

    </x-backend.card>

    @include('backend.partials.modals.confirm')

</div>
