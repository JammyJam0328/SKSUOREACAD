<div x-data="{tab:@entangle('tab'),paymentReview:@entangle('paymentReview'),moreInfo:false}">
    <div class="flex gap-2">
        <div class="w-1/4">
            <!-- This example requires Tailwind CSS v2.0+ -->
            <nav class="space-y-1" aria-label="Sidebar">
                <!-- Current: "bg-gray-200 text-gray-900", Default: "text-gray-600 hover:bg-gray-50 hover:text-gray-900" -->
                <a x-on:click="tab=''" :class="tab==''? ' shadow-md bg-white ':''" href="#"
                    class=" hover:bg-gray-50 hover:text-gray-900 flex items-center px-3 py-2 text-sm font-medium rounded-md"
                    aria-current="page">

                    <svg xmlns="http://www.w3.org/2000/svg" class="text-gray-500 flex-shrink-0 -ml-1 mr-3 h-6 w-6"
                        fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-6l-2-2H5a2 2 0 00-2 2z" />
                    </svg>

                    <span class="truncate">
                        All
                    </span>

                </a>


                <a x-on:click="tab='Approved'" :class="tab=='Approved'? ' shadow-md bg-white ':''" href="#"
                    class="text-green-900 hover:bg-gray-50 hover:text-gray-900 flex items-center px-3 py-2 text-sm font-medium rounded-md">
                    <svg xmlns="http://www.w3.org/2000/svg" class="text-gray-500 flex-shrink-0 -ml-1 mr-3 h-6 w-6"
                        fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z" />
                    </svg>
                    <span class="truncate">
                        To Pay
                    </span>

                    <span class="bg-red-200 text-red-900 ml-auto inline-block py-0.5 px-3 text-xs rounded-full">
                        {{ $countToPay }}
                    </span>
                </a>

                <a x-on:click="tab='Payment Review'" :class="tab=='Payment Review'? ' shadow-md bg-white ':''" href="#"
                    class="text-green-900 hover:bg-gray-50 hover:text-gray-900 flex items-center px-3 py-2 text-sm font-medium rounded-md">
                    <svg xmlns="http://www.w3.org/2000/svg" class="text-gray-500 flex-shrink-0 -ml-1 mr-3 h-6 w-6"
                        fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                    </svg>
                    <span class="truncate">
                        To Review
                    </span>

                    <span class="bg-red-200 text-red-900 ml-auto inline-block py-0.5 px-3 text-xs rounded-full">
                        {{ $countToReview }}
                    </span>
                </a>

                <a x-on:click="tab='Ready To Claim'" :class="tab=='Ready To Claim'? ' shadow-md bg-white ':''" href="#"
                    class="text-green-900 hover:bg-gray-50 hover:text-gray-900 flex items-center px-3 py-2 text-sm font-medium rounded-md">
                    <svg xmlns="http://www.w3.org/2000/svg" class="text-gray-500 flex-shrink-0 -ml-1 mr-3 h-6 w-6"
                        fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4" />
                    </svg>
                    <span class="truncate">
                        To Claim
                    </span>

                    <span class="bg-red-200 text-red-900 ml-auto inline-block py-0.5 px-3 text-xs rounded-full">
                        {{ $countToClaim }}
                    </span>
                </a>

                <a x-on:click="tab='Pending'" :class="tab=='Pending'? ' shadow-md bg-white ':''" href="#"
                    class="text-green-900 hover:bg-gray-50 hover:text-gray-900 flex items-center px-3 py-2 text-sm font-medium rounded-md">
                    <svg xmlns="http://www.w3.org/2000/svg" class="text-gray-500 flex-shrink-0 -ml-1 mr-3 h-6 w-6"
                        fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <span class="truncate">
                        Pending
                    </span>
                    <span class="bg-red-200 text-red-900 ml-auto inline-block py-0.5 px-3 text-xs rounded-full">
                        {{ $countPending }}
                    </span>
                </a>

                <a x-on:click="tab='Claimed'" :class="tab=='Claimed'? ' shadow-md bg-white ':''" href="#"
                    class="text-green-900 hover:bg-gray-50 hover:text-gray-900 flex items-center px-3 py-2 text-sm font-medium rounded-md">
                    <svg xmlns="http://www.w3.org/2000/svg" class="text-gray-500 flex-shrink-0 -ml-1 mr-3 h-6 w-6"
                        fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4" />
                    </svg>
                    <span class="truncate">
                        Claimed
                    </span>
                </a>

                <a x-on:click="tab='Denied'" :class="tab=='Denied'? ' shadow-md bg-white ':''" href="#"
                    class="text-green-900 hover:bg-gray-50 hover:text-gray-900 flex items-center px-3 py-2 text-sm font-medium rounded-md">
                    <svg xmlns="http://www.w3.org/2000/svg" class="text-gray-500 flex-shrink-0 -ml-1 mr-3 h-6 w-6"
                        fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                    </svg>
                    <span class="truncate">
                        Denied
                    </span>
                </a>

            </nav>

        </div>
        <div class="w-full bg-white rounded shadow p-5">
            @if ($tab == '')
                <div>
                    <!-- This example requires Tailwind CSS v2.0+ -->
                    <div class="bg-white px-4 pb-2 border-b border-gray-200 sm:px-6">
                        <div class="-ml-4 -mt-2 flex items-center justify-between flex-wrap sm:flex-nowrap">
                            <div class="ml-4 mt-2">
                                <h3 class="text-lg leading-6 font-medium text-gray-900">
                                    All Request
                                </h3>
                            </div>
                            <div class="ml-4 flex-shrink-0">

                                <div>

                                    <div class="mt-1 relative rounded-md shadow-sm">
                                        <input wire:model.lazy="search" type="text" name="search" id="search"
                                            class="focus:ring-green-500 focus:border-green-500 block w-full pr-10 sm:text-sm border-gray-300 rounded-md"
                                            placeholder="Search ...">
                                        <div
                                            class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                                            <!-- Heroicon name: solid/question-mark-circle -->
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-600"
                                                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                                            </svg>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                    <div>
                        <div class="flow-root mt-6">
                            <ul class="-my-5 divide-y divide-gray-200">
                                @forelse ($requests as $request)
                                    <li class="p-2 hover:bg-gray-100">
                                        <div class="flex items-center space-x-4">
                                            <div class="flex-shrink-0">
                                                <img class="h-8 w-8 rounded-full"
                                                    src="{{ $request->information->user->profile_photo_url }}" alt="">
                                            </div>
                                            <div class="flex-1 min-w-0">
                                                <p class="text-sm font-medium text-gray-900 truncate">
                                                    {{ $request->information->firstname }}
                                                    {{ $request->information->middlename }}
                                                    {{ $request->information->lastname }}
                                                </p>
                                                <p class="text-sm text-gray-500 truncate">
                                                    {{ $request->information->email }}
                                                </p>
                                            </div>
                                            <div>
                                                @if ($request->status == 'Approved')

                                                    <a href="{{ route('registrar-view.request', ['id' => $request->id]) }}"
                                                        class="inline-flex items-center shadow-sm px-2.5 py-0.5 border border-gray-300 text-sm leading-5 font-medium rounded-full text-gray-700 bg-white hover:bg-gray-50">
                                                        View
                                                    </a>
                                                @endif

                                                @if ($request->status == 'Ready To Claim')
                                                    <a href="{{ route('registrar-view.request', ['id' => $request->id]) }}"
                                                        class="inline-flex items-center shadow-sm px-2.5 py-0.5 border border-gray-300 text-sm leading-5 font-medium rounded-full text-gray-700 bg-white hover:bg-gray-50">
                                                        View
                                                    </a>
                                                @endif

                                                @if ($request->status == 'Claimed')
                                                    <a href="{{ route('registrar-view.request', ['id' => $request->id]) }}"
                                                        class="inline-flex items-center shadow-sm px-2.5 py-0.5 border border-gray-300 text-sm leading-5 font-medium rounded-full text-gray-700 bg-white hover:bg-gray-50">
                                                        View
                                                    </a>
                                                @endif

                                                @if ($request->status == 'Pending')
                                                    <a href="{{ route('registrar-request.details', ['id' => $request->id]) }}"
                                                        class="inline-flex items-center shadow-sm px-2.5 py-0.5 border border-gray-300 text-sm leading-5 font-medium rounded-full text-gray-700 bg-white hover:bg-gray-50">
                                                        View
                                                    </a>
                                                @endif

                                                @if ($request->status == 'Denied')
                                                    <a href="{{ route('registrar-view.request', ['id' => $request->id]) }}"
                                                        class="inline-flex items-center shadow-sm px-2.5 py-0.5 border border-gray-300 text-sm leading-5 font-medium rounded-full text-gray-700 bg-white hover:bg-gray-50">
                                                        View
                                                    </a>
                                                @endif

                                                @if ($request->status == 'Payment Review')
                                                    <button
                                                        wire:click.prevent="viewPaymentReview({{ $request->id }})"
                                                        class="inline-flex items-center shadow-sm px-2.5 py-0.5 border border-gray-300 text-sm leading-5 font-medium rounded-full text-gray-700 bg-white hover:bg-gray-50">
                                                        View
                                                    </button>
                                                @endif


                                            </div>
                                            <div>







                                            </div>
                                        </div>
                                    </li>

                                @empty
                                    <div class="p-5 grid items-center justify-center">
                                        <img src="{{ asset('images/empty.svg') }}" class="h-40 w-40" alt="">
                                        <span>No Request Found</span>
                                    </div>


                                @endforelse
                            </ul>
                        </div>
                        <div class="mt-6">
                            {{ $requests->links() }}

                        </div>
                    </div>

                </div>
            @endif
            @if ($tab == 'Approved')
                <div>
                    <div class="bg-white px-4 pb-2 border-b border-gray-200 sm:px-6">
                        <div class="-ml-4 -mt-2 flex items-center justify-between flex-wrap sm:flex-nowrap">
                            <div class="ml-4 mt-2">
                                <h3 class="text-lg leading-6 font-medium text-gray-900">
                                    To Pay
                                </h3>
                            </div>
                            <div class="ml-4 flex-shrink-0">

                                <div>

                                    <div class="mt-1 relative rounded-md shadow-sm">
                                        <input wire:model.lazy="search" type="text" name="search" id="search"
                                            class="focus:ring-green-500 focus:border-green-500 block w-full pr-10 sm:text-sm border-gray-300 rounded-md"
                                            placeholder="Search ...">
                                        <div
                                            class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                                            <!-- Heroicon name: solid/question-mark-circle -->
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-600"
                                                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                                            </svg>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div>
                        <div class="flow-root mt-6">
                            <ul class="-my-5 divide-y divide-gray-200">
                                @forelse ($requests as $request)
                                    <li class="p-2 hover:bg-gray-100">
                                        <div class="flex items-center space-x-4">
                                            <div class="flex-shrink-0">
                                                <img class="h-8 w-8 rounded-full"
                                                    src="{{ $request->information->user->profile_photo_url }}"
                                                    alt="">
                                            </div>
                                            <div class="flex-1 min-w-0">
                                                <p class="text-sm font-medium text-gray-900 truncate">
                                                    {{ $request->information->firstname }}
                                                    {{ $request->information->middlename }}
                                                    {{ $request->information->lastname }}
                                                </p>
                                                <p class="text-sm text-gray-500 truncate">
                                                    {{ $request->information->email }}
                                                </p>
                                            </div>
                                            <div>


                                                <a href="{{ route('registrar-view.request', ['id' => $request->id]) }}"
                                                    class="inline-flex items-center shadow-sm px-2.5 py-0.5 border border-gray-300 text-sm leading-5 font-medium rounded-full text-gray-700 bg-white hover:bg-gray-50">
                                                    View
                                                </a>
                                            </div>
                                            <div>






                                            </div>
                                        </div>
                                    </li>

                                @empty
                                    <div class="p-5 grid items-center justify-center">
                                        <img src="{{ asset('images/empty.svg') }}" class="h-40 w-40" alt="">
                                        <span>No Request Found</span>
                                    </div>


                                @endforelse
                            </ul>
                        </div>
                        <div class="mt-6">
                            {{ $requests->links() }}
                        </div>
                    </div>

                </div>
            @endif

            @if ($tab == 'Payment Review')
                <div>
                    <div class="bg-white px-4 pb-2 border-b border-gray-200 sm:px-6">
                        <div class="-ml-4 -mt-2 flex items-center justify-between flex-wrap sm:flex-nowrap">
                            <div class="ml-4 mt-2">
                                <h3 class="text-lg leading-6 font-medium text-gray-900">
                                    To Review
                                </h3>
                            </div>
                            <div class="ml-4 flex-shrink-0">

                                <div>

                                    <div class="mt-1 relative rounded-md shadow-sm">
                                        <input wire:model.lazy="search" type="text" name="search" id="search"
                                            class="focus:ring-green-500 focus:border-green-500 block w-full pr-10 sm:text-sm border-gray-300 rounded-md"
                                            placeholder="Search ...">
                                        <div
                                            class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                                            <!-- Heroicon name: solid/question-mark-circle -->
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-600"
                                                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                                            </svg>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div>
                        <div class="flow-root mt-6">
                            <ul class="-my-5 divide-y divide-gray-200">
                                @forelse ($requests as $request)
                                    <li class="p-2 hover:bg-gray-100">
                                        <div class="flex items-center space-x-4">
                                            <div class="flex-shrink-0">
                                                <img class="h-8 w-8 rounded-full"
                                                    src="{{ $request->information->user->profile_photo_url }}"
                                                    alt="">
                                            </div>
                                            <div class="flex-1 min-w-0">
                                                <p class="text-sm font-medium text-gray-900 truncate">
                                                    {{ $request->information->firstname }}
                                                    {{ $request->information->middlename }}
                                                    {{ $request->information->lastname }}
                                                </p>
                                                <p class="text-sm text-gray-500 truncate">
                                                    {{ $request->information->email }}
                                                </p>
                                            </div>
                                            <div>
                                                <button wire:click.prevent="viewPaymentReview({{ $request->id }})"
                                                    class="inline-flex items-center shadow-sm px-2.5 py-0.5 border border-gray-300 text-sm leading-5 font-medium rounded-full text-gray-700 bg-white hover:bg-gray-50">
                                                    View
                                                </button>
                                            </div>
                                            <div>






                                            </div>
                                        </div>
                                    </li>

                                @empty
                                    <div class="p-5 grid items-center justify-center">
                                        <img src="{{ asset('images/empty.svg') }}" class="h-40 w-40" alt="">
                                        <span>No Request Found</span>
                                    </div>


                                @endforelse
                            </ul>
                        </div>
                        <div class="mt-6">
                            {{ $requests->links() }}
                        </div>
                    </div>

                </div>
            @endif
            @if ($tab == 'Ready To Claim')
                <div>
                    <div class="bg-white px-4 pb-2 border-b border-gray-200 sm:px-6">
                        <div class="-ml-4 -mt-2 flex items-center justify-between flex-wrap sm:flex-nowrap">
                            <div class="ml-4 mt-2">
                                <h3 class="text-lg leading-6 font-medium text-gray-900">
                                    To Claim
                                </h3>
                            </div>
                            <div class="ml-4 flex-shrink-0">

                                <div>

                                    <div class="mt-1 relative rounded-md shadow-sm">
                                        <input wire:model.lazy="search" type="text" name="search" id="search"
                                            class="focus:ring-green-500 focus:border-green-500 block w-full pr-10 sm:text-sm border-gray-300 rounded-md"
                                            placeholder="Search ...">
                                        <div
                                            class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                                            <!-- Heroicon name: solid/question-mark-circle -->
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-600"
                                                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                                            </svg>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div>
                        <div class="flow-root mt-6">
                            <ul class="-my-5 divide-y divide-gray-200">
                                @forelse ($requests as $request)
                                    <li class="p-2 hover:bg-gray-100">
                                        <div class="flex items-center space-x-4">
                                            <div class="flex-shrink-0">
                                                <img class="h-8 w-8 rounded-full"
                                                    src="{{ $request->information->user->profile_photo_url }}"
                                                    alt="">
                                            </div>
                                            <div class="flex-1 min-w-0">
                                                <p class="text-sm font-medium text-gray-900 truncate">
                                                    {{ $request->information->firstname }}
                                                    {{ $request->information->middlename }}
                                                    {{ $request->information->lastname }}
                                                </p>
                                                <p class="text-sm text-gray-500 truncate">
                                                    {{ $request->information->email }}
                                                </p>
                                            </div>
                                            <div>
                                                <a href="{{ route('registrar-view.request', ['id' => $request->id]) }}"
                                                    class="inline-flex items-center shadow-sm px-2.5 py-0.5 border border-gray-300 text-sm leading-5 font-medium rounded-full text-gray-700 bg-white hover:bg-gray-50">
                                                    View
                                                </a>
                                            </div>
                                            <div>






                                            </div>
                                        </div>
                                    </li>

                                @empty
                                    <div class="p-5 grid items-center justify-center">
                                        <img src="{{ asset('images/empty.svg') }}" class="h-40 w-40" alt="">
                                        <span>No Request Found</span>
                                    </div>


                                @endforelse
                            </ul>
                        </div>
                        <div class="mt-6">
                            {{ $requests->links() }}
                        </div>
                    </div>

                </div>
            @endif
            @if ($tab == 'Pending')
                <div>
                    <div class="bg-white px-4 pb-2 border-b border-gray-200 sm:px-6">
                        <div class="-ml-4 -mt-2 flex items-center justify-between flex-wrap sm:flex-nowrap">
                            <div class="ml-4 mt-2">
                                <h3 class="text-lg leading-6 font-medium text-gray-900">
                                    Pending
                                </h3>
                            </div>
                            <div class="ml-4 flex-shrink-0">

                                <div>

                                    <div class="mt-1 relative rounded-md shadow-sm">
                                        <input wire:model.lazy="search" type="text" name="search" id="search"
                                            class="focus:ring-green-500 focus:border-green-500 block w-full pr-10 sm:text-sm border-gray-300 rounded-md"
                                            placeholder="Search ...">
                                        <div
                                            class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                                            <!-- Heroicon name: solid/question-mark-circle -->
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-600"
                                                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                                            </svg>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div>
                        <div class="flow-root mt-6">
                            <ul class="-my-5 divide-y divide-gray-200">
                                @forelse ($requests as $request)
                                    <li class="p-2 hover:bg-gray-100">
                                        <div class="flex items-center space-x-4">
                                            <div class="flex-shrink-0">
                                                <img class="h-8 w-8 rounded-full"
                                                    src="{{ $request->information->user->profile_photo_url }}"
                                                    alt="">
                                            </div>
                                            <div class="flex-1 min-w-0">
                                                <p class="text-sm font-medium text-gray-900 truncate">
                                                    {{ $request->information->firstname }}
                                                    {{ $request->information->middlename }}
                                                    {{ $request->information->lastname }}
                                                </p>
                                                <p class="text-sm text-gray-500 truncate">
                                                    {{ $request->information->email }}
                                                </p>
                                            </div>
                                            <div>
                                                <a href="{{ route('registrar-request.details', ['id' => $request->id]) }}"
                                                    class="inline-flex items-center shadow-sm px-2.5 py-0.5 border border-gray-300 text-sm leading-5 font-medium rounded-full text-gray-700 bg-white hover:bg-gray-50">
                                                    View
                                                </a>
                                            </div>
                                            <div>


                                            </div>
                                        </div>
                                    </li>

                                @empty
                                    <div class="p-5 grid items-center justify-center">
                                        <img src="{{ asset('images/empty.svg') }}" class="h-40 w-40" alt="">
                                        <span>No Request Found</span>
                                    </div>


                                @endforelse
                            </ul>
                        </div>
                        <div class="mt-6">
                            {{ $requests->links() }}
                        </div>
                    </div>

                </div>
            @endif
            @if ($tab == 'Claimed')
                <div>
                    <div class="bg-white px-4 pb-2 border-b border-gray-200 sm:px-6">
                        <div class="-ml-4 -mt-2 flex items-center justify-between flex-wrap sm:flex-nowrap">
                            <div class="ml-4 mt-2">
                                <h3 class="text-lg leading-6 font-medium text-gray-900">
                                    Claimed
                                </h3>
                            </div>
                            <div class="ml-4 flex-shrink-0">

                                <div>

                                    <div class="mt-1 relative rounded-md shadow-sm">
                                        <input wire:model.lazy="search" type="text" name="search" id="search"
                                            class="focus:ring-green-500 focus:border-green-500 block w-full pr-10 sm:text-sm border-gray-300 rounded-md"
                                            placeholder="Search ...">
                                        <div
                                            class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                                            <!-- Heroicon name: solid/question-mark-circle -->
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-600"
                                                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                                            </svg>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div>
                        <div class="flow-root mt-6">
                            <ul class="-my-5 divide-y divide-gray-200">
                                @forelse ($requests as $request)
                                    <li class="p-2 hover:bg-gray-100">
                                        <div class="flex items-center space-x-4">
                                            <div class="flex-shrink-0">
                                                <img class="h-8 w-8 rounded-full"
                                                    src="{{ $request->information->user->profile_photo_url }}"
                                                    alt="">
                                            </div>
                                            <div class="flex-1 min-w-0">
                                                <p class="text-sm font-medium text-gray-900 truncate">
                                                    {{ $request->information->firstname }}
                                                    {{ $request->information->middlename }}
                                                    {{ $request->information->lastname }}
                                                </p>
                                                <p class="text-sm text-gray-500 truncate">
                                                    {{ $request->information->email }}
                                                </p>
                                            </div>
                                            <div>
                                                <a href="{{ route('registrar-view.request', ['id' => $request->id]) }}"
                                                    class="inline-flex items-center shadow-sm px-2.5 py-0.5 border border-gray-300 text-sm leading-5 font-medium rounded-full text-gray-700 bg-white hover:bg-gray-50">
                                                    View
                                                </a>
                                            </div>
                                            <div>






                                            </div>
                                        </div>
                                    </li>

                                @empty
                                    <div class="p-5 grid items-center justify-center">
                                        <img src="{{ asset('images/empty.svg') }}" class="h-40 w-40" alt="">
                                        <span>No Request Found</span>
                                    </div>


                                @endforelse
                            </ul>
                        </div>
                        <div class="mt-6">
                            {{ $requests->links() }}
                        </div>
                    </div>

                </div>
            @endif



            @if ($tab == 'Denied')
                <div>
                    <div class="bg-white px-4 pb-2 border-b border-gray-200 sm:px-6">
                        <div class="-ml-4 -mt-2 flex items-center justify-between flex-wrap sm:flex-nowrap">
                            <div class="ml-4 mt-2">
                                <h3 class="text-lg leading-6 font-medium text-gray-900">
                                    Denied
                                </h3>
                            </div>
                            <div class="ml-4 flex-shrink-0">

                                <div>

                                    <div class="mt-1 relative rounded-md shadow-sm">
                                        <input wire:model.lazy="search" type="text" name="search" id="search"
                                            class="focus:ring-green-500 focus:border-green-500 block w-full pr-10 sm:text-sm border-gray-300 rounded-md"
                                            placeholder="Search ...">
                                        <div
                                            class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                                            <!-- Heroicon name: solid/question-mark-circle -->
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-600"
                                                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                                            </svg>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div>
                        <div class="flow-root mt-6">
                            <ul class="-my-5 divide-y divide-gray-200">
                                @forelse ($requests as $request)
                                    <li class="p-2 hover:bg-gray-100">
                                        <div class="flex items-center space-x-4">
                                            <div class="flex-shrink-0">
                                                <img class="h-8 w-8 rounded-full"
                                                    src="{{ $request->information->user->profile_photo_url }}"
                                                    alt="">
                                            </div>
                                            <div class="flex-1 min-w-0">
                                                <p class="text-sm font-medium text-gray-900 truncate">
                                                    {{ $request->information->firstname }}
                                                    {{ $request->information->middlename }}
                                                    {{ $request->information->lastname }}
                                                </p>
                                                <p class="text-sm text-gray-500 truncate">
                                                    {{ $request->information->email }}
                                                </p>
                                            </div>
                                            <div>
                                                <a href="{{ route('registrar-view.request', ['id' => $request->id]) }}"
                                                    class="inline-flex items-center shadow-sm px-2.5 py-0.5 border border-gray-300 text-sm leading-5 font-medium rounded-full text-gray-700 bg-white hover:bg-gray-50">
                                                    View
                                                </a>
                                            </div>
                                            <div>






                                            </div>
                                        </div>
                                    </li>

                                @empty
                                    <div class="p-5 grid items-center justify-center">
                                        <img src="{{ asset('images/empty.svg') }}" class="h-40 w-40" alt="">
                                        <span>No Request Found</span>
                                    </div>


                                @endforelse
                            </ul>
                        </div>
                        <div class="mt-6">
                            {{ $requests->links() }}
                        </div>
                    </div>

                </div>
            @endif



        </div>
    </div>


    <div>
        @if ($paymentReview)
            <div x-show="paymentReview" class="fixed z-10 inset-0 overflow-y-auto" aria-labelledby="modal-title"
                role="dialog" aria-modal="true">
                <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">

                    <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true"></div>

                    <!-- This element is to trick the browser into centering the modal contents. -->
                    <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>

                    <div
                        class="inline-block align-bottom bg-white w-5/6 rounded-lg  pt-5 pb-4 text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle  sm:p-6">
                        <div class="hidden sm:block absolute top-0 right-0 pt-4 pr-4">
                            <button x-on:click="paymentReview=false" type="button"
                                class="bg-white rounded-md text-gray-400 hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                <span class="sr-only">Close</span>
                                <!-- Heroicon name: outline/x -->
                                <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M6 18L18 6M6 6l12 12" />
                                </svg>
                            </button>
                        </div>
                        <div class="">
                            <main class="py-5">
                                <!-- Page header -->
                                <div
                                    class="max-w-3xl mx-auto  md:flex md:items-center md:justify-between md:space-x-5 lg:max-w-7xl ">
                                    <div class="flex items-center space-x-5">
                                        <div class="flex-shrink-0">
                                            <div class="relative">
                                                <img class="h-16 w-16 rounded-full"
                                                    src="{{ $PaymentReviewRequest->information->user->profile_photo_url }}"
                                                    alt="">
                                                <span class="absolute inset-0 shadow-inner rounded-full"
                                                    aria-hidden="true"></span>
                                            </div>
                                        </div>
                                        <div>
                                            <h1 class="text-2xl font-bold text-gray-900">
                                                {{ $PaymentReviewRequest->information->firstname }}
                                                {{ $PaymentReviewRequest->information->middlename }}
                                                {{ $PaymentReviewRequest->information->lastname }}</h1>
                                            <p class="text-sm font-medium text-gray-500">
                                                {{ $PaymentReviewRequest->information->course->name }} -
                                                {{ $PaymentReviewRequest->information->course->campus->name }}</p>
                                        </div>
                                    </div>
                                    <div
                                        class="mt-6 flex flex-col-reverse justify-stretch space-y-4 space-y-reverse sm:flex-row-reverse sm:justify-end sm:space-x-reverse sm:space-y-0 sm:space-x-3 md:mt-0 md:flex-row md:space-x-3">
                                        <button wire:click.prevent="deny({{ $PaymentReviewRequest->id }})"
                                            type="button"
                                            class="inline-flex items-center justify-center px-4 py-2 border border-gray-300 shadow-sm text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-100 focus:ring-blue-500">
                                            Payment Deny
                                        </button>
                                        <button wire:click.prevent="confirmRTC({{ $PaymentReviewRequest->id }})"
                                            type="button"
                                            class="inline-flex items-center justify-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-100 focus:ring-blue-500">
                                            Ready to Claim
                                        </button>
                                    </div>
                                </div>

                                <div
                                    class="mt-2 max-w-3xl mx-auto grid grid-cols-1 gap-6  lg:max-w-7xl lg:grid-flow-col-dense lg:grid-cols-3">
                                    <div class="space-y-6 lg:col-start-1 lg:col-span-2">
                                        <!-- Description list-->
                                        <section aria-labelledby="applicant-information-title">
                                            <div class="bg-white shadow sm:rounded-lg">
                                                <div class="py-2 px-5 border-b border-gray-300">
                                                    More Information
                                                </div>
                                                <div class=" px-4 py-5 sm:px-6">
                                                    <dl class="grid grid-cols-1 gap-x-4 gap-y-8 sm:grid-cols-2">
                                                        <div class="sm:col-span-1">
                                                            <dt class="text-sm font-medium text-gray-500">
                                                                Status
                                                            </dt>
                                                            <dd class="mt-1 text-sm text-gray-900">
                                                                {{ $PaymentReviewRequest->information->status }}
                                                            </dd>
                                                        </div>
                                                        <div class="sm:col-span-1">
                                                            <dt class="text-sm font-medium text-gray-500">
                                                                Email address
                                                            </dt>
                                                            <dd class="mt-1 text-sm text-gray-900">
                                                                {{ $PaymentReviewRequest->information->email }}
                                                            </dd>
                                                        </div>
                                                        <div class="sm:col-span-1">
                                                            <dt class="text-sm font-medium text-gray-500">
                                                                Address
                                                            </dt>
                                                            <dd class="mt-1 text-sm text-gray-900">
                                                                {{ $PaymentReviewRequest->information->address }}

                                                            </dd>
                                                        </div>
                                                        <div class="sm:col-span-1">
                                                            <dt class="text-sm font-medium text-gray-500">
                                                                Phone
                                                            </dt>
                                                            <dd class="mt-1 text-sm text-gray-900">
                                                                {{ $PaymentReviewRequest->information->contactnumber }}
                                                            </dd>
                                                        </div>
                                                        <div class="sm:col-span-1">
                                                            <dt class="text-sm font-medium text-gray-500">
                                                                Sex
                                                            </dt>
                                                            <dd class="mt-1 text-sm text-gray-900">
                                                                {{ $PaymentReviewRequest->information->sex }}
                                                            </dd>
                                                        </div>
                                                    </dl>
                                                    <div x-show="moreInfo" class="mt-5">

                                                        <div class="sm:col-span-1">
                                                            <dt class="text-sm font-medium text-gray-500">
                                                                Valid ID
                                                            </dt>
                                                            <dd class="mt-1 text-sm text-gray-900">
                                                                <img src="/storage/{{ $PaymentReviewRequest->information->valid_id }}"
                                                                    class="max-h-72 w-56" alt="">
                                                            </dd>
                                                        </div>

                                                    </div>

                                                </div>
                                                <div>
                                                    <a x-on:click="moreInfo=!moreInfo" type="button"
                                                        class="block cursor-pointer bg-gray-50 text-sm font-medium text-gray-500 text-center px-4 py-4 hover:text-gray-700 sm:rounded-b-lg"
                                                        x-text="moreInfo? 'Hide' : 'Show Valid ID'"></a>
                                                </div>
                                            </div>
                                        </section>

                                        <!-- Comments-->
                                        <section aria-labelledby="notes-title">
                                            <div class="bg-white shadow sm:rounded-lg sm:overflow-hidden">
                                                <div class="divide-y divide-gray-200">
                                                    <div class="px-4 py-2">
                                                        <h2 id="notes-title" class="text-lg font-medium text-gray-900">
                                                            Proof Of Payment</h2>
                                                    </div>
                                                    <div class="px-4 py-6 sm:px-6">
                                                        <img src="/storage/{{ $PaymentReviewRequest->transaction->proof_of_payment }}"
                                                            class="max-h-96 w-full" alt="">
                                                    </div>
                                                </div>

                                            </div>
                                        </section>
                                    </div>

                                    <section aria-labelledby="timeline-title" class="lg:col-start-3 lg:col-span-1">
                                        <div class="bg-white px-4 py-5 shadow sm:rounded-lg sm:px-6">
                                            <h2 id="timeline-title" class="text-lg font-medium text-gray-900">Details
                                            </h2>

                                            <div class="mt-6 flow-root">
                                                <ul>
                                                    @foreach ($PaymentReviewRequest->documents as $document)
                                                        <li class="flex items-center space-x-2">
                                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5"
                                                                viewBox="0 0 20 20" fill="currentColor">
                                                                <path
                                                                    d="M2 6a2 2 0 012-2h5l2 2h5a2 2 0 012 2v6a2 2 0 01-2 2H4a2 2 0 01-2-2V6z" />
                                                            </svg>
                                                            <h1>{{ $document->name }}</h1>
                                                        </li>
                                                    @endforeach

                                                </ul>
                                                <div class="border-t border-b border-gray-200 py-5">
                                                    Total Amount to Pay :
                                                    {{ $PaymentReviewRequest->transaction->amount }}
                                                </div>
                                                <div class="py-3">
                                                    <form>
                                                        <div>
                                                            <label for="date"
                                                                class="block text-sm font-medium text-gray-700">Retrieval
                                                                Date</label>
                                                            <div class="mt-1">
                                                                <input wire:model.defer="retrieval_date" type="date"
                                                                    name="date" id="date"
                                                                    class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md"
                                                                    placeholder="you@example.com">
                                                                @error('retrieval_date')
                                                                    <span class="text-red-600">{{ $message }}</span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>

                                        </div>
                                    </section>
                                </div>
                            </main>
                        </div>

                    </div>
                </div>
            </div>
        @endif
    </div>
    <div>
        <div wire:loading.flex
            class="w-full h-full flex fixed items-center justify-center top-0 left-0 bg-white opacity-75 z-50">
            <div class="grid items-center justify-center animate-bounce">
                <img src="{{ asset('images/loading.svg') }}" class="h-32 w-32" alt="">
                <span class="mx-auto">loading... </span>
            </div>
        </div>
    </div>

</div>
