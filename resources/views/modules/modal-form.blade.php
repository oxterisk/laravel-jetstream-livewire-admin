<x-jet-dialog-modal wire:model="showModalModuleForm">
    <x-slot name="title">
        {{ isset( $this->module->id ) ? __('Edit module') : __('Create module') }}
    </x-slot>

    <x-slot name="content">
        <form id="form-module" name="form-module">
            <div class="grid grid-cols-6 gap-6">
                <div class="col-span-6">
                    <x-jet-label for="module.name" value="{{ __('Name') }}" />
                    <x-jet-input id="module.name" type="text" class="mt-1 block w-full" wire:model.defer="module.name" />
                    <x-jet-input-error for="module.name" class="mt-2" />
                </div>
                <div class="col-span-6">
                    <x-jet-label for="module.description" value="{{ __('Description') }}" />
                    <x-textarea id="module.description" wire:model.defer="module.description" style="height:150px" />
                </div>
                <div class="col-span-6 sm:col-span-2">
                    <x-jet-label>
                        <x-jet-checkbox wire:model.defer="module.active" />
                        {{ __('Active') }}
                    </x-jet-label>
                </div>
            </div>
        </form>
    </x-slot>

    <x-slot name="footer">
        <x-jet-secondary-button wire:click="$toggle('showModalModuleForm', false)" wire:loading.attr="disabled">
            {{ __('Cancel') }}
        </x-jet-secondary-button>

        <x-jet-button class="ml-3" wire:click="storeModule()" wire:loading.attr="disabled">
            {{ __('Save') }}
        </x-jet-button>
    </x-slot>
</x-jet-dialog-modal>