<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Curiouskidz</title>

    <link rel="stylesheet" href="/cdn/css/themify-icons.css">
    <link rel="stylesheet" href="/cdn/css/feather.css">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="/curiouskidz.png">
    <!-- Custom Stylesheet -->
    <link rel="stylesheet" href="/cdn/css/style.css">
    <link rel="stylesheet" href="/cdn/css/video-player.css">

    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-HP1WG69GNP"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());

      gtag('config', 'G-HP1WG69GNP');
    </script>

    {{-- CSRF Token --}}
                <meta name="csrf-token" content="{{ csrf_token() }}">

        {{-- Scripts --}}
        <script>
            window.Laravel = {!! json_encode([
                'csrfToken' => csrf_token(),
            ]) !!};
        </script>

    <style type="text/css">.apexcharts-canvas {
  position: relative;
  user-select: none;
  /* cannot give overflow: hidden as it will crop tooltips which overflow outside chart area */
}


/* scrollbar is not visible by default for legend, hence forcing the visibility */
.apexcharts-canvas ::-webkit-scrollbar {
  -webkit-appearance: none;
  width: 6px;
}

.apexcharts-canvas ::-webkit-scrollbar-thumb {
  border-radius: 4px;
  background-color: rgba(0, 0, 0, .5);
  box-shadow: 0 0 1px rgba(255, 255, 255, .5);
  -webkit-box-shadow: 0 0 1px rgba(255, 255, 255, .5);
}

.apexcharts-canvas.apexcharts-theme-dark {
  background: #343F57;
}

.apexcharts-inner {
  position: relative;
}

.apexcharts-text tspan {
  font-family: inherit;
}

.legend-mouseover-inactive {
  transition: 0.15s ease all;
  opacity: 0.20;
}

.apexcharts-series-collapsed {
  opacity: 0;
}

.apexcharts-tooltip {
  border-radius: 5px;
  box-shadow: 2px 2px 6px -4px #999;
  cursor: default;
  font-size: 14px;
  left: 62px;
  opacity: 0;
  pointer-events: none;
  position: absolute;
  top: 20px;
  overflow: hidden;
  white-space: nowrap;
  z-index: 12;
  transition: 0.15s ease all;
}

.apexcharts-tooltip.apexcharts-active {
  opacity: 1;
  transition: 0.15s ease all;
}

.apexcharts-tooltip.apexcharts-theme-light {
  border: 1px solid #e3e3e3;
  background: rgba(255, 255, 255, 0.96);
}

.apexcharts-tooltip.apexcharts-theme-dark {
  color: #fff;
  background: rgba(30, 30, 30, 0.8);
}

.apexcharts-tooltip * {
  font-family: inherit;
}


.apexcharts-tooltip-title {
  padding: 6px;
  font-size: 15px;
  margin-bottom: 4px;
}

.apexcharts-tooltip.apexcharts-theme-light .apexcharts-tooltip-title {
  background: #ECEFF1;
  border-bottom: 1px solid #ddd;
}

.apexcharts-tooltip.apexcharts-theme-dark .apexcharts-tooltip-title {
  background: rgba(0, 0, 0, 0.7);
  border-bottom: 1px solid #333;
}

.apexcharts-tooltip-text-value,
.apexcharts-tooltip-text-z-value {
  display: inline-block;
  font-weight: 600;
  margin-left: 5px;
}

.apexcharts-tooltip-text-z-label:empty,
.apexcharts-tooltip-text-z-value:empty {
  display: none;
}

.apexcharts-tooltip-text-value,
.apexcharts-tooltip-text-z-value {
  font-weight: 600;
}

.apexcharts-tooltip-marker {
  width: 12px;
  height: 12px;
  position: relative;
  top: 0px;
  margin-right: 10px;
  border-radius: 50%;
}

.apexcharts-tooltip-series-group {
  padding: 0 10px;
  display: none;
  text-align: left;
  justify-content: left;
  align-items: center;
}

.apexcharts-tooltip-series-group.apexcharts-active .apexcharts-tooltip-marker {
  opacity: 1;
}

.apexcharts-tooltip-series-group.apexcharts-active,
.apexcharts-tooltip-series-group:last-child {
  padding-bottom: 4px;
}

.apexcharts-tooltip-series-group-hidden {
  opacity: 0;
  height: 0;
  line-height: 0;
  padding: 0 !important;
}

.apexcharts-tooltip-y-group {
  padding: 6px 0 5px;
}

.apexcharts-tooltip-candlestick {
  padding: 4px 8px;
}

.apexcharts-tooltip-candlestick>div {
  margin: 4px 0;
}

.apexcharts-tooltip-candlestick span.value {
  font-weight: bold;
}

.apexcharts-tooltip-rangebar {
  padding: 5px 8px;
}

.apexcharts-tooltip-rangebar .category {
  font-weight: 600;
  color: #777;
}

.apexcharts-tooltip-rangebar .series-name {
  font-weight: bold;
  display: block;
  margin-bottom: 5px;
}

.apexcharts-xaxistooltip {
  opacity: 0;
  padding: 9px 10px;
  pointer-events: none;
  color: #373d3f;
  font-size: 13px;
  text-align: center;
  border-radius: 2px;
  position: absolute;
  z-index: 10;
  background: #ECEFF1;
  border: 1px solid #90A4AE;
  transition: 0.15s ease all;
}

.apexcharts-xaxistooltip.apexcharts-theme-dark {
  background: rgba(0, 0, 0, 0.7);
  border: 1px solid rgba(0, 0, 0, 0.5);
  color: #fff;
}

.apexcharts-xaxistooltip:after,
.apexcharts-xaxistooltip:before {
  left: 50%;
  border: solid transparent;
  content: " ";
  height: 0;
  width: 0;
  position: absolute;
  pointer-events: none;
}

.apexcharts-xaxistooltip:after {
  border-color: rgba(236, 239, 241, 0);
  border-width: 6px;
  margin-left: -6px;
}

.apexcharts-xaxistooltip:before {
  border-color: rgba(144, 164, 174, 0);
  border-width: 7px;
  margin-left: -7px;
}

.apexcharts-xaxistooltip-bottom:after,
.apexcharts-xaxistooltip-bottom:before {
  bottom: 100%;
}

.apexcharts-xaxistooltip-top:after,
.apexcharts-xaxistooltip-top:before {
  top: 100%;
}

.apexcharts-xaxistooltip-bottom:after {
  border-bottom-color: #ECEFF1;
}

.apexcharts-xaxistooltip-bottom:before {
  border-bottom-color: #90A4AE;
}

.apexcharts-xaxistooltip-bottom.apexcharts-theme-dark:after {
  border-bottom-color: rgba(0, 0, 0, 0.5);
}

.apexcharts-xaxistooltip-bottom.apexcharts-theme-dark:before {
  border-bottom-color: rgba(0, 0, 0, 0.5);
}

.apexcharts-xaxistooltip-top:after {
  border-top-color: #ECEFF1
}

.apexcharts-xaxistooltip-top:before {
  border-top-color: #90A4AE;
}

.apexcharts-xaxistooltip-top.apexcharts-theme-dark:after {
  border-top-color: rgba(0, 0, 0, 0.5);
}

.apexcharts-xaxistooltip-top.apexcharts-theme-dark:before {
  border-top-color: rgba(0, 0, 0, 0.5);
}

.apexcharts-xaxistooltip.apexcharts-active {
  opacity: 1;
  transition: 0.15s ease all;
}

.apexcharts-yaxistooltip {
  opacity: 0;
  padding: 4px 10px;
  pointer-events: none;
  color: #373d3f;
  font-size: 13px;
  text-align: center;
  border-radius: 2px;
  position: absolute;
  z-index: 10;
  background: #ECEFF1;
  border: 1px solid #90A4AE;
}

.apexcharts-yaxistooltip.apexcharts-theme-dark {
  background: rgba(0, 0, 0, 0.7);
  border: 1px solid rgba(0, 0, 0, 0.5);
  color: #fff;
}

.apexcharts-yaxistooltip:after,
.apexcharts-yaxistooltip:before {
  top: 50%;
  border: solid transparent;
  content: " ";
  height: 0;
  width: 0;
  position: absolute;
  pointer-events: none;
}

.apexcharts-yaxistooltip:after {
  border-color: rgba(236, 239, 241, 0);
  border-width: 6px;
  margin-top: -6px;
}

.apexcharts-yaxistooltip:before {
  border-color: rgba(144, 164, 174, 0);
  border-width: 7px;
  margin-top: -7px;
}

.apexcharts-yaxistooltip-left:after,
.apexcharts-yaxistooltip-left:before {
  left: 100%;
}

.apexcharts-yaxistooltip-right:after,
.apexcharts-yaxistooltip-right:before {
  right: 100%;
}

.apexcharts-yaxistooltip-left:after {
  border-left-color: #ECEFF1;
}

.apexcharts-yaxistooltip-left:before {
  border-left-color: #90A4AE;
}

.apexcharts-yaxistooltip-left.apexcharts-theme-dark:after {
  border-left-color: rgba(0, 0, 0, 0.5);
}

.apexcharts-yaxistooltip-left.apexcharts-theme-dark:before {
  border-left-color: rgba(0, 0, 0, 0.5);
}

.apexcharts-yaxistooltip-right:after {
  border-right-color: #ECEFF1;
}

.apexcharts-yaxistooltip-right:before {
  border-right-color: #90A4AE;
}

.apexcharts-yaxistooltip-right.apexcharts-theme-dark:after {
  border-right-color: rgba(0, 0, 0, 0.5);
}

.apexcharts-yaxistooltip-right.apexcharts-theme-dark:before {
  border-right-color: rgba(0, 0, 0, 0.5);
}

.apexcharts-yaxistooltip.apexcharts-active {
  opacity: 1;
}

.apexcharts-yaxistooltip-hidden {
  display: none;
}

.apexcharts-xcrosshairs,
.apexcharts-ycrosshairs {
  pointer-events: none;
  opacity: 0;
  transition: 0.15s ease all;
}

.apexcharts-xcrosshairs.apexcharts-active,
.apexcharts-ycrosshairs.apexcharts-active {
  opacity: 1;
  transition: 0.15s ease all;
}

.apexcharts-ycrosshairs-hidden {
  opacity: 0;
}

.apexcharts-selection-rect {
  cursor: move;
}

.svg_select_boundingRect, .svg_select_points_rot {
  pointer-events: none;
  opacity: 0;
  visibility: hidden;
}
.apexcharts-selection-rect + g .svg_select_boundingRect,
.apexcharts-selection-rect + g .svg_select_points_rot {
  opacity: 0;
  visibility: hidden;
}

.apexcharts-selection-rect + g .svg_select_points_l,
.apexcharts-selection-rect + g .svg_select_points_r {
  cursor: ew-resize;
  opacity: 1;
  visibility: visible;
}

.svg_select_points {
  fill: #efefef;
  stroke: #333;
  rx: 2;
}

.apexcharts-canvas.apexcharts-zoomable .hovering-zoom {
  cursor: crosshair
}

.apexcharts-canvas.apexcharts-zoomable .hovering-pan {
  cursor: move
}

.apexcharts-zoom-icon,
.apexcharts-zoomin-icon,
.apexcharts-zoomout-icon,
.apexcharts-reset-icon,
.apexcharts-pan-icon,
.apexcharts-selection-icon,
.apexcharts-menu-icon,
.apexcharts-toolbar-custom-icon {
  cursor: pointer;
  width: 20px;
  height: 20px;
  line-height: 24px;
  color: #6E8192;
  text-align: center;
}

.apexcharts-zoom-icon svg,
.apexcharts-zoomin-icon svg,
.apexcharts-zoomout-icon svg,
.apexcharts-reset-icon svg,
.apexcharts-menu-icon svg {
  fill: #6E8192;
}

.apexcharts-selection-icon svg {
  fill: #444;
  transform: scale(0.76)
}

.apexcharts-theme-dark .apexcharts-zoom-icon svg,
.apexcharts-theme-dark .apexcharts-zoomin-icon svg,
.apexcharts-theme-dark .apexcharts-zoomout-icon svg,
.apexcharts-theme-dark .apexcharts-reset-icon svg,
.apexcharts-theme-dark .apexcharts-pan-icon svg,
.apexcharts-theme-dark .apexcharts-selection-icon svg,
.apexcharts-theme-dark .apexcharts-menu-icon svg,
.apexcharts-theme-dark .apexcharts-toolbar-custom-icon svg {
  fill: #f3f4f5;
}

.apexcharts-canvas .apexcharts-zoom-icon.apexcharts-selected svg,
.apexcharts-canvas .apexcharts-selection-icon.apexcharts-selected svg,
.apexcharts-canvas .apexcharts-reset-zoom-icon.apexcharts-selected svg {
  fill: #008FFB;
}

.apexcharts-theme-light .apexcharts-selection-icon:not(.apexcharts-selected):hover svg,
.apexcharts-theme-light .apexcharts-zoom-icon:not(.apexcharts-selected):hover svg,
.apexcharts-theme-light .apexcharts-zoomin-icon:hover svg,
.apexcharts-theme-light .apexcharts-zoomout-icon:hover svg,
.apexcharts-theme-light .apexcharts-reset-icon:hover svg,
.apexcharts-theme-light .apexcharts-menu-icon:hover svg {
  fill: #333;
}

.apexcharts-selection-icon,
.apexcharts-menu-icon {
  position: relative;
}

.apexcharts-reset-icon {
  margin-left: 5px;
}

.apexcharts-zoom-icon,
.apexcharts-reset-icon,
.apexcharts-menu-icon {
  transform: scale(0.85);
}

.apexcharts-zoomin-icon,
.apexcharts-zoomout-icon {
  transform: scale(0.7)
}

.apexcharts-zoomout-icon {
  margin-right: 3px;
}

.apexcharts-pan-icon {
  transform: scale(0.62);
  position: relative;
  left: 1px;
  top: 0px;
}

.apexcharts-pan-icon svg {
  fill: #fff;
  stroke: #6E8192;
  stroke-width: 2;
}

.apexcharts-pan-icon.apexcharts-selected svg {
  stroke: #008FFB;
}

.apexcharts-pan-icon:not(.apexcharts-selected):hover svg {
  stroke: #333;
}

.apexcharts-toolbar {
  position: absolute;
  z-index: 11;
  max-width: 176px;
  text-align: right;
  border-radius: 3px;
  padding: 0px 6px 2px 6px;
  display: flex;
  justify-content: space-between;
  align-items: center;
}

.apexcharts-menu {
  background: #fff;
  position: absolute;
  top: 100%;
  border: 1px solid #ddd;
  border-radius: 3px;
  padding: 3px;
  right: 10px;
  opacity: 0;
  min-width: 110px;
  transition: 0.15s ease all;
  pointer-events: none;
}

.apexcharts-menu.apexcharts-menu-open {
  opacity: 1;
  pointer-events: all;
  transition: 0.15s ease all;
}

.apexcharts-menu-item {
  padding: 6px 7px;
  font-size: 12px;
  cursor: pointer;
}

.apexcharts-theme-light .apexcharts-menu-item:hover {
  background: #eee;
}

.apexcharts-theme-dark .apexcharts-menu {
  background: rgba(0, 0, 0, 0.7);
  color: #fff;
}

@media screen and (min-width: 768px) {
  .apexcharts-canvas:hover .apexcharts-toolbar {
    opacity: 1;
  }
}

.apexcharts-datalabel.apexcharts-element-hidden {
  opacity: 0;
}

.apexcharts-pie-label,
.apexcharts-datalabels,
.apexcharts-datalabel,
.apexcharts-datalabel-label,
.apexcharts-datalabel-value {
  cursor: default;
  pointer-events: none;
}

.apexcharts-pie-label-delay {
  opacity: 0;
  animation-name: opaque;
  animation-duration: 0.3s;
  animation-fill-mode: forwards;
  animation-timing-function: ease;
}

.apexcharts-canvas .apexcharts-element-hidden {
  opacity: 0;
}

.apexcharts-hide .apexcharts-series-points {
  opacity: 0;
}

.apexcharts-gridline,
.apexcharts-annotation-rect,
.apexcharts-tooltip .apexcharts-marker,
.apexcharts-area-series .apexcharts-area,
.apexcharts-line,
.apexcharts-zoom-rect,
.apexcharts-toolbar svg,
.apexcharts-area-series .apexcharts-series-markers .apexcharts-marker.no-pointer-events,
.apexcharts-line-series .apexcharts-series-markers .apexcharts-marker.no-pointer-events,
.apexcharts-radar-series path,
.apexcharts-radar-series polygon {
  pointer-events: none;
}


/* markers */

.apexcharts-marker {
  transition: 0.15s ease all;
}

@keyframes opaque {
  0% {
    opacity: 0;
  }
  100% {
    opacity: 1;
  }
}


/* Resize generated styles */

@keyframes resizeanim {
  from {
    opacity: 0;
  }
  to {
    opacity: 0;
  }
}

.resize-triggers {
  animation: 1ms resizeanim;
  visibility: hidden;
  opacity: 0;
}

.resize-triggers,
.resize-triggers>div,
.contract-trigger:before {
  content: " ";
  display: block;
  position: absolute;
  top: 0;
  left: 0;
  height: 100%;
  width: 100%;
  overflow: hidden;
}

.resize-triggers>div {
  background: #eee;
  overflow: auto;
}

.contract-trigger:before {
  width: 200%;
  height: 200%;
}</style>


		<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.6/dist/sweetalert2.all.min.js"></script>
			<link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/sweetalert2@10.10.1/dist/sweetalert2.min.css'>


</head>

<body class="color-theme-blue mont-font">

    <div class="preloader"></div>

    
      <!-- Logout modal -->

  <div class="modal bottom fade" style="overflow-y: scroll;" id="ModalLogout" tabindex="-1" role="dialog">
         <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content border-0">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><i class="ti-close text-grey-500"></i></button>
                <div class="modal-body p-3 d-flex align-items-center bg-none">
                    <div class="card shadow-none rounded-0 w-100 p-2 pt-3 border-0">
                        <div class="card-body rounded-0 text-left p-3">
                        <h2 class="fw-700 display1-size display2-md-size mb-4">Are you sure you want to logout?</h2>
                           
                           
                            <div class="col-sm-12 p-0 text-center mt-3 ">
                            <div class="form-group mb-1"> 
                              
                            <button class="btn btn-default" data-dismiss="modal">Cancel</button>
                            
                            <a href="{{ route('logout') }}" class="p-0 btn p-2 lh-24 w100 ml-1 ls-3 d-inline-block rounded-xl btn-danger font-xsssss fw-700 ls-lg text-white"
                                                            onclick="event.preventDefault();
                                                                          document.getElementById('logout-form').submit();">
                                      Log out</a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                            @csrf
                                        </form>
                              </div>
                                
                               
                      
                            </div>
                        </div>
                    </div>                    
                </div>
            </div>
        </div>
    </div>

    
    <div class="main-wrapper">

        <!-- navigation -->
        <nav class="navigation scroll-bar">
            <div class="container pl-0 pr-0">
                <div class="nav-content">
                    <div class="nav-top">
                    <a href="/profile/{{Auth::user()->id}}"><h1 class="fredoka-font ls-3 fw-700 text-current font-xxl">CuriousKidz <span class="d-block font-xsssss ls-1 text-grey-500 open-font ">Online Learning Course</span></h1></a>
                        <!--<a href="/"> <img src="/curiouskidz.png" height="120" width="180"> </a>-->
                       
                        <a href="/profile/{{Auth::user()->id}}" class="close-nav d-inline-block d-lg-none"><i class="ti-close bg-grey mb-4 btn-round-sm font-xssss fw-700 text-dark ml-auto mr-2 "></i></a>
                    </div>
                    <br>
                    <!-- <div class="nav-caption fw-600 font-xssss text-grey-500"><span>New </span>Feeds</div> -->
                    <ul class="mb-3">
                        <li class="logo d-none d-xl-block d-lg-block"></li>
                       
         
                        <li class="flex-lg-brackets"><a href="/profile/{{Auth::user()->id}}"  data-tab="archived" class="nav-content-bttn open-font"><img src="https://cdn-icons-png.flaticon.com/512/1913/1913812.png" width="30" height="30"><span>&nbsp;&nbsp;Academic Library</span></a></li> 
                        
                        <li class="flex-lg-brackets"><a href="/profile/{{Auth::user()->id}}"  data-tab="archived" class="nav-content-bttn open-font"><img src="https://cdn-icons-png.flaticon.com/512/2997/2997592.png" width="30" height="30"><span>&nbsp;&nbsp;Edutainment Library</span></a></li> 
                        
                        <li class="flex-lg-brackets"><a href="/profile/{{Auth::user()->id}}"  data-tab="archived" class="nav-content-bttn open-font"><img src="https://cdn-icons-png.flaticon.com/512/5765/5765355.png" width="30" height="30"><span>&nbsp;&nbsp;Saved Course</span></a></li>

                        <li class="flex-lg-brackets"><a href="/profile/{{Auth::user()->id}}"  data-tab="archived" class="nav-content-bttn open-font"><img src="https://cdn-icons-png.flaticon.com/512/8180/8180239.png" width="30" height="30"><span>&nbsp;&nbsp;Get Rewarded</span></a></li> 

                        <li class="flex-lg-brackets"><a href="/profile/{{Auth::user()->id}}"  data-tab="archived" class="nav-content-bttn open-font"><img src="https://cdn-icons-png.flaticon.com/512/3227/3227076.png" width="30" height="30"><span>&nbsp;&nbsp;My Badges</span></a></li> 
                          
                        <li class="flex-lg-brackets"><a href="/profile/{{Auth::user()->id}}"  class="nav-content-bttn open-font"><img src="https://cdn-icons-png.flaticon.com/512/9131/9131590.png" width="30" height="30"><span>&nbsp;&nbsp;My Profile</span></a></li> 
                       
                        <li class="flex-lg-brackets"><a href="/profile/{{Auth::user()->id}}" data-tab="archived" class="nav-content-bttn open-font"><img src="https://cdn-icons-png.flaticon.com/512/9149/9149046.png" width="30" height="30"><span>&nbsp;&nbsp;Contact Us</span></a></li>                  
                   
                        <li class="flex-lg-brackets"><a href="/profile/{{Auth::user()->id}}" data-tab="archived" class="nav-content-bttn open-font"><img src="https://cdn-icons-png.flaticon.com/512/3815/3815523.png" width="30" height="30"><span>&nbsp;&nbsp;About CuriousKidz</span></a></li>   
                   
                      </ul>

                </div>
            </div>
        </nav>
        <!-- navigation -->




        <!-- main content -->
        <div class="main-content">

        
        

            <div class="middle-sidebar-header bg-white">
                <button class="header-menu"></button>
                <form action="#!" method="POST" class="float-left header-search">
                                        {{ csrf_field() }}
                    <div class="form-group mb-0 icon-input">
                        <i class="feather-search font-lg text-grey-400"></i>
                        <input name="q" type="text" placeholder="Start typing to search.." class="bg-transparent border-0 lh-32 pt-2 pb-2 pl-5 pr-3 font-xsss fw-500 rounded-xl w350">
                    </div>
                </form>


               
          
                <ul class="d-flex ml-auto right-menu-icon">
                    <li>
                        <a href="#!">
                          
                       
                      
                            <span class="dot-count bg-warning"></span><i class="feather-bell font-xl text-current"></i>
                          
                     

                            <div class="menu-dropdown">
                                <h4 class="fw-700 font-xs mb-4">Notification</h4>

                                @foreach($notifier as $item)
                                 
                                  <div class="card bg-transparent-card w-100 border-0 pl-5 mb-3">
                                      <img src="/uploads/course/{{$item->image}}" alt="user" class="w40 position-absolute left-0">
                                      <h5 class="font-xsss text-grey-900 mb-1 mt-0 fw-700 d-block">{{$item->title}} <span class="text-grey-400 font-xsssss fw-600 float-right mt-1">{{ $item->created_at->diffForHumans() }}</span></h5>
                                      <h6 class="text-grey-500 fw-500 font-xssss lh-4">{{$item->message}}</h6>
                                  </div>
                                
                                @endforeach
                               
                            </div>
                        </a>
                    </li>

                    &nbsp;&nbsp;&nbsp;
                    
                            <a href="/profile/{{Auth::user()->id}}"><img src="{{ url('auth/cdn/img/profiles/avatar.png') }}" width="32" height="32">
                              {{Auth::user()->name}}
                            </a>
                         
                   

                            <li><a data-toggle="modal" data-target="#ModalLogout">
                                      <i class="feather-log-out font-xl"></i>
                          </a></li>
              

                    <li></li>

                </ul>

                
            
                
            </div>




            <script type="text/javascript">
                Swal.fire({
                    title: 'Hurray!!!',
                    text: 'Here is your welcome badge, a step away to start, Complete your profile to enjoy all the benefits. redirecting ....',
                    width: 600,
                    type: "success",
                    padding: '3em',
                    timer: 10000,
                    color: '#716add',
                    background: '#fff url(/images/trees.png)',
                    backdrop: `
                        rgba(0,0,123,0.4)
                        url("https://cdn-icons-png.flaticon.com/512/5928/5928444.png")
                        left top
                        no-repeat
                    `
                })
                .then(() => {
                    dispatch(redirect('/profile/{{Auth::user()->id}}'));
                })
            </script>
       

        @if ($errors->has('email'))
        <script type="text/javascript">
            Swal.fire(
              'Error!',
              'The Email is already subscribed to our system',
              'error'
            )
            </script>
        @endif


            <div class="middle-sidebar-bottom">
                <div class="middle-sidebar-left">
                    <div class="row">
                        <div class="col-lg-12 mb-3">
                             <div class="card rounded-xxl p-lg--5 border-0 bg-no-repeat bg-image-contain banner-wrap" style="background-image: url('/smiling-black-girl-using-mobile-phone-at-studio-2022-12-16-08-39-37-utc.jpg');">
                                <div class="card-body p-4">
                                    <h2 class="display3-size fw-400 display2-md-size sm-mt-7 sm-pt-10">Find a perfect <b class="d-lg-block">Academic Courses</b></h2>    
                                  <h4 class="text-black-500 font-xssss fw-500 ml-1 lh-24">Join the EdTech. Platform and get access to our online learning <br>course tailored to your interest</h4>



                                    <form action="/search" method="POST" role="search">
                                        {{ csrf_field() }}
                                    <div class="form-group mt-lg-4 p-3 border-light border p-2 bg-white rounded-lg ">
                                        <div class="row">

                                        
                                            <div class="col-md-4">
                                                <div class="form-group icon-input mb-0">
                                                    <i class="ti-search font-xs text-grey-400"></i>
                                                    <input name="q" type="text" class="style1-input bg-transparent border-0 pl-5 font-xsss mb-0 text-grey-500 fw-500" placeholder="Search online courses..">
                                                </div>
                                            </div>

                                            <div class="col-md-6">

                                            <div class="row">
                                                <div class="form-group icon-input mb-0">
                                                    <i class="ti-package font-xs text-grey-400"></i>
                                                    <select class="style1-select bg-transparent border-0 pl-5" name="cat">
                                                    <option>search by Category</option>
                                                    @foreach($cat as $item)
                                                        <option value="{{$item->title}}">{{$item->title}}</option>
                                                    @endforeach
                                                    </select>
                                                </div>

                                                <div class="form-group icon-input mb-0">
                                                    <i class="ti-package font-xs text-grey-400"></i>
                                                    <select class="style1-select bg-transparent border-0 pl-5" name="ageGroup">

                                                        <option>search by class</option>
                                                        <option value="{{$item->title}}">Primary 1</option>
                                                    
                                                    </select>
                                                </div>
                                            </div>

                                            </div> 
                                            <div class="col-md-2">
                                                <button type="submit" class="w-100 d-block btn bg-current text-white font-xssss fw-600 ls-3 style1-input p-0 border-0 text-uppercase ">Search</button>
                                            </div>
                                        
                                        </div>
                                    </div>
                                    </form>
                                    <h4 class="text-black-500 font-xssss fw-500 ml-1 lh-24"> <b class="text-black-800 text-dark">Popular Search :</b> How to be a developer, How to an engineeer, how to draw ... </h4>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12 pt-2">
                            <h2 class="fw-400 font-lg">Explore <b>Categories</b></h2>
                        </div>

                        <div class="col-lg-12 mt-3">
                            <div class="owl-carousel category-card owl-theme overflow-hidden overflow-visible-xl nav-none">

                                @foreach($getAllCat as $item)

                                <div class="item">
                                    <div class="card cat-card-hover mr-1 w140 border-0 p-4 rounded-lg text-center" style="background-color: #fcf1eb;">
                                        <a href="/profile/{{Auth::user()->id}}">
                                            <div class="card-body p-2 ml-2 ">
                                                <span class="btn-round-xl bg-white"><img src="{{url ('uploads/category') }}/{{$item->image}}" alt="{{url ('uploads/category') }}/{{$item->image}}" class="p-2"></span>
                                                <h4 class="fw-600 font-xsss mt-3 mb-0">{{$item->title}} 
                                                  <!-- <span class="d-block font-xsssss fw-500 text-grey-500 mt-2">{{ substr($item->description, 0,  10) }}</span> -->
                                                </h4>
                                            </div>
                                        </a>
                                    </div>
                                </div>

                                @endforeach

                              

                                  
                            </div>
                        </div>

                       
                        

                        <div class="col-lg-12 pt-4 mb-3">
                            <h2 class="fw-400 font-lg d-block">Most <b> Watched Courses</b></h2>
                        </div>

                        <div class="col-lg-12 pt-2">
                            <div class="owl-carousel category-card owl-theme overflow-hidden overflow-visible-xl nav-none">


                           
                            

                            @foreach($mostwatch as $item)
                                <div class="item">
                                    <div class="card course-card w300 p-0 shadow-xss border-0 rounded-lg overflow-hidden mr-1 mb-4">
                                        <div class="card-image w-70 mb-3">
                                            <a href="/profile/{{Auth::user()->id}}" class="video-bttn position-relative d-block"><img src="/uploads/course/{{$item->course_images}}" width="150" height="200" alt="Course image"  class="w-70"></a>
                                        </div>
                                        <div class="card-body pt-0">
                                            <span class="font-xsssss fw-700 pl-3 pr-3 lh-32 text-uppercase rounded-lg ls-2 alert-warning d-inline-block text-warning mr-1">{{$item->course_cat}}</span>
                                            <span class="font-xss fw-700 pl-3 pr-3 ls-2 lh-32 d-inline-block text-success float-right">
                                                <!-- <span class="font-xsssss">$</span>  -->
                                                Free</span>
                                            <h4 class="fw-700 font-xss mt-3 lh-28 mt-0"><a href="/profile/{{Auth::user()->id}}" class="text-dark text-grey-900">{{ substr($item->course_title, 0,  50) }} </a></h4>
                                            <!-- <h6 class="font-xssss text-grey-500 fw-600 ml-0 mt-2"> 32 Lesson </h6> -->
                                            <!-- <ul class="memberlist mt-3 mb-2 ml-0 d-block">
                                                <li><a href="default.html#"><img src="images/user-6.png" alt="user" class="w30 d-inline-block"></a></li>
                                                <li><a href="default.html#"><img src="images/user-7.png" alt="user" class="w30 d-inline-block"></a></li>
                                                <li><a href="default.html#"><img src="images/user-8.png" alt="user" class="w30 d-inline-block"></a></li>
                                                <li><a href="default.html#"><img src="images/user-3.png" alt="user" class="w30 d-inline-block"></a></li>
                                                <li class="last-member"><a href="default.html#" class="bg-greylight fw-600 text-grey-500 font-xssss ls-3 text-center">+2</a></li>
                                                <li class="pl-4 w-auto"><a href="default.html#" class="fw-500 text-grey-500 font-xssss">Student apply</a></li>
                                            </ul> -->
                                        </div>
                                    </div>
                                </div>
                            @endforeach

                           

                            </div>
                        </div>

               

                <br> <br>

                        
                             <div class="card d-block w-100 border-0 shadow-xss rounded-lg overflow-hidden p-lg-2">
                                <div class="card-body mb-lg-3 pb-0"><h2 class="fw-400 font-lg d-block">Recommended  <b>Courses</b> </h2></div>
                                <div class="card-body pb-0">
                                    <div class="row">
                                        
                                        
                                    @foreach($getLatestCourses as $item)
                                        <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 mb-4">
                                            <div class="card w-100 p-0 shadow-xss border-0 rounded-lg overflow-hidden mr-1">
                                                <div class="card-image w-100 mb-3">
                                                    <a href="/profile/{{Auth::user()->id}}" class="video-bttn position-relative d-block"><img src="/uploads/course/{{$item->image}}" alt="image" class="w-100"></a>
                                                </div>
                                                <div class="card-body pt-0">
                                                    <span class="font-xsssss fw-700 pl-3 pr-3 lh-32 text-uppercase rounded-lg ls-2 alert-warning d-inline-block text-warning mr-1">{{$item->cat_id}}</span>
                                                    <span class="font-xss fw-700 pl-3 pr-3 ls-2 lh-32 d-inline-block text-success float-right"><span class="font-xsssss"></span> Free</span>
                                                    <h4 class="fw-700 font-xss mt-3 lh-28 mt-0"><a href="/profile/{{Auth::user()->id}}" class="text-dark text-grey-900">{{ substr($item->title, 0,  50) }} </a></h4>
                                                   
                                                    
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach



                                    </div>  
                                </div>
                            </div>
                           
                      
                      
                      
                     
                                        
                        
                      <div class="col-lg-12 pt-0 mb-3">
                          <br>    
                            <h2 class="fw-400 font-lg d-block"><b>Testimonials </b></h2>
                        </div>
                        
                        <div class="col-lg-12 pt-2">
                            <div class="owl-carousel category-card owl-theme overflow-hidden overflow-visible-xl nav-none owl-loaded owl-drag">
                                

     
                                
                            <div class="owl-stage-outer"><div class="owl-stage" style="transform: translate3d(0px, 0px, 0px); transition: all 0s ease 0s; width: 1470px;">
                                
                                
                                 @foreach($testimonial as $item)
                                <div class="owl-item active" style="width: auto; margin-right: 10px;"><div class="item">
                                    <div class="card w200 d-block border-0 shadow-xss rounded-lg overflow-hidden mb-4">
                                        <div class="card-body position-relative h100 bg-gradiant-bottom bg-image-cover bg-image-center" style="background-image: url('images/c-3.png');"></div>
                                        <div class="card-body d-block w-100 pl-4 pr-4 pb-4 text-center">
                                            
                                            
                                            @if($item->image == '')
                                            <figure class="avatar ml-auto mr-auto mb-0 mt--6 position-relative w75 z-index-1"><img src="/images/user-11.png" alt="image" class="float-right p-1 bg-white rounded-circle w-100" style="opacity: 1;"></figure>
                                            @else
                                            <figure class="avatar ml-auto mr-auto mb-0 mt--6 position-relative w75 z-index-1"><img src="uploads/testimonial/{{$item->image}}" alt="image" class="float-right p-1 bg-white rounded-circle w-100" style="opacity: 1;"></figure>
                                            

                                            @endif
                                            
                                            
                                            
                                          
                                            <div class="clearfix"></div>
                                            <h4 class="fw-700 font-xsss mt-3 mb-1">{{$item->title}} </h4>
                                            <p class="fw-500 font-xsssss text-grey-500 mt-0 mb-2">{{ substr($item->description, 0,  20) }}... </p>
                                           
                                        </div>
                                    </div>
                                </div></div>
                                 @endforeach
                                
                                
                              
                                
                       
                                
                                
                                
                                
                                </div></div><div class="owl-nav"><button type="button" role="presentation" class="owl-prev disabled"><i class="ti-angle-left"></i></button><button type="button" role="presentation" class="owl-next"><i class="ti-angle-right"></i></button></div><div class="owl-dots disabled"></div></div>
                        </div>
                        
     
                
            
            </div>    
            
            
               
            </div>             


            </div>
        <!-- main content -->


       
        <div class="app-footer border-0 shadow-lg">
        @if (Auth::user())
                <a href="/home" class="nav-content-bttn nav-center"><i class="feather-home"></i></a>
                
                <a href="/mybadge/{{Auth::user()->name}}" data-tab="archived" class="nav-content-bttn"><img src="https://cdn-icons-png.flaticon.com/512/3227/3227076.png" width="30" height="30"></a>
                
                <a href="{{ url('/watch/later/view') }}/{{Auth::user()->id}}" data-tab="archived" class="nav-content-bttn sidebar-layer"><img src="https://cdn-icons-png.flaticon.com/512/5765/5765355.png" width="30" height="30"></a>
                
        
                
                <a href="/profile/{{Auth::user()->id}}" class="nav-content-bttn"><img src="https://cdn-icons-png.flaticon.com/512/9131/9131590.png" class="w30 shadow-xss" width="30" height="30"></a>
 
                
                <a class="nav-content-bttn" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                      <i class="feather-log-out font-xl"></i></a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                            @csrf
                                        </form></a>
               
        @endif 
        </div>





        <div class="app-header-search">
            <form class="search-form">
                <div class="form-group searchbox mb-0 border-0 p-1">
                    <input type="text" class="form-control border-0" placeholder="Search...">
                    <i class="input-icon">
                        <ion-icon name="search-outline" role="img" class="md hydrated" aria-label="search outline"></ion-icon>
                    </i>
                    <a href="default.html#" class="ml-1 mt-1 d-inline-block close searchbox-close">
                        <i class="ti-close font-xs"></i>
                    </a>
                </div>
            </form>
        </div>

    </div> 



    







    <script src="/cdn/js/plugin.js"></script>

    <script src="/cdn/js/apexcharts.min.js"></script> 
    <script src="/cdn/js/chart.js"></script> 
    <script src="/cdn/js/scripts.js"></script>

    <script src="/cdn/js/video-player.js"></script>
    
</body>

</html>

        

