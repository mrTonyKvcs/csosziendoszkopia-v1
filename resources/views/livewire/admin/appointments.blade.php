<div>
    <main class="relative z-0 flex-1 min-h-screen overflow-y-auto focus:outline-none">
	<form class="p-5" x-show="!appointmentEnd" wire:submit.prevent="save">
        <x-pages.header :export="false" :actionButton="false">
            <div class="flex flex-row items-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 mr-3" fill="none" viewBox="0 0 24 24" stroke="rgba(156, 163, 175, var(--tw-text-opacity))">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                </svg>
                Új időpont felvétele
            </div>
        </x-pages.header>

        <x-session/>
		<section x-show="" class="container my-10">

			<div x-data="{phase: @entangle('phase'), appointment: @entangle('appointment')}" class="my-5 md:mt-0 md:col-span-2">
				<x-appointment.steps />

						<div x-show="phase == 1">
							<x-forms.select-medical>
								{{ empty($this->medicalExamination) ? __('Vizsgálat kiválasztása') : $this->medicalExamination->name }}
							</x-forms.select-medical>

							<x-forms.select-doctor>
								{{ empty($this->doctor) ? __('Orvos kiválasztása') : $this->doctor->name }}
							</x-forms.select-doctor>

							<x-forms.select-consultation>
								{{ empty($this->consultation) ? __('Rendelési nap kiválasztása') : $this->consultation->name }}
							</x-forms.select-consultation>

							<x-forms.select-appointment>
								{{ empty($this->appointment) ? __('Rendelési nap kiválasztása') : $this->appointment['start_at'] . '-' . $this->appointment['end_at'] }}
							</x-forms.select-appointment>
							{{-- <x-appointment.select-appointment /> --}}
						</div>
						<div x-show="phase == 2">
							<x-appointment.personal-info :admin="true"/>
						</div>
						<div x-show="phase == 3">

							<x-appointment.information :admin="true" />
								{{-- <div --}}
									{{-- x-cloak --}}
									{{-- x-data="{ appointment: @entangle('appointment') }" --}}
									{{-- x-show="appointment != null" --}}
									{{-- class="py-5 text-right" --}}
									{{-- > --}}
									{{-- <button type="submit" class="inline-flex justify-center px-4 py-2 text-lg font-medium text-white bg-blue-600 border border-transparent shadow-sm rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500"> --}}
										{{--     Időpontfoglalás és fizetés --}}
										{{-- </button> --}}
									{{-- </div> --}}
						</div>
						<div
								x-show="phase <= 3"
								>
								<span class="relative z-0 inline-flex mt-5 shadow-sm rounded-md">
									<button
											x-show="phase > 1"
											wire:click="previousPhase"
											type="button"
											class="relative inline-flex items-center px-2 py-2 text-lg font-medium text-gray-500 bg-white border border-gray-300 rounded-l-md hover:bg-gray-50 focus:z-10 focus:outline-none focus:ring-1 focus:ring-indigo-500 focus:border-indigo-500"
											>
											<span class="sr-only">Previous</span>
											<!-- Heroicon name: solid/chevron-left -->
							<svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
								<path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd" />
							</svg>
							Vissza
									</button>
									<button
											x-show="appointment != null && phase < 3"
											wire:click="nextPhase"
											type="button"
											class="relative inline-flex items-center px-2 py-2 -ml-px text-lg font-medium text-gray-500 bg-white border border-gray-300 rounded-r-md hover:bg-gray-50 focus:z-10 focus:outline-none focus:ring-1 focus:ring-blue-500 focus:border-blue-500"
											>
											<span class="sr-only">Next</span>
											Tovább {{ '(' . $this->phase + 1 . '/3)' }}
											<!-- Heroicon name: solid/chevron-right -->
											<svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
												<path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
											</svg>
									</button>
									<button
											x-show="phase == 3"
											type="submit"
											class="relative inline-flex items-center px-2 py-2 -ml-px text-lg font-medium text-gray-500 bg-white border border-gray-300 rounded-r-md hover:bg-gray-50 focus:z-10 focus:outline-none focus:ring-1 focus:ring-blue-500 focus:border-blue-500"
											>
											Új időpont felvétele
											<svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
												<path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
											</svg>
									</button>
								</span>
						</div>

		</section>
			</div>
	</form>
	</main>
</div>
