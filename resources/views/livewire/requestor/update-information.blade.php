<div class="py-6">
    <div class="space-y-4">
    <form class="space-y-8 divide-y divide-gray-200">
        @csrf
        <div class="space-y-8 divide-y divide-gray-200 sm:space-y-5 bg-white px-5 shadow py-5">
          <div class="space-y-6  sm:space-y-5">
            <div class="flex space-x-2 items-center justify-between">
              <h3 class="text-lg leading-6 font-medium text-gray-900">
               Update Personal Information
              </h3>
              <a href="{{ URL::previous() }}" class="ml-3 inline-flex justify-center py-1 px-2 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-gray-600 hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                return
              </a>
            
            </div>
            <div class="space-y-6 sm:space-y-5">
              <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                <label for="student_number" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                  Student number 
                </label>
                <div class="mt-1 sm:mt-0 sm:col-span-2">
                  <input wire:model="student_number"  type="text" name="student_number" id="student_number"  class="max-w-lg block w-full shadow-sm focus:ring-green-600 focus:border-green-600 sm:max-w-xs sm:text-sm border-gray-300 rounded-md">
                  @error('student_number')
                      <span class="text-red-600">{{ $message }}</span>
                  @enderror
                </div>
              </div>
              <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                <label for="first_name" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                  First name
                </label>
                <div class="mt-1 sm:mt-0 sm:col-span-2">
                  <input wire:model="first_name" type="text" name="first_name" id="first_name" autocomplete="given-name" class="max-w-lg block w-full shadow-sm focus:ring-green-600 focus:border-green-600 sm:max-w-xs sm:text-sm border-gray-300 rounded-md">
                  @error('first_name')
                  <span class="text-red-600">{{ $message }}</span>
                  @enderror
                </div>
              </div>
              <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                <label for="first_name" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                  Middle name
                </label>
                <div class="mt-1 sm:mt-0 sm:col-span-2">
                  <input wire:model="middle_name" type="text" name="middle_name" id="middle_name" placeholder="Optional" class="max-w-lg block w-full shadow-sm focus:ring-green-600 focus:border-green-600 sm:max-w-xs sm:text-sm border-gray-300 rounded-md">
                  @error('middle_name')
                  <span class="text-red-600">{{ $message }}</span>
                  @enderror
                </div>
              </div>
      
              <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                <label for="last_name" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                  Last name
                </label>
                <div class="mt-1 sm:mt-0 sm:col-span-2">
                  <input wire:model="last_name" type="text" name="last_name" id="last_name" autocomplete="family-name" class="max-w-lg block w-full shadow-sm focus:ring-green-600 focus:border-green-600 sm:max-w-xs sm:text-sm border-gray-300 rounded-md">
                  @error('last_name')
                  <span class="text-red-600">{{ $message }}</span>
                  @enderror
                </div>
              </div>
             
              <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                <label for="sex" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                  Sex
                </label>
                <div class="mt-1 sm:mt-0 sm:col-span-2">
                  <select wire:model="sex" id="sex" name="sex" autocomplete="sex" class="max-w-lg block focus:ring-green-600 focus:border-green-600 w-full shadow-sm sm:max-w-xs sm:text-sm border-gray-300 rounded-md">
                    @foreach ($sexList as $item)
                        <option value="{{ $item['name'] }}">{{ $item['name'] }}</option>
                    @endforeach
                  </select>
                  @error('sex')
                  <span class="text-red-600">{{ $message }}</span>
                  @enderror
                </div>
              </div>
              
              <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                <label for="email" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                  Home address
                </label>
                <div class="mt-1 sm:mt-0 sm:col-span-2">
                  <input wire:model="address" id="email" name="email" type="email" autocomplete="email" class="block max-w-lg w-full shadow-sm focus:ring-green-600 focus:border-green-600 sm:text-sm border-gray-300 rounded-md">
                  @error('address')
                  <span class="text-red-600">{{ $message }}</span>
                  @enderror
                </div>
              </div>
              <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                <label for="email" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                  Email address
                </label>
                <div class="mt-1 sm:mt-0 sm:col-span-2">
                  <input wire:model="email" id="email" name="email" type="email" autocomplete="email" class="block max-w-lg w-full shadow-sm focus:ring-green-600 focus:border-green-600 sm:text-sm border-gray-300 rounded-md">
                  @error('email')
                  <span class="text-red-600">{{ $message }}</span>
                  @enderror
                </div>
              </div>

              <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                <label for="contact_number" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                  Contact number
                </label>
                <div class="mt-1 sm:mt-0 sm:col-span-2">
                  <input wire:model="contact_number" type="number" name="contact_number" id="contact_number"  class="max-w-lg block w-full shadow-sm focus:ring-green-600 focus:border-green-600 sm:max-w-xs sm:text-sm border-gray-300 rounded-md">
                  @error('contact_number')
                  <span class="text-red-600">{{ $message }}</span>
                  @enderror
                </div>
              </div>
      
              <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                <label for="campus" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                  Campus
                </label>
                <div class="mt-1 sm:mt-0 sm:col-span-2">
                  <select wire:model="campus" id="campus" name="camp us" autocomplete="campus" class="max-w-lg block focus:ring-green-600 focus:border-green-600 w-full shadow-sm sm:max-w-xs sm:text-sm border-gray-300 rounded-md">
                    <option value="" selected>  </option>
                    @foreach ($campuses as $campus)
                        <option value="{{ $campus->id }}">{{ $campus->name }}</option>
                    @endforeach
                   
                  </select>
                  @error('campus')
                  <span class="text-red-600">{{ $message }}</span>
                  @enderror
                </div>
              </div>

              <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                <label for="country" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                  Course
                </label>
                <div class="mt-1 sm:mt-0 sm:col-span-2">
                  <select wire:model="course"  id="course" name="course" autocomplete="course" class="max-w-lg block focus:ring-green-600 focus:border-green-600 w-full shadow-sm sm:max-w-xs sm:text-sm border-gray-300 rounded-md">
                    <option value="" selected>  </option>
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
              <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                <label for="status" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                  Status
                </label>
                <div class="mt-1 sm:mt-0 sm:col-span-2">
                  <select wire:model="status" id="status" name="status" class="max-w-lg block focus:ring-green-600 focus:border-green-600 w-full shadow-sm sm:max-w-xs sm:text-sm border-gray-300 rounded-md">
                    @foreach ($statusList as $item)
                        <option value="{{ $item['name'] }}">{{ $item['name'] }}</option>
                    @endforeach
                  </select>
                  @error('status')
                  <span class="text-red-600">{{ $message }}</span>
                  @enderror
                </div>
              </div>
      
              <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                <label for="valid_id" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                  Valid ID
                </label>
                <div class="mt-1 sm:mt-0 sm:col-span-2 space-y-2">
                  @if ($valid_id==null)
                  <img src="/storage/{{ auth()->user()->information->valid_id }}" class="h-60 w-52 shadow-md" alt="">
                  @endif

                  @if ($valid_id)
                  <img src="{{ $valid_id->temporaryUrl() }}" class="h-60 w-52 shadow-md" alt="">
                  @endif
                   
                  <input wire:model="valid_id" id="valid_id" name="email" type="file" autocomplete="valid_id" class="block max-w-lg w-full shadow-sm focus:ring-green-600 focus:border-green-600 sm:text-sm border-gray-300 ">
                  @error('valid_id')
                  <span class="text-red-600">{{ $message }}</span>
                  @enderror
                  <div wire:loading wire:target="valid_id" class="flex space-x-2 items-center text-green-600">
                    <i class="fa fa-spinner fa-spin"></i>
                    <span class="">Uploading...</span>
                  </div>
                </div>
              </div>
            </div>
          </div>
      
        </div>
      
        <div class="pt-5">
          <div class="flex items-center justify-end">
            <div wire:loading wire:target="update" class="flex space-x-2 items-center text-green-600">
              <i class="fa fa-spinner fa-spin"></i>
              <span class="">Updating...</span>
            </div>
            <button wire:click.prevent="update" class="ml-3 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
              Update
            </button>
          </div>
        </div>
      </form>

    </div>
  
</div>
