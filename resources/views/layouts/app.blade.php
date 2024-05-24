<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name') }}</title>

    {!! \Biscolab\ReCaptcha\Facades\ReCaptcha::htmlScriptTagJsApi() !!}

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet"/>

    <link rel="icon" href="{{ asset('images/branding/white-icon.png') }}" type="image/x-icon"/>

    {{--        Tailwind --}}
    @vite(['resources/css/app.css','resources/js/app.js'])

    @livewireStyles
</head>
<body class="antialiased">

{{ $slot }}


@if (session()->has('success'))
    <div id="toast-default" class="fixed z-10 top-20 right-10 flex items-center w-full max-w-xs p-4 text-white bg-green-500 rounded-lg shadow dark:text-gray-400 dark:bg-gray-800" role="alert">
        <div class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-green-500 bg-white rounded-lg">
            <x-tabler-circle-check :class="'h-6 w-6'"/>
        </div>
        <div class="ms-3">{{ session()->get('success') }}</div>
        <button type="button" class="ms-auto -mx-1.5 -my-1.5 bg-green-800 text-white hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex items-center justify-center h-8 w-8 dark:text-gray-500 dark:hover:text-white dark:bg-gray-800 dark:hover:bg-gray-700" data-dismiss-target="#toast-default" aria-label="Close">
            <span class="sr-only">Close</span>
            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
            </svg>
        </button>
    </div>
@endif


@if (session()->has('error'))
    <div id="toast-default" class="fixed z-10 top-20 right-10 flex items-center w-full max-w-xs p-4 text-white bg-red-500 rounded-lg shadow dark:text-gray-400 dark:bg-gray-800" role="alert">
        <div class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-red-500 bg-white rounded-lg">
            <x-tabler-alert-circle :class="'h-6 w-6'"/>
        </div>
        <div class="ms-3">{{ session()->get('error') }}</div>
        <button type="button" class="ms-auto -mx-1.5 -my-1.5 bg-red-800 text-white hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex items-center justify-center h-8 w-8 dark:text-gray-500 dark:hover:text-white dark:bg-gray-800 dark:hover:bg-gray-700" data-dismiss-target="#toast-default" aria-label="Close">
            <span class="sr-only">Close</span>
            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
            </svg>
        </button>
    </div>
@endif

@livewireScripts

@stack('js')

</body>
</html>
