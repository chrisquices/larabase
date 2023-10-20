<x-backend.app-layout>
    <x-slot name="title">{{ __('backend.permission_details') }}: {{ $permission->name }}</x-slot>

    <x-backend.heading>
        <x-backend.card.title>{{ __('backend.permission_details') }}: {{ $permission->name }}</x-backend.card.title>
    </x-backend.heading>

    <x-backend.card class="!py-0">
        <div class="px-2.5 divide-y-[1px] divide-slate-200 dark:divide-slate-700">
            <x-backend.form.row>
                <x-backend.text-label for="category">{{ __('backend.category') }}</x-backend.text-label>

                <x-slot name="input">
                    <x-backend.form.text>{{ $permission->category }}</x-backend.form.text>
                </x-slot>
            </x-backend.form.row>
            <x-backend.form.row>
                <x-backend.text-label for="name">{{ __('backend.name') }}</x-backend.text-label>

                <x-slot name="input">
                    <x-backend.form.text>{{ $permission->name }}</x-backend.form.text>
                </x-slot>
            </x-backend.form.row>
            <x-backend.form.row>
                <x-backend.text-label for="code">{{ __('backend.code') }}</x-backend.text-label>

                <x-slot name="input">
                    <x-backend.form.text>{{ $permission->code }}</x-backend.form.text>
                </x-slot>
            </x-backend.form.row>
        </div>
    </x-backend.card>

    <x-backend.form.actions>
        <x-backend.anchor href="{{ route('backend.user-management.permissions.index') }}" class="font-bold">{{ __('backend.cancel') }}</x-backend.anchor>
    </x-backend.form.actions>

</x-backend.app-layout>
