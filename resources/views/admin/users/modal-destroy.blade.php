<x-jet-confirmation-modal wire:model="showModalUserDestroy">
    <x-slot name="title">
        {{ __('Delete user') }}
    </x-slot>

    <x-slot name="content">
        {{ __('Are you sure you want to delete this?', ['concept' => strtolower( trans_choice( 'User', 1 ) )]) }}
        @if( isset( $this->user->id ) )
            <p class="mt-5">
                {{ $this->user->name }} {{ $this->user->last_name }}<br>
                {{ $this->user->email }}
            </p>
        @endif
    </x-slot>

    <x-slot name="footer">
        <x-jet-secondary-button wire:click="$toggle('showModalUserDestroy', false)" wire:loading.attr="disabled">
            {{ __('Cancel') }}
        </x-jet-secondary-button>

        <x-jet-danger-button class="ml-3" wire:click="destroyUser({{ $showModalUserDestroy }})" wire:loading.attr="disabled">
            {{ __('Delete') }}
        </x-jet-danger-button>
    </x-slot>
</x-jet-confirmation-modal>