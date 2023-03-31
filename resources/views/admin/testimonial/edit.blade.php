@extends('layouts.superadmin')

@section('template_title')
   Testimonial
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
                            <h3 class="page-title">Edit Testimonial {{$test->title}}</h3>
                            
                        </div>
                       
                    </div>
                </div>
                <!-- /Page Header -->
                
              

    
                        <div class="modal-body">

                        

                            <form action="/admin/edit/testimonial/{{$test->id}}" enctype="multipart/form-data" id="intervention-image-upload" method="post">
                                @csrf

                                <div class="row">


                                <div class="col-md-12">
                                <label class="col-form-label">Testimonial Image <span class="text-danger">*</span></label>
                                    <div class="profile-img-wrap edit-img">
                                  
                                            @if($test->image == '') 
                                            <img class="inline-block" id="frame" src="{{ url('auth/cdn/img/profiles/avatar.png') }}" width="100px" height="100px"/>
                                           @else
                                           <img class="inline-block" id="frame" src="/uploads/testimonial/{{$test->image}}" width="100px" height="100px"/>
                                           @endif
                                            <div class="fileupload btn">
                                                <span class="btn-text">upload</span>
                                                <input class="upload" name="image" onchange="preview()" type="file" >
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
                                            <input type="text" value="{{$test->title}}" class="form-control" name="title">
                                            @if ($errors->has('title'))
                                            <span class="invalid-feedback">
                                                <strong>{{ $errors->first('title') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>

                                    
                                    <div class="col-md-6">
                                        <div class="form-group{{ $errors->has('description') ? ' is-invalid' : '' }}">
                                            <label class="col-form-label">Description <span class="text-danger">*</span></label>
                                            <textarea type="text" class="form-control" name="description">{{$test->description}}</textarea>
                                            @if ($errors->has('description'))
                                            <span class="invalid-feedback">
                                                <strong>{{ $errors->first('description') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>


                                  
                              
                                <div class="submit-section">
                                    <button class="btn btn-primary submit-btn" type="submit">Save Changes</button>
                                </div>
                            </form>
                        </div>
                    

            
        </div>
        <!-- /Page Wrapper -->




@endsection