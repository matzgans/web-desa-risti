@props(['active'])

@php
    $classes =
        $active ?? false
            ? 'group flex w-full items-center rounded-lg p-2 pl-11 text-secondary bg-white transition duration-75 hover:bg-gray-100 hover:text-secondary dark:text-white dark:hover:bg-gray-700'
            : 'group flex w-full items-center rounded-lg p-2 pl-11 text-white transition duration-75 hover:bg-gray-100 hover:text-secondary dark:text-white dark:hover:bg-gray-700';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
