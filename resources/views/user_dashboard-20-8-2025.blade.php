@extends('layouts.front_layout')

@section('title', __('labels.project_short_name'))
@section('pagetitle', __('labels.dashboard'))

@section('role_name', 'Admin')
<style>
    .pagination {
        margin-top: 20px;
    }

    .pagination .page-item .page-link {
        color: #007bff;
        border: 1px solid #dee2e6;
        padding: 8px 14px;
        font-weight: 500;
    }

    .pagination .page-item.active .page-link {
        background-color: #007bff;
        color: white;
        border-color: #007bff;
    }

    .pagination .page-item .page-link:hover {
        background-color: #e9ecef;
    }

    .text-muted {
        display: none;
    }



    .main-content {
        flex: 1;
    }

    .fa {
        color: #ffffff;
    }



    .hover_none {
        text-decoration: none !important;
        color: inherit !important;
    }

    .hover_none:hover {
        text-decoration: none !important;
        color: inherit !important;
    }

    /* Responsive 5-column layout for fixed width cards */
    .col-custom {
        width: 20%;
        float: left;
        padding: 10px;
    }

    @media (max-width: 992px) {
        .col-custom {
            width: 50%;
        }
    }

    @media (max-width: 576px) {
        .col-custom {
            width: 100%;
        }
    }

    /* Card container */
    .dashboard-card {
        height: 150px;
        border-radius: 16px;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        position: relative;
        display: flex;
        flex-direction: column;
        justify-content: center;
    }

    /* Card hover effect */
    .dashboard-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 12px 24px rgba(0, 0, 0, 0.15);
    }

    /* Icon container */
    .icon-circle {
        background-color: rgba(255, 255, 255, 0.2);
        border-radius: 50%;
        width: 60px;
        height: 60px;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-bottom: 10px;
        box-shadow: inset 0 0 5px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s ease;
    }

    /* Icon hover effect */
    .dashboard-card:hover .icon-circle {
        transform: scale(1.1) rotate(3deg);
    }

    /* Icon itself */
    .icon-circle i {
        font-size: 24px;
        color: #fff;
    }

    /* Card color themes */
    .bg-gradient-blue {
        background: linear-gradient(135deg, #3b82f6, #60a5fa);
    }

    .bg-gradient-yellow {
        background: linear-gradient(135deg, #f59e0b, #fbbf24);
    }

    .bg-gradient-green {
        background: linear-gradient(135deg, #10b981, #34d399);
    }

    .bg-gradient-red {
        background: linear-gradient(135deg, #ef4444, #f87171);
    }

    .bg-gradient-purple {
        background: linear-gradient(135deg, #a855f7, #d8b4fe);
    }

    /* Badge count styles */
    .badge {
        font-size: 14px;
        font-weight: 600;
        padding: 5px 10px;
        border-radius: 10px;
    }


    /* Count badge (top-right position) */
    .dashboard-card .badge {
        position: absolute;
        top: 10px;
        right: 10px;
        z-index: 1;
        font-size: 13px;
        font-weight: bold;
        padding: 6px 10px;
        border-radius: 999px;
        background: #fff;
        color: #333;
        box-shadow: 0 2px 6px rgba(0, 0, 0, 0.15);
    }

    .bg-gradient-orange {
        background: linear-gradient(135deg, #ff9800, #ff5722);
    }

    .row.mt-5 {
    margin-top: 80px !important;  /* उदाहरण के लिए 80px ऊपर की जगह, आप जरूरत के हिसाब से बढ़ा-घटा सकते हैं */
}
    .wrapper {
      min-height: 50vh;     /* Poori screen ka height */
      display: flex;
      flex-direction: column;
    }

    main {
      flex: 1;               /* Jitni bachi hui jagah hai, wo le lega */
    }
</style>




@section('content')
    <div class="wrapper">
        <main>
        <div class="my-1" id="b-homedb">
            <div class="container mt-5">
                <div class="container mt-5">
                    <div class="row g-3">



                        <!-- नया आवेदन -->
                        <div class="col-12 col-sm-6 col-md-4 col-lg-2">
                            <a href="{{ route('new.application') }}" class="text-decoration-none">
                                <div class="card dashboard-card shadow-lg border-0 text-white bg-gradient-blue">
                                    <div
                                        class="card-body d-flex flex-column align-items-center justify-content-center py-4">
                                        <div class="icon-circle mb-3">
                                            <i class="fa fa-user-plus fa-2x"></i>
                                        </div>
                                        <h6 class="text-center fw-bold">{{ __('labels.new_application') }}</h6>
                                    </div>
                                </div>
                            </a>
                        </div>

                        <!-- लंबित आवेदन -->
                        <div class="col-12 col-sm-6 col-md-4 col-lg-2">
                            <a href="{{ route('user.get_application', ['type' => 'pending']) }}"
                                class="text-decoration-none">
                                <div class="card dashboard-card shadow-lg border-0 text-white bg-gradient-yellow">
                                    <span class="position-absolute top-0 start-0 m-2 badge bg-white text-dark shadow">
                                        {{ $counts->pendingCount ?? 0 }}
                                    </span>
                                    <div
                                        class="card-body d-flex flex-column align-items-center justify-content-center py-4">
                                        <div class="icon-circle mb-3"><i class="fa-solid fa-clock"></i></div>
                                        <h6 class="text-center fw-bold">{{ __('labels.pending_application') }}</h6>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <!-- मेरा नया कार्ड -->
                        <div class="col-12 col-sm-6 col-md-4 col-lg-2">
                            <a href="{{ route('user.get_application', ['type' => 'processing']) }}"
                                class="text-decoration-none">
                                <div class="card dashboard-card shadow-lg border-0 text-white bg-gradient-orange">
                                    <span class="position-absolute top-0 start-0 m-2 badge bg-white text-dark shadow">
                                        {{ $counts->processingCount ?? 0 }}
                                    </span>
                                    <div
                                        class="card-body d-flex flex-column align-items-center justify-content-center py-4">
                                        <div class="icon-circle mb-3">
                                            <i class="fa fa-spinner fa-spin"></i>
                                        </div>
                                        <h6 class="text-center fw-bold">{{ __('labels.processing_application') }}</h6>
                                    </div>
                                </div>
                            </a>
                        </div>

                        <!-- संशोधन के लिए आवेदन -->
                        <div class="col-12 col-sm-6 col-md-4 col-lg-2">
                            <a href="{{ route('user.get_application', ['type' => 'error']) }}" class="text-decoration-none">
                                <div class="card dashboard-card shadow-lg border-0 text-white bg-gradient-green">
                                    <span class="position-absolute top-0 start-0 m-2 badge bg-white text-dark shadow">
                                        {{ $counts->errorCount ?? 0 }}
                                    </span>
                                    <div
                                        class="card-body d-flex flex-column align-items-center justify-content-center py-4">
                                        <div class="icon-circle mb-3">
                                            <i class="fa fa-tasks fa-2x"></i>
                                        </div>
                                        <h6 class="text-center fw-bold">{{ __('labels.error_application') }}</h6>
                                    </div>
                                </div>
                            </a>
                        </div>

                        <!-- अस्वीकार आवेदन -->
                        <div class="col-12 col-sm-6 col-md-4 col-lg-2">
                            <a href="{{ route('user.get_application', ['type' => 'reject']) }}"
                                class="text-decoration-none">
                                <div class="card dashboard-card shadow-lg border-0 text-white bg-gradient-red">
                                    <span class="position-absolute top-0 start-0 m-2 badge bg-white text-dark shadow">
                                        {{ $counts->rejectCount ?? 0 }}
                                    </span>
                                    <div
                                        class="card-body d-flex flex-column align-items-center justify-content-center py-4">
                                        <div class="icon-circle mb-3">
                                            <i class="fa fa-ban fa-2x"></i>
                                        </div>
                                        <h6 class="text-center fw-bold">{{ __('labels.reject_application') }}</h6>
                                    </div>
                                </div>
                            </a>
                        </div>

                        <!-- पूर्ण आवेदन -->
                        <div class="col-12 col-sm-6 col-md-4 col-lg-2">
                            <a href="{{ route('user.get_application', ['type' => 'complete']) }}"
                                class="text-decoration-none">
                                <div class="card dashboard-card shadow-lg border-0 text-white bg-gradient-purple">
                                    <span class="position-absolute top-0 start-0 m-2 badge bg-white text-dark shadow">
                                        {{ $counts->completedCount ?? 0 }}
                                    </span>
                                    <div
                                        class="card-body d-flex flex-column align-items-center justify-content-center py-4">
                                        <div class="icon-circle mb-3">
                                            <i class="fa fa-check-circle fa-2x"></i>
                                        </div>
                                        <h6 class="text-center fw-bold">{{ __('labels.completed_application') }}</h6>
                                    </div>
                                </div>
                            </a>
                        </div>

                    </div>
                </div>



                @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif

                @if (!empty($getApplication))
                    <div class="container">
                        <div class="row d-flex justify-content-center align-items-center">
                            <div class="col-12 p-4">
                                <div class="card card-registration card-registration-2" style="border-radius: 15px;">
                                    <div class="card-body">
                                        @if ($type == 'pending')
                                            <h2 class="mb-3 text-center text-primary">
                                                {{ __('labels.pending_application_list') }}</h2>
                                        @elseif($type == 'processing')
                                            <h2 class="mb-3 text-center text-primary">
                                                {{ __('labels.processing_application_list') }}</h2>
                                        @elseif($type == 'error')
                                            <h2 class="mb-3 text-center text-primary">
                                                {{ __('labels.error_application_list') }}</h2>
                                        @elseif($type == 'reject')
                                            <h2 class="mb-3 text-center text-primary">
                                                {{ __('labels.rejected_application_list') }}</h2>
                                        @else
                                            <h2 class="mb-3 text-center text-primary">
                                                {{ __('labels.completed_application_list') }}</h2>
                                        @endif

                                        <!-- Added heading with some margin below -->
                                        <div class="table-responsive">
                                            <table class="table table-bordered table-hover table-striped">
                                                <thead class="table-light">
                                                    <tr>
                                                        <th style="border: 1px solid #dee2e6;">{{ __('labels.S_no') }}</th>
                                                        <th style="border: 1px solid #dee2e6;">{{ __('labels.app_no') }}
                                                        </th>
                                                        <th style="border: 1px solid #dee2e6;">
                                                            {{ __('labels.applicant_purpose') }}</th>
                                                        <th style="border: 1px solid #dee2e6;">
                                                            {{ __('labels.application_date') }}</th>
                                                        <th style="border: 1px solid #dee2e6;">{{ __('labels.rules') }}
                                                        </th>
                                                        <th style="border: 1px solid #dee2e6;">{{ __('labels.action') }}
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody id="applicant_details">
                                                    @if (count($getApplication) > 0)
                                                        @foreach ($getApplication as $k => $application)
                                                            <tr id="row_101">
                                                                <td>{{ ($getApplication->currentPage() - 1) * $getApplication->perPage() + $loop->iteration }}
                                                                </td>
                                                               <td><a href="javascript:void();"
                                                                            onclick="loadPreview('{{ $application->application_number }}')"
                                                                            title="View">
                                                                            {{ $application->application_number }}
                                                                        </a>

                                                                    </td>
                                                                <td>{{ $application->purpose->purpose_name ?? '-' }}</td>
                                                                <td>{{ $application->created_at->format('d-m-Y') }}</td>
                                                                <td>{{ $application->rule->application_rule_name ?? '-' }}
                                                                </td>
                                                                <td>
                                                                    <a href="javascript:void();"
                                                                        onclick="loadPreview('{{ $application->application_number }}')"
                                                                        class="btn btn-sm btn-info" title="View">
                                                                        <i class="fa fa-eye" aria-hidden="true"></i>
                                                                    </a>

                                                                    <!-- Delete Button with Icon -->
                                                                    @if ($type == 'pending')
                                                                        <form
                                                                            action="{{ route('user.delete_application', $application->id) }}"
                                                                            method="POST" class="d-inline"
                                                                            onsubmit="return confirm('Are you sure?')">
                                                                            @csrf

                                                                            <button type="submit"
                                                                                class="btn btn-sm btn-danger"
                                                                                title="Delete">
                                                                                <i class="fa fa-trash"
                                                                                    aria-hidden="true"></i>
                                                                            </button>
                                                                        </form>
                                                                    @endif
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    @else
                                                        <tr>
                                                            <td colspan="6" style="text-align: center">
                                                                {{ __('labels.records_not_found') }}</td>
                                                        </tr>
                                                    @endif
                                                </tbody>
                                            </table>
                                            <div class="d-flex justify-content-center">
                                                {!! $getApplication->links('pagination::bootstrap-5') !!}
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </main>
        </div>
        








    
            @endsection
