<x-jet-dialog-modal wire:model="showModalUserForm">
    <x-slot name="title">
        {{ isset( $this->user->id ) ? __('Edit user') : __('Create user') }}
    </x-slot>

    <x-slot name="content">
        <form id="form-user" name="form-user">
            <div class="grid grid-cols-6 gap-6">
                <div class="col-span-6 sm:col-span-3">
                    <x-jet-label for="user.name" value="{{ __('Name') }}" />
                    <x-jet-input id="user.name" type="text" class="mt-1 block w-full" wire:model.defer="user.name" />
                    <x-jet-input-error for="user.name" class="mt-2" />
                </div>
                <div class="col-span-6 sm:col-span-3">
                    <x-jet-label for="user.last_name" value="{{ __('Last name') }}" />
                    <x-jet-input id="user.last_name" type="text" class="mt-1 block w-full" wire:model.defer="user.last_name" />
                    <x-jet-input-error for="user.last_name" class="mt-2" />
                </div>
                <div class="col-span-6">
                    <x-jet-label for="user.phone" value="{{ __('Phone') }}" />
                    <x-jet-input id="user.phone" type="tel" class="mt-1 block w-full" wire:model.defer="user.phone" />
                    <x-jet-input-error for="user.phone" class="mt-2" />
                </div>
                <div class="col-span-6">
                    <x-jet-label for="user.email" value="{{ __('Email') }} / {{ __('Username') }}" />
                    <x-jet-input id="user.email" type="email" class="mt-1 block w-full" wire:model.defer="user.email" />
                    <x-jet-input-error for="user.email" class="mt-2" />
                </div>
                @if( !isset( $this->user->id ) )
                <div class="col-span-6 sm:col-span-3">
                    <x-jet-label for="user.password" value="{{ __('Password') }}" />
                    <x-jet-input id="user.password" type="password" class="mt-1 block w-full" wire:model.defer="user.password" />
                    <x-jet-input-error for="user.password" class="mt-2" />
                </div>
                <div class="col-span-6 sm:col-span-3">
                    <x-jet-label for="user.password_confirmation" value="{{ __('Confirm Password') }}" />
                    <x-jet-input id="user.password_confirmation" type="password" class="mt-1 block w-full" wire:model.defer="user.password_confirmation" />
                    <x-jet-input-error for="user.password_confirmation" class="mt-2" />
                </div>
                @endif
                <div class="col-span-6">
                    <x-jet-label for="user.comments" value="{{ __('Comments') }}" />
                    <x-textarea id="user.comments" wire:model.defer="user.comments" style="height:150px" />
                </div>
                <div class="col-span-6 sm:col-span-2">
                    <x-jet-label>
                        <x-jet-checkbox wire:model.defer="user.active" />
                        {{ __('Active') }}
                    </x-jet-label>
                </div>
                <div class="col-span-6 sm:col-span-2">
                    <x-jet-label>
                        <x-jet-checkbox wire:model.defer="user.is_admin" />
                        {{ __('Admin') }}
                    </x-jet-label>
                </div>
            </div>
        </form>
    </x-slot>

    <x-slot name="footer">
        <x-jet-secondary-button wire:click="$toggle('showModalUserForm', false)" wire:loading.attr="disabled">
            {{ __('Cancel') }}
        </x-jet-secondary-button>

        <x-jet-button class="ml-3" wire:click="storeUser()" wire:loading.attr="disabled">
            {{ __('Save') }}
        </x-jet-button>
    </x-slot>
</x-jet-dialog-modal>