@extends('layouts.superadmin')

@section('template_title')
   View User
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
                            <h3 class="page-title"> View User {{$getUser->name}}</h3>
                            
                        </div>
                       
                    </div>
                </div>
                <!-- /Page Header -->
                
              

                                <div class="row">


                                <div class="col-md-12">
                                <label class="col-form-label">User Image <span class="text-danger">*</span></label>
                                    <div class="profile-img-wrap edit-img">
                                  
                                            @if($getUser->role == "parent") 
                                            <img class="inline-block" id="frame" src="/uploads/course/{{$getUser->parentImage}}" width="100px" height="100px"/>
                                           @elseif($getUser->role == "student") 
                                           <img class="inline-block" id="frame" src="/uploads/course/{{$getUser->avatar}}" width="100px" height="100px"/>
                                           @else
                                           <img class="inline-block" id="frame" src="{{ url('auth/cdn/img/profiles/avatar.png') }}" width="100px" height="100px"/>
                                           @endif
                                           
                                        </div>
                                    </div>
                                       


                                <div class="col-md-6">
                                        <div class="form-group{{ $errors->has('title') ? ' is-invalid' : '' }}">
                                            <label class="col-form-label">Full Name <span class="text-danger">*</span></label>
                                            <input type="text" value="{{$getUser->name}}" readonly class="form-control" name="name">
                                            @if ($errors->has('name'))
                                            <span class="invalid-feedback">
                                                <strong>{{ $errors->first('name') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>

                                    
                                    <div class="col-md-6">
                                        <div class="form-group{{ $errors->has('email') ? ' is-invalid' : '' }}">
                                            <label class="col-form-label">Email <span class="text-danger">*</span></label>
                                            <input type="text" value="{{$getUser->email}}" readonly class="form-control" name="email">
                                            @if ($errors->has('email'))
                                            <span class="invalid-feedback">
                                                <strong>{{ $errors->first('email') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>


                                    <div class="col-md-6">
                                        <div class="form-group{{ $errors->has('roles') ? ' is-invalid' : '' }}">
                                            <label class="col-form-label">Account Type <span class="text-danger">*</span></label>
                                            <input type="text" value="{{$getUser->roles}}" readonly class="form-control" name="roles">
                                            @if ($errors->has('roles'))
                                            <span class="invalid-feedback">
                                                <strong>{{ $errors->first('roles') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>

                                    @if($getUser->role == "parent") 

                                    <div class="col-md-6">
                                        <div class="form-group{{ $errors->has('how_many_kids') ? ' is-invalid' : '' }}">
                                            <label class="col-form-label">How many Kids do I have <span class="text-danger">*</span></label>
                                            <input type="text" value="{{$getUser->how_many_kids}}" readonly class="form-control" name="how_many_kids">
                                            @if ($errors->has('how_many_kids'))
                                            <span class="invalid-feedback">
                                                <strong>{{ $errors->first('how_many_kids') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>
                                    @endif


                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="col-form-label">Status <span class="text-danger">*</span></label>
                                            @if($getUser->status == "1")
                                                            
                                            <div class="btn btn-success fw-bold">Activated</div>
                                                            
                                            @else
                                                                
                                            <div class="btn btn-danger fw-bold">Deactivated</div>
                                                                
                                            @endif
                                        </div>
                                    </div>


                                    <a class="btn btn-primary" href="/admin/manage/users"><i class="fa fa-arrow-left" aria-hidden="true"></i> Go Back</a>
        </div>
        <!-- /Page Wrapper -->




@endsection