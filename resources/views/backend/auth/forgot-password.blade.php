<x-backend.guest-layout>

    <x-slot name="title">{{ __('backend.forgot_password') }}</x-slot>

    <div class="grid h-screen place-items-center">
        <div class="sm:mx-auto sm:w-full sm:max-w-md">
            <x-backend.card class="!p-10">
                <form action="{{ route('backend.password.email') }}" method="POST" autocomplete="off" class="space-y-6 text-sm">
                    @csrf

                    <img class="mx-auto h-12 w-auto" src="{{ Vite::asset('resources/backend/img/logo-alt.svg') }}" alt="logo">

                    <p class="font-medium">{{ __('backend.forgot_your_password?') }}</p>

                    <p>{{ __('backend.forgot_your_password_text') }}</p>

                    <div class="form-control w-full mb-5">
                        <x-backend.text-label for="email">{{ __('backend.email') }}</x-backend.text-label>
                        <x-backend.text-input id="email" type="email" autofocus/>

                        <x-backend.input-error name="email"/>

                        @if(session('status'))
                            <p class="text-sm mt-2 mb-0 text-success">{{ session('status') }}</p>
                        @endif
                    </div>

                    <x-backend.primary-button class="w-full">{{ __('backend.send_password_reset_link') }}</x-backend.primary-button>
                </form>

                <x-backend.secondary-button-link href="{{ route('backend.login') }}" class="w-full">{{ __('backend.cancel') }}</x-backend.secondary-button-link>

            </x-backend.card>
        </div>
    </div>
</x-backend.guest-layout>
