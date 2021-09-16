<div>

    <main class="pb-5">
        <!-- Page header -->
        <div
            class="max-w-3xl mx-auto px-4 sm:px-6 md:flex md:items-center md:justify-between md:space-x-5 lg:max-w-7xl lg:px-8">
            <div class="flex items-center space-x-5">
                <div class="flex-shrink-0">
                    <div class="relative">

                        <img class="h-16 w-16 rounded-full" src="{{ $request->information->user->profile_photo_url }}"
                            alt="">
                        <span class="absolute inset-0 shadow-inner rounded-full" aria-hidden="true"></span>
                    </div>
                </div>
                <div>
                    <h1 class="text-2xl font-bold text-green-700">{{ $request->information->firstname }}
                        {{ $request->information->middlename }} {{ $request->information->lastname }}</h1>
                </div>
            </div>
            <div
                class="mt-6 flex flex-col-reverse justify-stretch space-y-4 space-y-reverse sm:flex-row-reverse sm:justify-end sm:space-x-reverse sm:space-y-0 sm:space-x-3 md:mt-0 md:flex-row md:space-x-3">
                <button wire:click.prevent="denyRequest({{ $request->id }})" type="button"
                    class="inline-flex items-center justify-center px-4 py-2 border border-gray-300 shadow-sm text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-100 focus:ring-blue-500">
                    Deny
                </button>
                <button wire:click.prevent="approvedRequest({{ $request->id }})" type="button"
                    class="inline-flex items-center px-4 py-2 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">

                    Approved
                </button>

            </div>

        </div>

        <div
            class="mt-4 max-w-3xl mx-auto grid grid-cols-1 gap-6 sm:px-6 lg:max-w-7xl lg:grid-flow-col-dense lg:grid-cols-3">

            <div class="space-y-6 lg:col-start-1 lg:col-span-2">
                <!-- Description list-->
                <section aria-labelledby="applicant-information-title">
                    <div class="bg-white shadow sm:rounded-lg">
                        <div class="px-4 py-5 sm:px-6 flex items-center space-y-3">
                            <h2 id="applicant-information-title" class="text-lg leading-6 font-medium text-gray-900 ">
                                Applicant Information <span class="text-green-500">(Cleared)</span>
                            </h2>
                        </div>
                        <div class="border-t border-gray-200 px-4 py-5 sm:px-6">
                            <dl class="grid grid-cols-1 gap-x-4 gap-y-8 sm:grid-cols-2">
                                <div class="sm:col-span-1">
                                    <dt class="text-sm font-medium text-gray-500">
                                        Student number
                                    </dt>
                                    <dd class="mt-1 text-sm text-gray-900">
                                        {{ $request->information->studentnumber }}
                                    </dd>
                                </div>
                                <div class="sm:col-span-1">
                                    <dt class="text-sm font-medium text-gray-500">
                                        Email address
                                    </dt>
                                    <dd class="mt-1 text-sm text-gray-900">
                                        {{ $request->information->email }}
                                    </dd>
                                </div>
                                <div class="sm:col-span-1">
                                    <dt class="text-sm font-medium text-gray-500">
                                        Contact number
                                    </dt>
                                    <dd class="mt-1 text-sm text-gray-900">
                                        {{ $request->information->contactnumber }}
                                    </dd>
                                </div>
                                <div class="sm:col-span-1">
                                    <dt class="text-sm font-medium text-gray-500">
                                        Course
                                    </dt>
                                    <dd class="mt-1 text-sm text-gray-900">
                                        {{ $request->information->course->name }}
                                    </dd>
                                </div>
                                <div class="sm:col-span-1">
                                    <dt class="text-sm font-medium text-gray-500">
                                        Status
                                    </dt>
                                    <dd class="mt-1 text-sm text-gray-900">
                                        {{ $request->information->status }}
                                    </dd>
                                </div>
                                <div class="sm:col-span-1">
                                    <dt class="text-sm font-medium text-gray-500">
                                        Campus
                                    </dt>
                                    <dd class="mt-1 text-sm text-white p-1 shadow rounded bg-green-500">
                                        {{ $request->information->course->campus->name }}
                                    </dd>
                                </div>
                                <div class="sm:col-span-1">
                                    <dt class="text-sm font-medium text-gray-500">
                                        Address
                                    </dt>
                                    <dd class="mt-1 text-sm text-gray-900">
                                        {{ $request->information->address }}
                                    </dd>
                                </div>
                                <div class="sm:col-span-1">
                                    <dt class="text-sm font-medium text-gray-500">
                                        Sex
                                    </dt>
                                    <dd class="mt-1 text-sm text-gray-900">
                                        {{ $request->information->sex }}
                                    </dd>
                                </div>


                                <div class="sm:col-span-2">
                                    <dt class="text-sm font-medium text-gray-500">
                                        Purpose
                                    </dt>
                                    <dd class="mt-1 text-sm text-gray-900">
                                        {{ $request->purpose->description }}
                                        @if ($request->other_purpose)
                                            : {{ $request->other_purpose }}
                                        @endif
                                    </dd>
                                </div>




                            </dl>
                        </div>

                    </div>
                </section>

                <!-- Comments-->
                <section aria-labelledby="notes-title">
                    <div class="bg-white shadow sm:rounded-lg sm:overflow-hidden">
                        <div class="divide-y divide-gray-200">
                            <div class="px-4 py-5 sm:px-6">
                                <h2 id="notes-title" class="text-lg font-medium text-gray-900">Request documents</h2>
                            </div>
                            <div class="px-4 pb-6 sm:px-6">
                                <div class="mb-2 py-2 px-2 shadow-md">
                                    <p>Request Code : {{ $request->request_code }}</p>
                                </div>
                                <ul class="space-y-8">
                                    @foreach ($request->documents as $document)
                                        <li>
                                            <div class="flex space-x-3">
                                                <div class="flex-shrink-0">

                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                        class="h-5 w-5 text-green-500" viewBox="0 0 20 20"
                                                        fill="currentColor">
                                                        <path
                                                            d="M2 6a2 2 0 012-2h5l2 2h5a2 2 0 012 2v6a2 2 0 01-2 2H4a2 2 0 01-2-2V6z" />
                                                    </svg>
                                                </div>
                                                <div>
                                                    <div class="text-sm">
                                                        <a href="#"
                                                            class="font-medium text-gray-900">{{ $document->name }}</a>
                                                    </div>
                                                    <div class="mt-1 text-sm text-gray-700 space-y-1">




                                                        @if ($document->id == $TOR_ID)
                                                            <p> &#8369; ({{ $document->other_description }})</p>
                                                            <p>Copies : {{ $document->pivot->copies }}
                                                            </p>
                                                            <p>Authentication : {{ $document->pivot->isAuth }}</p>
                                                            <div>
                                                                <div>
                                                                    @if ($document->pivot->number_of_page > 0)
                                                                        <p
                                                                            wire:loading.class="animate-pulse text-green-500">
                                                                            Page :
                                                                            {{ $document->pivot->number_of_page }}
                                                                        </p>

                                                                    @endif
                                                                </div>
                                                                <div>
                                                                    @if ($document->pivot->total_amount != '0')
                                                                        <p>Total: &#8369;
                                                                            {{ $document->pivot->total_amount }}
                                                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                                                class="h-5 w-5 text-green-400"
                                                                                viewBox="0 0 20 20" fill="currentColor">
                                                                                <path fill-rule="evenodd"
                                                                                    d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                                                                    clip-rule="evenodd" />
                                                                            </svg>
                                                                        </p>
                                                                        </p>

                                                                    @endif
                                                                </div>

                                                                <div class="mt-1 flex items-center space-x-1">
                                                                    <input wire:model.debounce.250ms="page_count"
                                                                        type="number" name="npage" id="npage"
                                                                        class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md"
                                                                        placeholder="Pages">
                                                                    <button
                                                                        wire:click.prevent="savePageNumber({{ $document->id }},{{ $request->id }})"
                                                                        class="p-1 shadow rounded-md bg-indigo-700 focus:outline-none text-white hover:bg-indigo-500">save</button>
                                                                </div>
                                                                @error('page_count')
                                                                    <span class="text-red-600">{{ $message }}</span>
                                                                @enderror
                                                            </div>
                                                        @endif

                                                        @if ($document->id != $TOR_ID)
                                                            <p>&#8369; {{ $document->amount }}</p>
                                                            <p>Copies : {{ $document->pivot->copies }}
                                                            </p>
                                                            <p>Authentication : {{ $document->pivot->isAuth }}</p>
                                                            @if ($document->pivot->total_amount == '0' && $document->pivot->number_of_page == '0')
                                                                <button
                                                                    wire:click.prevent="saveTotal({{ $document->id }},{{ $request->id }})"
                                                                    class="p-1 shadow rounded-md bg-yellow-500 focus:outline-none text-white hover:bg-yellow-400"><svg
                                                                        xmlns="http://www.w3.org/2000/svg"
                                                                        class="h-5 w-5" viewBox="0 0 20 20"
                                                                        fill="currentColor">
                                                                        <path fill-rule="evenodd"
                                                                            d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                                                            clip-rule="evenodd" />
                                                                    </svg></button>
                                                            @else
                                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                                    class="h-5 w-5 text-green-600" viewBox="0 0 20 20"
                                                                    fill="currentColor">
                                                                    <path fill-rule="evenodd"
                                                                        d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                                                        clip-rule="evenodd" />
                                                                </svg>
                                                            @endif
                                                        @endif

                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                    @endforeach



                                </ul>
                            </div>
                            <div class="p-5 w-full space-y-4">
                                <div class="flex items-center space-x-2">
                                    <label for="total_amount">Total Amount of Document : &#8369;</label>
                                    <span>{{ $total_amount }}</span>
                                </div>
                                <div>
                                    <label for="total_amount">Documentary stamp</label>
                                    <div class="grid items-center space-x-4">
                                        <input wire:model="documentary_stamp" type="number" name="documentary_stamp"
                                            id="documentary_stamp"
                                            class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md">
                                        @error('documentary_stamp')
                                            <span class="text-red-600">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div>
                                    <label for="Response">Response</label>
                                    <div class="flex items-center space-x-4">
                                        <textarea wire:model.debounce.250ms="response" type="text" name="response"
                                            id="response"
                                            class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md">
                      </textarea>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </section>

            </div>

            <section aria-labelledby="timeline-title" class="lg:col-start-3 lg:col-span-1">
                <div class="bg-white px-4 py-5 shadow sm:rounded-lg sm:px-6">
                    <div class="flex items-center justify-center">
                        <h1 class="text-gray-600 text-xl">Valid ID</h1>
                    </div>
                    <img src="/storage/{{ $request->information->valid_id }}" class="w-full h-90" alt="">
                </div>
            </section>
        </div>
    </main>
    <div wire:loading.flex wire:target="approvedRequest"
        class="w-full h-full flex fixed items-center justify-center top-0 left-0 bg-white opacity-75 z-50">
        <div class="grid items-center justify-center animate-bounce">
            <img src="{{ asset('images/loading.svg') }}" class="h-32 w-32" alt="">
            <span class="mx-auto">loading... </span>
        </div>
    </div>
    <div wire:loading.flex wire:target="denyRequest"
        class="w-full h-full flex fixed items-center justify-center top-0 left-0 bg-white opacity-75 z-50">
        <div class="grid items-center justify-center animate-bounce">
            <img src="{{ asset('images/loading.svg') }}" class="h-32 w-32" alt="">
            <span class="mx-auto">loading... </span>
        </div>
    </div>


</div>
