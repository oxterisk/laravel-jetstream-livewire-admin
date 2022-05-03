<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Modules') }}
        </h2>
    </x-slot>

    <x-section-container>
        @livewire('modules.modules')
    </x-section-container>
</x-app-layout>