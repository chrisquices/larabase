<x-backend.heading>
    <x-backend.card.title>{{ __('backend.update_profile') }}</x-backend.card.title>
</x-backend.heading>

<section>
    <form action="{{ route('backend.user-management.profile.update') }}" method="POST" autocomplete="off">
        @csrf
        @method('PATCH')

        <x-backend.card class="!py-0">
            <div class="px-2.5 divide-y-[1px] divide-slate-200 dark:divide-slate-700">
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
            </div>
        </x-backend.card>

        <x-backend.form.actions>
            <x-backend.primary-button>{{ __('backend.update_profile') }}</x-backend.primary-button>
        </x-backend.form.actions>
    </form>
</section>
