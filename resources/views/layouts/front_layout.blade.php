<!DOCTYPE html>
<html lang="en">

<head>
    <title>{{ __('labels.project_name') }} : @yield('title', 'My Laravel App')</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Bootstrap Template created by UxDT division, National Informatics Centre">
    <meta name="keywords" content="HTML, Bootstrap, CSS, JS">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Core CSS -->
    <link rel="stylesheet" href="{{ asset('public_assets/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('public_assets/css/css.css') }}" />
    <link rel="stylesheet" href="{{ asset('public_assets/css/icon.css') }}" />
    <link rel="stylesheet" href="{{ asset('public_assets/css/style.css') }}" />
    <link rel="stylesheet" href="{{ asset('application_assets/vendor/fontawesome-free/css/all.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('application_assets/css/select2.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('public_assets/css/bootstrap-datepicker3.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('public_assets/css/toastr.min.css') }}" />

    <!-- DataTables CSS -->
    <link rel="stylesheet" href="{{ asset('public_assets/dataTable/css/dataTables.bootstrap5.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('public_assets/dataTable/css/buttons.bootstrap5.min.css') }}" />

    <!-- jQuery (load first, only once!) -->
   <!-- jQuery (must be first) -->
<script src="{{ asset('public_assets/js/jquery.min.js') }}"></script>

<!-- Bootstrap JS -->
<script src="{{ asset('public_assets/js/popper.min.js') }}"></script>
<script src="{{ asset('public_assets/js/bootstrap.bundle.min.js') }}"></script>


<script src="{{ asset('application_assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

<!-- DataTables core -->
<script src="{{ asset('public_assets/dataTable/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('public_assets/dataTable/js/dataTables.bootstrap5.min.js') }}"></script>

<!-- DataTables Buttons -->
<script src="{{ asset('public_assets/dataTable/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('public_assets/dataTable/js/buttons.bootstrap5.min.js') }}"></script>
<script src="{{ asset('public_assets/dataTable/js/jszip.min.js') }}"></script>




<!-- Your custom validation + scripts -->
<script src="{{ asset('application_assets/js/select2.min.js') }}"></script>
<script src="{{ asset('application_assets/js/ckeditor.js') }}"></script>
<script src="{{ asset('public_assets/js/jquery.validate.min.js') }}"></script>
<script src="{{ asset('public_assets/js/land_validation.js') }}"></script>
<script src="{{ asset('public_assets/js/bootstrap-datepicker.min.js') }}"></script>
<script src="{{ asset('public_assets/js/toastr.min.js') }}"></script>
<script src="{{ asset('public_assets/js/script.js') }}"></script>

<!-- ✅ Now your DataTable init script -->
<script>
    $(document).ready(function () {
        $('#applicationTable').DataTable({
            // dom: 'Bfrtip',
            // buttons: [
            //     { extend: 'pdf', className: 'btn btn-md rounded-pill px-4 me-2 mr-2',
            //       text: '<i class="fa fa-file-pdf-o" aria-hidden="true"></i> PDF' },
            //     { extend: 'print', className: 'btn btn-md rounded-pill px-4',
            //       text: '<i class="fa fa-print me-1"></i> Print' }
            // ],
            pageLength: 10,
            lengthMenu: [2, 5, 10, 25, 50, 100],
        });
    });
</script>


    <style type="text/css">
        /* Loader CSS */
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
    @include('header')
    @yield('content')
	@include('footer')	
    <div id="ajax-loader" style="display:none;">
			<div class="spinner"></div>
		</div>
</body>

</html>
