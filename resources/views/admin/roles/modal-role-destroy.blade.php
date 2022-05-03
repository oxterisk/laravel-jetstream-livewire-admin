<x-jet-confirmation-modal wire:model="showModalRoleDestroy">
    <x-slot name="title">
        {{ __('Delete role') }}
    </x-slot>

    <x-slot name="content">
        {{ __('Are you sure you want to delete this role?') }}
        @if( isset( $this->role->id ) )
            <p class="mt-5">
                {{ $this->role->name }}
                @if( $this->role->guard_name != '' )
                    ({{ $this->role->guard_name }})
                @endif
            </p>
        @endif
    </x-slot>

    <x-slot name="footer">
        <x-jet-secondary-button wire:click="$toggle('showModalRoleDestroy', false)" wire:loading.attr="disabled">
            {{ __('Cancel') }}
        </x-jet-secondary-button>

        <x-jet-danger-button class="ml-3" wire:click="destroyRole({{ $showModalRoleDestroy }})" wire:loading.attr="disabled">
            {{ __('Delete') }}
        </x-jet-danger-button>
    </x-slot>
</x-jet-confirmation-modal>