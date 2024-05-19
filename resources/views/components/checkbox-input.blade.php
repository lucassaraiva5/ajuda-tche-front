@props(['name', 'label', 'value', 'wrapperClass' => '', 'id' => $name . '-' . str($value)->slug()])

<div class="flex items-center {{ $wrapperClass }}">
    <input
        {{ $attributes->merge([
        'type' => 'checkbox',
        'id' => $id,
        'name' => $name,
        'class' => "w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600",
        'value' => $value
    ]) }}>

    <label for="{{ $id }}" class="ms-3 font-medium text-gray-900 dark:text-gray-300">
        <span>{{ $label }}</span>

        @error($name)
            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
        @enderror
    </label>
</div>
