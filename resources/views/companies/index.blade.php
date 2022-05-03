<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Companies') }}
        </h2>
    </x-slot>

    <x-section-container>
        @livewire('companies.companies')
    </x-section-container>
</x-app-layout>