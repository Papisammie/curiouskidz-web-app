<!doctype html>
<html lang="zxx">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap Min CSS -->
        <link rel="stylesheet" href="/assets/css/bootstrap.min.css">
        <!-- Animate Min CSS -->
        <link rel="stylesheet" href="/assets/css/animate.min.css">
        <!-- Font Awesome Min CSS -->
        <link rel="stylesheet" href="/assets/css/fontawesome.min.css">
        <!-- FlatIcon CSS -->
        <link rel="stylesheet" href="/assets/css/flaticon.css">
        <!-- Magnific Popup Min CSS -->
        <link rel="stylesheet" href="/assets/css/magnific-popup.min.css">
        <!-- NiceSelect CSS -->
        <link rel="stylesheet" href="/assets/css/nice-select.css">
        <!-- Slick Min CSS -->
        <link rel="stylesheet" href="/assets/css/slick.min.css">
        <!-- MeanMenu CSS -->
        <link rel="stylesheet" href="/assets/css/meanmenu.css">
        <!-- Odometer CSS -->
		<link rel="stylesheet" href="/assets/css/odometer.min.css">
        <!-- Style CSS -->
        <link rel="stylesheet" href="/assets/css/style.css">
        <!-- Responsive CSS -->
        <link rel="stylesheet" href="/assets/css/responsive.css">

        {{-- CSRF Token --}}
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Curiouskidz | Account</title>

        <link rel="icon" type="image/png" href="/curiouskidz.png">


        {{-- Scripts --}}
        <script>
            window.Laravel = {!! json_encode([
                'csrfToken' => csrf_token(),
            ]) !!};
        </script>


    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-HP1WG69GNP"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());

      gtag('config', 'G-HP1WG69GNP');
    </script>

    </head>

        <!-- Preloader -->
        <div class="preloader">
            <div class="loader">
                <div class="shadow"></div>
                <div class="box"></div>
            </div>
        </div>
        <!-- End Preloader -->



        @yield('content')


        
        <!-- jQuery Min JS -->
        <script src="/assets/js/jquery.min.js"></script>
        <!-- Popper Min JS -->
        <script src="/assets/js/popper.min.js"></script>
        <!-- Bootstrap Min JS -->
        <script src="/assets/js/bootstrap.min.js"></script>
        <!-- Mean Menu JS -->
        <script src="/assets/js/jquery.meanmenu.js"></script>
        <!-- NiceSelect Min JS -->
        <script src="/assets/js/jquery.nice-select.min.js"></script>
        <!-- Slick Min JS -->
        <script src="/assets/js/slick.min.js"></script>
        <!-- Magnific Popup Min JS -->
        <script src="/assets/js/jquery.magnific-popup.min.js"></script>
        <!-- Appear Min JS -->
		<script src="/assets/js/jquery.appear.min.js"></script>
        <!-- Odometer Min JS -->
        <script src="/assets/js/odometer.min.js"></script>
        <!-- Parallax Min JS -->
        <script src="/assets/js/parallax.min.js"></script>
        <!-- WOW Min JS -->
        <script src="/assets/js/wow.min.js"></script>
        <!-- Form Validator Min JS -->
        <script src="/assets/js/form-validator.min.js"></script>
        <!-- Contact Form Min JS -->
        <script src="/assets/js/contact-form-script.js"></script>
        <!-- Main JS -->
        <script src="/assets/js/main.js"></script>
        
        
    </body>
</html>