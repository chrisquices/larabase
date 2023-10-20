<div
    {{ $attributes->merge([
        'class' => 'bg-white dark:bg-base-100 border-[1px] border-slate-300 dark:border-slate-700 p-4 rounded-xl space-y-3',
        ])
    }}
>
    {{ $slot }}
</div>
