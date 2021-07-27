<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>


    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">


    <link rel="stylesheet" href="{{ mix('css/app.css') }}">


    <script src="{{ mix('js/app.js') }}" defer></script>

</head>

<body>
    <div class="p-11">
       
        <div class="px-11 py-2 rounded shadow w-full">
            <p>Hi {{ $emailDetails['name'] }},
            <p>
                @if ($emailDetails['status'] == 'Approved')
                    <p> Your request has been {{ $emailDetails['status'] }}</p> <br>
                    <p>Remarks : {{ $request->response }}</p>
                @endif
                @if ($emailDetails['status'] == 'Denied')
                    <p> Your request has been {{ $emailDetails['status'] }}</p> <br>
                    <p>Remarks : {{ $request->response }}</p>
                @endif

                @if ($emailDetails['status'] == 'Ready To Claim')
                    <p> Your document/s is now {{ $emailDetails['status'] }}, Please claim your request on given
                        retrival date
                    </p> <br>
                @endif


            <p class="px-2 text-green-600">Documents</p>
            <ul class="px-5">
                @foreach ($request->documents as $document)
                    <li>{{ $document->name }}</li>
                @endforeach
            </ul>
            <p>{{ $emailDetails['message'] }}</p>
        </div>
    </div>

</body>

</html>
