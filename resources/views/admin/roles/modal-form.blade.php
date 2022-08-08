<x-jet-dialog-modal wire:model="showModalRoleForm">
    <x-slot name="title">
        {{ isset( $this->role->id ) ? __('Edit role') : __('Create role') }}
    </x-slot>

    <x-slot name="content">
        <form id="form-user" name="form-user">
            <div class="grid grid-cols-6 gap-6">
                <div class="col-span-6">
                    <x-jet-label for="role.name" value="{{ __('Name') }}" />
                    <x-jet-input id="role.name" type="text" class="mt-1 block w-full" wire:model.defer="role.name" />
                    <x-jet-input-error for="role.name" class="mt-2" />
                </div>
                <div class="col-span-6">
                    <x-jet-label for="role.guard_name" value="{{ __('Guard') }}" />
                    @if( isset( $select_guards ) )
                        <x-select wire:model="role.guard_name">
                        @if( isset( $this->role->guard_name ) && !in_array( $this->role->guard_name, $select_guards ) )
                            <option class="text-red-600" value="{{ $this->role->guard_name }}" selected>{{ $this->role->guard_name }} (!)</option>
                        @endif
                        @foreach( $select_guards as $guard )
                            @php
                                $selected = isset( $this->role->guard_name ) && $this->role->guard_name == $guard ? ' selected' : '';
                            @endphp
                            <option value="{{ $guard }}"{{ $selected }}>{{ $guard }}</option>
                        @endforeach
                        </x-select>
                    @endif
                    <x-jet-input-error for="role.guard_name" class="mt-2" />
                </div>
            </div>
        </form>
    </x-slot>

    <x-slot name="footer">
        <x-jet-secondary-button wire:click="$toggle('showModalRoleForm', false)" wire:loading.attr="disabled">
            {{ __('Cancel') }}
        </x-jet-secondary-button>

        <x-jet-button class="ml-3" wire:click="storeRole()" wire:loading.attr="disabled">
            {{ __('Save') }}
        </x-jet-button>
    </x-slot>
</x-jet-dialog-modal>