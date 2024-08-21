@props(['active'])

@php
$defaultClasses = 'flex items-center gap-x-2 w-full ps-3 pe-4 py-2 text-start text-base font-medium transition duration-150 ease-in-out';
$activeClasses = 'border-l-4 border-indigo-400 text-indigo-700 bg-indigo-50 focus:text-indigo-800 focus:bg-indigo-100 focus:border-indigo-700';
$inactiveClasses = 'border-l-4 border-transparent text-gray-600 hover:text-gray-800 hover:bg-gray-50 hover:border-gray-300 focus:text-gray-800 focus:bg-gray-50 focus:border-gray-300';

$classes = $defaultClasses . ' ' . ($active ?? false ? $activeClasses : $inactiveClasses);
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
