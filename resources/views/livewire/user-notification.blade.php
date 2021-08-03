<div x-data="{isOpen:@entangle('isOpen')}">
    <button x-on:click="isOpen=true" class="focus:outline-none pt-1 relative">
        @if ($unreadCount > 0)
            <span class="px-1 rounded-full bg-red-500 text-white absolute text-xs animate-bounce">
                {{ $unreadCount }}
            </span>
        @endif
        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-white" fill="none" viewBox="0 0 24 24"
            stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
        </svg>
    </button>

    <!-- This example requires Tailwind CSS v2.0+ -->
    <div x-cloak x-show="isOpen" x-transition:enter="transform transition ease-in-out duration-500 sm:duration-700"
        x-transition:enter-start="translate-x-full" x-transition:enter-end="translate-x-0"
        x-transition:leave="transform transition ease-in-out duration-500 sm:duration-700"
        x-transition:leave-start="translate-x-0" x-transition:leave-end="translate-x-full"
        class="fixed inset-0  z-30 overflow-hidden" aria-labelledby="slide-over-title" role="dialog" aria-modal="true">
        <div class="absolute inset-0 overflow-hidden">
            <!-- Background overlay, show/hide based on slide-over state. -->
            <div class="absolute inset-0" aria-hidden="true"></div>

            <div class="fixed inset-y-0 right-0 pl-10 max-w-full flex">
                <!--
        Slide-over panel, show/hide based on slide-over state.

        Entering: "transform transition ease-in-out duration-500 sm:duration-700"
          From: "translate-x-full"
          To: "translate-x-0"
        Leaving: "transform transition ease-in-out duration-500 sm:duration-700"
          From: "translate-x-0"
          To: "translate-x-full"
      -->
                <div class="w-screen max-w-md">
                    <div class="h-full flex flex-col py-6 bg-white shadow-xl overflow-y-scroll">
                        <div class="px-4 sm:px-6">
                            <div class="flex items-start justify-between">
                                <div class="flex items-center space-x-4">
                                    <h2 class="text-lg font-medium text-gray-900" id="slide-over-title">
                                        Notification
                                    </h2>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                                    </svg>
                                </div>

                                <div class="ml-3 h-7 flex items-center">
                                    <button wire:click="closeNotif"
                                        class="bg-white rounded-md text-gray-400 hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                        <span class="sr-only">Close panel</span>
                                        <!-- Heroicon name: outline/x -->
                                        <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M6 18L18 6M6 6l12 12" />
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="mt-6 relative flex-1 px-4 sm:px-6">
                            <!-- Replace with your content -->
                            <div class="absolute inset-0 px-4 sm:px-6">
                                <div class="h-full space-y-3" aria-hidden="true">
                                    @forelse ($unreadNotifs as $unreadNotif)
                                        <div wire:transition="fade"
                                            class="p-2 cursor-pointer shadow rounded bg-green-100">
                                            <p>{{ $unreadNotif->message }}</p>
                                            <p class="text-xs text-gray-500 text-right">
                                                {{ $unreadNotif->created_at->diffForHumans() }}</p>
                                        </div>
                                        <hr>
                                    @empty
                                    @endforelse

                                    @forelse ($readNotifs as $readNotif)
                                        <div class="py-1 border-b border-gray-200">
                                            <p>{{ $readNotif->message }}</p>
                                            <p class="text-xs text-gray-500 text-right">
                                                {{ $readNotif->created_at->diffForHumans() }}
                                            </p>
                                        </div>
                                    @empty
                                    @endforelse
                                </div>
                            </div>
                            <!-- /End replace -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
