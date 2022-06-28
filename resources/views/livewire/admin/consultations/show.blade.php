<div>
    {{-- The Master doesn't talk, he acts. --}}
    <main x-data="{createForm: @entangle('createForm')}" class="relative z-0 flex-1 min-h-screen overflow-y-auto focus:outline-none">
        <!-- Page title & actions -->
        <x-pages.header :actionButton="false">
			Rendelés: {{ $consultation->name }} <br>
			{{ $consultation->user->name }}
        </x-pages.header>

        <x-session/>

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
                            {{-- @if ($appointment->payment->status == 'SUCCESS') --}}
                                <tr>
                                    <td class="px-6 py-3 text-sm font-medium text-center text-gray-900 max-w-0 whitespace-nowrap">
                                        {{ $loop->index + 1 }}
                                    </td>
                                    
                                    
                                    <td class="hidden px-6 py-3 text-sm text-center text-gray-500 md:table-cell whitespace-nowrap">{{ $appointment->start_at }}</td>
                                    <td class="hidden px-6 py-3 text-sm text-center text-gray-500 md:table-cell whitespace-nowrap">{{ $appointment->end_at }}</td>
                                    <td class="px-6 py-3 text-sm font-medium text-center text-gray-500">
                                        <div class="flex items-center space-x-2">
                                            <div class="flex flex-shrink-0 -space-x-1">
                                                <a href="#" class="truncate hover:text-gray-600">
                                                    <span>{{ $appointment->medicalExamination->name ?? null }}</span>
                                                </a>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="hidden px-6 py-3 text-sm text-center text-gray-500 md:table-cell whitespace-nowrap">{{ $appointment->applicant->name ?? null }}</td>
                                    <td class="hidden px-6 py-3 text-sm text-center text-gray-500 md:table-cell whitespace-nowrap">{{ $appointment->applicant->social_security_number ?? null }}</td>
                                    {{-- <td class="hidden px-6 py-3 text-sm text-center text-gray-500 md:table-cell whitespace-nowrap">idopont</td> --}}
                                    <td class="pr-6">
                                        <div x-data="{itemDropdown: false, createForm: @entangle('createForm')}" class="relative flex items-center justify-end">
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
                                            <div
                                                x-show="itemDropdown === true"
                                                @click.away="itemDropdown = false"
                                                class="absolute top-0 z-10 w-48 mx-3 mt-1 origin-top-right bg-white divide-y divide-gray-200 rounded-md shadow-lg right-7 ring-1 ring-black ring-opacity-5 focus:outline-none"
                                                role="menu"
                                                aria-orientation="vertical"
                                                aria-labelledby="project-options-menu-0-button"
                                                tabindex="-1"
                                            >
                                                <div class="py-1" role="none">
                                                    <!-- Active: "bg-gray-100 text-gray-900", Not Active: "text-gray-700" -->
                                                    @if(empty($appointment->applicant_id))
                                                        <button 
                                                            wire:click="showApplicantForm({{ $appointment->id }})"
                                                            type="button"
                                                            class="flex items-center px-4 py-2 text-sm text-gray-700 group" role="menuitem" tabindex="-1"
                                                            id="project-options-menu-0-item-3"
                                                        >
                                                            <!-- Heroicon name: solid/trash -->
                                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-3 text-gray-400 group-hover:text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
                                                              </svg>
                                                            Új kezelés felvétele
                                                        </button>
                                                    @else
                                                        <button wire:click="cancelAppointment({{ $appointment->id }})" type="button"
                                                            class="flex items-center px-4 py-2 text-sm text-gray-700 group" role="menuitem" tabindex="-1"
                                                            id="project-options-menu-0-item-3" @click="itemDropdown = false">
                                                            <!-- Heroicon name: solid/trash -->
                                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-3 text-gray-400 group-hover:text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                              </svg>
                                                            Időpont lemondása
                                                        </button>
                                                    @endif
                                                </div>
                                                <div class="py-1" role="none">
                                                    @if(!empty($appointment->applicant_id))
                                                    <button wire:click="blockAndDelete({{ $appointment }})" type="button" class="flex items-center px-4 py-2 text-sm text-gray-700 group" role="menuitem" tabindex="-1" id="project-options-menu-0-item-3" @click="itemDropdown = false">
                                                        <!-- Heroicon name: solid/trash -->
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-3 text-gray-400 group-hover:text-gray-500" fill="currentColor" viewBox="0 0 24 24" stroke="#fff">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                        </svg>
                                                        Tiltás
                                                    </button>
                                                    @else
                                                    <button wire:click="delete({{ $appointment->id }})" type="button" class="flex items-center px-4 py-2 text-sm text-gray-700 group" role="menuitem" tabindex="-1" id="project-options-menu-0-item-3" @click="itemDropdown = false">
                                                        <!-- Heroicon name: solid/trash -->
                                                        <svg class="w-5 h-5 mr-3 text-gray-400 group-hover:text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                            <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd" />
                                                        </svg>
                                                        Törlés
                                                    </button>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            {{-- @endif --}}
                            <x-modals.dialog wire:model="createForm" maxWidth="2xl">
                                <x-slot name="title">Új kezelés felvétele</x-slot>

                                <x-slot name="content">
                                    <div class="py">
                                        <form wire:submit.prevent="addApplicantToAppointment">
                                            <div class="mb-3">
                                                <small class="text-lg">Vizsgálat kiválasztása </small>
                                                <select id="medicalExamination"
                                                    wire:model="activeMedicalExamination"
                                                    class="block w-full p-2 py-2 pl-3 pr-10 mt-1 text-base border-gray-300 rounded-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-lg"
                                                >
                                                    <option value="" selected>Vizsgálat kiválasztása</option>
                                                    @forelse($this->medicalExaminations as $medical)
                                                    <option value="{{ $medical->id }}">{{ $medical->name }}</option>
                                                    @empty
                                                    <p>Nem talalhato vizsgalat</p>
                                                    @endforelse
                                                </select>
                                                @error('activeMedicalExamination') <span class="error">{{ $message }}</span> @enderror
                                            </div>
                                            <x-appointment.personal-info :admin="true" />
                                            <div class="mt-5">
                                                <button
                                                    class="inline-flex items-center px-4 py-2 font-medium text-white bg-green-600 border border-transparent rounded-md shadow-sm text-md order-0 focus:outline-none focus:ring-2 focus:ring-offset-2 sm:order-1 hover:bg-green-700 focus:ring-green-500">Létrehoz</button>
                                            </div>
                                        </form>
                                    </div>
                                </x-slot>
                                <x-slot name="footer">
                                    {{-- <button --}} {{-- type="submit" --}} {{--
                                        class="inline-flex items-center px-4 py-2 font-medium text-white bg-green-600 border border-transparent rounded-md shadow-sm text-md order-0 focus:outline-none focus:ring-2 focus:ring-offset-2 sm:order-1 hover:bg-green-700 focus:ring-green-500"
                                        --}} {{--> --}}
                                        {{-- Új rendelés létrehozása --}}
                                        {{-- </button> --}}
                                </x-slot>
                            </x-modals.dialog>
                        @endforeach
                    </tbody>
                </table>

                {{-- {{ $this->appointments->links() }} --}}
            </div>
        </div>
    </main>
</div>
