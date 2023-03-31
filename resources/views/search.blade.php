@extends('layouts.master')

@section('content')

               
             
                    <div class="card-body pb-0">
                                    <div class="row">
                                          @foreach($course as $item)
                        <div class="col-xl-4 col-xxxl-3 col-lg-6 col-md-6 col-sm-6 mb-4">  
                      
                            
                            <div class="card w-100 p-0 shadow-xss border-0 rounded-lg overflow-hidden mr-1 course-card">
                                
                                <div class="card-image w-100 mb-3">
                                    <a href="/course/details/{{$item->course_id}}" class="video-bttn position-relative d-block"><img src="{{$item->image}}" height="200" width="340" alt="Course Image" class="w-100"></a>
                                </div>
                                <div class="card-body pt-0">
                                    <span class="font-xsssss fw-700 pl-3 pr-3 lh-32 text-uppercase rounded-lg ls-2 alert-warning d-inline-block text-warning mr-1">{{$item->cat_id}}</span>
                                    <span class="font-xss fw-700 pl-3 pr-3 ls-2 lh-32 d-inline-block text-success float-right"><span class="font-xsssss"></span> Free</span>
                                    <h4 class="fw-700 font-xss mt-3 lh-28 mt-0"><a href="/course/details/{{$item->course_id}}" class="text-dark text-grey-900">{{$item->title}} </a></h4>
                                    
                                </div>
                                
                            </div>
                            
                             
                        </div>
                        @endforeach
                        </div>
                        </div>
                

@endsection