@props(['id', 'value' => 'true', 'checked' => false])

<input type="checkbox" value="{{ $value }}"
    {{ $checked ? 'checked' : '' }}
    {{ $attributes->merge([
            'id' => $id,
            'name' => $id,
            'class' => 'checkbox checkbox-primary border-slate-300 dark:border-slate-700  bg-base-100 dark:bg-slate-950 dark:border-slate-300 dark:border-slate-700  focus:ring-0 bg-white dark:bg-slate-950',
        ])
    }}
>
