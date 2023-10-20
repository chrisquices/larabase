<div class="flex items-center gap-4">
    <x-backend.text-label for="is_active">{{ __('backend.is_active') }}</x-backend.text-label>

    <x-backend.select id="is_active" name="is_active" wire:model.live="isActive" {{ $attributes->merge(['class' => 'grow !w-auto !bg-base-100']) }}>
        <option value="">{{ __('backend.view_all') }}</option>
        <option value="yes">{{ __('backend.yes') }}</option>
        <option value="no">{{ __('backend.no') }}</option>
    </x-backend.select>
</div>
