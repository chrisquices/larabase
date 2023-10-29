<x-backend.app-layout>

    <x-slot name="title">{{ __('backend.profile') }}</x-slot>

    @include('backend.profile.partials.update-profile')

    @include('backend.profile.partials.update-photo')

    @include('backend.profile.partials.update-password')

</x-backend.app-layout>
