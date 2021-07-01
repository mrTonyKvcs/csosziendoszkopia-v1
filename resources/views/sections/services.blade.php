<section id="vizsgalataink" class="services section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title">
                    <h2>Vizsgálataink</h2>
                    <img src="img/section-img.png" alt="#">
                    {{--<p>Lorem ipsum dolor sit amet consectetur adipiscing elit praesent aliquet. pretiumts</p>--}}
                </div>
            </div>
        </div>
        <div class="row d-flex flex-column flex-md-row justify-content-center">
            @foreach ($services as $service)
                <div class="col-lg-6 col-md-6 col-12">
                    <!-- Start Single Service -->
                    <div class="text-center single-service wow fadeInUp" data-wow-delay="0.4s" data-wow-duration="1s">
                        {{--<i class="icofont icofont-prescription"></i>--}}
                        <img class="icofont" src="icons/{{ $service['icon'] }}" width="55">
                        <h4><a href="{{ route('appointments.index') }}">{{ $service['name'] }}</a></h4>
                        <p class="fs-16">{{ $service['description'] }}</p>	
                    </div>
                    <!-- End Single Service -->
                </div>
            @endforeach
        </div>
    </div>
</section>
