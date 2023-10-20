<x-backend.app-layout>
    <x-slot name="title">{{ __('backend.user_details') }}: {{ $user->name }} {{ $user->last_name }}</x-slot>

    <x-backend.heading>
        <x-backend.card.title>{{ __('backend.user_details') }}: {{ $user->name }} {{ $user->last_name }}</x-backend.card.title>
    </x-backend.heading>

    <x-backend.card class="!py-0">
        <div class="px-2.5 divide-y-[1px] divide-slate-200 dark:divide-slate-700">
            <x-backend.form.row>
                <x-backend.text-label for="name">{{ __('backend.name') }}</x-backend.text-label>

                <x-slot name="input">
                    <x-backend.form.text>{{ $user->name }}</x-backend.form.text>
                </x-slot>
            </x-backend.form.row>

            <x-backend.form.row>
                <x-backend.text-label for="last_name">{{ __('backend.last_name') }}</x-backend.text-label>

                <x-slot name="input">
                    <x-backend.form.text>{{ $user->last_name }}</x-backend.form.text>
                </x-slot>
            </x-backend.form.row>

            <x-backend.form.row>
                <x-backend.text-label for="email">{{ __('backend.email') }}</x-backend.text-label>

                <x-slot name="input">
                    <x-backend.form.text>{{ $user->email }}</x-backend.form.text>
                </x-slot>
            </x-backend.form.row>

            <x-backend.form.row>
                <x-backend.text-label for="locale">{{ __('backend.locale') }}</x-backend.text-label>

                <x-slot name="input">
                    <x-backend.form.text>{{ $user->locale->code }} ({{ $user->locale->name }})</x-backend.form.text>
                </x-slot>
            </x-backend.form.row>

            <x-backend.form.row>
                <x-backend.text-label for="is_active">{{ __('backend.is_active') }}</x-backend.text-label>

                <x-slot name="input">
                    <x-backend.form.text>{{ $user->is_active ? __('backend.yes') : __('backend.no') }}</x-backend.form.text>
                </x-slot>
            </x-backend.form.row>

            @if(auth()->user()->is_admin)
                <x-backend.form.row>
                    <x-backend.text-label for="is_admin">{{ __('backend.is_admin') }}</x-backend.text-label>

                    <x-slot name="input">
                        <x-backend.form.text>{{ $user->is_admin ? __('backend.yes') : __('backend.no') }}</x-backend.form.text>
                    </x-slot>
                </x-backend.form.row>
            @endif

            <x-backend.form.row>
                <x-backend.text-label for="roles">{{ __('backend.roles') }}</x-backend.text-label>

                <x-slot name="input">
                    @forelse($user->roles as $role)
                        <div class="flex items-center">
                            <x-backend.form.text>{{ $role->name }}</x-backend.form.text>
                        </div>
                    @empty
                        <x-backend.form.text>{{ __('backend.none') }}</x-backend.form.text>
                    @endforelse
                    <x-backend.input-error name="role_ids"/>
                </x-slot>
            </x-backend.form.row>
        </div>
    </x-backend.card>

    <x-backend.form.actions>
        <x-backend.anchor href="{{ route('backend.user-management.users.index') }}" class="font-bold">{{ __('backend.cancel') }}</x-backend.anchor>
    </x-backend.form.actions>

</x-backend.app-layout>
