<x-datetable searchModel="queryParams" :data="$companies">
    <x-slot name="actions">
        <x-jet-button wire:click="modalCompanyForm" >
            {{ __('Create new company') }}
        </x-jet-button>
    </x-slot>
    <x-slot name="filters">
        <div class="flex gap-4">
            <div>
                <x-jet-label>
                    <x-jet-checkbox wire:model="active" />
                    {{ __('Only active') }}
                </x-jet-label>
            </div>
        </div>
    </x-slot>
    <x-slot name="thead">
        <x-datetable-th />
        <x-datetable-th sortable=true field="name" title="{{ __('Name') }}" :sort-by="$sortBy" :sort-asc="$sortAsc" />
        <x-datetable-th title="{{ __('Contact') }}" />
        <x-datetable-th sortable=true field="city" title="{{ __('City') }} / {{ __('Country') }}" :sort-by="$sortBy" :sort-asc="$sortAsc" />
        <x-datetable-th field="" title="" />
    </x-slot>
    <x-slot name="tbody">
        @foreach( $companies as $company )
            <x-datetable-tr iteration="{{ $loop->iteration }}">
                <x-datetable-td :wrap=false>
                    @if ( $company->active )
                    <x-badge title="{{ __('Active') }}" type="success" />
                    @else
                    <x-badge title="{{ __('Inactive') }}" type="danger" />
                    @endif
                </x-datetable-td>
                <x-datetable-td>
                    {{ $company->name }}
                </x-datetable-td>
                <x-datetable-td class="text-right">
                    <a href="tel:{{ $company->phone }}">{{ $company->phone }}</a><br>
                    <a href="mailto:{{ $company->email }}">{{ $company->email }}</a>
                </x-datetable-td>
                <x-datetable-td>
                    {{ $company->city }}<br>
                    {{ $company->country }}
                </x-datetable-td>
                <x-datetable-td class="text-right">
                    <x-jet-button wire:click="modalCompanyEdit({{ $company->id }})"  title="{{ __('Edit') }}">
                        <x-icon-button type="edit" />
                    </x-jet-button>
                    <x-jet-button wire:click="modalModules({{ $company->id }})" title="{{ __('Assign modules') }}">
                        <x-icon-button type="puzzle" />
                    </x-jet-button>
                    <x-jet-danger-button wire:click="modalCompanyDestroy({{ $company->id }})" wire:loading.attr="disabled" title="{{ __('Delete') }}">
                        <x-icon-button type="del" />
                    </x-jet-danger-button>
                </x-datetable-td>
            </x-datetable-tr>
        @endforeach
    </x-slot>
</x-datetable>