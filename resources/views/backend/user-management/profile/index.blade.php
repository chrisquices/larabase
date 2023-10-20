<x-backend.app-layout>

    <x-slot name="title">{{ __('backend.profile') }}</x-slot>

    @include('backend.user-management.profile.partials.update-profile')

    @include('backend.user-management.profile.partials.update-photo')

    @include('backend.user-management.profile.partials.update-password')

</x-backend.app-layout>
