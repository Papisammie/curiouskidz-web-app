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



  <!-- Logout modal -->

  <div class="modal bottom fade" style="overflow-y: scroll;" id="ModalLogout" tabindex="-1" role="dialog">
         <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content border-0">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><i class="ti-close text-grey-500"></i></button>
                <div class="modal-body p-3 d-flex align-items-center bg-none">
                    <div class="card shadow-none rounded-0 w-100 p-2 pt-3 border-0">
                        <div class="card-body rounded-0 text-left p-3">
                        <h2 class="fw-700 display1-size display2-md-size mb-4">Are you sure you want to logout?</h2>
                           
                           
                            <div class="col-sm-12 p-0 text-center mt-3 ">
                            <div class="form-group mb-1"> 
                              
                            <button class="btn btn-default" data-dismiss="modal">Cancel</button>
                            
                            <a href="{{ route('logout') }}" class="p-0 btn p-2 lh-24 w100 ml-1 ls-3 d-inline-block rounded-xl btn-danger font-xsssss fw-700 ls-lg text-white"
                                                            onclick="event.preventDefault();
                                                                          document.getElementById('logout-form').submit();">
                                      Log out</a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                            @csrf
                                        </form>
                              </div>
                                
                               
                      
                            </div>
                        </div>
                    </div>                    
                </div>
            </div>
        </div>
    </div>



    <!-- Start Modal Guest -->
    <div class="modal bottom fade" style="overflow-y: scroll;" id="ModalGuest" tabindex="-1" role="dialog">
         <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content border-0">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><i class="ti-close text-grey-500"></i></button>
                <div class="modal-body p-3 d-flex align-items-center bg-none">
                    <div class="card shadow-none rounded-0 w-100 p-2 pt-3 border-0">
                        <div class="card-body rounded-0 text-left p-3">
                        <h2 class="fw-700 display1-size display2-md-size mb-4">Oops! You cant watch as a Guest </h2>
                           
                           
                            <div class="col-sm-12 p-0 text-center mt-3 ">
                                
                                <h6 class="mb-0 d-inline-block bg-white fw-600 font-xsss text-grey-500 mb-4"> Sign up to enjoy our platform</h6>
                                <!-- <div class="form-group mb-1"><a href="login.html#" class="form-control text-left style2-input text-white fw-600 bg-facebook border-0 p-0 mb-2"><img src="images/icon-1.png" alt="icon" class="ml-2 w40 mb-1 mr-5"> Sign in with Google</a></div> -->
                                <div class="form-group mb-1"><a href="/register" class="form-control text-left style2-input text-white fw-600 bg-twiiter border-0 p-0 "><center>Click to Sign Up</center></a></div>
                            </div>
                        </div>
                    </div>                    
                </div>
            </div>
        </div>
    </div>
     <!-- End Modal Guest -->

    @if (session('success'))
            <script type="text/javascript">
            Swal.fire(
              'Welcome {{Auth::user()->name}}!',
			  '{{ session('success') }}',
              'success'
            )
            </script>
        @endif


        @if (session('success_watch'))
            <script type="text/javascript">
            Swal.fire(
              'Hurray!!!',
			  '{{ session('success_watch') }}',
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

    <div class="main-wrap">
        <!-- header wrapper -->
        <div class="header-wrapper pt-3 pb-3 shadow-xss">
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

                        <a href="/home" class="header-btn bg-dark fw-500 text-white font-xssss p-2 lh-32 w100 text-center d-inline-block rounded-xl mt-1"> Go to Home</a>
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
        <!-- header wrapper -->

        <div class="about-wrapper pb-lg--7 pt-lg--7 pt-5 pb-7">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <h2 class="text-grey-900 fw-700 display1-size display2-md-size pb-2 mb-0 mt-3 d-block lh-3">ABOUT CK</h2>
                        
                    </div>
                    <div class="col-lg-5 offset-lg-1">
                        <ul class="d-block list-inline float-right-md mb-3">
                        <li class="list-inline-item mr-1"><a href="/about/ourResearch" class="ml-1 mr-1 rounded-lg text-primary font-xss border-size-md border-primary fw-600 open-font p-3 w200 btn md-mb-2 mt-3">Our Research</a></li>
                      
                        <li class="list-inline-item mr-1"><a href="/about/faq" class="ml-1 mr-1 rounded-lg text-primary font-xss border-size-md border-primary fw-600 open-font p-3 w200 btn md-mb-2 mt-3">FAQ</a></li>
                        </ul>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12 mt-3">
                        <img src="/about-page-hero.png" alt="about" class="img-fluid rounded-lg"></a>
                </div>
                    <div class="col-lg-12">
                      <br>
                        <h4 class=" fw-500 mb-4 lh-30 font-xsss text-black-500 mt-0"> <strong>CURIOUSKIDZ</strong> is a new innovative educational method designed to be the bridge between conventional education and the STEAM program. The STEAM program is designed to engage young minds in the conventional education settings and give them the extra nudge towards certain rare and high paying disciplines with the drive for innovation and problem solving. In Nigeria we have two major factors that restrict the progress of the STEM or STEAM program; Cost & Environment.</h4>       
                        
                        <h4 class=" fw-500 mb-4 lh-30 font-xsss text-black-500 mt-0">It is expensive to run these programs in our very limited version of an engaging environment; Needs like an acoustically friendly music lab, fully tooled technical workshops, 3D printers, open space to test their projects and so on. These needs are met in developed societies making it easier to guide their children towards disciplines that need more talents like aerospace, astronomy, robotics, computer programming
                            and systems theory and so on.</h4>    


                        <h4 class=" fw-500 mb-4 lh-30 font-xsss text-black-500 mt-0">This platform is designed to draw our young minds in the developing world towards these careers giving them the much-needed drive to study advanced sciences and arts in Europe, Asia and USA. Worldwide children are naturally curious but they are getting bored with instructional education methods and are more engaged by TV, Movies and the internet. We believe this is why most children go home, struggle to do their homework and then watch TV/ Movies, play games or browse the internet for the remaining hours of the day, most of which are distractions and a waste of time.</h4>  
                        
                        <h4 class=" fw-500 mb-4 lh-30 font-xsss text-black-500 mt-0"> We believe we can harness these mediums and bring them into the learning process; an entertaining research-based peer to peer learning designed to enforce the purpose and application of knowledge acquired from conventional subjects taught in classes. This drives creativity, self driven research, and gives the teachers another channel to use in engaging and driving the children’s focus in class and towards advanced disciplines in higher education.</h4>  
                    </div>
                    
                  
                </div>
            </div>
        </div>


      

        <div class="footer-wrapper layer-after bg-dark mt-0">
            <div class="container">
                <div class="row">
                    
                <div class="col-sm-6 text-left">
                        <ul class="d-flex align-items-center mt-2 float-left xs-mb-2">
                            <li class="mr-2"><a href="https://www.facebook.com/profile.php?id=100084077277628&mibextid=LQQJ4d" class="btn-round-md bg-facebook"><i class="font-xs ti-facebook text-white"></i></a></li>
                           
                            <!--<li class="mr-2"><a href="javascript:void(0)" class="btn-round-md bg-linkedin"><i class="font-xs ti-linkedin text-white"></i></a></li>-->
                            <li class="mr-2"><a href="https://instagram.com/curiouskidzng?igshid=YWJhMjlhZTc=" class="btn-round-md bg-instagram"><i class="font-xs ti-instagram text-white"></i></a></li>
                            <!--<li class="mr-2"><a href="javascript:void(0)" class="btn-round-md bg-pinterest"><i class="font-xs ti-pinterest text-white"></i></a></li>-->
                        </ul>
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