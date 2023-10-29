@props(['type', 'outline' => false])

@php
    $type = "badge-$type";
    $outline = $outline ? 'badge-outline' : '';
@endphp

<span
    {{ $attributes->merge([
            'class' => "badge $type $outline text-white",
        ])
    }}
>
    {{ $slot }}
</span>
