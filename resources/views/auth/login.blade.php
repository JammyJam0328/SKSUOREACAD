{{-- <x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <x-jet-authentication-card-logo />
        </x-slot>

        <x-jet-validation-errors class="mb-4" />

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div>
                <x-jet-label for="email" value="{{ __('Email') }}" />
                <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            </div>

            <div class="mt-4">
                <x-jet-label for="password" value="{{ __('Password') }}" />
                <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
            </div>

            <div class="block mt-4">
                <label for="remember_me" class="flex items-center">
                    <x-jet-checkbox id="remember_me" name="remember" />
                    <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif

                <x-jet-button class="ml-4">
                    {{ __('Log in') }}
                </x-jet-button>
            </div>
        </form>
    </x-jet-authentication-card>
</x-guest-layout> --}}

<x-guest-layout>
    {{-- <div x-data={menu:false} class="relative flex items-center justify-items-center bg-gradient-to-r from-green-100 to-green-600 overflow-auto h-screen">
        <div class="hidden sm:block sm:absolute sm:inset-0" aria-hidden="true">
            <svg class="absolute bottom-0 right-0 transform translate-x-1/2 mb-48 text-gray-700 lg:top-0 lg:mt-28 lg:mb-0 xl:transform-none xl:translate-x-0"
                width="364" height="384" viewBox="0 0 364 384" fill="none">
                <defs>
                    <pattern id="eab71dd9-9d7a-47bd-8044-256344ee00d0" x="0" y="0" width="20" height="20"
                        patternUnits="userSpaceOnUse">
                        <rect x="0" y="0" width="4" height="4" fill="currentColor" />
                    </pattern>
                </defs>
                <rect width="364" height="384" fill="url(#eab71dd9-9d7a-47bd-8044-256344ee00d0)" />
            </svg>
        </div>
        <div class="relative md:pt-6 pb-16 sm:pb-24">
            <div>
                <nav class="relative max-w-7xl mx-auto flex items-center justify-between px-4 sm:px- h-14"
                    aria-label="Global">


                </nav>


            </div>

            <main class=" sm:mt-10">
                <div class="md:mx-12 max-w-7xl">
                    <div class="lg:grid lg:grid-cols-12 lg:gap-5">
                        <div
                            class="hidden md:block px-4 sm:px-6 sm:text-center md:max-w-2xl md:mx-auto lg:col-span-6 lg:text-left lg:flex lg:items-center">
                            <div>
                                <div class="pb-3 grid items-center justify-center">
                                    <div class="flex justify-center py-1">
                                        <img src="{{ asset('images/sksu1.png') }}" class="h-14 w-auto" alt="">
                                    </div>


                                    <h1 class="text-3xl font-bold text-green-900">SULTAN KUDARAT STATE UNIVERSITY
                                    </h1>


                                </div>
                                <div>
                                    <img src="{{ asset('images/OREACADLogo1.png') }}" alt="">
                                </div>



                            </div>
                        </div>
                        <div class=" sm:mt-24 lg:mt-0 lg:col-span-6">


                            <div class="bg-white py-16 px-8 shadow sm:rounded-lg  ">
                                <div class="sm:mx-auto sm:w-full sm:max-w-md">
                                    <img class="mx-auto h-14 w-auto" src="{{ asset('images/OREACADLogo.svg') }}"
                                        alt="OREACAD LOGO">
                                    <h2 class="mt-6 text-center text-3xl font-extrabold text-green-900">
                                        SIGN IN
                                    </h2>

                                </div>
                                @if (session('status'))
                                    <div class="mb-4 font-medium text-sm text-green-600">
                                        {{ session('status') }}
                                    </div>
                                @endif

                                <x-jet-validation-errors class="mb-4" />
                                <form class="space-y-3" method="POST" action="{{ route('login') }}">
                                    @csrf
                                    <div>
                                        <label for="email" class="block text-sm font-medium text-gray-700">
                                            Email address
                                        </label>
                                        <div class="mt-1">
                                            <input id="email" name="email" type="email" autocomplete="email" required
                                                class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-green-700 focus:border-green-700 sm:text-sm">
                                        </div>
                                    </div>

                                    <div>
                                        <label for="password" class="block text-sm font-medium text-gray-700">
                                            Password
                                        </label>
                                        <div class="mt-1">
                                            <input id="password" name="password" type="password"
                                                autocomplete="current-password" required
                                                class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-green-700 focus:border-green-700 sm:text-sm">
                                        </div>
                                    </div>

                                    @if (Route::has('password.request'))
                                        <a class="underline text-sm text-gray-600 hover:text-gray-900"
                                            href="{{ route('password.request') }}">
                                            {{ __('Forgot your password?') }}
                                        </a>
                                    @endif

                                    <div class="pt-5">
                                        <button type="submit"
                                            class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
                                            Sign in
                                        </button>
                                    </div>
                                </form>
                                <div class="mt-10">
                                    <div class="relative">

                                        <div class="absolute inset-0 flex items-center justify-center">
                                            <a href="{{ route('register') }}" class="underline">
                                                Register
                                            </a>
                                        </div>

                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div> --}}

    <div class="relative bg-gradient-to-r from-green-100 to-green-600 overflow-visible h-screen">
        <div class="hidden md:flex items-center justify-start space-x-3 py-5 px-10">
            <div>
                <img src="{{ asset('images/sksu1.png') }}" class="h-14 w-auto" alt="">
            </div>
            <div>
                <h1 class="text-4xl font-bold text-green-900 text-center">SULTAN KUDARAT STATE
                    UNIVERSITY
                </h1>
            </div>
        </div>

        <div class="relative pb-16 sm:pb-24">
            <main class="md:mt-10">
                <div class="mx-auto max-w-7xl">
                    <div class="lg:grid lg:grid-cols-12 lg:gap-8">
                        <div
                            class="px-4 sm:px-6 sm:text-center md:max-w-2xl md:mx-auto lg:col-span-6 lg:text-left lg:flex lg:items-center">
                            <div>
                                <div class="pb-3 grid items-center justify-center">

                                </div>
                                <div>
                                    <img src="{{ asset('images/OREACADLogo1.png') }}" alt="">
                                </div>
                            </div>
                        </div>
                        <div class="mt-16 sm:mt-24 lg:mt-0 lg:col-span-6">
                            <div class="bg-white sm:max-w-md sm:w-full sm:mx-auto sm:rounded-lg sm:overflow-hidden">
                                <div class="px-4 py-8 sm:px-10">
                                    <div class="sm:mx-auto sm:w-full sm:max-w-md">
                                        <img class="mx-auto h-14 w-auto" src="{{ asset('images/OREACADLogo.svg') }}"
                                            alt="OREACAD LOGO">
                                        <h2 class="mt-6 text-center text-3xl font-extrabold text-green-900">
                                            SIGN IN
                                        </h2>

                                    </div>
                                    @if (session('status'))
                                        <div class="mb-4 font-medium text-sm text-green-600">
                                            {{ session('status') }}
                                        </div>
                                    @endif

                                    <x-jet-validation-errors class="mb-4" />
                                    <form class="space-y-3" method="POST" action="{{ route('login') }}">
                                        @csrf
                                        <div>
                                            <label for="email" class="block text-sm font-medium text-gray-700">
                                                Email address
                                            </label>
                                            <div class="mt-1">
                                                <input id="email" name="email" type="email" autocomplete="email"
                                                    required
                                                    class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-green-700 focus:border-green-700 sm:text-sm">
                                            </div>
                                        </div>

                                        <div>
                                            <label for="password" class="block text-sm font-medium text-gray-700">
                                                Password
                                            </label>
                                            <div class="mt-1">
                                                <input id="password" name="password" type="password"
                                                    autocomplete="current-password" required
                                                    class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-green-700 focus:border-green-700 sm:text-sm">
                                            </div>
                                        </div>

                                        @if (Route::has('password.request'))
                                            <a class="underline text-sm text-gray-600 hover:text-gray-900"
                                                href="{{ route('password.request') }}">
                                                {{ __('Forgot your password?') }}
                                            </a>
                                        @endif

                                        <div class="pt-5">
                                            <button type="submit"
                                                class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
                                                Sign in
                                            </button>
                                        </div>
                                    </form>
                                    <div class="mt-10">
                                        <div class="relative">

                                            <div class="absolute inset-0 flex items-center justify-center">
                                                <a href="{{ route('register') }}" class="underline">
                                                    Register
                                                </a>
                                            </div>

                                        </div>

                                    </div>
                                </div>
                                <div class="px-4 py-6 bg-gray-50 border-t-2 border-gray-200 sm:px-10">
                                    <p class="text-xs leading-5 text-gray-500">By signing up, you agree to our <a
                                            href="#" class="font-medium text-gray-900 hover:underline">Terms</a>, <a
                                            href="#" class="font-medium text-gray-900 hover:underline">Data Policy</a>
                                        and <a href="#" class="font-medium text-gray-900 hover:underline">Cookies
                                            Policy</a>.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>





</x-guest-layout>
