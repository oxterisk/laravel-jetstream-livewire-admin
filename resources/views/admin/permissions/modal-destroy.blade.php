<x-jet-confirmation-modal wire:model="showModalPermissionDestroy">
    <x-slot name="title">
        {{ __('Delete permission') }}
    </x-slot>

    <x-slot name="content">
        {{ __('Are you sure you want to delete this?', ['concept' => strtolower( trans_choice( 'Permission', 1 ) )]) }}
        @if( isset( $this->permission->id ) )
            <p class="mt-5">
                {{ $this->permission->name }}
                @if( $this->permission->guard_name != '' )
                    ({{ $this->permission->guard_name }})
                @endif
            </p>
        @endif
    </x-slot>

    <x-slot name="footer">
        <x-jet-secondary-button wire:click="$toggle('showModalPermissionDestroy', false)" wire:loading.attr="disabled">
            {{ __('Cancel') }}
        </x-jet-secondary-button>

        <x-jet-danger-button class="ml-3" wire:click="destroyPermission({{ $showModalPermissionDestroy }})" wire:loading.attr="disabled">
            {{ __('Delete') }}
        </x-jet-danger-button>
    </x-slot>
</x-jet-confirmation-modal>