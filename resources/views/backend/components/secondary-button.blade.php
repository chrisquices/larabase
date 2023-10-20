<button
    {{ $attributes->merge([
            'class' => 'text-sm text-white btn btn-outline btn-primary btn-sm capitalize focus:border-0 focus:ring-0 focus:outline-0',
            'type' => 'submit'
        ])
    }}
>
    {{ $slot }}
</button>
