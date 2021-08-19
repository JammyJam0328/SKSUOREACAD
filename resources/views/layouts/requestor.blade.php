<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta name="keywords" content="Sultan Kudarat State University">
    <meta name="description" content="SKSU Online Request of Academic Records">
    <link rel="icon" href="{{ asset('images/titleIcon.png') }}">
    <title>{{ config('app.name', 'Laravel') }}</title>

    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

    <link rel="stylesheet" href="{{ mix('css/app.css') }}">

    @livewireStyles

    <script src="{{ mix('js/app.js') }}" defer></script>
    <style>
        [x-cloak] {
            display: none
        }

    </style>
</head>

<body>

    <div x-data="{userMenu:false,sideBar:false,sidBarMD:true}" class="h-screen flex overflow-hidden bg-gray-100">
        <!-- Off-canvas menu for mobile, show/hide based on off-canvas menu state. -->
        <div x-cloak x-show="sideBar" x-transition:enter="transition ease-in-out duration-300 transform"
            x-transition:enter-start="-translate-x-full" x-transition:enter-end="translate-x-0"
            x-transition:leave="transition ease-in-out duration-300 transform" x-transition:leave-start="translate-x-0"
            x-transition:leave-end="-translate-x-full" class="fixed inset-0 flex z-40 md:hidden" role="dialog"
            aria-modal="true">

            <div class="fixed inset-0 bg-gray-600 bg-opacity-75" aria-hidden="true"></div>


            <div class="relative flex-1 flex flex-col max-w-xs w-full pt-5 pb-4 bg-white">

                <div class="absolute top-0 right-0 -mr-12 pt-2">
                    <button x-on:click="sideBar=false"
                        class="ml-1 flex items-center justify-center h-10 w-10 rounded-full focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white">
                        <span class="sr-only">Close sidebar</span>
                        <!-- Heroicon name: outline/x -->
                        <svg class="h-6 w-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>

                <div class="flex-shrink-0  flex items-center justify-center px-4">
                    <img class="h-20 w-auto" src="{{ asset('images/OREACADLogo1.png') }}" alt="SKSU OREACAD">
                </div>
                <div class="mt-5 flex-1 h-0 overflow-y-auto">
                    <nav class="flex-1 px-2 bg-white space-y-1">
                        <a href="{{ route('requestor-dashboard') }}"
                            class="menu-button {{ Request::routeIs('requestor-dashboard') ? ' bg-gradient-to-r from-green-500 to-green-700 text-white' : 'text-primary' }}">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                                fill="currentColor">
                                <path
                                    d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z" />
                            </svg>
                            <span class="">Dashboard</span>
                        </a>
                        <a href="{{ route('requestor-request') }}"
                            class="menu-button {{ Request::routeIs('requestor-request') ? ' bg-gradient-to-r from-green-500 to-green-700 text-white' : 'text-primary' }}">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                                fill="currentColor">
                                <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z" />
                                <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z" />
                            </svg>
                            <span class="">Request</span>
                        </a>


                    </nav>
                </div>
            </div>

            <div class="flex-shrink-0 w-14" aria-hidden="true">
                <!-- Dummy element to force sidebar to shrink to fit close icon -->
            </div>
        </div>

        <!-- Static sidebar for desktop -->
        <div class="hidden md:flex md:flex-shrink-0">
            <div class="flex flex-col w-64">
                <!-- Sidebar component, swap this element with another sidebar if you like -->
                <div class="flex flex-col flex-grow border-r border-gray-200 pt-5 pb-4 bg-white overflow-y-auto">
                    <div class="flex items-center justify-center flex-shrink-0 px-4">
                        <img class="h-20 w-auto" src="{{ asset('images/OREACADLogo1.png') }}" alt="SKSU OREACAD">
                    </div>
                    <div class="mt-5 flex-grow flex flex-col">
                        <nav class="flex-1 px-2 bg-white space-y-1">
                            <a href="{{ route('requestor-dashboard') }}"
                                class="menu-button {{ Request::routeIs('requestor-dashboard') ? ' bg-gradient-to-r from-green-500 to-green-700 text-white' : 'text-primary' }}">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                                    fill="currentColor">
                                    <path
                                        d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z" />
                                </svg>
                                <span class="">Dashboard</span>
                            </a>
                            <a href="{{ route('requestor-request') }}"
                                class="menu-button {{ Request::routeIs('requestor-request') ? ' bg-gradient-to-r from-green-500 to-green-700 text-white' : 'text-primary' }}">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                                    fill="currentColor">
                                    <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z" />
                                    <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z" />
                                </svg>
                                <span class="">Request</span>
                            </a>


                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <div class="flex flex-col w-0 flex-1 overflow-hidden">
            <div class="relative z-10 flex-shrink-0 flex h-12  bg-gradient-to-r from-green-500 to-green-700 shadow">
                <button x-on:click="sideBar=true"
                    class="px-4 border-r border-gray-200 text-white focus:outline-none focus:ring-2 focus:ring-inset focus:ring-indigo-500 md:hidden">
                    <span class="sr-only">Open sidebar</span>
                    <!-- Heroicon name: outline/menu-alt-2 -->
                    <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h7" />
                    </svg>
                </button>

                <div class="flex-1 px-4 flex justify-between">
                    <div class="flex-1 flex">

                    </div>
                    <div class="ml-4 flex items-center md:ml-6">

                        @livewire('user-notification')
                        <!-- Profile dropdown -->
                        <div class="ml-3 relative">
                            <div>
                                <button x-on:click="userMenu=!userMenu" x-on:click.away="userMenu=false" type="button"
                                    class="max-w-xs bg-white flex items-center text-sm rounded-full focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                                    id="user-menu-button" aria-expanded="false" aria-haspopup="true">
                                    <span class="sr-only">Open user menu</span>
                                    <img class="h-8 w-8 rounded-full" src="{{ auth()->user()->profile_photo_url }}"
                                        alt="">
                                </button>
                            </div>

                            <div x-cloak x-show="userMenu"
                                class="origin-top-right absolute right-0 mt-2 w-48 rounded-md shadow-lg py-1 bg-white ring-1 ring-black ring-opacity-5 focus:outline-none"
                                role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button"
                                tabindex="-1">
                                <!-- Active: "bg-gray-100", Not Active: "" -->
                                <x-jet-responsive-nav-link href="{{ route('profile.show') }}"
                                    :active="request()->routeIs('profile.show')">
                                    {{ __('Account setting') }}
                                </x-jet-responsive-nav-link>
                                <x-jet-responsive-nav-link href="{{ route('requestor-information') }}"
                                    :active="request()->routeIs('requestor-information')">
                                    {{ __('Personal Information') }}
                                </x-jet-responsive-nav-link>
                                <hr>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <x-jet-responsive-nav-link href="{{ route('logout') }}" onclick="event.preventDefault();
                                  this.closest('form').submit();">
                                        {{ __('Log Out') }}
                                    </x-jet-responsive-nav-link>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <main class="flex-1 relative overflow-y-auto focus:outline-none">
                <div class="">
                    <div class="max-w-7xl mx-auto px-4 sm:px-6 md:px-8">

                        @yield('content')


                    </div>

                </div>
            </main>
        </div>



    </div>
    <div id="page-preloader"
        class="grid items-center justify-center  w-full h-full fixed top-0 left-0 bg-green-700 z-50">
        <span class="grid items-center justify-center animate-bounce ">
            <img src="{{ asset('images/loading.svg') }}" class="h-52 w-52" alt="">
            <h1 class="text-center text-white font-bold text-2xl">Loading . . . </h1>
        </span>
    </div>



    @livewireScripts

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10">
    </script>
    <x-livewire-alert::scripts />

    <script>
        window.addEventListener('beforeunload', (event) => {
            document.getElementById('page-preloader').style.display = "flex";
        });

        window.addEventListener('DOMContentLoaded', (event) => {
            document.getElementById('page-preloader').style.display = "none";

            function showNotification() {
                const notification = new Notification("New Notification from SKSU OROAD");
            };

            window.Livewire.on('notify', () => {

                if (Notification.permission === "granted") {

                    showNotification();

                } else if (Notification.permission !== "denied") {

                    Notification.requestPermission().then(permission => {
                        if (permission === "granted") {
                            showNotification();
                        }
                    });

                } else {

                    Notification.requestPermission();

                };
            });
        });
    </script>
</body>

</html>
