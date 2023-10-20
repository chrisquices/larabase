@props(['id'])

<select
    {{ $attributes->merge([
            'id' => $id,
            'name' => $id,
            'class' => 'tom-select text-sm h-10 text-slate-500 bg-base-100 w-full rounded-xl border-[1px] bg-base-100 dark:bg-slate-950 dark:border-slate-300 dark:border-slate-700  border-slate-300 dark:border-slate-700  focus:border-slate-300 dark:border-slate-700  focus:outline-none focus:ring-transparent',
        ])
    }}
>
    {{ $slot }}
</select>
