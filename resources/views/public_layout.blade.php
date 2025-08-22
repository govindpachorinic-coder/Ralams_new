<!DOCTYPE html>
<html lang="en">
<head>
	<title>{{ __('labels.project_name') }} :  @yield('title', 'My Laravel App')</title>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Bootstrap Template created by UxDT division, National Informatics Centre">
  	<meta name="keywords" content="HTML, Bootstrap, CSS, JS">
    <link rel="stylesheet" href="{{ asset('public_assets/vendor/bootstrap/css/bootstrap.min.css') }}" />
    <!-- Custom styles for this template -->
	<link rel="stylesheet" href="{{ asset('public_assets/css/base.css') }}" />
	<link rel="stylesheet" href="{{ asset('public_assets/css/base-responsive.css') }}" />
	<link rel="stylesheet" href="{{ asset('public_assets/css/animate.min.css') }}" />
	<link rel="stylesheet" href="{{ asset('public_assets/css/slicknav.min.css') }}" />
	<link rel="stylesheet" href="{{ asset('public_assets/css/font-awesome.min.css') }}" />
	<link rel="stylesheet" href="{{ asset('public_assets/vendor/fontawesome-free/css/all.min.css') }}" />
	<link rel="stylesheet" href="{{ asset('public_assets/vendor/bootstrap/css/bootstrap.min.css') }}" />
	 <link rel="stylesheet" href="{{ asset('application_assets/css/select2.min.css') }}" />

<!-- 
    <script src="vendor/charts/Chart.js"></script>
    <script src="vendor/charts/moment.min.js"></script>
	<script src="vendor/charts/Chart.min.js"></script>
	<script src="vendor/charts/utils.js"></script> -->
	<script src="{{ asset('application_assets/vendor/jquery/jquery.min.js') }}"></script>
	<script src="{{ asset('application_assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>	

	<script src="{{ asset('application_assets/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
	<script src="{{ asset('application_assets/js/select2.min.js') }}"></script>	

	<link rel="stylesheet" href="{{ asset('public_assets/vendor/charts/Chart.js') }}" />
	<link rel="stylesheet" href="{{ asset('public_assets/vendor/charts/moment.min.js') }}" />
	<link rel="stylesheet" href="{{ asset('public_assets/vendor/charts/Chart.min.js') }}" />
	<link rel="stylesheet" href="{{ asset('public_assets/vendor/charts/utils.js') }}" />
    <!-- <script src="js/popper.min.js"></script> -->
	<script src="{{ asset('public_assets/js/popper.min.js') }}"></script>
</head>

<body>
	<!-- Accessibility -->
	@include('public_layouts.header_right')

	@yield('content')

	<!----------- Footer ------------>
	@include('public_layouts.application_footer')

	

	<script src="{{ asset('public_assets/vendor/jquery/jquery.min.js') }}"></script>
	<script src="{{ asset('public_assets/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
	<script src="{{ asset('public_assets/js/jquery.slicknav.min.js') }}"></script>

    <!-- Menu Toggle Script -->
	 
    <!-- <script src="vendor/jquery-ui/jquery-ui.js"></script> -->

	<script src="{{ asset('public_assets/vendor/jquery-ui/jquery-ui.js') }}"></script>
    
</body>
</html>