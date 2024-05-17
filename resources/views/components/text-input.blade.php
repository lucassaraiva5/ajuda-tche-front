@props(['name', 'label', 'required' => false, 'placeholder' => ''])

<div>
    <label for="{{ $name }}" class="text-base font-medium text-gray-900">
        {{ $label }}

        @if ($required)
            <span class="text-gray-500 ms-2">Obrigatório</span>
        @endif
    </label>
    <div class="mt-2.5 relative">
        <input type="text" name="{{ $name }}" id="{{ $name }}" placeholder="{{ $placeholder }}" class="block w-full px-4 py-4 text-black placeholder-gray-500 transition-all duration-200 bg-white border border-gray-200 rounded-md focus:outline-none focus:border-blue-600 caret-blue-600" @required($required)/>
    </div>
</div>
