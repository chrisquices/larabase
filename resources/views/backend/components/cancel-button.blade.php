<button
    {{ $attributes->merge([
            'class' => 'btn-sm text-sm text-slate-500 dark:text-slate-400  btn bg-transparent outline-none capitalize',
        ])
    }}
>
    {{ $slot }}
</button>
