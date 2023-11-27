<x-backend.app-layout>
    <x-slot name="title">{{ __('backend.update_dogs') }}: {{ $dog->name }}</x-slot>

    <x-backend.heading>
        <x-backend.card.title>{{ __('backend.update_dogs') }}: {{ $dog->name }}</x-backend.card.title>
    </x-backend.heading>

    <form action="{{ route('backend.dogs.update', $dog) }}" method="POST" autocomplete="off">
        @csrf
        @method('PATCH')

        <x-backend.card class="!py-0">
            <x-backend.form.divider>
                <x-backend.form.row>
                    <x-backend.text-label for="name">{{ __('backend.name') }}</x-backend.text-label>

                    <x-slot name="input">
                        <x-backend.text-input id="name" value="{{ $dog->name }}" required/>
                        <x-backend.input-error name="name"/>
                    </x-slot>
                </x-backend.form.row>
            </x-backend.form.divider>
        </x-backend.card>

        <x-backend.form.actions>
            <x-backend.anchor href="{{ route('backend.dogs.index') }}" class="font-bold">{{ __('backend.cancel') }}</x-backend.anchor>
            <x-backend.primary-button>{{ __('backend.update_dogs') }}</x-backend.primary-button>
        </x-backend.form.actions>

    </form>
</x-backend.app-layout>
