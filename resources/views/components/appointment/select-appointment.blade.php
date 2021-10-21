
<div
    x-data="{ medicalExamination: @entangle('medicalExamination'), doctor: @entangle('doctor'), consultation: @entangle('consultation'), 'appointment': @entangle('appointment') }"
    class="md:mt-0 md:col-span-2">

    <div class="overflow-hidden bg-white shadow sm:rounded-lg">
        <div class="px-4 py-5 sm:px-6">
            <h3 class="flex items-center text-lg font-medium text-gray-900 leading-6">

                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01" />
</svg>
                        <span class="ml-3">Vizsgálat és az Orvos kiválasztása</span></h3>
        </div>
    <div class="px-4 py-5 border-t border-gray-200 sm:p-0">
            <div>
                <select id="medicalExamination" wire:model="medicalExamination" class="block w-full p-2 py-2 pl-3 pr-10 mt-1 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-lg rounded-md" wire:click="$emit('getActiveMedicalExaminations')">
                    <option value="" selected>Vizsgálat kiválasztása</option>
                    @forelse($this->medicalExaminations as $medical)
                        <option value="{{ $medical->slug }}">{{ $medical->name }}</option>
                    @empty
                        <p>Nem talalhato vizsgalat</p>
                    @endforelse
                </select>
            </div>
            <div x-cloak x-show="medicalExamination" class="mt-4">
                <select id="doctor" wire:model="doctor" class="block w-full p-2 py-2 pl-3 pr-10 mt-1 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-lg rounded-md" wire:click="$emit('getDoctors')">
                    <option selected>Orvos kiválasztása</option>

                    @forelse($this->doctors as $doctor)
                        <option value="{{ $doctor->id }}">{{ $doctor->name }}</option>
                    @empty
                        <p>Nem talalhato ehez a vizsgalathoz orvos!</p>
                    @endforelse
                </select>
            </div>
            <div x-cloak x-show="doctor" class="mt-4">
                <select id="consultations" wire:model="consultation" class="block w-full p-2 py-2 pl-3 pr-10 mt-1 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-lg rounded-md" wire:click="$emit('getConsultations')">
                    <option selected>Rendelési nap kiválasztása</option>

                    @forelse($this->consultations as $consultation)
                        <option value="{{ $consultation->id }}">{{ $consultation->name }}</option>
                    @empty
                        <p>Nem talalhato a kivalasztot doktorhoz rendelesinap!</p>
                    @endforelse
                </select>
            </div>
            <div x-cloak x-show="consultation" class="mt-4">
                <select id="appointment" wire:model="appointment" class="block w-full p-2 py-2 pl-3 pr-10 mt-1 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-lg rounded-md" wire:click="$emit('getAppointments')">
                    <option selected>Időpont kiválasztása</option>

                    @forelse($this->appointments as $time)
                        <option value="{{ $time['start_at'] . ',' . $time['end_at'] }}">{{ $time['start_at'] . '-' . $time['end_at'] }}</option>
                    @empty
                        <p>Nem talalhato a kivalasztot rendelesinaphoz idopont!</p>
                    @endforelse
                </select>
            </div>
        </div>

    </div>
</div>
