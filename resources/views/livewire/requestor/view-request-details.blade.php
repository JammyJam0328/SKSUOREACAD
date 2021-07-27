<div class="pb-10">
    <div class="pt-4 grid space-y-4">
        <!-- This example requires Tailwind CSS v2.0+ -->
        <div class="bg-white shadow overflow-hidden sm:rounded-lg">
            <div class="px-4 py-5 sm:px-6">
                <h3 class="text-lg leading-6 font-medium text-gray-900">
                    Request Information
                </h3>
            </div>
            <div class="border-t border-gray-200 px-4 py-5 sm:p-0">
                <dl class="sm:divide-y sm:divide-gray-200">
                    <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">
                            Code
                        </dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                            {{ $request->request_code }}
                        </dd>
                    </div>
                    <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">
                            Full name
                        </dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                            {{ $request->information->firstname }}
                            {{ $request->information->middlename }}
                            {{ $request->information->lastname }}
                        </dd>
                    </div>
                    <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">
                            Expected Receiver
                        </dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                            {{ $request->receivername }}
                        </dd>
                    </div>
                    <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">
                            Status
                        </dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                            <div>
                                @if ($request->status == 'Approved')
                                    <span
                                        class="p-1 bg-green-100 text-green-600 rounded-xl">{{ $request->status }}</span>
                                @endif
                                @if ($request->status == 'Pending')
                                    <span
                                        class="p-1 bg-yellow-100 text-yellow-600 rounded-xl">{{ $request->status }}</span>
                                @endif
                                @if ($request->status == 'Denied')
                                    <span class="p-1 bg-red-100 text-red-600 rounded-xl">{{ $request->status }}</span>
                                @endif
                                @if ($request->status == 'Payment Review')
                                    <span
                                        class="p-1 bg-blue-100 text-blue-600 rounded-xl">{{ $request->status }}</span>
                                @endif
                                @if ($request->status == 'Ready To Claim')
                                    <span class="p-1 bg-green-600 text-white rounded-xl">{{ $request->status }}</span>
                                @endif
                                @if ($request->status == 'Claimed')
                                    <span class="p-1 bg-gray-600 text-white rounded-xl">{{ $request->status }}</span>
                                @endif
                            </div>

                        </dd>
                    </div>
                    <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">
                            Purpose
                        </dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                            {{ $request->purpose->description }}

                            @if ($request->other_purpose)
                                | {{ $request->other_purpose }}
                            @endif

                        </dd>
                    </div>
                    <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">
                            Remarks
                        </dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                            {{ $request->response }}
                        </dd>
                    </div>
                    <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">
                            Request Document/s
                        </dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                            <div class="flex flex-wrap gap-2">
                                @foreach ($request->documents as $document)
                                    <div class="flex items-center space-x-2 p-1 shadow rounded">
                                        <i class="fa fa-folder text-gray-600"></i>
                                        <span>{{ $document->name }}</span>

                                    </div>
                                @endforeach
                            </div>
                        </dd>
                    </div>

                </dl>
            </div>
        </div>
        <div class="w-full bg-white ring-1 ring-blue-500 shadow p-2    md:pb-5 overflow-hidden">
            @if ($request->status == 'Approved')
                <div>
                    <div class="flex items-center ">
                        <span class="text-xl px-4">
                            Payment
                        </span>
                    </div>
                    <div class="flex space-x-2 px-5 py-3">
                        <h1>TOTAL AMOUNT TO PAY :</h1> <span class="px-1 shadow-lg bg-green-100">&#8369;
                            {{ $total_amount + $request->transaction->documentary_stamp }}</span>
                    </div>

                    <div class="px-5 md:flex md:space-x-2">
                        <div class="mt-3">
                            <a href="https://epaymentportal.landbank.com/pay1.php?code=S05EUEtVSGltb2t0emdaNmwyRFV5aG1pVVYzNHdTRXByL2ZoNHZjS1pZRT0="
                                type="button"
                                class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                Proceed to Payment
                            </a>
                        </div>
                        <div class="mt-3">
                            <a href="{{ route('tutorial') }}" target="_blank" type="button"
                                class="ring-1 ring-gray-600 inline-flex items-center px-3 py-2 border border-transparent shadow-sm text-sm leading-4 font-medium rounded-md text-gray-600 bg-white hover:bg-white focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-white">
                                How to pay (Steps)
                                <!-- Heroicon name: solid/mail -->
                                <svg xmlns="http://www.w3.org/2000/svg" class="ml-2 -mr-0.5 h-4 w-4" viewBox="0 0 20 20"
                                    fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                                        clip-rule="evenodd" />
                                </svg>
                            </a>
                        </div>


                    </div>
                    <form class="border-t border-gray-400 mt-5 px-5">
                        @csrf
                        <div class="py-2 space-y-3">
                            <label for="proof_of_payment">Proof of Payment (Image of actual reciept)</label>
                            <div>
                                @if ($proof_of_payment)
                                    <img src="{{ $proof_of_payment->temporaryURL() }}" class="max-h-60 h-60 w-52"
                                        alt="">
                                @endif
                            </div>
                            <input wire:model="proof_of_payment" id="proof_of_payment" type="file"
                                autocomplete="proof_of_payment"
                                class="block max-w-lg w-full shadow-sm focus:ring-green-600 focus:border-green-600 sm:text-sm border-gray-300 ">
                            <div>
                                @error('proof_of_payment')
                                    <span class="text-red-600">{{ $message }}</span>
                                @enderror
                            </div>
                            <div>
                                <span wire:loading.flex wire:traget="proof_of_payment"
                                    class="flex space-x-2 text-green-600 items-center"><svg
                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="animate-spin"
                                        width="24" height="24">
                                        <path fill="none" d="M0 0h24v24H0z" />
                                        <path d="M18.364 5.636L16.95 7.05A7 7 0 1 0 19 12h2a9 9 0 1 1-2.636-6.364z"
                                            fill="rgba(19,165,81,1)" />
                                    </svg>
                                    <h1>Uploading . . .</h1>
                                </span>
                            </div>
                            <button wire:click.prevent="saveProofOfPayment" type="button"
                                class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md shadow-sm text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                                Save
                            </button>
                        </div>
                    </form>



                </div>

            @endif
            @if ($request->status == 'Ready To Claim')
                <div class=" px-5 py-3">
                    <div class="flex items-center space-x-3 rounded shadow p-2 bg-blue-200 text-blue-600">
                        <h1>Retrieval Date :</h1>
                        <span>{{ $request->transaction->retrieval_date }}</span>
                    </div>

                </div>
            @endif
        </div>

    </div>
    <div wire:loading.flex wire:target="saveProofOfPayment"
        class="w-full h-full flex fixed items-center justify-center top-0 left-0 bg-white opacity-75 z-50">
        <div class="grid items-center justify-center animate-bounce">
            <img src="{{ asset('images/loading.svg') }}" class="h-32 w-32" alt="">
            <span class="mx-auto">loading... </span>
        </div>
    </div>

</div>
