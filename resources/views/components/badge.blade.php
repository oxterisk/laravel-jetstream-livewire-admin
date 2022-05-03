@props(['text' => '', 'title' => '', 'type' => ''])

@switch( $type )

    @case( 'success' )
        @if( $text == '' )
            @php $class="bg-green-600"; @endphp
        @else
            @php $class="bg-green-100 text-green-800"; @endphp
        @endif
        @break;

    @case( 'danger' )
        @if( $text == '' )
            @php $class="bg-red-600"; @endphp
        @else
            @php $class="bg-red-100 text-red-800"; @endphp
        @endif
        @break;

    @case( 'warning' )
        @if( $text == '' )
            @php $class="bg-orange-400"; @endphp
        @else
            @php $class="bg-orange-100 text-orange-800"; @endphp
        @endif
        @break;

    @case( 'info' )
        @if( $text == '' )
            @php $class="bg-blue-300"; @endphp
        @else
            @php $class="bg-blue-100 text-blue-800"; @endphp
        @endif
        @break;

    @default
        @if( $text == '' )
            @php $class="bg-gray-200"; @endphp
        @else
            @php $class="bg-gray-100 text-gray-800"; @endphp
        @endif

@endswitch

@if ( $text == '' )
    @php $text = '&nbsp;'; @endphp
@endif

<span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full {{ $class }}" title="{{ $title }}">
    {!! $text !!}
</span>
