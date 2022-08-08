<x-jet-dialog-modal wire:model="showModalPasswordEdit">
    <x-slot name="title">
        {{ __('Update password') }}
    </x-slot>

    <x-slot name="content">
        @if( isset( $this->user->id ) )
            <p class="mt-5 mb-5">
                {{ $this->user->name }} {{ $this->user->last_name }}<br>
                {{ $this->user->email }}
            </p>
        @endif
        <form id="edit-password" name="edit-password">
            <div class="grid grid-cols-6 gap-6">
                <div class="col-span-6 sm:col-span-3">
                    <x-jet-label for="password" value="{{ __('Password') }}" />
                    <x-jet-input id="password" type="password" class="mt-1 block w-full" wire:model.defer="password" />
                    <x-jet-input-error for="password" class="mt-2" />
                </div>
                <div class="col-span-6 sm:col-span-3">
                    <x-jet-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
                    <x-jet-input id="password_confirmation" type="password" class="mt-1 block w-full" wire:model.defer="password_confirmation" />
                    <x-jet-input-error for="password_confirmation" class="mt-2" />
                </div>
            </div>
        </form>
    </x-slot>

    <x-slot name="footer">
        <x-jet-secondary-button wire:click="$toggle('showModalPasswordEdit', false)" wire:loading.attr="disabled">
            {{ __('Cancel') }}
        </x-jet-secondary-button>

        <x-jet-button class="ml-3" wire:click="storePassword({{ $showModalPasswordEdit }})" wire:loading.attr="disabled">
            {{ __('Save') }}
        </x-jet-button>
    </x-slot>
</x-jet-dialog-modal>