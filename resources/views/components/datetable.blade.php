@props(['filters' => '', 'actions' => '', 'thead' => '', 'tbody' => '', 'data' => '', 'searchModel' => ''])

<div class="mb-5">
    @if( session()->has('flash.banner') )
        <x-jet-banner style="{{ session('flash.bannerStyle') }}" message="{{ session('flash.banner') }}" />
    @endif
</div>

@if ( $searchModel != '' || $actions != '' )
<div class="flex flex-col md:flex-row justify-between gap-3 mb-5">
    @if ( $searchModel != '' )
    <div class="relative rounded-md shadow-sm order-2 md:order-1">
        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
            <span class="text-gray-500 sm:text-sm">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd" />
                </svg>
            </span>
        </div>
        <input wire:model.debounce.500ms="{{ $searchModel }}" type="text" name="search-{{ $searchModel }}" id="search-{{ $searchModel }}" class="focus:ring-indigo-500 focus:border-indigo-500 block w-full pl-10 pr-12 sm:text-sm border-gray-300 rounded-md" placeholder="{{ __("Search") }}">
    </div>
    @endif
    <div class="order-1 md:order-2">
        <div>
            {{ $actions }}
        </div>
    </div>
</div>
@endif

@if ( $filters != '' )
<div class="bg-gray-50 shadow mb-5 p-4 rounded-md text-gray-800 text-sm">
    {{ $filters }}
</div>
@endif

<div class="flex flex-col">
    <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
        <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
            <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">

                <table class="w-full divide-y divide-gray-200 table-striped">
                    <thead class="bg-gray-200">
                        <tr>
                            {{ $thead }}
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        {{ $tbody }}
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</div>

@if ( $data != '' )
<div class="mt-4">
    {{ $data->links() }}
</div>
@endif