<x-backend.heading>
    <x-backend.card.title>{{ __('backend.update_photo') }}</x-backend.card.title>
</x-backend.heading>

<section>
    <form action="{{ route('backend.user-management.profile.update-photo') }}" method="POST" enctype="multipart/form-data" autocomplete="off">
        @csrf
        @method('PATCH')

        <x-backend.card class="!py-0">
            <div class="px-2.5 divide-y-[1px] divide-slate-200 dark:divide-slate-700">
                <x-backend.form.row>
                    <x-backend.text-label for="photo">{{ __('backend.photo') }}</x-backend.text-label>

                    <x-slot name="input">
                        <x-backend.file-input id="photo" required/>
                        <x-backend.input-error name="photo"/>
                    </x-slot>
                </x-backend.form.row>

                <x-backend.form.row>
                    <x-backend.text-label for="current_photo">{{ __('backend.current_photo') }}</x-backend.text-label>

                    <x-slot name="input">
                        <x-backend.form.thumbnail url="{{ auth()->user()->photo_url }}"/>
                    </x-slot>
                </x-backend.form.row>
            </div>
        </x-backend.card>

        <x-backend.form.actions>
            <x-backend.primary-button>{{ __('backend.update_photo') }}</x-backend.primary-button>
        </x-backend.form.actions>
    </form>
</section>
