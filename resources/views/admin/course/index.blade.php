@extends('layouts.superadmin')

@section('template_title')
   Courses
@endsection
<style>
span {
  display: flex;
  justify-content: center;
}
</style>

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
                            <h3 class="page-title">Videos</h3>
                            
                        </div>
                      
                    </div>
                </div>
                <!-- /Page Header -->
                
              

                <div class="row">
                    <div class="col-md-12">


                    <div class="app-header-search">
                    <form action="/admin/search/course" method="POST" class="search-form">
                    {{ csrf_field() }}
                            <div class="form-group searchbox mb-0 border-0 p-1">
                                <input type="text" class="form-control border-0" name="q" placeholder="Start typing to search course..">
                                <i class="input-icon">
                                    <ion-icon name="search-outline" role="img" class="md hydrated" aria-label="search outline"></ion-icon>
                                </i>
                                <a href="#!" class="ml-1 mt-1 d-inline-block close searchbox-close">
                                    <i class="ti-close font-xs"></i>
                                </a>
                            </div>
                        </form>
                    </div>

                    <div class="col-auto float-right ml-auto">
                            <a href="/admin/bulk/course/upload" class="btn add-btn btn-secondary"><i class="fa fa-plus"></i> Bulk Upload</a>
                            <a href="#" class="btn add-btn" data-toggle="modal" data-target="#add_client"><i class="fa fa-plus"></i> Add Course </a>&nbsp; &nbsp;
                           
                        </div>
                      
                    
                        <div class="table-responsive">
                            <table class="table table-striped custom-table datatable">
                                <thead>
                                    <tr>
                                                <th>Title</th>
                                                <th>Description</th>
                                                <th>Video</th>
                                                <th>Thumbnail</th>
                                                <th>Library</th>
                                                <th>Status</th>
                                                <th>Date Created</th>
                                                <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>

                                @foreach($course as $item)

                                <tr>

                                    <td>{{$item->title}}</td>

                                    <td>

                                        <span> {!! substr($item->description, 0,  100) !!} </span>    
                                    </td>

                                    <td>
                                    <iframe width="120" height="80" src="https://www.youtube-nocookie.com/embed/{!! $item->video_url !!}" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>

                                    </td>

                                    <td><img src="{{$item->image }}" alt="{{$item->image }}" height="80" width="120"></td>

                                    <td>@if($item->libraryGroup == "educational")
                                                {{"Edutainment Video" ?? "No Library Added"}}
                                                
                                                @elseif($item->libraryGroup == "academic")
                                                
                                                {{"Academic Video " ?? "No Library Added"}}
                                                
                                                
                                                @else
                                                
                                                No Library Added
                                                
                                                
                                                @endif
                                                </td>

                                    

                                  

                                    @if($item->status == "1")
                                                            
                                        <td><div class="btn btn-success fw-bold">Published</div></td>
                                                                                
                                    @else
                                                                                
                                        <td><div class="btn btn-danger fw-bold">Unpublished</div></td>
                                                            
                                                                                
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
                                                <a class="dropdown-item" href="/admin/edit/course/{{$item->course_id}}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</a>
                                                <a class="dropdown-item" href="/admin/course/{{$item->id}}/publish"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Publish</a>
                                                <a class="dropdown-item" href="/admin/course/{{$item->id}}/unpublish"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> UnPublish</a>
                                                <a class="dropdown-item" onclick="return confirm('Are you sure?')" href="/admin/category/{{$item->id}}/delete"><i class="fa fa-trash-o m-r-5"></i> Trash</a>
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
            <div id="add_client" class="modal custom-modal fade" role="dialog">
                <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Add Course</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">

                        

                            <form action="/admin/manage/course" enctype="multipart/form-data" id="intervention-image-upload" method="post">
                                @csrf

                                <div class="row">


                               

                                    
                                    <div class="col-md-6">
                                        <div class="form-group{{ $errors->has('author') ? ' is-invalid' : '' }}">
                                            <label class="col-form-label">Author <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="author">
                                            @if ($errors->has('author'))
                                            <span class="invalid-feedback">
                                                <strong>{{ $errors->first('author') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>


                                    <div class="col-md-6">
                                        <div class="form-group{{ $errors->has('cat_id') ? ' is-invalid' : '' }}">
                                            <label class="col-form-label">Categories <span class="text-danger">*</span></label>
                                            <select class="form-control" name="cat_id">
                                                    <option>Please select category</option>
                                                    @foreach($cat as $item)
                                                    <option value="{{$item->title}}">{{$item->title}}</option>
                                                    @endforeach
                                            </select>
                                        </div>
                                    </div>


                                    <div class="col-md-6">
                                        <div class="form-group{{ $errors->has('type') ? ' is-invalid' : '' }}">
                                            <label class="col-form-label">Video Type <span class="text-danger">*</span></label>
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
                                            <label class="col-form-label">Age Group <span class="text-danger">*</span></label>
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


                                    <div id="adc" style="display: none;" class="col-md-6">
                                        <div class="form-group{{ $errors->has('video_url') ? ' is-invalid' : '' }}">
                                            <label class="col-form-label">Select Academic Class <span class="text-danger">*</span></label>
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
                                        <div class="form-group{{ $errors->has('videoId') ? ' is-invalid' : '' }}">
                                            <label class="col-form-label">Video URL <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" placeholder="Enter Youtube Video ID e.g vNUaSDbRaJg" name="videoId">
                                            @if ($errors->has('videoId'))
                                            <span class="invalid-feedback">
                                                <strong>{{ $errors->first('videoId') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>


                                    <div class="col-md-12">
                                        <div class="form-group{{ $errors->has('requirements') ? ' is-invalid' : '' }}">
                                            <label class="col-form-label">Requirements <span class="text-danger">*</span></label>
                                            <textarea rows="5" class="form-control summernote" name="requirements"  placeholder="Here can be your description"></textarea>
                                            @if ($errors->has('requirements'))
                                            <span class="invalid-feedback">
                                                <strong>{{ $errors->first('requirements') }}</strong>
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
            <!-- /Delete Client Modal -->
            
        </div>
        <!-- /Page Wrapper -->




@endsection