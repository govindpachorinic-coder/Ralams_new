@extends('application_layout')
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
<div class="container">       
    <div class="row d-flex justify-content-center align-items-center">
        <div class="col-12 p-4">
            <div class="card card-registration card-registration-2" style="border-radius: 15px;">
                <div class="card-body">
                    <h2 class="mb-3 text-center text-primary">{{ ucfirst($status)}} Application List</h2> <!-- Added heading with some margin below -->
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover table-striped">
                            <thead class="table-light">
                                <tr>
                                    <th style="border: 1px solid #dee2e6;">Sr.</th>
                                    <th style="border: 1px solid #dee2e6;">Application Number</th>
                                    <th>Applicant Name</th>
                                    <th>Applicant Father Name</th>
                                    <th>Address</th>
                                    <th>Purpose</th>
                                    <th>Land Type</th>
                                    <!-- <th>Action</th> -->
                                </tr>
                            </thead>
                            <tbody id="applicant_details">
                                @php $i = 1; @endphp
                                @forelse($applications as $app)
                                <tr id="row_{{$app->id}}">
                                    <td>{{ $i++ }}</td>
                                    <td><a href="{{route('application.details',$app->id)}}">{{ $app->application->application_number }}</a></td>
                                    <td>{{ $app->application->applicant_name ?? 'N/A'  }}</td>
                                    <td>{{ $app->application->applicant_fname ?? 'N/A' }}</td>
                                    <td>{{ $app->application->applicant_add1 ?? 'N/A' }}</td>
                                    <td>{{ $app->application->purpose->purpose_name ?? 'N/A' }}</td>
                                    <td>{{ $app->application->landDeatil->land_type ?? 'N/A' }}</td>
                                    
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="7" class="text-center">No Records found.</td>
                                </tr>
                                @endforelse                                
                            </tbody>
                        </table>
                        {{--<div class="d-flex justify-content-center">
                            {{ $applications->links() }}
                        </div>--}}
                    </div>                  
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
