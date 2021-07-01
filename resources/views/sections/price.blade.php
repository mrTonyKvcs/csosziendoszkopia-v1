<section id="araink" class="pricing-table portfolio section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title">
                    <h2>Áraink</h2>
                    <img src="img/section-img.png" alt="#">
                    {{--<p>Lorem ipsum dolor sit amet consectetur adipiscing elit praesent aliquet. pretiumts</p>--}}
                </div>
            </div>
        </div>
    </div>	
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-12">
                <div class="owl-carousel portfolio-slider">
                    @foreach ($prices as $service)
                        <div class="single-pf wow fadeIn" data-wow-delay="0.2s" data-wow-duration="0.8s">
                                <div class="single-table wow fadeInUp d-flex flex-column align-items-center justify-content-center" style="min-height: 350px;" data-wow-delay="0.8s" data-wow-duration="1s">
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
                                    <ul class="text-center table-list">
                                        {{--<li style="font-size: 18px;">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec luctus dictum eros ut imperdiet.</li>--}}
                                        @if (isset($service['prices'][1]))
                                            <li style="font-size: 19px; color: #1A76D1">{{ $service['prices'][1]['text'] }}<span> {{ $service['prices'][1]['price'] }} Ft</span></li>
                                        @endif
                                    </ul>
                                    <div class="table-bottom">
                                        @if ($service['route'] != null)
                                            <a class="btn" href="{{ route($service['route']) }}">Bejelentkezés</a>
                                        @endif
                                    </div>
                                    <!-- Table Bottom -->
                                </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>	
