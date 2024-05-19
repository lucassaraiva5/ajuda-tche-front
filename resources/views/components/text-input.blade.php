@props(['name', 'label', 'required' => false, 'placeholder' => '', 'type' => 'text', 'wrapperClass' => [], 'value' => '', 'disabled' => false])

<div @class($wrapperClass)>
    <label for="{{ $name }}" @class([
        'text-base font-semibold',
        'text-gray-800' => !$disabled,
        'font-medium text-gray-300' => $disabled,
    ])>
        {{ $label }}

        @if ($required)
            <span class="text-gray-400 ms-1 text-sm text-light">Obrigatório</span>
        @endif
    </label>

    <div class="mt-2 relative">
        <input
                {{ $attributes->merge([
                    'wire:key' => $name,
                    'type' => $type,
                    'name' => $name,
                    'id' => $name,
                    'placeholder' => $placeholder,
                    'class' => 'block w-full px-3 py-2.5 text-black placeholder-gray-500/2 transition-all duration-200 bg-white disabled:placeholder-gray-200 border border-gray-200 rounded-md focus:outline-none focus:border-blue-600 caret-blue-600' . ($errors->has($name) ? ' border-red-600' : ''),
                    'value' => old($name, $value ?? null),
                ]) }}
                @disabled($disabled)
                @required($required)/>

        @error($name)
        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>
</div>
