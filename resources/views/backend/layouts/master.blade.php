<!DOCTYPE html>
<html lang="en">
<head>
	@include('backend.includes.head')
</head>

<body class="hold-transition dark-mode sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
	<div class="wrapper">

		<div class="preloader flex-column justify-content-center align-items-center">
			<img class="animation__wobble" src="{{asset('dist/img/AdminLTELogo.png')}}" alt="AdminLTELogo" height="60" width="60">
		</div>

		<!-- Nav Starts -->
		@include('backend.includes.nav')

		<!-- Sidebar Starts -->
		@include('backend.includes.aside')

		<!-- Main Contant -->
		@yield('content')

		<aside class="control-sidebar control-sidebar-dark">
		</aside>

		@include('backend.includes.footer')

	</div>

@include('backend.includes.script')
</body>
</html>
