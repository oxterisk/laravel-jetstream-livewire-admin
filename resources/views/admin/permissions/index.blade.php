<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ trans_choice( 'Permission', 2 ) }}
        </h2>
    </x-slot>

    <x-section-container>
        @livewire('admin.permissions')
    </x-section-container>
</x-app-layout>