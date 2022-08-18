<div>
    <div x-data="{modal: false}" class="flex flex-col md:flex-row">
        <button @click="modal = true" type="button" class="inline-flex items-center px-4 py-2 text-base font-medium text-gray-700 bg-white border border-gray-300 rounded-md shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" w-full>
            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
            </svg>
            <span class="ml-2">Keresés...</span>
        </button>

        <!-- This example requires Tailwind CSS v2.0+ -->
        <div x-show="modal" class="fixed inset-0 z-10 overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true">
            <div class="flex items-center justify-center min-h-screen px-4 pt-4 pb-20 text-center sm:block sm:p-0">
                <!--
                    Background overlay, show/hide based on modal state.

                    Entering: "ease-out duration-300"
                    From: "opacity-0"
                    To: "opacity-100"
                    Leaving: "ease-in duration-200"
                    From: "opacity-100"
                    To: "opacity-0"
                -->
                <div @click="modal = false" class="fixed inset-0 transition-opacity bg-gray-500 bg-opacity-75" aria-hidden="true"></div>

                <!-- This element is to trick the browser into centering the modal contents. -->
                <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>

                <!--
                    Modal panel, show/hide based on modal state.

                    Entering: "ease-out duration-300"
                    From: "opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                    To: "opacity-100 translate-y-0 sm:scale-100"
                    Leaving: "ease-in duration-200"
                    From: "opacity-100 translate-y-0 sm:scale-100"
                    To: "opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                -->
                <div class="inline-block w-full px-4 pt-5 pb-4 overflow-hidden text-left align-bottom transition-all transform bg-white rounded-lg shadow-xl sm:my-8 sm:align-middle sm:max-w-xl sm:p-6">
                    <div>
                        <div class="flex justify-end">
                            <button @click="modal = false" class="flex mb-5 justify-items-end">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-7 h-7" fill="none" viewBox="0 0 24 24" stroke="rgba(29, 78, 216, var(--tw-bg-opacity))">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </button>
                        </div>
                        <div class="mb-3">
                            <x-session />
                        </div>
                        <div>
                        <div class="flex items-center justify-center w-12 h-12 mx-auto bg-blue-100 rounded-full">
                            <!-- Heroicon name: outline/check -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="blue">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                            </svg>
                        </div>
                        <div class="mt-3 text-center sm:mt-5" x-init="$refs.answer.focus()">
                            <input type="text" wire:model="searchTerm" id="searchTerm" class="block w-full p-0 pb-2 text-gray-900 placeholder-gray-500 border-0 border-b border-blue-100 focus:ring-0 sm:text-xl" placeholder="Keresés" autofocus>

                            <div class="mt-2">
                                @empty(!$this->searchTerm)
                                    @if(count($rs['applicants']) > 0)
                                        <h3 class="mb-2 font-bold">Páciensek</h3>
                                        <div class="border border-gray-200"></div>
                                        @foreach($rs['applicants'] as $item)
                                            <div class="flex flex-row items-center justify-between py-2">
                                                <div class="flex flex-col">
                                                    <div class="text-left">
                                                        <span class="font-bold"> Taj-szám: </span>
                                                        {{ $item['social_security_number'] }}
                                                    </div>
                                                    <div class="text-left">
                                                        <span class="font-bold">Név: </span>
                                                        {{ $item['name'] }}
                                                    </div>
                                                </div>
                                                <div class="text-right">
                                                    @if ($item->is_black_listed)
                                                        <button wire:click="unBlockedApplicant({{ $item['id'] }})" type="button" class="flex items-center px-4 py-2 mr-3 text-base font-medium text-white bg-green-500 border border-transparent rounded-md shadow-sm order-0 focus:outline-none focus:ring-2 focus:ring-offset-2 sm:order-1 sm:ml-3 hover:bg-green-700 focus:ring-green-500" role="menuitem" tabindex="-1" id="project-options-menu-0-item-3">
                                                            <!-- Heroicon name: solid/trash -->
                                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="white">
                                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z" />
                                                            </svg>
                                                        </button>
                                                    @else
                                                        <button wire:click="blockedApplicant({{ $item['id'] }})" type="button" class="flex items-center px-4 py-2 mr-3 text-base font-medium text-white bg-red-500 border border-transparent rounded-md shadow-sm order-0 focus:outline-none focus:ring-2 focus:ring-offset-2 sm:order-1 sm:ml-3 hover:bg-red-700 focus:ring-red-500" role="menuitem" tabindex="-1" id="project-options-menu-0-item-3">
                                                            <!-- Heroicon name: solid/trash -->
                                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 18.364A9 9 0 005.636 5.636m12.728 12.728A9 9 0 015.636 5.636m12.728 12.728L5.636 5.636" />
                                                            </svg>
                                                        </button>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="border border-gray-200"></div>
                                        @endforeach
                                    @endif

                                    {{-- @if(count($rs['consultations']) > 0)
                                        <h3 class="mt-5 mb-2 font-bold">Rendelések</h3>
                                        <div class="border border-gray-200"></div>
                                        @foreach($rs['consultations'] as $item)
                                            <div class="flex flex-row justify-between">
                                                <a href="{{ route('admin.consultations.show', $item->id) }}" class="flex flex-col items-start py-2 md:justify-between">
                                                    <div class="text-left">
                                                        <span class="font-bold">Rendelés időpontja: </span>
                                                        {{ $item['day'] }}
                                                    </div>
                                                    <div class="text-left">
                                                        <span class="font-bold">Rendelés helyszíne: </span>
                                                        {{ $item['office']['name'] }}
                                                    </div>
                                                    <div class="text-left">
                                                        <span class="font-bold">Orvos: </span>
                                                        {{ $item['user']['name'] }}
                                                    </div>
                                                </a>
                                                <button
                                                    wire:click="export({{ $item['id'] }})"
                                                    class="flex items-center px-4 py-2 mr-3 text-base font-medium text-white bg-green-500 border border-transparent rounded-md shadow-sm order-0 focus:outline-none focus:ring-2 focus:ring-offset-2 sm:order-1 sm:ml-3 hover:bg-green-700 focus:ring-green-500"
                                                    >
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
</svg>
                                                </button>
                                            </div>
                                            <div class="border border-gray-200"></div>
                                        @endforeach
                                    @endif --}}
                                @endempty
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
