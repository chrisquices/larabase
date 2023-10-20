<div
    {{ $attributes->merge([
        'class' => 'overflow-x-auto space-y-2 !-mx-4',
    ])
}}
>
    <table class="table">
        {{ $slot }}
    </table>
</div>
