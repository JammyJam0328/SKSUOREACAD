<div class="flex flex-col">
    <div class="flex items-center justify-center space-x-3">
        <div class="">
            <img src="{{ asset('images/sksu1.png') }}" class="h-16 w-16" alt="">
        </div>
        <div class="grid items-center justify-center">
            <h1 class="text-lg text-center">SULTAN KUDARAT STATUS UNIVERSITY</h1>
            <h1 class="text-center">Online Request of Academic Documents</h1>
            <h1 class="text-sm text-center">{{ auth()->user()->campus->name }}</h1>
        </div>
        <div class="">
            <img src="{{ asset('images/OREACADLogo.svg') }}" class="h-24 w-24" alt="">
        </div>
    </div>
    <div>
        <div class="px-10 pt-2 text-sm">
            <div class="flex justify-between">
                @if ($status == '')
                    <h1>All Requests</h1>
                @else
                    <h1>{{ $status }}Request</h1>
                @endif
                <h1>From : {{ date('M d, y', strtotime($startDate)) }} To :
                    {{ date('M d, y', strtotime($endDate)) }}</h1>
            </div>
        </div>
        <div>
            <table class="w-full border-t border-gray-500 mt-10">
                <thead>
                    <tr>
                        <th class="text-left">
                            Name
                        </th>
                        <th class="text-left">
                            Document/s
                        </th>
                        <th class="text-left">
                            Receiver
                        </th>
                        <th class="text-left">
                            Date
                        </th>

                    </tr>
                </thead>
                <tbody class="bg-white mb-10">
                    @foreach ($requests as $request)
                        <tr class=" mb-5">
                            <td class="px-4 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                {{ $request->information->firstname . ' ' . $request->information->middlename . ' ' . $request->information->lastname }}
                            </td>
                            <td class="px-4 py-4 grid whitespace-nowrap text-sm text-gray-500">
                                @foreach ($request->documents as $document)
                                    <span class="my-auto">{{ $document->name }}</span>
                                @endforeach
                            </td>
                            <td class="px-4 py-4 whitespace-nowrap text-sm text-gray-500">
                                {{ $request->receivername }}
                            </td>
                            <td class="px-4 py-4 whitespace-nowrap text-sm text-gray-500">
                                {{ date('M d', strtotime($request->created_at)) }}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
                <tfoot>

                </tfoot>
            </table>
        </div>
        {{-- <div class="flex flex-col">
            <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                    <div class="overflow-hidden border-t border-gray-300 border-b ">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50 mb-24">
                                <tr>
                                    <th scope="col"
                                        class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Name
                                    </th>
                                    <th scope="col"
                                        class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Document/s
                                    </th>
                                    <th scope="col"
                                        class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Receiver
                                    </th>
                                    <th scope="col"
                                        class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Date
                                    </th>

                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200 mb-10">
                                @foreach ($requests as $request)
                                    <tr class="">
                                        <td class="px-4 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                            {{ $request->information->firstname . ' ' . $request->information->middlename . ' ' . $request->information->lastname }}
                                        </td>
                                        <td class="px-4 py-4 grid whitespace-nowrap text-sm text-gray-500">
                                            @foreach ($request->documents as $document)
                                                <span class="my-auto">{{ $document->name }}</span>
                                            @endforeach
                                        </td>
                                        <td class="px-4 py-4 whitespace-nowrap text-sm text-gray-500">
                                            {{ $request->receivername }}
                                        </td>
                                        <td class="px-4 py-4 whitespace-nowrap text-sm text-gray-500">
                                            {{ date('M d', strtotime($request->created_at)) }}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div> --}}


    </div>
</div>
</div>
