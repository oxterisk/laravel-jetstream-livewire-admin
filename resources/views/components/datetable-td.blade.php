@props(['wrap' => true])

<td {{ $attributes->merge(['class' => 'px-6 py-4 whitespace-nowrap']) }}>
    @if( $wrap )
    <div class="text-sm text-gray-900">
        {{ $slot }}
    </div>
    @else
        {{ $slot }}
    @endif
</td>