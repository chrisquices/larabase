<dialog id="modalConfirm" class="modal modal-bottom sm:modal-middle" wire:ignore>
    <form method="dialog" class="modal-box">
        <p class="h3 font-bold text-lg">{{ __('backend.system_message') }}</p>
        <p class="py-4" id="modal-confirm-text"></p>
        <div class="modal-action space-x-6">
            <x-backend.cancel-button>{{ __('backend.cancel') }}</x-backend.cancel-button>
            <x-backend.primary-button id="modal-confirm-btn" wire:click="confirmed">{{ __('backend.accept') }}</x-backend.primary-button>
        </div>
    </form>
</dialog>
