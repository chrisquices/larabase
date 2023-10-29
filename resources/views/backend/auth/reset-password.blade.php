<x-backend.guest-layout>

    <x-slot name="title">{{ __('backend.reset_password') }}</x-slot>

    <div class="grid h-screen place-items-center">
        <div class="sm:mx-auto sm:w-full sm:max-w-md">
            <x-backend.card class="!p-10">
                <form action="{{ route('password.store') }}" method="POST" autocomplete="off" class="space-y-6 text-sm">
                    @csrf

                    <img class="mx-auto h-12 w-auto" src="{{ Vite::asset('resources/backend/img/logo-alt.svg') }}" alt="logo">

                    <input type="hidden" name="token" value="{{ $request->route('token') }}" hidden>

                    <div class="form-control w-full">
                        <x-backend.text-label for="email">{{ __('backend.email') }}</x-backend.text-label>
                        <x-backend.text-input id="email" type="email" value="{{ $request->email }}" readonly required/>
                    </div>

                    <div class="form-control w-full">
                        <x-backend.text-label for="password">{{ __('backend.password') }}</x-backend.text-label>
                        <x-backend.text-input id="password" type="password" autofocus required/>
                    </div>

                    <div class="form-control w-full">
                        <x-backend.text-label for="password_confirmation">{{ __('backend.password_confirmation') }}</x-backend.text-label>
                        <x-backend.text-input id="password_confirmation" type="password" required/>
                    </div>

                    <x-backend.input-error name="email"/>
                    <x-backend.input-error name="password"/>
                    <x-backend.input-error name="token"/>

                    @if(session('status'))
                        <p class="text-sm mt-2 mb-0">{{ session('status') }}</p>
                    @endif

                    <x-backend.primary-button class="w-full">{{ __('backend.reset_password') }}</x-backend.primary-button>
                </form>
            </x-backend.card>
        </div>
    </div>
</x-backend.guest-layout>
