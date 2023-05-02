@extends('layouts.superadmin')




<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/echarts/4.1.0/echarts.min.js"></script>
<script>
$(function(){
  'use strict'
 
  /**************** PIE CHART ************/
  var pieData = [{
    name: 'Users Data',
    type: 'pie',
    radius: '80%',
    center: ['50%', '57.5%'],
    data: <?php echo json_encode($Data); ?>,
    label: {
      normal: {
        fontFamily: 'Roboto, sans-serif',
        fontSize: 11
      }
    },
    labelLine: {
      normal: {
        show: false
      }
    },
    markLine: {
      lineStyle: {
        normal: {
          width: 1
        }
      }
    }
  }];
  var pieOption = {
    tooltip: {
      trigger: 'item',
      formatter: '{a} <br/>{b}: {c} ({d}%)',
      textStyle: {
        fontSize: 11,
        fontFamily: 'Roboto, sans-serif'
      }
    },
    legend: {},
    series: pieData
  };
  var pie = document.getElementById('chartPie');
  var pieChart = echarts.init(pie);
  pieChart.setOption(pieOption);
   /** making all charts responsive when resize **/
});
</script>

@section('template_title')
    {{ trans('Admin Dashboard') }}
@endsection

@section('content')

        @if (session('success'))
            <script type="text/javascript">
            Swal.fire(
              'Welcome {{Auth::user()->name}}!',
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
						<div class="row">
							<div class="col-sm-12">
								<h3 class="page-title">Welcome {{Auth::user()->name}}!</h3>
								<ul class="breadcrumb">
									<li class="breadcrumb-item active">Dashboard</li>
								</ul>
							</div>
						</div>
					</div>
					<!-- /Page Header -->
				
					<div class="row">
						
						<div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
							<div class="card dash-widget">
								<div class="card-body">
									<span class="dash-widget-icon"><i class="fa fa-users"></i></span>
									<div class="dash-widget-info">
										<h3>{{$studentCount}}</h3>
										<span>No of Students</span>
									</div>
								</div>
							</div>
						</div>
						<div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
							<div class="card dash-widget">
								<div class="card-body">
									<span class="dash-widget-icon"><i class="fa fa-diamond"></i></span>
									<div class="dash-widget-info">
										<h3>{{$parentCount}}</h3>
										<span>No of parents</span>
									</div>
								</div>
							</div>
						</div>
						<div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
							<div class="card dash-widget">
								<div class="card-body">
									<span class="dash-widget-icon"><i class="fa fa-user"></i></span>
									<div class="dash-widget-info">
										<h3>{{$videosCount}}</h3>
										<span>No of Courses</span>
									</div>
								</div>
							</div>
						</div>
                       <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
							<div class="card dash-widget">
								<div class="card-body">
									<span class="dash-widget-icon"><i class="fa fa-cubes"></i></span>
									<div class="dash-widget-info">
										<h3>{{$newsletterCount}}</h3>
										<span>No of Newsletter</span>
									</div>
								</div>
							</div>
						</div>

						<div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
							<div class="card dash-widget">
								<div class="card-body">
									<span class="dash-widget-icon"><i class="fa fa-cubes"></i></span>
									<div class="dash-widget-info">
										<h3>{{$contactCount}}</h3>
										<span>No of Contact</span>
									</div>
								</div>
							</div>
						</div>


					</div>


					<!-- <div class=""
					<div id="barchart_material" style="width: 900px; height: 500px;"></div> -->

					<div id="chartPie" style="height: 350px;"></div>
					
					

					
						
					<div class="row">
						<div class="col-md-12 d-flex">
							<div class="card card-table flex-fill">
								<div class="card-header">
									<h3 class="card-title mb-0">Latest Registered Users</h3>
								</div>
								<div class="card-body">
									<div class="table-responsive">
										<table class="table custom-table mb-0">
											<thead>
												<tr>
													<th>Name</th>
													<th>Email</th>
													<th>Role</th>
													<th>Action</th>
												</tr>
											</thead>
											<tbody>

												@foreach($incomingUsers as $item)


												<tr>
													<td>
														<h2 class="table-avatar">
														@if($item->roles == "student")
														
														@if($item->avatar == "")
														
														<span> <img height="50" width="50" src="https://cdn-icons-png.flaticon.com/512/3177/3177440.png"></span> 
														
														@else
														<span> <img height="50" width="50" src="/uploads/profilePicture/{!! $item->avatar
															!!}"></span> 
														@endif
														
														
														
														
														@elseif($item->roles == "parent")
														
														
														@if($item->parentImage == "")
														
														<span> <img height="50" width="50" src="https://cdn-icons-png.flaticon.com/512/3177/3177440.png"></span> 
														
														@else
														<span> <img height="50" width="50" src="/uploads/profilePicture/{!! $item->parentImage
															!!}"></span> 
														@endif
														

												
														@else

														<span> <img height="50" width="50" src="https://cdn-icons-png.flaticon.com/512/3177/3177440.png"></span>  

														
														@endif
																									
															
															<a href="client-profile">{!!$item->name!!}</a>
														</h2>
													</td>
													<td><a href="mailto:{!!$item->email!!}">{!!$item->email!!}</a></td>

													<td>{!!$item->roles!!}</td>
													<td>
														<div class="dropdown action-label">
															<a class="btn btn-white btn-sm btn-rounded dropdown-toggle" href="#" data-toggle="dropdown" aria-expanded="false">
																<i class="fa fa-dot-circle-o text-success"></i> Action
															</a>
															<div class="dropdown-menu dropdown-menu-right">
															    {{-- <a class="dropdown-item" href="javascript:void(0)"><i class="fa fa-pencil m-r-5"></i> Edit</a> --}}
																<a class="dropdown-item" onclick="return confirm('Are you sure?')"  href="user/{{$item->id}}/delete"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
															</div>
														</div>
													</td>
													
												</tr>



												@endforeach


											</tbody>
										</table>


										 



									</div>
								</div>
								<!-- <div class="card-footer">
									<a href="/manage/client">View all clients</a>
								</div> -->
							</div>
						</div>
						



					</div>
				
				</div>
				<!-- /Page Content -->

            </div>
			<!-- /Page Wrapper -->




			
            @endsection