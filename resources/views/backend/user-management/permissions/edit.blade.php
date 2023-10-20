<x-backend.app-layout>
    <x-slot name="title">{{ __('backend.update_role') }}: {{ $permission->name }}</x-slot>

    <x-backend.heading>
        <x-backend.card.title>{{ __('backend.update_role') }}: {{ $permission->name }}</x-backend.card.title>
    </x-backend.heading>

    <form action="{{ route('backend.user-management.permissions.update', $permission) }}" method="POST" autocomplete="off">
        @csrf
        @method('PATCH')

        <x-backend.card class="!py-0">
            <div class="px-2.5 divide-y-[1px] divide-slate-200 dark:divide-slate-700">
                <x-backend.form.row>
                    <x-backend.text-label for="name">{{ __('backend.name') }}</x-backend.text-label>

                    <x-slot name="input">
                        <x-backend.text-input id="category" value="{{ $permission->category }}" required/>
                        <x-backend.input-error name="category"/>
                    </x-slot>
                </x-backend.form.row>

                <x-backend.form.row>
                    <x-backend.text-label for="name">{{ __('backend.name') }}</x-backend.text-label>

                    <x-slot name="input">
                        <x-backend.text-input id="name" value="{{ $permission->name }}" required/>
                        <x-backend.input-error name="name"/>
                    </x-slot>
                </x-backend.form.row>

                <x-backend.form.row>
                    <x-backend.text-label for="code">{{ __('backend.code') }}</x-backend.text-label>

                    <x-slot name="input">
                        <x-backend.text-input id="code" value="{{ $permission->code }}" required/>
                        <x-backend.input-error name="code"/>
                    </x-slot>
                </x-backend.form.row>
            </div>
        </x-backend.card>

        <x-backend.form.actions>
            <x-backend.anchor href="{{ route('backend.user-management.permissions.index') }}" class="font-bold">{{ __('backend.cancel') }}</x-backend.anchor>
            <x-backend.primary-button>{{ __('backend.update_role') }}</x-backend.primary-button>
        </x-backend.form.actions>

    </form>
</x-backend.app-layout>
