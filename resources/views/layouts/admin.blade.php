<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title>@yield('title')</title>
		<!-- Tell the browser to be responsive to screen width -->
		<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
		<!-- Bootstrap 3.3.6 -->
		<link href="{{ asset('/css/bootstrap.min.css') }}" rel="stylesheet">
		<link href="{{ asset('/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
		<!-- Theme style -->
		<link href="{{ asset('css/AdminLTE.min.css') }}" rel="stylesheet">
		<link href="{{ asset('css/skins/skin-blue.min.css') }}" rel="stylesheet">
		<script src="{{ asset('plugins/jQuery/jquery-2.2.3.min.js') }}"></script>
	</head>
 	<body class="hold-transition skin-blue sidebar-mini">
		<div class="wrapper">
			<!-- loader div -->
			<div id="overlay" class="hide loading-hold">
				<div class="loader"></div>
			</div>
      		<!-- End here  -->
			<header class="main-header">
				<!-- Logo -->
				<a href="index2.html" class="logo">
					 <!-- mini logo for sidebar mini 50x50 pixels -->
					 <span class="logo-mini"><b>A.P</b></span>
					 <!-- logo for regular state and mobile devices -->
					 <span class="logo-lg"><b>Admin Pannel</b></span>
				</a>
				<!-- Header Navbar: style can be found in header.less -->
				<nav class="navbar navbar-static-top">
					 <!-- Sidebar toggle button-->
					<a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
					 	<span class="sr-only">Toggle navigation</span>
					</a>
					<div class="navbar-custom-menu">
						<ul class="nav navbar-nav">
							<li class="dropdown user user-menu">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown">
									<img src="{{asset('img/avatar5.png') }}" class="user-image" alt="User Image">
									<span class="hidden-xs">{{Auth::user()->name}}</span>
								</a>
								<ul class="dropdown-menu">
									 <!-- Menu Footer-->
									<li class="user-footer">
										<div class="pull-left">
											 <a href="#" class="btn btn-default btn-flat">Profile</a>
										</div>
										<div class="pull-right">
											 <a href="{{route("logout")}}" class="btn btn-default btn-flat">Log out</a>
										</div>
									</li>
								</ul>
							</li>
						</ul>
					</div>
				</nav>
			</header>
			 <!-- Left side column. contains the logo and sidebar -->
			<aside class="main-sidebar">
				<!-- sidebar: style can be found in sidebar.less -->
				<section class="sidebar">
					 <!-- sidebar menu: : style can be found in sidebar.less -->
					<ul class="sidebar-menu">
						<li class="treeview">
							<a href="{{ route('dashboard')}}">
								<i class="fa fa-dashboard"></i> <span>Dashboard</span>
								<span class="pull-right-container"></span>
							</a>
						</li>
						<li class="treeview">
							<a href="{{ route('nps-forms.index')}}">
								<i class="fa  fa-plus-square-o"></i> <span>Create NPS</span>
								<span class="pull-right-container"></span>
							</a>
						</li>
						<li class="treeview">
							<a href="{{ route('email-nps.index')}}">
								<i class="fa fa-envelope"></i> <span>Email NPS</span>
								<span class="pull-right-container"></span>
							</a>
						</li>
						<li class="treeview">
							<a href="{{ route('nps-key.index')}}">
								<i class="fa fa-key"></i> <span>NPS Keys</span>
								<span class="pull-right-container"></span>
							</a>
						</li>
					</ul>
				</section>
					<!-- /.sidebar -->
		 	</aside>
			 <!-- Content Wrapper. Contains page content -->
			<div class="content-wrapper">
				@if(Session::has('status') != null )
					<div class="alert alert-{{Session::get('status')}}">
						{{Session::get('msg')}}
					</div>
				@endif
				@yield('content')
			</div>

			<footer class="main-footer">
				<div class="pull-right hidden-xs">
					 <b>Developed By:</b> Ayush Sharma
				</div>
				<strong>Net Promotion Score</a></strong>
			</footer>
			<!-- Add the sidebar's background. This div must be placed
					immediately after the control sidebar -->
			<div class="control-sidebar-bg"></div>
		</div>
		<!-- ./wrapper -->

		<!-- Bootstrap 3.3.6 -->
	 	<script src="{{ asset('js/bootstrap.min.js') }}"></script> 
		<!-- jQuery UI 1.11.4 -->
		<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
		<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
		<script>
			 $.widget.bridge('uibutton', $.ui.button);
		</script>

		<!-- AdminLTE App -->
		<script src="{{ asset('js/app.min.js') }}"></script>
	</body>
</html>
