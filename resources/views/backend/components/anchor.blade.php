<p>
<a
    {{ $attributes->merge([
            'class' => 'text-sm text-primary',
        ])
    }}
>
    {{ $slot }}
</a>
</p>
