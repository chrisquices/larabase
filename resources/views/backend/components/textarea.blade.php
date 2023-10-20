@props(['id'])

<textarea
    {{ $attributes->merge([
            'id' => $id,
            'name' => $id,
            'class' => 'textarea -mb-1 text-sm bg-base-100 dark:bg-slate-950 dark:border-slate-300 dark:border-slate-700  w-full rounded-xl border-[1px] border-slate-300 dark:border-slate-700  focus:border-slate-300 dark:border-slate-700  focus:outline-none focus:ring-transparent',
            'type' => 'text',
            'value' => old($id),
            'rows' => "5",
        ])
    }}
>{{ $slot }}</textarea>
