@props(['iteration' => 0])

<tr {{ $iteration % 2 == 0 ? 'class=bg-gray-50' : '' }}>
    {{ $slot }}
</tr>