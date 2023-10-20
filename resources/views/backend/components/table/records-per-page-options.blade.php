<div class="mr-5 flex-none">
    <x-backend.select id="per_page" wire:model.live="recordsPerPage" class="!w-[4.5rem]">
        @foreach($recordsPerPageOptions as $value)
            <option value="{{ $value }}">{{ $value }}</option>
        @endforeach
    </x-backend.select>
</div>
