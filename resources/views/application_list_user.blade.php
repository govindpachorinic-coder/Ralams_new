@extends('layouts.front_layout')

@section('title', __('labels.project_short_name'))
@section('pagetitle', __('labels.dashboard'))

@section('role_name', 'Admin')
<!-- DataTables JS -->
<!-- jQuery -->
<!-- jQuery (only one!) -->

<!-- DataTables CSS -->
<?php // die('sdsdsdsddd');  ?>

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

.custom-card {
      border-radius: 12px;
      box-shadow: 0 2px 8px rgba(0,0,0,0.08);
      padding: 20px;
      background: #fff;
    }
    .custom-title {
      background: #006699;
      padding: 10px;
      border-radius: 8px;
      font-size: 1.25rem;
      font-weight: 600;
      text-align: center;
      margin-bottom: 20px;
      color: white;
    }
    .modern-table {
      border-radius: 8px;
      overflow: hidden;
    }
    .modern-table thead {
      background-color: #13131433;
      font-weight: 600;
    }
    .modern-table tbody tr:hover {
      background-color: #f8f9fa;
    }
    .badge-custom {
      background-color: #ffe8cc;
      color: #d35400;
      font-size: 0.85rem;
      padding: 6px 12px;
      border-radius: 6px;
    }
    .fa{
        color: #cb6c50;
    }
    .asc_desc{
        color: #006699;
    }
   
</style>




@section('content')
    <div class="wrapper">
        <main>
        <div class="my-1" id="b-homedb">
            <div class="mt-5">
                

                @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif

                @if (!empty($getApplication))
                    <div class="my-4">
                        <div class="custom-card">
                            <div class="custom-title">
                                @if ($type == 'pending')
                                    {{ __('labels.pending_application_list') }}
                                @elseif($type == 'processing')
                                        {{ __('labels.processing_application_list') }}
                                @elseif($type == 'error')
                                    {{ __('labels.error_application_list') }}
                                @elseif($type == 'reject')
                                    {{ __('labels.rejected_application_list') }}
                                @else
                                    {{ __('labels.completed_application_list') }}
                                @endif
                            </div>
                            <div class="table-responsive">
                                <table id="applicationTable" class="table table-bordered table-hover modern-table align-middle text-center">
                                    <thead>
                                        <tr class="asc_desc">
                                            <th>{{ __("labels.S_no") }}</th>
                                            <th>{{ __("labels.app_no") }}</th>
                                            <th>{{ __("labels.purpose") }}</th>
                                            <th>{{ __("labels.rule") }}</th>
                                            <th>{{ __("labels.app_name") }}</th>
                                            <th>{{ __("labels.applicant_type") }}</th>
                                            <th>{{ __("labels.application_date") }}</th>
                                            <th>{{ __("labels.application_receive_date") }}</th>
                                            <th>{{ __("labels.action") }}</th>

                                            <!-- <th>{{ __('labels.S_no') }}</th>
                                            <th>{{ __('labels.app_no') }}</th>
                                            <th>{{ __('labels.applicant_purpose') }}</th>
                                            <th>{{ __('labels.application_date') }}</th>
                                            <th>{{ __('labels.rules') }}</th>
                                            <th>{{ __('labels.action') }}</th> -->
                                        </tr>
                                    </thead>
                                    <tbody id="applicant_details">
                                        @if (count($getApplication) > 0)
                                        @foreach ($getApplication as $k => $application)
                                        <tr id="row_101}}">
                                            <td>{{$k + 1}}</td>
                                            <td><a onclick="loadPreview('{{ $application->application_number }}')"
                                                title="View">{{ $application->application_number }}</a></td>
                                            <td>{{ $application->purpose->purpose_name ?? '-' }}</td>
                                            <td>{{ $application->rule->application_rule_name ?? '-' }}</td>
                                            <td>{{ $application->applicant_name ?? 'N/A' }}</td>
                                            <td>{{ $application->applicant_type ?? 'N/A' }}</td>
                                            <td>{{ date('d-m-Y',strtotime($application->created_at)) }}</td>
                                            <td>{{ date('d-m-Y',strtotime($application->created_at)) }}</td>
                                            <!-- <td>{{ $application->landDetail->land_type ?? 'N/A' }}</td> -->
                                            <td>
                                                  <a class="btn btn-md" 
                               href="{{route('application.view',[base64_encode($application->id)])}}">
                               <i class="fa fa-eye"></i>
                            </a>
                                                
                                            <!-- Delete Button with Icon -->
                                            @if ($type == 'pending')
                                                <form action="{{ route('user.delete_application', $application->id) }}"
                                                    method="POST" class="d-inline"
                                                    onsubmit="return confirm('Are you sure?')">
                                                    @csrf
                                                    <button type="submit" class="btn btn-sm btn-danger" title="Delete">
                                                        <i class="fa fa-trash" aria-hidden="true"></i>
                                                    </button>
                                                </form>
                                            @endif


                                            <a class="btn btn-md" 
                               href="{{route('edit.application',[base64_encode($application->id)])}}">
                               <i class="fa fa-edit"></i>
                            </a>
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
                                
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </main>
    </div>
@endsection



