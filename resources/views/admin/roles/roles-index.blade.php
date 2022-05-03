<x-datetable searchModel="queryParams" :data="$roles">
    <x-slot name="actions">
        <x-jet-button wire:click="modalRoleForm" >
            {{ __('Create new role') }}
        </x-jet-button>
    </x-slot>
    <x-slot name="thead">
        <x-datetable-th title="{{ __('Id') }}" />
        <x-datetable-th sortable=true field="name" title="{{ __('Name') }}" :sort-by="$sortBy" :sort-asc="$sortAsc" />
        <x-datetable-th sortable=true field="guard_name" title="{{ __('Guard') }}" :sort-by="$sortBy" :sort-asc="$sortAsc" />
        <x-datetable-th field="" title="" />
    </x-slot>
    <x-slot name="tbody">
        @foreach( $roles as $role )
            <x-datetable-tr iteration="{{ $loop->iteration }}">
                <x-datetable-td>
                    {{ $role->id }}
                </x-datetable-td>
                <x-datetable-td>
                    {{ $role->name }}
                </x-datetable-td>
                <x-datetable-td>
                    {{ $role->guard_name }}
                </x-datetable-td>
                <x-datetable-td class="text-right">
                    <x-button-group>
                        <x-button-left wire:click="modalRoleEdit({{ $role->id }})" title="{{ __('Edit') }}">
                            <x-icon-button type="edit" />
                        </x-button-left>
                        <x-button-right wire:click="modalPermissions({{ $role->id }})" title="{{ __('Assign permissions') }}">
                            <x-icon-button type="shield" />
                        </x-button-right>
                    </x-button-group>
                    <x-jet-danger-button wire:click="modalRoleDestroy({{ $role->id }})" wire:loading.attr="disabled" title="{{ __('Delete') }}">
                        <x-icon-button type="del" />
                    </x-jet-danger-button>
                </x-datetable-td>
            </x-datetable-tr>
        @endforeach
    </x-slot>
</x-datetable>