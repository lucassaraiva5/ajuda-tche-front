@props(['wrapperClass' => '', 'label'])

<div class="md:flex md:items-center mb-3 {{ $wrapperClass }}">
    <label class="font-semibold text-gray-900 dark:text-gray-300">
        {{ $label }}
    </label>

    <div class="flex items-center md:flex gap-x-5 md:ms-4">
        {{ $slot }}
    </div>
</div>
