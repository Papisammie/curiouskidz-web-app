@extends('layouts.superadmin')

@section('template_title')
   Gamification Analytics
@endsection

@section('content')


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
                                      
                                        <th>Image|Name</th>
                                        <th>User</th>
                                        <th>Category</th>
                                        <th>Age Group</th>
                                        <th>Bagde to Won</th>
                                        <th>Video Click per user</th>
                                        
                            </tr>
                        </thead>
                        <tbody>


                        
                        @foreach($cat as $item)
                        <tr>

                            <td>
                            <img src="{{url ('uploads/course') }}/{{$item->course_image}}" height="50" width="50"><span> {{$item->course_title}}</span>    
                            </td>

                             <td>
                               <span>{{$item->user_id}}</span>    
                            </td>

                            <td>
                               <span>{{$item->course_cat}}</span>    
                            </td>

                            <td>
                               <span>{{$item->ageGroup}}</span>    
                            </td>

                            <td>
                               <span><img src="/uploads/badges/{{$item->badge_to_be_won}}" height="80" width="80"></span>    
                            </td>

                            <td>
                               <span>{{$item->clickToView}}</span>    
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





@endsection