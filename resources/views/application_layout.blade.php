<!DOCTYPE html>
<html lang="en">

<head>
	<title>{{ __('labels.project_name') }} : @yield('title', 'My Laravel App')</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Bootstrap Template created by UxDT division, National Informatics Centre">
	<meta name="keywords" content="HTML, Bootstrap, CSS, JS">
	<meta name="csrf-token" content="{{ csrf_token() }}">




	<link rel="stylesheet" href="{{ asset('application_assets/css/bootstrap.min.css') }}" />
	<link rel="stylesheet" href="{{ asset('application_assets/css/base.css') }}" />
	<link rel="stylesheet" href="{{ asset('application_assets/css/base-responsive.css') }}" />
	<link rel="stylesheet" href="{{ asset('application_assets/css/animate.min.css') }}" />
	<link rel="stylesheet" href="{{ asset('application_assets/css/jquery-ui.css') }}" />
	<link rel="stylesheet" href="{{ asset('application_assets/css/slicknav.min.css') }}" />
	<link rel="stylesheet" href="{{ asset('application_assets/css/font-awesome.min.css') }}" />
	<link rel="stylesheet" href="{{ asset('application_assets/vendor/fontawesome-free/css/all.min.css') }}" />
	<link rel="stylesheet" href="{{ asset('application_assets/css/select2.min.css') }}" />
	<link rel="stylesheet" href="{{ asset('application_assets/css/toastr.min.css') }}" />
	<link rel="stylesheet" href="{{ asset('application_assets/css/style.css') }}" />

	  <link rel="stylesheet" href="{{ asset('application_assets/css/css.css') }}" />
  <link rel="stylesheet" href="{{ asset('application_assets/css/icon.css') }}" />

	<script src="{{ asset('application_assets/js/slim.min.js') }}"></script>
  <script src="{{ asset('application_assets/js/popper.min.js') }}"></script>

	<script src="{{ asset('application_assets/vendor/jquery/jquery.min.js') }}"></script>
	
	
	<script src="{{ asset('application_assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
	<script src="{{ asset('application_assets/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
	<script src="{{ asset('application_assets/js/script.js') }}"></script>
	<script src="{{ asset('application_assets/js/toastr.min.js') }}"></script>
	<script src="{{ asset('application_assets/js/select2.min.js') }}"></script>
	<script src="{{ asset('application_assets/js/ckeditor.js') }}"></script>




	<style>
		body {
			background-color: #fff;
		}

		.b-leftmenu ul {
			list-style: none;
			margin: 0;
			padding: 0;
		}

		.b-leftmenu ul li {
			/* Sub Menu */
		}

		.b-leftmenu ul li a {
			display: block;
			background: #ebebeb;
			padding: 10px 15px;
			color: #333;
			text-decoration: none;
			-webkit-transition: 0.2s linear;
			-moz-transition: 0.2s linear;
			-ms-transition: 0.2s linear;
			-o-transition: 0.2s linear;
			transition: 0.2s linear;
		}

		.b-leftmenu ul li a:hover {
			background: #f8f8f8;
			color: #515151;
		}

		.b-leftmenu ul li a .fa {
			width: 16px;
			text-align: center;
			margin-right: 5px;
			float: right;
		}

		.b-leftmenu ul ul {
			background-color: #ebebeb;
		}

		.b-leftmenu .sub-menu ul li a {
			background: #f8f8f8;
			border-left: 4px solid transparent;
			padding: 10px 25px;
		}

		.b-leftmenu .sub-sub-menu ul li a {
			padding: 10px 20px 10px 40px;
		}

		.b-leftmenu a.b-newpage:hover {
			background: #ebebeb;
			border-left: 4px solid #3498db;
		}

		.footer-bs {
			margin-top: 8rem;
			/* or any other desired value */
		}

		/* loader */
		#ajax-loader {
			position: fixed;
			top: 0;
			left: 0;
			width: 100%;
			height: 100%;
			background: rgba(255,255,255,0.7);
			z-index: 9999;
			display: flex;
			align-items: center;
			justify-content: center;
		}

		.spinner {
			border: 6px solid #f3f3f3;
			border-top: 6px solid #3498db;
			border-radius: 50%;
			width: 50px;
			height: 50px;
			animation: spin 0.9s linear infinite;
		}

		@keyframes spin {
			0% { transform: rotate(0deg); }
			100% { transform: rotate(360deg); }
		}
	</style>
</head>

<body>
	<div class="d-flex" id="wrapper">

		<!-- Sidebar -->

		<!-- @include('application_layouts.left_sidebar') -->
		<!-- /#sidebar-wrapper -->

		<!-- Page Content -->
		<div id="page-content-wrapper">
			@include('header')
    @yield('content')
	@include('footer')

		</div>

		<div id="ajax-loader" style="display:none;">
			<div class="spinner"></div>
		</div>
		<!-- /#page-content-wrapper -->

	</div>
	<!-- /#wrapper -->


	<!-- Menu Toggle Script -->
	<script>
		$("#menu-toggle").click(function (e) {
			e.preventDefault();
			$("#wrapper").toggleClass("toggled");
		});
	</script>


	<script>
		$(document).ready(function () {
			$('#backtotop').click(function () {
				$("html, body").animate({ scrollTop: 0 }, 600);
				return false;
			});
		});
	</script>


	<script>
		$('.sub-menu ul').hide();
		$('.sub-sub-menu ul').hide();
		$(".sub-menu a").click(function () {
			$(this).parent(".sub-menu").children("ul").slideToggle("100");
			$(this).find(".right").toggleClass("fa-caret-up fa-caret-down");
		});

		$(".sub-sub-menu a").click(function () {
			$(this).parent(".sub-sub-menu").children("ul").slideToggle("100");
			$(this).find(".right").toggleClass("fa-caret-up fa-caret-down");
		});
	</script>



	<!-- Signup Modal -->
	<div class="modal fade" id="signout-modal">
		<div class="modal-dialog modal-dialog-centered">
			<div class="modal-content">

				<!-- Modal Header -->
				<div class="modal-header text-center d-block p-5 border-bottom-0">
					<h3 class="modal-title">Sign Out?</h3>
					<button type="button" class="close position-absolute" style="right: 15px; top: 8px;"
						data-dismiss="modal">&times;</button>
				</div>

				<!-- Modal body -->
				<div class="modal-body">
					<p class="text-center">Are you sure you want to Sign Out?</p>
					<div class="text-center py-4">
						<form action="index.html">
							<button type="submit" class="btn btn-primary b-btn mx-1">Sign Out</button>
							<button class="btn btn-secondary mx-3" data-dismiss="modal">Cancel</button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>


	<div class="modal fade" id="previewModal" tabindex="-1" role="dialog" aria-labelledby="previewModalLabel"
		aria-hidden="true">
		<div class="modal-dialog modal-xl modal-dialog-scrollable" role="document">
			<div class="modal-content">
				<div class="modal-header bg-primary text-white">
					<h5 class="modal-title">Application Preview</h5>
					<button type="button" class="close text-white" data-bs-dismiss="modal" aria-label="Close">
						<span>&times;</span>
					</button>
				</div>
				<div class="modal-body" id="preview-content">
					<div class="text-center">Loading...</div>
				</div>
			</div>
		</div>
	</div>



	<!-- <script src="vendor/jquery-ui/jquery-ui.js"></script> -->

	<script src="{{ asset('application_assets/vendor/jquery-ui/jquery-ui.js') }}"></script>

	<script>
		$(function () {
			$("#sortable-menu").sortable();
			$("#sortable-menu").disableSelection();

			$("#sortable-cards").sortable();
			$("#sortable-cards").disableSelection();
		});
	</script>




	<script>
		$(function () {
			$("#one-item-row").on("click", function () {
				$(".b-customize").addClass("col-lg-12", 300);
				$(".b-customize").removeClass("col-lg-4", 300);
				$(".b-customize").removeClass("col-lg-6", 300);

			});

			$("#two-item-row").on("click", function () {
				$(".b-customize").addClass("col-lg-6", 300);
				$(".b-customize").removeClass("col-lg-4", 300);
				$(".b-customize").removeClass("col-lg-12", 300);

			});

			$("#three-item-row").on("click", function () {
				$(".b-customize").addClass("col-lg-4", 300);
				$(".b-customize").removeClass("col-lg-6", 300);
				$(".b-customize").removeClass("col-lg-12", 300);

			});

		});
	</script>

	<script>
		function loadPreview(appId = null) {

			//const appId = document.getElementById('application_no_doc').value;
			if (!appId) {
				appId = document.getElementById('application_no_doc').value;
			}


			if (!appId) {
				alert("Application ID not found.");
				return;
			}

			$('#previewModal').modal('show');

			document.getElementById('preview-content').innerHTML = '<div class="text-center">Loading...</div>';

			fetch(`/application/preview/${appId}`)
				.then(response => {
					if (!response.ok) {
						throw new Error("Network error");
					}
					return response.text();
				})
				.then(html => {
					document.getElementById('preview-content').innerHTML = html;

					bindEditButtonEvents();
				})
				.catch(error => {
					document.getElementById('preview-content').innerHTML =
						'<div class="alert alert-danger">Failed to load data. Please try again.</div>';
				});
		}

		function bindEditButtonEvents() {
			$('.toggle-edit').on('click', function () {
				var previewModal = document.getElementById('previewModal');
				var modalInstance = bootstrap.Modal.getInstance(previewModal) || new bootstrap.Modal(previewModal);
				modalInstance.hide();
				$('#documents_upload').next('.content').slideUp();
				$('#documents_upload .plus-minus').text('+');
				$('#land_details').next('.content').slideDown();
				$('#land_details .plus-minus').text('-');
				$('#land_details').addClass('active');
				$('#documents_upload').removeClass('active');
				document.getElementById('updateBtn').classList.remove('d-none');
				document.getElementById('saveBtn').classList.add('d-none');
				document.getElementById('updateBtnDoc').classList.remove('d-none');
				document.getElementById('saveBtnDoc').classList.add('d-none');
			});
		}
	</script>

	@stack('scripts')



</body>

</html>