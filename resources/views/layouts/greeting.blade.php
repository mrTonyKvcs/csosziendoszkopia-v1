<!doctype html>
<html class="no-js" lang="zxx">
    <head>
        <!-- Meta Tags -->
		<meta charset="utf-8">
		<meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests"> 
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="keywords" content="Site keywords here">
		<meta name="description" content="">
		<meta name='copyright' content=''>
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="csrf-token" content="{{ csrf_token() }}">
		
		<!-- Title -->
        <title>Csőszi Endoszkopia</title>
		
		<!-- Favicon -->
        <link rel="icon" href="img/favicon.png">
		
		<!-- Google Fonts -->
		<link href="https://fonts.googleapis.com/css?family=Poppins:200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&display=swap" rel="stylesheet">

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
        <link rel="stylesheet" href="./css/animate.min.css">
		<!-- Magnific Popup CSS -->
        <link rel="stylesheet" href="./css/magnific-popup.css">
		
		<!-- Medipro CSS -->
        <link rel="stylesheet" href="./css/normalize.css">
        <link rel="stylesheet" href="./css/style.css">
        <link rel="stylesheet" href="./css/responsive.css">
		
		<!-- Color CSS -->
		<link rel="stylesheet" href="./css/color/color1.css">
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
		
        <link href="{{ mix('css/app.css') }}" rel="stylesheet">

        <script>
            // Create BP element on the window
            window["bp"] = window["bp"] || function () {
                (window["bp"].q = window["bp"].q || []).push(arguments);
            };
            window["bp"].l = 1 * new Date();
    
            // Insert a script tag on the top of the head to load bp.js
            scriptElement = document.createElement("script");
            firstScript = document.getElementsByTagName("script")[0];
            scriptElement.async = true;
            scriptElement.src = 'https://pixel.barion.com/bp.js';
            firstScript.parentNode.insertBefore(scriptElement, firstScript);
            window['barion_pixel_id'] = 'BP-E7wx2OLEVn-41';

            // Send init event
            bp('init', 'addBarionPixelId', window['barion_pixel_id']);
        </script>

        <noscript>
            <img height="1" width="1" style="display:none" alt="Barion Pixel" src="https://pixel.barion.com/a.gif?ba_pixel_id='BP-0000000000-00'&ev=contentView&noscript=1">
        </noscript>
    </head>
    <body>
	
        <div id="app">
		<!-- Preloader -->
        <div class="preloader">
            <div class="loader">
                <div class="loader-outter"></div>
                <div class="loader-inner"></div>

                <div class="indicator"> 
                    <svg width="16px" height="12px">
                        <polyline id="back" points="1 6 4 6 6 11 10 1 12 6 15 6"></polyline>
                        <polyline id="front" points="1 6 4 6 6 11 10 1 12 6 15 6"></polyline>
                    </svg>
                </div>
            </div>
        </div>
        <!-- End Preloader -->
		
		<!-- Mediplus Color Plate -->
		{{--<div class="color-plate">--}}
			{{--<a class="color-plate-icon"><i class="fa fa-cog fa-spin"></i></a>--}}
			{{--<h4>Mediplus</h4>--}}
			{{--<p>Here is some awesome color's available on Mediplus Template.</p>--}}
			{{--<span class="color1"></span>--}}
			{{--<span class="color2"></span>--}}
			{{--<span class="color3"></span>--}}
			{{--<span class="color4"></span>--}}
			{{--<span class="color5"></span>--}}
			{{--<span class="color6"></span>--}}
			{{--<span class="color7"></span>--}}
			{{--<span class="color8"></span>--}}
			{{--<span class="color9"></span>--}}
			{{--<span class="color10"></span>--}}
			{{--<span class="color11"></span>--}}
			{{--<span class="color12"></span>--}}
		{{--</div>--}}
		<!-- /End Color Plate -->
	
		<!-- Header Area -->
		@include('partials.header')
		
		@yield('content')

		<!-- Footer Area -->
		@include('partials.footer')
		<!--/ End Footer Area -->
        </div>
		
		<!-- jquery Min JS -->
        <script src="/js/jquery.min.js"></script>
        <!-- jquery Migrate JS -->
        <script src="/js/jquery-migrate-3.0.0.js"></script>
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
        <script src="{{ mix('js/app.js') }}" defer></script>
    </body>
</html>
