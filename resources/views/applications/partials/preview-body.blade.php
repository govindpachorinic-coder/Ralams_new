<!-- Application Details -->
<div class="card mb-4 shadow-sm">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">{{ __("labels.application_details") }}</h5>
        <button class="btn btn-sm btn-primary toggle-edit" data-target="#application-edit"
            data-id="{{ $application->id }}">{{ __("labels.edit") }}</button>
    </div>
    <div class="card-body p-3">
        <table class="table table-bordered table-striped mb-0">
            <thead class="table-light">
                <tr>
                    <th>{{ __("labels.application_number") }}</th>
                    <th>{{ __("labels.name") }}</th>
                    <th>{{ __("labels.f_name") }}</th>
                    <th>{{ __("labels.status") }}</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $application->application_number ?? '-' }}</td>
                    <td>{{ $application->applicant_name ?? '-' }}</td>
                    <td>{{ $application->applicant_fname ?? '-' }}</td>
                    <td>
                        @if($application->status)
                            <span
                                class="badge 
                                        {{ $application->status == 'Approved' ? 'bg-success' : ($application->status == 'Rejected' ? 'bg-danger' : 'bg-secondary') }}">
                                {{ $application->status }}
                            </span>
                        @else
                            -
                        @endif
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

<!-- Land Details -->
<div class="card mb-4 shadow-sm">
    <div class="card-header">
        <h5 class="mb-0">{{ __("labels.land_detail") }}</h5>
    </div>
    <div class="card-body p-3">
        @foreach($landDetails as $land)
            <table class="table table-bordered table-hover mb-4">
                <tbody>
                    <tr>
                        <th>{{ __("labels.village_code") }}</th>
                        <td>{{ $land->village_code }}</td>
                        <th>{{ __("labels.proposed_land_area") }}</th>
                        <td>{{ $land->proposed_land_area }}</td>
                    </tr>
                    <tr>
                        <th>{{ __("labels.irrigation_land") }}</th>
                        <td>{{ $land->irrigation_land }}</td>
                        <th>{{ __("labels.irrigation_detail") }}</th>
                        <td>{{ $land->irrigation_detail }}</td>
                    </tr>
                    <tr>
                        <th>{{ __("labels.distance_from_sh") }}</th>
                        <td>{{ $land->dist_from_SH }}</td>
                        <th>{{ __("labels.distance_from_nh") }}</th>
                        <td>{{ $land->dist_from_NH }}</td>
                    </tr>
                    <tr>
                        <th>{{ __("labels.distance_from_rl") }}</th>
                        <td>{{ $land->dist_from_RL }}</td>
                        <th>{{ __("labels.distance_from_city") }}</th>
                        <td>{{ $land->dist_from_City }}</td>
                    </tr>
                    <tr>
                        <th>{{ __("labels.is_land_surrendered") }}</th>
                        <td>{{ $land->is_land_surrendered }}</td>
                        <th>{{ __("labels.surrender_details") }}</th>
                        <td>{{ $land->surrender_details }}</td>
                    </tr>
                    <tr>
                        <th>{{ __("labels.land_type") }}</th>
                        <td>{{ $land->land_type }}</td>
                        <th>{{ __("labels.development_fees") }}</th>
                        <td>{{ $land->development_fees }}</td>
                    </tr>
                    <tr>
                        <th>{{ __("labels.premium_rate") }}</th>
                        <td>{{ $land->premium_rate }}</td>
                        <th>{{ __("labels.challan_number") }}</th>
                        <td>{{ $land->challan_number }}</td>
                    </tr>
                    <tr>
                        <th>{{ __("labels.challan_date") }}</th>
                        <td>{{ $land->challan_date }}</td>
                        <th>{{ __("labels.other_details") }}</th>
                        <td>{{ $land->other_details }}</td>
                    </tr>
                </tbody>
            </table>
        @endforeach
    </div>
</div>

<!-- Owner Details -->
<div class="card mb-4 shadow-sm">
    <div class="card-header">
        <h5 class="mb-0">{{ __("labels.owner_details") }}</h5>
    </div>
    <div class="card-body p-3">
        <table class="table table-bordered table-striped table-hover mb-0">
            <thead class="table-light">
                <tr>
                    <th>{{ __("labels.owner_name") }}</th>
                    <th>{{ __("labels.owner_father_name") }}</th>
                    <th>{{ __("labels.khasra_number") }}</th>
                    <th>{{ __("labels.owner_address") }}</th>
                </tr>
            </thead>
            <tbody>
                @foreach($landOwners as $owner)
                    <tr>
                        <td>{{ $owner->owner_name }}</td>
                        <td>{{ $owner->owner_fname }}</td>
                        <td>{{ $owner->khasra_number }}</td>
                        <td>{{ $owner->owner_add1 }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<!-- Documents Details -->
<div class="card mb-4 shadow-sm">
    <div class="card-header">
        <h5 class="mb-0">{{ __("labels.document_details") }}</h5>
    </div>
    <div class="card-body p-3">
        <table class="table table-bordered table-striped table-hover mb-0">
            <thead class="table-light text-center">
                <tr>
                    <th>{{ __("labels.document_id") }}</th>
                    <th>{{ __("labels.action") }}</th>
                </tr>
            </thead>
            <tbody>
                @foreach($docUploads as $uploads)
                    <tr class="text-center">
                        <td>{{ $uploads->document_id }}</td>
                        <td>
                            @if(!empty($uploads->document_file))
                                <a href="{{ $uploads->document_file }}" target="_blank" class="btn btn-sm btn-primary"
                                    title="{{ __('labels.view_document') }}">
                                    {{ __('labels.view') }}
                                </a>
                            @else
                                <span class="text-muted">{{ __('labels.no_file') }}</span>
                            @endif

                        </td>
                    </tr>
                @endforeach
                @if($docUploads->isEmpty())
                    <tr>
                        <td colspan="2" class="text-center text-muted">{{ __("labels.no_doc_available") }}</td>
                    </tr>
                @endif
            </tbody>
        </table>
    </div>
</div>