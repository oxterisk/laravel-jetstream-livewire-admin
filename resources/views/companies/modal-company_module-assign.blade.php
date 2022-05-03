<x-jet-dialog-modal wire:model="showModalModules">
    <x-slot name="title">
        {{ __('Assign modules') }}
    </x-slot>

    <x-slot name="content">
        @if( isset( $this->company->id ) && $modules )

            <p class="mt-5 mb-5">
                {{ $this->company->name }}<br>
                {{ $this->company->city }} - {{ $this->company->country }}
            </p>

            <x-datetable>
                <x-slot name="thead">
                    <x-datetable-th />
                    <x-datetable-th title="{{ __('Name') }}" />
                </x-slot>
                <x-slot name="tbody">

                @foreach ( $modules as $module )
                    <x-datetable-tr iteration="{{ $loop->iteration }}">
                        <x-datetable-td>
                            <input type="checkbox"
                                name="module[{{ $module->name }}]"
                                value="{{ $module->id }}"
                                class='permission'
                                wire:model.defer="companyModules" />
                        </x-datetable-td>
                        <x-datetable-td>
                            {{ $module->name }}
                        </x-datetable-td>
                    </x-datetable-tr>
                @endforeach

                </x-slot>
            </x-datetable>

        @endif
    </x-slot>

    <x-slot name="footer">
        <x-jet-secondary-button wire:click="$toggle('showModalModules', false)" wire:loading.attr="disabled">
            {{ __('Cancel') }}
        </x-jet-secondary-button>

        <x-jet-button class="ml-3" wire:click="storeModules({{ $showModalModules }})" wire:loading.attr="disabled">
            {{ __('Save') }}
        </x-jet-button>
    </x-slot>
</x-jet-dialog-modal>