<x-jet-dialog-modal wire:model="is_modal">
    <x-slot name="title">
        {{ __('Do you want delete?') }}
    </x-slot>

    <x-slot name="content">
        {{ $content }}
    </x-slot>

    <x-slot name="footer">
        <div class="flex justify-end">
            <x-jet-secondary-button wire:click="stopConfirming" wire:loading.attr="disabled">
                {{ __('Cancel') }}
            </x-jet-secondary-button>
            <form method="POST" action="{{$action}}">
                @csrf
                @method('delete')
                <x-jet-button class="ml-2 bg-red-700" wire:loading.attr="disabled">
                    {{ __('Delete') }}
                </x-jet-button>
            </form>
        </div>
    </x-slot>
</x-jet-dialog-modal>
