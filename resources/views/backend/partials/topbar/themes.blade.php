<div class="bg-base-100 rounded-full" tabindex="0">
    <div class="h-9 w-9 flex items-center justify-center">
        @if(auth()->user()->preferred_theme == 'light' || !auth()->user()->preferred_theme)
            <form action="{{ route('backend.utilities.update-preferred-theme') }}" method="POST">
                @csrf
                @method('PATCH')

                <input type="hidden" name="theme" value="dark">

                <x-heroicon-o-moon onclick="this.closest('form').submit();"/>
            </form>
        @endif

        @if(auth()->user()->preferred_theme == 'dark')
            <form action="{{ route('backend.utilities.update-preferred-theme') }}" method="POST">
                @csrf
                @method('PATCH')

                <input type="hidden" name="theme" value="light">

                <x-heroicon-o-sun onclick="this.closest('form').submit();"/>
            </form>
        @endif
    </div>
</div>
