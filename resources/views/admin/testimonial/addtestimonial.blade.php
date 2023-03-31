@extends('layouts.superadmin')

@section('template_title')
   Add Testimonials
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
                            <h3 class="page-title">Manage Testimonials</h3>
                            
                        </div>
                        <div class="col-auto float-right ml-auto">
                            <a href="#" class="btn add-btn" data-toggle="modal" data-target="#add_test"><i class="fa fa-plus"></i> Add Testimonial</a>
                           
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
                                                <th>Image</th>
                                                <th>Title</th>
                                                <th>Description</th>
                                                <th>Date Created</th>
                                                <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>



                                @foreach($testimonial as $item)

                                    <tr>

                                      @if($item->image == '')
                                      <td> <span class="user-img"><img src="{{ url('auth/cdn/img/profiles/avatar.png') }}" height="50" width="50" alt=""></td>
                                          
                                         @else
                                         <td> <span class="user-img"><img src="/uploads/testimonial/{{$item->image}}" height="50" width="50" alt=""></td>
                                       
                                            @endif
                                   
                                    <td>{{$item->title}}</td>

                                    <td>
                                        <span> {{$item->description }}</span>    
                                    </td>
                                    
                                     <td>{{$item->created_at}}</td>

                                  
                                        <td>
                                        <div class="form-group">

                                    <div class="input-group">

                                        <div class="input-group-append">
                                            <button type="button" class="btn btn-primary">Action</button>
                                            <button data-toggle="dropdown" type="button" class="btn btn-primary dropdown-toggle"></button>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a class="dropdown-item" href="/admin/edit/testimonial/{{$item->id}}"><i class="fa fa-edit" aria-hidden="true"></i> Edit</a>&nbsp;&nbsp;
                                                <a class="dropdown-item" onclick="return confirm('Are you sure?')" href="/admin/testimonial/{{$item->id}}/delete"><i class="fa fa-trash-o m-r-5"></i> Trash</a>
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
            <!-- /Page Content -->
        
            <!-- Add Client Modal -->
            <div id="add_test" class="modal custom-modal fade" role="dialog">
                <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Add Testimonial</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">

                        

                            <form action="/admin/testimonial" enctype="multipart/form-data" id="intervention-image-upload" method="post">
                                @csrf

                                <div class="row">


                                <div class="col-md-12">
                                <label class="col-form-label">Testifier Image <span class="text-danger">*</span></label>
                                    <div class="profile-img-wrap edit-img">
                                  
                                            <img class="inline-block" id="frame" src="{{ url('auth/cdn/img/profiles/avatar.png') }}" width="100px" height="100px"/>
                                           
                                            <div class="fileupload btn">
                                                <span class="btn-text">upload</span>
                                                <input class="upload" name="image" onchange="preview()" type="file">
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

                                   

                                    <div class="col-md-12">
                                        <div class="form-group{{ $errors->has('description') ? ' is-invalid' : '' }}">
                                            <label class="col-form-label">Description <span class="text-danger">*</span></label>
                                            <textarea rows="5" class="form-control" name="description" max="30" placeholder="Here can be your description"></textarea>
                                            @if ($errors->has('description'))
                                            <span class="invalid-feedback">
                                                <strong>{{ $errors->first('description') }}</strong>
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
                                <h3>Delete Testimonial</h3>
                                <p>Are you sure want to delete?</p>
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




@endsection