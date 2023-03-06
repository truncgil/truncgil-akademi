<?php 



if(getisset("ajax")) {
	?>
	@include("admin-ajax.{$_GET['ajax']}")
	<?php
	exit();
} ?>
<?php if(getisset("ajax2")) { //blade ajax system
	?>
	@include("{$_GET['ajax2']}")
	<?php
	exit();
} ?>
@php
	$permissions = @explode(",",Auth::user()->permissions);
@endphp
<?php $u = u(); ?>
<!DOCTYPE HTML>
<html lang="{{App::getLocale()}}">

<head>	
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>{!! strip_tags($__env->yieldContent('title','')) !!}</title>
    <meta name="description" content="">
    <meta name="author" content="Truncgil Technology">
    <meta property="og:title" content="">
    <meta property="og:site_name" content="https://www.truncgil.com.tr/">
    <meta property="og:description" content="">
    <meta property="og:type" content="app">
    <meta property="og:url" content>
    <meta property="og:image" content>
	<div class="header-zone">
    <link rel="apple-touch-icon" sizes="180x180" href="{{url("assets/favicon.png")}}">
    <link rel="shortcut icon" href="{{url("assets/favicon.png")}}" type="image/png">
    @include("admin.inc.plugins")
</div>
</head>

<body> 
@guest
	@yield("content")
@else
    <div id="page-container" class="sidebar-o enable-page-overlay side-scroll page-header-fixed page-header-glass side-trans-enabled">
       
		
		<aside id="side-overlay">
            <div class="content-header content-header-fullrow">
                <div class="content-header-section align-parent">
                    <button type="button" class="btn btn-circle btn-dual-secondary align-v-r" data-toggle="layout" data-action="side_overlay_close">
                        <i class="fa fa-times text-danger"></i>
                    </button>
                    <div class="content-header-item">
                        <img class="img-avatar img-avatar32" src="{{asset('assets/img/user.jpg')}}" alt="">
                        <a class="align-middle text-primary-dark font-w600"
                            href="#">
							
                           {{ Auth::user()->name }}  {{ Auth::user()->surname }}
						   
						   <small class="badge badge-success">
                            {{ Auth::user()->level }}</small>
                            <!-- Müşteri/Admin ismi -->
                        </a>
                        <div class="text-center mb-10">
                            <a class="btn btn-info mx-auto" href="{{url('logout')}}">
                                        <i class="si si-logout mr-5"></i> {{__('Sign Out')}}
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-side">
				<div class="block pull-r-l">
                    <div class="block-header bg-body-light">
                        <h3 class="block-title">
                            <i class="fas fa-file"></i>
                            {{__('Profile Settings')}}
                        </h3>
                        <div class="block-options">
                            
                            <button type="button" class="btn-block-option" data-toggle="block-option" data-action="content_toggle"><i class="si si-arrow-up"></i></button>
                        </div>
                    </div>
                    @include("admin.inc.profile-info")
                    <div class="text-center">
                <?php $dizi = glob("resources/{,*/,*/*/,*/*/*/}*.php", GLOB_BRACE);  
                array_multisort(array_map('filemtime', $dizi), SORT_NUMERIC, SORT_DESC, $dizi);
                //echo $dizi[0];
                //$ver = filemtime($dizi[0]); 
                $ver = date("y.d.h.is",filemtime($dizi[0])); 
                $last = date("d.m.Y H:i:s",filemtime($dizi[0])); 

                $ver = str_replace("0","",$ver); 
                $ver = "2.30";
                ?>
                <div class="d-none">
                    <div class="btn"> <i class="fa fa-clock"></i> {{e2("Server Time:")}}  {{date("d.m.Y H:i")}}</div>
                    <div class="btn" title="{{e2("Last Update:")}} {{$last}}"> <i class="fa fa-code-branch"></i> {{e2("Version:")}}  {{$ver}} RC</div>
                </div>
            </div>
                </div>
                
               
                
                
                
            </div>
        </aside>

        
        <nav id="sidebar">
            <div class="sidebar-content">

                <div class="content-side content-side-full content-side-user px-10 align-parent">
                    <!-- Visible only in mini mode -->
                    <div class="sidebar-mini-visible-b align-v animated fadeIn">
                        <img class="img-fluid" src="{{ url("assets/logo.svg") }}" alt="">
                    </div>
                    <!-- END Visible only in mini mode -->

                    <!-- Visible only in normal mode -->
                    <div class="sidebar-mini-hidden-b text-center">
                        <a class="img-link" href="#">
                            <img class="img-fluid" src="{{ url("assets/logo.svg") }}" alt="">
                        </a>
                        <a class="text-center text-dual-primary-dark font-size-xs font-w600"
                                    href="#">{{ Auth::user()->name }}  {{ Auth::user()->surname }}</a>
                        
                                    <div class="text-center badge badge-success">{{ Auth::user()->level }}</div>
                        <ul class="list-inline mt-10">
                            <li class="list-inline-item">
                                
                            </li>
                            <li class="list-inline-item">
                                <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
                                <a class="text-dual-primary-dark" data-toggle="layout"
                                    data-action="sidebar_style_inverse_toggle" href="javascript:void(0)">
                                    <i class="si si-drop"></i>
                                </a>
                            </li>
                            <li class="list-inline-item">
                                <a class="text-dual-primary-dark" href="{{url("logout")}}">
                                    <i class="si si-logout"></i>
                                </a>
                               
                            </li>
                            <li class="list-inline-item">
                            
                            </li>
                            
                        </ul>
                    </div>
                    <!-- END Visible only in normal mode -->
                </div>
              
               
               @include("admin.inc.menu");
            </div>
        </nav>

        
        <header id="page-header">
            <div class="content-header">
                <div class="content-header-section">
                    <button type="button" class="btn btn-circle btn-dual-secondary" data-toggle="layout"
                        data-action="sidebar_toggle">
                        <i class="fas fa-bars"></i>
                    </button>
                    <button type="button" class="btn btn-circle btn-dual-secondary" data-toggle="layout"
                        data-action="header_search_on">
                        <i class="fas fa-search"></i>
                    </button>
                </div>
                <style>
                .yesprint {
                    display:none;
                }
                
                @media print {
                    .sidebar,.noprint {
                        display:none;
                    }
                    body {
                        background:white;
                    }
                    .yesprint {
                        display:block;
                    }
                }
                
            </style>
                <div class="content-header-section">
               
         
                    <div class="btn-group" role="group">

						
                        <a onclick="$.get('{{url("clear-cache")}}'); $(this).html('Clear!');" target="_blank" class="btn btn-primary text-white d-none"><i class="fa fa-sync"></i> {{__('Clear cache')}}</a>
                        
                       <button type="button" class="btn btn-rounded btn-dual-secondary " id="language-dropdown"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fa fa-user d-sm-none"></i>
                            <span class="d-none d-sm-inline-block">{{e2(App::getLocale())}}</span>
                            <!-- Kullanıcı adı -->
                            <i class="fa fa-angle-down ml-5"></i>
                        </button>
                        <div class="dropdown-menu dropdown-menu-right min-width-200"
                            aria-labelledby="language-dropdown">
                            <h5 class="h6 text-center py-10 mb-5 border-b text-uppercase">{{ e2("Change Language") }}</h5>
                           
                            <div class="dropdown-divider"></div>
							<?php $dil = languages(); foreach($dil AS $d) { ?>
                            <a href="#" class="dropdown-item" onclick="$.get('?ajax=set-locale&l={{$d}}',function(){location.reload()})">
                                <i class="fa fa-language mr-5"></i> {{e2($d)}}
                            </a>
							<?php } ?>
                            <!-- Çıkış Yap -->
                        </div>
                  
                       
						<div class="dropdown">
						  <button class="btn  dropdown-toggle" type="button" id="dropdownMenuButton"  data-toggle="layout"
                        data-action="side_overlay_toggle">
                                {{ Auth::user()->name }} {{ Auth::user()->surname }}
							
						  </button>
						  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
							<h5 class="h6 text-center py-10 mb-5 border-b text-uppercase">{{ Auth::user()->name }} {{ Auth::user()->surname }}</h5>
							<a class="dropdown-item" href="{{url('logout')}}">
                                <i class="si si-logout mr-5"></i> {{__('Sign Out')}}
                            </a>
						  </div>
</div>
                    </div>

					
                   <button type="button" class="btn btn-circle btn-dual-secondary d-none" data-toggle="layout"
                        data-action="side_overlay_toggle">
                        <i class="fas fa-bars"></i>
                    </button>
                </div>
            </div>
            <div id="page-header-search" class="overlay-header">
                <div class="content-header content-header-fullrow">
                    <form action="{{url('admin/search')}}" method="get">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <button type="button" class="btn btn-secondary" data-toggle="layout"
                                    data-action="header_search_off">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>
                            <input type="text" class="form-control" value="{{@$q}}" placeholder="{{e2("Ara...")}}"
                                id="q" required  name="q">
                            <div class="input-group-append">
                                <button type="submit" class="btn btn-secondary">
                                    <i class="fas fa-search"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div id="page-header-loader" class="overlay-header bg-primary">
                <div class="content-header content-header-fullrow text-center">
                    <div class="content-header-item">
                        <i class="fa fa-sun-o fa-spin text-white"></i>
                    </div>
                </div>
            </div>
        </header>
		
		<div class="main-container">
			<div class="">
				
				@if (View::hasSection('title'))
				<div class="bg-image" >
					<div class="bg-white-op-90">
						<div class="content content-full content-top">
							<h1 class="text-center">@yield("title")<br /> </h1>
							<div class="text-center d-none">@yield("desc")</div>
							
						</div>
					</div>
				</div>
				@endif
				<div class="content-ajax">
				@yield("content")
				</div>
			</div>
		</div>
		<div class="clearfix"></div>
        <footer id="page-footer" class="opacity-0 t-center">
            <div class="content py-20 font-size-xs clearfix m-0-auto">
                <div class="m-0-auto">
                    Created by <a class="truncgil" href="https://www.truncgil.com.tr/">Truncgil Technology</a>. All rights reserved.
                </div>
                
            </div>
        </footer>
    </div>
	@endguest
    
		<!--
<link rel="stylesheet" href="//cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" />
<script type="text/javascript" src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
-->

@include("admin.inc.script")
<style type="text/css">
		.hidden {
			display:none !important;
		}
		.visible {
			display:block !important;
		}
		.hidden-upload {
			display:none;
			
		}
		.table-responsive {
       /*     background: url(back.png) white center center / contain no-repeat !important; */
            /* background-attachment: fixed !important; */
            background-size: 20% !important;
            background-position: center !important;
        }
		.dz-filename {
							white-space:normal !important;
							    height: 74px;
							
						}
		</style>
<div class="modal fade" id="modal-popin" tabindex="-1" role="dialog" aria-labelledby="modal-popin" aria-hidden="true">
    <div class="modal-dialog modal-dialog-popin" role="document">
        <div class="modal-content">
            <div class="block block-themed block-transparent mb-0">
                <div class="block-header bg-primary-dark">
                    <h3 class="block-title"></h3>
                    <div class="block-options">
                        <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
                            <i class="si si-close"></i>
                        </button>
                    </div>
                </div>
                <div class="block-content">
                </div>
            </div>
            <div class="modal-footer">
                <button  class="btn btn-alt-secondary" data-dismiss="modal">{{__('Hayır')}}</button>
                <a href="#" class="btn btn-alt-success tamam" data-dismiss="modal">
                    <i class="fa fa-check"></i> {{__('Evet')}}
                </a>
            </div>
        </div>
    </div>
</div>

</body>

</html>
<style type="text/css">
.cke_button__easyimageupload {
	display:none !important;
}

</style>
