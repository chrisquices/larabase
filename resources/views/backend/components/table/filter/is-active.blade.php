<div class="flex items-center gap-4">
    <x-backend.text-label for="is_active">{{ __('backend.is_active') }}</x-backend.text-label>

    <x-backend.select id="is_active" {{ $attributes->merge(['class' => 'grow !w-auto input-filter']) }} wire:model.live="isActive">
        <option value="">{{ __('backend.select_an_option') }}</option>
        <option value="view_all">{{ __('backend.view_all') }}</option>
        <option value="yes">{{ __('backend.yes') }}</option>
        <option value="no">{{ __('backend.no') }}</option>
    </x-backend.select>
</div>
