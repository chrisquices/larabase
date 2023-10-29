<x-backend.guest-layout>

    <x-slot name="title">{{ __('backend.forgot_password') }}</x-slot>

    <div class="grid h-screen place-items-center">
        <div class="sm:mx-auto sm:w-full sm:max-w-md">
            <x-backend.card class="!p-10">
                <form action="{{ route('backend.verification.send') }}" method="POST" autocomplete="off" class="space-y-6 text-sm">
                    @csrf

                    <img class="mx-auto h-12 w-auto" src="{{ Vite::asset('resources/backend/img/logo-alt.svg') }}" alt="logo">

                    <p class="font-medium">{{ __('backend.verify_email') }}</p>

                    <p>{{ __('backend.verify_email_text') }}</p>

                    @if(session('status') == 'verification-link-sent')
                        <div class="form-control w-full mb-5">
                            <p class="text-sm mt-2 mb-0">{{ __('backend.verification_link_sent') }}</p>
                        </div>
                    @endif

                    <x-backend.primary-button class="w-full">{{ __('backend.resend_verification_email') }}</x-backend.primary-button>
                </form>

                <form action="{{ route('backend.logout') }}" method="POST">
                    @csrf
                    <x-backend.secondary-button class="w-full">{{ __('backend.logout') }}</x-backend.secondary-button>
                </form>
            </x-backend.card>
        </div>
    </div>
</x-backend.guest-layout>
