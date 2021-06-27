<div class="flex gap-4">
    <div class="w-full">
        <div class="max-w-6xl mx-auto  mb-5">
            <div class="mb-3">

                <div class="w-full md:w-1/2">
                    <div class="mt-1 relative rounded-md shadow-sm">
                        <input wire:model.debounce.250ms="search" type="text" name="search" id="search"
                            class="focus:ring-green-700 focus:border-green-700 block w-full pr-10 sm:text-sm border-gray-300 rounded-md"
                            placeholder="Search requestor">
                        <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                                fill="currentColor">
                                <path fill-rule="evenodd"
                                    d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                    clip-rule="evenodd" />
                            </svg>
                        </div>
                    </div>
                    @if (count($requestors) > 0 && $search)
                        <div class="mt-1 absolute z-10">
                            <ul class="divide-y divide-gray-200 bg-white rounded shadow-lg">
                                @foreach ($requestors as $requestor)
                                    <li class="p-2 flex hover:shadow-md">
                                        @if ($requestor->user->profile_photo_path)
                                            <img class="h-10 w-10 rounded-full"
                                                src="/storage/{{ $requestor->user->profile_photo_path }}" alt="">
                                        @else
                                            <i class="fa fa-user h-10 w-10 rounded-full"></i>
                                        @endif
                                        <div class="ml-3">
                                            <p class="text-sm font-medium text-gray-900">{{ $requestor->lastname }},
                                                {{ $requestor->firstname }} {{ $requestor->middlename }}</p>
                                            <p class="text-sm text-gray-500">{{ $requestor->course->name }}</p>
                                        </div>
                                    </li>
                                @endforeach

                            </ul>
                        </div>
                    @endif

                </div>
            </div>
            <h2 class="text-lg leading-6 font-medium text-gray-900">Dashboard</h2>
            <div class="mt-2 grid grid-cols-1 gap-2 sm:grid-cols-2 lg:grid-cols-3">
                <!-- Card -->

                <div class="bg-white overflow-hidden shadow rounded-lg">
                    <div class="p-5">
                        <div class="flex items-center">
                            <div class="flex-shrink-0">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-yellow-500"
                                    viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-8-3a1 1 0 00-.867.5 1 1 0 11-1.731-1A3 3 0 0113 8a3.001 3.001 0 01-2 2.83V11a1 1 0 11-2 0v-1a1 1 0 011-1 1 1 0 100-2zm0 8a1 1 0 100-2 1 1 0 000 2z"
                                        clip-rule="evenodd" />
                                </svg>

                            </div>
                            <div class="ml-5 w-0 flex-1">
                                <dl>
                                    <dt class="text-sm font-medium text-gray-500 ">
                                        Pending Request/s
                                    </dt>
                                    <dd>
                                        <div class="text-lg font-medium text-gray-900">
                                            {{ $countPending }}

                                        </div>
                                    </dd>
                                </dl>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="bg-white overflow-hidden shadow rounded-lg">
                    <div class="p-5">
                        <div class="flex items-center">
                            <div class="flex-shrink-0">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-red-600" viewBox="0 0 20 20"
                                    fill="currentColor">
                                    <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z" />
                                    <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z" />
                                </svg>

                            </div>
                            <div class="ml-5 w-0 flex-1">
                                <dl>
                                    <dt class="text-sm font-medium text-gray-500 ">
                                        Unread Request/s
                                    </dt>
                                    <dd>
                                        <div class="text-lg font-medium text-gray-900">
                                            {{ $countUnread }}
                                        </div>
                                    </dd>
                                </dl>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="bg-white overflow-hidden shadow rounded-lg">
                    <div class="p-5">
                        <div class="flex items-center">
                            <div class="flex-shrink-0">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-blue-400"
                                    viewBox="0 0 20 20" fill="currentColor">
                                    <path d="M10 12a2 2 0 100-4 2 2 0 000 4z" />
                                    <path fill-rule="evenodd"
                                        d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z"
                                        clip-rule="evenodd" />
                                </svg>


                            </div>
                            <div class="ml-5 w-0 flex-1">
                                <dl>
                                    <dt class="text-sm font-medium text-gray-500 ">
                                        To Review
                                    </dt>
                                    <dd>
                                        <div class="text-lg font-medium text-gray-900">
                                            {{ $countToReview }}
                                        </div>
                                    </dd>
                                </dl>
                            </div>
                        </div>
                    </div>
                </div>





            </div>
        </div>
        <hr>
        <div class="py-4 ">
            <div class="grid">


                <div class="mt-5">
                    <!-- This example requires Tailwind CSS v2.0+ -->
                    <div class="bg-white shadow overflow-hidden sm:rounded-md">
                        <div class="bg-white px-4 py-5 border-b border-gray-200 sm:px-6">
                            <div class="-ml-4 -mt-2 flex items-center justify-between flex-wrap sm:flex-nowrap">
                                <div class="ml-4 mt-2">
                                    <h3 class="text-lg leading-6 font-medium text-gray-900">
                                        Pending Request/s
                                    </h3>
                                </div>
                                <div class="ml-4 mt-2 flex-shrink-0">

                                </div>
                            </div>
                        </div>
                        <ul class="divide-y divide-gray-200">
                            @forelse ($requests as $request)
                                <li>
                                    <a href="{{ route('registrar-request.details', ['id' => $request->id]) }}"
                                        class="block hover:bg-gray-50">
                                        <div class="flex items-center px-4 py-4 sm:px-6">
                                            <div class="min-w-0 flex-1 flex items-center">
                                                <div class="flex-shrink-0">
                                                    <img class="h-12 w-12 rounded-full"
                                                        src="{{ $request->information->user->profile_photo_url }}"
                                                        alt="">
                                                </div>
                                                <div class="min-w-0 flex-1 px-4 md:grid md:grid-cols-2 md:gap-4">
                                                    <div>
                                                        <p class="text-sm font-medium text-green-700 truncate">
                                                            {{ $request->information->firstname }}
                                                            {{ $request->information->middlename }}
                                                            {{ $request->information->lastname }}</p>
                                                        <p class="mt-2 flex items-center text-sm text-gray-500">
                                                            <!-- Heroicon name: solid/mail -->
                                                            @if ($request->read == 'no')
                                                                <svg class="flex-shrink-0 mr-1.5 h-5 w-5 text-green-600"
                                                                    xmlns="http://www.w3.org/2000/svg"
                                                                    viewBox="0 0 20 20" fill="currentColor"
                                                                    aria-hidden="true">
                                                                    <path
                                                                        d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z" />
                                                                    <path
                                                                        d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z" />
                                                                </svg>

                                                            @endif

                                                            @if ($request->read == 'yes')


                                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                                    class="flex-shrink-0 mr-1.5 h-5 w-5 text-gray-400"
                                                                    fill="none" viewBox="0 0 24 24"
                                                                    stroke="currentColor">
                                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                                        stroke-width="2"
                                                                        d="M3 19v-8.93a2 2 0 01.89-1.664l7-4.666a2 2 0 012.22 0l7 4.666A2 2 0 0121 10.07V19M3 19a2 2 0 002 2h14a2 2 0 002-2M3 19l6.75-4.5M21 19l-6.75-4.5M3 10l6.75 4.5M21 10l-6.75 4.5m0 0l-1.14.76a2 2 0 01-2.22 0l-1.14-.76" />
                                                                </svg>
                                                            @endif



                                                        </p>
                                                    </div>
                                                    <div class="hidden md:block">
                                                        <div>
                                                            <p class="text-sm text-gray-900">

                                                                <time>{{ $request->created_at->diffForHumans() }}</time>
                                                            </p>
                                                            <p class="mt-2 flex items-center text-sm text-gray-500">
                                                                <!-- Heroicon name: solid/check-circle -->

                                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                                    class="flex-shrink-0 mr-1.5 h-5 w-5 text-gray-600"
                                                                    fill="none" viewBox="0 0 24 24"
                                                                    stroke="currentColor">
                                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                                        stroke-width="2"
                                                                        d="M10 6H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V8a2 2 0 00-2-2h-5m-4 0V5a2 2 0 114 0v1m-4 0a2 2 0 104 0m-5 8a2 2 0 100-4 2 2 0 000 4zm0 0c1.306 0 2.417.835 2.83 2M9 14a3.001 3.001 0 00-2.83 2M15 11h3m-3 4h2" />
                                                                </svg>
                                                                {{ $request->information->studentnumber }}
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div>
                                                @if ($request->information->status == 'Graduated')
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5"
                                                        viewBox="0 0 20 20" fill="currentColor">
                                                        <path
                                                            d="M10.394 2.08a1 1 0 00-.788 0l-7 3a1 1 0 000 1.84L5.25 8.051a.999.999 0 01.356-.257l4-1.714a1 1 0 11.788 1.838L7.667 9.088l1.94.831a1 1 0 00.787 0l7-3a1 1 0 000-1.838l-7-3zM3.31 9.397L5 10.12v4.102a8.969 8.969 0 00-1.05-.174 1 1 0 01-.89-.89 11.115 11.115 0 01.25-3.762zM9.3 16.573A9.026 9.026 0 007 14.935v-3.957l1.818.78a3 3 0 002.364 0l5.508-2.361a11.026 11.026 0 01.25 3.762 1 1 0 01-.89.89 8.968 8.968 0 00-5.35 2.524 1 1 0 01-1.4 0zM6 18a1 1 0 001-1v-2.065a8.935 8.935 0 00-2-.712V17a1 1 0 001 1z" />
                                                    </svg>
                                                @else
                                                    <svg class="h-5 w-5 text-gray-400"
                                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                                        fill="currentColor" aria-hidden="true">
                                                        <path fill-rule="evenodd"
                                                            d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                                            clip-rule="evenodd" />
                                                    </svg>
                                                @endif

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
        </div>
    </div>
    <div class="w-1/3">
        <div class="bg-white rounded shadow border-t-4 border-green-600 pt-1">
            <div class="text-center">
                <span>TODO</span>
            </div>
            <form>
                @csrf

                <div class="p-2 ">
                    <textarea name="todo" id="todo"
                        class="outline-none w-full focus:ring-green-600 shadow-md focus:outline-none focus:shadow-lg rounded"></textarea>
                </div>
                <div class="p-2">
                    <button type="button"
                        class="w-full text-center px-2.5 py-1.5 border border-transparent text-xs font-medium rounded text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
                        Add
                    </button>
                </div>
            </form>

        </div>
    </div>



</div>
