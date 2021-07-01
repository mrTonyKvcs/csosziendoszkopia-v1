<section id="orvosok" class="team section overlay" data-stellar-background-ratio="0.5">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title">
                    <h2>Orvosok</h2>
                    <img src="img/section-img2.png" alt="#">
                    {{--<p>Lorem ipsum dolor sit amet consectetur adipiscing elit praesent aliquet. pretiumts</p>--}}
                </div>
            </div>
        </div>
        <div class="row">
            @foreach($doctors as $doctor)
                <div class="col-lg-4 col-md-6 col-12" data-tilt>
                    <!-- Single Team -->
                    <div class="single-team wow fadeInUp" data-wow-delay="0.4s" data-wow-duration="1s">
                        <div class="t-head">
                            <img src="/img/doctors/{{ $doctor['image_path'] }}" alt="#">
                            <div class="t-icon">
                                <a href="{{ route('pages.doctor', $doctor['slug']) }}" class="btn">Bemutatkozás</a>
                            </div>
                        </div>
                        <div class="t-bottom">
                            <p>{{ $doctor['job'] }}</p>
                            <h2><a href="doctor-details.html">{{ $doctor['name'] }}</a></h2>
                        </div>
                    </div>
                    <!-- End Single Team -->
                </div>	
            @endforeach
        </div>
    </div>
</section>
