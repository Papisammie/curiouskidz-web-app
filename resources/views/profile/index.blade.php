@extends('layouts.master')

@section('content')

         
            <div class="middle-sidebar-bottom">
                <div class="middle-sidebar-left">

                @if(Auth::user()->roles == "student" || Auth::user()->roles == "guest")
                    @if(Auth::user()->avatar == '')
                    <div class="card d-block w-100 border-0 shadow-xss rounded-lg overflow-hidden mb-3" style="background-image: url('/images/bb-16.png');">
                    @else
                    <div class="card d-block w-100 border-0 shadow-xss rounded-lg overflow-hidden mb-3" style="background-image: url('/uploads/profilePicture/{{Auth::user()->avatar}}');">
                    @endif
                @endif




                @if(Auth::user()->roles == "parent")
                    @if(Auth::user()->parentImage == '')
                    <div class="card d-block w-100 border-0 shadow-xss rounded-lg overflow-hidden mb-3" style="background-image: url('/images/bb-16.png');">
                    @else
                    <div class="card d-block w-100 border-0 shadow-xss rounded-lg overflow-hidden mb-3" style="background-image: url('/uploads/profilePicture/{{Auth::user()->parentImage}}');">
                    @endif

                @endif


                <div class="card-body p-lg-5 p-4 bg-black-08">
                            <div class="clearfix"></div>
                            <div class="row">
                 @if(Auth::user()->roles == "student" || Auth::user()->roles == "guest")
                        

                            @if(Auth::user()->avatar == '')
                            <div class="col-lg-12 pl-xl-5 pt-xl-5">
                                    <figure class="avatar ml-0 mb-4 position-relative w100 z-index-1"><img src="{{ url('auth/cdn/img/profiles/avatar.png') }}" alt="image" class="float-right p-1 bg-white rounded-circle w-100"></figure>
                                    
                                </div>
                                          
                            @else
                            <div class="col-lg-12 pl-xl-5 pt-xl-5">
                                    <figure class="avatar ml-0 mb-4 position-relative w100 z-index-1"><img src="{{ url('/uploads/profilePicture') }}/{{Auth::user()->avatar}}" alt="image" class="float-right p-1 bg-white rounded-circle w-100"></figure>
                                    
                                </div>
                                       
                            @endif
                @endif



                @if(Auth::user()->roles == "parent")
                            @if(Auth::user()->parentImage == '')
                           

                            <div class="col-lg-12 pl-xl-5 pt-xl-5">
                                    <figure class="avatar ml-0 mb-4 position-relative w100 z-index-1"><img src="{{ url('auth/cdn/img/profiles/avatar.png') }}" alt="image" class="float-right p-1 bg-white rounded-circle w-100"></figure>
                                    
                                </div>
                                          
                            @else

                            <div class="col-lg-12 pl-xl-5 pt-xl-5">
                                    <figure class="avatar ml-0 mb-4 position-relative w100 z-index-1"><img src="{{ url('/uploads/profilePicture') }}/{{Auth::user()->parentImage}}" alt="image" class="float-right p-1 bg-white rounded-circle w-100"></figure>
                                    
                                </div>


                          

                            @endif
                @endif
                               


                            
                             
                                <div class="col-xl-4 col-lg-6 pl-xl-5 pb-xl-5 pb-3">
                                    
                                    <h4 class="fw-700 font-md text-white mt-3 mb-1">{{$getUser->name}} <i class="ti-check font-xssss btn-round-xs bg-success text-white ml-1"></i></h4>

                                    @if(Auth::user()->roles == "student")
                                    <span class="font-xssss fw-600 text-grey-500 d-inline-block ml-0">Student </span>
                                    <span class="dot ml-2 mr-2 d-inline-block btn-round-xss bg-grey"></span>
                                    @endif
                                    
                                     @if(Auth::user()->roles == "guest")
                                     <span class="font-xssss fw-600 text-grey-500 d-inline-block ml-0">Guest </span>
                                    <span class="dot ml-2 mr-2 d-inline-block btn-round-xss bg-grey"></span>
                                    
                                     
                                     @endif

                                   
                                  
                                </div>
                                <div class="col-xl-4 col-lg-6 d-block">
                                    <h2 class="display5-size text-white fw-700 lh-1 mr-3">0 <i class="feather-arrow-up-right text-success font-xl"></i></h2>
                                    <h4 class="text-white font-sm fw-600 mt-0 lh-3">Your learning awards count! </h4>

                                </div>

                                @if(Auth::user()->roles == "parent")
                                <div class="col-xl-4 col-lg-6 d-block">
                                    <h2 class="display5-size text-white fw-700 lh-1 mr-3">

                                        @if(Auth::user()->how_many_kids)

                                            {{Auth::user()->how_many_kids}}

                                        @else

                                        0
                                        @endif
                                    
                              
                                        <i class="feather-arrow-up-right text-success font-xl"></i></h2>
                                    <h4 class="text-white font-sm fw-600 mt-0 lh-3">Number of Kids </h4>

                                </div>
                                @endif
                                

                                
                               

                        </div>
                    </div>
                   
                   
                            <div class="card d-block w-100 border-0 shadow-xss rounded-lg overflow-hidden p-lg-4 p-2">
                               

                                	<!--begin::Main-->
        <div class="app-main flex-column flex-row-fluid" id="kt_app_main">
						<!--begin::Content wrapper-->
						<div class="d-flex flex-column flex-column-fluid">
							<!--begin::Toolbar-->
							<div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
								<!--begin::Toolbar container-->
								<div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack">
									<!--begin::Page title-->
									<div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
										<!--begin::Title-->
										<h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">Edit profile</h1>
										<!--end::Title-->
										
									</div>
									<!--end::Page title-->
									
								</div>
								<!--end::Toolbar container-->
							</div>
							<!--end::Toolbar-->
							<!--begin::Content-->
							<div id="kt_app_content" class="app-content flex-column-fluid">
								<!--begin::Content container-->
								<div id="kt_app_content_container" class="app-container container-xxl">
									<!--begin::Form-->


									
										

										<!--begin::Main column-->
										<div class="d-flex flex-column flex-row-fluid gap-7 gap-lg-12">
										


                                        @if(Auth::user()->roles== "student")

                                                        <form class="form" enctype="multipart/form-data" method="POST" action="/updateProfile/student/{{$getUser->id}}">
                                                            @csrf

                                                                <!--begin::Input group-->
                                                                <div class="row mb-6">
                                                                    <!--begin::Label-->
                                                                    <label class="col-lg-4 col-form-label required fw-semibold fs-6">Upload Profile Picture</label>
                                                                    <!--end::Label-->
                                                                    <!--begin::Col-->
                                                                    <div class="row mb-6">
                                                                        <!--begin::Image input-->
                                                                       
                                                                                <!--begin::Inputs-->
                                                                                <input type="file" name="avatar" accept=".png, .jpg, .jpeg" />
                                                                                
                                                                        </div>
                                                                       
                                                                    </div>


                                                                    
                                                               
                                                                <br>

                                                                 <!--begin::Input group-->
                                                                 <div class="row mb-6">
                                                                    <!--begin::Label-->
                                                                    <label class="col-lg-4 col-form-label required fw-semibold fs-6">Full Name</label>
                                                                    <!--end::Label-->
                                                                    <!--begin::Col-->
                                                                    <div class="col-lg-8 fv-row">
                                                                        <input type="text" value="{{Auth::user()->name}}" readonly class="form-control form-control-lg form-control-solid" placeholder="Store Name"  />
                                                                    </div>
                                                                    <!--end::Col-->
                                                                </div>
                                                                <!--end::Input group-->

                                                                <br>
                                                                  <!--begin::Input group-->
                                                                  <div class="row mb-6">
                                                                    <!--begin::Label-->
                                                                    <label class="col-lg-4 col-form-label required fw-semibold fs-6">Email</label>
                                                                    <!--end::Label-->
                                                                    <!--begin::Col-->
                                                                    <div class="col-lg-8 fv-row">
                                                                        <input type="email" value="{{Auth::user()->email}}" readonly  class="form-control form-control-lg form-control-solid" placeholder="Store Name"  />
                                                                    </div>
                                                                    <!--end::Col-->
                                                                </div>
                                                                <!--end::Input group-->
                                                                 <br>

                                                                   <!--begin::Input group-->
                                                                <div class="row mb-6">
                                                                <!--begin::Label-->
                                                                <label class="col-lg-4 col-form-label fw-semibold fs-6">My Age Group</label>
                                                                <!--end::Label-->
                                                                <!--begin::Col-->
                                                                <div class="col-lg-8 fv-row">
                                                                <p>Selected Age group: <a class="btn btn-success btn-sm">{{Auth::user()->class ?? "No Age Group Selected"}}</a> </p>
                                                                <select name="class" class="form-control form-control-lg form-control-solid">
                                                                        <option selected>Select Age Group</option>
                                                                        <option value="6-9">6-9</option>
                                                                        <option value="10-14">10-14</option>
                                                                        <option value="15-18">15-18</option>
                                                                    </select>
                                                                </div>
                                                                <!--end::Col-->
                                                                </div>
                                                                <!--end::Input group-->

                                                                    <br>



                                                                    <div class="row mb-6">
                                                                <!--begin::Label-->
                                                                <label class="col-lg-4 col-form-label fw-semibold fs-6">My Academic Class</label>
                                                                <!--end::Label-->
                                                                <!--begin::Col-->
                                                                <div class="col-lg-8 fv-row">
                                                                    <p>Selected Class: <a class="btn btn-success btn-sm">

                                                                    @if(Auth::user()->classGroup == "pry1")

                                                                    {{"Primary 1" ?? "No Class Group Selected"}}
                                                                    @elseif(Auth::user()->classGroup == "pry2")

                                                                    {{"Primary 2" ?? "No Class Group Selected"}}
                                                                    @elseif(Auth::user()->classGroup == "pry3")
                                                                    {{"Primary 3" ?? "No Class Group Selected"}}

                                                                    @elseif(Auth::user()->classGroup == "pry4")
                                                                    {{"Primary 4" ?? "No Class Group Selected"}}

                                                                    @elseif(Auth::user()->classGroup == "pry5")
                                                                    {{"Primary 5" ?? "No Class Group Selected"}}

                                                                    @else
                                                                      No Class Group Selected
                                                                    @endif
                                                                        
                                                                    </a> </p>
                                                                    <select name="classGroup" class="form-control form-control-lg form-control-solid">
                                                                        <option selected>Select Academic Class</option>
                                                                        <option value="pry1">Primary 1</option>
                                                                        <option value="pry2">Primary 2</option>
                                                                        <option value="pry3">Primary 3</option>
                                                                        <option value="pry4">Primary 4</option>
                                                                        <option value="pry5">Primary 5</option>
                                                                        <option value="JSS1">JSS 1</option>
                                                                        <option value="JSS2">JSS 2</option>
                                                                        <option value="JSS3">JSS 3</option>
                                                                        <option value="SS1">SS 1</option>
                                                                        <option value="SS2">SS 2</option>
                                                                        <option value="SS3">SS 3</option>
                                                                        
                                                                    </select>
                                                                   
                                                                </div>
                                                                <!--end::Col-->
                                                                </div>
                                                                <!--end::Input group-->

                                                                    <br>

                                                                     <!--begin::Input group-->
                                                                 <div class="row mb-6">
                                                                    <!--begin::Label-->
                                                                    <label class="col-lg-4 col-form-label required fw-semibold fs-6">Name of School</label>
                                                                    <!--end::Label-->
                                                                    <!--begin::Col-->
                                                                    <div class="col-lg-8 fv-row">
                                                                        <input type="text" value="{{Auth::user()->nameOfSchool}}" name="nameOfSchool" class="form-control form-control-lg form-control-solid" placeholder="Name of School"  />
                                                                    </div>
                                                                    <!--end::Col-->
                                                                </div>
                                                                <!--end::Input group-->

                                                                <br>


                                                              

                                                                 <!--begin::Actions-->
                                                            <div class="card-footer d-flex justify-content-end py-6 px-9">
                                                                <!-- <button type="reset" class="btn btn-light btn-active-light-primary me-2">Discard</button> -->
                                                                <button type="submit" class="btn btn-primary">Save Changes</button>
                                                            </div>
                                                            <!--end::Actions-->
                                                        </form>
                                                        <!--end::Form-->


                                        @endif







                                        @if(Auth::user()->roles== "parent")
                                        <form class="form" enctype="multipart/form-data" method="POST" action="/updateProfile/parent/{{$getUser->id}}">
                                                            @csrf

                                                                <!--begin::Input group-->
                                                                <div class="row mb-6">
                                                                    <!--begin::Label-->
                                                                    <label class="col-lg-4 col-form-label required fw-semibold fs-6">Upload Profile Picture</label>
                                                                    <!--end::Label-->
                                                                    <!--begin::Col-->
                                                                    <div class="row mb-6">
                                                                        <!--begin::Image input-->
                                                                       
                                                                                <!--begin::Inputs-->
                                                                                <input type="file" name="parentImage" accept=".png, .jpg, .jpeg" />
                                                                                
                                                                        </div>
                                                                       
                                                                    </div>


                                                                    
                                                               
                                                                <br>


                                                                 <!--begin::Input group-->
                                                                 <div class="row mb-6">
                                                                    <!--begin::Label-->
                                                                    <label class="col-lg-4 col-form-label fw-semibold fs-6">Full Name</label>
                                                                    <!--end::Label-->
                                                                    <!--begin::Col-->
                                                                    <div class="col-lg-8 fv-row">
                                                                        <input type="text" name="name" value="{{Auth::user()->name}}" readonly class="form-control form-control-lg form-control-solid"  />
                                                                    </div>
                                                                    <!--end::Col-->
                                                                </div>
                                                                <!--end::Input group-->

                                                                <br>


                                                                 <!--begin::Input group-->
                                                                 <div class="row mb-6">
                                                                    <!--begin::Label-->
                                                                    <label class="col-lg-4 col-form-label fw-semibold fs-6">Email</label>
                                                                    <!--end::Label-->
                                                                    <!--begin::Col-->
                                                                    <div class="col-lg-8 fv-row">
                                                                        <input type="email" name="email" value="{{Auth::user()->email}}" readonly  class="form-control form-control-lg form-control-solid"  />
                                                                    </div>
                                                                    <!--end::Col-->
                                                                </div>
                                                                <!--end::Input group-->



                                                                <br>


                                                                  <!--begin::Input group-->
                                                                  <div class="row mb-6">
                                                                <!--begin::Label-->
                                                                <label class="col-lg-4 col-form-label fw-semibold fs-6"> Phone Number</label>
                                                                <!--end::Label-->
                                                                <!--begin::Col-->
                                                                <div class="col-lg-8 fv-row">
                                                                    <input type="text" name="parentNumber" value="{{Auth::user()->parentNumber}}"  class="form-control form-control-lg form-control-solid" placeholder="Phone Number"  />
                                                                </div>
                                                                <!--end::Col-->
                                                                </div>
                                                                <!--end::Input group-->

                                                                    <br>

                                                                    <div class="row mb-6">
                                                                <!--begin::Label-->
                                                                <label class="col-lg-4 col-form-label fw-semibold fs-6">My Child Age Group</label>
                                                                <!--end::Label-->
                                                                <!--begin::Col-->
                                                                <div class="col-lg-8 fv-row">
                                                                    <p>My Child Selected Age group: <a class="btn btn-success btn-sm">{{Auth::user()->class ?? "No Age Group Selected"}}</a> </p>
                                                                    <select name="class" class="form-control form-control-lg form-control-solid">
                                                                        <option selected>Select Your Child Age Group</option>
                                                                        <option value="6-9">6-9</option>
                                                                        <option value="10-14">10-14</option>
                                                                        <option value="15-18">15-18</option>
                                                                    </select>
                                                                   
                                                                </div>
                                                                <!--end::Col-->
                                                                </div>
                                                                <!--end::Input group-->

                                                                    <br>



                                                                    <div class="row mb-6">
                                                                <!--begin::Label-->
                                                                <label class="col-lg-4 col-form-label fw-semibold fs-6">My Academic Class</label>
                                                                <!--end::Label-->
                                                                <!--begin::Col-->
                                                                <div class="col-lg-8 fv-row">
                                                                    <p>My Child Selected Class: <a class="btn btn-success btn-sm">
                                                                   

                                                                        @if(Auth::user()->classGroup == "pry1")

                                                                        {{"Primary 1" ?? "No Class Group Selected"}}
                                                                        @elseif(Auth::user()->classGroup == "pry2")

                                                                        {{"Primary 2" ?? "No Class Group Selected"}}
                                                                        @elseif(Auth::user()->classGroup == "pry3")
                                                                        {{"Primary 3" ?? "No Class Group Selected"}}

                                                                        @elseif(Auth::user()->classGroup == "pry4")
                                                                        {{"Primary 4" ?? "No Class Group Selected"}}

                                                                        @elseif(Auth::user()->classGroup == "pry5")
                                                                        {{"Primary 5" ?? "No Class Group Selected"}}

                                                                        @endif
                                                                            
                                                                        </a> 
                                                                    </p>
                                                                   
                                                                    <select name="classGroup" class="form-control form-control-lg form-control-solid">
                                                                        <option selected>Select Academic Class</option>
                                                                        <option value="pry1">Primary 1</option>
                                                                        <option value="pry2">Primary 2</option>
                                                                        <option value="pry3">Primary 3</option>
                                                                        <option value="pry4">Primary 4</option>
                                                                        <option value="pry5">Primary 5</option>
                                                                        <option value="JSS1">JSS 1</option>
                                                                        <option value="JSS2">JSS 2</option>
                                                                        <option value="JSS3">JSS 3</option>
                                                                        <option value="SS1">SS 1</option>
                                                                        <option value="SS2">SS 2</option>
                                                                        <option value="SS3">SS 3</option>
                                                                    </select>
                                                                   
                                                                </div>
                                                                <!--end::Col-->
                                                                </div>
                                                                <!--end::Input group-->

                                                                    <br>




                                                                    <div class="row mb-6">
                                                                <!--begin::Label-->
                                                                <label class="col-lg-4 col-form-label fw-semibold fs-6">How many kids do I have?<br>
                                                                <small>If you have more than kids,  switch Age Group based on them to get Gamified with our Certificate</small></label>
                                                                <!--end::Label-->
                                                                <!--begin::Col-->
                                                                <div class="col-lg-8 fv-row">
                                                                    <select name="how_many_kids" class="form-control form-control-lg form-control-solid">
                                                                        <option selected>Select number of kids you have?</option>
                                                                        <option value="1">1</option>
                                                                        <option value="2">2</option>
                                                                        <option value="3">3</option>
                                                                        <option value="4">4</option>
                                                                        <option value="5">5</option>
                                                                        <option value="6">6</option>
                                                                        <option value="7">7</option>
                                                                    </select>
                                                                   
                                                                </div>
                                                                <!--end::Col-->
                                                                </div>
                                                                <!--end::Input group-->


                                                                 <!--begin::Input group-->
                                                                 <div class="row mb-6">
                                                                    <!--begin::Label-->
                                                                    <label class="col-lg-4 col-form-label required fw-semibold fs-6">Name of School</label>
                                                                    <!--end::Label-->
                                                                    <!--begin::Col-->
                                                                    <div class="col-lg-8 fv-row">
                                                                        <input type="text" value="{{Auth::user()->nameOfSchool}}" name="nameOfSchool" class="form-control form-control-lg form-control-solid" placeholder="Name of School"  />
                                                                    </div>
                                                                    <!--end::Col-->
                                                                </div>
                                                                <!--end::Input group-->

                                                                <br>

                                                                

                                                                 <!--begin::Actions-->
                                                            <div class="card-footer d-flex justify-content-end py-6 px-9">
                                                                <!-- <button type="reset" class="btn btn-light btn-active-light-primary me-2">Discard</button> -->
                                                                <button type="submit" class="btn btn-primary">Save Changes</button>
                                                            </div>
                                                            <!--end::Actions-->
                                                        </form>
                                                        <!--end::Form-->


                                        @endif

                                                      
                                                        
                                                    </div>

											</div>
											
										</div>
										<!--end::Main column-->
									
								</div>
								<!--end::Content container-->
							</div>
							<!--end::Content-->
						</div>
						<!--end::Content wrapper-->
						
					</div>
					<!--end:::Main-->
					
					
				
				
				                                <div class="modal fade" id="kt_modal_storeUpdate" tabindex="-1" aria-hidden="true" style="display: none;">
													<!--begin::Modal dialog-->
													<div class="modal-dialog modal-dialog-centered mw-650px">
														<!--begin::Modal content-->
														<div class="modal-content">
															<!--begin::Modal header-->
															<div class="modal-header" id="kt_modal_add_user_header">
																<!--begin::Modal title-->
																<h2 class="fw-bold">Notification!!!  Complete your Store Details first</h2>
																<!--end::Modal title-->
																<!--begin::Close-->
																<div class="btn btn-icon btn-sm btn-active-icon-primary" data-kt-users-modal-action="close">
																	<!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
																	<span class="svg-icon svg-icon-1">
																		<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																			<rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="currentColor"></rect>
																			<rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="currentColor"></rect>
																		</svg>
																	</span>
																	<!--end::Svg Icon-->
																</div>
																<!--end::Close-->
															</div>
															<!--end::Modal header-->
															
																</div>
														<!--end::Modal content-->
													</div>
													<!--end::Modal dialog-->
												</div>




                </div>
              
              
            </div>             


        @endsection