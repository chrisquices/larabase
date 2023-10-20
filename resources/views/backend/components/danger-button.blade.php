@props(['disabled' => false])

<button
    {{ $disabled ? 'disabled' : '' }}
    {{ $attributes->merge([
            'class' => 'btn btn-sm btn-error text-sm text-white capitalize',
            'type' => 'submit',
        ])
    }}
>
    {{ $slot }}
</button>
