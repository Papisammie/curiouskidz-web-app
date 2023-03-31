
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
                    <h3 class="page-title">Manage Gamified User Analytics</h3>
                    
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
                                        <th>Gamification ID</th>
                                        <th>User Name</th>
                                        <th>Badge Won</th>
                                        <th>Age Group</th>
                                        <th>Course Watched</th>
                                        <th>Date Created</th>
                                        <!-- <th>Action</th> -->
                            </tr>
                        </thead>
                        <tbody>



                        @foreach($gamified as $item)

                            <tr>

                            <td>
                                <span> {!! $item->gamify_id !!}</span>    
                            </td>

                            <td>
                                <span> {!! $item->user_id !!}</span>    
                            </td>

                            <td><img src="/uploads/badges/{{$item->badge_to_be_won}}" height="80" width="80"></td>

                           


                            <td>
                                <span> {!! $item->ageGroup !!}</span>    
                            </td>


                            
                            <td>
                                <span> {!! $item->course_title !!}</span>    
                            </td>

                            

                           
                                <td>
                                    <div class="text-info">{{ $item->created_at}}</div>
                                
                                </td>
                            

                                <!-- <td>
                                <div class="form-group">

                                <div class="input-group">

                                    <div class="input-group-append">
                                        <button type="button" class="btn btn-primary">Action</button>
                                        <button data-toggle="dropdown" type="button" class="btn btn-primary dropdown-toggle"></button>
                                        <div class="dropdown-menu dropdown-menu-right">
                                          
                                        
                                            <a class="dropdown-item" href="/admin/badge/{{$item->id}}/delete"><i class="fa fa-trash-o m-r-5"></i> View More</a>
                                        </div>
                                    </div>
                                    </div>
                                </div>
                                        
                                    </td> -->
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
                    <h5 class="modal-title">Add Badges</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                

                    <form action="/admin/badges" enctype="multipart/form-data" id="intervention-image-upload" method="post">
                        @csrf

                        <div class="row">


                        <div class="col-md-12">
                        <label class="col-form-label">Badge Image <span class="text-danger">*</span></label>
                            <div class="profile-img-wrap edit-img">
                          
                                    <img class="inline-block" id="frame" src="{{ url('auth/cdn/img/profiles/avatar.png') }}" width="100px" height="100px"/>
                                   
                                    <div class="fileupload btn">
                                        <span class="btn-text">upload</span>
                                        <input class="upload" name="image" onchange="preview()" type="file" required>
                                    </div>
                                </div>
                            </div>
                                <script>
                                        function preview() {
                                                frame.src=URL.createObjectURL(event.target.files[0]);
                                            }
                               </script>


                           <div class="col-md-6">
                                <div class="form-group{{ $errors->has('title') ? ' is-invalid' : '' }}">
                                    <label class="col-form-label">Title <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="title">
                                    @if ($errors->has('title'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('title') }}</strong>
                                    </span>
                                    @endif
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
                                <div class="form-group{{ $errors->has('description') ? ' is-invalid' : '' }}">
                                    <label class="col-form-label">Description <span class="text-danger">*</span></label>
                                    <textarea type="text" class="form-control" name="description"></textarea>
                                    @if ($errors->has('description'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                                    @endif
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
                        <h3>Trash Badge</h3>
                        <p>Are you sure you want to Badge?</p>
                    </div>
                    <div class="modal-btn delete-action">
                        <div class="row">
                            <div class="col-6">
                                <a href="javascript:void(0);" class="btn btn-primary continue-btn">Trash</a>
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

