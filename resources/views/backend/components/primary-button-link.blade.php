<a
    {{ $attributes->merge([
            'class' => 'text-sm text-white btn btn-primary btn-sm capitalize',
        ])
    }}
>
    {{ $slot }}
</a>
