<x-datetable searchModel="queryParams" :data="$users">
    <x-slot name="actions">
        <x-jet-button wire:click="modalUserForm" >
            {{ __('Create user') }}
        </x-jet-button>
    </x-slot>
    <x-slot name="filters">
        <div class="flex gap-4 flex items-center">

            @if( $select_companies->count() > 0 )
            <div class="flex justify-center">
                <div class="xl:w-96">
                    <x-select wire:model="company_id">
                        <option selected value="">-- {{ __('Select company') }} --</option>
                        <option value="-1">{{ __('Without company') }}</option>
                        @foreach( $select_companies as $company )
                            <option class="@if ( $company->active ) text-red-600 @endif" value="{{ $company->id }}">{{ $company->name }}</option>
                        @endforeach
                    </x-select>
                </div>
            </div>
            @endif

            <div>
                <x-jet-label>
                    <x-jet-checkbox wire:model="active" />
                    {{ __('Only active') }}
                </x-jet-label>
            </div>
            <div>
                <x-jet-label>
                    <x-jet-checkbox wire:model="admin" />
                    {{ __('Only admin') }}
                </x-jet-label>
            </div>
        </div>
    </x-slot>
    <x-slot name="thead">
        <x-datetable-th />
        <x-datetable-th sortable=true field="name" title="{{ __('Name') }}" :sort-by="$sortBy" :sort-asc="$sortAsc" />
        <x-datetable-th sortable=true field="email" title="{{ __('Email') }} / {{ __('Username') }}" :sort-by="$sortBy" :sort-asc="$sortAsc" />
        <x-datetable-th field="" title="" />
    </x-slot>
    <x-slot name="tbody">
        @foreach( $users as $user )
            <x-datetable-tr iteration="{{ $loop->iteration }}">
                <x-datetable-td :wrap=false>
                    @if( $user->active )
                        <x-badge title="{{ __('Active') }}" type="success" />
                    @else
                        <x-badge title="{{ __('Inactive') }}" type="danger" />
                    @endif
                </x-datetable-td>
                <x-datetable-td>
                    <div class="flex">
                        {{ $user->name }} {{ $user->last_name }}
                    </div>
                </x-datetable-td>
                <x-datetable-td>
                    <a href="mailto:{{ $user->email }}">{{ $user->email }}</a>
                </x-datetable-td>
                <x-datetable-td class="text-right">
                    @if( !$admin )
                        @if( $user->is_admin )
                            <span title="Admin" class="inline-flex items-center text-yellow-500">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M2.166 4.999A11.954 11.954 0 0010 1.944 11.954 11.954 0 0017.834 5c.11.65.166 1.32.166 2.001 0 5.225-3.34 9.67-8 11.317C5.34 16.67 2 12.225 2 7c0-.682.057-1.35.166-2.001zm11.541 3.708a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                                </svg>
                            </span>
                        @endif
                    @endif
                    <x-button-group>
                        <x-button-left wire:click="modalUserEdit({{ $user->id }})" title="{{ __('Edit') }}">
                            <x-icon-button type="edit" />
                        </x-button-left>
                        @if( $user->is_admin )
                            <x-button-right wire:click="modalPasswordEdit({{ $user->id }})" title="{{ __('Update password') }}">
                                <x-icon-button type="password" />
                            </x-button-right>
                        @else
                            <x-button-center wire:click="modalPasswordEdit({{ $user->id }})" title="{{ __('Update password') }}">
                                <x-icon-button type="password" />
                            </x-button-center>
                            <x-button-right wire:click="modalRoles({{ $user->id }})" title="{{ __('Assign roles') }}">
                                <x-icon-button type="briefcase" />
                            </x-button-right>
                        @endif
                    </x-button-group>
                    <x-jet-button wire:click="modalCompanies({{ $user->id }})" title="{{ __('Assign company') }}">
                        <x-icon-button type="office" />
                    </x-jet-button>
                    <x-jet-danger-button wire:click="modalUserDestroy({{ $user->id }})" wire:loading.attr="disabled" title="{{ __('Delete') }}">
                        <x-icon-button type="del" />
                    </x-jet-danger-button>
                </x-datetable-td>
            </x-datetable-tr>
        @endforeach
    </x-slot>
</x-datetable>