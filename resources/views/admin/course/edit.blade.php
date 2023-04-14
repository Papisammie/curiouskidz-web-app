@extends('layouts.superadmin')

@section('template_title')
   Courses
@endsection


@section('content')

        @if (session('success'))
              <script type="text/javascript">
                $(".alert").show(() => {
                    setTimeout(() => {
                        $(".alert").fadeTo(500, 1).slideUp(500, () => {
                
                            $({{ session('success') }}).hide();
                        })
                    }, 5000)
                });
   
            </script>
        @endif


        @if (session('error'))
            <script type="text/javascript">
                $(".alert").show(() => {
                    setTimeout(() => {
                        $(".alert").fadeTo(500, 1).slideUp(500, () => {
                
                            $({{ session('error') }}).hide();
                        })
                    }, 5000)
                });
   
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

                        

                            <form action="/admin/edit/course/{{$course->id}}" method="post">
                                @csrf

                                <div class="row">


                                <!--<div class="col-md-12">-->
                                <!--<label class="col-form-label">Couse Background Image </label>-->
                                <!--    <div class="profile-img-wrap edit-img">-->
                                  
                                <!--            @if($course->image == '') -->
                                <!--            <img class="inline-block" id="frame" src="{{ url('auth/cdn/img/profiles/avatar.png') }}" width="100px" height="100px"/>-->
                                <!--           @else-->
                                <!--           <img class="inline-block" id="frame" src="{!! $course->image !!}" width="100px" height="100px"/>-->
                                <!--           @endif-->
                                            
                                <!--        </div>-->
                                <!--    </div>-->
                                <!--        <script>-->
                                <!--                function preview() {-->
                                <!--                        frame.src=URL.createObjectURL(event.target.files[0]);-->
                                <!--                    }-->
                                <!--       </script>-->


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
                                          
                                          
                                          <?php $options=$course->cat_id ?>
                                            <select class="form-control" name="cat_id">
                                                    <option>Please select category</option>
                                                    
                                        @foreach($cat as $d)
                                         <option value="{{ $d->title }}" {{ ( $d->title == $options) ? 'selected' : '' }}>
                                        {{ $d->title }}
                                      </option>
                                      @endforeach
                                           
                                            </select>
                                        </div>
                                    </div>


                               
                                    
                                     <div class="col-md-6">
                                        <div class="form-group{{ $errors->has('libraryGroup') ? ' is-invalid' : '' }}">
                                            <label class="col-form-label">Library Group </label>
 
 
                                         <?php $options = $course->libraryGroup ?>
                                            <select id="selector" onchange="yesnoCheck(this);" name="libraryGroup" class="form-control">
                                                
                                        <option>Select Library Group</option>
                                                
                                        <option value="academic" {{ ( "academic" == $options) ? 'selected' : '' }}>
                                        Academic Library
                                      </option>
                                      
                                      <option value="educational" {{ ( "educational" == $options) ? 'selected' : '' }}>
                                        Edutainment Library
                                      </option>
        
                                            </select>
                                            
                                            
                                            
                                            
                                        </div>
                                    </div>


                                    <!--<div id="adc" style="display: none;" class="col-md-6">-->
                                    <div class="col-md-6">
                                        <div class="form-group{{ $errors->has('ageGroup') ? ' is-invalid' : '' }}">
                                            <label class="col-form-label">Age Group </label>
                                            
                                        <?php $options = $course->ageGroup ?>
                                        <select id="educational" name="ageGroup" class="form-control">
                                                
                                                
                                            <option>Select Video Age Group</option>
                                                    
                                            <option value="6-9" {{ ( "6-9" == $options) ? 'selected' : '' }}>
                                            6-9
                                           </option>
                                          
                                          <option value="10-14" {{ ( "10-14" == $options) ? 'selected' : '' }}>
                                            10-14
                                          </option>
                                          
                                          <option value="15-18" {{ ( "15-18" == $options) ? 'selected' : '' }}>
                                            15-18
                                          </option>
         
                                        </select>
                                           
                                        </div>
                                    </div>



                                   


                                    <div class="col-md-6">
                                        <div class="form-group{{ $errors->has('video_url') ? ' is-invalid' : '' }}">
                                            <label class="col-form-label">Only Select Academic Class if Academic Library is Selected</label>
                                            
                                         <?php $options = $course->class ?>
                                            <select name="class" class="form-control">
                                                <option selected>Select Academic Class</option>
                                                <option value="pry1" {{ ( "pry1" == $options) ? 'selected' : '' }}>
                                            Primary 1
                                          </option>
                                          <option value="pry2" {{ ( "pry2" == $options) ? 'selected' : '' }}>
                                            Primary 2
                                          </option>
                                          <option value="pry3" {{ ( "pry3" == $options) ? 'selected' : '' }}>
                                            Primary 3
                                          </option>
                                          <option value="pry4" {{ ( "pry4" == $options) ? 'selected' : '' }}>
                                            Primary 4
                                          </option>
                                          <option value="pry5" {{ ( "pry5" == $options) ? 'selected' : '' }}>
                                            Primary 5
                                          </option>
                                          <option value="JSS1" {{ ( "JSS1" == $options) ? 'selected' : '' }}>
                                            JSS 1
                                          </option>
                                          <option value="JSS2" {{ ( "JSS2" == $options) ? 'selected' : '' }}>
                                            JSS 2
                                          </option>
                                          <option value="JSS3" {{ ( "JSS3" == $options) ? 'selected' : '' }}>
                                            JSS 3
                                          </option>
                                          <option value="SS1" {{ ( "SS1" == $options) ? 'selected' : '' }}>
                                            SS 1
                                          </option>
                                          <option value="SS2" {{ ( "SS2" == $options) ? 'selected' : '' }}>
                                            SS 2
                                          </option>
                                          <option value="SS1" {{ ( "SS1" == $options) ? 'selected' : '' }}>
                                            SS 3
                                          </option>
                                                
                                                
                                         
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
                                            <label class="col-form-label">Video ID </label>
                                            <input type="text" class="form-control" readonly value="{{$course->video_url}}">
                                           
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