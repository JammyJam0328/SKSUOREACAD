<div class="py-6">

    <main x-data="{tab:'request'}" class="flex-1 overflow-y-auto">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex">
                <h1 class="flex-1 text-2xl font-bold text-gray-900">Dashboard </h1>

            </div>

            <!-- Tabs -->
            <div class="mt-3 sm:mt-2">

                <div class="">
                    <div class="flex items-center border-b border-gray-200">
                        <nav class="flex-1 -mb-px flex space-x-6 xl:space-x-8" aria-label="Tabs">
                            <!-- Current: "border-indigo-500 text-indigo-600", Default: "border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300" -->
                            <a x-on:click="tab='request'" href="#" aria-current="page"
                                x-bind:class="tab=='request' ? 'border-green-500 text-green-600' : 'bg-transparent text-gray-500'"
                                class=" hover:text-gray-700 hover:border-gray-300 whitespace-nowrap py-4 px-1 border-b-2 font-bold ">
                                Request
                            </a>

                            <a x-on:click="tab='draft'" href="#"
                                x-bind:class="tab=='draft' ? 'border-green-500 text-green-600' : 'bg-transparent text-gray-500'"
                                class=" hover:text-gray-700 hover:border-gray-300 whitespace-nowrap py-4 px-1 border-b-2 font-bold">
                                Draft
                            </a>

                        </nav>

                    </div>
                </div>
            </div>

            <!-- Gallery -->
            <section x-show="tab=='request'" class="mt-8 pb-16" aria-labelledby="gallery-heading">
                <div class=" shadow overflow-hidden sm:rounded-md bg-white">
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
                                                @if ($request->status == 'Cleared')
                                                    <p
                                                        class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-indigo-50 text-indigo-800">
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
                                            <div class="mt-2 flex items-center text-sm text-gray-500 sm:mt-0 space-x-2">
                                                <!-- Heroicon name: solid/calendar -->
                                                <div class="flex space-x-1 items-center">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                                        viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M8 9l3 3-3 3m5 0h3M5 20h14a2 2 0 002-2V6a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                                    </svg>
                                                    <p class="">

                                                        <span>{{ $request->request_code }}</span>
                                                    </p>
                                                </div>
                                                <div class="flex space-x-1 items-center">
                                                    <svg class="flex-shrink-0 mr-1.5 h-5 w-5 text-gray-400"
                                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                                        fill="currentColor" aria-hidden="true">
                                                        <path fill-rule="evenodd"
                                                            d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z"
                                                            clip-rule="evenodd" />
                                                    </svg>
                                                    <p class="">

                                                        <time
                                                            datetime="2020-01-07">{{ date('M d, Y', strtotime($request->created_at)) }}</time>
                                                    </p>
                                                </div>
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

            </section>


            <section x-cloak x-show="tab=='draft'" class="mt-8 pb-16" aria-labelledby="gallery-heading">
                <div class=" shadow overflow-hidden sm:rounded-md bg-white">
                    <ul class="divide-y divide-gray-200">
                        @forelse ($drafts as $draft)
                            <li>
                                <a href="{{ route('requestor-finalize', ['id' => $draft->id]) }}"
                                    class="block hover:bg-gray-50">
                                    <div class="px-4 py-4 sm:px-6">
                                        <div class="flex items-center justify-between">
                                            <p class="text-lg font-medium text-green-600 truncate">
                                                {{ $draft->purpose->description }}
                                                @if ($draft->other_purpose)
                                                    : <span>{{ $draft->other_purpose }} </span>
                                                @endif

                                            </p>

                                        </div>
                                        <div class="mt-2 sm:flex sm:justify-between">
                                            <div class="mt-2 flex items-center text-sm text-gray-500 sm:mt-0">
                                                <!-- Heroicon name: solid/calendar -->
                                                <svg class="flex-shrink-0 mr-1.5 h-5 w-5 text-gray-400"
                                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                                    fill="currentColor" aria-hidden="true">
                                                    <path fill-rule="evenodd"
                                                        d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z"
                                                        clip-rule="evenodd" />
                                                </svg>
                                                <p>

                                                    <time
                                                        datetime="2020-01-07">{{ date('M d, Y', strtotime($draft->created_at)) }}</time>
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
                                    <span class="text-gray-700">Draft is Empty</span>
                                </div>
                            </div>
                        @endforelse


                    </ul>
                </div>
            </section>
        </div>
    </main>



    {{-- <div class="bg-white w-full shadow p-5 border-t-4 border-green-700">
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



    </div> --}}

</div>
