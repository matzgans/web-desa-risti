@props(['active'])

@php
    $classes =
        $active ?? false
            ? 'group flex items-center rounded-lg p-2 bg-white text-secondary hover:bg-gray-100 hover:text-secondary dark:text-white dark:hover:bg-gray-100'
            : 'group flex items-center rounded-lg p-2 text-white hover:bg-gray-100 hover:text-secondary dark:text-white dark:hover:bg-gray-100';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
