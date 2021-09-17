<div class="flex flex-col">
    <div class="flex items-center justify-center space-x-3">
        <div class="">
            <img src=" {{ asset('images/sksu1.png') }}" class="h-16 w-16" alt="">
        </div>
        <div class="grid items-center justify-center">
            <h1 class="text-lg text-center">SULTAN KUDARAT STATES UNIVERSITY</h1>
            <h1 class="text-center">Online Request of Academic Documents</h1>
            <h1 class="text-sm text-center">{{ auth()->user()->campus->name }}</h1>
        </div>
        <div class="">
            <img src=" {{ asset('images/OREACADLogo.svg') }}" class="h-24 w-24" alt="">
        </div>
    </div>
    <div>
        <div class="px-5 mt-7 text-sm">
            <div class="flex justify-between">
                All request document/s to claim on {{ date('M d', strtotime($claimDate)) }}
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
                                {{ $request->request_code }}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
                <tfoot>

                </tfoot>
            </table>
        </div>


    </div>
</div>
