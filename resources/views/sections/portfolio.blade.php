<section id="rendelo" class="portfolio section" >
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title">
                    <h2>A rendelő bemutatása</h2>
                    <img src="img/section-img.png" alt="#">
                    <p>A Csőszi Endoszkópos KFT két telephellyel működik Kecskeméten gyomor-bél rendszeri
endoszkópiás profillal. Mindkét helyszínen magas technikai színvonalon, magasan kvalifikált
munkatársakkal várjuk betegeinket. Az egyik rendelő a Bagoly Egészségház keretei között működik, a
másik, nagyobb kapacitású egy exkluzív környezetben, Kecskemét központjához közel került
kialakításra a Faragó Béla fasor 4 szám alatt.</p>
                </div>
            </div>
        </div>
    </div>
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
