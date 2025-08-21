@extends('application_layout')



@section('title', __("labels.project_short_name"))
@section('pagetitle', __("labels.dashboard"))

@section('role_name', "user")

    <meta charset="UTF-8">
    <title>{{ __("labels.checklist") }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;700&display=swap" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <style>
        body {
            background: radial-gradient(ellipse at top right, #e3eefb 50%, #f8fbfd 100%);
            font-family: 'Inter', Arial, sans-serif;
            margin: 0;
        }

        .dashboard {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 30px 25px;
            max-width: 1200px;
            margin: 0 auto 18px auto;
            padding: 22px 12px;
        }

        .card-section {
            background: #fff;
            border-radius: 17px;
            box-shadow: 0 5px 38px 0 rgba(46, 150, 220, 0.13);
            display: flex;
            flex-direction: column;
            margin-top: 0;
            min-width: 0;
        }

        .card-header {
            border-radius: 17px 17px 0 0;
            color: #fff;
            padding: 18px 28px 13px 22px;
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .card-header.green {
            background: linear-gradient(90deg, #21baa1 60%, #2196c0 110%);
        }

        .card-header.violet {
            background: linear-gradient(90deg, #7865f5 60%, #3169e5 110%);
        }

        .card-header.pink {
            background: linear-gradient(90deg, #da4f90 65%, #ad69f6 100%);
        }

        .card-header.orange {
            background: linear-gradient(90deg, #f7b233 60%, #f7931e 110%);
        }

        .card-header i {
            font-size: 1.2em;
            padding: 0.36em;
            border-radius: 9px;
            background: rgba(255, 255, 255, 0.17);
        }

        .card-header-title {
            font-weight: 600;
            font-size: 1.12em;
            margin-right: 8px;
        }

        .card-header-sub {
            font-size: 0.99em;
            opacity: 0.91;
        }

        .card-content {
            padding: 28px 20px 16px 20px;
            display: flex;
            flex-direction: column;
            gap: 16px;
        }

        .card-content.half-padding {
            padding: 22px 14px 7px 14px;
        }

        .form-row {
            display: flex;
            gap: 18px;
            margin-bottom: 13px;
        }

        .form-row>div {
            flex: 1 1 0;
            display: flex;
            flex-direction: column;
        }

        .field-label {
            font-weight: 500;
            color: #276cce;
            margin-bottom: 6px;
            font-size: 1.01em;
            letter-spacing: 0;
            display: flex;
            align-items: center;
            gap: 5px;
        }

        .input-field,
        .textarea-field,
        select {
            width: 100%;
            padding: 11px 12px;
            background: #f7fafc;
            border-radius: 8px;
            border: 2px solid #eaecf6;
            color: #384042;
            font-size: 1.03em;
            margin-bottom: 0;
            transition: border .18s;
            box-sizing: border-box;
        }

        select:disabled {
            color: #64677f;
            background: #f1f1f1;
        }

        .input-field:focus,
        .textarea-field:focus,
        select:focus {
            border-color: #40c3e7;
            outline: none;
        }

        .input-group {
            background: #f7fcfb;
            border-radius: 11px;
            border: 1.5px solid #daf2ec;
            margin-bottom: 9px;
            padding: 13px 17px 7px 17px;
        }

        .input-group.blue {
            background: #f1f7fd;
            border-color: #b8d9fa;
        }

        .input-group.violet {
            background: #f8f5fc;
            border-color: #dbd1f8;
        }

        .input-group.pink {
            background: #fef6fa;
            border-color: #f8d1ea;
        }

        .input-group .group-label {
            color: #1ea998;
            font-weight: 600;
            margin-bottom: 7px;
            font-size: 1.02em;
            display: flex;
            align-items: center;
            gap: 6px;
        }

        .input-group.blue .group-label {
            color: #2a72c5;
        }

        .input-group.violet .group-label {
            color: #6657c9;
        }

        .input-group.pink .group-label {
            color: #c03b88;
        }

        .textarea-field {
            min-height: 58px;
            resize: vertical;
            margin-top: 6px;
            background: #f7fafc;
        }

        .save-btn,
        .save-btn2,
        .save-btn3 {
            width: 135px;
            margin: 16px 0 0 0;
            padding: 11px 0;
            border: none;
            color: #fff;
            font-size: 1.08em;
            font-weight: 600;
            border-radius: 8px;
            box-shadow: 0 2px 9px rgba(42, 141, 255, .09);
            cursor: pointer;
            transition: background .15s;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 7px;
        }

        .save-btn {
            background: linear-gradient(90deg, #4d67e3 70%, #7369f7 100%);
        }

        .save-btn2 {
            background: linear-gradient(90deg, #de4690 70%, #b76ff9 100%);
        }

        .save-btn3 {
            background: linear-gradient(90deg, #ff9a58 70%, #ffd34d 100%);
            color: #624f00;
        }

        .save-btn:hover {
            background: linear-gradient(90deg, #363fc7 70%, #4f39b2 100%);
        }

        .save-btn2:hover {
            background: linear-gradient(90deg, #b7236f 75%, #8259c9 100%);
        }

        .save-btn3:hover {
            background: linear-gradient(90deg, #ff8723 80%, #ffc815 100%);
        }

        /* Table styling for document section */
        .doc-table {
            width: 100%;
            border-collapse: separate;
            border-spacing: 0 7px;
        }

        .doc-table th,
        .doc-table td {
            text-align: left;
            padding: 10px 14px;
            font-size: 1em;
        }

        .doc-table th {
            color: #be830c;
            font-weight: bold;
            background: transparent;
            font-size: 1.06em;
        }

        .doc-table td {
            background: #faf8f3;
            border-radius: 6px;
            color: #444;
            vertical-align: middle;
        }

        .doc-table .doc-icon {
            color: #f1bc50;
            font-size: 1.16em;
        }

        .download-btn {
            padding: 7px 18px;
            color: #fff;
            font-weight: 600;
            border: none;
            border-radius: 5px;
            background: linear-gradient(90deg, #38ce96 70%, #40c7ed 100%);
            font-size: .98em;
            cursor: pointer;
            transition: background .12s;
        }

        .download-btn:hover {
            background: linear-gradient(90deg, #24977b 75%, #27b8e7 100%);
        }

        .details-row {
            display: flex;
            gap: 20px;
            margin-bottom: 14px;
        }

        .details-col {
            flex: 1;
            min-width: 200px;
            background: #f8f9fa;
            border-radius: 7px;
            padding: 12px 16px;
            box-shadow: 0 1px 3px rgba(180, 210, 180, 0.10);
        }

        .field-label {
            color: #038d46;
            font-weight: 700;
            font-size: 13px;
            margin-bottom: 4px;
        }

        .field-value {
            color: #172a45;
            font-size: 16px;
            font-weight: 500;
            min-height: 20px;
            white-space: pre-wrap;
        }

        .status-pending {
            color: #e09f00;
        }

        .status-approved {
            color: #1fab57;
        }

        .status-rejected {
            color: #e04a34;
        }

        .card-header {
            padding: 10px 15px;
            font-weight: bold;
            font-size: 1.1em;
            display: flex;
            align-items: center;
        }

        .card-header.orange {
            background: #ff9800;
            color: white;
        }

        .card-header.green {
            background: #4caf50;
            color: white;
        }

        .card-header-title {
            margin-left: 8px;
        }

        .card-header-sub {
            font-size: 0.85em;
            opacity: 0.8;
        }

        .doc-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }

        .doc-table th,
        .doc-table td {
            border: 1px solid #ddd;
            padding: 8px 10px;
        }

        .doc-table th {
            background: #f5f5f5;
        }

        .text-muted {
            color: #999;
        }

        .text-center {
            text-align: center;
        }

        .download-btn {
            color: #1976d2;
            text-decoration: underline;
        }

        .fileInput {
            padding: 6px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }


        @media (max-width: 600px) {
            .details-row {
                flex-direction: column;
                gap: 6px;
            }
        }


        /* Responsive adjustments */
        @media (max-width: 1000px) {
            .dashboard {
                grid-template-columns: 1fr;
                gap: 24px;
                padding: 10px 4vw;
            }
        }

        @media (max-width: 700px) {
            .dashboard {
                padding: 3vw;
            }

            .card-header {
                padding: 12px 4vw 12px 4vw;
            }

            .card-content,
            .card-content.half-padding {
                padding: 12px 3vw 10px 3vw;
            }

            .form-row {
                flex-direction: column;
                gap: 9px;
                margin-bottom: 7px;
            }
        }
    </style>

@section('content')
    <div class="dashboard">
        <!-- आवेदन विवरण -->
        <div class="card-section">
            <div class="card-header green">
                <i class="fa-solid fa-file-lines"></i>
                <span class="card-header-title">आवेदन विवरण</span>
                <span class="card-header-sub">&nbsp;| Application Details</span>
            </div>
            <div class="card-content">
                <div class="details-row">
                    <div class="details-col">
                        <div class="field-label">{{ __("labels.app_no") }}</div>
                        <div class="field-value">{{ $application->application_number ?? '-' }}</div>
                    </div>
                    <div class="details-col">
                        <div class="field-label">{{ __("labels.app_name") }}</div>
                        <div class="field-value">{{ $application->applicant_name ?? '-' }}</div>
                    </div>
                </div>
                <div class="details-row">
                    <div class="details-col">
                        <div class="field-label">{{ __("labels.applicant_father_name") }}</div>
                        <div class="field-value">{{ $application->applicant_fname ?? '-' }}</div>
                    </div>
                    <div class="details-col">
                        <div class="field-label">{{ __("labels.status") }}</div>
                        <div class="field-value status-{{ strtolower($application->status ?? 'pending') }}">
                            {{ __(ucfirst($application->status ?? 'Pending')) }}
                        </div>
                    </div>
                </div>
                <div class="details-row">
                    <div class="details-col">
                        <div class="field-label">{{ __("labels.applicant_purpose") }}</div>
                        <div class="field-value">{{ $purposeName ?? '-' }}</div>
                    </div>
                    <div class="details-col">
                        <div class="field-label">{{ __("labels.rule_of_land_allocation") }}</div>
                        <div class="field-value">{{ $ruleName ?? '-' }}</div>
                    </div>
                </div>
            </div>
        </div>

        <!-- भूमि का विवरण -->
        @foreach($landDetails as $land)
            <div class="card-section">
                <div class="card-header violet">
                    <i class="fa-solid fa-map-location-dot"></i>
                    <span class="card-header-title">भूमि का विवरण</span>
                    <span class="card-header-sub">&nbsp;| Land Details</span>
                </div>
                <div class="card-content">
                    <div class="details-row">
                        <div class="details-col">
                            <div class="field-label">{{ __("labels.village_code") }}</div>
                            <div class="field-value">{{ $land->village_code }}></div>
                        </div>
                        <div class="details-col">
                            <div class="field-label">{{ __("labels.proposed_area") }}</div>
                            <div class="field-value">{{ $land->proposed_land_area }}></div>

                        </div>

                    </div>
                    <div class="row">
                        <div class="field-label">{{ __("labels.type_of_land") }}</div>
                        <div class="form-row">
                            <input class="input-field" type="text" value="{{ $land->land_type }}" readonly>
                            <input class="input-field" type="text" value="{{ $land->land_type }}">
                        </div>
                    </div>
                    <div class="input-group">
                        <div class="group-label"><i class="fa-regular fa-money-bill-1"></i>
                            {{ __("labels.railway_distance") }}</div>
                        <div class="form-row">
                            <input class="input-field" type="text" value="{{ $land->dist_from_RL }}" readonly>
                            <input class="input-field" type="text" value="{{ $land->dist_from_RL }}">
                        </div>
                    </div>
                    <div class="input-group blue">
                        <div class="group-label"><i class="fa-solid fa-flag"></i>
                            {{ __("labels.national_highway_distance") }}</div>
                        <div class="form-row">
                            <input class="input-field" type="text" value="{{ $land->dist_from_NH }}" readonly>
                            <input class="input-field" type="text" value="{{ $land->dist_from_NH }}">
                        </div>
                    </div>
                    <div class="input-group">
                        <div class="group-label"><i class="fa-solid fa-landmark-flag"></i> {{ __("labels.state_highway") }}
                        </div>
                        <div class="form-row">
                            <input class="input-field" type="text" value="{{ $land->dist_from_SH }}" readonly>
                            <input class="input-field" type="text" value="{{ $land->dist_from_SH }}">
                        </div>
                    </div>
                    <div class="input-group violet">
                        <div class="group-label"><i class="fa-solid fa-building"></i>
                            {{ __("labels.distance_from_town_city") }}</div>
                        <div class="form-row">
                            <input class="input-field" type="text" value="{{ $land->dist_from_City }}" readonly>
                            <input class="input-field" type="text" value="{{ $land->dist_from_City }}">
                        </div>
                    </div>
                    <div class="input-group pink">
                        <div class="group-label"><i class="fa-regular fa-comment-dots"></i> {{ __("labels.relevant_info") }}
                        </div>
                        <div class="form-row">
                            <input class="input-field" type="text" value="{{ $land->other_details }}" readonly>
                            <input class="input-field" type="text" value="{{ $land->other_details }}">
                        </div>
                    </div>
                    <button class="save-btn"><i class="fa-solid fa-floppy-disk"></i> {{ __("labels.save") }}</button>
                </div>
            </div>
        @endforeach
        <!-- Land Owner Details -->
        <div class="card-section">
            <div class="card-header pink">
                <i class="fa-solid fa-user"></i>
                <span class="card-header-title">{{ __("labels.owner_details") }}</span>
                <span class="card-header-sub">&nbsp;| Land Owner Details</span>
            </div>
            <div class="card-content half-padding">
                @foreach($landOwners as $owner)
                    <div class="input-group pink">
                        <div class="group-label"><i class="fa-regular fa-id-card"></i> {{ $owner->owner_name }}</div>
                        <div class="form-row">
                            <input class="input-field" type="text" placeholder="{{ __('labels.acc_father_name') }}"
                                value="{{ $owner->owner_fname }}" readonly>
                            <input class="input-field" type="text" placeholder="{{ __('labels.khasra') }}"
                                value="{{ $owner->khasra_number }}" readonly>
                            <input class="input-field" type="text" placeholder="{{ __('labels.address1') }}"
                                value="{{ $owner->owner_add1 }}" readonly>
                        </div>
                    </div>
                @endforeach
                <button class="save-btn2"><i class="fa-solid fa-floppy-disk"></i> {{ __("labels.save") }}</button>
            </div>
        </div>
        <!-- Document Details -->
        <div class="card-section">

            {{-- Heading: Uploaded Documents --}}
            <div class="card-header orange">
                <i class="fa-solid fa-file"></i>
                <span class="card-header-title">{{ __("labels.uploaded_documents") }}</span>
                <span class="card-header-sub"> | {{ __("labels.document_details") }}</span>
            </div>

            <div class="card-content half-padding">
                {{-- Uploaded Documents Table --}}
                <table class="doc-table">
                    <thead>
                        <tr>
                            <th>{{ __("labels.document_type") }}</th>
                            <th>{{ __("labels.uploaded_by") }}</th>
                            <th>{{ __("labels.view_document") }}</th>
                        </tr>
                    </thead>
                    <tbody id="uploadedDocsTable">
                        @forelse($docUploads as $uploads)
                            <tr>
                                <td><i class="fa-regular fa-file doc-icon"></i> {{ $uploads->document_id }}</td>
                                <td><i class="fa-regular fa-file doc-icon"></i> {{ $uploads->uploaded_by }}</td>
                                <td>
                                    @if(!empty($uploads->document_file))
                                        <a href="{{ asset('storage/' . $uploads->document_file) }}" target="_blank"
                                            class="download-btn">{{ __("labels.view_document") }}</a>
                                    @else
                                        <span class="text-muted">No File</span>
                                    @endif
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="2" class="text-center text-muted">
                                    {{ __("labels.no_documents_uploaded") }}
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            {{-- Upload New Document Section --}}
            <div class="card-header green" style="margin-top:20px;">
                <i class="fa-solid fa-upload"></i>
                <span class="card-header-title">{{ __("labels.upload_new_document") }}</span>
            </div>

            <div class="card-content half-padding">
                <form method="POST" action="{{ route('application.documents.store') }}" enctype="multipart/form-data"
                    class="upload-form" id="docUploadForm">
                    @csrf

                    <input type="hidden" name="actiondoc" id="actiondoc" value="{{ $application->application_number ?? '-' }}">
                    <table class="doc-table">
                        <thead>
                            <tr>
                                <th>{{ __("labels.document_type") }}</th>
                                <th>{{ __("labels.select_file") }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($docMasterTypes as $doccs)
                                <tr>
                                    <td>
                                        <i class="fa-regular fa-file doc-icon"></i> {{ $doccs->document_title }}
                                    </td>
                                    <td>
                                        <input type="file" name="{{ $doccs->document_details }}_doc"
                                            class="form-control fileInput" accept=".jpg, .png, .pdf">
                                        <div id="{{ $doccs->document_details }}_uploaded-preview" class="mt-2"></div>
                                        <small class="error text-danger" style="display:none;"></small>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <div class="text-right" style="margin-top:20px;">
                        <button type="submit" class="save-btn3">
                            <i class="fa-solid fa-upload"></i> {{ __("labels.upload") }}
                        </button>
                    </div>
                </form>

            </div>
        </div>

    </div>



<script>
document.getElementById("docUploadForm").addEventListener("submit", function(e) {
    e.preventDefault();

    let formData = new FormData(this);

    fetch("{{ route('application.documents.store') }}", {
        method: "POST",
        headers: { 'X-CSRF-TOKEN': '{{ csrf_token() }}' },
        body: formData
    })
    .then(res => res.json())
    .then(data => {
        if (data.success) {
            if (Array.isArray(data.newDocs)) {
                data.newDocs.forEach(doc => {
                    document.querySelector("#uploadedDocsTable").innerHTML += `
                        <tr>
                            <td><i class="fa-regular fa-file doc-icon"></i> ${doc.document_id}</td>
                            <td><a href="/storage/${doc.document_file}" target="_blank" class="download-btn">View Document</a></td>
                        </tr>
                    `;
                });
            }

            alert("Document uploaded successfully!");
            document.getElementById("docUploadForm").reset();
        } else {
            alert(data.message || "Something went wrong while uploading.");
        }
    })
    .catch(err => {
        console.error(err);
        alert("Upload failed! Please try again.");
    });
});
</script>

@endsection

