<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title> <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}"> <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
</head>
<body class="antialiased">
<div class="min-h-full">
    <nav class="bg-gray-800">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-16">
                <div class="flex items-center">
                    <div class="flex-shrink-0">
                        <img class="h-8 w-8" src="https://tailwindui.com/img/logos/workflow-mark-indigo-500.svg" alt="Workflow">
                    </div>
                    <div class="hidden md:block">
                        <div class="ml-10 flex items-baseline space-x-4">
                            <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->

                            <a href="{{route("reservations.index")}}" class="bg-gray-900 text-white px-3 py-2 rounded-md text-sm font-medium" aria-current="page">Rezervácie</a>

                            <a href="{{route("reviews.index")}}" class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Hodnotenia</a>

                        </div>
                    </div>
                </div>
                <div class="hidden md:block">
                    <div class="ml-4 flex items-center md:ml-6">
                        <button type="button" class="bg-gray-800 p-1 rounded-full text-gray-400 hover:text-white focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-800 focus:ring-white">
                            <span class="sr-only">View notifications</span>
                            <!-- Heroicon name: outline/bell -->
                            <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                            </svg>
                        </button>

                        <!-- Profile dropdown -->
                        <div class="ml-3 relative">
                            <div>
                                <button type="button" class="max-w-xs bg-gray-800 rounded-full flex items-center text-sm focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-800 focus:ring-white" id="user-menu-button" aria-expanded="false" aria-haspopup="true">
                                    <span class="sr-only">Open user menu</span>
                                    @if (Route::has('login'))
                                        @auth
                                    <img class="h-8 w-8 rounded-full" src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="">
                                    @else
                                            <img class="h-8 w-8 rounded-full" src="data:image/png;base64,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" alt="">

                                        @endif
                                    @endauth
                                </button>
                            </div>

                            <!--
                              Dropdown menu, show/hide based on menu state.

                              Entering: "transition ease-out duration-100"
                                From: "transform opacity-0 scale-95"
                                To: "transform opacity-100 scale-100"
                              Leaving: "transition ease-in duration-75"
                                From: "transform opacity-100 scale-100"
                                To: "transform opacity-0 scale-95"
                            -->
                            @if (Route::has('login'))
                            <div class="origin-top-right absolute right-0 mt-2 w-48 rounded-md shadow-lg py-1 bg-white ring-1 ring-black ring-opacity-5 focus:outline-none" role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button" tabindex="-1">
                                @auth
                                <a href="{{route("reservations.index")}}" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1" id="user-menu-item-0">Rezervácie</a>
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <x-dropdown-link :href="route('logout')"
                                                         onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                            {{ __('Odhlásiť sa') }}
                                        </x-dropdown-link>
                                @else
                                <a href="{{ route('login') }}" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1" id="user-menu-item-1">Prihlásiť sa</a>
                                    @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1" id="user-menu-item-2">Registrovať sa</a>
                                    @endauth
                                    @endif

                            </div>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="-mr-2 flex md:hidden">
                    <!-- Mobile menu button -->
                    <button type="button" class="bg-gray-800 inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-white hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-800 focus:ring-white" aria-controls="mobile-menu" aria-expanded="false">
                        <span class="sr-only">Open main menu</span>
                        <!--
                          Heroicon name: outline/menu

                          Menu open: "hidden", Menu closed: "block"
                        -->
                        <svg class="block h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                        <!--
                          Heroicon name: outline/x

                          Menu open: "block", Menu closed: "hidden"
                        -->
                        <svg class="hidden h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <!-- Mobile menu, show/hide based on menu state. -->
        <div class="md:hidden" id="mobile-menu">
            <div class="px-2 pt-2 pb-3 space-y-1 sm:px-3">
                <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
                <a href="#" class="bg-gray-900 text-white block px-3 py-2 rounded-md text-base font-medium" aria-current="page">Dashboard</a>

                <a href="#" class="text-gray-300 hover:bg-gray-700 hover:text-white block px-3 py-2 rounded-md text-base font-medium">Team</a>

                <a href="#" class="text-gray-300 hover:bg-gray-700 hover:text-white block px-3 py-2 rounded-md text-base font-medium">Projects</a>

                <a href="#" class="text-gray-300 hover:bg-gray-700 hover:text-white block px-3 py-2 rounded-md text-base font-medium">Calendar</a>

                <a href="#" class="text-gray-300 hover:bg-gray-700 hover:text-white block px-3 py-2 rounded-md text-base font-medium">Reports</a>
            </div>
            <div class="pt-4 pb-3 border-t border-gray-700">
                <div class="flex items-center px-5">
                    <div class="flex-shrink-0">
                        <img class="h-10 w-10 rounded-full" src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="">
                    </div>
                    <div class="ml-3">
                        <div class="text-base font-medium leading-none text-white">Tom Cook</div>
                        <div class="text-sm font-medium leading-none text-gray-400">tom@example.com</div>
                    </div>
                    <button type="button" class="ml-auto bg-gray-800 flex-shrink-0 p-1 rounded-full text-gray-400 hover:text-white focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-800 focus:ring-white">
                        <span class="sr-only">View notifications</span>
                        <!-- Heroicon name: outline/bell -->
                        <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                        </svg>
                    </button>
                </div>
                <div class="mt-3 px-2 space-y-1">
                    <a href="#" class="block px-3 py-2 rounded-md text-base font-medium text-gray-400 hover:text-white hover:bg-gray-700">Your Profile</a>

                    <a href="#" class="block px-3 py-2 rounded-md text-base font-medium text-gray-400 hover:text-white hover:bg-gray-700">Settings</a>

                    <a href="#" class="block px-3 py-2 rounded-md text-base font-medium text-gray-400 hover:text-white hover:bg-gray-700">Sign out</a>
                </div>
            </div>
        </div>
    </nav>

    <header class="bg-white shadow">
        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
            <h1 class="text-3xl font-bold text-gray-900">
                Dashboard
            </h1>
        </div>
    </header>
    <main>
        <div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
            <!-- Replace with your content -->
            <div class="px-4 py-6 sm:px-0">
                <div class="border-4 border-dashed border-gray-200 rounded-lg h-96"></div>
            </div>
            <!-- /End replace -->
        </div>
    </main>
</div>
</body>
</html>
