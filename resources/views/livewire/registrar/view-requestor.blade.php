<div x-data="{tab:'requestList',sideDetails:@entangle('sideDetails')}" class="h-screen bg-gray-50 flex overflow-hidden">


    <div class="flex-1 flex items-stretch ">
        <main class="flex-1 overflow-y-auto">
            <div class="pt-8 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex">
                    <h1 class="flex-1 text-2xl font-bold text-gray-900">{{ $requestor->firstname }}
                        {{ $requestor->middlename }} {{ $requestor->lastname }}</h1>

                </div>

                <!-- Tabs -->
                <div class="mt-3 sm:mt-2">

                    <div class="hidden sm:block">
                        <div class="flex items-center border-b border-gray-200">
                            <nav class="flex-1 -mb-px flex space-x-6 xl:space-x-8" aria-label="Tabs">
                                <!-- Current: "border-indigo-500 text-indigo-600", Default: "border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300" -->
                                <a x-on:click="tab='requestList'" href="#" aria-current="page"
                                    class=" whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm"
                                    x-bind:class="tab=='requestList'? 'border-green-700 text-green-700': 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300'">
                                    Request List
                                </a>

                                <a x-on:click="tab='personalData'" href="#"
                                    class=" whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm"
                                    x-bind:class="tab=='personalData'? 'border-green-700 text-green-700': 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300'">
                                    Personal Information
                                </a>


                            </nav>

                        </div>
                    </div>
                </div>

                <!-- Gallery -->
                <section class="mt-8 pb-16" aria-labelledby="gallery-heading">
                    <!-- This example requires Tailwind CSS v2.0+ -->
                    <div x-show="tab=='requestList'" class="bg-white shadow overflow-hidden sm:rounded-md">
                        <ul class="divide-y divide-gray-200">
                            @forelse ($requestor->requests->sortByDesc('created_at') as $request)
                                <li>
                                    <button wire:click.prevent="viewDetails({{ $request->id }})"
                                        class="block hover:bg-gray-50 w-full">
                                        <div class="px-4 py-4 sm:px-6">
                                            <div class="flex items-center justify-between">
                                                <p class="text-sm font-medium text-indigo-600 truncate">
                                                    {{ $request->purpose->description }}
                                                    {{ $request->other_purpose }}
                                                </p>
                                                <div class="ml-2 flex-shrink-0 flex">
                                                    @if ($request->status == 'Approved')
                                                        <span
                                                            class="text-xs p-1 bg-green-100 text-green-600 rounded-xl">{{ $request->status }}</span>
                                                    @endif
                                                    @if ($request->status == 'Pending')
                                                        <span
                                                            class="text-xs p-1 bg-yellow-100 text-yellow-600 rounded-xl">{{ $request->status }}</span>
                                                    @endif
                                                    @if ($request->status == 'Denied')
                                                        <span
                                                            class="text-xs p-1 bg-red-100 text-red-600 rounded-xl">{{ $request->status }}</span>
                                                    @endif
                                                    @if ($request->status == 'Payment Review')
                                                        <span
                                                            class="text-xs p-1 bg-blue-100 text-blue-600 rounded-xl">{{ $request->status }}</span>
                                                    @endif
                                                    @if ($request->status == 'Ready To Claim')
                                                        <span
                                                            class="text-xs p-1 bg-green-600 text-white rounded-xl">{{ $request->status }}</span>
                                                    @endif
                                                    @if ($request->status == 'Claimed')
                                                        <span
                                                            class="text-xs p-1 bg-gray-600 text-white rounded-xl">{{ $request->status }}</span>
                                                    @endif
                                                </div>
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
                                                        Applied on
                                                        <time
                                                            datetime="2020-01-07">{{ date('M d, Y', strtotime($request->created_at)) }}</time>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </button>
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

                    <div x-show="tab=='personalData'">
                        <!-- This example requires Tailwind CSS v2.0+ -->
                        <section aria-labelledby="applicant-information-title">
                            <div class="bg-white shadow sm:rounded-lg">
                                <div class="px-4 py-5 sm:px-6">
                                    <h2 id="applicant-information-title"
                                        class="text-lg leading-6 font-medium text-gray-900">
                                        Information
                                    </h2>
                                </div>
                                <div class="border-t border-gray-200 px-4 py-5 sm:px-6">
                                    <dl class="grid grid-cols-1 gap-x-4 gap-y-8 sm:grid-cols-2">
                                        <div class="sm:col-span-1">
                                            <dt class="text-sm font-medium text-gray-500">
                                                Student number
                                            </dt>
                                            <dd class="mt-1 text-sm text-gray-900">
                                                {{ $requestor->studentnumber }}
                                            </dd>
                                        </div>
                                        <div class="sm:col-span-1">
                                            <dt class="text-sm font-medium text-gray-500">
                                                Email address
                                            </dt>
                                            <dd class="mt-1 text-sm text-gray-900">
                                                {{ $requestor->email }}
                                            </dd>
                                        </div>
                                        <div class="sm:col-span-1">
                                            <dt class="text-sm font-medium text-gray-500">
                                                Contact number
                                            </dt>
                                            <dd class="mt-1 text-sm text-gray-900">
                                                {{ $requestor->contactnumber }}
                                            </dd>
                                        </div>
                                        <div class="sm:col-span-1">
                                            <dt class="text-sm font-medium text-gray-500">
                                                Course
                                            </dt>
                                            <dd class="mt-1 text-sm text-gray-900">
                                                {{ $requestor->course->name }}
                                            </dd>
                                        </div>
                                        <div class="sm:col-span-1">
                                            <dt class="text-sm font-medium text-gray-500">
                                                Status
                                            </dt>
                                            <dd class="mt-1 text-sm text-gray-900">
                                                {{ $requestor->status }}
                                            </dd>
                                        </div>
                                        <div class="sm:col-span-1">
                                            <dt class="text-sm font-medium text-gray-500">
                                                Campus
                                            </dt>
                                            <dd class="mt-1 text-sm text-white p-1 shadow rounded bg-green-500">
                                                {{ $requestor->course->campus->name }}
                                            </dd>
                                        </div>
                                        <div class="sm:col-span-1">
                                            <dt class="text-sm font-medium text-gray-500">
                                                Address
                                            </dt>
                                            <dd class="mt-1 text-sm text-gray-900">
                                                {{ $requestor->address }}
                                            </dd>
                                        </div>
                                        <div class="sm:col-span-1">
                                            <dt class="text-sm font-medium text-gray-500">
                                                Sex
                                            </dt>
                                            <dd class="mt-1 text-sm text-gray-900">
                                                {{ $requestor->sex }}
                                            </dd>
                                        </div>

                                        <div class=" px-4 py-5 shadow sm:rounded-lg sm:px-6">
                                            <div class="flex items-center justify-center">
                                                <h1 class="text-gray-600 text-xl">Valid ID</h1>
                                            </div>
                                            <img src="/storage/{{ $requestor->valid_id }}" class="w-full h-90"
                                                alt="">
                                        </div>

                                    </dl>
                                </div>




                            </div>
                        </section>

                    </div>

                </section>
            </div>
        </main>

        <!-- Details sidebar -->

        <aside x-cloak x-show="sideDetails"
            x-transition:enter="transform transition ease-in-out duration-500 sm:duration-700"
            x-transition:enter-start="translate-x-full" x-transition:enter-end="translate-x-0"
            x-transition:leave="transform transition ease-in-out duration-500 sm:duration-700"
            x-transition:leave-start="translate-x-0" x-transition:leave-end="translate-x-full"
            class=" w-80 bg-white p-8 border-l border-gray-200">
            <div class="pb-16 space-y-6">
                <div>

                    <div class="mt-4 flex items-start justify-between">
                        <div>
                            <h2 class="text-lg text-green-700 font-bold">Request Details</h2>
                        </div>
                        <button x-on:click="sideDetails=false" type="button"
                            class="ml-4 bg-white rounded-full h-8 w-8 flex items-center justify-center text-gray-400 hover:bg-gray-100 hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-indigo-500">
                            <!-- Heroicon name: outline/heart -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M6 18L18 6M6 6l12 12" />
                            </svg>

                        </button>
                    </div>
                </div>
                @if ($sideDetails == true)
                    <div>
                        <dl class="mt-2 border-t border-b border-gray-200 divide-y divide-gray-200">
                            <div class="py-3 flex justify-between text-sm font-medium">
                                <dt class="text-gray-500">Receiver name</dt>
                                <dd class="text-gray-900">{{ $requestDetail->receivername }}</dd>
                            </div>

                            <div class="py-3 flex justify-between text-sm font-medium">
                                <dt class="text-gray-500">Purpose</dt>
                                <dd class="text-gray-900">{{ $requestDetail->purpose->description }}</dd>
                            </div>

                            <div class="py-3 flex justify-between text-sm font-medium">
                                <dt class="text-gray-500">Specified Purpose</dt>
                                <dd class="text-gray-900">{{ $requestDetail->other_purpose }}</dd>
                            </div>

                            <div class="py-3 flex justify-between text-sm font-medium">
                                <dt class="text-gray-500">Date</dt>
                                <dd class="text-gray-900">
                                    {{ date('M d, Y', strtotime($requestDetail->created_at)) }}</dd>
                            </div>


                        </dl>
                    </div>

                    <div>
                        <h3 class="font-medium text-gray-900">Document/s</h3>

                    </div>
                    <div>
                        <ul class="mt-2 border-t border-b border-gray-200 divide-y divide-gray-200">
                            @foreach ($requestDetail->documents as $document)
                                <li class="py-3 flex justify-between items-center">
                                    <div class="flex items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-indigo-600"
                                            viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd"
                                                d="M2 6a2 2 0 012-2h4l2 2h4a2 2 0 012 2v1H8a3 3 0 00-3 3v1.5a1.5 1.5 0 01-3 0V6z"
                                                clip-rule="evenodd" />
                                            <path
                                                d="M6 12a2 2 0 012-2h8a2 2 0 012 2v2a2 2 0 01-2 2H2h2a2 2 0 002-2v-2z" />
                                        </svg>
                                        <p class="ml-4 text-sm font-medium text-gray-900">{{ $document->name }}</p>
                                    </div>

                                </li>
                            @endforeach

                        </ul>
                    </div>
                @endif
            </div>
        </aside>
    </div>

    <div wire:loading.flex
        class="w-full h-full flex fixed items-center justify-center top-0 left-0 bg-white opacity-75 z-50">
        <div class="grid items-center justify-center animate-bounce">
            <img src="{{ asset('images/loading.svg') }}" class="h-32 w-32" alt="">
            <span class="mx-auto">loading... </span>
        </div>
    </div>
</div>
