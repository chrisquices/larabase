@props(['disabled' => false])

<button
    {{ $disabled ? 'disabled' : '' }}
    {{ $attributes->merge([
            'class' => 'btn btn-sm btn-error text-sm text-white capitalize !bg-transparent focus:ring-0 ring-0 text-error',
            'type' => 'submit',
        ])
    }}
>
    {{ $slot }}
</button>
