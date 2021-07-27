<div>
    <main class="flex-1 relative overflow-y-auto focus:outline-none">
        <div class="py-8 xl:py-10">
            <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8 xl:max-w-5xl xl:grid xl:grid-cols-3">
                <div class="xl:col-span-2 xl:pr-8 xl:border-r xl:border-gray-200">
                    <div>
                        <div>
                            <div class="md:flex md:items-center md:justify-between md:space-x-4 xl:border-b xl:pb-6">
                                <div>
                                    <h1 class="text-2xl font-bold text-gray-900">
                                        {{ $request->information->firstname }}
                                        {{ $request->information->middlename }}
                                        {{ $request->information->lastname }}</h1>

                                    <div class="flex space-x-2 items-center">
                                        <p>Request status : </p>
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
                                                class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-gray-500 text-white">
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
                                <div class="mt-4 flex space-x-3 md:mt-0">
                                    @if ($request->status == 'Ready To Claim')

                                        <button wire:click.prevent="claimed({{ $request->id }})" type="button"
                                            class="inline-flex justify-center px-4 py-2 border border-gray-300 shadow-sm text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none">

                                            <span>Mark as Claimed</span>
                                        </button>
                                    @endif
                                </div>
                            </div>
                            <aside class="mt-8 xl:hidden">
                                <h2>Document/s</h2>
                                <div class="mt-3 space-y-5">
                                    @foreach ($request->documents as $document)
                                        <div class="flex items-center space-x-2">
                                            <!-- Heroicon name: solid/chat-alt -->
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-green-400"
                                                viewBox="0 0 20 20" fill="currentColor">
                                                <path
                                                    d="M2 6a2 2 0 012-2h5l2 2h5a2 2 0 012 2v6a2 2 0 01-2 2H4a2 2 0 01-2-2V6z" />
                                            </svg>
                                            <span
                                                class="text-gray-900 text-sm font-medium">{{ $document->name }}</span>
                                        </div>
                                    @endforeach


                                </div>
                                <div class="mt-6 border-t border-gray-200 py-6 space-y-8">
                                    <div>
                                            <div>
                                                <h2 class="text-sm font-medium text-gray-500">Request Code</h2>
                                                <ul class="mt-3 space-y-3">
                                                    <li class="flex justify-start">
                                                        <a href="#" class="flex items-center space-x-3">
                                                            <div class="flex-shrink-0">

                                                            </div>
                                                            <div class="text-sm font-medium text-gray-900">
                                                                {{ $request->request_code }}</div>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>

                                    </div>
                                </div>
                                <div class="mt-6 border-t border-gray-200 py-6 space-y-8">
                                    <div>
                                        <div class="space-y-2">
                                            @if ($request->information->status != 'Denied')
                                                <label for="total_amount">Remarks :</label>
                                                <div class="flex items-center space-x-4">
                                                    {{ $request->response }}
                                                </div>
                                            @endif
                                        </div>
                                    </div>
            
                                </div>
                                <div class="mt-6 border-t border-gray-200 py-6 space-y-8">
                                    <div>
                                        @if ($request->status == 'Ready To Claim')
                                            <div>
                                                <h2 class="text-sm font-medium text-gray-500">Retrieval Date</h2>
                                                <ul class="mt-3 space-y-3">
                                                    <li class="flex justify-start">
                                                        <a href="#" class="flex items-center space-x-3">
                                                            <div class="flex-shrink-0">

                                                            </div>
                                                            <div class="text-sm font-medium text-gray-900">
                                                                {{ $request->transaction->retrieval_date }}</div>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>

                                        @endif
                                    </div>


                                </div>
                            </aside>
                            <div class="py-3 xl:pt-6 xl:pb-0">
                                <!-- This example requires Tailwind CSS v2.0+ -->
                                <section aria-labelledby="applicant-information-title">
                                    <div class="bg-white shadow sm:rounded-lg">
                                        <div class="px-4 py-5 sm:px-6">
                                            <h2 id="applicant-information-title"
                                                class="text-lg leading-6 font-medium text-gray-900">
                                                Applicant Information
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


                            </div>
                        </div>
                    </div>

                </div>
                <aside class="hidden xl:block xl:pl-8">
                    <h2>Document/s</h2>
                    <div class="mt-3 space-y-5">
                        @foreach ($request->documents as $document)
                            <div class="flex items-center space-x-2">
                                <!-- Heroicon name: solid/chat-alt -->
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-green-400"
                                    viewBox="0 0 20 20" fill="currentColor">
                                    <path d="M2 6a2 2 0 012-2h5l2 2h5a2 2 0 012 2v6a2 2 0 01-2 2H4a2 2 0 01-2-2V6z" />
                                </svg>
                                <span class="text-gray-900 text-sm font-medium">{{ $document->name }}</span>
                            </div>
                        @endforeach


                    </div>
                    <div class="mt-6 border-t border-gray-200 py-6 space-y-8">
                        <div>
                                <div>
                                    <h2 class="text-sm font-medium text-gray-500">Request Code</h2>
                                    <ul class="mt-3 space-y-3">
                                        <li class="flex justify-start">
                                            <a href="#" class="flex items-center space-x-3">
                                           
                                                <div class="text-xl font-bold text-gray-900">
                                                    {{ $request->request_code }}</div>
                                            </a>
                                        </li>
                                    </ul>
                                </div>

                        </div>
                    </div>

                    <div class="mt-6 border-t border-gray-200 py-6 space-y-8">
                        <div>
                            <div class="space-y-2">
                                @if ($request->information->status != 'Denied')
                                    <label for="total_amount">Remarks :</label>
                                    <div class="flex items-center space-x-4">
                                        {{ $request->response }}
                                    </div>
                                @endif
                            </div>
                        </div>

                    </div>
                    <div class="mt-6 border-t border-gray-200 py-6 space-y-8">
                        <div>
                            @if ($request->status == 'Ready To Claim')
                                <div>
                                    <h2 class="text-sm font-medium text-gray-500">Retrieval Date</h2>
                                    <ul class="mt-3 space-y-3">
                                        <li class="flex justify-start">
                                            <a href="#" class="flex items-center space-x-3">
                                                <div class="flex-shrink-0">

                                                </div>
                                                <div class="text-sm font-medium text-gray-900">
                                                    {{ $request->transaction->retrieval_date }}</div>
                                            </a>
                                        </li>
                                    </ul>
                                </div>

                            @endif
                        </div>


                    </div>
                </aside>
            </div>
        </div>
    </main>

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
