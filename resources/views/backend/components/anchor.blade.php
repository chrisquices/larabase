<p>
<a
    {{ $attributes->merge([
            'class' => 'text-sm text-primary',
            'href' => 'javascript:void();'
        ])
    }}
>
    {{ $slot }}
</a>
</p>
