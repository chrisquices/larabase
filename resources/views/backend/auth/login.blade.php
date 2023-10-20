<x-backend.guest-layout>

    <x-slot name="title">{{ __('backend.login') }}</x-slot>

    <div class="grid h-screen place-items-center">
        <div class="sm:mx-auto sm:w-full sm:max-w-md">
            <x-backend.card class="!p-10">
                <form action="{{ route('backend.login') }}" method="POST" autocomplete="off" class="space-y-6">
                    @csrf

                    <img class="mx-auto h-12 w-auto" src="{{ Vite::asset('resources/backend/img/logo-alt.svg') }}" alt="larabase">

                    <div class="form-control w-full">
                        <x-backend.text-label for="email">{{ __('backend.email') }}</x-backend.text-label>
                        <x-backend.text-input id="email" type="email" value="admin@larabase.com" autofocus/>
                    </div>

                    <div class="form-control w-full">
                        <x-backend.text-label for="password">{{ __('backend.password') }}</x-backend.text-label>
                        <x-backend.text-input id="password" type="password" value="password"/>
                    </div>

                    <div class="flex items-center justify-between">
                        <div class="form-control">
                            <label class="label cursor-pointer">
                                <x-backend.checkbox id="remember" checked/>
                                <span class="label-text ml-2">{{ __('backend.remember_me') }}</span>
                            </label>
                        </div>
                        <x-backend.anchor href="{{ route('backend.password.request') }}">{{ __('backend.forgot_your_password?') }}</x-backend.anchor>
                    </div>

                    <x-backend.input-error name="email"/>
                    <x-backend.input-error name="password"/>

                    <x-backend.primary-button class="w-full">{{ __('backend.sign_in') }}</x-backend.primary-button>
                </form>
            </x-backend.card>
        </div>
    </div>
</x-backend.guest-layout>
