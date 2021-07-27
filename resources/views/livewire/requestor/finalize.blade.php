<div class="py-10">
    <div class="hidden md:block">
        <div class=" flex flex-col">
            <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                    <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Document
                                    </th>

                                    <th scope="col"
                                        class="px-2 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Authentication
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Number of Copies
                                    </th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($request->documents as $document)
                                    <tr class="bg-white border-t border-gray-500">
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                            {{ $document->name }}
                                        </td>

                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                            @if ($document->pivot->isAuth == 'no')
                                                <div class=" flex items-center space-x-2 justify-center">
                                                    <button
                                                        wire:click="authNo({{ $document->id }},{{ $request->id }})"
                                                        class="bg-green-600 text-white p-1 ring-1  rounded-md shadow">NO</button>
                                                    <button
                                                        wire:click="authYes({{ $document->id }},{{ $request->id }})"
                                                        class="bg-white text-gray-600 ring-1 ring-gray-600 p-1 rounded-md shadow">YES</button>
                                                </div>
                                            @endif
                                            @if ($document->pivot->isAuth == 'yes')
                                                <div class="flex items-center space-x-2 justify-center">
                                                    <button
                                                        wire:click="authNo({{ $document->id }},{{ $request->id }})"
                                                        class=" bg-white text-gray-600 ring-1 ring-gray-600 p-1 rounded-md
                                                    shadow">NO</button>

                                                    <button
                                                        wire:click="authYes({{ $document->id }},{{ $request->id }})"
                                                        class="bg-green-600 text-white p-1 ring-1  rounded-md shadow">YES</button>
                                                </div>


                                            @endif

                                        </td>
                                        <td x-data="{isEdit:false}"
                                            class="px-1 py-2 space-y-2 whitespace-nowrap text-sm text-gray-500">
                                            <div class="flex space-x-2 items-center justify-center">
                                                <h1>{{ $document->pivot->copies }}</h1>
                                                <button x-show="isEdit==false" x-on:click="isEdit=true"
                                                    class="focus:outline-none text-blue-500 underline font-semibold">edit</button>
                                                <button x-cloak x-show="isEdit==true" x-on:click="isEdit=false"
                                                    class="focus:outline-none text-gray-600 underline font-semibold">done</button>
                                            </div>
                                            <div x-cloak x-show="isEdit"
                                                class="flex space-x-2 items-center justify-center">
                                                <input wire:key="{{ $document->id }}" wire:model.defer="copies"
                                                    type="number"
                                                    class="focus:outline-none rounded ring-1 ring-green-500 p-1 w-16">
                                                <button
                                                    wire:click.prevent="saveCopies({{ $document->id }},{{ $request->id }})"
                                                    class="bg-green-600 text-white focus:bg-green-700 text-sm p-1 rounded shadow">Save</button>
                                            </div>

                                        </td>

                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="block md:hidden space-y-2">
        @foreach ($request->documents as $document)
            <div class="shadow rounded bg-white p-3 grid space-y-2 border-t-2 border-green-700">
                <h1 class="font-bold text-green-700">{{ $document->name }}</h1>
                <hr>
                <div class="flex space-x-2 py-1">
                    <h1>Authentication : </h1>

                    @if ($document->pivot->isAuth == 'no')
                        <div class=" flex items-center space-x-2">
                            <button wire:click="authNo({{ $document->id }},{{ $request->id }})"
                                class="bg-green-600 text-white p-1 ring-1  rounded-md shadow">NO</button>
                            <button wire:click="authYes({{ $document->id }},{{ $request->id }})"
                                class="bg-white text-gray-600 ring-1 ring-gray-600 p-1 rounded-md shadow">YES</button>
                        </div>
                    @endif
                    @if ($document->pivot->isAuth == 'yes')
                        <div class="flex items-center space-x-2">
                            <button wire:click="authNo({{ $document->id }},{{ $request->id }})" class=" bg-white text-gray-600 ring-1 ring-gray-600 p-1 rounded-md
                                                    shadow">NO</button>

                            <button wire:click="authYes({{ $document->id }},{{ $request->id }})"
                                class="bg-green-600 text-white p-1 ring-1  rounded-md shadow">YES</button>
                        </div>


                    @endif
                </div>
                <hr>
                <div x-data="{isEdit:false}">
                    <div class="flex space-x-2 items-center">
                        <h1>Number of Copies : {{ $document->pivot->copies }}</h1>
                        <button x-show="isEdit==false" x-on:click="isEdit=true"
                            class="focus:outline-none text-blue-500 underline font-semibold">edit</button>
                        <button x-cloak x-show="isEdit==true" x-on:click="isEdit=false"
                            class="focus:outline-none text-gray-600 underline font-semibold">done</button>
                    </div>
                    <div x-cloak x-show="isEdit" class="flex space-x-2 items-center">
                        <input wire:key="{{ $document->id }}" wire:model.defer="copies" type="number"
                            class="focus:outline-none rounded ring-1 ring-green-500 p-1 w-16">
                        <button wire:click.prevent="saveCopies({{ $document->id }},{{ $request->id }})"
                            class="bg-green-600 text-white focus:bg-green-700 text-sm p-1 rounded shadow">Save</button>
                    </div>

                </div>
            </div>
        @endforeach
    </div>
    <div class="p-5 flex items-center space-x-2 justify-end">
        <a href="{{ route('requestor-dashboard') }}" type="button"
            class="inline-flex items-center px-3 py-2 ring-1 ring-gray-300 border border-transparent text-sm leading-4 font-medium rounded-md shadow-sm text-gray-600 bg-white hover:bg-white focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-white">
            Do it later
        </a>
        <button wire:click.prevent="finalize()" type="button"
            class="inline-flex items-center px-3 py-2 border border-transparent ring-1 ring-green-600 text-sm leading-4 font-medium rounded-md shadow-sm text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
            Finalize
        </button>
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
