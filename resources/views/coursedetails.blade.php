

@extends('layouts.master')

@section('content')

            <div class="middle-sidebar-bottom">
                <div class="middle-sidebar-left">
                    <div class="row">
                        <div class="col-xl-8 col-xxl-9">
                            <div class="card border-0 mb-0 rounded-lg overflow-hidden">
                            
                            @if(Auth::user()->roles == "guest")


                            <center><img height="300" width="300" src="https://cdn-icons-png.flaticon.com/512/7388/7388163.png"><p></p></center>

                            @else
                                    @if($getcourse->type == "mp4")
                                        <div class="player shadow-none">
                                            <video id='video' src='{{$getcourse->video_url}}' playsinline></video>
                                            <div class='play-btn-big'></div>
                                                <div class='controls'>
                                                    <div class="time"><span class="time-current"></span><span class="time-total"></span></div>
                                                <div class='progress'>
                                                    <div class='progress-filled'></div>
                                                </div>
                                                <div class='controls-main'>
                                                    <div class='controls-left'>
                                                        <div class='volume'>
                                                            <div class='volume-btn loud mt-1'>
                                                                <i class="feather-volume-1 font-xl text-white"></i>
                                                            </div>
                                                            <div class='volume-slider'>
                                                                <div class='volume-filled'></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class='play-btn paused'></div>
                                                    <div class="controls-right">
                                                        <div class='speed'>
                                                            <ul class='speed-list'>
                                                                <li class='speed-item' data-speed='0.5'>0.5x</li>
                                                                <li class='speed-item' data-speed='0.75'>0.75x</li>
                                                                <li class='speed-item active' data-speed='1'>1x</li>
                                                                <li class='speed-item' data-speed='1.5'>1.5x</li>
                                                                <li class='speed-item' data-speed='2'>2x</li>
                                                            </ul>
                                                        </div>
                                                        <div class='fullscreen'>
                                                            <svg width="30" height="22" viewBox="0 0 30 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M0 0V-1.5H-1.5V0H0ZM0 18H-1.5V19.5H0V18ZM26 18V19.5H27.5V18H26ZM26 0H27.5V-1.5H26V0ZM1.5 6.54545V0H-1.5V6.54545H1.5ZM0 1.5H10.1111V-1.5H0V1.5ZM-1.5 11.4545V18H1.5V11.4545H-1.5ZM0 19.5H10.1111V16.5H0V19.5ZM24.5 11.4545V18H27.5V11.4545H24.5ZM26 16.5H15.8889V19.5H26V16.5ZM27.5 6.54545V0H24.5V6.54545H27.5ZM26 -1.5H15.8889V1.5H26V-1.5Z" transform="translate(2 2)" fill="white"/>
                                                            </svg>
                                                        </div>
                                                    </div>
                                                

                                            </div>
                                        </div>
                                        </div>
                                    @else

                                    <iframe width="100%" height="480" src="https://www.youtube-nocookie.com/embed/{!! $getcourse->video_url !!}?controls=0;modestbranding=0;mode=opaque&amp;rel=0&amp;autohide=1&amp;showinfo=0&amp;wmode=transparent" frameborder="0" allow="accelerometer; clipboard-write; encrypted-media; gyroscope; picture-in-picture; modestbranding=0;mode=opaque&amp;rel=0&amp;autohide=1&amp;showinfo=0&amp;wmode=transparent" allowfullscreen></iframe>


                                    @endif
                            @endif

                          

                                        
                            </div>
                            <div class="card d-block border-0 rounded-lg overflow-hidden dark-bg-transparent bg-transparent mt-4 pb-3">
                                <div class="row">
                                    <div class="col-10"><h2 class="fw-700 font-md d-block lh-4 mb-2">{{$getcourse->title}}</h2></div>
                                    <div class="col-2">
                                  
                                    <a href="#!" class="btn-round-md ml-0 d-inline-block float-right rounded-lg bg-greylight" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="feather-share-2 font-sm text-grey-700"></i>
                                        </a>
                                        <br> <br>

                                        @if($watch)
                                        <a class="btn-round-md ml-5 d-inline-block float-right rounded-lg bg-greylight bg-success"><i class="feather-bookmark font-sm text-grey-700"></i></a>
                                        @else
                                        <a href="/watch/later/{{$getcourse->course_id}}" class="btn-round-md ml-3 d-inline-block float-right rounded-lg bg-greylight"><i class="feather-bookmark font-sm text-grey-700"></i></a>
                                        @endif
                                        
                                       
                                       
                                        <div class="dropdown-menu dropdown-menu-right p-3 border-0 shadow-xss" aria-labelledby="dropdownMenu2">
                                            <ul class="d-flex align-items-center mt-0 float-left">
                                                <li class="mr-2"><h4 class="fw-600 font-xss text-grey-900  mt-2 mr-3">Share: </h4></li>
                                                <li class="mr-2"><a href="https://www.facebook.com/sharer/sharer.php?u=YourPageLink.com&display=popup" class="btn-round-md bg-facebook"><i class="font-xs ti-facebook text-white"></i></a></li>
                                                <li class="mr-2"><a href="https://www.facebook.com/sharer/sharer.php?u=YourPageLink.com&display=popup" class="btn-round-md bg-twiiter"><i class="font-xs ti-twitter-alt text-white"></i></a></li>
                                                <li class="mr-2"><a href="https://www.facebook.com/sharer/sharer.php?u=YourPageLink.com&display=popup" class="btn-round-md bg-linkedin"><i class="font-xs ti-linkedin text-white"></i></a></li>
                                                <li class="mr-2"><a href="https://www.facebook.com/sharer/sharer.php?u=YourPageLink.com&display=popup" class="btn-round-md bg-instagram"><i class="font-xs ti-instagram text-white"></i></a></li>
                                                <!-- <li class="mr-2"><a href="default-course-details.html#" class="btn-round-md bg-pinterest"><i class="font-xs ti-pinterest text-white"></i></a></li> -->
                                            </ul>
                                        </div>
                                    </div>
                                </div>

                            
                                <span class="dot ml-2 mr-2 d-inline-block btn-round-xss bg-grey"></span>
                                <span class="font-xssss fw-700 text-grey-900 d-inline-block ml-0 text-dark">{{$getcourse->author}}</span>
                            </div>


                          

                            <div class="card d-block border-0 rounded-lg overflow-hidden p-4 shadow-xss mt-4 alert-success">
                                <h2 class="fw-700 font-sm mb-3 mt-1 pl-1 text-success mb-4">What you'll learn from this lesson</h2>
                               
                                <h4 class="font-xssss fw-600 text-grey-600 mb-3 pl-30 position-relative lh-24"><i class="ti-check font-xssss btn-round-xs bg-success text-white position-absolute left-0 top-5"></i>{!! $getcourse->description!!}</h4>
                               

                            </div>

                            <!-- <div class="card d-block border-0 rounded-lg overflow-hidden p-4 shadow-xss mt-4">
                                <h2 class="fw-700 font-sm mb-3 mt-1 pl-1 mb-3">Description</h2>
                                <p class="font-xssss fw-500 lh-28 text-grey-600 mb-0 pl-2">After creating more than a dozen courses on Microsoft Access databases and programming in VBA, many students have contacted me with discussions on specific problems and scenarios.  From these discussions, I have created videos reviewing the details of the most useful techniques that everyone will eventually need.  I have made sure that every detail of these techniques is recorded in the videos!  BUT you should be somewhat familiar with VBA since there are lots of coding examples in the course. <br>                                        There are MANY tips and tricks in this workshop that you will not find an ANY of my other courses! <br>  I also include a specific database design challenge from a student and then go over the details of how I would handle it. <br> If you are willing to take the time to go through this course you could easily be much more productive with Microsoft Access in just a few hours! </p>
                            </div> -->

                            <div class="card d-block border-0 rounded-lg overflow-hidden p-4 shadow-xss mt-4 mb-5">
                                <h2 class="fw-700 font-sm mb-3 mt-1 pl-1 mb-3">Requirements</h2>
                                <p class="font-xssss fw-500 lh-28 text-grey-600 mb-0 pl-2">{!! $getcourse->requirements!!}</p>
                               
                            </div>








                        
                        </div>





                        




                        <div class="col-xl-4 col-xxl-3">
                            <div class="card w-100 d-block chat-body p-0 border-0 shadow-xss rounded-lg mb-3 position-relative">
                                <div class="messages-content scroll-bar p-3">
                                <small style="color:blue">Messages can be seen only by students studying the course</small>
                            @if($getUserChat)
                                    @foreach($getUserChat as $item)
                                    <div class="message-item">
                                        <div class="message-user">
                                            <!-- <figure class="avatar">
                                                <img src="/images/user-9.png" alt="image">
                                            </figure> -->
                                            <div>
                                                <h5 class="font-xssss mt-2"></h5>
                                                <div class="time">{{ $item->created_at->diffForHumans() }}</div>
                                            </div>
                                        </div>
                                        <div class="message-wrap shadow-none">{{ $item->message }}</div>
                                    </div>
                                    @endforeach

                            @endif

                         
                               

                                    </div>
                                <form enctype="multipart/form-data" action="/reply/{{$getcourse->course_id}}" method="post">
                                                @csrf
                                                   

                                                <div class="input-group">
                                                <input class="form-control" name="message" id="kt_docs_tinymce_basic"  placeholder="Type a message"><br>
                                                       
                                                            
                                                <button class="btn btn-success" type="submit" data-kt-element="send">Send Reply</button>
                                                </div>
                                                </form>
                                                </div>
                            
                        </div>

                    </div>
                </div>
               
            </div> 

          









                       <div class="col-lg-12 pt-4 mb-3">
                            <h2 class="fw-400 font-lg d-block">Related <b> Courses</b></h2>
                        </div>

                        <div class="col-lg-12 pt-2">
                            <div class="owl-carousel category-card owl-theme overflow-hidden overflow-visible-xl nav-none">

                            

                            @foreach($related as $item)
                                <div class="item">
                                    <div class="card course-card w300 p-0 shadow-xss border-0 rounded-lg overflow-hidden mr-1 mb-4">
                                        <div class="card-image w-100 mb-3">
                                            <a href="/course/details/{{$item->course_id}}" class="video-bttn position-relative d-block"><img src="/uploads/course/{{$item->image}}" alt="Course image" class="w-100"></a>
                                        </div>
                                        <div class="card-body pt-0">
                                            <span class="font-xsssss fw-700 pl-3 pr-3 lh-32 text-uppercase rounded-lg ls-2 alert-warning d-inline-block text-warning mr-1">{{$item->cat_id}}</span>
                                            <span class="font-xss fw-700 pl-3 pr-3 ls-2 lh-32 d-inline-block text-success float-right">
                                                <!-- <span class="font-xsssss">$</span>  -->
                                                Free</span>
                                            <h4 class="fw-700 font-xss mt-3 lh-28 mt-0"><a href="/course/details/{{$item->course_id}}" class="text-dark text-grey-900">{{$item->title}} </a></h4>
                                            
                                        </div>
                                    </div>
                                </div>
                              
                            @endforeach
                           

                            </div>
                        </div>




            @endsection







