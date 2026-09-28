@props(['title' => null])

<div {{ $attributes->merge(['class' => 'bg-white dark:bg-gray-800 text-gray-800 dark:text-gray-200 rounded-lg shadow-sm border border-gray-100 dark:border-gray-700 p-6']) }}>
    @if ($title)
        <h2 class="text-lg font-semibold mb-3 border-b border-gray-200 dark:border-gray-700 pb-2">{{ $title }}</h2>
    @endif
    <div class="opacity-90">
        {{ $slot }}
    </div>
</div>
