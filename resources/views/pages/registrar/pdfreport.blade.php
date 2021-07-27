<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>SKSU OREACAD REPORT</title>


    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">


    <link rel="stylesheet" href="{{ mix('css/app.css') }}">

    @livewireStyles

    <script src="{{ mix('js/app.js') }}" defer></script>

    <style>
        [x-cloak] {
            display: none
        }

        @page {
            size: auto;
            margin-top: 0mm;
            margin-bottom: 0mm;
        }

    </style>

</head>

<body>
    @livewire('registrar.printpdf',[
    'status'=>$status,
    'year'=>$year,
    'month'=>$month,
    ])
    @livewireScripts
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            window.print();
        })
    </script>
</body>


</html>
