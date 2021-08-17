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

        @media print {
            #break-after {
                page-break-after: always !important;
            }
        }

        @page {
            margin-top: 2mm !important;
            margin-bottom: 5mm !important;
        }

    </style>

</head>

<body>
    @livewire('registrar.printpdf',[
    'status'=>$status,
    'startDate'=>$startDate,
    'endDate'=>$endDate,
    ])
    @livewireScripts
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            window.print();
        })
    </script>
</body>


</html>
