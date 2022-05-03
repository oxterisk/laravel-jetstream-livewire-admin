<x-datetable searchModel="queryParams" :data="$modules">
    <x-slot name="actions">
        <x-jet-button wire:click="modalModuleForm" >
            {{ __('Create new module') }}
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
        <x-datetable-th field="description" title="{{ __('Description') }}" />
        <x-datetable-th field="" title="" />
    </x-slot>
    <x-slot name="tbody">
        @foreach( $modules as $module )
            <x-datetable-tr iteration="{{ $loop->iteration }}">
                <x-datetable-td :wrap=false>
                    @if ( $module->active )
                    <x-badge title="{{ __('Active') }}" type="success" />
                    @else
                    <x-badge title="{{ __('Inactive') }}" type="danger" />
                    @endif
                </x-datetable-td>
                <x-datetable-td>
                    {{ $module->name }}
                </x-datetable-td>
                <x-datetable-td style="white-space:normal;">
                    @if( $module->description != '' )
                        @php
                            mb_internal_encoding( "UTF-8" );
                            $description = mb_substr( $module->description, 0, 250 );
                        @endphp
                        {{ $description }}
                    @endif
                </x-datetable-td>
                <x-datetable-td class="text-right">
                    <x-jet-button wire:click="modalModuleEdit({{ $module->id }})"  title="{{ __('Edit') }}">
                        <x-icon-button type="edit" />
                    </x-jet-button>
                    <x-jet-danger-button wire:click="modalModuleDestroy({{ $module->id }})" wire:loading.attr="disabled" title="{{ __('Delete') }}">
                        <x-icon-button type="del" />
                    </x-jet-danger-button>
                </x-datetable-td>
            </x-datetable-tr>
        @endforeach
    </x-slot>
</x-datetable>