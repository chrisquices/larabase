<x-backend.heading>
    <x-backend.card.title>{{ __('backend.update_password') }}</x-backend.card.title>
</x-backend.heading>

<section>
    <form action="{{ route('backend.profile.update-password') }}" method="POST" autocomplete="off">
        @csrf
        @method('PATCH')

        <x-backend.card class="!py-0">
            <x-backend.form.divider>
                <x-backend.form.row>
                    <x-backend.text-label for="password">{{ __('backend.password') }}</x-backend.text-label>

                    <x-slot name="input">
                        <x-backend.text-input id="password" type="password" required/>
                        <x-backend.input-error name="password"/>
                    </x-slot>
                </x-backend.form.row>

                <x-backend.form.row>
                    <x-backend.text-label for="password_confirmation">{{ __('backend.password_confirmation') }}</x-backend.text-label>

                    <x-slot name="input">
                        <x-backend.text-input id="password_confirmation" type="password" required/>
                        <x-backend.input-error name="password_confirmation"/>
                    </x-slot>
                </x-backend.form.row>
            </x-backend.form.divider>
        </x-backend.card>

        <x-backend.form.actions>
            <x-backend.primary-button>{{ __('backend.update_password') }}</x-backend.primary-button>
        </x-backend.form.actions>
    </form>
</section>
