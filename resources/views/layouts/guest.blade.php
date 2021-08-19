<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="keywords" content="Sultan Kudarat State University">
    <meta name="description" content="SKSU Online Request of Academic Records">
    <link rel="icon" href="{{ asset('images/titleIcon.png') }}">

    <title>{{ config('app.name', 'Laravel') }}</title>


    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">


    <link rel="stylesheet" href="{{ mix('css/app.css') }}">

    @livewireStyles

    <script src="{{ mix('js/app.js') }}" defer></script>

    <style>
        [x-cloak] {
            display: none
        }

    </style>
</head>

<body>
    <div class="h-screen">
        {{ $slot }}

    </div>

    @livewireScripts
</body>

</html>
