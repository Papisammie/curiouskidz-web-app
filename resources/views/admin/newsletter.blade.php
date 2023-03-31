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
                            <h3 class="page-title">All Newsletter</h3>
                            
                        </div>
                       
                    </div>
                </div>
                <!-- /Page Header -->
                
              

                <div class="row">
                    <div class="col-md-12">

                      

                        <div class="table-responsive">
                            <table class="table table-striped custom-table datatable">
                                <thead>
                                    <tr>
                                                <th>Email</th>
                                                <th>Agreement</th>
                                                <th>Date Created</th>
                                                <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>



                                @foreach($newsletter as $item)

                                    <tr>

                                        <td>{{$item->email}}</td>


                                        <td>Agreed</td>

            
                                        <td>
                                            <div class="text-info">{{ date('j M, Y', strtotime($item->created_at)) }}</div>
                                            
                                        </td>
                                        

                                        <td>
                                            <div class="form-group">

                                            <div class="input-group">

                                                    <a href="mailto:{{$item->email}}" type="button" class="btn btn-primary">Send Newsletter via Mail</a> 
                                                
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
            <!-- /Page Content -->
        
            <!-- Add Client Modal -->
            <div id="add_client" class="modal custom-modal fade" role="dialog">
                <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Add Student & Parent</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">

                        

                            <form action="/admin/manage/course" enctype="multipart/form-data" id="intervention-image-upload" method="post">
                                @csrf

                                <div class="row">


                                <div class="col-md-12">
                                  <label class="col-form-label">Student Image <span class="text-danger">*</span></label>
                                    <div class="profile-img-wrap edit-img">
                                  
                                            <img class="inline-block" id="frame" src="{{ url('auth/cdn/img/profiles/avatar.png') }}" width="100px" height="100px"/>
                                           
                                            <div class="fileupload btn">
                                                <span class="btn-text">upload</span>
                                                <input class="upload" name="studentImage" onchange="preview()" type="file" required>
                                            </div>
                                        </div>
                                    </div>
                                        <script>
                                                function preview() {
                                                        frame.src=URL.createObjectURL(event.target.files[0]);
                                                    }
                                       </script>
                               </div>


                               <div class="col-md-6">
                                        <div class="form-group{{ $errors->has('studentName') ? ' is-invalid' : '' }}">
                                            <label class="col-form-label">Student FullName <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="studentName">
                                            @if ($errors->has('studentName'))
                                            <span class="invalid-feedback">
                                                <strong>{{ $errors->first('studentName') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>


                                    <div class="col-md-6">
                                        <div class="form-group{{ $errors->has('studentEmail') ? ' is-invalid' : '' }}">
                                            <label class="col-form-label">Student Email <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="studentEmail">
                                            @if ($errors->has('studentEmail'))
                                            <span class="invalid-feedback">
                                                <strong>{{ $errors->first('studentEmail') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>






                               <div class="col-md-12">
                                  <label class="col-form-label">Parent Image <span class="text-danger">*</span></label>
                                    <div class="profile-img-wrap edit-img">
                                  
                                            <img class="inline-block" id="frame" src="{{ url('auth/cdn/img/profiles/avatar.png') }}" width="100px" height="100px"/>
                                           
                                            <div class="fileupload btn">
                                                <span class="btn-text">upload</span>
                                                <input class="upload" name="parentImage" onchange="preview()" type="file" required>
                                            </div>
                                        </div>
                                    </div>
                                        <script>
                                                function preview() {
                                                        frame.src=URL.createObjectURL(event.target.files[0]);
                                                    }
                                       </script>
                               </div>


                                    <div class="col-md-6">
                                        <div class="form-group{{ $errors->has('parentName') ? ' is-invalid' : '' }}">
                                            <label class="col-form-label">Parent FullName <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="parentName">
                                            @if ($errors->has('parentName'))
                                            <span class="invalid-feedback">
                                                <strong>{{ $errors->first('parentName') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>

                                    
                                    <div class="col-md-6">
                                        <div class="form-group{{ $errors->has('parentEmail') ? ' is-invalid' : '' }}">
                                            <label class="col-form-label">Student Email <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="parentEmail">
                                            @if ($errors->has('parentEmail'))
                                            <span class="invalid-feedback">
                                                <strong>{{ $errors->first('parentEmail') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>



                                   


                                   


                                   
                              
                                <div class="submit-section">
                                    <button class="btn btn-primary submit-btn" type="submit">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /Add Client Modal -->
            
           
            
            <!-- Delete Client Modal -->
            <div class="modal custom-modal fade" id="delete_client" role="dialog">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-body">
                            <div class="form-header">
                                <h3>Delete Course</h3>
                                <p>Are you sure want to delete?</p>
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
            <!-- /Delete Client Modal -->
            
        </div>
        <!-- /Page Wrapper -->




@endsection