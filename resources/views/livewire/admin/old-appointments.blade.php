<div>
    <main class="relative z-0 flex-1 overflow-y-auto focus:outline-none">
        <!-- Page title & actions -->
        <x-pages.header>
            Időpontok
        </x-pages.header>

        <!-- Projects table (small breakpoint and up) -->
        <div class="block mt-8 sm:block">
            <div x-data="{ filter: @entangle('todayData') }" class="inline-block min-w-full align-middle border-b border-gray-200">
                <button type="button" class="inline-flex items-center justify-center order-1 w-full px-4 py-2 m-5 ml-3 text-sm font-medium text-center text-gray-700 bg-white border border-gray-300 shadow-sm rounded-md hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500 sm:order-0 sm:ml-0" wire:click="$emit('switchTodayData')">
                    Mutasd {{ $todayData ? 'az összes időpontot' : 'a mai napi időpontokat' }}
                </button>

                <table class="min-w-full">
                    <thead>
                        <tr class="border-t border-gray-200">
                            <th class="px-6 py-3 text-xs font-medium tracking-wider text-center text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                                <span class="lg:pl-2">#</span>
                            </th>
                            @foreach($columns as $column)
                                <th class="px-6 py-3 text-xs font-medium tracking-wider text-center text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                                    <span class="lg:pl-2">{{ $column }}</span>
                                </th>
                            @endforeach
                            <th class="py-3 pr-6 text-xs font-medium tracking-wider text-right text-gray-500 uppercase border-b border-gray-200 bg-gray-50"></th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-100">
                        @foreach($appointments as $appointment)

                            <tr>
                                <td class="px-6 py-3 text-sm font-medium text-center text-gray-900 max-w-0 whitespace-nowrap">
                                    <div class="flex items-center space-x-3 lg:pl-2">
                                        <div class="flex-shrink-0 w-2.5 h-2.5 rounded-full bg-pink-600" aria-hidden="true"></div>
                                        <a href="#" class="truncate hover:text-gray-600">
                                            <span>{{ $loop->index + 1 }}</span>
                                        </a>
                                    </div>
                                </td>
                                <td class="px-6 py-3 text-sm font-medium text-center text-gray-900 max-w-0 whitespace-nowrap">
                                    <div class="flex items-center space-x-3 lg:pl-2">
                                        <div class="flex-shrink-0 w-2.5 h-2.5 rounded-full bg-pink-600" aria-hidden="true"></div>
                                        <a href="#" class="truncate hover:text-gray-600">
                                            <span>{{ $appointment->consultation->nameWithoutTime }}</span>
                                        </a>
                                    </div>
                                </td>
                                <td class="px-6 py-3 text-sm font-medium text-center text-gray-500">
                                    <div class="flex items-center space-x-2">
                                        <div class="flex flex-shrink-0 -space-x-1">
                                            {{ $appointment->start_at . ' - ' . $appointment->end_at }}
                                        </div>
                                    </div>
                                </td>
                                <td class="hidden px-6 py-3 text-sm text-center text-right text-gray-500 md:table-cell whitespace-nowrap">{{ $appointment->medicalExamination->name }}</td>
                                <td class="hidden px-6 py-3 text-sm text-center text-right text-gray-500 md:table-cell whitespace-nowrap">{{ $appointment->applicant->name }}</td>
                                <td class="pr-6">
                                    <div x-data="{itemDropdown: false}" class="relative flex items-center justify-end">
                                        <button @click="itemDropdown = !itemDropdown" type="button" class="inline-flex items-center justify-center w-8 h-8 text-gray-400 bg-white rounded-full hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500" id="project-options-menu-0-button" aria-expanded="false" aria-haspopup="true">
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
                                        <div x-show="itemDropdown === true" class="absolute top-0 z-10 w-48 mx-3 mt-1 bg-white shadow-lg origin-top-right right-7 rounded-md ring-1 ring-black ring-opacity-5 divide-y divide-gray-200 focus:outline-none" role="menu" aria-orientation="vertical" aria-labelledby="project-options-menu-0-button" tabindex="-1">
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
                        @endforeach
                    </tbody>
                </table>
                {{-- {{ $appointments->links() }} --}}
            </div>
        </div>
    </main>

</div>
