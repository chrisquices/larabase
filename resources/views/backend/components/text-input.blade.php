@props(['id'])

<input
    {{ $attributes->merge([
            'id' => $id,
            'name' => $id,
            'class' => 'input text-sm text-slate-500 dark:text-slate-400 h-10 bg-base-100 dark:bg-slate-950 border-slate-300 dark:border-slate-700 dark:border-slate-300 dark:border-slate-700  w-full rounded-xl border-[1px] focus:border-slate-300 dark:border-slate-700  focus:outline-none focus:ring-transparent focus:ring-[1.5px] focus:ring-blue-500',
            'type' => 'text',
            'value' => old($id)
        ])
    }}
/>
