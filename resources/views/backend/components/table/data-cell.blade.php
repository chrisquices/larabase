<td
    {{ $attributes->merge([
            'class' => 'text-slate-500 dark:text-slate-400',
        ])
    }}
>
    {{ $slot }}
</td>
