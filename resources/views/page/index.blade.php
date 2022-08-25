{{-- @dd($page->contents()->orderBy('order')->get()); --}}
<x-layouts.app>
    <!-- Slider Area -->
    @include('./sections.slider')
    <!--/ End Slider Area -->
<section x-show="" class="container my-10">
			
			<div class="p-4 mt-4 rounded-md bg-blue-50">
				<div class="flex">
					<div class="flex-shrink-0">
						<!-- Heroicon name: solid/information-circle -->
						<svg class="w-5 h-5 text-blue-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
							<path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd" />
						</svg>
					</div>
					<div class="flex-1 ml-3 md:flex md:justify-between">
						<p class="text-lg text-blue-700"><strong>Kedves Betegünk!</strong> <br><br> Időpontot online tud foglalni. <br>Amennyiben  oltási igazolvánnyal nem rendelkezik, a gyomor- és vastagbéltükrözés elvégzéséhez negatív PCR teszt bemutatása szükséges, mely a vizsgálat időpontjához viszonyítva 48 óránál nem lehet korábbi. 
							A rendelőben kötelező a maszk használata. <br><br> Vastagbéltükrözésre esetleges polyp eltávolítást csak friss (1 héten belüli) laboreredménnyel (teljes vérkép, INR, APTT)  tudjuk elvégezni.</p>
					</div>
				</div>
			</div>
			{{-- <section x-show="status === 1" class="container my-10"> --}}
				{{-- </section> --}}
		</section>
    <!-- Start service -->
    @include('./sections.services')
    <!--/ End service -->

    <!-- Start Fun-facts -->
    @include('./sections.counter')
    <!--/ End Fun-facts -->

    <!-- Start portfolio -->
    @include('./sections.portfolio')
    <!--/ End portfolio -->

    <!-- Start Team -->
    @include('./sections.team')
    <!--/ End Team -->

    <!-- Start Price -->
    @include('./sections.price')
    <!--/ End Price -->
</x-layouts.app>
