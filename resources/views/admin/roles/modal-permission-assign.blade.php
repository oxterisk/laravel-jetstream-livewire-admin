<x-jet-dialog-modal wire:model="showModalPermissions">
    <x-slot name="title">
        {{ __('Assign permissions') }}
    </x-slot>

    <x-slot name="content">
        @if( isset( $this->role->id ) && $permissions )

            <p class="mt-5 mb-5">
                {{ $this->role->name }}
                @if( $this->role->guard_name != '' )
                    ({{ $this->role->guard_name }})
                @endif
            </p>

            <x-datetable>
                <x-slot name="thead">
                    <x-datetable-th />
                    <x-datetable-th title="{{ __('Name') }}" />
                    <x-datetable-th title="{{ __('Guard') }}" />
                </x-slot>
                <x-slot name="tbody">

                @foreach ( $permissions as $permission )
                    <x-datetable-tr iteration="{{ $loop->iteration }}">
                        <x-datetable-td>
                            <input type="checkbox"
                                name="permission[{{ $permission->name }}]"
                                value="{{ $permission->name }}"
                                class='permission'
                                wire:model.defer="rolePermissions" />
                        </x-datetable-td>
                        <x-datetable-td>
                            {{ $permission->name }}
                        </x-datetable-td>
                        <x-datetable-td>
                            {{ $permission->guard_name }}
                        </x-datetable-td>
                    </x-datetable-tr>
                @endforeach

                </x-slot>
            </x-datetable>

        @endif
    </x-slot>

    <x-slot name="footer">
        <x-jet-secondary-button wire:click="$toggle('showModalPermissions', false)" wire:loading.attr="disabled">
            {{ __('Cancel') }}
        </x-jet-secondary-button>

        <x-jet-button class="ml-3" wire:click="storePermissions({{ $showModalPermissions }})" wire:loading.attr="disabled">
            {{ __('Save') }}
        </x-jet-button>
    </x-slot>
</x-jet-dialog-modal>