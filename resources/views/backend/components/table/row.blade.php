@props(['wireKey' => false, 'redirectTo' => false])

<tr class="hover cursor-pointer" onclick="redirectTo(event, '{{ $redirectTo }}')" @if($wireKey) wire:key="{{ $wireKey }}" @endif>
    {{ $slot }}
</tr>
