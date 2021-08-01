<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        @hasSection('title')

            <title>@yield('title') - {{ config('app.name') }}</title>
        @else
            <title>{{ config('app.name') }}</title>
        @endif

        <!-- Favicon -->
		<link rel="shortcut icon" href="{{ url(asset('favicon.ico')) }}">

        <!-- Fonts -->
        <link rel="stylesheet" href="https://rsms.me/inter/inter.css">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ url(mix('css/app.css')) }}">
        @livewireStyles

        <!-- Scripts -->
        <script src="{{ url(mix('js/app.js')) }}" defer></script>

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        @livewireScripts
    </head>

    <body>

        <!--
            This example requires Tailwind CSS v2.0+ 

            This example requires some changes to your config:

            ```
            // tailwind.config.js
            module.exports = {
            // ...
            plugins: [
            // ...
            require('@tailwindcss/forms'),
            ]
            }
            ```
        -->
        <div x-data="{sidebar: false, dropdown: false}"  class="flex h-screen overflow-hidden bg-white">
            <!-- Off-canvas menu for mobile, show/hide based on off-canvas menu state. -->
            <div x-show="sidebar === true" class="fixed inset-0 z-40 flex lg:hidden" role="dialog" aria-modal="true">
                <!--
                    Off-canvas menu overlay, show/hide based on off-canvas menu state.

                    Entering: "transition-opacity ease-linear duration-300"
                    From: "opacity-0"
                    To: "opacity-100"
                    Leaving: "transition-opacity ease-linear duration-300"
                    From: "opacity-100"
                    To: "opacity-0"
                -->
                <div class="fixed inset-0 bg-gray-600 bg-opacity-75" aria-hidden="true"></div>

                <!--
                    Off-canvas menu, show/hide based on off-canvas menu state.

                    Entering: "transition ease-in-out duration-300 transform"
                    From: "-translate-x-full"
                    To: "translate-x-0"
                    Leaving: "transition ease-in-out duration-300 transform"
                    From: "translate-x-0"
                    To: "-translate-x-full"
                -->
                <div class="relative flex flex-col flex-1 w-full max-w-xs pb-4 bg-white">
                    <!--
                        Close button, show/hide based on off-canvas menu state.

                        Entering: "ease-in-out duration-300"
                        From: "opacity-0"
                        To: "opacity-100"
                        Leaving: "ease-in-out duration-300"
                        From: "opacity-100"
                        To: "opacity-0"
                    -->
                    <div class="absolute top-0 right-0 pt-2 -mr-12">
                        <button @click="sidebar = false" class="flex items-center justify-center w-10 h-10 ml-1 rounded-full focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white">
                            <span class="sr-only">Close sidebar</span>
                            <!-- Heroicon name: outline/x -->
                            <svg class="w-6 h-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>

                    <div class="flex items-center flex-shrink-0 px-8 py-6 uppercase bg-blue-500">
                        <img src="/img/logos/logo-blue.png" alt="">
                    </div>
                    <div class="flex-1 h-0 mt-5 overflow-y-auto">
                        <nav class="px-2">
                            <div class="space-y-1">
                                <!-- Current: "bg-gray-100 text-gray-900", Default: "text-gray-600 hover:text-gray-900 hover:bg-gray-50" -->
                                <a href="{{ route('home') }}" class="flex items-center px-2 py-2 text-base {{ request()->segment(2) == 'dashboard' ? 'bg-blue-500 text-white' : 'text-blue-500' }} group leading-5 rounded-md uppercase font-light" aria-current="page">
                                    <!--
                                        Heroicon name: outline/home

                                        Current: "text-gray-500", Default: "text-gray-400 group-hover:text-gray-500"
                                    -->
                                    <svg class="flex-shrink-0 w-6 h-6 mr-3 text-gray-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                                    </svg>
                                Kezdőlap
                                </a>

                                {{-- <a href="#" class="flex items-center px-2 py-2 text-base font-medium text-gray-600 hover:text-gray-900 hover:bg-gray-50 group leading-5 rounded-md"> --}}
                                    {{-- <!-- Heroicon name: outline/view-list --> --}}
                                    {{-- <svg class="flex-shrink-0 w-6 h-6 mr-3 text-gray-400 group-hover:text-gray-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true"> --}}
                                    {{--     <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 10h16M4 14h16M4 18h16" /> --}}
                                    {{-- </svg> --}}
                                    {{-- My tasks --}}
                                {{-- </a> --}}

                                <a href="{{ route('admin.consultations.index') }}" class="flex items-center px-2 py-2 text-base  {{ request()->segment(2) == 'rendelesek' ? 'bg-blue-500 text-white' : 'text-blue-500' }} hover:text-gray-200 hover:bg-gray-50 group leading-5 rounded-md uppercase font-light">
                                    <!-- Heroicon name: outline/clock -->
                                    <svg class="flex-shrink-0 w-6 h-6 mr-3 text-gray-400 group-hover:text-gray-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                    Rendelések
                                </a>
                                <a href="{{ route('admin.applicant.index') }}" class="flex items-center px-2 py-2 text-base {{ request()->segment(2) == 'paciensek' ? 'bg-blue-500 text-white' : 'text-blue-500' }} font-light hover:text-gray-200 hover:bg-gray-50 group leading-5 rounded-md uppercase">
                                    <!-- Heroicon name: outline/clock -->
                                    <svg xmlns="http://www.w3.org/2000/svg" class="flex-shrink-0 w-6 h-6 mr-3 text-gray-400 group-hover:text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
</svg>
                                    Páciensek
                                </a>
                            </div>
                            {{-- <div class="mt-8"> --}}
                                {{-- <h3 class="px-3 text-xs font-semibold tracking-wider text-gray-500 uppercase" id="teams-headline"> --}}
                                {{--     Teams --}}
                                {{-- </h3> --}}
                                {{-- <div class="mt-1 space-y-1" role="group" aria-labelledby="teams-headline"> --}}
                                {{--     <a href="#" class="flex items-center px-3 py-2 text-base font-medium text-gray-600 group leading-5 rounded-md hover:text-gray-900 hover:bg-gray-50"> --}}
                                {{--         <span class="w-2.5 h-2.5 mr-4 bg-indigo-500 rounded-full" aria-hidden="true"></span> --}}
                                {{--         <span class="truncate"> --}}
                                {{--             Engineering --}}
                                {{--         </span> --}}
                                {{--     </a> --}}
                                {{--  --}}
                                {{--     <a href="#" class="flex items-center px-3 py-2 text-base font-medium text-gray-600 group leading-5 rounded-md hover:text-gray-900 hover:bg-gray-50"> --}}
                                {{--         <span class="w-2.5 h-2.5 mr-4 bg-green-500 rounded-full" aria-hidden="true"></span> --}}
                                {{--         <span class="truncate"> --}}
                                {{--             Human Resources --}}
                                {{--         </span> --}}
                                {{--     </a> --}}
                                {{--  --}}
                                {{--     <a href="#" class="flex items-center px-3 py-2 text-base font-medium text-gray-600 group leading-5 rounded-md hover:text-gray-900 hover:bg-gray-50"> --}}
                                {{--         <span class="w-2.5 h-2.5 mr-4 bg-yellow-500 rounded-full" aria-hidden="true"></span> --}}
                                {{--         <span class="truncate"> --}}
                                {{--             Customer Success --}}
                                {{--         </span> --}}
                                {{--     </a> --}}
                                {{-- </div> --}}
                            {{-- </div> --}}
                        </nav>
                    </div>
                </div>

                <div class="flex-shrink-0 w-14" aria-hidden="true">
                    <!-- Dummy element to force sidebar to shrink to fit close icon -->
                </div>
            </div>

            <!-- Static sidebar for desktop -->
            <div class="hidden lg:flex lg:flex-shrink-0">
                <div class="flex flex-col w-64 pb-4 bg-white border-r border-gray-200">
                    <div class="flex items-center flex-shrink-0 px-8 py-6 uppercase bg-blue-500">
                        <img src="/img/logos/logo-blue.png" alt="">
                    </div>
                    <!-- Sidebar component, swap this element with another sidebar if you like -->
                    <div class="flex flex-col flex-1 h-0 overflow-y-auto">
                        <!-- User account dropdown -->
                        <div class="relative inline-block px-3 mt-6 text-left">
                            <div>
                                <button @click="dropdown = !dropdown" type="button" class="group w-full bg-gray-100 rounded-md px-3.5 py-2 text-sm text-left font-medium text-gray-700 hover:bg-gray-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-100 focus:ring-purple-500" id="options-menu-button" aria-expanded="false" aria-haspopup="true">
                                    <span class="flex items-center justify-between w-full">
                                        <span class="flex items-center justify-between min-w-0 space-x-3">
                                            {{-- <img class="flex-shrink-0 w-10 h-10 bg-gray-300 rounded-full" src="https://images.unsplash.com/photo-1502685104226-ee32379fefbe?ixlib=rb-1.2.1&ixqx=xWUQ1R13C9&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=3&w=256&h=256&q=80" alt=""> --}}
                                            <span class="flex flex-col flex-1 min-w-0">
                                                <span class="text-sm font-medium text-gray-900 truncate">{{ auth()->user()->name }}</span>
                                                {{-- <span class="text-sm text-gray-500 truncate">@jessyschwarz</span> --}}
                                            </span>
                                        </span>
                                        <!-- Heroicon name: solid/selector -->
                                        <svg class="flex-shrink-0 w-5 h-5 text-gray-400 group-hover:text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                            <path fill-rule="evenodd" d="M10 3a1 1 0 01.707.293l3 3a1 1 0 01-1.414 1.414L10 5.414 7.707 7.707a1 1 0 01-1.414-1.414l3-3A1 1 0 0110 3zm-3.707 9.293a1 1 0 011.414 0L10 14.586l2.293-2.293a1 1 0 011.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z" clip-rule="evenodd" />
                                        </svg>
                                    </span>
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
                            <div x-show="dropdown === true" class="absolute left-0 right-0 z-10 mx-3 mt-1 bg-white shadow-lg origin-top rounded-md ring-1 ring-black ring-opacity-5 divide-y divide-gray-200 focus:outline-none" role="menu" aria-orientation="vertical" aria-labelledby="options-menu-button" tabindex="-1">
                                {{-- <div class="py-1" role="none"> --}}
                                    {{-- <!-- Active: "bg-gray-100 text-gray-900", Not Active: "text-gray-700" --> --}}
                                    {{-- <a href="#" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1" id="options-menu-item-0">View profile</a> --}}
                                    {{-- <a href="#" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1" id="options-menu-item-1">Settings</a> --}}
                                    {{-- <a href="#" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1" id="options-menu-item-2">Notifications</a> --}}
                                {{-- </div> --}}
                                {{-- <div class="py-1" role="none"> --}}
                                    {{-- <a href="#" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1" id="options-menu-item-3">Get desktop app</a> --}}
                                    {{-- <a href="#" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1" id="options-menu-item-4">Support</a> --}}
                                {{-- </div> --}}
                                <div class="py-1" role="none">
                                    <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1" id="options-menu-item-5">Kijelentkezés</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                                </div>
                            </div>
                        </div>
                        <!-- Sidebar Search -->
                        {{-- <div class="px-3 mt-5"> --}}
                            {{-- <label for="search" class="sr-only">Search</label> --}}
                            {{-- <div class="relative mt-1 rounded-md shadow-sm"> --}}
                            {{--     <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none" aria-hidden="true"> --}}
                            {{--         <!-- Heroicon name: solid/search --> --}}
                            {{--         <svg class="w-4 h-4 mr-3 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true"> --}}
                            {{--             <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd" /> --}}
                            {{--         </svg> --}}
                            {{--     </div> --}}
                            {{--     <input type="text" name="search" id="search" class="block w-full border-gray-300 focus:ring-indigo-500 focus:border-indigo-500 pl-9 sm:text-sm rounded-md" placeholder="Search"> --}}
                            {{-- </div> --}}
                        {{-- </div> --}}
                        <!-- Navigation -->
                        <nav class="px-3 mt-6">
                            <div class="space-y-1">
                                <!-- Current: "bg-gray-200 text-gray-900", Default: "text-gray-700 hover:text-gray-900 hover:bg-gray-50" -->
                                <a href="{{ route('home') }}" class="flex items-center px-2 py-2 text-sm {{ request()->segment(2) == 'dashboard' ? 'bg-blue-500 text-white' : 'text-blue-500' }} group rounded-md uppercase font-light" aria-current="page">
                                    <!--
                                        Heroicon name: outline/home

                                        Current: "text-gray-500", Default: "text-gray-400 group-hover:text-gray-500"
                                    -->
                                    <svg class="flex-shrink-0 w-6 h-6 mr-3 text-gray-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" aria-hidden="true" stroke="gray">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                                    </svg>
                                    Kezdőlap
                                </a>

                                {{-- <a href="#" class="flex items-center px-2 py-2 text-sm font-medium text-gray-700 hover:text-gray-900 hover:bg-gray-50 group rounded-md"> --}}
                                    {{-- <!-- Heroicon name: outline/view-list --> --}}
                                    {{-- <svg class="flex-shrink-0 w-6 h-6 mr-3 text-gray-400 group-hover:text-gray-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true"> --}}
                                    {{--     <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 10h16M4 14h16M4 18h16" /> --}}
                                    {{-- </svg> --}}
                                    {{-- My tasks --}}
                                {{-- </a> --}}
                            <a href="{{ route('admin.consultations.index') }}" class="flex items-center px-2 py-2 text-base {{ request()->segment(2) == 'rendelesek' ? 'bg-blue-500 text-white' : 'text-blue-500' }} font-light hover:text-gray-900 hover:bg-gray-50 group leading-5 rounded-md uppercase">
                                    <!-- Heroicon name: outline/clock -->
                                    <svg class="flex-shrink-0 w-6 h-6 mr-3 text-gray-400 group-hover:text-gray-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="gray" aria-hidden="true">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                    Rendelések
                                </a>
                                <a href="{{ route('admin.applicant.index') }}" class="flex items-center px-2 py-2 text-base {{ request()->segment(2) == 'paciensek' ? 'bg-blue-500 text-white' : 'text-blue-500' }} font-light hover:text-gray-900 hover:bg-gray-50 group leading-5 rounded-md uppercase">
                                    <!-- Heroicon name: outline/clock -->
                                    <svg xmlns="http://www.w3.org/2000/svg" class="flex-shrink-0 w-6 h-6 mr-3 text-gray-400 group-hover:text-gray-500" fill="none" viewBox="0 0 24 24" stroke="gray">
  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
</svg>
                                    Páciensek
                                </a>

                            </div>
                            {{-- <div class="mt-8"> --}}
                                {{-- <!-- Secondary navigation --> --}}
                                {{-- <h3 class="px-3 text-xs font-semibold tracking-wider text-gray-500 uppercase" id="teams-headline"> --}}
                                {{--     Teams --}}
                                {{-- </h3> --}}
                                {{-- <div class="mt-1 space-y-1" role="group" aria-labelledby="teams-headline"> --}}
                                {{--     <a href="#" class="flex items-center px-3 py-2 text-sm font-medium text-gray-700 group rounded-md hover:text-gray-900 hover:bg-gray-50"> --}}
                                {{--         <span class="w-2.5 h-2.5 mr-4 bg-indigo-500 rounded-full" aria-hidden="true"></span> --}}
                                {{--         <span class="truncate"> --}}
                                {{--             Engineering --}}
                                {{--         </span> --}}
                                {{--     </a> --}}
                                {{--  --}}
                                {{--     <a href="#" class="flex items-center px-3 py-2 text-sm font-medium text-gray-700 group rounded-md hover:text-gray-900 hover:bg-gray-50"> --}}
                                {{--         <span class="w-2.5 h-2.5 mr-4 bg-green-500 rounded-full" aria-hidden="true"></span> --}}
                                {{--         <span class="truncate"> --}}
                                {{--             Human Resources --}}
                                {{--         </span> --}}
                                {{--     </a> --}}
                                {{--  --}}
                                {{--     <a href="#" class="flex items-center px-3 py-2 text-sm font-medium text-gray-700 group rounded-md hover:text-gray-900 hover:bg-gray-50"> --}}
                                {{--         <span class="w-2.5 h-2.5 mr-4 bg-yellow-500 rounded-full" aria-hidden="true"></span> --}}
                                {{--         <span class="truncate"> --}}
                                {{--             Customer Success --}}
                                {{--         </span> --}}
                                {{--     </a> --}}
                                {{-- </div> --}}
                            {{-- </div> --}}
                        </nav>
                    </div>
                </div>
            </div>
            
            <!-- Main column -->
            <div class="flex flex-col flex-1 w-0 overflow-hidden">
                <div class="relative z-10 flex flex-shrink-0 h-16 bg-white border-b border-gray-200 lg:hidden">
                    <!-- Sidebar toggle, controls the 'sidebarOpen' sidebar state. -->
                    <button @click="sidebar = true" class="px-4 text-gray-500 border-r border-gray-200 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-purple-500 lg:hidden">
                        <span class="sr-only">Open sidebar</span>
                        <!-- Heroicon name: outline/menu-alt-1 -->
                        <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h8m-8 6h16" />
                        </svg>
                    </button>
                    <div class="flex justify-between flex-1 px-4 sm:px-6 lg:px-8">
                        <div class="flex flex-1">
                        </div>
                        <div class="flex items-center">
                            <!-- Profile dropdown -->
                            <div class="relative ml-3">
                                <div>
                                    <button @click="dropdown = !dropdown" type="button" class="flex items-center max-w-xs text-sm bg-white rounded-full focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500" id="user-menu-button" aria-expanded="false" aria-haspopup="true">
                                        <span class="sr-only">Open user menu</span>
                                        {{ auth()->user()->name }}
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
                                <div x-show="dropdown === true" class="absolute right-0 w-48 mt-2 bg-white shadow-lg origin-top-right rounded-md ring-1 ring-black ring-opacity-5 divide-y divide-gray-200 focus:outline-none" role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button" tabindex="-1">
                                    <div class="py-1" role="none">
                                        <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1" id="options-menu-item-5">Kijelentkezés</a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            @csrf
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {{ $slot }}
            </div>
        </div>
    </body>
</html>
