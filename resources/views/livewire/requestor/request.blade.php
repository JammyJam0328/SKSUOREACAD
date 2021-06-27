<div class="py-6">



    @if ($dontHaveInformation)
        <div class="space-y-4">
            <div
                class="flex items-center space-x-2 p-2 shadow rounded-md bg-white ring-1 ring-green-700 text-green-700">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd"
                        d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                        clip-rule="evenodd" />
                </svg>
                <span>Please provide your information</span>
            </div>
            <form class="space-y-8 divide-y divide-gray-200">
                @csrf
                <div class="space-y-8 divide-y divide-gray-200 sm:space-y-5 bg-white px-5 shadow py-5">
                    <div class="space-y-6  sm:space-y-5">
                        <div>
                            <h3 class="text-lg leading-6 font-medium text-gray-900">
                                Personal Information
                            </h3>

                        </div>
                        <div class="space-y-6 sm:space-y-5">
                            <div
                                class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                                <label for="student_number"
                                    class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                                    Student number
                                </label>
                                <div class="mt-1 sm:mt-0 sm:col-span-2">
                                    <input wire:model.lazy="student_number" type="text" name="student_number"
                                        id="student_number"
                                        class="max-w-lg block w-full shadow-sm focus:ring-green-600 focus:border-green-600 sm:max-w-xs sm:text-sm border-gray-300 rounded-md">
                                    @error('student_number')
                                        <span class="text-red-600">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div
                                class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                                <label for="first_name"
                                    class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                                    First name
                                </label>
                                <div class="mt-1 sm:mt-0 sm:col-span-2">
                                    <input wire:model.lazy="first_name" type="text" name="first_name" id="first_name"
                                        autocomplete="given-name"
                                        class="max-w-lg block w-full shadow-sm focus:ring-green-600 focus:border-green-600 sm:max-w-xs sm:text-sm border-gray-300 rounded-md">
                                    @error('first_name')
                                        <span class="text-red-600">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div
                                class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                                <label for="first_name"
                                    class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                                    Middle name
                                </label>
                                <div class="mt-1 sm:mt-0 sm:col-span-2">
                                    <input wire:model.lazy="middle_name" type="text" name="middle_name" id="middle_name"
                                        placeholder="Optional"
                                        class="max-w-lg block w-full shadow-sm focus:ring-green-600 focus:border-green-600 sm:max-w-xs sm:text-sm border-gray-300 rounded-md">
                                    @error('middle_name')
                                        <span class="text-red-600">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div
                                class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                                <label for="last_name" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                                    Last name
                                </label>
                                <div class="mt-1 sm:mt-0 sm:col-span-2">
                                    <input wire:model.lazy="last_name" type="text" name="last_name" id="last_name"
                                        autocomplete="family-name"
                                        class="max-w-lg block w-full shadow-sm focus:ring-green-600 focus:border-green-600 sm:max-w-xs sm:text-sm border-gray-300 rounded-md">
                                    @error('last_name')
                                        <span class="text-red-600">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div
                                class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                                <label for="sex" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                                    Sex
                                </label>
                                <div class="mt-1 sm:mt-0 sm:col-span-2">
                                    <select wire:model.lazy="sex" id="sex" name="sex" autocomplete="sex"
                                        class="max-w-lg block focus:ring-green-600 focus:border-green-600 w-full shadow-sm sm:max-w-xs sm:text-sm border-gray-300 rounded-md">
                                        @foreach ($sexList as $item)
                                            <option value="{{ $item['name'] }}">{{ $item['name'] }}</option>
                                        @endforeach
                                    </select>
                                    @error('sex')
                                        <span class="text-red-600">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div
                                class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                                <label for="email" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                                    Home address
                                </label>
                                <div class="mt-1 sm:mt-0 sm:col-span-2">
                                    <input wire:model.lazy="address" placeholder="Streed/Block/Lot# Town/City, Province"
                                        id="address" name="address" type="text" autocomplete="address"
                                        class="placeholder-gray-400 block max-w-lg w-full shadow-sm focus:ring-green-600 focus:border-green-600 sm:text-sm border-gray-300 rounded-md">
                                    @error('address')
                                        <span class="text-red-600">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div
                                class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                                <label for="email" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                                    Email address
                                </label>
                                <div class="mt-1 sm:mt-0 sm:col-span-2">
                                    <input wire:model.lazy="email" id="email" name="email" type="email"
                                        autocomplete="email"
                                        class="block max-w-lg w-full shadow-sm focus:ring-green-600 focus:border-green-600 sm:text-sm border-gray-300 rounded-md">
                                    @error('email')
                                        <span class="text-red-600">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div
                                class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                                <label for="contact_number"
                                    class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                                    Contact number
                                </label>
                                <div class="mt-1 sm:mt-0 sm:col-span-2">
                                    <input wire:model.lazy="contact_number" type="text" name="contact_number"
                                        id="contact_number"
                                        class="max-w-lg block w-full shadow-sm focus:ring-green-600 focus:border-green-600 sm:max-w-xs sm:text-sm border-gray-300 rounded-md">
                                    @error('contact_number')
                                        <span class="text-red-600">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div
                                class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                                <label for="campus" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                                    Campus
                                </label>
                                <div class="mt-1 sm:mt-0 sm:col-span-2">
                                    <select wire:model.lazy="campus" id="campus" name="camp us" autocomplete="campus"
                                        class="max-w-lg block focus:ring-green-600 focus:border-green-600 w-full shadow-sm sm:max-w-xs sm:text-sm border-gray-300 rounded-md">
                                        <option value="" selected> </option>
                                        @foreach ($campuses as $campus)
                                            <option value="{{ $campus->id }}">{{ $campus->name }}</option>
                                        @endforeach

                                    </select>
                                    @error('campus')
                                        <span class="text-red-600">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div
                                class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                                <label for="country" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                                    Course
                                </label>
                                <div class="mt-1 sm:mt-0 sm:col-span-2">
                                    <select wire:model.lazy="course" id="course" name="course" autocomplete="course"
                                        class="max-w-lg block focus:ring-green-600 focus:border-green-600 w-full shadow-sm sm:max-w-xs sm:text-sm border-gray-300 rounded-md">
                                        <option value="" selected> </option>
                                        @if ($campus)
                                            @foreach ($my_campus_courses as $course)
                                                <option value="{{ $course->id }}">{{ $course->name }}</option>
                                            @endforeach
                                        @endif

                                    </select>
                                    @error('course')
                                        <span class="text-red-600">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div
                                class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                                <label for="status" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                                    Status
                                </label>
                                <div class="mt-1 sm:mt-0 sm:col-span-2">
                                    <select wire:model.lazy="status" id="status" name="status"
                                        class="max-w-lg block focus:ring-green-600 focus:border-green-600 w-full shadow-sm sm:max-w-xs sm:text-sm border-gray-300 rounded-md">
                                        @foreach ($statusList as $item)
                                            <option value="{{ $item['name'] }}">{{ $item['name'] }}</option>
                                        @endforeach
                                    </select>
                                    @error('status')
                                        <span class="text-red-600">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div
                                class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                                <label for="valid_id" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                                    Valid ID
                                </label>
                                <div class="mt-1 sm:mt-0 sm:col-span-2 space-y-2">
                                    @if ($valid_id)
                                        <img src="{{ $valid_id->temporaryUrl() }}" class="h-60 w-52 shadow-md"
                                            alt="">
                                    @endif
                                    <input wire:model.lazy="valid_id" id="valid_id" name="email" type="file"
                                        autocomplete="valid_id"
                                        class="block max-w-lg w-full shadow-sm focus:ring-green-600 focus:border-green-600 sm:text-sm border-gray-300 ">
                                    @error('valid_id')
                                        <span class="text-red-600">{{ $message }}</span>
                                    @enderror
                                    <div wire:loading.flex wire:target="valid_id"
                                        class="flex items-center space-x-2 text-green-700">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24"
                                            height="24" class="animate-spin">
                                            <path fill="none" d="M0 0h24v24H0z" />
                                            <path d="M18.364 5.636L16.95 7.05A7 7 0 1 0 19 12h2a9 9 0 1 1-2.636-6.364z"
                                                fill="rgba(13,168,78,1)" />
                                        </svg>
                                        <span>Uploading ...</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="pt-5">
                    <div class="flex items-center justify-end">

                        <button wire:click.prevent="create"
                            class="ml-3 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            Save
                        </button>
                    </div>
                </div>
            </form>

        </div>



    @else
        {{-- Exist Information? Direct Request --}}
        <div x-data="{others:@entangle('others')}" class="space-y-4">
            <div class="bg-white shadow rounded">
                <div class="px-4 sm:px-6 lg:max-w-6xl lg:mx-auto lg:px-8">
                    <div class="py-3 md:flex md:items-center md:justify-between lg:border-t lg:border-gray-200">
                        <div class="flex-1 min-w-0">
                            <!-- Profile -->
                            <div class="flex items-center">
                                <img class="hidden h-16 w-16  rounded-full md:block"
                                    src="{{ auth()->user()->profile_photo_url }}" alt="">
                                <div>
                                    <div class="flex items-center space-x-2">
                                        <img class="block md:hidden h-10 w-10  rounded-full "
                                            src="{{ auth()->user()->profile_photo_url }}" alt="">
                                        <h1
                                            class="ml-3 text-2xl font-bold leading-7 text-gray-900 sm:leading-9 sm:truncate">
                                            {{ auth()->user()->information->firstname }}
                                            {{ auth()->user()->information->middlename }}
                                            {{ auth()->user()->information->lastname }}

                                        </h1>
                                    </div>
                                    <dl class="mt-6 flex flex-col sm:ml-3 sm:mt-1 sm:flex-row sm:flex-wrap">
                                        <dt class="sr-only">Company</dt>
                                        <dd
                                            class="flex items-center text-sm text-gray-500 font-medium capitalize sm:mr-6">
                                            <!-- Heroicon name: solid/office-building -->
                                            <i class="fa fa-portrait flex-shrink-0 mr-1.5 h-5 w-5 text-gray-400"></i>

                                            {{ auth()->user()->information->studentnumber }}

                                        </dd>
                                        <dt class="sr-only">Account status</dt>
                                        <dd
                                            class="mt-3 flex items-center text-sm text-gray-500 font-medium sm:mr-6 sm:mt-0 capitalize">
                                            <!-- Heroicon name: solid/check-circle -->
                                            @if (auth()->user()->information->status == 'Graduated')
                                                <i
                                                    class="fa fa-graduation-cap flex-shrink-0 mr-1.5 h-5 w-5 text-gray-400"></i>
                                            @endif
                                            @if (auth()->user()->information->status == 'Ongoing')
                                                <i class="fa fa-book flex-shrink-0 mr-1.5 h-5 w-5 text-gray-400"></i>
                                            @endif
                                            @if (auth()->user()->information->status == 'Not Graduated')
                                                <i
                                                    class="fa fa-building flex-shrink-0 mr-1.5 h-5 w-5 text-gray-400"></i>
                                            @endif
                                            {{ auth()->user()->information->status }}
                                        </dd>
                                    </dl>
                                </div>
                            </div>
                        </div>
                        <div class="mt-6 flex space-x-3 md:mt-0 md:ml-4">
                            <a href="{{ route('requestor-update-information') }}" type="button"
                                class="inline-flex items-center px-4 py-2 border border-green-700 shadow-sm text-sm font-medium rounded-md text-white bg-green-700 hover:bg-green-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-700">
                                Update Information
                            </a>
                        </div>
                    </div>
                </div>
            </div>


            <div class="p-4 bg-white shadow-md space-y-5 border-t-4 border-green-700">
                <div class=" rounded shadow ring-1 ring-green-600 text-green-700 flex items-center space-x-2 p-2">
                    @if (auth()->user()->information->status == $ongoing || auth()->user()->information->status == $not_graduated)
                        <i class="fa fa-info-circle"></i>
                        <span class="">{{ $send_to_msg }}
                            {{ auth()->user()->information->course->campus->name }}</span>
                    @endif

                    @if (auth()->user()->information->status == $graduated)
                        <i class="fa fa-info-circle"></i>
                        <span class="">{{ $send_to_msg }} {{ $send_to_access->name }}</span>
                    @endif

                </div>


                {{-- form request --}}
                <div>

                    <div class="">
                        <span>Select Document and Complete the form</span>
                    </div>

                    <form class="space-y-8 ">
                        @csrf
                        <div class="grid md:flex gap-x-20 gap-y-2">
                            @foreach ($categories as $category)
                                <div class="space-y-2">
                                    <span class="font-semibold text-lg">{{ $category->name }}</span>
                                    @forelse ($my_campus_documents->where('document_category_id', $category->id) as $document)
                                        <div class="relative flex items-start">
                                            <div class="flex items-center h-5">
                                                <input wire:model="selected_documents" value="{{ $document->id }}"
                                                    id="selectedDocs" name="selectedDocs" type="checkbox"
                                                    class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded">
                                            </div>
                                            <div class="ml-3 text-sm">
                                                <label for="offers"
                                                    class="font-medium text-gray-700">{{ $document->name }}</label>
                                            </div>
                                        </div>
                                    @empty
                                        <div class="grid items-center justify-center">
                                            <div class="mx-auto">
                                                <img src="{{ asset('images/empty.svg') }}" class="h-40 w-40" alt="">
                                                <span class="text-gray-700">No available document </span>
                                            </div>
                                        </div>

                                    @endforelse
                                </div>
                            @endforeach

                        </div>
                </div>
                <div class='py-1'>
                    @error('selected_documents')
                        <span class="text-red-600">{{ $message }}</span>
                    @enderror

                    <div class="space-y-8 divide-y divide-gray-200 sm:space-y-5">
                        <div class="pt-8 space-y-6 sm:pt-10 sm:space-y-5">

                            <div class="space-y-6 sm:space-y-5">

                                <div>
                                    @if (in_array($Authentication, $selected_documents))
                                        <div
                                            class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                                            <label for="first_name"
                                                class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                                                Number of Set (Authentication)
                                            </label>
                                            <div class="mt-1 sm:mt-0 sm:col-span-2">
                                                <input wire:model.lazy="set" type="text" name="set" id="set"
                                                    autocomplete="given-name"
                                                    class="max-w-lg block w-full shadow-sm focus:ring-green-600 focus:border-green-600 sm:max-w-xs sm:text-sm border-gray-300 rounded-md">
                                                @error('set')
                                                    <span class="text-red-600">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    @endif
                                </div>
                                <div
                                    class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                                    <label for="first_name"
                                        class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                                        Complete name of receiver
                                    </label>
                                    <div class="mt-1 sm:mt-0 sm:col-span-2">
                                        <input wire:model.lazy="receiver_name" type="text" name="receiver_name"
                                            id="receiver_name" autocomplete="given-name"
                                            class="max-w-lg block w-full shadow-sm focus:ring-green-600 focus:border-green-600 sm:max-w-xs sm:text-sm border-gray-300 rounded-md">
                                        @error('receiver_name')
                                            <span class="text-red-600">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>





                                <div
                                    class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                                    <label for="country"
                                        class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                                        Purpose
                                    </label>
                                    <div class="mt-1 sm:mt-0 sm:col-span-2 space-y-2">
                                        <select wire:change="selectChanged" wire:model="purpose" id="purpose"
                                            name="purpose"
                                            class="max-w-lg block focus:ring-green-600 focus:border-green-600 w-full shadow-sm sm:max-w-xs sm:text-sm border-gray-300 rounded-md">
                                            <option value="" selected></option>
                                            @foreach ($purposes as $purpose)
                                                <option value="{{ $purpose->id }}">{{ $purpose->description }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('purpose')
                                            <span class="text-red-600">{{ $message }}</span>
                                        @enderror
                                        <div x-show="others">
                                            <input wire:model="specified_purpose" type="text" name="specified_purpose"
                                                placeholder="Specify your purpose" id="specified_purpose"
                                                class="max-w-lg block w-full shadow-sm focus:ring-green-600 focus:border-green-600 sm:max-w-xs sm:text-sm border-gray-300 rounded-md">
                                            @error('specified_purpose')
                                                <span class="text-red-600">{{ $message }}</span>
                                            @enderror
                                        </div>

                                    </div>

                                </div>



                            </div>
                        </div>


                    </div>

                    <div class="pt-5">
                        <div class="flex items-center justify-end">

                            <button wire:click.prevent="requestdocument"
                                class=" items-center space-x-2 ml-3 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
                                <i class="fa fa-paper-plane"></i>
                                <span>Send</span>
                            </button>
                        </div>
                    </div>
                    </form>




                </div>


            </div>
        </div>

    @endif

    <div>
        <div wire:loading.flex wire:target="requestdocument"
            class="w-full h-full flex fixed items-center justify-center top-0 left-0 bg-white opacity-75 z-50">
            <div class="grid items-center justify-center animate-bounce">
                <img src="{{ asset('images/loading.svg') }}" class="h-32 w-32" alt="">
                <span class="mx-auto">loading... </span>
            </div>
        </div>
        <div wire:loading.flex wire:target="create"
            class="w-full h-full flex fixed items-center justify-center top-0 left-0 bg-white opacity-75 z-50">
            <div class="grid items-center justify-center animate-bounce">
                <img src="{{ asset('images/loading.svg') }}" class="h-32 w-32" alt="">
                <span class="mx-auto">loading... </span>
            </div>
        </div>
    </div>
</div>
