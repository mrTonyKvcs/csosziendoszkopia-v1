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
			{{-- <section x-show="status === 1" class="container my-10"> --}}
				{{-- </section> --}}
		</section>
		<section x-show="" class="container my-10">

			<div x-data="{phase: @entangle('phase'), appointment: @entangle('appointment')}" class="my-5 md:mt-0 md:col-span-2">
				<x-appointment.steps />

					<x-session />

						<div x-show="phase == 1">
							<x-appointment.select-appointment />
						</div>
						<div x-show="phase == 2">
							<x-appointment.personal-info />
						</div>
						<div x-show="phase == 3">

							<x-appointment.information/>
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
											Bankkártyás fizetés
											<svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
												<path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
											</svg>
									</button>
								</span>
						</div>

		</section>
			</div>
	</form>
</div>
