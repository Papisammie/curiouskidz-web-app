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
    <link rel="stylesheet" href="/cdn/css/aos.min.css">

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
        <div class="header-wrapper pt-3 pb-3 shadow-none pos-fixed position-absolute">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 navbar pt-0 pb-0">
                         <a href="/"><h1 class="fredoka-font ls-3 fw-700 text-current font-xxl">CuriousKidz <span class="d-block font-xsssss ls-1 text-grey-500 open-font ">Online Learning Course</span></h1></a>
                        <!--<a href="/"> <img src="/curiouskidz.png" height="120" width="180"> </a>-->
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


        <div class="banner-wrapper bg-image-cover bg-image-bottomcenter" style="background-image: url('images/bg-layer.png');">
            <div class="container">
                <div class="row">
                    <div class="col-xl-6 col-lg-6 vh-lg--100 align-items-center d-flex sm-mt-7">
                        <div class="card w-100 border-0 bg-transparent d-block sm-mt-7">
                           
                            <h2 class="fw-700 text-grey-900 display4-size display4-lg-size display4-md-size lh-1 mb-0 os-init" data-aos="fade-up" data-aos-delay="300" data-aos-duration="400">Find a perfect Academic & Edutainment Courses </h2>
                            <h4 class=" fw-500 mb-4 lh-30 font-xsss text-grey-500 mt-3 os-init" data-aos="fade-up" data-aos-delay="400" data-aos-duration="400"> Join the EdTech. Platform and get access to our online learning  course tailored to your interest<br>
                            <a href="/register" class="btn mb-5 border-0 w200 bg-primary p-3 text-white fw-600 rounded-lg d-inline-block font-xssss btn-light mt-3 os-init" data-aos="fade-up" data-aos-delay="500" data-aos-duration="400">Join For Free</a></h4>
                        </div>
                    </div>
                    <div class="col-lg-6 align-items-center d-flex vh-lg--100 ">
                        <img src="/CuriousKidzNew.png" alt="/CuriousKidzNew.png" class="pt-5 d-none d-lg-block">
                    </div>
                </div>
            </div>
        </div>


        <div class="search-wrap position-relative" style="top:-50px; ">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 mb-4">
                        <div class="card rounded-lg p-3 border-0 bg-no-repeat bg-white shadow-lg">
                            <div class="card-body w-100 p-0">
                                <div class="form-group mt-0 p-2 mb-0 bg-white rounded-lg">

                                <form action="/search" method="POST" role="search">
                                        {{ csrf_field() }}
                                    <div class="row">
                                        <div class="col-lg-5">
                                            <div class="form-group icon-input mb-0">
                                                <i class="ti-search font-xs text-grey-400"></i>
                                                <input type="text" name="q" class="style1-input border-0 pl-5 font-xsss mb-0 text-grey-500 fw-500" placeholder="Search online courses..">
                                            </div>
                                        </div>

                                        <div class="col-lg-4">
                                            <div class="form-group icon-input mb-0">
                                                <i class="ti-package font-xs text-grey-400"></i>
                                                <select class="style1-select bg-transparent border-0 pl-5" name="cat">
                                                    <option>search by category</option>
                                                    @foreach($getAllCat as $item)
                                                        <option value="{{$item->title}}">{{$item->title}}</option>
                                                    @endforeach
                                                  </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <button type="submit" class="w-100 d-block btn bg-current text-white font-xssss fw-600 ls-3 style1-input p-0 border-0 text-uppercase ">Search</button>
                                        </div>
                                      
                                    </div>
                                    </form>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="category-wrapper pb-lg--7 pb-5">
            <div class="container">
                <div class="row">
                    <div class="page-title style1 col-xl-4 col-lg-4 col-md-6 text-left">
                        <h2 class="text-grey-900 fw-700 display1-size display2-md-size pb-3 mb-0 mt-1 d-block lh-3">Browse <br>     by Category</h2>
                      
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12 mt-4 ">
                        <div class="feedback-slider owl-carousel category-card owl-theme overflow-visible dot-none right-nav pb-4 nav-xs-none">


                        @foreach($getAllCat as $item)

                            <div class="item">
                                <div class="card mr-1 w140 border-0 p-4 rounded-lg text-center" style="background-color: #fcf1eb;">
                                    <div class="card-body p-2 ml-1 ">
                                        <a href="/course/category/{{$item->title}}" class="btn-round-xl bg-white"><img src="{{url ('uploads/category') }}/{{$item->image}}" alt="icon" class="p-2"></a>
                                        <h4 class="fw-600 font-xsss mt-3 mb-0">{{$item->title}}</h4>
                                    </div>
                                </div>
                            </div>

                        @endforeach

                
                              
                        </div>
                    </div>
                </div>
            </div>
        </div>

                <div class="container">
                  <div class="col-lg-12 pt-4 mb-3">
                            <h2 class="fw-400 font-lg d-block">Most <b> Watched Courses</b></h2>
                        </div>

                        <div class="col-lg-12 pt-2 check">
                        <div class="feedback-slider owl-carousel category-card owl-theme overflow-visible dot-none right-nav pb-4 nav-xs-none">
                            <!-- <div class="owl-carousel category-card owl-theme overflow-hidden overflow-visible-xl"> -->

                            @foreach($courses as $item)
                                <div class="item">
                                    <div class="card course-card w300 p-0 shadow-xss border-0 rounded-lg overflow-hidden mr-1 mb-4">
                                        <div class="card-image w-70 mb-3">
                                            <a href="/course/details/{{$item->course_id}}" class="video-bttn position-relative d-block"><img src="{{$item->course_images}}" width="150" height="200" alt="Course image"  class="w-70"></a>
                                        </div>
                                        <div class="card-body pt-0">
                                            <span class="font-xsssss fw-700 pl-3 pr-3 lh-32 text-uppercase rounded-lg ls-2 alert-warning d-inline-block text-warning mr-1">{{$item->course_cat}}</span>
                                            <span class="font-xss fw-700 pl-3 pr-3 ls-2 lh-32 d-inline-block text-success float-right">
                                                <!-- <span class="font-xsssss">$</span>  -->
                                                Free</span>
                                            <h4 class="fw-700 font-xss mt-3 lh-28 mt-0"><a href="/course/details/{{$item->course_id}}" class="text-dark text-grey-900">{{ substr($item->course_title, 0,  50) }} </a></h4>
                                          
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                           
                            
                            </div>
                            
                        </div>
                        </div>




        <div class="how-to-work pb-lg--7 pt-3">
            <div class="container">
                
            <div class="row">
                    <div class="page-title style1 col-xl-4 col-lg-4 col-md-6 text-left">
                        <h2 class="text-grey-900 fw-700 display1-size display2-md-size pb-3 mb-0 mt-1 d-block lh-3">Recommended <br> Courses</h2>
                      
                    </div>
                </div>
                <div class="tab-content">
                    <div class="tab-pane fade show active" id="navtabs1">
                        <div class="row">


                        @foreach($getLatestCourses as $item)
                            <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 mb-4">
                                <div class="card w-100 p-0 shadow-xss border-0 rounded-lg overflow-hidden mr-1 course-card">
                                    <div class="card-image w-100 mb-3">
                                        <a href="/course/details/{{$item->course_id}}" class="video-bttn position-relative d-block"><img src="{{$item->image}}" alt="{{$item->image}}" class="w-100"></a>
                                    </div>
                                    <div class="card-body pt-0">
                                        <span class="font-xsssss fw-700 pl-3 pr-3 lh-32 text-uppercase rounded-lg ls-2 alert-danger d-inline-block text-danger mr-1">{{$item->cat_id}}</span>
                                        <span class="font-xss fw-700 pl-3 pr-3 ls-2 lh-32 d-inline-block text-success float-right"><span class="font-xsssss"></span> Free</span>
                                        <h4 class="fw-700 font-xss mt-3 lh-28 mt-0"><a href="/course/details/{{$item->course_id}}" class="text-dark text-grey-900">{{ substr($item->title, 0,  50) }} </a></h4>
                                      
                                       
                                    </div>
                                </div>
                            </div>

                            @endforeach

                          
                        </div>
                    </div>

                  
                </div>
            </div>
        </div>
        
        
        
        
        <div class="popular-wrapper pb-0 pt-5">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 text-left mb-5 pb-0">
                        <h2 class="text-grey-800 fw-700 display1-size display2-md-size lh-2">Customers love what we do</h2>
                    </div>
                
                    <div class="col-lg-12">
                        <div class="feedback-slider owl-carousel owl-theme overflow-visible dot-none right-nav pb-4 nav-xs-none owl-loaded owl-drag">
                            

                            

                            

                            
                             
                        <div class="owl-stage-outer"><div class="owl-stage" style="transform: translate3d(-1890px, 0px, 0px); transition: all 0s ease 0s; width: 3780px;"><div class="owl-item cloned" style="width: 457.5px; margin-right: 15px;">
                            
                            
                             @foreach($mess as $item)
                            <div class="owl-items text-center">
                                <div class="card w-100 p-4 p-md--5 text-left border-0 shadow-xss rounded-lg">
                                    <div class="card-body pl-0 pt-0">
                                         @if($item->image == '')
                                        <img src="/images/user-11.png" alt="user" class="w45 float-left mr-3">
                                        @else
                                        <img src="/uploads/testimonial/{{$item->image}}" alt="user" class="w45 float-left mr-3">
                                        @endif
                                        
                                        
                                        <h4 class="text-grey-900 fw-700 font-xsss mt-0 pt-1">{{$item->title}}</h4>    
                                        <!--<h5 class="font-xssss fw-500 mb-1 text-grey-500">{{$item->title}}</h5>-->
                                    </div>
                                    <p class="font-xsss fw-400 text-grey-500 lh-28 mt-0 mb-0 ">{{$item->description}}</p>
                                   
                                </div>
                            </div></div>
                             @endforeach
                            
                            
                       
                            
                            
                            </div></div><div class="owl-nav"><button type="button" role="presentation" class="owl-prev"><i class="ti-angle-left"></i></button><button type="button" role="presentation" class="owl-next"><i class="ti-angle-right"></i></button></div><div class="owl-dots disabled"></div></div>
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
    <script src="/cdn/js/aos.min.js"></script>
    <script src="/cdn/js/scripts.js"></script>
    <script>
        AOS.init();
      </script>


</body>

</html>