@props([
    'actionButton' => true,
    'export' => true
])

<div>
    <div class="px-4 border-b border-gray-200 py-7 sm:flex sm:items-center sm:justify-between sm:px-6 lg:px-8">
        <div class="flex flex-row items-center justify-between flex-1 min-w-0 mb-4 md:mb-0">
            <h1 class="text-lg font-medium text-gray-900 leading-6 sm:truncate">
                {{ $slot }}
            </h1>
            @if($actionButton)
                <button
                    @click="createForm = !createForm" 
                    {{-- x-text="createForm ? 'Mégsem' : 'Új létrehozása'" --}}
                    {{-- :class="createForm ? 'bg-red-600 hover:bg-red-700 focus:ring-red-500' : 'bg-blue-600 hover:bg-blue-700 focus:ring-blue-500'" --}}
                    class="inline-flex items-center px-4 py-2 text-base font-medium text-white bg-blue-600 border border-transparent md:hidden order-0 shadow-sm rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 sm:order-1 sm:ml-3 hover:bg-blue-700 focus:ring-blue-500" 
                    >
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7" fill="none" viewBox="0 0 24 24" stroke="currentColor">
  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
</svg>
                </button>
            @endif
        </div>

        <livewire:search />

        <div x-data="{createForm: @entangle('createForm')}" class="flex mt-4 sm:mt-0 sm:ml-4">
            @if($export)
                <button
                    wire:click="export"
                    class="inline-flex items-center px-4 py-2 mr-3 text-base font-medium text-white bg-green-500 border border-transparent order-0 shadow-sm rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 sm:order-1 sm:ml-3 hover:bg-green-700 focus:ring-green-500" 
                    >
                    Export
                </button>
            @endif
            @if($actionButton)
                <button
                    @click="createForm = !createForm" 
                    {{-- x-text="createForm ? 'Mégsem' : 'Új létrehozása'" --}}
                    {{-- :class="createForm ? 'bg-red-600 hover:bg-red-700 focus:ring-red-500' : 'bg-blue-600 hover:bg-blue-700 focus:ring-blue-500'" --}}
                    class="items-center hidden px-4 py-2 text-base font-medium text-white bg-blue-600 border border-transparent md:inline-flex order-0 shadow-sm rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 sm:order-1 sm:ml-3 hover:bg-blue-700 focus:ring-blue-500" 
                    >
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
</svg>
                    Új létrehozása
                </button>
            @endif
        </div>
    </div>
</div>
