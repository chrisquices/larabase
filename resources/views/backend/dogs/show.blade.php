<x-backend.app-layout>
    <x-slot name="title">{{ __('backend.dog_details') }}: {{ $dog->name }}</x-slot>

    <x-backend.heading>
        <x-backend.card.title>{{ __('backend.dog_details') }}: {{ $dog->name }}</x-backend.card.title>
    </x-backend.heading>

    <x-backend.card class="!py-0">
        <x-backend.form.divider>
            <x-backend.form.row>
                <x-backend.text-label for="name">{{ __('backend.name') }}</x-backend.text-label>

                <x-slot name="input">
                    <x-backend.form.text>{{ $dog->name }}</x-backend.form.text>
                </x-slot>
            </x-backend.form.row>
        </x-backend.form.divider>
    </x-backend.card>

    <x-backend.form.actions>
        <x-backend.anchor href="{{ route('backend.dogs.index') }}" class="font-bold">{{ __('backend.cancel') }}</x-backend.anchor>
    </x-backend.form.actions>

</x-backend.app-layout>
