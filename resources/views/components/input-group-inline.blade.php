@props(['wrapperClass' => '', 'label'])

<div class="flex items-end mb-3 {{ $wrapperClass }} gap-x-5">
    <label class="font-semibold text-gray-900 dark:text-gray-300">
        {{ $label }}
    </label>

    {{ $slot }}
</div>
