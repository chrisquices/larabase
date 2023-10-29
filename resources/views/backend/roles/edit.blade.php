<x-backend.app-layout>
    <x-slot name="title">{{ __('backend.update_role') }}: {{ $role->name }}</x-slot>

    <x-backend.heading>
        <x-backend.card.title>{{ __('backend.update_role') }}: {{ $role->name }}</x-backend.card.title>
    </x-backend.heading>

    <form action="{{ route('backend.roles.update', $role) }}" method="POST" autocomplete="off">
        @csrf
        @method('PATCH')

        <x-backend.card class="!py-0">
            <x-backend.form.divider>
                <x-backend.form.row>
                    <x-backend.text-label for="name">{{ __('backend.name') }}</x-backend.text-label>

                    <x-slot name="input">
                        <x-backend.text-input id="name" value="{{ $role->name }}" required/>
                        <x-backend.input-error name="name"/>
                    </x-slot>
                </x-backend.form.row>

                <x-backend.form.row>
                    <x-backend.text-label for="permissions">{{ __('backend.permissions') }}</x-backend.text-label>

                    <x-slot name="input">
                        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                            @foreach($permissionCategories as $key => $permissionCategory)
                                <div>
                                    <x-backend.text-label for="permissions">{{ __($key)  }}</x-backend.text-label>
                                    @foreach($permissionCategory as $permission)
                                        <div class="flex items-center gap-2">
                                            <x-backend.checkbox id="permission_id_{{ $permission->id }}" name="permission_ids[]" value="{{ $permission->id }}" :checked="in_array($permission->id, $role->permissions->pluck('id')->toArray())"/>
                                            <x-backend.text-label for="permission_id_{{ $permission->id }}">{{ __($permission->name) }}</x-backend.text-label>
                                        </div>
                                    @endforeach
                                </div>
                            @endforeach
                        </div>
                        <x-backend.input-error name="permission_ids"/>
                    </x-slot>
                </x-backend.form.row>
            </x-backend.form.divider>
        </x-backend.card>

        <x-backend.form.actions>
            <x-backend.anchor href="{{ route('backend.roles.index') }}" class="font-bold">{{ __('backend.cancel') }}</x-backend.anchor>
            <x-backend.primary-button>{{ __('backend.update_role') }}</x-backend.primary-button>
        </x-backend.form.actions>

    </form>
</x-backend.app-layout>
