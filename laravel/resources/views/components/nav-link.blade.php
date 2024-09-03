@props(['mobile' => false, 'active' => false, 'type' => 'a'])

@if ($type === 'a')
<a class="{{ $mobile ? 'block' : ''}} rounded-md px-3 py-2 text-base font-medium {{ $active ? 'text-white bg-gray-900' : 'text-gray-300 hover:bg-gray-700 hover:text-white'}}"
    aria-current="{{ $active ? 'page' : 'false' }}"
    {{ $attributes }}>
    {{ $slot }}
</a>
@else
<button class="{{ $mobile ? 'block' : ''}} rounded-md px-3 py-2 text-base font-medium {{ $active ? 'text-white bg-gray-900' : 'text-gray-300 hover:bg-gray-700 hover:text-white'}}"
    onclick="window.location.href='{{ $attributes['href'] }}'"
    aria-current="{{ $active ? 'page' : 'false' }}"
    {{ $attributes }}>
    {{ $slot }}
</button>
@endif