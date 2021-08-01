<div>
    {{-- The Master doesn't talk, he acts. --}}
    <main x-data="{createForm: @entangle('createForm')}" class="relative z-0 flex-1 min-h-screen overflow-y-auto focus:outline-none">
        <!-- Page title & actions -->
        <x-pages.header>
            Rendelés: {{ $consultation->name }}
        </x-pages.header>

        <x-session/>

        <div x-show="createForm" class="container px-2 mx-auto mt-8">
            {{-- <x-forms.consultation /> --}}
                form
        </div>

        <!-- Projects table (small breakpoint and up) -->
        <div class="block mt-8 sm:block">
            <div class="inline-block min-w-full align-middle border-b border-gray-200">

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
                        @foreach($this->appointments as $appointment)

                            <tr>
                                <td class="px-6 py-3 text-sm font-medium text-center text-gray-900 max-w-0 whitespace-nowrap">
                                    {{ $loop->index + 1 }}
                                </td>
                                <td class="px-6 py-3 text-sm font-medium text-center text-gray-900 max-w-0 whitespace-nowrap">
                                    <div class="flex items-center space-x-3 lg:pl-2">
                                        <div class="flex-shrink-0 w-2.5 h-2.5 rounded-full bg-pink-600" aria-hidden="true"></div>
                                        <div class="truncate">
                                            <span>
                                                {{ $appointment->consultation->nameWithoutTime }}
                                            </span>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-3 text-sm font-medium text-center text-gray-500">
                                    <div class="flex items-center space-x-2">
                                        <div class="flex flex-shrink-0 -space-x-1">
                                            <a href="#" class="truncate hover:text-gray-600">
                                                <span>{{ $appointment->medicalExamination->name }}</span>
                                            </a>
                                        </div>
                                    </div>
                                </td>
                                <td class="hidden px-6 py-3 text-sm text-center text-gray-500 md:table-cell whitespace-nowrap">{{ $appointment->start_at }}</td>
                                <td class="hidden px-6 py-3 text-sm text-center text-gray-500 md:table-cell whitespace-nowrap">{{ $appointment->end_at }}</td>
                                <td class="hidden px-6 py-3 text-sm text-center text-gray-500 md:table-cell whitespace-nowrap">{{ $appointment->applicant->name }}</td>
                                <td class="hidden px-6 py-3 text-sm text-center text-gray-500 md:table-cell whitespace-nowrap">{{ $appointment->applicant->social_security_number }}</td>
                                <td class="hidden px-6 py-3 text-sm text-center text-gray-500 md:table-cell whitespace-nowrap">idopont</td>
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
                                                <a href="{{ route('admin.consultations.show', $consultation->id) }}" class="flex items-center px-4 py-2 text-sm text-gray-700 group" role="menuitem" tabindex="-1" id="project-options-menu-0-item-0">
                                                    <!-- Heroicon name: solid/pencil-alt -->
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-3 text-gray-400 group-hover:text-gray-500" viewBox="0 0 24 24" stroke="" fill="currentColor" stroke="#fff">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                                    </svg>
                                                    Adatok
                                                </a>
                                            </div>
                                            <div class="py-1" role="none">
                                                <button wire:click="blockAndDelete({{ $appointment }})" type="button" class="flex items-center px-4 py-2 text-sm text-gray-700 group" role="menuitem" tabindex="-1" id="project-options-menu-0-item-3" @click="itemDropdown = false">
                                                    <!-- Heroicon name: solid/trash -->
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-3 text-gray-400 group-hover:text-gray-500" fill="currentColor" viewBox="0 0 24 24" stroke="#fff">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                    </svg>
                                                    Tiltás
                                                </button>
                                                <button wire:click="delete({{ $appointment->id }})" type="button" class="flex items-center px-4 py-2 text-sm text-gray-700 group" role="menuitem" tabindex="-1" id="project-options-menu-0-item-3" @click="itemDropdown = false">
                                                    <!-- Heroicon name: solid/trash -->
                                                    <svg class="w-5 h-5 mr-3 text-gray-400 group-hover:text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                        <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd" />
                                                    </svg>
                                                    Törlés
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                {{-- {{ $this->appointments->links() }} --}}
            </div>
        </div>
    </main>
</div>
