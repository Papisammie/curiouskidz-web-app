@extends('layouts.superadmin')

@section('template_title')
   Edit Category
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
                            <h3 class="page-title">Edit Category {{$cat->title}}</h3>
                            
                        </div>
                       
                    </div>
                </div>
                <!-- /Page Header -->
                
              

    
                        <div class="modal-body">

                        <form action="/admin/edit/category/{{$cat->id}}" enctype="multipart/form-data" id="intervention-image-upload" method="post">
                                @csrf

                                <div class="row">


                                <div class="col-md-12">
                                <label class="col-form-label">Category Image</label>
                                    <div class="profile-img-wrap edit-img">
                                  
                                            <img class="inline-block" id="frame" src="/uploads/category/{{$cat->image}}" width="100px" height="100px"/>
                                           
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
                                            <label class="col-form-label">Title</label>
                                            <input type="text" value="{{$cat->title}}" class="form-control" name="title">
                                            @if ($errors->has('title'))
                                            <span class="invalid-feedback">
                                                <strong>{{ $errors->first('title') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>

                                    
                                    <div class="col-md-6">
                                        <div class="form-group{{ $errors->has('libraryGroup') ? ' is-invalid' : '' }}">
                                            <label class="col-form-label">Library Group <span class="text-danger">*</span></label>
                                          
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
                                    
                                    
                                    <!--<div id="adc" style="display: none;" class="col-md-6">-->
                                    <!--    <div class="form-group{{ $errors->has('video_url') ? ' is-invalid' : '' }}">-->
                                    <!--        <label class="col-form-label">Select Academic Class <span class="text-danger">*</span></label>-->
                                           
                                    <!--        <select id="academic" name="class" class="form-control">-->
                                    <!--        @if (count($getClassgroup)) > 0)-->
                                    <!--        @foreach ($getClassgroup as $d)-->
                                    <!--        <option value="{{$d->title}}" -->
                                    <!--            @if ($d->title == old('title', $cat->class))-->
                                    <!--                selected="selected"-->
                                    <!--            @endif-->
                                    <!--            >{{$d->title}}</option>-->
                                    <!--        @endforeach-->
                                    <!--        @endif-->
                                              
                                    <!--        </select>-->
                                    <!--    </div>-->
                                    <!--</div>-->


                                    <!--<div id="edu" style="display: none;" class="col-md-6">-->
                                    <!--    <div class="form-group{{ $errors->has('ageGroup') ? ' is-invalid' : '' }}">-->
                                    <!--        <label for="educational" class="col-form-label">Age Group <span class="text-danger">*</span></label>-->
                                          
                                    <!--        <select id="educational" name="age" class="form-control">-->
                                    <!--        @if (count($getAgegroup)) > 0)-->
                                    <!--        @foreach ($getAgegroup as $d)-->
                                    <!--        <option value="{{$d->title}}" -->
                                    <!--            @if ($d->title == old('title', $cat->age))-->
                                    <!--                selected="selected"-->
                                    <!--            @endif-->
                                    <!--            >{{$d->title}}</option>-->
                                    <!--        @endforeach-->
                                    <!--        @endif-->


                                    <!--        </select>-->
                                           
                                    <!--    </div>-->
                                    <!--</div>-->


                                    <!--<script>-->
                                    <!--    function yesnoCheck(that) -->
                                    <!--    {-->
                                    <!--        if (that.value == "academic") -->
                                    <!--        {-->
                                    <!--            document.getElementById("adc").style.display = "block";-->
                                    <!--        }-->
                                    <!--        else-->
                                    <!--        {-->
                                    <!--            document.getElementById("adc").style.display = "none";-->
                                    <!--        }-->

                                    <!--        if (that.value == "educational") {-->
                                    <!--            document.getElementById("edu").style.display = "block";-->
                                    <!--        }-->
                                    <!--        else-->
                                    <!--        {-->
                                    <!--            document.getElementById("edu").style.display = "none";-->
                                    <!--        }-->



                                    <!--    }-->
                                    <!--</script>-->


                                    <div class="col-md-12">
                                        <div class="form-group{{ $errors->has('description') ? ' is-invalid' : '' }}">
                                            <label class="col-form-label">Description <span class="text-danger">*</span></label>
                                            <textarea rows="5" class="form-control" name="description" max="30" placeholder="Here can be your description">{{$cat->description}}</textarea>
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
        <!-- /Page Wrapper -->




@endsection