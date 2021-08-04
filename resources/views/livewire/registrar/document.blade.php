<div>
    <div class="grid space-y-4">
        <div class="py-2">
            <div>

                <div class="mt-1 relative w-1/3 rounded-md shadow-sm">
                    <input wire:model.lazy="search" type="text" name="search" id="search"
                        class="focus:ring-green-500 focus:border-green-500 block w-full pr-10 sm:text-sm border-gray-300 rounded-md"
                        placeholder="Search Document">
                    <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                        <!-- Heroicon name: solid/question-mark-circle -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-300" viewBox="0 0 20 20"
                            fill="currentColor">
                            <path fill-rule="evenodd"
                                d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                clip-rule="evenodd" />
                        </svg>
                    </div>
                </div>
            </div>

        </div>
        <div class="space-y-4">

            <ul class="grid grid-cols-1 gap-6 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-6">

                @forelse ($documents  as $document)
                    <li
                        class="col-span-1 flex flex-col text-center bg-white rounded-md shadow divide-y divide-gray-200 ring-1 ring-green-700 ">
                        <div class="py-1">
                            @if ($document->pivot->status == 'Unavailable')
                                <div wire:click.prevent="unAvailable({{ $document->id }})"
                                    class="flex cursor-pointer items-center space-x-2 justify-center bg-red-100 text-red-500">
                                    <span class=" p-1 rounded-full "> {{ $document->pivot->status }}</span>
                                </div>
                            @else
                                <div wire:click.prevent="available({{ $document->id }})"
                                    class="flex cursor-pointer items-center space-x-2 justify-center bg-green-100 text-green-500">
                                    <span class=" p-1 rounded-full "> {{ $document->pivot->status }}</span>
                                </div>
                            @endif
                        </div>
                        <div class="flex-1 flex flex-col p-2">
                            <img class="w-32 h-32 flex-shrink-0 mx-auto " src="{{ asset('images/documents.svg') }}"
                                alt="">
                            <h3 class="mt-1 text-gray-900 text-sm font-medium">{{ $document->name }}</h3>
                            <dl class="mt-1 flex-grow flex flex-col justify-between">
                                <dt class="sr-only">Document</dt>
                                <dd class="">
                                    <div>
                                    </div>
                                </dd>
                            </dl>
                        </div>
                        <div class="py-1 flex items-center justify-center space-x-3">
                            <div>
                                &#8369; {{ $document->amount }}
                            </div>
                            @if ($document->other_description)
                                <div title="{{ $document->other_description }}">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                                        fill="currentColor">
                                        <path fill-rule="evenodd"
                                            d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </div>

                            @endif

                        </div>
                    </li>

                @empty

                @endforelse

            </ul>
        </div>
    </div>


</div>
