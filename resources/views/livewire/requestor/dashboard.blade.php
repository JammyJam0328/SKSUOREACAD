<div class="py-6">
    <div class="bg-white shadow p-5 border-t-4 border-green-700">
        <div class="pb-4">
            <span class="text-3xl">My Requests</span>
        </div>
        <div class=" shadow overflow-hidden sm:rounded-md">
            <ul class="divide-y divide-gray-200">
                @forelse ($requests as $request)
                    <li>
                        <a href="{{ route('requestor-viewrequest', ['id' => $request->id]) }}"
                            class="block hover:bg-gray-50">
                            <div class="px-4 py-4 sm:px-6">
                                <div class="flex items-center justify-between">
                                    <p class="text-lg font-medium text-green-600 truncate">
                                        {{ $request->purpose->description }}
                                        @if ($request->other_purpose)
                                            : <span>{{ $request->other_purpose }} </span>
                                        @endif

                                    </p>
                                    <div class="ml-2 flex-shrink-0 flex">
                                        @if ($request->status == 'Pending')
                                            <p
                                                class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">
                                                {{ $request->status }}
                                            </p>
                                        @endif
                                        @if ($request->status == 'Approved')
                                            <p
                                                class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                                {{ $request->status }}
                                            </p>
                                        @endif
                                        @if ($request->status == 'Payment Review')
                                            <p
                                                class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-blue-100 text-blue-800">
                                                {{ $request->status }}
                                            </p>
                                        @endif
                                        @if ($request->status == 'Denied')
                                            <p
                                                class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">
                                                {{ $request->status }}
                                            </p>
                                        @endif
                                        @if ($request->status == 'Claimed')
                                            <p
                                                class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-gray-100 text-gray-800">
                                                {{ $request->status }}
                                            </p>
                                        @endif
                                        @if ($request->status == 'Ready To Claim')
                                            <p
                                                class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-600 text-white">
                                                {{ $request->status }}
                                            </p>
                                        @endif
                                    </div>
                                </div>
                                <div class="mt-2 sm:flex sm:justify-between">
                                    <div class="mt-2 flex items-center text-sm text-gray-500 sm:mt-0">
                                        <!-- Heroicon name: solid/calendar -->
                                        <svg class="flex-shrink-0 mr-1.5 h-5 w-5 text-gray-400"
                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                            aria-hidden="true">
                                            <path fill-rule="evenodd"
                                                d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z"
                                                clip-rule="evenodd" />
                                        </svg>
                                        <p>

                                            <time
                                                datetime="2020-01-07">{{ date('M d, Y', strtotime($request->created_at)) }}</time>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </li>
                @empty
                    <div class="grid items-center justify-center">
                        <div class="mx-auto">
                            <img src="{{ asset('images/empty.svg') }}" class="h-40 w-40" alt="">
                            <span class="text-gray-700">No request found</span>
                        </div>
                    </div>
                @endforelse


            </ul>
        </div>



    </div>
</div>
