<div class="flex flex-col ">
    <div class="py-10 flex items-center justify-center space-x-3">
        <div class="">
            <img src="{{ asset('images/sksu1.png') }}" class="h-16 w-16" alt="">
        </div>
        <div class="grid items-center justify-center">
            <h1 class="text-lg text-center">SULTAN KUDARAT STATUS UNIVERSITY</h1>
            <h1 class="text-sm text-center">Online Request of Academic Documents</h1>

        </div>
        <div class="">
            <img src="{{ asset('images/OREACADLogo.svg') }}" class="h-20 w-20" alt="">
        </div>
    </div>
    <div>
        <div class="p-10">
            <div class="flex justify-between">
                @if ($status == '')
                    <h1>All Requests</h1>
                @else
                    <h1>{{ $status }}Request</h1>
                @endif
                <h1>Date : {{ DateTime::createFromFormat('!m', $month)->format('F') }} , {{ $year }}</h1>

            </div>
        </div>
        <div class="flex flex-col">

            <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                    <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th scope="col"
                                        class=" py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Name
                                    </th>
                                    <th scope="col"
                                        class=" py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Document/s
                                    </th>
                                    <th scope="col"
                                        class=" py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Receiver name
                                    </th>
                                    <th scope="col"
                                        class=" py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Date
                                    </th>



                                </tr>
                            </thead>
                            <tbody class="text-xs bg-white divide-y divide-gray-200">
                                @foreach ($requests as $request)
                                    <tr>
                                        <td class="py-4 whitespace-nowrap font-medium text-gray-900">
                                            {{ $request->information->firstname . ' ' . $request->information->middlename . ' ' . $request->information->lastname }}
                                        </td>
                                        <td class="py-3 grid flex-shrink item-center  whitespace-nowrap text-gray-500">
                                            @foreach ($request->documents as $document)
                                                <div class="my-auto">{{ $document->name }}</div>
                                            @endforeach
                                        </td>
                                        <td class="py-4 whitespace-nowrap text-gray-500">
                                            {{ $request->receivername }}
                                        </td>
                                        <td class="py-4 whitespace-nowrap text-gray-500">
                                            {{ date('M d', strtotime($request->created_at)) }}
                                        </td>


                                    </tr>
                                @endforeach

                                <!-- More people... -->
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
</div>
