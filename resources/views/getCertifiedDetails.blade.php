

@extends('layouts.master')

@section('content')

            <div class="middle-sidebar-bottom">
                <div class="middle-sidebar-left">
                    <div class="row">
                        <div class="col-xl-8 col-xxl-9">
                            <div class="card border-0 mb-0 rounded-lg overflow-hidden">
                                                          
                                    <iframe width="100%" height="480" src="https://www.youtube-nocookie.com/embed/{!! $getcourse->video_url !!}?controls=0;modestbranding=0;mode=opaque&amp;rel=0&amp;autohide=1&amp;showinfo=0&amp;wmode=transparent" frameborder="0" allow="accelerometer; clipboard-write; encrypted-media; gyroscope; picture-in-picture; modestbranding=0;mode=opaque&amp;rel=0&amp;autohide=1&amp;showinfo=0&amp;wmode=transparent" allowfullscreen></iframe>
      
                            </div>
                            <div class="card d-block border-0 rounded-lg overflow-hidden dark-bg-transparent bg-transparent mt-4 pb-3">
                                <div class="row">
                                    <div class="col-10"><h2 class="fw-700 font-md d-block lh-4 mb-2">{{$getcourse->title}}</h2></div>
                                   
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
                        <div class="col-xl-4 col-xxl-3 col-lg-4">
                        <div class="card overflow-hidden subscribe-widget p-3 mb-3 rounded-xxl border-0 shadow-xss">
                            <div class="card-body p-3 d-block text-left">
                                <!-- <h1 class="display1-size text-current fw-700 mb-4"> <span class="font-xssss text-grey-500 fw-500"> / Lifetime Access</span></h1> -->
                                 <h4 class="pl-35 mb-4 font-xsss fw-600 text-grey-900 position-relative"><i class="feather-shield font-lg text-current position-absolute left-0"></i> Country <span class="d-block text-grey-500 mt-1 font-xssss">Global </span></h4>
                                 <h4 class="pl-35 mb-4 font-xsss fw-600 text-grey-900 position-relative"><i class="feather-database font-lg text-current position-absolute left-0"></i> Language <span class="d-block text-grey-500 mt-1 font-xssss">English </span></h4>
                                 <h4 class="pl-35 mb-4 font-xsss fw-600 text-grey-900 position-relative"><i class="feather-home font-lg text-current position-absolute left-0"></i> Gender <span class="d-block text-grey-500 mt-1 font-xssss">All </span></h4>
                                 <h4 class="pl-35 mb-4 font-xsss fw-600 text-grey-900 position-relative"><i class="feather-shield font-lg text-current position-absolute left-0"></i> Education <span class="d-block text-grey-500 mt-1 font-xssss">All </span></h4>

                                 <button onclick="location.href='/germified/click/completed/{{ $getcourse->gamify_id }}'" class="btn btn-primary" onclick="enableButon();">Click to complete course </button>
                            </div>
                        </div>

                    </div>

                    </div>
                </div>
               
            </div> 

        
        


            @endsection







