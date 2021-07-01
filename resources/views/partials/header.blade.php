<header class="header style2" >
    <!-- Topbar -->
    {{--<div class="topbar">--}}
        {{--<div class="container">--}}
            {{--<div class="row">--}}
                {{--<div class="col-lg-6 col-md-5 col-12">--}}
                    {{--<!-- Contact -->--}}
                    {{--<ul class="top-link">--}}
                        {{--<li><a href="#">About</a></li>--}}
                        {{--<li><a href="#">Doctors</a></li>--}}
                        {{--<li><a href="#">Contact</a></li>--}}
                        {{--<li><a href="#">FAQ</a></li>--}}
                    {{--</ul>--}}
                    {{--<!-- End Contact -->--}}
                {{--</div>--}}
                {{--<div class="col-lg-6 col-md-7 col-12">--}}
                    {{--<!-- Top Contact -->--}}
                    {{--<ul class="top-contact">--}}
                        {{--<li><i class="fa fa-phone"></i>+880 1234 56789</li>--}}
                        {{--<li><i class="fa fa-envelope"></i><a href="mailto:support@yourmail.com">support@yourmail.com</a></li>--}}
                    {{--</ul>--}}
                    {{--<!-- End Top Contact -->--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}
    <!-- End Topbar -->
    <!-- Middle Header -->
    <div class="middle-header">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-3 col-12 d-flex align-items-center justify-content-between">
                    <!-- Start Logo -->
                    <div class="logo">
                        <a href="/" style="font-size: 23px; color: #1a76d1">Csőszi Endoszkópia</a>
                    </div>
                    <!-- End Logo -->
                    <!-- Mobile Nav -->
                    <div class="mobile-nav"></div>
                    <!-- End Mobile Nav -->
                </div>
                <div class="col-lg-9 col-md-9 col-12">
                    <div class="widget-main">
                        <!-- Single Widget -->
                        <div class="single-widget">
                            <i class="icofont-ui-call"></i>
                            <p>Telefonszám</p>
                            <h4><a href="tel:+36707794367">+36 70 779 43 67</a></h4>
                        </div>
                        <!--/ End Single Widget -->
                        <!-- Single Widget -->
                        {{--<div class="single-widget">--}}
                            {{--<i class="icofont-envelope"></i>--}}
                            {{--<p>Email cím</p>--}}
                            {{--<h4>pelda@csosziendoszkopia.hu</h4>--}}
                        {{--</div>--}}
                        <!--/ End Single Widget -->
                        <!-- Single Widget -->
                        {{--<div class="single-widget button">--}}
                            {{--<div class="get-quote">--}}
                                {{--<a href="appointment.html" class="btn">Book Appointment</a>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                        <!--/ End Single Widget -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Middle Header -->
    <!-- Header Inner -->
    <div class="header-inner">
        <div class="container">
            <div class="inner">
                <div class="row">
                    <div class="col-12">
                        <!-- Main Menu -->
                        <div class="main-menu">
                            <nav class="navigation">
                                <ul class="nav menu">
                                    <li><a href="/">Főoldal</a></li>
                                    <li><a href="/#vizsgalataink">Vizsgálataink</a></li>
                                    <li><a href="/#rendelo">A rendelő bemutatása</a></li>
                                    <li><a href="/#orvosok">Orvosok</a></li>
                                    <li><a href="{{ route('pages.prices') }}">Áraink</a></li>
                                    <li><a href="/#footer">Kapcsolat</a></li>
                                </ul>
                            </nav>
                        </div>
                        <!--/ End Main Menu -->
                        <div class="right-bar">
                            <!-- Search Form -->
                            <div class="search-top">
                                <div class="search"><a href="{{ route('appointments.index') }}" style="width: 200px">Online időpontfoglalás</a></div>
                            </div>
                            <!--/ End Search Form -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--/ End Header Inner -->
</header>
