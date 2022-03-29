<x-layouts.app>

        <section class="appointment single-page">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-12">
                        <div class="appointment-inner">
                            <div class="title">
                                <h3>Sikeres online fizetés és bejelentkezés!</h3>
                                <p class="my-3" style="font-size: 22px;"><strong>SimplePay tranzakció azonosító:</strong> {{ $transactionId }}</p>
                                <p class="my-3" style="font-size: 22px;">A megadott email címre küldjük az időponttal és a vizsgálattal kapcsolatos információkat</p>
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
