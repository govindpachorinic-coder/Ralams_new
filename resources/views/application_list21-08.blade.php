@extends('layouts.front_layout')
@section('title', __("labels.project_short_name"))
@section('pagetitle', __("labels.dashboard"))
@section('role_name', "Admin")
@section('currentActivePage',1)
@section('content')

<style>
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
    .btn-gradient-red {
    background: linear-gradient(90deg, #e53935 0%, #ff5252 100%);
    color: #fff;
    border: none;
    box-shadow: 0 2px 8px rgba(229,57,53,0.18);
    transition: transform 0.1s;
}

.btn-gradient-red:hover {
    transform: scale(1.05);
    opacity: 0.92;
}

.btn-gradient-green {
    background: linear-gradient(90deg, #43a047 0%, #81c784 100%);
    color: #fff;
    border: none;
    box-shadow: 0 2px 8px rgba(67,160,71,0.18);
    transition: transform 0.1s;
}

.btn-gradient-green:hover {
    transform: scale(1.05);
    opacity: 0.92;
}

</style>
<div class="wrapper">
    <main>
        <div class="my-4">
            <div class="custom-card">
                <div class="custom-title">
                {{ __("labels.".$status)}} {{ __("labels.app_list") }}
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
                                <!-- <th>{{ __("labels.land_type") }}</th> -->
                                <th>{{ __("labels.action") }}</th>
                            </tr>
                        </thead>
                        <tbody id="applicant_details">
                            @php $i = 1; @endphp
                            @forelse($applications as $app)
                            <tr id="row_{{$app->id}}">
                                <td class="text-center fw-bold">{{ $i++ }}</td>
                                <td>
                                    <a href="" 
                                    class="text-decoration-none text-secondary fw-bold">
                                    {{ $app->application->application_number }}
                                    </a>
                                </td>
                                <td>{{ $app->application->purpose->purpose_name ?? 'N/A' }}</td>
                                <td>{{ $app->application->rule->application_rule_name ?? 'N/A' }}</td>
                                <td>{{ $app->application->applicant_name ?? 'N/A' }}</td>
                                <td>{{ $app->application->applicant_type ?? 'N/A' }}</td>
                                <td>{{ date('d-m-Y',strtotime($app->application->created_at)) }}</td>
                                <td>{{ date('d-m-Y',strtotime($app->created_at)) }}</td>
                                <!-- <td>{{ $app->application->landDetail->land_type ?? 'N/A' }}</td> -->
                                <td class="text-center">
                                    <a class="btn btn-md" 
                                    href="{{route('application.details',[$app->status,base64_encode($app->id)])}}">
                                    <i class="fa fa-eye"></i>
                                    </a>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="9" class="text-center text-danger">No Records found.</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                    <!-- <div class="d-flex justify-content-center">
                        {{ $applications->links('pagination::bootstrap-5') }}
                    </div> -->
                </div>
            </div>
        </div>
    </main>
</div>


<!-- <div class="container">       
    <div class="row d-flex justify-content-center align-items-center">
        <div class="col-12 p-4">
            <div class="card card-registration card-registration-2" style="border-radius: 15px;">
                <div class="card-body">
                    <h4 class="mb-3 text-center text-primary">
                        {{ __("labels.".$status)}} {{ __("labels.app_list") }}
                    </h4>

                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover align-middle w-100">
                            <thead class="table-dark text-center">
                                <tr>
                                    <th>{{ __("labels.S_no") }}</th>
                                    <th>{{ __("labels.app_no") }}</th>
                                    <th>{{ __("labels.purpose") }}</th>
                                    <th>{{ __("labels.rule") }}</th>
                                    <th>{{ __("labels.app_name") }}</th>
                                    <th>{{ __("labels.application_date") }}</th>
                                    <th>{{ __("labels.application_receive_date") }}</th>
                                    <th>{{ __("labels.land_type") }}</th>
                                    <th>{{ __("labels.action") }}</th>
                                </tr>
                            </thead>
                            <tbody id="applicant_details">
                                @php $i = 1; @endphp
                                @forelse($applications as $app)
                                <tr id="row_{{$app->id}}">
                                    <td class="text-center fw-bold">{{ $i++ }}</td>
                                    <td>
                                        <a href="{{route('application.details',[$app->status,base64_encode($app->id)])}}" 
                                           class="text-decoration-none text-primary fw-semibold">
                                           {{ $app->application->application_number }}
                                        </a>
                                    </td>
                                    <td>{{ $app->application->purpose->purpose_name ?? 'N/A' }}</td>
                                    <td>{{ $app->application->rule->application_rule_name ?? 'N/A' }}</td>
                                    <td>{{ $app->application->applicant_name ?? 'N/A' }}</td>
                                    <td>{{ date('d-m-Y',strtotime($app->application->created_at)) }}</td>
                                    <td>{{ date('d-m-Y',strtotime($app->created_at)) }}</td>
                                    <td>{{ $app->application->landDetail->land_type ?? 'N/A' }}</td>
                                    <td class="text-center">
                                        <a class="btn btn-sm btn-primary" 
                                           href="{{route('application.details',[$app->status,base64_encode($app->id)])}}">
                                           <i class="fa fa-eye"></i>
                                        </a>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="9" class="text-center text-danger">No Records found.</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                        <div class="d-flex justify-content-center">
                            {{ $applications->links('pagination::bootstrap-5') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> -->
<script>
$(document).on('change','#action',function(){
    let action_type = $(this).val();
    let url = $(this).find('option:selected').data('url');        
    window.location.href = url+'?type=12';
});
</script>

@endsection
