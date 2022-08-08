<x-jet-dialog-modal wire:model="showModalPermissionForm">
    <x-slot name="title">
        {{ isset( $this->permission->id ) ? __('Edit permission') : __('Create permission') }}
    </x-slot>

    <x-slot name="content">
        <form id="form-user" name="form-user">
            <div class="grid grid-cols-6 gap-6">
                <div class="col-span-6">
                    <x-jet-label for="permission.name" value="{{ __('Name') }}" />
                    <x-jet-input id="permission.name" type="text" class="mt-1 block w-full" wire:model.defer="permission.name" />
                    <x-jet-input-error for="permission.name" class="mt-2" />
                </div>
                <div class="col-span-6">
                    <x-jet-label for="permission.guard_name" value="{{ __('Guard') }}" />
                    @if( isset( $select_guards ) )
                        <x-select wire:model="permission.guard_name">
                        @if( isset( $this->permission->guard_name ) && !in_array( $this->permission->guard_name, $select_guards ) )
                            <option class="text-red-600" value="{{ $this->permission->guard_name }}" selected>{{ $this->permission->guard_name }} (!)</option>
                        @endif
                        @foreach( $select_guards as $guard )
                            @php
                                $selected = isset( $this->permission->guard_name ) && $this->permission->guard_name == $guard ? ' selected' : '';
                            @endphp
                            <option value="{{ $guard }}"{{ $selected }}>{{ $guard }}</option>
                        @endforeach
                        </x-select>
                    @endif
                    <x-jet-input-error for="permission.guard_name" class="mt-2" />
                </div>
            </div>
        </form>
    </x-slot>

    <x-slot name="footer">
        <x-jet-secondary-button wire:click="$toggle('showModalPermissionForm', false)" wire:loading.attr="disabled">
            {{ __('Cancel') }}
        </x-jet-secondary-button>

        <x-jet-button class="ml-3" wire:click="storePermission()" wire:loading.attr="disabled">
            {{ __('Save') }}
        </x-jet-button>
    </x-slot>
</x-jet-dialog-modal>