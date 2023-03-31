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
  

                <div class="how-to-work pb-lg--7 pt-5 pb-5 pt-lg--7">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="page-title style1 col-xl-6 col-lg-8 col-md-10 text-center mb-5">
                        <span class="font-xsssss fw-700 pl-3 pr-3 lh-32 text-uppercase rounded-xl ls-2 alert-danger d-inline-block text-danger mr-1">FAQ</span>
                        <h2 class="text-grey-900 fw-700 display1-size display2-md-size pb-3 mb-0 d-block mt-3">Frequently Asked Question</h2>
                        <!-- <p class="fw-300 font-xsss lh-28 text-grey-500">orem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dol ad minim veniam, quis nostrud exercitation</p> -->
                    </div>
                </div>

                <div class="row justify-content-center">
                    <div class="col-xl-8">
                        <div id="accordion" class="accordion">
                          <div class="card border-0 mb-4">
                            <div class="card-header bg-greylight" id="headingOne">
                              <h5 class="mb-0">
                                <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                What is CuriousKidz?
                                </button>
                              </h5>
                            </div>

                            <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion" style="">
                              <div class="card-body">
                                <p>CuriousKidz is a Digital library of educational video content designed to introduce children to basic or general knowledge, particularly in STEM or STEAM fields.</p>
                              </div>
                            </div>
                          </div>
                          <div class="card border-0 mb-4">
                            <div class="card-header bg-greylight" id="headingTwo">
                              <h5 class="mb-0">
                                <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                Where is your company based?
                                </button>
                              </h5>
                            </div>
                            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                              <div class="card-body">
                                <p>Our office is located in Lagos, Nigeria.</p>
                              </div>
                            </div>
                          </div>
                          <div class="card border-0 mb-4">
                            <div class="card-header bg-greylight" id="headingFour">
                              <h5 class="mb-0">
                                <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                Why use CuriousKidz?
                                </button>
                              </h5>
                            </div>

                            <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordion">
                              <div class="card-body">
                                <p>CuriousKidz help your children develop and widen their knowledge base across several disciplines and topics. We believe this is vital for creative problem solving and productive research and experimentation.</p>
                              </div>
                            </div>
                          </div>
                          <div class="card border-0 mb-4">
                            <div class="card-header bg-greylight" id="headingFive">
                              <h5 class="mb-0">
                                <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                                Who can use CuriousKidz?
                                </button>
                              </h5>
                            </div>

                            <div id="collapseFive" class="collapse" aria-labelledby="headingFive" data-parent="#accordion">
                              <div class="card-body">
                                <p>This platform was originally designed and organized for children between ages 6 to 17, but the video library can be used by anyone.</p>
                              </div>
                            </div>
                          </div>
                          <div class="card border-0 mb-4">
                            <div class="card-header bg-greylight" id="headingSix">
                              <h5 class="mb-0">
                                <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
                                Can schools use CuriousKidz to educate their children?
                                </button>
                              </h5>
                            </div>

                            <div id="collapseSix" class="collapse" aria-labelledby="headingSix" data-parent="#accordion">
                              <div class="card-body">
                                <p>Yes. Schools are especially advised to use this portal to increase the knowledge base of their children to make explanations much easier.</p>
                              </div>
                            </div>
                          </div>
                          <div class="card border-0 mb-4">
                            <div class="card-header bg-greylight" id="headingThree">
                              <h5 class="mb-0">
                                <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                Where did this content come from? 
                                </button>
                              </h5>
                            </div>
                            <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
                              <div class="card-body">
                                <p>This educational videos are produced by YouTube content creators from around world carefully selected by our team for your children.</p>
                              </div>
                            </div>
                          </div>



                          <div class="card border-0 mb-4">
                            <div class="card-header bg-greylight" id="headingThree">
                              <h5 class="mb-0">
                                <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseWEW" aria-expanded="false" aria-controls="collapseWEW">
                                Why these contents?
                                </button>
                              </h5>
                            </div>
                            <div id="collapseWEW" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
                              <div class="card-body">
                                <p>Our educational experts assess all available educational videos on YouTube by quality of audio/video, time range, accuracy of knowledge, relevance of knowledge etc before selection.</p>
                              </div>
                            </div>
                          </div>


                          <div class="card border-0 mb-4">
                            <div class="card-header bg-greylight" id="headingThree">
                              <h5 class="mb-0">
                                <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapsekjj" aria-expanded="false" aria-controls="collapsekjj">
                                What are the benefits of CuriousKidz?
                                </button>
                              </h5>
                            </div>
                            <div id="collapsekjj" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
                              <div class="card-body">
                                <p>CuriousKidz help children get a visual explanation of STEM discipline, visual explanation of how things are done or work, suggest home projects to children, influence YouTube algorithm suggest more educational content.</p>
                              </div>
                            </div>
                          </div>


                          <div class="card border-0 mb-4">
                            <div class="card-header bg-greylight" id="headingThree">
                              <h5 class="mb-0">
                                <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapsenjj" aria-expanded="false" aria-controls="collapsenjj">
                                What else can CuriousKidz do for my children?
                                </button>
                              </h5>
                            </div>
                            <div id="collapsenjj" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
                              <div class="card-body">
                                <p>Our algorithm helps to guide and map out your child’s knowledge interests and recommend career path in the STEM or STEAM fields.</p>
                              </div>
                            </div>
                          </div>


                          <div class="card border-0 mb-4">
                            <div class="card-header bg-greylight" id="headingThree">
                              <h5 class="mb-0">
                                <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseuuj" aria-expanded="false" aria-controls="collapseuuj">
                                How much does it cost to use CuriousKidz?
                                </button>
                              </h5>
                            </div>
                            <div id="collapseuuj" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
                              <div class="card-body">
                                <p>CuriousKidz is free to use for now, but you have to register as a user. Our primary objective is to bring a great deal of knowledge to as many children as possible.</p>
                              </div>
                            </div>
                          </div>


                          <div class="card border-0 mb-4">
                            <div class="card-header bg-greylight" id="headingThree">
                              <h5 class="mb-0">
                                <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapsejkhhj" aria-expanded="false" aria-controls="collapsejkhhj">
                                Can users discuss a topic of interest on the platform?
                                </button>
                              </h5>
                            </div>
                            <div id="collapsejkhhj" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
                              <div class="card-body">
                                <p>Yes. Curiouskidz allows a section to allow users to share their experiences with their project or experiment based on the video or help other users who have a question about the video.</p>
                              </div>
                            </div>
                          </div>


                          <div class="card border-0 mb-4">
                            <div class="card-header bg-greylight" id="headingThree">
                              <h5 class="mb-0">
                                <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseT" aria-expanded="false" aria-controls="collapseT">
                                How do I find the best videos for me?
                                </button>
                              </h5>
                            </div>
                            <div id="collapseT" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
                              <div class="card-body">
                                <p>CuriousKidz has a search filter designed to help you find engaging videos based on your age bracket and topic of interest.</p>
                              </div>
                            </div>
                          </div>


                          <div class="card border-0 mb-4">
                            <div class="card-header bg-greylight" id="headingThree">
                              <h5 class="mb-0">
                                <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapsehgfhj" aria-expanded="false" aria-controls="collapsehgfhj">
                                Can teachers use CuriousKidz?
                                </button>
                              </h5>
                            </div>
                            <div id="collapsehgfhj" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
                              <div class="card-body">
                                <p> Yes. This is a great tool to help teachers explain the use of the subject they teach in the real world. For example, when teaching mathematics, teachers can show aspects of engineering that the math method is used for.</p>
                              </div>
                            </div>
                          </div>



                        </div>
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