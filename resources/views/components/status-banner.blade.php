@props(['type' => 'success'])

@php
    $typeClasses = match ($type) {
        'success' => 'bg-green-50 dark:bg-green-950 text-green-800 dark:text-green-200 border-green-200 dark:border-green-900',
        'error' => 'bg-red-50 dark:bg-red-950 text-red-800 dark:text-red-200 border-red-200 dark:border-red-900',
        'info' => 'bg-blue-50 dark:bg-blue-950 text-blue-800 dark:text-blue-200 border-blue-200 dark:border-blue-900',
        'warning' => 'bg-yellow-50 dark:bg-yellow-950 text-yellow-800 dark:text-yellow-200 border-yellow-200 dark:border-yellow-900',
        default => 'bg-gray-50 dark:bg-gray-800 text-gray-800 dark:text-gray-200 border-gray-200 dark:border-gray-700',
    };
@endphp

<div {{ $attributes->merge(['class' => "border rounded-md p-4 flex items-start gap-3 shadow-sm $typeClasses"]) }}>
    {{ $slot }}
</div>
