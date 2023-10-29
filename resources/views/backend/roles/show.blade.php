<x-backend.app-layout>
    <x-slot name="title">{{ __('backend.role_details') }}: {{ $role->name }}</x-slot>

    <x-backend.heading>
        <x-backend.card.title>{{ __('backend.role_details') }}: {{ $role->name }}</x-backend.card.title>
    </x-backend.heading>

    <x-backend.card class="!py-0">
        <x-backend.form.divider>
            <x-backend.form.row>
                <x-backend.text-label for="name">{{ __('backend.name') }}</x-backend.text-label>

                <x-slot name="input">
                    <x-backend.form.text>{{ $role->name }}</x-backend.form.text>
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
                                    <div class="flex items-center">
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
    </x-backend.form.actions>

</x-backend.app-layout>
