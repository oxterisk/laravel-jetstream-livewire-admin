<x-jet-dialog-modal wire:model="showModalRoles">
    <x-slot name="title">
        {{ __('Assign roles') }}
    </x-slot>

    <x-slot name="content">
        @if( isset( $this->user->id ) && $roles )

            <p class="mt-5 mb-5">
                {{ $this->user->name }} {{ $this->user->last_name }}<br>
                {{ $this->user->email }}
            </p>

            <x-datetable>
                <x-slot name="thead">
                    <x-datetable-th />
                    <x-datetable-th title="{{ __('Name') }}" />
                    <x-datetable-th title="{{ __('Guard') }}" />
                </x-slot>
                <x-slot name="tbody">

                @foreach ( $roles as $role )
                    <x-datetable-tr iteration="{{ $loop->iteration }}">
                        <x-datetable-td>
                            <input type="checkbox"
                                name="role[{{ $role->name }}]"
                                value="{{ $role->name }}"
                                class='permission'
                                wire:model.defer="userRoles" />
                        </x-datetable-td>
                        <x-datetable-td>
                            {{ $role->name }}
                        </x-datetable-td>
                        <x-datetable-td>
                            {{ $role->guard_name }}
                        </x-datetable-td>
                    </x-datetable-tr>
                @endforeach

                </x-slot>
            </x-datetable>

        @endif
    </x-slot>

    <x-slot name="footer">
        <x-jet-secondary-button wire:click="$toggle('showModalRoles', false)" wire:loading.attr="disabled">
            {{ __('Cancel') }}
        </x-jet-secondary-button>

        <x-jet-button class="ml-3" wire:click="storeRoles({{ $showModalRoles }})" wire:loading.attr="disabled">
            {{ __('Save') }}
        </x-jet-button>
    </x-slot>
</x-jet-dialog-modal>