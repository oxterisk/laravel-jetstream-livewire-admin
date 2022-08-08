<x-jet-dialog-modal wire:model="showModalCompanyForm">
    <x-slot name="title">
        {{ isset( $this->company->id ) ? __('Edit company') : __('Create company') }}
    </x-slot>

    <x-slot name="content">
        <form id="form-company" name="form-company">

            <div class="grid grid-cols-6 gap-6">
                <div class="col-span-6 sm:col-span-4">
                    <div class="grid grid-cols-6 gap-6">
                        <div class="col-span-6">
                            <x-jet-label for="company.name" value="{{ __('Name') }}" />
                            <x-jet-input id="company.name" type="text" class="mt-1 block w-full" wire:model.defer="company.name" />
                            <x-jet-input-error for="company.name" class="mt-2" />
                        </div>
                        <div class="col-span-6">
                            <x-jet-label for="company.phone" value="{{ __('Phone') }}" />
                            <x-jet-input id="company.phone" type="tel" class="mt-1 block w-full" wire:model.defer="company.phone" />
                            <x-jet-input-error for="company.phone" class="mt-2" />
                        </div>
                        <div class="col-span-6">
                            <x-jet-label for="company.email" value="{{ __('Email') }}" />
                            <x-jet-input id="company.email" type="email" class="mt-1 block w-full" wire:model.defer="company.email" />
                            <x-jet-input-error for="company.email" class="mt-2" />
                        </div>
                    </div>
                </div>
                <div class="col-span-6 sm:col-span-2">

                    @if( $companyLogo )
                        <img src="{{ $companyLogo->temporaryUrl() }}" class="w-48 rounded-lg" alt="Logo" />
                    @elseif( isset( $this->company->logo ) && $this->company->logo != '' )
                        <img src="{{ asset('storage/companies/logos') }}/{{ $this->company->logo }}" class="w-48 rounded-lg" alt="Logo" />
                    @else
                    <div class="border-dashed border-8 border-blue-100 rounded-md flex justify-center items-center w-48 h-48">
                        <div class="text-4xl text-blue-100 font-black" >{{ __('Logo') }}</div>
                    </div>
                    @endif
                    <input class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100 mt-2" type="file" id="company.logo" wire:model.defer="companyLogo" />
                    <x-jet-input-error for="companyLogo" class="mt-2" />
                    @if( $companyLogo || ( isset( $this->company->logo ) && $this->company->logo != '' ) )
                    <div class="block w-full text-sm text-gray-500 mr-4 py-2 px-4 rounded-full border-0 text-sm font-semibold bg-red-50 text-red-700 hover:bg-red-100 mt-2">
                        <x-jet-label>
                            <x-jet-checkbox wire:model.defer="removeLogo" />
                            {{ __('Remove logo') }}
                        </x-jet-label>
                    </div>
                    @endif

                </div>
                <div class="col-span-6">
                    <x-jet-label for="company.address" value="{{ __('Address') }}" />
                    <x-jet-input id="company.address" type="text" class="mt-1 block w-full" wire:model.defer="company.address" />
                    <x-jet-input-error for="company.address" class="mt-2" />
                </div>
                <div class="col-span-6 sm:col-span-3">
                    <x-jet-label for="company.city" value="{{ __('City') }}" />
                    <x-jet-input id="company.city" type="text" class="mt-1 block w-full" wire:model.defer="company.city" />
                    <x-jet-input-error for="company.city" class="mt-2" />
                </div>
                <div class="col-span-6 sm:col-span-3">
                    <x-jet-label for="company.country" value="{{ __('Country') }}" />
                    <x-jet-input id="company.country" type="text" class="mt-1 block w-full" wire:model.defer="company.country" />
                    <x-jet-input-error for="company.country" class="mt-2" />
                </div>
                <div class="col-span-6">
                    <x-jet-label for="company.comments" value="{{ __('Comments') }}" />
                    <x-textarea id="company.comments" wire:model.defer="company.comments" style="height:150px" />
                </div>
                <div class="col-span-6 sm:col-span-2">
                    <x-jet-label>
                        <x-jet-checkbox wire:model.defer="company.active" />
                        {{ __('Active') }}
                    </x-jet-label>
                </div>
            </div>
        </form>
    </x-slot>

    <x-slot name="footer">
        <x-jet-secondary-button wire:click="$toggle('showModalCompanyForm', false)" wire:loading.attr="disabled">
            {{ __('Cancel') }}
        </x-jet-secondary-button>

        <x-jet-button class="ml-3" wire:click="storeCompany()" wire:loading.attr="disabled">
            {{ __('Save') }}
        </x-jet-button>
    </x-slot>
</x-jet-dialog-modal>