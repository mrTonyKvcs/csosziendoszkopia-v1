<x-layouts.app>
    <div class="breadcrumbs overlay">
        <div class="container">
            <div class="bread-inner">
                <div class="row">
                    <div class="col-12">
                        <h2>Áraink</h2>
                        <ul class="bread-list">
                            <li><a href="/">Home</a></li>
                            <li><i class="icofont-simple-right"></i></li>
                            <li class="active">Áraink</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section class="pricing-table section">
			<div class="container">
<div class="p-4 mt-4 rounded-md bg-blue-50">
				<div class="flex">
					<div class="flex-shrink-0">
						<!-- Heroicon name: solid/information-circle -->
						<svg class="w-5 h-5 text-blue-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
							<path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd" />
						</svg>
					</div>
					<div class="flex-1 ml-3 md:flex md:justify-between">
						<p class="text-lg text-blue-700"><strong>Kedves Betegünk!</strong> <br><br> Tájékoztatni szeretnénk Önöket, hogy 2023.Március 15-től árváltozás lép érvénybe a gasztroszkópia és a colonoscopia vizsgálatok díjában. Ennek értelmében a gasztroszkópia vizsgálat díja 60.000 forintra, míg a colonoscopia vizsgálat díja 75.000 forintra változik.</p>
					</div>
				</div>
			</div>
                <p class="text-lg text-center">Áraink Szeptember 1.-től érvényesek. <strong>Időpontot csak online tud foglalni, az <a style="color: #1a76d1" class="font-bold" href="{{ route('appointments.index') }}">"Online időpontfoglalás"</a> menüpont alatt.</strong></p>
				<div class="row">
					<!-- Single Table -->
                    @foreach ($prices as $service)
					<div class="col-lg-4 col-md-12 col-12">
						<div class="single-table price-card">
							<!-- Table Head -->
							<div class="table-head">
                                <div class="d-flex justify-content-center">
                                    <img class="" src="icons/{{ $service['icon'] }}" width="90" style="width: 80px; height: auto;">
                                </div>
                                <h4 class="title">{{ $service['name'] }}</h4>
                                <div class="price">
                                    <p class="amount">{{ $service['prices'][0]['price'] }} Ft @if($service['prices'][0]['text'] != null)<span>/ {{ $service['prices'][0]['text'] }}</span> @endif</p>
                                </div>	
							</div>
							<!-- Table List -->
                            @if (isset($service['prices'][1]))
                                <ul class="table-list">
                                    <li class="pr-0" style="font-size: 19px; color: #1A76D1">{{ $service['prices'][1]['text'] }}<span> {{ $service['prices'][1]['price'] }} Ft</span></li>
                                </ul>
                            @endif
                            @if ($service['route'] != null)
                                <div class="table-bottom">
                                    <a class="btn" href="{{ route($service['route']) }}">Bejelentkezés</a>
                                </div>
                            @endif
							<!-- Table Bottom -->
						</div>
					</div>
					@endforeach
					<!-- End Single Table-->
				</div>	
			</div>	
		</section>
</x-layouts.app>
