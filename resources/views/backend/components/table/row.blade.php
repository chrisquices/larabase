@props(['wireKey' => false, 'redirectTo' => false])

<tr class="hover cursor-pointer" @if($wireKey) wire:key="{{ $wireKey }}" @endif>
    {{ $slot }}
</tr>
