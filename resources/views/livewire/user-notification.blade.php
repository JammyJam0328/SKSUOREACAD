<div x-data="{isOpen:false}">
    <button x-on:click="isOpen=!isOpen" class="focus:outline-none pt-1 relative">
        <span class="px-1 rounded-full bg-red-500 text-white absolute text-xs animate-bounce">
        </span>
        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-white" fill="none" viewBox="0 0 24 24"
            stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
        </svg>
    </button>
    <div x-cloak x-show="isOpen" x-on:click.away="isOpen=false"
        class="origin-top-right absolute right-10 mt-2 w-60 max-h-72 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 focus:outline-none"
        role="menu" aria-orientation="vertical" aria-labelledby="menu-button" tabindex="-1">
        <div class="py-1 px-2 divide-y divide-gray-200" role="none">
            <!-- Active: "bg-gray-100 text-gray-900", Not Active: "text-gray-700" -->
            <div class="py-1">
                Notification conten will be display her
            </div>
            <div class="py-1">
                Notification conten will be display her
            </div>
            <div class="py-1">
                Notification conten will be display her
            </div>
            <div class="py-1">
                Notification conten will be display her
            </div>
        </div>
    </div>
</div>
