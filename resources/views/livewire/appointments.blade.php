<div>
	<section class="breadcrumbs overlay">
		<div class="container">
			<div class="bread-inner">
				<div class="row">
					<div class="col-12">
						<h2>Online bejelentkezés</h2>
						<ul class="bread-list">
							<li><a href="/">Home</a></li>
							<li><i class="icofont-simple-right"></i></li>
							<li class="active">Online bejelentkezés</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</section>
	<form x-show="!appointmentEnd" wire:submit.prevent="save">
		<div x-cloak x-data="{ status: @entangle('status') }">
		</div>
		<section x-show="" class="container my-10">
			<div class="">
				<h2 class="text-2xl font-semibold">Időpontfoglalás és fizetés</h2>
				<p class="text-lg">Foglaljon időpontot a vizsgálatainkra!<br> Ön 5000 Ft előleg fizetésével tud időpontot foglalni on-line, mely összeg levonásra kerül a vizsgálat árából</p>
			</div>
			<div class="p-4 mt-4 rounded-md bg-blue-50">
				<div class="flex">
					<div class="flex-shrink-0">
						<!-- Heroicon name: solid/information-circle -->
						<svg class="w-5 h-5 text-blue-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
							<path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd" />
						</svg>
					</div>
					<div class="flex-1 ml-3 md:flex md:justify-between">
						<p class="text-lg text-blue-700"><strong>Kedves Betegünk!</strong> <br>Amennyiben  oltási igazolvánnyal nem rendelkezik, a gyomor- és vastagbéltükrözés elvégzéséhez negatív PCR teszt bemutatása szükséges, mely a vizsgálat időpontjához viszonyítva 48 óránál nem lehet korábbi. 
						</p>
					</div>
				</div>
			</div>
			{{-- <section x-show="status === 1" class="container my-10"> --}}
				{{-- </section> --}}
		</section>
		<section x-show="" class="container my-10">

			<div x-data="{phase: @entangle('phase'), appointment: @entangle('appointment'), medicalExamination: @entangle('medicalExamination'), doctor: @entangle('doctor'), consultation: @entangle('consultation')}" class="my-5 md:mt-0 md:col-span-2">
				<x-appointment.steps />

						<div x-show="phase == 1">
							<x-forms.select-medical>
								{{ empty($this->medicalExamination) ? __('Vizsgálat kiválasztása') : $this->medicalExamination->name }}
							</x-forms.select-medical>

							<div x-show="medicalExamination">
								<x-forms.select-doctor>
									{{ empty($this->doctor) ? __('Orvos kiválasztása') : $this->doctor->name }}
								</x-forms.select-doctor>
							</div>

							<div x-show="doctor">
								<x-forms.select-consultation>
									{{ empty($this->consultation) ? __('Rendelési nap kiválasztása') : $this->consultation->name }}
								</x-forms.select-consultation>
							</div>

							<div x-show="consultation">
								<x-forms.select-appointment>
									{{ empty($this->appointment) ? __('Időpont kiválasztása') : $this->appointment['start_at'] . '-' . $this->appointment['end_at'] }}
								</x-forms.select-appointment>
							</div>
							{{-- <x-appointment.select-appointment /> --}}
						</div>
						<div x-show="phase == 2">
							<x-appointment.personal-info/>
						</div>
						<div x-show="phase == 3">

							<x-appointment.information />
								{{-- <div --}}
									{{-- x-cloak --}}
									{{-- x-data="{ appointment: @entangle('appointment') }" --}}
									{{-- x-show="appointment != null" --}}
									{{-- class="py-5 text-right" --}}
									{{-- > --}}
									{{-- <button type="submit" class="inline-flex justify-center px-4 py-2 text-lg font-medium text-white bg-blue-600 border border-transparent rounded-md shadow-sm hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500"> --}}
										{{--     Időpontfoglalás és fizetés --}}
										{{-- </button> --}}
									{{-- </div> --}}
						</div>
						<div
								x-show="phase <= 3"
								>
								<span class="relative z-0 inline-flex mt-5 rounded-md shadow-sm">
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
											Foglalás és fizetés
											<svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
												<path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
											</svg>
									</button>
								</span>
						</div>

		</section>
			</div>
	</form>
	<div class="flex flex-col items-center justify-center mb-10">
		<h3 class="mb-3 text-lg font-bold uppercase">Foglaljon gyorsan és könnyedén időpontot</h3>
		<img class4="mb-5" src="img/section-img.png" alt="#">
		<video class="mt-10" width="70%" height="auto" controls>Your browser does not support the &lt;video&gt; tag.
			<source src="/videos/online-help.mp4" />
		</video>
	</div>
</div>
