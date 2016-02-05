<?php

$user = Auth::user();
$email = $user->email;

?>
<!DOCTYPE html>
<html lang="en">
<head>

	<!-- start: Meta -->
	<meta charset="utf-8">
	<title>{{ $title or 'Default' }}</title>
	<!-- end: Meta -->

	<!-- start: Mobile Specific -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- end: Mobile Specific -->
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<!-- start: CSS -->
	<link id="bootstrap-style" href="<?=asset('theme/css/bootstrap.min.css');?>" rel="stylesheet">
	<link href="<?=asset('theme/css/bootstrap-responsive.min.css');?>" rel="stylesheet">
	<link id="base-style" href="<?=asset('theme/css/style.css');?>" rel="stylesheet">
	<link id="base-style" href="<?=asset('theme/css/custom.css');?>" rel="stylesheet">
	<link id="base-style-responsive" href="<?=asset('theme/css/style-responsive.css');?>" rel="stylesheet">
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800&subset=latin,cyrillic-ext,latin-ext' rel='stylesheet' type='text/css'>

	<!-- end: CSS -->


	<!-- The HTML5 shim, for IE6-8 support of HTML5 elements -->
	<!--[if lt IE 9]>
	  	<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<link id="ie-style" href="<?=asset('theme/css/ie.css')?>" rel="stylesheet">
	<![endif]-->

	<!--[if IE 9]>
		<link id="ie9style" href="<?=asset('theme/css/ie9.css')?>" rel="stylesheet">
	<![endif]-->

	<!-- start: Favicon -->
	<link rel="shortcut icon" href="<?=asset('theme/img/favicon.ico')?>">
	<!-- end: Favicon -->
    <link rel="stylesheet" type="text/css" href="<?=asset('theme/clock/dist/bootstrap-clockpicker.min.css')?>">
    <link rel="stylesheet" type="text/css" href="<?=asset('theme/clock/assets/css/github.min.css')?>">



</head>

<body>
		<!-- start: Header -->
	<div class="navbar">
		<div class="navbar-inner">
			<div class="container-fluid">
				<a class="btn btn-navbar" data-toggle="collapse" data-target=".top-nav.nav-collapse,.sidebar-nav.nav-collapse">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</a>
				<a class="brand" href="index.html"><span>Tweet A Matic</span></a>

				<!-- start: Header Menu -->
				<div class="nav-no-collapse header-nav">
					<ul class="nav pull-right">
						<li class="dropdown hidden-phone" id="notifications">
							<a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
								<i class="icon-bell"></i>
								<span class="badge red notCo"></span>
							</a>
							<ul class="dropdown-menu notifications">
								<li class="dropdown-menu-title">
 									<span>You have <span class="notCo"></span> notifications</span>
									<a href="#refresh"><i class="icon-repeat"></i></a>
								</li>
                                <div class="noti">
                                  <li>

                                  </li>
                                 </div>
                                <li class="dropdown-menu-sub-footer">
                            		<a href="view-notifications">View all notifications</a>
								</li>
							</ul>
						</li>
						<!-- start: Notifications Dropdown -->
						<li class="dropdown hidden-phone">
							<a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
								<i class="icon-calendar"></i>
								<span class="badge red">
								5 </span>
							</a>
							<ul class="dropdown-menu tasks">
								<li class="dropdown-menu-title">
 									<span>You have 17 tasks in progress</span>
									<a href="#refresh"><i class="icon-repeat"></i></a>
								</li>

                                <li>
                                    <a href="#">
										<span class="header">
											<span class="title">Android Development</span>
											<span class="percent"></span>
										</span>
                                        <div class="taskProgress progressSlim green">47</div>
                                    </a>
                                </li>

								<li>
                            		<a class="dropdown-menu-sub-footer">View all tasks</a>
								</li>
							</ul>
						</li>
						<!-- end: Notifications Dropdown -->
						<!-- start: Message Dropdown -->
						<li class="dropdown hidden-phone">
							<a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
								<i class="icon-envelope"></i>
								<span class="badge red">
								4 </span>
							</a>
							<ul class="dropdown-menu messages">
								<li class="dropdown-menu-title">
 									<span>You have 9 messages</span>
									<a href="#refresh"><i class="icon-repeat"></i></a>
								</li>

                                <li>
                                    <a href="#">
										<span class="avatar"><img src="img/avatar.jpg" alt="Avatar"></span>
										<span class="header">
											<span class="from">
										    	Dennis Ji
										     </span>
											<span class="time">
										    	Jul 25, 2012
										    </span>
										</span>
                                        <span class="message">
                                            Lorem ipsum dolor sit amet consectetur adipiscing elit, et al commore
                                        </span>
                                    </a>
                                </li>
								<li>
                            		<a class="dropdown-menu-sub-footer">View all messages</a>
								</li>
							</ul>
						</li>

						<!-- start: User Dropdown -->
						<li class="dropdown">
							<a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
								<i class="halflings-icon white user"></i> {{$user->name}}
								<span class="caret"></span>
							</a>
							<ul class="dropdown-menu">
								<li class="dropdown-menu-title">
 									<span>Account Settings</span>
								</li>
								<li><a href="/user/profile"><i class="halflings-icon user"></i> Profile</a></li>
								<li><a href="auth/logout"><i class="halflings-icon off"></i> Logout</a></li>
							</ul>
						</li>
						<!-- end: User Dropdown -->
					</ul>
				</div>
				<!-- end: Header Menu -->

			</div>
		</div>
	</div>
	<!-- start: Header -->

		<div class="container-fluid-full">
		<div class="row-fluid">

			<!-- start: Main Menu -->
			<div id="sidebar-left" class="span2">
				<div class="nav-collapse sidebar-nav">
					<ul class="nav nav-tabs nav-stacked main-menu">
						<li><a href="/home"><i class="icon-bar-chart"></i><span class="hidden-tablet"> Dashboard</span></a></li>
						<li><a href="/shedule-posts"><i class="icon-tasks"></i><span class="hidden-tablet">Posts</span></a></li>

						<li><a href="/clients"><i class="icon-file-alt"></i><span class="hidden-tablet">Clients</span></a></li>


						<li><a href="/media"><i class="icon-edit"></i><span class="hidden-tablet">Media</span></a></li>




						<li><a href="/calendar"><i class="icon-calendar"></i><span class="hidden-tablet"> Calendar</span></a></li>


						<li><a href="/logout"><i class="icon-lock"></i><span class="hidden-tablet">Sign Out</span></a></li>
					</ul>
				</div>
			</div>
			<!-- end: Main Menu -->

			<noscript>
				<div class="alert alert-block span10">
					<h4 class="alert-heading">Warning!</h4>
					<p>You need to have <a href="http://en.wikipedia.org/wiki/JavaScript" target="_blank">JavaScript</a> enabled to use this site.</p>
				</div>
			</noscript>

			<!-- start: Content -->
			<script src="<?=asset('theme/js/jquery-1.9.1.min.js')?>"></script>
			<div id="content" class="span10">

                @yield('content')



	        </div><!--/.fluid-container-->

			<!-- end: Content -->
		</div><!--/#content.span10-->
		</div><!--/fluid-row-->

	<div class="modal hide fade" id="myModal">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal">×</button>
			<h3>Settings</h3>
		</div>
		<div class="modal-body">
			<p>Here settings can be configured...</p>
		</div>
		<div class="modal-footer">
			<a href="#" class="btn" data-dismiss="modal">Close</a>
			<a href="#" class="btn btn-primary">Save changes</a>
		</div>
	</div>

	<div class="common-modal modal fade" id="common-Modal1" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-content">
			<ul class="list-inline item-details">
				<li><a href="http://themifycloud.com">Admin templates</a></li>
				<li><a href="http://themescloud.org">Bootstrap themes</a></li>
			</ul>
		</div>
	</div>

	<div class="clearfix"></div>

	<footer>

		<p>
			<span style="text-align:left;float:left">&copy; {{date('Y')}} Eagle Post</span>

		</p>

	</footer>

	<!-- start: JavaScript-->


	    <script src="<?=asset('theme/js/jquery-migrate-1.0.0.min.js')?>"></script>

		<script src="<?=asset('theme/js/jquery-ui-1.10.0.custom.min.js')?>"></script>

		<script src="<?=asset('theme/js/jquery.ui.touch-punch.js')?>"></script>

		<script src="<?=asset('theme/js/modernizr.js')?>"></script>

		<script src="<?=asset('theme/js/bootstrap.min.js')?>"></script>

		<script src="<?=asset('theme/js/jquery.cookie.js')?>"></script>

		<script src="<?=asset('theme/js/fullcalendar.min.js')?>"></script>

		<script src="<?=asset('theme/js/jquery.dataTables.min.js')?>"></script>

		<script src="<?=asset('theme/js/excanvas.js')?>"></script>
        <script src="<?=asset('theme/js/jquery.flot.js')?>"></script>
        <script src="<?=asset('theme/js/jquery.flot.pie.js')?>"></script>
        <script src="<?=asset('theme/js/jquery.flot.stack.js')?>"></script>
        <script src="<?=asset('theme/js/jquery.flot.resize.min.js')?>"></script>

		<script src="<?=asset('theme/js/jquery.chosen.min.js');?>"></script>

		<script src="<?=asset('theme/js/jquery.uniform.min.js');?>"></script>

		<script src="<?=asset('theme/js/jquery.cleditor.min.js');?>"></script>

		<script src="<?=asset('theme/js/jquery.noty.js');?>"></script>

		<script src="<?=asset('theme/js/jquery.elfinder.min.js');?>"></script>

		<script src="<?=asset('theme/js/jquery.raty.min.js');?>"></script>

		<script src="<?=asset('theme/js/jquery.iphone.toggle.js');?>"></script>

		<script src="<?=asset('theme/js/jquery.uploadify-3.1.min.js');?>"></script>

		<script src="<?=asset('theme/js/jquery.gritter.min.js');?>"></script>

		<script src="<?=asset('theme/js/jquery.imagesloaded.js');?>"></script>

		<script src="<?=asset('theme/js/jquery.masonry.min.js');?>"></script>

		<script src="<?=asset('theme/js/jquery.knob.modified.js');?>"></script>

		<script src="<?=asset('theme/js/jquery.sparkline.min.js');?>"></script>

		<script src="<?=asset('theme/js/counter.js');?>"></script>

		<script src="<?=asset('theme/js/retina.js');?>"></script>

		<script src="<?=asset('theme/js/custom.js');?>"></script>

		<script src="<?=asset('theme/js/posts.js');?>"></script>


	<!-- end: JavaScript-->

</body>
</html>
