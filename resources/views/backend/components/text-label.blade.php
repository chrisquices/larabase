@props(['for'])

<label for="{{ $for }}"
    {{ $attributes->merge([
            'class' => 'label',
        ])
    }}
>
    <span class="label-text text-slate-500 dark:text-slate-400 ">{{ $slot }}</span>
</label>
