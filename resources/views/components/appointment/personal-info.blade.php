@props([
	'admin' => false
])

<div class="overflow-hidden bg-white shadow sm:rounded-lg">
	@if(!$admin)
		<div class="px-4 py-5 sm:px-6">
			<h3 class="flex items-center text-lg font-medium leading-6 text-gray-900">

				<svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
					<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
				</svg>
				<span class="ml-3">Személyes adatok (2/3)</span></h3>
		</div>
	@endif
    <div class="grid grid-cols-6 gap-6 px-4 py-5 border-t border-gray-200 sm:p-0">

            <div class="col-span-6 sm:col-span-2">
				<small class="text-lg">Név</small>
                <input type="text" wire:model="name" id="name" autocomplete="given-name" class="block w-full p-2 mt-1 text-lg border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-lg" placeholder="">
                @error('name') <span class="error">{{ $message }}</span> @enderror
            </div>

			{{-- @if(!$admin) --}}
				<div class="col-span-6 sm:col-span-2">
					<small class="text-lg">Email</small>
					<input type="text" wire:model="email" id="email_address" autocomplete="email" class="block w-full p-2 mt-1 border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-lg" placeholder="">
					@error('email') <span class="error">{{ $message }}</span> @enderror
				</div>
			{{-- @endif --}}

            <div class="col-span-6 sm:col-span-2">
				<small class="text-lg">Telefonszám</small>
                <input type="text" name="phone" wire:model="phone" id="phone" autocomplete="phone" class="block w-full p-2 mt-1 border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-lg" placeholder="">
                @error('phone') <span class="error">{{ $message }}</span> @enderror
            </div>

				<div class="col-span-6 sm:col-span-2">
					<small class="text-lg">Taj-szám</small>
					<input type="text" name="socialSecurityNumber" wire:model="socialSecurityNumber" id="social_security_number" autocomplete="social_security_number" class="block w-full p-2 mt-1 border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-lg" placeholder="">
					@error('socialSecurityNumber') <span class="error">{{ $message }}</span> @enderror
				</div>
			@if(!$admin)
				<div class="col-span-6 sm:col-span-2">
					<small class="text-lg">Irányítószám</small>
					<input type="text" name="zip" wire:model="zip" id="zip" autocomplete="zip" class="block w-full p-2 mt-1 border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-lg" placeholder="">
					@error('zip') <span class="error">{{ $message }}</span> @enderror
				</div>
				<div class="col-span-6 sm:col-span-2">
					<small class="text-lg">Város</small>
					<input type="text" name="city" wire:model="city" id="city" autocomplete="city" class="block w-full p-2 mt-1 border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-lg" placeholder="">
					@error('city') <span class="error">{{ $message }}</span> @enderror
				</div>
				<div class="col-span-6 sm:col-span-2">
					<small class="text-lg">Utca és házszám</small>
					<input type="text" name="street" wire:model="street" id="street" autocomplete="street" class="block w-full p-2 mt-1 border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-lg" placeholder="">
					@error('street') <span class="error">{{ $message }}</span> @enderror
				</div>
			@endif
        </div>
	@if(!$admin)
		<div class="flex items-start py-4 mt-1 sm:py-5 sm:px-6">
			<div class="flex items-center h-6 mt-1">
				<input id="comments" wire:model="gdpr" name="gdpr" type="checkbox"
					class="text-gray-600 border-gray-300 rounded w-7 h-7 focus:ring-gray-500">
			</div>
				<div>
					<div class="ml-3 text-md">
						<label for="comments" class="font-medium text-gray-700">Elfogadom a feltételeket</label>
						<p class="text-gray-500">A "Jegyvásárlás" gomb megnyomásával Ön elfogadja az <a href="/pdfs/aszf.pdf"
								class="text-gold" target="_blank">Általános Szerződési Feltételeket, az Adatkezelési
								Szabályzatot</a>, a 45/2014. (II. 26) Korm. rendelet 15. §-a szerinti tájékoztatást, <a
								href="/pdfs/adattovabbitasi-nyilatkozat.pdf" class="text-gold" target="_blank">Adattovábbítási
								nyilatkozatot</a> valamint kijelenti, hogy elmúlt 18 éves. </p>
					</div>
					@error('gdpr') <span class="error">{{ $message }}</span> @enderror
				</div>
		</div>
		
	@endif
</div>

