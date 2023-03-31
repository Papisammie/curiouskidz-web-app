<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Curiouskidz</title>

     <!-- Google tag (gtag.js) -->
     <script async src="https://www.googletagmanager.com/gtag/js?id=G-HP1WG69GNP"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());

      gtag('config', 'G-HP1WG69GNP');
    </script>

    {{-- CSRF Token --}}
                <meta name="csrf-token" content="{{ csrf_token() }}">

        {{-- Scripts --}}
        <script>
            window.Laravel = {!! json_encode([
                'csrfToken' => csrf_token(),
            ]) !!};
        </script>

    <link rel="stylesheet" href="/cdn/css/themify-icons.css">

    <link rel="stylesheet" href="/cdn/css/feather.css">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="/curiouskidz.png">
    <!-- Custom Stylesheet -->
    <link rel="stylesheet" href="/cdn/css/style.css">

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.6/dist/sweetalert2.all.min.js"></script>
			<link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/sweetalert2@10.10.1/dist/sweetalert2.min.css'>


</head>

<body class="color-theme-blue mont-font">

    <div class="preloader"></div>

    

    <div class="main-wrap">
    <div class="header-wrapper pt-3 pb-3">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 navbar pt-0 pb-0">
                    <a href="/"><h1 class="fredoka-font ls-3 fw-700 text-current font-xxl">CuriousKidz <span class="d-block font-xsssss ls-1 text-grey-500 open-font ">Online Learning Course</span></h1></a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarNavDropdown">
                            <ul class="navbar-nav nav-menu float-none text-center">
                                <li class="nav-item dropdown"><a class="nav-link dropdown-toggle" href="/">Home </a></li>

                                <li class="nav-item"><a class="nav-link" href="/about/curiousKidz">About CuriousKidz</a></li>

                                <li class="nav-item"><a class="nav-link" href="/contact">Contact</a></li>
                            </ul>
                        </div>
                    </div>
                    @guest
                    <div class="col-lg-4 text-right d-lg-block d-none">
                        <a href="/login" class="header-btn bg-dark fw-500 text-white font-xssss p-2 lh-32 w100 text-center d-inline-block rounded-xl mt-1">Login</a>
                        <a href="/register" class="header-btn bg-current fw-500 text-white font-xssss p-2 lh-32 w100 text-center d-inline-block rounded-xl mt-1">Register</a>
                    </div>
                    @else

                    <div class="col-lg-4 text-right d-lg-block d-none">

                        <a href="/home" class="header-btn bg-dark fw-500 text-white font-xssss p-2 lh-32 w100 text-center d-inline-block rounded-xl mt-1">Go to Portal</a>
                        <a class="header-btn bg-current fw-500 text-white font-xssss p-2 lh-32 w100 text-center d-inline-block rounded-xl mt-1" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                         <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                          </form>
                      
                    </div>


                    @endguest
                </div>
            </div>
        </div>



          <div class="section">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3963.0076049893078!2d3.263934014672417!3d6.645975995194422!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x103b90ae58dc2f9f%3A0xbad684f749dae970!2s23%20Majekodunmi%20St%2C%20Alagbado%20102213%2C%20Lagos!5e0!3m2!1sen!2sng!4v1673171003886!5m2!1sen!2sng" width="1450" height="500" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>

        <div class="map-wrapper pb-2 pb-lg--5">
            <div class="container">


            @if (session('success'))
            <script type="text/javascript">
            Swal.fire(
              'Welcome {{Auth::user()->name}}!',
			  '{{ session('success') }}',
              'success'
            )
            </script>
        @endif


      
        @if (session('success_contact'))
            <script type="text/javascript">
            Swal.fire(
              'Notification!!!',
			  '{{ session('success_contact') }}',
              'success'
            )
            </script>
        @endif



        @if (session('error'))
        <script type="text/javascript">
            Swal.fire(
              'Error!',
              '{{ session('error') }}',
              'error'
            )
            </script>
        @endif

                <div class="row justify-content-center">
                    <div class="col-lg-10">
                        <div class="contact-wrap bg-white shadow-lg rounded-lg position-relative">
                            <h1 class="text-grey-900 fw-700 display3-size mb-5 lh-1">Contact us</h1>
                            <form method="post" action="/contact">
                              @csrf
                                <div class="row">
                                    <div class="col-lg-6 col-md-12">
                                        <div class="form-group mb-3">
                                            <input type="text" class="form-control style2-input bg-color-none text-grey-700" value="Name">                        
                                        </div>        
                                    </div>
                                    <div class="col-lg-6 col-md-12">
                                        <div class="form-group mb-3">
                                            <input type="text" class="form-control style2-input bg-color-none text-grey-700" value="Email">                        
                                        </div>        
                                    </div>

                                    <div class="col-12">
                                        <div class="form-group mb-3 md-mb-2">
                                            <textarea class="w-100 h125 style2-textarea p-3 form-control">Message</textarea>
                                        </div>
                                        <!-- <div class="form-check text-left mt-3 float-left md-mb-2">
                                            <input type="checkbox" class="form-check-input mt-2" id="exampleCheck1">
                                            <label class="form-check-label font-xsss text-grey-500 fw-500" for="exampleCheck1">I agree to the term of this <a href="contact.html#" class="text-grey-600 fw-600">Privacy Policy</a></label>
                                        </div> -->
                                        <div class="form-group"><button type="submit" class="rounded-lg style1-input float-right bg-current text-white text-center font-xss fw-500 border-2 border-0 p-0 w175">Submit</button></div>
                                    </div>
                                </div>
                                
                            </form>
                        </div>
                    </div>
                    <div class="col-lg-12 pb-lg--7 pb-5 pt-0">
                        <div class="row">
                            <div class="col-lg-4 col-md-4 xs-mb-2">
                                <div class="card shadow-xss border-0 p-5 rounded-lg">
                                    <span class="btn-round-xxxl alert-success"><i class="feather-mail text-success font-xl"></i></span>
                                    <h2 class="fw-700 font-sm mt-4 mb-3 text-grey-900">Email us</h2>
                                    <p class="font-xsss text-grey-500 fw-500 mb-3">Ask us a question by email and we will respond within a few days.</p>
                                    <a href="mailto:curiouskidzng@gmail.com" class="fw-700 font-xsss text-primary">Click to get in touch</a>
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-4 xs-mb-2">
                                <div class="card shadow-xss border-0 p-5 rounded-lg">
                                    <span class="btn-round-xxxl alert-primary"><i class="feather-phone text-primary font-xl"></i></span>
                                    <h2 class="fw-700 font-sm mt-4 mb-3 text-grey-900">Call  us</h2>
                                    <p class="font-xsss text-grey-500 fw-500 mb-3">Ask us a question by Phone and we will respond instantly.</p>
                                    <a href="callto:+2349067910217" class="fw-700 font-xsss text-primary">Click to get in touch</a>
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-4 xs-mb-2">
                                <div class="card shadow-xss border-0 p-5 rounded-lg">
                                    <span class="btn-round-xxxl alert-danger"><i class="feather-phone text-danger font-xl"></i></span>
                                    <h2 class="fw-700 font-sm mt-4 mb-3 text-grey-900">Call us</h2>
                                    <p class="font-xsss text-grey-500 fw-500 mb-3">Ask us a question by Phone and we will respond instantly.</p>
                                    <a href="callto:+2348131073419" class="fw-700 font-xsss text-primary">Get in touch</a>
                                </div>
                            </div>

                             
                        </div>
                    </div>
                </div>
            </div>
        </div>

      
    <!-- footer wrapper -->
        <div class="footer-wrapper layer-after bg-dark mt-0">
            <div class="container">
                <div class="row">
<!--                    <div class="col-sm-12 text-left">-->
<!--                        <h4 class="mb-4 text-grey-300 fw-300 font-xl open-font lh-3 d-inline-block">CuriousKidz is an Edtech platform that simplify learning with the use of technology and gamification.-->
<!--We are on a mission to provide autonomous learning to students outside the classroom.</h4>-->
<!--                    </div>-->
                    <div class="col-sm-6 text-left">
                        <ul class="d-flex align-items-center mt-2 float-left xs-mb-2">
                            <li class="mr-2"><a href="https://www.facebook.com/profile.php?id=100084077277628&mibextid=LQQJ4d" class="btn-round-md bg-facebook"><i class="font-xs ti-facebook text-white"></i></a></li>
                           
                            <!--<li class="mr-2"><a href="javascript:void(0)" class="btn-round-md bg-linkedin"><i class="font-xs ti-linkedin text-white"></i></a></li>-->
                            <li class="mr-2"><a href="https://instagram.com/curiouskidzng?igshid=YWJhMjlhZTc=" class="btn-round-md bg-instagram"><i class="font-xs ti-instagram text-white"></i></a></li>
                            <!--<li class="mr-2"><a href="javascript:void(0)" class="btn-round-md bg-pinterest"><i class="font-xs ti-pinterest text-white"></i></a></li>-->
                        </ul>
                    </div>
                    <div class="col-sm-5 offset-sm-1 text-right">
                        <form action="{{url('activate/newsletter')}}" class="mt-2" method="post">
                                @csrf

                                <input type="text" name="email" required autofocus class="form-control mb-2 bg-greylight border-0 style1-input pl-5" placeholder="Email address">
                                        @if ($errors->has('email'))
                                            <span class="invalid-feedback">
                                                <strong>{{ $errors->first('email') }}</strong>
                                            </span>
                                        @endif
                   
                            <button type="submit">Submit</button>
                        </form>                    
                    </div>
                   

                    <div class="col-sm-12 lower-footer"></div>
                    <div class="col-sm-6">
                        <p class="copyright-text">© {{date('Y')}} copyright. All rights reserved.</p>
                    </div>
                    <div class="col-sm-6 text-right">
                        <p class="float-right copyright-text">In case of any concern, <a href="/contact">contact us</a></p>
                    </div>
                </div>
            </div>
        </div>
        <!-- footer wrapper -->

    </div> 

     <!-- Modal Video -->
    <!-- <div class="modal bottom fade" id="Modalvideo" tabindex="-1" role="dialog">
         <div class="modal-dialog video-wrap modal-dialog-centered" role="document">
            <div class="modal-content border-0">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><i class="ti-close text-grey-500"></i></button>
                <div class="modal-body p-3 d-flex align-items-center bg-none">
                    <div class="embed-responsive embed-responsive-16by9">
                      <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/zpOULjyy-n8?rel=0"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div> -->



    <script src="/cdn/js/plugin.js"></script>
    <script src="/cdn/js/scripts.js"></script>
    
</body>

</html>