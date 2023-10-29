<div>
    <x-backend.heading>
        <x-backend.card.title>{{ __('backend.settings') }}</x-backend.card.title>
    </x-backend.heading>

    <form action="{{ route('backend.settings.update') }}" method="POST" autocomplete="off">
        @csrf
        @method('PATCH')

        <x-backend.card class="!pb-0">
            <div class="tabs">
                <a class="tab tab-bordered {{ ($activeTab == 'backend') ? 'tab-active' : '' }}"
                   wire:click="changeActiveTab('backend')">
                    Backend
                </a>
                <a class="tab tab-bordered   {{ ($activeTab == 'frontend') ? 'tab-active' : '' }}"
                   wire:click="changeActiveTab('frontend')">
                    Frontend
                </a>
            </div>

            <div @if($activeTab != 'backend') class="hidden" @endif>
                <x-backend.form.divider>
                    <x-backend.form.row>
                        <x-backend.text-label for="backend_records_per_page">{{ __('backend.records_per_page') }}</x-backend.text-label>

                        <x-slot name="input">
                            <x-backend.text-input id="backend_records_per_page" value="{{ $backendRecordsPerPage }}" required/>
                            <x-backend.input-error name="backend_records_per_page"/>
                        </x-slot>
                    </x-backend.form.row>
                    <x-backend.form.row>
                        <x-backend.text-label for="backend_records_per_page_options">{{ __('backend.records_per_page_options') }}</x-backend.text-label>

                        <x-slot name="input">
                            <x-backend.text-input id="backend_records_per_page_options" value="{{ $backendRecordsPerPageOptions }}" required/>
                            <x-backend.input-error name="backend_records_per_page_options"/>
                        </x-slot>
                    </x-backend.form.row>
                </x-backend.form.divider>
            </div>

            <div @if($activeTab != 'frontend') class="hidden" @endif>
                <x-backend.form.divider>
                    <x-backend.form.row>
                        <x-backend.text-label for="frontend_status">{{ __('backend.status') }}</x-backend.text-label>

                        <x-slot name="input">
                            <x-backend.select id="frontend_status" required>
                                <option value="" selected disabled>{{ __('backend.select_an_option') }}</option>
                                <option value="active" @selected($frontendStatus === 'active')>{{ __('backend.active') }}</option>
                                <option value="inactive" @selected($frontendStatus === 'inactive')>{{ __('backend.inactive') }}</option>
                                <option value="under-maintenance" @selected($frontendStatus === 'under-maintenance')>{{ __('backend.under_maintenance') }}</option>
                            </x-backend.select>
                            <x-backend.input-error name="frontend_status"/>
                        </x-slot>
                    </x-backend.form.row>
                    <x-backend.form.row>
                        <x-backend.text-label for="frontend_redirect_to">{{ __('backend.redirect_to') }}</x-backend.text-label>

                        <x-slot name="input">
                            <x-backend.text-input id="frontend_redirect_to" value="{{ $frontendRedirectTo }}"/>
                            <x-backend.input-error name="frontend_redirect_to"/>
                        </x-slot>
                    </x-backend.form.row>
                </x-backend.form.divider>
            </div>
        </x-backend.card>

        <x-backend.form.actions>
            <x-backend.primary-button>{{ __('backend.update_settings') }}</x-backend.primary-button>
        </x-backend.form.actions>
    </form>
</div>
