@props([
    'submitFunctionName' => 'create',
    'data' => []
])
<form
    wire:submit.prevent="{{ $submitFunctionName }}"
    class="flex flex-col"
>

    <div class="flex flex-col lg:flex-col lg:space-x-4">
        <div>

            <select id="types" wire:model="newConsultation.type_id" class="block w-full p-2 py-2 pl-3 pr-10 mt-1 text-base border-gray-300 rounded-md focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-lg">
                <option selected>Rendelés típusának kiválasztása</option>

                @forelse($data['types'] as $type)
                    <option value="{{ $type['id'] }}">{{ $type['name'] }}</option>
                @empty
                    <p>Nem talalhato rendelesi tipus a rendszerben!</p>
                @endforelse
            </select>
            @error('newConsultation.type_id') <span class="error">{{ $message }}</span> @enderror
            <select id="doctor" wire:model="newConsultation.user_id" class="block w-full p-2 py-2 pl-3 pr-10 mt-1 text-base border-gray-300 rounded-md focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-lg">
                <option selected>Orvos kiválasztása</option>

                @forelse($data['doctors'] as $doctor)
                    <option value="{{ $doctor['id'] }}">{{ $doctor['name'] }}</option>
                @empty
                    <p>Nem talalhato orvos a rendszerben!</p>
                @endforelse
            </select>
            @error('newConsultation.user_id') <span class="error">{{ $message }}</span> @enderror
            <select id="office" wire:model="newConsultation.office_id" class="block w-full p-2 py-2 pl-3 pr-10 mt-1 text-base border-gray-300 rounded-md focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-lg">
                <option selected>Rendelő kiválasztása</option>

                @forelse($data['offices'] as $office)
                    <option value="{{ $office['id'] }}">{{ $office['name'] }}</option>
                @empty
                    <p>Nem talalhato rendelo a rendszerben!</p>
                @endforelse
            </select>
            @error('newConsultation.office_id') <span class="error">{{ $message }}</span> @enderror
            <input type="date" wire:model="newConsultation.day" id="day" autocomplete="given-name" class="block w-full p-2 mt-1 text-lg border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-lg" placeholder="Rendelési nap">
            @error('newConsultation.day') <span class="error">{{ $message }}</span> @enderror

            <input type="time" wire:model="newConsultation.open" id="open" autocomplete="given-name" class="block w-full p-2 mt-1 text-lg border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-lg" placeholder="Rendelési nap">
            @error('newConsultation.open') <span class="error">{{ $message }}</span> @enderror
            <input type="time" wire:model="newConsultation.close" id="close" autocomplete="given-name" class="block w-full p-2 mt-1 text-lg border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-lg" placeholder="Rendelési nap">
            @error('newConsultation.close') <span class="error">{{ $message }}</span> @enderror
        </div>
    </div>

    <div class="relative flex items-start my-3">
        <div class="flex items-center h-5">
            <input id="comments" wire:model="newConsultation.is_digital" type="checkbox" class="w-4 h-4 text-indigo-600 border-gray-300 rounded focus:ring-indigo-500" value="1">
        </div>
        <div class="ml-3 text-lg">
            <p class="text-gray-500">Online konzultációs rendelés.</p>
        </div>
    </div>

    <div>

        <button class="inline-flex items-center px-4 py-2 font-medium text-white bg-green-600 border border-transparent rounded-md shadow-sm text-md order-0 focus:outline-none focus:ring-2 focus:ring-offset-2 sm:order-1 hover:bg-green-700 focus:ring-green-500">Létrehoz</button>
    </div>
</form>
