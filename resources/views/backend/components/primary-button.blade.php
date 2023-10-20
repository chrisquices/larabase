<button
    {{ $attributes->merge([
            'class' => 'btn btn-sm btn-primary text-sm text-white capitalize',
            'type' => 'submit',
        ])
    }}
>
    {{ $slot }}
</button>
