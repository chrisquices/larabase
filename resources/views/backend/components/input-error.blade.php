@error($name)
<p
    {{ $attributes->merge([
    'class' => 'text-sm text-error mt-2 mb-0',
])
}}
>
    {{ $message }}
</p>
@enderror
