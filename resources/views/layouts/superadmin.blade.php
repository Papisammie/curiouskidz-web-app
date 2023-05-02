<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
        <meta name="description" content="CuriousKidz -  Admin">
		<meta name="keywords" content="">
        <meta name="author" content="Animoplasty">

        {{-- CSRF Token --}}
                <meta name="csrf-token" content="{{ csrf_token() }}">

        {{-- Scripts --}}
        <script>
            window.Laravel = {!! json_encode([
                'csrfToken' => csrf_token(),
            ]) !!};
        </script>
        <meta name="robots" content="noindex, nofollow">
        
        <title>@hasSection('template_title')@yield('template_title') | @endif {{ config('app.name', Lang::get('titles.app')) }}</title>
		
		<!-- Favicon -->
        <link rel="shortcut icon" type="image/x-icon" href="/curiouskidz.png">
		
		<!-- Bootstrap CSS -->
        <link rel="stylesheet" href="{{url('auth/cdn/css/bootstrap.min.css') }}">
		
		<!-- Fontawesome CSS -->
        <link rel="stylesheet" href="{{url('auth/cdn/css/font-awesome.min.css') }}">
		
		<!-- Lineawesome CSS -->
        <link rel="stylesheet" href="{{url('auth/cdn/css/line-awesome.min.css') }}">
		
		<!-- Chart CSS -->
		<link rel="stylesheet" href="{{url('auth/cdn/plugins/morris/morris.css') }}">
		
		<!-- Main CSS -->
        <link rel="stylesheet" href="{{url('auth/cdn/css/style.css') }}">
		
		<!-- Datatable CSS -->
		<link rel="stylesheet" href="{{url('auth/cdn/css/dataTables.bootstrap4.min.css') }}">
		
		<!-- Select2 CSS -->
		<link rel="stylesheet" href="{{url('auth/cdn/css/select2.min.css') }}">
		
		<!-- Datetimepicker CSS -->
		<link rel="stylesheet" href="{{url('auth/cdn/css/bootstrap-datetimepicker.min.css') }}">

    		<!-- Summernote CSS -->
		<link rel="stylesheet" href="{{url('auth/cdn/plugins/summernote/dist/summernote-bs4.css') }}">
		


		<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!--[if lt IE 9]>
			<script src="assets/js/html5shiv.min.js"></script>
			<script src="assets/js/respond.min.js"></script>
		<![endif]-->

			<!-- FLashy CSS -->

		<link href="//fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
       <link href='//fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700' rel='stylesheet'>
	

		<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.6/dist/sweetalert2.all.min.js"></script>
			<link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/sweetalert2@10.10.1/dist/sweetalert2.min.css'>


	
	
    </head>
	
    <body>
		<!-- Main Wrapper -->
        <div class="main-wrapper">
		
			<!-- Header -->
            <div class="header">
			
				<!-- Logo -->
                <div class="header-left">
                    <a href="/admin/home" class="logo">
                    <img src="/curiouskidz.png" width="70" height="70" alt="/curiouskidz.png">
					</a>
                </div>
				<!-- /Logo -->
				
				<a id="toggle_btn" href="javascript:void(0);">
					<span class="bar-icon">
						<span></span>
						<span></span>
						<span></span>
					</span>
				</a>
				
				<!-- Header Title -->
                <div class="page-title-box">
				<h3>@hasSection('template_title')@yield('template_title') | @endif {{ config('app.name', Lang::get('titles.app')) }}</h3>
                </div>
				<!-- /Header Title -->
				
				<a id="mobile_btn" class="mobile_btn" href="#sidebar"><i class="fa fa-bars"></i></a>
				
				<!-- Header Menu -->
				<ul class="nav user-menu">
				
				
				
					<!-- Flag -->
					<li class="nav-item dropdown has-arrow flag-nav">
						<a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button">
							<img src="https://cdn-icons-png.flaticon.com/512/4628/4628635.png" alt="" height="20"> <span>English</span>
						</a>
						<div class="dropdown-menu dropdown-menu-right">
							<a href="javascript:void(0);" class="dropdown-item">
								<img src="https://cdn-icons-png.flaticon.com/512/4628/4628635.png" alt="" height="16"> English
							</a>
						
						</div>
					</li>
					<!-- /Flag -->
				
					<li class="nav-item dropdown has-arrow main-drop">
						<a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
                                       
                                            <span class="user-img"><img src="https://cdn-icons-png.flaticon.com/512/3177/3177440.png" alt="">
                                       
                                           
						
							<span class="status online"></span></span>
							<span>{{Auth::user()->name}}</span>
						</a>
						<div class="dropdown-menu">
            
                            <a href="" class="dropdown-item" class="btn add-btn" data-toggle="modal" data-target="#signout"> <i class="dropdown-icon fe fe-log-out"></i> Sign out
                                        </a>

             
						</div>
					</li>
				</ul>
				<!-- /Header Menu -->




                



				
				<!-- Mobile Menu -->
				<div class="dropdown mobile-user-menu">
					<a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
					<div class="dropdown-menu dropdown-menu-right">
          
           <a href="" class="dropdown-item" class="btn add-btn" data-toggle="modal" data-target="#add_client"> <i class="dropdown-icon fe fe-log-out"></i> Sign out
                                        </a>
					</div>
				</div>
				<!-- /Mobile Menu -->
				
            </div>
			<!-- /Header -->
			


			<!-- Sidebar -->
            <div class="sidebar" id="sidebar">
                <div class="sidebar-inner slimscroll">
					<div id="sidebar-menu" class="sidebar-menu">
						<ul>


							<li>
								<a href="{{ url('/admin/home') }}"><i class="la la-dashboard"></i> <span> Dashboard</span></a>
							</li><br>

              				 <li>
								<a href="{{ url('/admin/manage/users') }}"><i class="la la-user"></i> <span>Manage Users</span></a>
							</li><br>
							
							<li>
								<a href="{{ url('/admin/getAllGamifiedUsers') }}"><i class="la la-users"></i> <span>Gamified User Analytics</span></a>
							</li><br>

              				<li> 
								<a href="{{ url('/admin/manage/category') }}"><i class="la la-pie-chart"></i> <span>Manage Categories</span></a>
							</li><br>

                            <li>
								<a href="{{ url('/admin/manage/course') }}"><i class="fa fa-television" aria-hidden="true"></i> <span> Manage Videos </span></a>
							</li> <br>

							<li>
								<a href="{{ url('admin/manage/contact') }}"><i class="fa fa-comments-o" aria-hidden="true"></i><span> Manage Contacts</span></a>
							</li><br>

							<li>
								<a href="{{ url('admin/manage/gamifications') }}"><i class="fa fa-trophy" aria-hidden="true"></i><span> Manage Gamifications</span></a>
							</li><br>


							<li>
								<a href="{{ url('admin/manage/newsletter') }}"><i class="fa fa-newspaper-o" aria-hidden="true"></i><span> Manage Newsletters</span></a>
							</li><br>

							<li>
								<a href="{{ url('admin/badges') }}"><i class="fa fa-certificate" aria-hidden="true"></i><span> Manage Badges</span></a>
							</li><br>


							<li>
								<a href="{{ url('admin/testimonial') }}"><i class="fa fa-commenting-o" aria-hidden="true"></i><span> Manage Testimonials</span></a>
							</li>



						</ul>
					</div>
                </div>
            </div>
			<!-- /Sidebar -->

			
		

		

 @yield('content')




 <!-- Task Followers Modal -->
 <div id="comingSoon" class="modal custom-modal fade" role="dialog">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">OOPS SORRY !!!</h5> 
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
			
					<h3 class="text-center">This Feature is not Available</h3>
			</div>
		</div>
	</div>
</div>
<!-- /Task Followers Modal -->





  <!-- Logout Modal -->
            <div class="modal custom-modal fade" id="signout" role="dialog">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-body">
                            <div class="form-header">
                                <h3>Logout</h3>
                                <p>Are you sure want to Logout?</p>
                            </div>
                            <div class="modal-btn delete-action">
                                <div class="row">
                                    <div class="col-6">
                                     <a class="btn btn-primary continue-btn" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                        document.getElementById('logout-form').submit();">
                                        Logout
                                        </a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            @csrf
                                        </form>

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
            <!-- /Logout Client Modal -->






 </div>
		<!-- /Main Wrapper -->








<!-- jQuery -->
<script src="{{url ('auth/cdn/js/jquery-3.2.1.min.js') }}"></script>

<!-- Bootstrap Core JS -->
<script src="{{url ('auth/cdn/js/popper.min.js') }}"></script>
<script src="{{url ('auth/cdn/js/bootstrap.min.js') }}"></script>

<!-- Slimscroll JS -->
<script src="{{url ('auth/cdn/js/jquery.slimscroll.min.js') }}"></script>
<!-- Select2 JS -->
<script src="{{url ('auth/cdn/js/select2.min.js') }}"></script>

<script src="{{url ('auth/cdn/js/jquery-ui.min.js') }}"></script>
<script src="{{url ('auth/cdn/js/jquery.ui.touch-punch.min.js') }}"></script>

<!-- Datetimepicker JS -->
<script src="{{url ('auth/cdn/js/moment.min.js') }}"></script>
<script src="{{url ('auth/cdn/js/bootstrap-datetimepicker.min.js') }}"></script>

<!-- Calendar JS -->
<script src="{{url ('auth/cdn/js/jquery-ui.min.js') }}"></script>
<script src="{{url ('auth/cdn/js/fullcalendar.min.js') }}"></script>
<script src="{{url ('auth/cdn/js/jquery.fullcalendar.js') }}"></script>

<!-- Multiselect JS -->
<script src="{{url ('auth/cdn/js/multiselect.min.js') }}"></script>

<!-- Datatable JS -->
<script src="{{url ('auth/cdn/js/jquery.dataTables.min.js') }}"></script>
<script src="{{url ('auth/cdn/js/dataTables.bootstrap4.min.js') }}"></script>

<!-- Summernote JS -->
<script src="{{url ('auth/cdn/plugins/summernote/dist/summernote-bs4.min.js') }}"></script>


<script src="{{url ('auth/cdn/plugins/sticky-kit-master/dist/sticky-kit.min.js') }}"></script>

<!-- Task JS -->
<script src="{{url ('auth/cdn/js/task.js') }}"></script>


		<!-- Datatable JS -->
		<script src="{{url ('auth/cdn/js/jquery.dataTables.min.js') }}"></script>
		<script src="{{url ('auth/cdn/js/dataTables.bootstrap4.min.js') }}"></script>


    



<!-- Dropfiles JS
<script src="{{url ('auth/cdn/js/dropfiles.js') }}"></script> -->

<!-- Custom JS -->
<script src="{{url ('auth/cdn/js/app.js') }}"></script>
<script>
$(document).ready(function(){





// Read value on page load
$("#result b").html($("#customRange").val());

// Read value on change
$("#customRange").change(function(){
    $("#result b").html($(this).val());
});
});        
$(".header").stick_in_parent({

});
// This is for the sticky sidebar    
$(".stickyside").stick_in_parent({
offset_top: 60
});
$('.stickyside a').click(function() {
$('html, body').animate({
scrollTop: $($(this).attr('href')).offset().top - 60
}, 500);
return false;
});
// This is auto select left sidebar
// Cache selectors
// Cache selectors
var lastId,
topMenu = $(".stickyside"),
topMenuHeight = topMenu.outerHeight(),
// All list items
menuItems = topMenu.find("a"),
// Anchors corresponding to menu items
scrollItems = menuItems.map(function() {
var item = $($(this).attr("href"));
if (item.length) {
  return item;
}
});

// Bind click handler to menu items


// Bind to scroll
$(window).scroll(function() {
// Get container scroll position
var fromTop = $(this).scrollTop() + topMenuHeight - 250;

// Get id of current scroll item
var cur = scrollItems.map(function() {
if ($(this).offset().top < fromTop)
  return this;
});
// Get the id of the current element
cur = cur[cur.length - 1];
var id = cur && cur.length ? cur[0].id : "";

if (lastId !== id) {
lastId = id;
// Set/remove active class
menuItems
  .removeClass("active")
  .filter("[href='#" + id + "']").addClass("active");
}
});
$(function () {
$(document).on("click", '.btn-add-row', function () {
var id = $(this).closest("table.table-review").attr('id');  // Id of particular table
console.log(id);
var div = $("<tr />");
div.html(GetDynamicTextBox(id));
$("#"+id+"_tbody").append(div);
});
$(document).on("click", "#comments_remove", function () {
$(this).closest("tr").prev().find('td:last-child').html('<button type="button" class="btn btn-danger" id="comments_remove"><i class="fa fa-trash-o"></i></button>');
$(this).closest("tr").remove();
});
function GetDynamicTextBox(table_id) {
$('#comments_remove').remove();
var rowsLength = document.getElementById(table_id).getElementsByTagName("tbody")[0].getElementsByTagName("tr").length+1;
return '<td>'+rowsLength+'</td>' + '<td><input type="text" name = "DynamicTextBox" class="form-control" value = "" ></td>' + '<td><input type="text" name = "DynamicTextBox" class="form-control" value = "" ></td>' + '<td><input type="text" name = "DynamicTextBox" class="form-control" value = "" ></td>' + '<td><button type="button" class="btn btn-danger" id="comments_remove"><i class="fa fa-trash-o"></i></button></td>'
}
});
</script>



<!-- If using flash()->important() or flash()->overlay(), you'll need to pull in the JS for Twitter Bootstrap. -->
<!-- <script src="//code.jquery.com/jquery.js"></script>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

<script>
    $('#flash-overlay-modal').modal();
</script>
 -->


</body>
</html>
