@props(['tag', 'variant' => 'base' ])

@php
    $classes = 'bg-white/10 rounded-xl hover:bg-white/25 transition-colors duration-300 ';

    if ($variant === 'base') {
        $classes .= 'px-5 py-1 text-sm font-bold';
    }

    if ($variant === 'small') {
        $classes .= 'px-3 py-1 text-2xs';
    }

@endphp

<a href="/tags/{{ htmlspecialchars(strtolower($tag->name)) }}" {{ $attributes->merge(['class' => $classes]) }}>
    {{ htmlspecialchars($tag->name) }}
</a>
