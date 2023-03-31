@extends('layouts.master')

@section('content')






        @if (session('success_contact'))
            <script type="text/javascript">
            Swal.fire(
              'Notification!!!',
			  '{{ session('success') }}',
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


        @if ($errors->has('email'))
        <script type="text/javascript">
            Swal.fire(
              'Error!',
              'The Email is already subscribed to our system',
              'error'
            )
            </script>
        @endif


        <div class="middle-sidebar-bottom">
                <div class="middle-sidebar-left">
                    <div class="row">
                        <div class="col-lg-12 mb-3">
                             <div class="card rounded-xxl p-lg--5 border-0 bg-no-repeat bg-image-contain banner-wrap" style="background-image: url('/pexels-ketut-subiyanto-4545766.jpg');">
                                <div class="card-body p-4">
                                    <h2 class="display3-size fw-400 display2-md-size sm-mt-7 sm-pt-10">Browse through our <b class="d-lg-block">Edutainment Video <br>Library</b></h2>   
                                     
                                  <h4 class="text-black-500 font-xssss fw-500 ml-1 lh-24">Join the EdTech. Platform and get access to our online learning <br>course tailored to your interest</h4>



                                    <form action="/searchEdu" method="POST" role="search">
                                        {{ csrf_field() }}
                                    <div class="form-group mt-lg-4 p-3 border-light border p-2 bg-white rounded-lg ">
                                        <div class="row">

                                        
                                            <div class="col-md-4">
                                                <div class="form-group icon-input mb-0">
                                                    <i class="ti-search font-xs text-grey-400"></i>
                                                    <input name="q" type="text" class="style1-input bg-transparent border-0 pl-5 font-xsss mb-0 text-grey-500 fw-500" placeholder="Search online courses..">
                                                </div>
                                            </div>

                                            <div class="col-md-6">

                                            <div class="row">
                                                <div class="form-group icon-input mb-0">
                                                    <i class="ti-package font-xs text-grey-400"></i>
                                                    <select class="style1-select bg-transparent border-0 pl-5" name="cat">
                                                    <option>search by category</option>
                                                    @foreach($getAllCat as $item)
                                                        <option value="{{$item->title}}">{{$item->title}}</option>
                                                    @endforeach
                                                    </select>
                                                </div>

                                                <div class="form-group icon-input mb-0">
                                                    <i class="ti-package font-xs text-grey-400"></i>
                                                    <select class="style1-select bg-transparent border-0 pl-5" name="ageGroup">

                                                        <option>search by age</option>
                                                         <option value="6-9">6-9</option>
                                                                        <option value="10-14">10-14</option>
                                                                        <option value="15-18">15-18</option>
                           
                                                    
                                                    </select>
                                                </div>
                                            </div>

                                            </div> 
                                            <div class="col-md-2">
                                                <button type="submit" class="w-100 d-block btn bg-current text-white font-xssss fw-600 ls-3 style1-input p-0 border-0 text-uppercase ">Search</button>
                                            </div>
                                        
                                        </div>
                                    </div>
                                    </form>
                                    <h4 class="text-black-500 font-xssss fw-500 ml-1 lh-24"> <b class="text-black-800 text-dark">Popular Search :</b> How to be a developer, How to an engineeer, how to draw ... </h4>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12 pt-2">
                            <h2 class="fw-400 font-lg">Explore <b>Categories</b></h2>
                        </div>

                        <div class="col-lg-12 mt-3">
                            <div class="owl-carousel category-card owl-theme overflow-hidden overflow-visible-xl nav-none">

                               @if(Auth::user()->roles == "guest")

                                    @foreach($getAllCatForGuest as $item)
    
                                    <div class="item">
                                        <div class="card cat-card-hover mr-1 w140 border-0 p-4 rounded-lg text-center" style="background-color: #fcf1eb;">
                                            <a href="/course/category/{{$item->title}}">
                                                <div class="card-body p-2 ml-2 ">
                                                    <span class="btn-round-xl bg-white"><img src="{{url ('uploads/category') }}/{{$item->image}}" alt="{{url ('uploads/category') }}/{{$item->image}}" class="p-2"></span>
                                                    <h4 class="fw-600 font-xsss mt-3 mb-0">{{$item->title}} 
                                                        <!-- <span class="d-block font-xsssss fw-500 text-grey-500 mt-2">{{ substr($item->description, 0,  10) }}</span> -->
                                                    </h4>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
    
                                    @endforeach
                                    
                                    
                                @else
                                
                                @foreach($getAllCat as $item)
    
                                    <div class="item">
                                        <div class="card cat-card-hover mr-1 w140 border-0 p-4 rounded-lg text-center" style="background-color: #fcf1eb;">
                                            
                                            @if($item->libraryGroup == "educational")
                                            <a href="/course/category/edu/{{$item->title}}">
                                            @else
                                                
                                                <a href="/course/category/{{$item->title}}">
                                                
                                            @endif
                                                
                                                <div class="card-body p-2 ml-2 ">
                                                    <span class="btn-round-xl bg-white"><img src="{{url ('uploads/category') }}/{{$item->image}}" alt="{{url ('uploads/category') }}/{{$item->image}}" class="p-2"></span>
                                                    <h4 class="fw-600 font-xsss mt-3 mb-0">{{$item->title}} 
                                                        <!-- <span class="d-block font-xsssss fw-500 text-grey-500 mt-2">{{ substr($item->description, 0,  10) }}</span> -->
                                                    </h4>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
    
                                    @endforeach
                                
                                
                                
                                @endif

                              

                                  
                            </div>
                        </div>

                       
                        

                        <div class="col-lg-12 pt-4 mb-3">
                            <h2 class="fw-400 font-lg d-block">Most <b> Watched Courses</b></h2>
                        </div>

                        <div class="col-lg-12 pt-2">
                        <div class="feedback-slider owl-carousel category-card owl-theme overflow-hidden dot-none right-nav pb-4 nav-xs-none">
                            @if(Auth::user()->roles == "guest")

                                    @foreach($mostwatchForGuest as $item)
                                        <div class="item">
                                            <div class="card course-card w300 p-0 shadow-xss border-0 rounded-lg overflow-hidden mr-1 mb-4">
                                                <div class="card-image w-70 mb-3">
        
                                                @if(Auth::user()->roles == "guest")
                                                    <a href="guest#" data-toggle="modal" data-target="#ModalGuest" class="video-bttn position-relative d-block">
                                                        <img src="{{$item->course_images}}" height="200" width="340" alt="Course image"  class="w-70">
                                                    </a>
                                                @else
                                                    <a href="/course/details/{{$item->course_id}}" class="video-bttn position-relative d-block">
                                                        <img src="{{$item->course_images}}" height="200" width="340" alt="Course image"  class="w-70">
                                                    </a>
                                                @endif
        
        
                                                </div>
                                                <div class="card-body pt-0">
                                                    <span class="font-xsssss fw-700 pl-3 pr-3 lh-32 text-uppercase rounded-lg ls-2 alert-warning d-inline-block text-warning mr-1">{{$item->course_cat}}</span>
                                                    <span class="font-xss fw-700 pl-3 pr-3 ls-2 lh-32 d-inline-block text-success float-right">
                                                        <!-- <span class="font-xsssss">$</span>  -->
                                                        Free</span>
                                                    <h4 class="fw-700 font-xss mt-3 lh-28 mt-0"><a href="/course/details/{{$item->course_id}}" class="text-dark text-grey-900">{{ substr($item->course_title, 0,  50) }}... </a></h4>
                                                   
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                            @else
                            
                            
                             @foreach($mostwatch as $item)
                                        <div class="item">
                                            <div class="card course-card w300 p-0 shadow-xss border-0 rounded-lg overflow-hidden mr-1 mb-4">
                                                <div class="card-image w-70 mb-3">
        
                                                @if(Auth::user()->roles == "guest")
                                                    <a href="guest#" data-toggle="modal" data-target="#ModalGuest" class="video-bttn position-relative d-block">
                                                        <img src="{{$item->course_images}}" height="200" width="340" alt="Course image"  class="w-70">
                                                    </a>
                                                @else
                                                    <a href="/course/details/{{$item->course_id}}" class="video-bttn position-relative d-block">
                                                        <img src="{{$item->course_images}}" height="200" width="340" alt="Course image"  class="w-70">
                                                    </a>
                                                @endif
        
        
                                                </div>
                                                <div class="card-body pt-0">
                                                    <span class="font-xsssss fw-700 pl-3 pr-3 lh-32 text-uppercase rounded-lg ls-2 alert-warning d-inline-block text-warning mr-1">{{$item->course_cat}}</span>
                                                    <span class="font-xss fw-700 pl-3 pr-3 ls-2 lh-32 d-inline-block text-success float-right">
                                                        <!-- <span class="font-xsssss">$</span>  -->
                                                        Free</span>
                                                    <h4 class="fw-700 font-xss mt-3 lh-28 mt-0"><a href="/course/details/{{$item->course_id}}" class="text-dark text-grey-900">{{ substr($item->course_title, 0,  50) }}... </a></h4>
                                                   
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                            
                            
                            
                            @endif

                           

                            </div>
                        </div>

               

                <br> <br>

                        
                             <div class="card d-block w-100 border-0 shadow-xss rounded-lg overflow-hidden p-lg-2">
                                <div class="card-body mb-lg-3 pb-0"><h2 class="fw-400 font-lg d-block">Recommended  <b>Courses</b> </h2></div>
                                <div class="card-body pb-0">
                                    <div class="row">
                                        
                                        
                                    @if(Auth::user()->roles == "guest")
                                    @foreach($getLatestCoursesForGuest as $item)
                                        <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 mb-4">
                                            <div class="card w-100 p-0 shadow-xss border-0 rounded-lg overflow-hidden mr-1">
                                                <div class="card-image w-100 mb-3">
                                                @if(Auth::user()->roles == "guest")
                                                    
                                                    
                                                     <a href="guest#" data-toggle="modal" data-target="#ModalGuest" class="video-bttn position-relative d-block">
                                                            <img src="{{$item->image}}" height="200" width="340" alt="Course image"  class="w-70">
                                                        </a>
                                                    
                                                    
                                                  
                                                    
                                                    
                                                @else
                                                
                                                 
                                                        <a href="/course/details/{{$item->course_id}}" class="video-bttn position-relative d-block">
                                                        <img src="{{$item->image}}"  height="200" width="340" alt="Course image"  class="w-70">
                                                    </a>
                                                  
                                                    
                                                @endif
                                                
                                                </div>
                                                <div class="card-body pt-0">
                                                    <span class="font-xsssss fw-700 pl-3 pr-3 lh-32 text-uppercase rounded-lg ls-2 alert-warning d-inline-block text-warning mr-1">{{$item->cat_id}}</span>
                                                    <span class="font-xss fw-700 pl-3 pr-3 ls-2 lh-32 d-inline-block text-success float-right"><span class="font-xsssss"></span> Free</span>
                                                    <h4 class="fw-700 font-xss mt-3 lh-28 mt-0"><a href="/course/details/{{$item->course_id}}" class="text-dark text-grey-900">{{ substr($item->title, 0,  50) }} </a></h4>
                                                   
                                                    
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                    
                                    
                                    @else
                                    
                                    
                                     @foreach($getCoursesBasedOnLibrary as $item)
                                        <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 mb-4">
                                            <div class="card w-100 p-0 shadow-xss border-0 rounded-lg overflow-hidden mr-1">
                                                <div class="card-image w-100 mb-3">
                                                @if(Auth::user()->roles == "guest")
                                                    <a href="guest#" data-toggle="modal" data-target="#ModalGuest" class="video-bttn position-relative d-block">
                                                        <img src="{{$item->image}}" height="200" width="340" alt="Course image"  class="w-70">
                                                    </a>
                                                @else
                                                    <a href="/course/details/{{$item->course_id}}" class="video-bttn position-relative d-block">
                                                        <img src="{{$item->image}}" height="200" width="340" alt="Course image"  class="w-70">
                                                    </a>
                                                @endif
                                                
                                                </div>
                                                <div class="card-body pt-0">
                                                    <span class="font-xsssss fw-700 pl-3 pr-3 lh-32 text-uppercase rounded-lg ls-2 alert-warning d-inline-block text-warning mr-1">{{$item->cat_id}}</span>
                                                    <span class="font-xss fw-700 pl-3 pr-3 ls-2 lh-32 d-inline-block text-success float-right"><span class="font-xsssss"></span> Free</span>
                                                    <h4 class="fw-700 font-xss mt-3 lh-28 mt-0"><a href="/course/details/{{$item->course_id}}" class="text-dark text-grey-900">{{ substr($item->title, 0,  50) }} </a></h4>
                                                   
                                                    
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                    
                                    
                                    @endif



                                    </div>  
                                </div>
                            </div>
                           
                      
                      
                      
                     
                                        
                        
                      <div class="col-lg-12 pt-0 mb-3">
                          <br>    
                            <h2 class="fw-400 font-lg d-block"><b>Testimonials </b></h2>
                        </div>
                        
                        <div class="col-lg-12 pt-2">
                            <div class="owl-carousel category-card owl-theme overflow-hidden overflow-visible-xl nav-none owl-loaded owl-drag">
                                

     
                                
                            <div class="owl-stage-outer"><div class="owl-stage" style="transform: translate3d(0px, 0px, 0px); transition: all 0s ease 0s; width: 1470px;">
                                
                                
                                 @foreach($testimonial as $item)
                                <div class="owl-item active" style="width: auto; margin-right: 10px;"><div class="item">
                                    <div class="card w200 d-block border-0 shadow-xss rounded-lg overflow-hidden mb-4">
                                        <div class="card-body position-relative h100 bg-gradiant-bottom bg-image-cover bg-image-center" style="background-image: url('/images/c-3.png');"></div>
                                        <div class="card-body d-block w-100 pl-4 pr-4 pb-4 text-center">
                                            
                                           
                                            @if($item->image == '')
                                            <figure class="avatar ml-auto mr-auto mb-0 mt--6 position-relative w75 z-index-1"><img src="/images/user-11.png" alt="image" height="50" width="50" class="float-right p-1 bg-white rounded-circle w-100" style="opacity: 1;"></figure>
                                            @else
                                            <figure class="avatar ml-auto mr-auto mb-0 mt--6 position-relative w75 z-index-1"><img src="/uploads/testimonial/{{$item->image}}" height="50" width="50"  alt="image" class="float-right p-1 bg-white rounded-circle w-100" style="opacity: 1;"></figure>
                                            

                                            @endif
                                            
                                            
                                            
                                          
                                            <div class="clearfix"></div>
                                            <h4 class="fw-700 font-xsss mt-3 mb-1">{{$item->title}} </h4>
                                            <p class="fw-500 font-xsssss text-grey-500 mt-0 mb-2">{{ substr($item->description, 0,  20) }}... </p>
                                           
                                        </div>
                                    </div>
                                </div></div>
                                 @endforeach
                                
                                
         
                                
                       
                                
                                
                                
                                
                                </div></div><div class="owl-nav"><button type="button" role="presentation" class="owl-prev disabled"><i class="ti-angle-left"></i></button><button type="button" role="presentation" class="owl-next"><i class="ti-angle-right"></i></button></div><div class="owl-dots disabled"></div></div>
                        </div>
                        
     
                
                        
                        
                
                
                <div class="middle-sidebar-right right-scroll-bar">
                    <div class="middle-sidebar-right-content">

                        <div class="card overflow-hidden subscribe-widget p-3 mb-3 rounded-xxl border-0">
                            <div class="card-body p-2 d-block text-center bg-no-repeat bg-image-topcenter" style="background-image: url('/images/user-pattern.png');">
                                <!-- <a href="default.html#" class="position-absolute right-0 mr-4" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="feather-edit text-grey-500 font-xs"></i></a> -->
                                <!-- <div class="dropdown-menu dropdown-menu-right p-4 rounded-xxl border-0 shadow-lg" aria-labelledby="dropdownMenu2">
                                    <div class="card-body p-0 d-flex">
                                        <i class="feather-bookmark text-grey-500 mr-3 font-lg"></i>
                                        <h4 class="fw-600 text-grey-900 font-xssss mt-0 mr-4">Save Link <span class="d-block font-xsssss fw-500 mt-1 lh-3 text-grey-500">Add this to your saved items</span></h4>
                                    </div>
                                    <div class="card-body p-0 d-flex mt-2">
                                        <i class="feather-alert-circle text-grey-500 mr-3 font-lg"></i>
                                        <h4 class="fw-600 text-grey-900 font-xssss mt-0 mr-4">Hide Post <span class="d-block font-xsssss fw-500 mt-1 lh-3 text-grey-500">Save to your saved items</span></h4>
                                    </div>
                                    <div class="card-body p-0 d-flex mt-2">
                                        <i class="feather-alert-octagon text-grey-500 mr-3 font-lg"></i>
                                        <h4 class="fw-600 text-grey-900 font-xssss mt-0 mr-4">Hide all from Group <span class="d-block font-xsssss fw-500 mt-1 lh-3 text-grey-500">Save to your saved items</span></h4>
                                    </div>
                                    <div class="card-body p-0 d-flex mt-2">
                                        <i class="feather-lock text-grey-500 mr-3 font-lg"></i>
                                        <h4 class="fw-600 mb-0 text-grey-900 font-xssss mt-0 mr-4">Unfollow Group <span class="d-block font-xsssss fw-500 mt-1 lh-3 text-grey-500">Save to your saved items</span></h4>
                                    </div>
                                </div> -->

                                @auth

                                @if(Auth::user()->roles == "student")
                                @if(Auth::user()->avatar == '')
                                <figure class="avatar ml-auto mr-auto mb-0 mt-2 w90"><img src="{{ url('auth/cdn/img/profiles/avatar.png') }}" alt="{{ url('auth/cdn/img/profiles/avatar-21.jpg') }}" class="float-right shadow-sm rounded-circle w-100"></figure>
                                   
                                @else
                                <figure class="avatar ml-auto mr-auto mb-0 mt-2 w90"><img src="/uploads/profilePicture/{{Auth::user()->avatar}}" alt="/uploads/profilePicture/{{Auth::user()->avatar}}" class="float-right shadow-sm rounded-circle w-100"></figure>
                                   
                                    
                                @endif
                                @endif

                                @if(Auth::user()->roles == "parent")
                                @if(Auth::user()->parentImage == '')
                                <figure class="avatar ml-auto mr-auto mb-0 mt-2 w90"><img src="{{ url('auth/cdn/img/profiles/avatar.png') }}" alt="{{ url('auth/cdn/img/profiles/avatar-21.jpg') }}" class="float-right shadow-sm rounded-circle w-100"></figure>
                                @else

                                <figure class="avatar ml-auto mr-auto mb-0 mt-2 w90"><img src="/uploads/profilePicture/{{Auth::user()->parentImage}}" alt="/uploads/profilePicture/{{Auth::user()->parentImage}}" class="float-right shadow-sm rounded-circle w-100"></figure>
                                
                                
                                @endif
                                @endif
                                @endauth
                              
                                <div class="clearfix"></div>
                                @auth
                                <h2 class="text-black font-xss lh-3 fw-700 mt-3 mb-1">{{Auth::user()->name}}</h2>
                                @endauth
                                <h4 class="text-grey-500 font-xssss mt-0"><span class="d-inline-block bg-success btn-round-xss m-0"></span> Available</h4>
                                <div class="clearfix"></div>
                                <!-- <div class="col-12 text-center mt-4 mb-2">
                                    <a href="message.html" class="p-0 ml-1 btn btn-round-md rounded-xl bg-lightblue"><i class="text-current ti-comment-alt font-sm"></i></a>
                                    <a href="login.html" class="p-0 ml-1 btn btn-round-md rounded-xl bg-lightblue"><i class="text-current ti-lock font-sm"></i></a>
                                    <a href="default.html#" class="p-0 btn p-2 lh-24 w100 ml-1 ls-3 d-inline-block rounded-xl bg-current font-xsssss fw-700 ls-lg text-white">FOLLOW</a>
                                </div> -->
                                <!-- <ul class="list-inline border-0 mt-4">
                                    <li class="list-inline-item text-center mr-4"><h4 class="fw-700 font-md">500+ <span class="font-xsssss fw-500 mt-1 text-grey-500 d-block">Connections</span></h4></li>
                                    <li class="list-inline-item text-center mr-4"><h4 class="fw-700 font-md">88.7 k <span class="font-xsssss fw-500 mt-1 text-grey-500 d-block">Follower</span></h4></li>
                                    <li class="list-inline-item text-center"><h4 class="fw-700 font-md">1,334 <span class="font-xsssss fw-500 mt-1 text-grey-500 d-block">Followings</span></h4></li>
                                </ul> -->

                                <!--<div class="col-12 pl-0 mt-4 text-left">-->
                                <!--    <h4 class="text-grey-800 font-xsss fw-700 mb-3 d-block">My Badges </h4>-->
                                <!--    <div class="carousel-card owl-carousel owl-theme overflow-visible nav-none">-->
                                <!--        <div class="item"><a href="default.html#" class="btn-round-xxxl border bg-greylight"><img src="images/download1.png" alt="icon" class="p-3"></a></div>-->
                                       
                                <!--    </div>-->
                                <!--</div>  -->

                            </div>
                        </div>



                        <div class="card theme-light-bg overflow-hidden rounded-xxl border-0 mb-3">
                            <div class="card-body d-flex justify-content-between align-items-end p-4">
                                <div>
                                    <h4 class="font-xsss text-grey-900 mb-2 d-flex align-items-center justify-content-between mt-2 fw-700">
                                        Dark Mode
                                    </h4>
                                </div>
                                <div class="custom-control custom-switch">
                                    <input type="checkbox" class="custom-control-input dark-mode-switch" id="darkmodeswitch">
                                    <label class="custom-control-label bg-success" for="darkmodeswitch"></label>
                                </div>

                            </div>
                        </div>


                        <!-- @auth
                        @if(Auth::user()->roles == "student" || Auth::user()->roles == "parent")
                        <div class="card theme-light-bg overflow-hidden rounded-xxl border-0 mb-3">
                            <div class="card-body d-flex justify-content-between align-items-end pl-4 pr-4 pt-4 pb-3">
                                <h4 class="fw-700 font-xsss">Watch Later</h4>
                               
                            </div>
                            <div class="card-body pl-4 pr-4 pt-0 pb-3 border-0 w-100 d-block">
                                <div class="row">

                                @foreach($getwatchLater as $item)
                                    <div class="col-3 p-0">
                                        <a href="default.html#" class="btn-round-lg rounded-lg bg-lightblue ml-3">
                                            <img src="images/download7.png" alt="icon" class="p-1 w-100">
                                        </a>  
                                    </div>
                                    <div class="col-9 pr-3">
                                        <h4 class="font-xssss d-block fw-700 mt-2">{{$item->title}}<span class="float-right mt-1 font-xsssss text-grey-500">87%</span></h4>
                                        <div class="progress mt-2 h5 w-100">
                                          <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="87" aria-valuemin="0" aria-valuemax="87" style="width: 87%"></div>
                                        </div>        
                                    </div>
                                </div>
                                @endforeach
                            </div>

         
                        </div>
                        @endif
                        @endauth -->


                        <div class="card overflow-hidden subscribe-widget p-3 mb-3 rounded-xxl border-0">
                            <div class="card-body d-block text-left">
                                <h1 class="text-grey-800 font-xl fw-900 mb-4 lh-3">Sign up for our newsletter</h1>
                                <form action="{{url('activate/newsletter')}}" class="mt-3" method="post">
                                @csrf

                                    <div class="form-group icon-input{{ $errors->has('password') ? ' is-invalid' : '' }}">
                                        <i class="ti-email text-grey-500 font-sm"></i>
                                        <input type="text" name="email" required autofocus class="form-control mb-2 bg-greylight border-0 style1-input pl-5" placeholder="Email address">
                                        @if ($errors->has('email'))
                                            <span class="invalid-feedback">
                                                <strong>{{ $errors->first('email') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" name="agree" type="checkbox" required id="blankCheckbox" value="option1" aria-label="">
                                        <label class="text-grey-500 font-xssss" for="blankCheckbox">By checking this box, you confirm that you have read and are agreeing to our terms of use regarding.</label>
                                    </div>
                                    <button  class="p-0 btn p-2 lh-24 w100 ml-1 ls-3 d-inline-block rounded-xl bg-current font-xsssss fw-700 ls-lg text-white" type="submit">Subscribe</button>
                                </form>
                                
                            </div>
                        </div>



                    </div>
                </div>

                @auth
                @if(Auth::user()->roles == "student" || Auth::user()->roles == "parent")
                <button class="btn btn-circle text-white btn-neutral sidebar-right">
                    <i class="ti-angle-left"></i>  
                </button>
                @endif
                @endauth
            </div>            




            
            
        
@endsection
