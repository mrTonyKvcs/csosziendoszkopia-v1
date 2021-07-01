<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        @hasSection('title')

            <title>@yield('title') - {{ config('app.name') }}</title>
        @else
            <title>{{ config('app.name') }}</title>
        @endif

        <!-- Favicon -->
		<link rel="shortcut icon" href="{{ url(asset('favicon.ico')) }}">

        <!-- Fonts -->
        <link rel="stylesheet" href="https://rsms.me/inter/inter.css">

		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="./css/bootstrap.min.css">
		<!-- Nice Select CSS -->
		<link rel="stylesheet" href="./css/nice-select.css">
		<!-- Font Awesome CSS -->
        <link rel="stylesheet" href="./css/font-awesome.min.css">
		<!-- icofont CSS -->
        <link rel="stylesheet" href="./css/icofont.css">
		<!-- Slicknav -->
		<link rel="stylesheet" href="./css/slicknav.min.css">
		<!-- Owl Carousel CSS -->
        <link rel="stylesheet" href="./css/owl-carousel.css">
		<!-- Datepicker CSS -->
		<link rel="stylesheet" href="./css/datepicker.css">
		<!-- Animate CSS -->
        <link rel="stylesheet" href="/css/animate.min.css">
		<!-- Magnific Popup CSS -->
        <link rel="stylesheet" href="./css/magnific-popup.css">
		
		<!-- Medipro CSS -->
        <link rel="stylesheet" href="./css/normalize.css">
        <link rel="stylesheet" href="./css/style.css">
        <link rel="stylesheet" href="./css/responsive.css">
		
		<!-- Color CSS -->
		<link rel="stylesheet" href="url('./css/color/color1.css')">
        <!--<link rel="stylesheet" href="css/color/color2.css">-->
        <!--<link rel="stylesheet" href="css/color/color3.css">-->
        <!--<link rel="stylesheet" href="css/color/color4.css">-->
        <!--<link rel="stylesheet" href="css/color/color5.css">-->
        <!--<link rel="stylesheet" href="css/color/color6.css">-->
        <!--<link rel="stylesheet" href="css/color/color7.css">-->
        <!--<link rel="stylesheet" href="css/color/color8.css">-->
        <!--<link rel="stylesheet" href="css/color/color9.css">-->
        <!--<link rel="stylesheet" href="css/color/color10.css">-->
        <!--<link rel="stylesheet" href="css/color/color11.css">-->
        <!--<link rel="stylesheet" href="css/color/color12.css">-->

		<link rel="stylesheet" href="#" id="colors">
		
        <link href="./css/template.css" rel="stylesheet">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ url(mix('css/app.css')) }}">
        @livewireStyles

        <!-- Scripts -->
        <script src="{{ url(mix('js/app.js')) }}" defer></script>

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
    </head>

    <body>
		<!-- Header Area -->
		@include('./partials.header')
        {{-- @yield('body') --}}
        {{ $slot }}

		<!-- Footer Area -->
		@include('./partials.footer')

		<!-- jquery Min JS -->
        <script src="./js/jquery.min.js"></script>
        <!-- jquery Migrate JS -->
        <script src="./js/jquery-migrate-3.0.0.js"></script>
        <!-- jquery Ui JS -->
        <script src="/js/jquery-ui.min.js"></script>
        <!-- Easing JS -->
        <script src="/js/easing.js"></script>
        <!-- Color JS -->
        <script src="/js/colors.js"></script>
        <!-- Popper JS -->
        <script src="/js/popper.min.js"></script>
        <!-- Bootstrap Datepicker JS -->
        <script src="/js/bootstrap-datepicker.js"></script>
        <!-- Jquery Nav JS -->
        <script src="/js/jquery.nav.js"></script>
        <!-- Slicknav JS -->
        <script src="/js/slicknav.min.js"></script>
        <!-- ScrollUp JS -->
        <script src="/js/jquery.scrollUp.min.js"></script>
        <!-- Niceselect JS -->
        {{--<script src="/js/niceselect.js"></script>--}}
        <!-- Tilt Jquery JS -->
        <script src="/js/tilt.jquery.min.js"></script>
        <!-- Owl Carousel JS -->
        <script src="/js/owl-carousel.js"></script>
        <!-- counterup JS -->
        <script src="/js/jquery.counterup.min.js"></script>
        <!-- Steller JS -->
        <script src="/js/steller.js"></script>
        <!-- Wow JS -->
        <script src="/js/wow.min.js"></script>
        <!-- Magnific Popup JS -->
        <script src="/js/jquery.magnific-popup.min.js"></script>
        <!-- Counter Up CDN JS -->
        <script src="http://cdnjs.cloudflare.com/ajax/libs/waypoints/2.0.3/waypoints.min.js"></script>
        <!-- Bootstrap JS -->
        <script src="/js/bootstrap.min.js"></script>
        <!-- Main JS -->
        <script src="/js/main.js"></script>
        <script src="/js/template.js"></script>
        @livewireScripts
    </body>
</html>
