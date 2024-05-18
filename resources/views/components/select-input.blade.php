@props([
    'name',
    'label',
    'options',
    'required' => false,
    'placeholder' => '',
    'type' => 'text',
    'wrapperClass' => []
])

<div @class($wrapperClass)>
    <label for="{{ $name }}" class="text-base font-semibold text-gray-800">
        {{ $label }}

        @if ($required)
            <span class="text-gray-400 ms-1 text-sm text-light">Obrigatório</span>
        @endif
    </label>

    <div class="mt-2 relative">
        <select
                {{ $attributes->merge([
                    'type' => $type,
                    'name' => $name,
                    'id' => $name,
                    'class' => 'block w-full px-3 py-2.5 text-black placeholder-gray-500/2 transition-all duration-200 bg-white border border-gray-200 rounded-md focus:outline-none focus:border-blue-600 caret-blue-600'
                ]) }}
                @required($required)>
            @if ($required && str($placeholder)->isNotEmpty())
                <option value="" class="text-gray-500">{{ $placeholder }}</option>
            @endif

            @foreach ($options as $option)
                <option value="{{ $option['value'] }}">{{ $option['label'] }}</option>
            @endforeach
        </select>
    </div>
</div>
