<x-jet-dialog-modal wire:model="showModalCompanies">
    <x-slot name="title">
        {{ __('Assign companies') }}
    </x-slot>

    <x-slot name="content">
        @if( isset( $this->user->id ) && $companies )

            <p class="mt-5 mb-5">
                {{ $this->user->name }} {{ $this->user->last_name }}<br>
                {{ $this->user->email }}
            </p>

            <x-datetable>
                <x-slot name="thead">
                    <x-datetable-th />
                    <x-datetable-th title="{{ __('Name') }}" />
                </x-slot>
                <x-slot name="tbody">

                @foreach ( $companies as $company )
                    <x-datetable-tr iteration="{{ $loop->iteration }}">
                        <x-datetable-td>
                            <input type="checkbox"
                                name="company[{{ $company->name }}]"
                                value="{{ $company->id }}"
                                class='permission'
                                wire:model.defer="userCompanies" />
                        </x-datetable-td>
                        <x-datetable-td>
                            {{ $company->name }}
                        </x-datetable-td>
                    </x-datetable-tr>
                @endforeach

                </x-slot>
            </x-datetable>

        @endif
    </x-slot>

    <x-slot name="footer">
        <x-jet-secondary-button wire:click="$toggle('showModalCompanies', false)" wire:loading.attr="disabled">
            {{ __('Cancel') }}
        </x-jet-secondary-button>

        <x-jet-button class="ml-3" wire:click="storeCompanies({{ $showModalCompanies }})" wire:loading.attr="disabled">
            {{ __('Save') }}
        </x-jet-button>
    </x-slot>
</x-jet-dialog-modal>