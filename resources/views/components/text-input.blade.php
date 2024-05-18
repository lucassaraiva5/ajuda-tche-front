@props(['name', 'label', 'required' => false, 'placeholder' => '', 'type' => 'text', 'wrapperClass' => []])

<div @class($wrapperClass)>
    <label for="{{ $name }}" class="text-base font-semibold text-gray-800">
        {{ $label }}

        @if ($required)
            <span class="text-gray-400 ms-1 text-sm text-light">Obrigatório</span>
        @endif
    </label>

    <div class="mt-2 relative">
        <input
                {{ $attributes->merge([
                    'type' => $type,
                    'name' => $name,
                    'id' => $name,
                    'placeholder' => $placeholder,
                    'class' => 'block w-full px-3 py-2.5 text-black placeholder-gray-500/2 transition-all duration-200 bg-white border border-gray-200 rounded-md focus:outline-none focus:border-blue-600 caret-blue-600'
                ]) }}
                @required($required)/>
    </div>
</div>
