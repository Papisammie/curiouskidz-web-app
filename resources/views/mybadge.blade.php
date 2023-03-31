
@extends('layouts.master')

@section('content')

                            <div class="card d-block w-100 border-0 shadow-xss rounded-lg overflow-hidden p-lg-4 p-2">
                                <div class="card-body mb-lg-3 pb-0"><h2 class="fw-400 font-lg d-block">My <b>Badges</b> </h2></div>
                                <div class="card-body pb-0">
                                    <div class="row">


                                    <div class="col-xl-4 col-lg-6 col-md-6">
                                            <div class="card mb-4 d-block w-100 shadow-xss rounded-lg p-xxl-5 p-4 border-0 text-center">
                                               
                                                <a href="#!" class="btn-round-xxxl rounded-lg ml-auto mr-auto">
                                                    <img src="https://cdn-icons-png.flaticon.com/512/5928/5928444.png" alt="https://cdn-icons-png.flaticon.com/512/5928/5928444.png" class="w-100">
                                                </a>
                                                <h4 class="fw-700 font-xsss mt-4">Welcome to our Family Badge</h4>
                                                <p class="fw-500 font-xssss text-grey-500 mt-3">We value you. You are our hero. We appreciate your welcome</p>
                                                <div class="clearfix"></div>
                                                <!-- <div class="progress mt-3 h10">
                                                  <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%"></div>
                                                </div> -->
                                               
                                            </div>
                                        </div>

                                 
                                    @foreach($getUserGamification as $item)

                                    
                                        <div class="col-xl-4 col-lg-6 col-md-6">
                                            <div class="card mb-4 d-block w-100 shadow-xss rounded-lg p-xxl-5 p-4 border-0 text-center">
                                               
                                                <a href="#!" class="btn-round-xxxl rounded-lg ml-auto mr-auto">
                                                    <img src="/uploads/badges/{{$item->image}}" alt="/uploads/badges/{{$item->image}}" class="w-100">
                                                </a>
                                                <h4 class="fw-700 font-xsss mt-4">{{$item->title}}</h4>
                                                <p class="fw-500 font-xssss text-grey-500 mt-3">{{$item->description}}</p>
                                                <div class="clearfix"></div>
                                                <!-- <div class="progress mt-3 h10">
                                                  <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%"></div>
                                                </div> -->
                                               
                                            </div>
                                        </div>

                                    @endforeach
                                   
                                      
                                    </div>
                                </div>  
                            </div>
                       

@endsection



