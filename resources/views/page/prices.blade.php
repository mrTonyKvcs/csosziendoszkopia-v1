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
