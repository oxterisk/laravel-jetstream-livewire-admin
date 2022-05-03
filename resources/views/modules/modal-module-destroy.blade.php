<x-jet-confirmation-modal wire:model="showModalModuleDestroy">
    <x-slot name="title">
        {{ __('Delete module') }}
    </x-slot>

    <x-slot name="content">
        {{ __('Are you sure you want to delete this module?') }}
        @if( isset( $this->module->id ) )
            <p class="mt-5">
                {{ $this->module->name }}
            </p>
        @endif
    </x-slot>

    <x-slot name="footer">
        <x-jet-secondary-button wire:click="$toggle('showModalModuleDestroy', false)" wire:loading.attr="disabled">
            {{ __('Cancel') }}
        </x-jet-secondary-button>

        <x-jet-danger-button class="ml-3" wire:click="destroyModule({{ $showModalModuleDestroy }})" wire:loading.attr="disabled">
            {{ __('Delete') }}
        </x-jet-danger-button>
    </x-slot>
</x-jet-confirmation-modal>