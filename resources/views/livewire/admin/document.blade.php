<div class="space-y-5 px-4 sm:px-6 lg:px-8" x-data="{mode:@entangle('mode')}">
    <div>
        <div x-show="mode!='add'" class="mb-8">
            <button x-on:click="mode='add'"
                class="ml-3 inline-flex justify-center py-2 px-2 border border-transparent shadow-md text-sm font-medium rounded-full text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                </svg>
            </button>
        </div>
        <div x-cloak x-show="mode=='add'" x-show="show" x-transition:enter="transition duration-200 transform ease-out"
            x-transition:enter-start="scale-75" x-transition:leave="transition duration-100 transform ease-in"
            x-transition:leave-end="opacity-0 scale-90"
            class="px-5 pb-4 shadow rounded bg-white border-t-4 border-green-600">

            <form class="space-y-8 ">
                @csrf
                <div class="space-y-8 divide-y divide-gray-200 sm:space-y-5">
                    <div class=" space-y-6  sm:space-y-5">

                        <div class="space-y-6 sm:space-y-5">
                            <div
                                class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                                <label for="Name" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                                    Name
                                </label>
                                <div class="mt-1 sm:mt-0 sm:col-span-2">
                                    <input wire:model.defer="name" type="text" name="Name" id="Name"
                                        autocomplete="given-name"
                                        class="max-w-lg block w-full shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:max-w-xs sm:text-sm border-gray-300 rounded-md">
                                    @error('name')
                                        <span class="text-red-500">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div
                                class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                                <label for="Amount" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                                    Amount
                                </label>
                                <div class="mt-1 sm:mt-0 sm:col-span-2">
                                    <input wire:model.defer="amount" type="number" name="Amount" id="Amount"
                                        autocomplete="family-name"
                                        class="max-w-lg block w-full shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:max-w-xs sm:text-sm border-gray-300 rounded-md">
                                    @error('amount')
                                        <span class="text-red-500">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div
                                class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                                <label for="other_description"
                                    class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                                    Other Description
                                </label>
                                <div class="mt-1 sm:mt-0 sm:col-span-2">
                                    <input wire:model.defer="other_description" type="text" name="other_description"
                                        id="other_description" autocomplete="street-address"
                                        class="block max-w-lg w-full shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm border-gray-300 rounded-md">
                                    @error('other_description')
                                        <span class="text-red-500">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div
                                class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                                <label for="country" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                                    Document Category
                                </label>
                                <div class="mt-1 sm:mt-0 sm:col-span-2">
                                    <select wire:model.defer="category" id="country" name="country"
                                        autocomplete="country"
                                        class="max-w-lg block focus:ring-indigo-500 focus:border-indigo-500 w-full shadow-sm sm:max-w-xs sm:text-sm border-gray-300 rounded-md">
                                        <option value=""></option>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('category')
                                        <span class="text-red-500">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="">
                    <div class="flex justify-end">
                        <button x-on:click="mode=''" type="button"
                            class="bg-white py-2 px-4 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            Cancel
                        </button>
                        <button wire:click.prevent="create"
                            class="ml-3 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
                            Save
                        </button>
                    </div>
                </div>
            </form>

        </div>




        <div x-cloak x-show="mode=='edit'" x-show="show" x-transition:enter="transition duration-200 transform ease-out"
            x-transition:enter-start="scale-75" x-transition:leave="transition duration-100 transform ease-in"
            x-transition:leave-end="opacity-0 scale-90"
            class="px-5 pb-4 shadow rounded bg-white border-t-4 border-blue-600">

            <form class="space-y-8 ">
                @csrf
                <div class="space-y-8 divide-y divide-gray-200 sm:space-y-5">
                    <div class=" space-y-6  sm:space-y-5">

                        <div class="space-y-6 sm:space-y-5">
                            <div
                                class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                                <label for="Name" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                                    Name
                                </label>
                                <div class="mt-1 sm:mt-0 sm:col-span-2">
                                    <input wire:model.defer="ename" type="text" name="Name" id="Name"
                                        autocomplete="given-name"
                                        class="max-w-lg block w-full shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:max-w-xs sm:text-sm border-gray-300 rounded-md">
                                    @error('ename')
                                        <span class="text-red-500">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div
                                class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                                <label for="Amount" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                                    Amount
                                </label>
                                <div class="mt-1 sm:mt-0 sm:col-span-2">
                                    <input wire:model.defer="eamount" type="number" name="Amount" id="Amount"
                                        autocomplete="family-name"
                                        class="max-w-lg block w-full shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:max-w-xs sm:text-sm border-gray-300 rounded-md">
                                    @error('eamount')
                                        <span class="text-red-500">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div
                                class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                                <label for="other_description"
                                    class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                                    Other Description
                                </label>
                                <div class="mt-1 sm:mt-0 sm:col-span-2">
                                    <input wire:model.defer="eother_description" type="text" name="other_description"
                                        id="other_description" autocomplete="street-address"
                                        class="block max-w-lg w-full shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm border-gray-300 rounded-md">
                                    @error('eother_description')
                                        <span class="text-red-500">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div
                                class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                                <label for="country" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                                    Document Category
                                </label>
                                <div class="mt-1 sm:mt-0 sm:col-span-2">
                                    <select wire:model.defer="ecategory" id="country" name="country"
                                        autocomplete="country"
                                        class="max-w-lg block focus:ring-indigo-500 focus:border-indigo-500 w-full shadow-sm sm:max-w-xs sm:text-sm border-gray-300 rounded-md">
                                        <option value=""></option>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('ecategory')
                                        <span class="text-red-500">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="">
                    <div class="flex justify-end">
                        <button x-on:click="mode=''" type="button"
                            class="bg-white py-2 px-4 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            Cancel
                        </button>
                        <button wire:click.prevent="update()"
                            class="ml-3 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                            Update
                        </button>
                    </div>
                </div>
            </form>

        </div>
    </div>

    <!-- Activity table (small breakpoint and up) -->
    <div class="hidden sm:block">
        <div class="max-w-6xl mx-auto ">
            <div class="flex flex-col mt-2">
                <div class="align-middle min-w-full overflow-x-auto shadow overflow-hidden sm:rounded-lg">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead>
                            <tr>
                                <th
                                    class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Name
                                </th>
                                <th
                                    class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Category
                                </th>
                                <th
                                    class="hidden px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider md:block">
                                    Amount
                                </th>
                                <th
                                    class="px-6 py-3 bg-gray-50 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Action
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @forelse ($documents as $document)
                                <tr class="bg-white">

                                    <td class="px-6 py-4 text-left whitespace-nowrap text-sm text-gray-500">
                                        {{ $document->name }}
                                    </td>
                                    <td class="px-6 py-4 text-left whitespace-nowrap text-sm text-gray-500">
                                        {{ $document->document_category->name }}
                                    </td>
                                    <td class="px-6 py-4 text-left whitespace-nowrap text-sm text-gray-500">
                                        {{ $document->amount }}
                                    </td>

                                    <td
                                        class="px-2 py-2 flex items-center justify-center space-x-2 whitespace-nowrap text-sm text-gray-500">
                                        <button wire:click.prevent="editDocument({{ $document->id }})"
                                            class="text-yellow-400 focus:outline-none hover:text-yellow-500 hover:shadow-lg p-1 rounded-md">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 S"
                                                viewBox="0 0 20 20" fill="currentColor">
                                                <path
                                                    d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z" />
                                                <path fill-rule="evenodd"
                                                    d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                        </button>
                                        <button wire:click.prevent="deleteDocument({{ $document->id }})"
                                            class="text-red-500 focus:outline-none hover:text-red-600 hover:shadow-lg p-1 rounded-md">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                                                fill="currentColor">
                                                <path fill-rule="evenodd"
                                                    d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                        </button>

                                    </td>
                                </tr>
                            @empty

                            @endforelse

                            <!-- More transactions... -->
                        </tbody>
                    </table>
                    <!-- Pagination -->
                    <div class="bg-gray-50 p-3" aria-label="Pagination">
                        {{ $documents->links() }}
                    </div>
                </div>
            </div>
        </div>
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
