@extends('layouts.superadmin')

@section('template_title')
   Courses
@endsection


@section('content')

        @if (session('success'))
            <script type="text/javascript">
            Swal.fire(
              'Success',
              '{{ session('success') }}',
              'success'
            )
            </script>
        @endif


        @if (session('error'))
            <script type="text/javascript">
              'Error!',
              '{{ session('error') }}',
              'error'
            )
            </script>
        @endif


<!-- Page Wrapper -->
<div class="page-wrapper">
			
            <!-- Page Content -->
            <div class="content container-fluid">
            
                <!-- Page Header -->
                <div class="page-header">
                    <div class="row align-items-center">
                        <div class="col">
                            <h3 class="page-title">Add Gamification Based on Age Group</h3>
                            
                        </div>
                       
                    </div>
                </div>
                <!-- /Page Header -->

                <div class="row">
                    <div class="col-md-12">



                <form action="/admin/manage/gamifications" enctype="multipart/form-data" method="post">
                                @csrf

                                <div class="row">

                                    <div class="col-md-6">
                                        <div class="form-group{{ $errors->has('course_title') ? ' is-invalid' : '' }}">
                                            <label class="col-form-label">Courses to Gamified <span class="text-danger">*</span></label>
                                            <select class="form-control" name="course_title">
                                                    <option>Select Course</option>
                                                    @foreach($getCourse as $item)
                                                    <option value="{{$item->title}}">{{$item->title}}</option>
                                                    @endforeach
                                            </select>
                                        </div>
                                    </div>


                                    <div class="col-md-6">
                                        <div class="form-group{{ $errors->has('course_title') ? ' is-invalid' : '' }}">
                                            <label class="col-form-label">Category to Gamified<span class="text-danger">*</span></label>
                                            <select class="form-control" name="course_cat">
                                                    <option>Select Category</option>
                                                    @foreach($cat as $item)
                                                    <option value="{{$item->title}}">{{$item->title}}</option>
                                                    @endforeach
                                            </select>
                                        </div>
                                    </div>


                                    <div class="col-md-6">
                                        <div class="form-group{{ $errors->has('ageGroup') ? ' is-invalid' : '' }}">
                                            <label class="col-form-label">Age Group <span class="text-danger">*</span></label>
                                            <select name="ageGroup" class="form-control">
                                                 <option selected>Select Age Group</option>
                                                 <option value="6-9">6-9</option>
                                                 <option value="10-14">10-14</option>
                                                 <option value="15-18">15-18</option>
                                            </select>
                                            
                                        </div>
                                    </div>


                                    <div class="col-md-6">
                                        <div class="form-group{{ $errors->has('howManyCourse') ? ' is-invalid' : '' }}">
                                            <label class="col-form-label">How many courses<span class="text-danger">*</span></label>
                                            <select name="howManyCourse" class="form-control">
                                                 <option selected>How many courses </option>
                                                 <option value="1">1</option>
                                                 <option value="2">2</option>
                                                 <option value="3">3</option>
                                                 <option value="4">4</option>
                                                 <option value="5">5</option>
                                                 <option value="6">6</option>
                                                 <option value="7">7</option>
                                                 <option value="8">8</option>
                                                 <option value="9">9</option>
                                                 <option value="10">10</option>
                                                 <option value="11">11</option>
                                            </select>
                                            
                                        </div>
                                    </div>



                                    <div class="col-md-6">
                                        <div class="form-group{{ $errors->has('badge_to_be_won') ? ' is-invalid' : '' }}">
                                            <label class="col-form-label">How many courses<span class="text-danger">*</span></label>
                                            <select name="badge_to_be_won" class="form-control selectpicker">
                                                 <option selected>Select Badge</option>
                                                 @foreach($badges as $item)
                                                    <option data-thumbnail="/uploads/badges/{{$item->image}}" value="{{$item->image}}">{{$item->title}}</option>
                                                    @endforeach
                                          
                                                
                                            </select>
                                            
                                        </div>
                                    </div>

                                    
                                 


                                    <div class="col-md-6">
                                        <div class="form-group{{ $errors->has('status') ? ' is-invalid' : '' }}">
                                            <label class="col-form-label">Status <span class="text-danger">*</span></label>
                                            <select name="status" class="form-control">
                                                 <option selected>Select Status</option>
                                                 <option value="Publish">Publish</option>
                                                 <option value="Unpublish">Unpublish</option>
                                            </select>
                                            
                                        </div>
                                    </div>


                                  
                                   
                              
                                <div class="submit-section">
                                    <button class="btn btn-primary submit-btn" type="submit">Save Gamification</button>
                                </div>
                            </form>










            <!-- Delete Gamification Modal -->
            <div class="modal custom-modal fade" id="delete_client" role="dialog">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-body">
                            <div class="form-header">
                                <h3>Delete Gamification</h3>
                                <p>Are you sure you want to delete?</p>
                            </div>
                            <div class="modal-btn delete-action">
                                <div class="row">
                                    <div class="col-6">
                                        <a href="javascript:void(0);" class="btn btn-primary continue-btn">Delete</a>
                                    </div>
                                    <div class="col-6">
                                        <a href="javascript:void(0);" data-dismiss="modal" class="btn btn-primary cancel-btn">Cancel</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /Delete Gamification Modal -->


            

              
                
                      

                        <div class="table-responsive">
                        <br><br>
                            <table class="table table-striped custom-table datatable">
                                <thead>
                                    <tr>
                                               <th>Course</th>
                                                <th>Category</th>
                                                <th>Age Group</th>
                                                <th>How many Courses</th>
                                                <th>Badge To Won</th>
                                                <th>Status</th>
                                                <th>Date Created</th>
                                                <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>



                                @foreach($getGamy as $item)

                                    <tr>

                                    <td><a href="">{{$item->course_title}}</a></td>

                                    <td>
                                       {!! $item->course_cat !!}
                                    </td>

                                    <td>
                                       {!! $item->ageGroup !!}
                                    </td>

                                    <td>
                                       {!! $item->howManyCourse !!}
                                    </td>


                                    <td>
                                       
                                       <img src="/uploads/badges/{!! $item->badge_to_be_won !!}" alt="No Image" width="50" height="50">
                                    </td>

                                    

                                    @if($item->status == "Publish")
                                                            
                                        <td><div class="btn btn-success fw-bold">published</div></td>
                                                            
                                    @else
                                                            
                                         <td><div class="btn btn-danger fw-bold">unpublish</div></td>
                                        
                                                            
                                    @endif

                                    <td>
                                        <div class="text-info">{{ date('j M, Y', strtotime($item->created_at)) }}</div>
                                        
                                    </td>
                                    

                                    <td>
                                        <div class="form-group">

                                            <div class="input-group">

                                                <div class="input-group-append">
                                                    
                                                    <button type="button" class="btn btn-primary">Action</button>
                                                    <button data-toggle="dropdown" type="button" class="btn btn-primary dropdown-toggle"></button>
                                                    <div class="dropdown-menu dropdown-menu-right">
                                                        <a class="dropdown-item" href="/admin/gamification/{{$item->id}}/publish"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Publish</a>
                                                        <a class="dropdown-item" href="/admin/gamification/{{$item->id}}/unpublish"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> UnPublish</a>
                                                    
                                                        <a class="dropdown-item" onclick="return confirm('Are you sure?')" href="/admin/gamification/{{$item->id}}/delete"><i class="fa fa-trash-o m-r-5"></i> Trash</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                            
                                    </td>
                                    </tr>



 

                                    @endforeach


                                </tbody>
                            </table>
                        </div>
                    </div>

                   

                </div>





                          
                      
        </div>
        <!-- /Page Wrapper -->




@endsection