
<x-layouts.app>

        <section class="appointment single-page">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-12">
                        <div class="appointment-inner">
                            <div class="title">
                                @if ($transaction->status === 'CANCEL')
                                    <h3 class="pb-3 mb-5 text-3xl text-center uppercase text-gold">{{ __('Ön megszakította a fizetést') }}</h3>
                                @elseif ($transaction->status === 'TIMEOUT')
                                    <h3 class="pb-3 mb-5 text-3xl text-center uppercase text-gold">{{ __('Ön túllépte a tranzakció elindításának lehetséges maximális idejét.') }}</h3>
                                @elseif ($transaction->status === 'FAIL')
                                    <h3 class="pb-3 mb-5 text-3xl text-center uppercase border-b border-opacity-25 text-gold border-gold">{{ __('Sikertelen tranzakció') }}</h3>
                                    <h3 class="pb-3 mb-5 text-3xl text-center uppercase border-b border-opacity-25 ">{{ __('SimplePay tranzakció azonosító: ') . $transaction->transaction_id }}</h3>
                                    <h3 class="pb-3 mb-5 text-3xl text-center uppercase border-b border-opacity-25 ">Kérjük, ellenőrizze a tranzakció során megadott adatok helyességét.  Amennyiben minden adatot helyesen adott meg, a visszautasítás okának kivizsgálása érdekében kérjük, szíveskedjen kapcsolatba lépni kártyakibocsátó bankjával.</h3>
                                @endif
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
