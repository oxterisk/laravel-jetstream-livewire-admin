<x-datetable searchModel="queryParams" :data="$permissions">
    <x-slot name="actions">
        <x-jet-button wire:click="modalPermissionForm" >
            {{ __('Create permission') }}
        </x-jet-button>
    </x-slot>
    <x-slot name="thead">
        <x-datetable-th title="{{ __('Id') }}" />
        <x-datetable-th sortable=true field="name" title="{{ __('Name') }}" :sort-by="$sortBy" :sort-asc="$sortAsc" />
        <x-datetable-th sortable=true field="guard_name" title="{{ __('Guard') }}" :sort-by="$sortBy" :sort-asc="$sortAsc" />
        <x-datetable-th field="" title="" />
    </x-slot>
    <x-slot name="tbody">
        @foreach( $permissions as $permission )
            <x-datetable-tr iteration="{{ $loop->iteration }}">
                <x-datetable-td>
                    {{ $permission->id }}
                </x-datetable-td>
                <x-datetable-td>
                    {{ $permission->name }}
                </x-datetable-td>
                <x-datetable-td>
                    {{ $permission->guard_name }}
                </x-datetable-td>
                <x-datetable-td class="text-right">
                    <x-jet-button wire:click="modalPermissionEdit({{ $permission->id }})" title="{{ __('Edit') }}">
                        <x-icon-button type="edit" />
                    </x-jet-button>
                    <x-jet-danger-button wire:click="modalPermissionDestroy({{ $permission->id }})" wire:loading.attr="disabled" title="{{ __('Delete') }}">
                        <x-icon-button type="del" />
                    </x-jet-danger-button>
                </x-datetable-td>
            </x-datetable-tr>
        @endforeach
    </x-slot>
</x-datetable>