<div>
   <div>
    @if ($hasGcash==false)
    <div class="px-5 bg-white rounded shadow">
        <form class="space-y-8">
            @csrf
            <div class="space-y-8 divide-y divide-gray-200 sm:space-y-5">
              
              <div class="pt-8 space-y-6 sm:pt-10 sm:space-y-5">
                <div>
                  <h3 class="text-lg leading-6 font-medium text-gray-900">
                    Gcash Info
                  </h3>
                 
                </div>
                <div class="space-y-6 sm:space-y-5">
                  <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                    <label for="first_name" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                      Gcash number
                    </label>
                    <div class="mt-1 sm:mt-0 sm:col-span-2">
                      <input wire:model="gcash_number" type="text" name="number" id="number" autocomplete="given-name" class="max-w-lg block w-full shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:max-w-xs sm:text-sm border-gray-300 rounded-md">
                    </div>
                  </div>
        
                </div>
              </div>
          
            
            </div>
          
            <div class="pb-2">
              <div class="flex justify-end">
               
                <button wire:click.prevent="creategcash" class="ml-3 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                  Save
                </button>
              </div>
            </div>
          </form>
    </div> 
    @else
    <span>soon...</span>

    @endif
    
   </div>
    
   <div>
       @if ($hasRemitance==false)
       <div class="px-5 bg-white rounded shadow">

        <form class="space-y-8">
            @csrf
            <div class="space-y-8 divide-y divide-gray-200 sm:space-y-5">
              
              <div class="pt-8 space-y-6 sm:pt-10 sm:space-y-5">
                <div>
                  <h3 class="text-lg leading-6 font-medium text-gray-900">
                    Remitance info
                  </h3>
                 
                </div>
                <div class="space-y-6 sm:space-y-5">
                  <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                    <label for="first_name" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                      Complete name
                    </label>
                    <div class="mt-1 sm:mt-0 sm:col-span-2">
                      <input wire:model="complete_name" type="text" name="receiver_name" id="receiver_name" autocomplete="given-name" class="max-w-lg block w-full shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:max-w-xs sm:text-sm border-gray-300 rounded-md">
                    </div>
                  </div>
                  <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                    <label for="first_name" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                        Phone number
                    </label>
                    <div class="mt-1 sm:mt-0 sm:col-span-2">
                      <input wire:model="phone_number" type="text" name="phone_number" id="phone_number" autocomplete="given-name" class="max-w-lg block w-full shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:max-w-xs sm:text-sm border-gray-300 rounded-md">
                    </div>
                  </div>
                  <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                    <label for="Address" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                        Address
                    </label>
                    <div class="mt-1 sm:mt-0 sm:col-span-2">
                      <input wire:model="address" type="text" name="Address" id="Address" autocomplete="given-name" class="max-w-lg block w-full shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:max-w-xs sm:text-sm border-gray-300 rounded-md">
                    </div>
                  </div>
        
                </div>
              </div>
          
            
            </div>
          
            <div class="pb-2">
              <div class="flex justify-end">    
                <button  wire:click.prevent="createremitance" type="submit" class="ml-3 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                  Save
                </button>
              </div>
            </div>
          </form>
    </div> 

  
        @else
            <span>soon...</span>
       @endif
   </div>
</div>
