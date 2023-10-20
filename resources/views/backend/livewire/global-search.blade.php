<div class="flex-auto">
    <div class="dropdown dropdown-bottom w-full lg:w-80">
        <x-backend.text-input wire:model.live="search" id="global_search" tabindex="0" class="!w-full !lg:w-80 !rounded-3xl !bg-base-100 !dark:bg-base-00 !border-0" placeholder="{{ __('backend.press_command_slash_to_search') }}"
                      autocomplete="off"/>

        <div tabindex="0" class="text-slate-500 menu flex-nowrap dropdown-content space-y-2 z-[1] px-6 py-5 shadow bg-white dark:bg-slate-950 rounded-box w-full lg:w-[38rem] mt-4 h-80 overflow-scroll">
            @forelse($results as $key => $result)
                <div wire:key="{{ $key }}" class="space-y-1">
                    <div class="font-bold pb-2">
                        {{ $result['category'] }}
                    </div>
                    <ul>
                        @foreach($result['items'] as $subKey => $item)
                            <li wire:key="{{ $subKey }}"><a href="{{ $item['route'] }}">{{ $item['name'] }}</a></li>
                        @endforeach
                    </ul>
                </div>
            @empty
                <p class="text-sm text-slate-500 dark:text-slate-400">{{ __('backend.no_results_found') }}</p>
            @endforelse
        </div>
    </div>
</div>
