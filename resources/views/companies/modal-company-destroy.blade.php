<x-jet-confirmation-modal wire:model="showModalCompanyDestroy">
    <x-slot name="title">
        {{ __('Delete company') }}
    </x-slot>

    <x-slot name="content">
        {{ __('Are you sure you want to delete this company?') }}
        @if( isset( $this->company->id ) )
            <p class="mt-5">
                {{ $this->company->name }}<br>
                {{ $this->company->city }} - {{ $this->company->country }}
            </p>
        @endif
    </x-slot>

    <x-slot name="footer">
        <x-jet-secondary-button wire:click="$toggle('showModalCompanyDestroy', false)" wire:loading.attr="disabled">
            {{ __('Cancel') }}
        </x-jet-secondary-button>

        <x-jet-danger-button class="ml-3" wire:click="destroyCompany({{ $showModalCompanyDestroy }})" wire:loading.attr="disabled">
            {{ __('Delete') }}
        </x-jet-danger-button>
    </x-slot>
</x-jet-confirmation-modal>