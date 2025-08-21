@extends('layouts.front_layout')
@section('title', __("labels.project_short_name"))
@section('pagetitle', __("labels.dashboard"))
@section('role_name', "Admin")
@section('currentActivePage',1)
@section('content')
<style>
    thead th {
        border: 1px solid #dee2e6 !important;
    }
</style>

<div class="wrapper">
    <main>
        <div class="container">       
            <div class="row d-flex justify-content-center align-items-center">
                <div class="col-12 p-4">
                    <div class="card card-registration card-registration-2" style="border-radius: 15px;">
                        <div class="card-body">
                            <h4 class="mb-3 text-center text-primary">{{ __("labels.".$status)}} {{ __("labels.app_list") }}</h4>
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover table-striped">
                                    <thead class="table-light">
                                        <tr>
                                            <th style="border: 1px solid #dee2e6;">{{ __("labels.S_no") }}</th>
                                            <th style="border: 1px solid #dee2e6;">{{ __("labels.app_no") }}</th>
                                            <th>{{ __("labels.purpose") }}</th>
                                            <th>{{ __("labels.rule") }}</th>
                                            <th>{{ __("labels.app_name") }}</th>
                                            <!-- <th>{{ __("labels.app_fa_name") }}</th>                                                                       -->
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
                                            <td>{{ $i++ }}</td>
                                            <td><a href="{{route('application.details',[$app->status,base64_encode($app->id)])}}">{{ $app->application->application_number }}</a></td>
                                            <td>{{ $app->application->purpose->purpose_name ?? 'N/A' }}</td>
                                            <td>{{ $app->application->rule->application_rule_name ?? 'N/A' }}</td>
                                            <td>{{ $app->application->applicant_name ?? 'N/A'  }}</td>
                                            <!-- <td>{{ $app->application->applicant_fname ?? 'N/A' }}</td>                                                                    -->
                                            <td>{{ date('d F Y',strtotime($app->application->created_at)) }}</td>
                                            <td>{{ date('d F Y',strtotime($app->created_at)) }}</td>
                                            <td>{{ $app->application->landDetail->land_type ?? 'N/A' }}</td>                                    
                                            <td><a class="btn btn-sm btn-outline-primary" href="{{route('application.details',[$app->status,base64_encode($app->id)])}}"><i class="fa fa-eye"></i></a>
                                            <!-- <select name="action" id="action" class="form-control">
                                                <option value="">{{ __("labels.action") }}</option>
                                                <option value="view" data-url="{{ route('application.details',[$status,$app->id])}}">{{ __("labels.view") }}</option>
                                                <option value="forward" data-url="{{ route('application.details',[$status,$app->id])}}">{{ __("labels.forward") }}</option>
                                                <option value="reject" data-url="{{ route('application.details',[$status,$app->id])}}">{{ __("labels.reject") }}</option>
                                            </select> -->
                                            </td>                                    
                                        </tr>
                                        @empty
                                        <tr>
                                            <td colspan="7" class="text-center">No Records found.</td>
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
        </div>

    </main>
</div>
<script>
$(document).on('change','#action',function(){
    let action_type = $(this).val();
    let url = $(this).find('option:selected').data('url');        
    window.location.href = url+'?type=12';
});
</script>
@endsection
