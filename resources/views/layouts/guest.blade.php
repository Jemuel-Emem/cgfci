<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>GPFCI</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        .background-image {
            background-image: url('{{ asset('images/IMG_5123.JPG') }}');
            background-size: cover;
            background-position: center;
            opacity: 0.25;
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: -1; /* Ensure it stays behind other content */
        }
    </style>
</head>
<body class="font-sans text-gray-900 antialiased relative bg-blue-300">
    <div class="background-image"></div> <!-- Background Image -->

    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0">
        <div>
            <a href="/" wire:navigate>
                <img src="{{ asset('images/Screenshot 2025-01-09 185647.png') }}" alt="SKSU Logo" class="w-20 h-20 fill-current text-gray-500 rounded-full">

            </a>
        </div>

        <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
            {{ $slot }}
        </div>
    </div>
</body>
</html>
