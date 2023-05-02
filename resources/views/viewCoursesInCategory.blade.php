@extends('layouts.master')

@section('content')


                        <div class="card d-block w-100 border-0 shadow-xss rounded-lg overflow-hidden p-lg-2">
                                <div class="card-body mb-lg-3 pb-0"><h2 class="fw-400 font-lg d-block">{{$getCat->title}}  <b>Courses</b> </h2></div>
                                <div class="card-body pb-0">
                                    <div class="row">
                                        
                                        
                                    @foreach($getCourse as $item)
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
                                                    <h4 class="fw-700 font-xss mt-3 lh-28 mt-0"><a href="/course/details/{{$item->course_id}}" class="text-dark text-grey-900">{{ $item->title}} </a></h4>
                                                   
                                                    
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach


                                    {{-- Pagination --}}
                                    <!--<div class="d-flex justify-content-center">-->
                                    <!--    {!! $getCourse->links() !!}-->
                                    <!--</div>-->
                                    
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


               

@endsection