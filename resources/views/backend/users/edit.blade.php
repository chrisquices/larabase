<x-backend.app-layout>
    <x-slot name="title">{{ __('backend.update_user') }}: {{ $user->name }} {{ $user->last_name }}</x-slot>

    <x-backend.heading>
        <x-backend.card.title>{{ __('backend.update_user') }}: {{ $user->name }} {{ $user->last_name }}</x-backend.card.title>
    </x-backend.heading>

    <form action="{{ route('backend.users.update', $user) }}" method="POST" autocomplete="off">
        @csrf
        @method('PATCH')

        <x-backend.card class="!py-0">
            <x-backend.form.divider>
                <x-backend.form.row>
                    <x-backend.text-label for="name">{{ __('backend.name') }}</x-backend.text-label>

                    <x-slot name="input">
                        <x-backend.text-input id="name" value="{{ $user->name }}" required/>
                        <x-backend.input-error name="name"/>
                    </x-slot>
                </x-backend.form.row>

                <x-backend.form.row>
                    <x-backend.text-label for="last_name">{{ __('backend.last_name') }}</x-backend.text-label>

                    <x-slot name="input">
                        <x-backend.text-input id="last_name" value="{{ $user->last_name }}" required/>
                        <x-backend.input-error name="last_name"/>
                    </x-slot>
                </x-backend.form.row>

                <x-backend.form.row>
                    <x-backend.text-label for="email">{{ __('backend.email') }}</x-backend.text-label>

                    <x-slot name="input">
                        <x-backend.text-input id="email" value="{{ $user->email }}" type="email" required/>
                        <x-backend.input-error name="email"/>
                    </x-slot>
                </x-backend.form.row>

                <x-backend.form.row>
                    <x-backend.text-label for="password">{{ __('backend.password') }}</x-backend.text-label>

                    <x-slot name="input">
                        <x-backend.text-input id="password" type="password"/>
                        <x-backend.input-error name="password"/>
                    </x-slot>
                </x-backend.form.row>

                <x-backend.form.row>
                    <x-backend.text-label for="password_confirmation">{{ __('backend.password_confirmation') }}</x-backend.text-label>

                    <x-slot name="input">
                        <x-backend.text-input id="password_confirmation" type="password"/>
                        <x-backend.input-error name="password_confirmation"/>
                    </x-slot>
                </x-backend.form.row>

                <x-backend.form.row>
                    <x-backend.text-label for="locale_id">{{ __('backend.locale') }}</x-backend.text-label>

                    <x-slot name="input">
                        <x-backend.select id="locale_id" required>
                            <option value="" selected disabled>{{ __('backend.select_an_option') }}</option>
                            @foreach($locales as $locale)
                                <option value="{{ $locale->id }}" @selected(old('locale_id') ?? $user->locale_id === $locale->id)>
                                    {{ $locale->code }} ({{ $locale->name }})
                                </option>
                            @endforeach
                        </x-backend.select>
                        <x-backend.input-error name="locale"/>
                    </x-slot>
                </x-backend.form.row>

                <x-backend.form.row>
                    <x-backend.text-label for="is_active">{{ __('backend.is_active') }}</x-backend.text-label>

                    <x-slot name="input">
                        <x-backend.select id="is_active" required>
                            <option value="" selected disabled>{{ __('backend.select_an_option') }}</option>
                            <option value="1" @selected($user->is_active)>{{ __('backend.yes') }}</option>
                            <option value="0" @selected(!$user->is_active)>{{ __('backend.no') }}</option>
                        </x-backend.select>
                        <x-backend.input-error name="is_active"/>
                    </x-slot>
                </x-backend.form.row>

                @if(auth()->user()->is_admin)
                    <x-backend.form.row>
                        <x-backend.text-label for="is_admin">{{ __('backend.is_admin') }}</x-backend.text-label>

                        <x-slot name="input">
                            <x-backend.select id="is_admin" required>
                                <option value="" selected disabled>{{ __('backend.select_an_option') }}</option>
                                <option value="1" @selected($user->is_admin)>{{ __('backend.yes') }}</option>
                                <option value="0" @selected(!$user->is_admin)>{{ __('backend.no') }}</option>
                            </x-backend.select>
                            <x-backend.input-error name="is_admin"/>
                        </x-slot>
                    </x-backend.form.row>
                @endif

                <x-backend.form.row>
                    <x-backend.text-label for="roles">{{ __('backend.roles') }}</x-backend.text-label>

                    <x-slot name="input">
                        @foreach($roles as $role)
                            <div class="flex items-center gap-2">
                                <x-backend.checkbox id="role_id_{{ $role->id }}" name="role_ids[]" value="{{ $role->id }}" :checked="in_array($role->id, $user->roles->pluck('id')->toArray())"/>
                                <x-backend.text-label for="role_id_{{ $role->id }}">{{ $role->name }}</x-backend.text-label>
                            </div>
                        @endforeach
                        <x-backend.input-error name="role_ids"/>
                    </x-slot>
                </x-backend.form.row>
            </x-backend.form.divider>
        </x-backend.card>

        <x-backend.form.actions>
            <x-backend.anchor href="{{ route('backend.users.index') }}" class="font-bold">{{ __('backend.cancel') }}</x-backend.anchor>
            <x-backend.primary-button>{{ __('backend.update_user') }}</x-backend.primary-button>
        </x-backend.form.actions>

    </form>
</x-backend.app-layout>
