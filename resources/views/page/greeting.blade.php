<x-layouts.app>
    <!-- Breadcrumbs -->
    <div class="breadcrumbs overlay">
        <div class="container">
            <div class="bread-inner">
                <div class="row">
                    <div class="col-12">
							<h2>Online konzultáció</h2>
                        <ul class="bread-list">
                            <li><a href="/">Főoldal</a></li>
                            <li><i class="icofont-simple-right"></i></li>
                            <li><a href="{{ route('appointments.index') }}">Online konzultáció</a></li>
                            <li class="">Sikeres bejelentkezés</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Breadcrumbs -->

    <section class="appointment single-page">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-12">
                    <div class="appointment-inner">
                        <div class="title">
                            <h3>Sikeres online fizetés és bejelentkezés!</h3>
                            <p class="my-3" style="font-size: 22px;">Az időpontja: <span style="color: #1A76D1;">{{ $appointment->consultation->nameWithoutTime }} {{ $appointment->start_at }} - {{ $appointment->end_at}}</span></p>
                            <a href="/" style="font-size: 22px color: #1A76D1;">Vissza a főoldalra</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="rendelo" class="portfolio section" >
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-12">
                    <div class="owl-carousel portfolio-slider">
                        @for ($i = 1; $i < 7; $i++)
                            <div class="single-pf wow fadeIn" data-wow-delay="0.2s" data-wow-duration="0.8s">
                                {{--<img src="/img/sliders/{{$i}}.png" alt="#">--}}
                                <img src="/img/portfolios/{{$i}}.jpg" alt="#" style="width: auto; height: 320px;">
                            </div>
                        @endfor
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-layouts.app>
