<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>SKSU OROFARE</title>

    <link rel="stylesheet" href="{{ mix('css/app.css') }}">

    <script src="{{ mix('js/app.js') }}" defer></script>
</head>

<body>
    <div class="p-11">
        <div class="text-3xl font-semibold text-green-600 flex space-x-5 items-center">
        </div>
        <div class="px-11 py-2">
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
