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
                            <h3 class="page-title">Search Results</h3>
                            
                        </div>
                        <div class="col-auto float-right ml-auto">
                            <a href="/admin/manage/course" class="btn add-btn"><i class="fa fa-backward"></i> Go Back</a>
                           
                        </div>
                    </div>
                </div>
                <!-- /Page Header -->
                
              

                <div class="row">
                    <div class="col-md-12">

                    <form action="/admin/search/course" method="POST" class="float-left header-search">
                                        {{ csrf_field() }}
                        <div class="form-group mb-0 icon-input">
                            <i class="feather-search font-lg text-grey-400"></i>
                            <input name="q" type="text" placeholder="Start typing to search course.." class="bg-transparent border-0 lh-32 pt-2 pb-2 pl-5 pr-3 font-xsss fw-500 rounded-xl w350">
                        </div>
                    </form>
                      
                    
                        <div class="table-responsive">
                            <table class="table table-striped custom-table datatable">
                                <thead>
                                    <tr>
                                                <th>Title</th>
                                                <th>Description</th>
                                                <th>Video</th>
                                                <th>Library</th>
                                                <th>Age Group</th>
                                                <th>Class</th>
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

                                    <td>@if($item->libraryGroup == "educational")
                                                {{"Edutainment Video" ?? "No Library Added"}}
                                                
                                                @elseif($item->libraryGroup == "academic")
                                                
                                                {{"Academic Video " ?? "No Library Added"}}
                                                
                                                
                                                @else
                                                
                                                No Library Added
                                                
                                                
                                                @endif
                                                </td>

                                    <td>{{$item->ageGroup  ?? "No Age Group Added"}}</td>

                                    <td>{{$item->class  ?? "No Class Added"}}</td>

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
                                                <a class="dropdown-item" href="/admin/edit/course/{{$item->id}}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</a>
                                                <a class="dropdown-item" href="/admin/course/{{$item->id}}/publish"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Publish</a>
                                                <a class="dropdown-item" href="/admin/course/{{$item->id}}/unpublish"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> UnPublish</a>
                                                <a class="dropdown-item" onclick="return confirm('Are you sure?')" href="/admin/course/{{$item->id}}/delete"><i class="fa fa-trash-o m-r-5"></i> Trash</a>
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