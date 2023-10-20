@props(['url'])

<a href="{{ $url }}" target="_blank" class="!block w-1">
    <img src="{{ $url }}" alt="thumbnail" {!! $attributes->merge(['class' => 'appearance-none bg-slate-200 border-slate-300 dark:border-slate-700  dark:border-slate-300 dark:border-slate-700  rounded-xl border-[1px] rounded-md sm:text-sm text-slate-700 border border-slate-300 rounded-md max-w-[10rem]']) !!}/>
</a>
