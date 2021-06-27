<div>
    <main class="py-10">
        <!-- Page header -->
        <div class="bg-white p-2 rounded shadow max-w-3xl mx-auto px-4 sm:px-6 md:flex md:items-center md:justify-between md:space-x-5 lg:max-w-7xl lg:px-8">
          <div class="flex items-center space-x-5">
            <div class="flex-shrink-0">
              <div class="relative">
                <img class="h-16 w-16 rounded-full ring-2 ring-green-700" src="{{ auth()->user()->profile_photo_url }}" alt="">
                <span class="absolute inset-0 shadow-inner rounded-full" aria-hidden="true"></span>
              </div>
            </div>
            <div>
              <h1 class="text-2xl font-bold text-gray-900">{{ auth()->user()->information->firstname }} {{ auth()->user()->information->middlename }} {{ auth()->user()->information->lastname }}</h1>
              <p class="text-sm font-medium text-gray-500">Joined : <time>{{date('M d, Y', strtotime(auth()->user()->created_at))}}</time></p>
            </div>
          </div>
          <div class="mt-6 flex flex-col-reverse justify-stretch space-y-4 space-y-reverse sm:flex-row-reverse sm:justify-end sm:space-x-reverse sm:space-y-0 sm:space-x-3 md:mt-0 md:flex-row md:space-x-3">
           
            <a href="{{ route('requestor-update-information') }}" type="button" class="inline-flex items-center justify-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-100 focus:ring-blue-500">
              Update
            </a>
          </div>
        </div>
    
        <div class="mt-2 max-w-3xl mx-auto grid grid-cols-1 gap-6 sm:px-6 lg:max-w-7xl lg:grid-flow-col-dense lg:grid-cols-3">
          <div class="space-y-6 lg:col-start-1 lg:col-span-2">
            <!-- Description list-->
            <section aria-labelledby="applicant-information-title">
              <div class="bg-white shadow sm:rounded-lg">
                <div class="px-4 py-5 sm:px-6">
                  <h2 id="applicant-information-title" class="text-lg leading-6 font-medium text-gray-900">
                    Personal Information
                  </h2>

                </div>
                <div class="border-t border-gray-200 px-4 py-5 sm:px-6">
                  <dl class="grid grid-cols-1 gap-x-4 gap-y-8 sm:grid-cols-2">
                    <div class="sm:col-span-1">
                      <dt class="text-sm font-medium text-gray-500">
                        Full name
                      </dt>
                      <dd class="mt-1 text-sm text-gray-900">
                        {{ auth()->user()->information->firstname }} {{ auth()->user()->information->middlename }} {{ auth()->user()->information->lastname }}
                      </dd>
                    </div>
                    <div class="sm:col-span-1">
                      <dt class="text-sm font-medium text-gray-500">
                        Sex
                      </dt>
                      <dd class="mt-1 text-sm text-gray-900">
                        {{ auth()->user()->information->sex }}
                      </dd>
                    </div>
                    <div class="sm:col-span-1">
                      <dt class="text-sm font-medium text-gray-500">
                       Address
                      </dt>
                      <dd class="mt-1 text-sm text-gray-900">
                        {{ auth()->user()->information->address }}
                      </dd>
                    </div>
                    <div class="sm:col-span-1">
                      <dt class="text-sm font-medium text-gray-500">
                        Phone
                      </dt>
                      <dd class="mt-1 text-sm text-gray-900">
                        {{ auth()->user()->information->contactnumber }}
                      </dd>
                    </div>
                   

                    <div class="sm:col-span-1">
                        <dt class="text-sm font-medium text-gray-500">
                          Email
                        </dt>
                        <dd class="mt-1 text-sm text-gray-900">
                            {{ auth()->user()->information->email }}
                        </dd>
                      </div>
                      <div class="sm:col-span-1">
                        <dt class="text-sm font-medium text-gray-500">
                         Campus
                        </dt>
                        <dd class="mt-1 text-sm text-gray-900">
                            {{ auth()->user()->information->course->campus->name }}
                        </dd>
                      </div>
                      <div class="sm:col-span-1">
                        <dt class="text-sm font-medium text-gray-500">
                         Course
                        </dt>
                        <dd class="mt-1 text-sm text-gray-900">
                            {{ auth()->user()->information->course->name }}
                        </dd>
                      </div>
                      <div class="sm:col-span-1">
                        <dt class="text-sm font-medium text-gray-500">
                          Student number
                        </dt>
                        <dd class="mt-1 text-sm text-gray-900">
                            {{ auth()->user()->information->studentnumber }}
                        </dd>
                      </div>
                      <div class="sm:col-span-2">
                        <dt class="text-sm font-medium text-gray-500">
                          Status
                        </dt>
                        <dd class="mt-1 text-sm text-gray-900">
                            {{ auth()->user()->information->status }}
                        </dd>
                      </div>
                    
                  
                  </dl>
                </div>
                
              </div>
            </section>
    
            <!-- Comments-->
         
          </div>
    
          <section aria-labelledby="timeline-title" class="lg:col-start-3 lg:col-span-1 p-8 md:p-2">
              <div class="py-2 flex items-center justify-center">
                <span>Valid ID</span>
              </div>
            <img src="/storage/{{ auth()->user()->information->valid_id }}" class="h-60 w-full" alt="">
          </section>
        </div>
      </main>
</div>
