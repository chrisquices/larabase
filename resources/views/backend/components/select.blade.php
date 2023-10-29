@props(['id'])

<select
    {{ $attributes->merge([
            'id' => $id,
            'name' => $id,
            'class' => 'tom-select cursor-pointer text-sm h-10 text-slate-500 w-full rounded-xl border-[1px] bg-white dark:bg-slate-950 dark:border-slate-200 dark:border-slate-700  border-slate-200 dark:border-slate-700 focus:border-slate-200 dark:border-slate-700 focus:outline-none focus:ring-[1.5px] focus:ring-blue-500',
        ])
    }}
>
    {{ $slot }}
</select>
