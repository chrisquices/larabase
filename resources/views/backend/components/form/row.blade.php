@props(['first' => false])

<div class="grid grid-cols-1 lg:grid-cols-4 py-6">
    {{ $slot }}

    <div class="mt-1 sm:mt-0 sm:col-span-2 flex-auto space-y-2 h-full">
        {{ $input }}
    </div>
</div>
