<div class="flex items-center gap-4">
    <x-backend.text-label for="is_admin">{{ __('backend.is_admin') }}</x-backend.text-label>

    <x-backend.select id="is_admin" name="is_admin" wire:model.live="isAdmin" {{ $attributes->merge(['class' => 'grow !w-auto !bg-base-100']) }}>
        <option value="">{{ __('backend.view_all') }}</option>
        <option value="yes">{{ __('backend.yes') }}</option>
        <option value="no">{{ __('backend.no') }}</option>
    </x-backend.select>
</div>
