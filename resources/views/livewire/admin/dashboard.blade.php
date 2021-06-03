<div>
    <!-- Search header -->
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
                            <form class="flex w-full md:ml-0" action="#" method="GET">
                                    <label for="search_field" class="sr-only">Search</label>
                                    <div class="relative w-full text-gray-400 focus-within:text-gray-600">
                                            <div class="absolute inset-y-0 left-0 flex items-center pointer-events-none">
                                                    <!-- Heroicon name: solid/search -->
                                                    <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                            <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd" />
                                                        </svg>
                                                </div>
                                            <input id="search_field" name="search_field" class="block w-full h-full py-2 pl-8 pr-3 text-gray-900 placeholder-gray-500 border-transparent focus:outline-none focus:ring-0 focus:border-transparent focus:placeholder-gray-400 sm:text-sm" placeholder="Search" type="search">
                                        </div>
                                </form>
                        </div>
                    <div class="flex items-center">
                            <!-- Profile dropdown -->
                            <div class="relative ml-3">
                                    <div>
                                            <button type="button" class="flex items-center max-w-xs text-sm bg-white rounded-full focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500" id="user-menu-button" aria-expanded="false" aria-haspopup="true">
                                                    <span class="sr-only">Open user menu</span>
                                                    <img class="w-8 h-8 rounded-full" src="https://images.unsplash.com/photo-1502685104226-ee32379fefbe?ixlib=rb-1.2.1&ixqx=xWUQ1R13C9&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="">
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
                                    <div class="absolute right-0 w-48 mt-2 bg-white shadow-lg origin-top-right rounded-md ring-1 ring-black ring-opacity-5 divide-y divide-gray-200 focus:outline-none" role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button" tabindex="-1">
                                            <div class="py-1" role="none">
                                                    <a href="#" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1" id="user-menu-item-5">Logout</a>
                                                </div>
                                        </div>
                                </div>
                        </div>
                </div>
        </div>
    <main class="relative z-0 flex-1 overflow-y-auto focus:outline-none">
            <!-- Page title & actions -->
            <x-pages.header>
                    Kezdőlap
            </x-pages.header>

            <!-- Pinned projects -->
            <div class="px-4 mt-6 sm:px-6 lg:px-8">
                    <h2 class="text-xs font-medium tracking-wide text-gray-500 uppercase">Pinned Projects</h2>
                    <ul class="mt-3 grid grid-cols-1 gap-4 sm:gap-6 sm:grid-cols-2 xl:grid-cols-4">
                            <li class="relative flex col-span-1 shadow-sm rounded-md">
                                    <div class="flex items-center justify-center flex-shrink-0 w-16 text-sm font-medium text-white bg-pink-600 rounded-l-md">
                                            GA
                                        </div>
                                    <div class="flex items-center justify-between flex-1 truncate bg-white border-t border-b border-r border-gray-200 rounded-r-md">
                                            <div class="flex-1 px-4 py-2 text-sm truncate">
                                                    <a href="#" class="font-medium text-gray-900 hover:text-gray-600">
                                                            GraphQL API
                                                        </a>
                                                    <p class="text-gray-500">12 Members</p>
                                                </div>
                                            <div class="flex-shrink-0 pr-2">
                                                    <button type="button" class="inline-flex items-center justify-center w-8 h-8 text-gray-400 bg-white rounded-full hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500" id="pinned-project-options-menu-0-button" aria-expanded="false" aria-haspopup="true">
                                                            <span class="sr-only">Open options</span>
                                                            <!-- Heroicon name: solid/dots-vertical -->
                                                            <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                                    <path d="M10 6a2 2 0 110-4 2 2 0 010 4zM10 12a2 2 0 110-4 2 2 0 010 4zM10 18a2 2 0 110-4 2 2 0 010 4z" />
                                                                </svg>
                                                        </button>

                                                    <!--
                                                        Dropdown menu, show/hide based on menu state.

                                                        Entering: "transition ease-out duration-100"
                                                        From: "transform opacity-0 scale-95"
                                                        To: "transform opacity-100 scale-100"
                                                        Leaving: "transition ease-in duration-75"
                                                        From: "transform opacity-100 scale-100"
                                                        To: "transform opacity-0 scale-95"
                                                    -->
                                                    <div class="absolute z-10 w-48 mx-3 mt-1 bg-white shadow-lg origin-top-right right-10 top-3 rounded-md ring-1 ring-black ring-opacity-5 divide-y divide-gray-200 focus:outline-none" role="menu" aria-orientation="vertical" aria-labelledby="pinned-project-options-menu-0-button" tabindex="-1">
                                                            <div class="py-1" role="none">
                                                                    <!-- Active: "bg-gray-100 text-gray-900", Not Active: "text-gray-700" -->
                                                                    <a href="#" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1" id="pinned-project-options-menu-0-item-0">View</a>
                                                                </div>
                                                            <div class="py-1" role="none">
                                                                    <a href="#" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1" id="pinned-project-options-menu-0-item-1">Removed from pinned</a>
                                                                    <a href="#" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1" id="pinned-project-options-menu-0-item-2">Share</a>
                                                                </div>
                                                        </div>
                                                </div>
                                        </div>
                                </li>

                            <!-- More items... -->
                        </ul>
                </div>

            <!-- Projects list (only on smallest breakpoint) -->
            <div class="mt-10 sm:hidden">
                    <div class="px-4 sm:px-6">
                            <h2 class="text-xs font-medium tracking-wide text-gray-500 uppercase">Projects</h2>
                        </div>
                    <ul class="mt-3 border-t border-gray-200 divide-y divide-gray-100">
                            <li>
                                    <a href="#" class="flex items-center justify-between px-4 py-4 group hover:bg-gray-50 sm:px-6">
                                            <span class="flex items-center truncate space-x-3">
                                                    <span class="w-2.5 h-2.5 flex-shrink-0 rounded-full bg-pink-600" aria-hidden="true"></span>
                                                    <span class="text-sm font-medium truncate leading-6">
                                                            GraphQL API
                                                            <span class="font-normal text-gray-500 truncate">in Engineering</span>
                                                        </span>
                                                </span>
                                            <!-- Heroicon name: solid/chevron-right -->
                                            <svg class="w-5 h-5 ml-4 text-gray-400 group-hover:text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                    <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                                                </svg>
                                        </a>
                                </li>

                            <!-- More projects... -->
                        </ul>
                </div>

            <!-- Projects table (small breakpoint and up) -->
            <div class="hidden mt-8 sm:block">
                    <div class="inline-block min-w-full align-middle border-b border-gray-200">
                            <table class="min-w-full">
                                    <thead>
                                            <tr class="border-t border-gray-200">
                                                    <th class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                                                            <span class="lg:pl-2">Project</span>
                                                        </th>
                                                    <th class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                                                            Members
                                                        </th>
                                                    <th class="hidden px-6 py-3 text-xs font-medium tracking-wider text-right text-gray-500 uppercase border-b border-gray-200 md:table-cell bg-gray-50">
                                                            Last updated
                                                        </th>
                                                    <th class="py-3 pr-6 text-xs font-medium tracking-wider text-right text-gray-500 uppercase border-b border-gray-200 bg-gray-50"></th>
                                                </tr>
                                        </thead>
                                    <tbody class="bg-white divide-y divide-gray-100">
                                            <tr>
                                                    <td class="w-full px-6 py-3 text-sm font-medium text-gray-900 max-w-0 whitespace-nowrap">
                                                            <div class="flex items-center space-x-3 lg:pl-2">
                                                                    <div class="flex-shrink-0 w-2.5 h-2.5 rounded-full bg-pink-600" aria-hidden="true"></div>
                                                                    <a href="#" class="truncate hover:text-gray-600">
                                                                            <span>
                                                                                    GraphQL API
                                                                                    <span class="font-normal text-gray-500">in Engineering</span>
                                                                                </span>
                                                                        </a>
                                                                </div>
                                                        </td>
                                                    <td class="px-6 py-3 text-sm font-medium text-gray-500">
                                                            <div class="flex items-center space-x-2">
                                                                    <div class="flex flex-shrink-0 -space-x-1">
                                                                            <img class="w-6 h-6 rounded-full max-w-none ring-2 ring-white" src="https://images.unsplash.com/photo-1506794778202-cad84cf45f1d?ixlib=rb-1.2.1&ixqx=xWUQ1R13C9&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="Dries Vincent">

                                                                            <img class="w-6 h-6 rounded-full max-w-none ring-2 ring-white" src="https://images.unsplash.com/photo-1517841905240-472988babdf9?ixlib=rb-1.2.1&ixqx=xWUQ1R13C9&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="Lindsay Walton">

                                                                            <img class="w-6 h-6 rounded-full max-w-none ring-2 ring-white" src="https://images.unsplash.com/photo-1438761681033-6461ffad8d80?ixlib=rb-1.2.1&ixqx=xWUQ1R13C9&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="Courtney Henry">

                                                                            <img class="w-6 h-6 rounded-full max-w-none ring-2 ring-white" src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixqx=xWUQ1R13C9&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="Tom Cook">
                                                                        </div>

                                                                    <span class="flex-shrink-0 text-xs font-medium leading-5">+8</span>
                                                                </div>
                                                        </td>
                                                    <td class="hidden px-6 py-3 text-sm text-right text-gray-500 md:table-cell whitespace-nowrap">
                                                            March 17, 2020
                                                        </td>
                                                    <td class="pr-6">
                                                            <div class="relative flex items-center justify-end">
                                                                    <button type="button" class="inline-flex items-center justify-center w-8 h-8 text-gray-400 bg-white rounded-full hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500" id="project-options-menu-0-button" aria-expanded="false" aria-haspopup="true">
                                                                            <span class="sr-only">Open options</span>
                                                                            <!-- Heroicon name: solid/dots-vertical -->
                                                                            <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                                                    <path d="M10 6a2 2 0 110-4 2 2 0 010 4zM10 12a2 2 0 110-4 2 2 0 010 4zM10 18a2 2 0 110-4 2 2 0 010 4z" />
                                                                                </svg>
                                                                        </button>

                                                                    <!--
                                                                        Dropdown menu, show/hide based on menu state.

                                                                        Entering: "transition ease-out duration-100"
                                                                        From: "transform opacity-0 scale-95"
                                                                        To: "transform opacity-100 scale-100"
                                                                        Leaving: "transition ease-in duration-75"
                                                                        From: "transform opacity-100 scale-100"
                                                                        To: "transform opacity-0 scale-95"
                                                                    -->
                                                                    <div class="absolute top-0 z-10 w-48 mx-3 mt-1 bg-white shadow-lg origin-top-right right-7 rounded-md ring-1 ring-black ring-opacity-5 divide-y divide-gray-200 focus:outline-none" role="menu" aria-orientation="vertical" aria-labelledby="project-options-menu-0-button" tabindex="-1">
                                                                            <div class="py-1" role="none">
                                                                                    <!-- Active: "bg-gray-100 text-gray-900", Not Active: "text-gray-700" -->
                                                                                    <a href="#" class="flex items-center px-4 py-2 text-sm text-gray-700 group" role="menuitem" tabindex="-1" id="project-options-menu-0-item-0">
                                                                                            <!-- Heroicon name: solid/pencil-alt -->
                                                                                            <svg class="w-5 h-5 mr-3 text-gray-400 group-hover:text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                                                                    <path d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z" />
                                                                                                    <path fill-rule="evenodd" d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z" clip-rule="evenodd" />
                                                                                                </svg>
                                                                                            Edit
                                                                                        </a>
                                                                                    <a href="#" class="flex items-center px-4 py-2 text-sm text-gray-700 group" role="menuitem" tabindex="-1" id="project-options-menu-0-item-1">
                                                                                            <!-- Heroicon name: solid/duplicate -->
                                                                                            <svg class="w-5 h-5 mr-3 text-gray-400 group-hover:text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                                                                    <path d="M7 9a2 2 0 012-2h6a2 2 0 012 2v6a2 2 0 01-2 2H9a2 2 0 01-2-2V9z" />
                                                                                                    <path d="M5 3a2 2 0 00-2 2v6a2 2 0 002 2V5h8a2 2 0 00-2-2H5z" />
                                                                                                </svg>
                                                                                            Duplicate
                                                                                        </a>
                                                                                    <a href="#" class="flex items-center px-4 py-2 text-sm text-gray-700 group" role="menuitem" tabindex="-1" id="project-options-menu-0-item-2">
                                                                                            <!-- Heroicon name: solid/user-add -->
                                                                                            <svg class="w-5 h-5 mr-3 text-gray-400 group-hover:text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                                                                    <path d="M8 9a3 3 0 100-6 3 3 0 000 6zM8 11a6 6 0 016 6H2a6 6 0 016-6zM16 7a1 1 0 10-2 0v1h-1a1 1 0 100 2h1v1a1 1 0 102 0v-1h1a1 1 0 100-2h-1V7z" />
                                                                                                </svg>
                                                                                            Share
                                                                                        </a>
                                                                                </div>
                                                                            <div class="py-1" role="none">
                                                                                    <a href="#" class="flex items-center px-4 py-2 text-sm text-gray-700 group" role="menuitem" tabindex="-1" id="project-options-menu-0-item-3">
                                                                                            <!-- Heroicon name: solid/trash -->
                                                                                            <svg class="w-5 h-5 mr-3 text-gray-400 group-hover:text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                                                                    <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd" />
                                                                                                </svg>
                                                                                            Delete
                                                                                        </a>
                                                                                </div>
                                                                        </div>
                                                                </div>
                                                        </td>
                                                </tr>

                                            <!-- More projects... -->
                                        </tbody>
                                </table>
                        </div>
                </div>
        </main>

</div>
