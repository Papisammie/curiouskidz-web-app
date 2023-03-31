@extends('layouts.superadmin')

@section('template_title')
   Category
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
                            <h3 class="page-title">Manage Categories</h3>
                            
                        </div>
                        <div class="col-auto float-right ml-auto">
                            <a href="#" class="btn add-btn" data-toggle="modal" data-target="#add_client"><i class="fa fa-plus"></i> Add Category</a>
                           
                        </div>
                    </div>
                </div>
                <!-- /Page Header -->
                
              

                <div class="row">
                    <div class="col-md-12">

                      
                    <div class="col">
                            <h3 class="page-title">Academic Categories</h3>
                            
                        </div>

                        <div class="table-responsive">
                            <table class="table table-striped custom-table datatable">
                                <thead>
                                    <tr>
                                                <th>Title</th>
                                                <th>Description</th>
                                                <!--<th>Class</th>-->
                                                <th>Library Group</th>
                                                <th>Image</th>
                                                <th>Date Created</th>
                                                <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>



                                @foreach($getAdc as $item)

                                    <tr>

                                    <td>{{$item->title}}</td>

                                    <td>
                                        <span> {{$item->description }}</span>    
                                    </td>

                                    <!--<td>-->
                                    <!--@if($item->class == "pry1")-->

                                    <!--    {{"Primary 1" ?? "No Class Group Selected"}}-->
                                    <!--    @elseif($item->class == "pry2")-->

                                    <!--    {{"Primary 2" ?? "No Class Group Selected"}}-->
                                    <!--    @elseif($item->class == "pry3")-->
                                    <!--    {{"Primary 3" ?? "No Class Group Selected"}}-->

                                    <!--    @elseif($item->class == "pry4")-->
                                    <!--    {{"Primary 4" ?? "No Class Group Selected"}}-->

                                    <!--    @elseif($item->class == "pry5")-->
                                    <!--    {{"Primary 5" ?? "No Class Group Selected"}}-->

                                    <!--    @else-->
                                    <!--    {{$item->class }}-->
                                    <!--    @endif-->
                                      
                                    <!--</td>-->
 
                                     <td>Academic Video</td>

                        
                                    <td>
                                        <h2 class="table-avatar">
                                            <a href="{{url ('uploads/category') }}/{{$item->image}}" class="avatar"><img src="{{url ('uploads/category') }}/{{$item->image}}" alt=""></a>
                                            
                                        </h2>
                                    </td>

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
                                            <a class="dropdown-item" href="/admin/edit/category/{{$item->id}}"><i class="fa fa-edit" aria-hidden="true"></i> Edit</a>
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



                        <br><br>

                        <div class="col">
                            <h3 class="page-title">Educational Categories</h3>
                            
                        </div>

                        <div class="table-responsive">
                            <table class="table table-striped custom-table datatable">
                                <thead>
                                    <tr>
                                                <th>Title</th>
                                                <th>Description</th>
                                                <!--<th>Age</th>-->
                                                <th>Library Group</th>
                                                <th>Image</th>
                                                <th>Date Created</th>
                                                <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>



                                @foreach($getEdu as $item)

                                    <tr>

                                    <td>{{$item->title}}</td>

                                    <td>
                                        <span> {{$item->description }}</span>    
                                    </td>


                                    <!--<td>-->
                                    <!--    <span> {{$item->age }}</span>    -->
                                    <!--</td>-->
                                    
                                     <td>Edutainment Video</td>

                                    <td>
                                        <h2 class="table-avatar">
                                            <a href="{{url ('uploads/category') }}/{{$item->image}}" class="avatar"><img src="{{url ('uploads/category') }}/{{$item->image}}" alt=""></a>
                                            
                                        </h2>
                                    </td>

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
                                            <a class="dropdown-item" href="/admin/edit/category/{{$item->id}}"><i class="fa fa-edit" aria-hidden="true"></i> Edit</a>
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
                            <h5 class="modal-title">Add Category</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">

                        

                            <form action="/admin/manage/category" enctype="multipart/form-data" id="intervention-image-upload" method="post">
                                @csrf

                                <div class="row">


                                <div class="col-md-12">
                                <label class="col-form-label">Category Image <span class="text-danger">*</span></label>
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
                                            <select id="academic" name="class" class="form-control">
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


                                    <div id="edu" style="display: none;" class="col-md-6">
                                        <div class="form-group{{ $errors->has('ageGroup') ? ' is-invalid' : '' }}">
                                            <label for="educational" class="col-form-label">Age Group <span class="text-danger">*</span></label>
                                            <select id="educational" name="age" class="form-control">
                                                <option selected>Select Video Age Group</option>
                                                <option value="6-9">6-9</option>
                                                <option value="10-14">10-14</option>
                                                <option value="15-18">15-18</option>
                                            </select>
                                           
                                        </div>
                                    </div>


                                    <script>
                                        function yesnoCheck(that) 
                                        {
                                            if (that.value == "academic") 
                                            {
                                                document.getElementById("adc").style.display = "block";
                                            }
                                            else
                                            {
                                                document.getElementById("adc").style.display = "none";
                                            }

                                            if (that.value == "educational") {
                                                document.getElementById("edu").style.display = "block";
                                            }
                                            else
                                            {
                                                document.getElementById("edu").style.display = "none";
                                            }



                                        }
                                    </script>
                                    
                                    
                                    
                                 
                                    
                                    
                                    
                                   



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
                                <h3>Delete Category</h3>
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