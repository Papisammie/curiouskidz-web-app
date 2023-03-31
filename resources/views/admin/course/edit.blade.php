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
                            <h3 class="page-title">Edit Course {{$course->title}}</h3>
                            
                        </div>
                       
                    </div>
                </div>
                <!-- /Page Header -->
                
              

    
                        <div class="modal-body">

                        

                            <form action="/admin/edit/course/{{$course->course_id}}" enctype="multipart/form-data" id="intervention-image-upload" method="post">
                                @csrf

                                <div class="row">


                                <div class="col-md-12">
                                <label class="col-form-label">Couse Background Image </label>
                                    <div class="profile-img-wrap edit-img">
                                  
                                            @if($course->image == '') 
                                            <img class="inline-block" id="frame" src="{{ url('auth/cdn/img/profiles/avatar.png') }}" width="100px" height="100px"/>
                                           @else
                                           <img class="inline-block" id="frame" src="{!! $course->image !!}" width="100px" height="100px"/>
                                           @endif
                                            
                                        </div>
                                    </div>
                                        <script>
                                                function preview() {
                                                        frame.src=URL.createObjectURL(event.target.files[0]);
                                                    }
                                       </script>


                                <div class="col-md-6">
                                        <div class="form-group{{ $errors->has('title') ? ' is-invalid' : '' }}">
                                            <label class="col-form-label">Title </label>
                                            <input type="text" value="{{$course->title}}" class="form-control" name="title">
                                            @if ($errors->has('title'))
                                            <span class="invalid-feedback">
                                                <strong>{{ $errors->first('title') }}</strong>
                                            </span>
                                            @endif
                                        </div> 
                                    </div>

                                    
                                    <div class="col-md-6">
                                        <div class="form-group{{ $errors->has('author') ? ' is-invalid' : '' }}">
                                            <label class="col-form-label">Author </label>
                                            <input type="text" value="{{$course->author}}" class="form-control" name="author">
                                            @if ($errors->has('author'))
                                            <span class="invalid-feedback">
                                                <strong>{{ $errors->first('author') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>


                                    <div class="col-md-6">
                                        <div class="form-group{{ $errors->has('cat_id') ? ' is-invalid' : '' }}">
                                            <label class="col-form-label">Categories </label>
                                           
                                            <select class="form-control" name="cat_id">
                                                    <option>Please select category</option>
                                                    @if (count($cat)) > 0)
                                                    @foreach ($cat as $d)
                                                    <option value="{{$d->title}}" 
                                                        @if ($d->title == old('title', $d->title))
                                                            selected="selected"
                                                        @endif
                                                        >{{$d->title}}</option>
                                                    @endforeach
                                                    @endif
                                                   
                                            </select>
                                        </div>
                                    </div>


                                    <div class="col-md-6">
                                        <div class="form-group{{ $errors->has('type') ? ' is-invalid' : '' }}">
                                            <label class="col-form-label">Video Type </label>
                                             <small>Select Video Type: <button type="button" class="btn btn-success btn-sm">{{$course->type ?? "No Type Selected"}}</button></small>
                                            <select name="type" class="form-control">
                                                <option selected>Select Video Type</option>
                                                <option value="youtube">Youtube</option>
                                                <option value="mp4">Mp4</option>
                                            </select>
                                            @if ($errors->has('type'))
                                            <span class="invalid-feedback">
                                                <strong>{{ $errors->first('type') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>


                                    <div class="col-md-6">
                                        <div class="form-group{{ $errors->has('ageGroup') ? ' is-invalid' : '' }}">
                                            <label class="col-form-label">Age Group </label>
                                            <small>Select Age Group: <button type="button" class="btn btn-success btn-sm">{{$course->ageGroup ?? "No Age Group Selected"}}</button></small>
                                            <select name="ageGroup" class="form-control">
                                                <option selected>Select Video Age Group</option>
                                                <option value="6-9">6-9</option>
                                                <option value="10-14">10-14</option>
                                                <option value="15-18">15-18</option>
                                            </select>
                                            @if ($errors->has('ageGroup'))
                                            <span class="invalid-feedback">
                                                <strong>{{ $errors->first('ageGroup') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>



                                    <div class="col-md-6">
                                        <div class="form-group{{ $errors->has('libraryGroup') ? ' is-invalid' : '' }}">
                                            <label class="col-form-label">Library Group </label>
                                             <small>Select Video Library Group: <button type="button" class="btn btn-success btn-sm">
                                                 @if($course->libraryGroup == "educational")
                                                 Edutainment Video
                                                 
                                                 @elseif($course->libraryGroup == "academic")
                                                 Academic Video
                                                 @else
                                                 
                                                 No Library Group Selected
                                                 
                                                 @endif</button></small>
                                             
                                             
                                             
                                             
                                             
                                            <select id="selector" onchange="yesnoCheck(this);" name="libraryGroup" class="form-control">
                                                <option value="select">Select Video Library Group</option>
                                                
                                                <option value="academic">Academic Library</option>
                                                <option value="educational">Edutainment Library</option>
                                            </select>
                                            @if ($errors->has('libraryGroup'))
                                            <span class="invalid-feedback">
                                                <strong>{{ $errors->first('libraryGroup') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>


                                    <div id="adc" style="display: none;" class="col-md-6">
                                        <div class="form-group{{ $errors->has('video_url') ? ' is-invalid' : '' }}">
                                            <label class="col-form-label">Select Academic Class </label>
                                             <small>Select Academic Class: <button type="button" class="btn btn-success btn-sm">{{$course->educational ?? "No Class Selected"}}</button></small>
                                            <select id="educational" name="class" class="form-control">
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
                                    </div>


                                    <script>
                                        function yesnoCheck(that) 
                                        {
                                            if (that.value == "educational") 
                                            {
                                                document.getElementById("adc").style.display = "block";
                                            }
                                            else
                                            {
                                                document.getElementById("ps").style.display = "none";
                                            }

                                        }
                                    </script>


                                    <div class="col-md-6">
                                        <div class="form-group{{ $errors->has('video_url') ? ' is-invalid' : '' }}">
                                            <label class="col-form-label">Video URL </label>
                                            <input type="text" class="form-control" value="{{$course->video_url}}" placeholder="Enter your Embedded Mp4 Url OR Youtube Video ID e.g vNUaSDbRaJg" name="video_url">
                                            @if ($errors->has('video_url'))
                                            <span class="invalid-feedback">
                                                <strong>{{ $errors->first('video_url') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>


                                    <div class="col-md-12">
                                        <div class="form-group{{ $errors->has('description') ? ' is-invalid' : '' }}">
                                            <label class="col-form-label">What you'll learn from this lesson </label>
                                            <textarea class="form-control summernote" name="description">{{$course->description}}</textarea>
                                            @if ($errors->has('description'))
                                            <span class="invalid-feedback">
                                                <strong>{{ $errors->first('description') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group{{ $errors->has('requirements') ? ' is-invalid' : '' }}">
                                            <label class="col-form-label">Requirements </label>
                                            <textarea class="form-control summernote" name="requirements">{{$course->requirements}}</textarea>
                                            @if ($errors->has('requirements'))
                                            <span class="invalid-feedback">
                                                <strong>{{ $errors->first('requirements') }}</strong>
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