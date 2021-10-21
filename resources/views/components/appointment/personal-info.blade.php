<div class="overflow-hidden bg-white shadow sm:rounded-lg">
    <div class="px-4 py-5 sm:px-6">
        <h3 class="flex items-center text-lg font-medium text-gray-900 leading-6">

            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
            </svg>
            <span class="ml-3">Személyes adatok (2/3)</span></h3>
    </div>
    <div class="px-4 py-5 border-t border-gray-200 sm:p-0 grid grid-cols-6 gap-6">

            <div class="col-span-6 sm:col-span-2">
                <input type="text" wire:model="name" id="name" autocomplete="given-name" class="block w-full p-2 mt-1 text-lg border-gray-300 focus:ring-blue-500 focus:border-blue-500 shadow-sm sm:text-lg rounded-md" placeholder="Név">
                @error('name') <span class="error">{{ $message }}</span> @enderror
            </div>

            <div class="col-span-6 sm:col-span-2">
                <input type="text" wire:model="email" id="email_address" autocomplete="email" class="block w-full p-2 mt-1 border-gray-300 focus:ring-blue-500 focus:border-blue-500 shadow-sm sm:text-lg rounded-md" placeholder="Email cím">
                @error('email') <span class="error">{{ $message }}</span> @enderror
            </div>

            <div class="col-span-6 sm:col-span-2">
                <input type="text" name="phone" wire:model="phone" id="phone" autocomplete="email" class="block w-full p-2 mt-1 border-gray-300 focus:ring-blue-500 focus:border-blue-500 shadow-sm sm:text-lg rounded-md" placeholder="Telefonszám">
                @error('phone') <span class="error">{{ $message }}</span> @enderror
            </div>
            <div class="col-span-6 sm:col-span-2">
                <input type="text" name="socialSecurityNumber" wire:model="socialSecurityNumber" id="social_security_number" autocomplete="social_security_number" class="block w-full p-2 mt-1 border-gray-300 focus:ring-blue-500 focus:border-blue-500 shadow-sm sm:text-lg rounded-md" placeholder="Taj-szám">
                @error('socialSecurityNumber') <span class="error">{{ $message }}</span> @enderror
            </div>
            <div class="col-span-6 sm:col-span-2">
                <input type="text" name="zip" wire:model="zip" id="zip" autocomplete="zip" class="block w-full p-2 mt-1 border-gray-300 focus:ring-blue-500 focus:border-blue-500 shadow-sm sm:text-lg rounded-md" placeholder="Irányítószám">
                @error('zip') <span class="error">{{ $message }}</span> @enderror
            </div>
            <div class="col-span-6 sm:col-span-2">
                <input type="text" name="city" wire:model="city" id="city" autocomplete="city" class="block w-full p-2 mt-1 border-gray-300 focus:ring-blue-500 focus:border-blue-500 shadow-sm sm:text-lg rounded-md" placeholder="Város">
                @error('city') <span class="error">{{ $message }}</span> @enderror
            </div>
            <div class="col-span-6 sm:col-span-2">
                <input type="text" name="street" wire:model="street" id="street" autocomplete="street" class="block w-full p-2 mt-1 border-gray-300 focus:ring-blue-500 focus:border-blue-500 shadow-sm sm:text-lg rounded-md" placeholder="Utca és házszám">
                @error('street') <span class="error">{{ $message }}</span> @enderror
            </div>
        </div>
    
</div>

