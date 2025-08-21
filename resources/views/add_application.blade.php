@extends('application_layout')



@section('title', __("labels.project_short_name"))
@section('pagetitle', __("labels.dashboard"))

@section('role_name', "user")

<meta charset="UTF-8" />


<title>Applicant Form</title>

<style>
    body {
        font-family: Arial, sans-serif;
        /* background: #f5f5f5; */
        padding: 20px;
    }

    .form-container {
        max-width: 1000px;
        margin: auto;
        background: #fff;
        padding: 30px;
        border-radius: 10px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    }

    h2 {
        color: #2c3e50;
        border-bottom: 2px solid #ccc;
        padding-bottom: 5px;
        margin-top: 30px;
    }

    label {
        font-weight: bold;
        display: block;
        margin-top: 15px;
    }

    input[type="text"],
    input[type="number"],
    textarea,
    select {
        width: 100%;
        padding: 10px;
        margin-top: 5px;
        border-radius: 5px;
        border: 1px solid #ccc;
        font-size: 14px;
    }

    .checkbox-group,
    .radio-group {
        margin-top: 10px;
    }

    .collapsible {
        /* background-color: #f1f1f1; */
        color: rgb(11, 127, 173);
        cursor: pointer;
        padding: 10px;
        width: 100%;
        border: none;
        text-align: left;
        outline: none;
        font-size: 15px;
        /* transition: background-color 0.3s; */
    }

    .active,
    .collapsible:hover {
        /* background-color: #ccc; */
    }

    .content {
        padding: 0 18px;
        display: none;
        overflow: hidden;
        /* background-color: #f9f9f9; */
    }

    .plus-minus {
        float: right;
    }





    .btn-custom {
        background-color: #004080;
        color: #ffffff;
        padding: 10px 20px;
        font-size: 16px;
        font-weight: 600;
        border: none;
        border-radius: 6px;
        cursor: pointer;
        width: 100%;
        text-align: left;
        display: flex;
        justify-content: space-between;
        align-items: center;
        transition: background-color 0.3s ease;
    }

    .btn-custom:hover,
    .btn-custom:focus {
        background-color: #0059b3;
        /* brighter on hover */
        outline: none;
    }

    .plus-minus {
        font-size: 18px;
        font-weight: bold;
    }
</style>

@section('content')
    <div class="container">
        <div class="row d-flex justify-content-center align-items-center">
            <div class="col-12 p-4">
                <div class="card card-registration card-registration-2" style="border-radius: 15px;">
                    <div class="card-body">

                        <form action="" onsubmit="return validateFormss()" id="ralamsForm" name="myForm">
                            @csrf
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="purpose_type" class="form-label">{{ __("labels.applicant_purpose") }}
                                        <span style="color: red;">*</span>
                                    </label>


                                    <select id="purpose_types" data-label="एप्लीकेशन पर्पस" name="allotment_purpose"
                                        class="form-control @error('allotment_purpose') is-invalid @enderror">
                                        <option value="">{{ __('labels.select_one') }}</option>
                                        @foreach($purpose as $item)
                                            <option value="{{ $item->id }}" {{ old('allotment_purpose') == $item->id ? 'selected' : '' }}>
                                                {{ $item->{'purpose_name_' . app()->getLocale()} }}
                                            </option>
                                        @endforeach
                                    </select>

                                    @error('allotment_purpose') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                </div>

                                <div class="col-md-6">
                                    <label for="land_owner_type"
                                        class="form-label">{{ __("labels.rule_of_land_allocation") }}
                                        <span style="color: red;">*</span></label>
                                    <select id="land_allotment_rule" data-label="भूमि आवंटन नियम" name="land_allotment_rule"
                                        class="form-control @error('land_owner_type') is-invalid @enderror" disabled>
                                        <option value="">{{ __('labels.select_one') }}</option>
                                        @foreach($rule as $item)
                                            <option value="{{ $item->id }}" {{ old('land_owner_type') == $item->id ? 'selected' : '' }}>
                                                {{ $item->{'rule_name_' . app()->getLocale()} }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <input type="hidden" id="land_allot_rule" name="land_allot_rule" value="">
                                    @error('land_owner_type') <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-12" id="purpose_details" style="display:none;">
                                    <label for="purpose_details">{{ __("labels.purpose_details") }}<span
                                            style="color: red;">*</span></label>
                                    <input type="text" id="purpose_details" data-label="{{ __("labels.purpose_details") }}"
                                        name="purpose_details" placeholder="{{ __("labels.purpose_details") }}"
                                        class="form-control @error('purpose_details') is-invalid @enderror"
                                        value="{{ old('purpose_details') }}">
                                    @error('purpose_details') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                </div>

                                <!-- <div class="col-md-4 mt-4" id="org_status" style="display:none;">
                                    <div class="form-group">
                                        <label>Organization Type:</label><br>
                                        <label>
                                            <input type="radio" name="org_status_radio" value="government" > Government
                                        </label>

                                        <label class="ml-3">
                                            <input type="radio" name="org_status_radio" value="non_government" checked >
                                            Non-Government
                                        </label>
                                    </div>
                                </div> -->


                                <div class="col-md-12 mt-4" id="org_status" style="display:none;">
                                    <div class="form-group">
                                        <label>{{ __("labels.applicant_type") }}</label><br>
                                        <label>
                                            <input type="radio" name="applicant_type" value="vyaktigat" checked> {{ __("labels.personal") }}
                                        </label>
                                        <label class="ml-3">
                                            <input type="radio" name="applicant_type" value="sanstha"> {{ __("labels.organization") }}
                                        </label>
                                        <label class="ml-3">
                                            <input type="radio" name="applicant_type" value="vibhag"> {{ __("labels.government_department") }}
                                        </label>
                                    </div>
                                </div>


                                <!-- <div class="col-md-4 mt-4" id="org_type" style="display:none;">
                                    <label for="org_type">{{ __("labels.rcv_org_type") }}<span
                                            style="color: red;">*</span></label>
                                    <select id="org_type" data-label="संस्था का प्रकार" name="org_type"
                                        class="form-control @error('org_type') is-invalid @enderror">
                                        <option value="">{{ __('labels.select_one') }}</option>
                                        @foreach(config('global_constants.org_types') as $code => $name)
                                        <option value="{{ $code }}" {{ old('org_type') == $code ? 'selected' : '' }}>
                                            {{ $name }}
                                        </option>
                                        @endforeach
                                    </select>
                                    @error('org_type') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                </div> -->


                                <div class="col-md-4 mt-4" id="app_name" style="display:none;">
                                    <label for="app_name">{{ __("labels.applicant_name") }}<span
                                            style="color: red;">*</span></label>
                                    <input type="text" id="app_name" data-label="{{ __("labels.applicant_name") }}"
                                        name="app_name" placeholder="{{ __("labels.applicant_name") }}"
                                        class="form-control @error('app_name') is-invalid @enderror"
                                        value="{{ old('app_name', Auth::user()->name ?? '') }}">
                                    @error('app_name') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                </div>

                                <div class="col-md-4 mt-4" id="app_fname" style="display:none;">
                                    <label for="appf_name">{{ __("labels.applicant_father_name") }}<span
                                            style="color: red;">*</span></label>
                                    <input type="text" id="app_fname" data-label="{{ __("labels.applicant_father_name") }}"
                                        name="app_fname" placeholder="{{ __("labels.applicant_father_name") }}"
                                        class="form-control @error('app_fname') is-invalid @enderror"
                                        value="{{ old('app_fname', Auth::user()->father_name ?? '') }}">
                                    @error('app_fname') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                </div>


                                <div class="col-md-4 mt-4" id="address_app" style="display:none;">
                                    <label for="address_app">{{ __("labels.applicant_address") }}<span
                                            style="color: red;">*</span></label>
                                    <input type="text" id="address_app" data-label="{{ __("labels.applicant_address") }}"
                                        name="address_app" placeholder="{{ __("labels.applicant_address") }}"
                                        class="form-control @error('address_app') is-invalid @enderror"
                                        value="{{ old('address_app', Auth::user()->postal_address ?? '') }}">
                                    @error('address_app') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                </div>

                                <div class="col-md-4 mt-4" id="app_mobile" style="display:none;">
                                    <label for="app_mobile">{{ __("labels.mobile_no") }}<span
                                            style="color: red;">*</span></label>
                                    <input type="text" id="app_mobile" data-label="मोबाइल नंबर" name="app_mobile"
                                        placeholder="मोबाइल नंबर"
                                        class="form-control @error('app_mobile') is-invalid @enderror"
                                        value="{{ old('app_mobile', Auth::user()->mobile ?? '') }}">
                                    @error('app_mobile') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                </div>

                                <div class="col-md-4 mt-4" id="app_email" style="display:none;">
                                    <label for="app_email">{{ __("labels.email_id") }}<span
                                            style="color: red;">*</span></label>
                                    <input type="text" id="app_email" data-label="ईमेल आई डी" name="app_email"
                                        placeholder="ईमेल आई डी"
                                        class="form-control @error('app_email') is-invalid @enderror"
                                        value="{{ old('app_email', Auth::user()->email ?? '') }}">
                                    @error('app_email') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                </div>

                                <div class="col-md-4 mt-4" id="org_name" style="display:none;">
                                    <label for="org_name">{{ __("labels.rcv_org_name") }}<span
                                            style="color: red;">*</span></label>
                                    <input type="text" id="org_name" data-label="संस्था का नाम" name="org_name"
                                        placeholder="संस्था का नाम"
                                        class="form-control @error('org_name') is-invalid @enderror"
                                        value="{{ old('org_name') }}">
                                    @error('org_name') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                </div>




                                <div class="col-md-4 mt-4" id="dep_name" style="display:none;">
                                    <label for="dep_name">{{ __("labels.depat_name") }}<span
                                            style="color: red;">*</span></label>
                                    <input type="text" id="dep_name" data-label="विभाग का नाम" name="dep_name"
                                        placeholder="विभाग का नाम"
                                        class="form-control @error('dep_name') is-invalid @enderror"
                                        value="{{ old('dep_name') }}">
                                    @error('dep_name') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                </div>



                                <div class="col-md-4 mt-4" id="app_des" style="display:none;">
                                    <label for="app_des">{{ __("labels.desiganation") }}<span
                                            style="color: red;">*</span></label>
                                    <input type="text" id="app_des" data-label="{{ __("labels.desiganation") }}"
                                        name="app_des" placeholder="{{ __("labels.desiganation") }}"
                                        class="form-control @error('app_des') is-invalid @enderror"
                                        value="{{ old('app_des') }}">
                                    @error('app_des') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                </div>




                                @if(session('success'))
                                    <div class="toast-container position-fixed bottom-0 end-0 p-3">
                                        <div class="toast align-items-center text-white bg-success border-0 show" role="alert"
                                            aria-live="assertive" aria-atomic="true">
                                            <div class="d-flex">
                                                <div class="toast-body">
                                                    {{ session('success') }}
                                                </div>
                                                <button type="button" class="btn-close btn-close-white me-2 m-auto"
                                                    data-bs-dismiss="toast"></button>
                                            </div>
                                        </div>
                                    </div>
                                @endif


                                <!-- <div class="col-12 mt-4" style="text-align:right">
                                    <button type="button" onclick="validateAndNext()" class="btn btn-primary">
                                        अगला
                                    </button>
                                </div> -->
                            </div>




                            <button type="button" id="land_selection"
                                class="collapsible btn-custom">{{ __("labels.land_selection") }}
                                <span class="plus-minus">+</span></button>
                            <div class="content" style="display: none;">

                                <div class="row d-flex justify-content-center align-items-center">
                                    <div class="col-12 p-4">
                                        <div class="card card-registration card-registration-2"
                                            style="border-radius: 15px;">
                                            <div class="card-body">

                                                <div class="row mb-3">

                                                    <div class="col-md-3 mt-4">
                                                        <label
                                                            for="khatedar_district">{{ __("labels.khatedar_district") }}<span
                                                                style="color: red;">*</span></label>
                                                        <!-- <input class="form-control" id="khatedar_district" type="text" placeholder="खातेदार का जिला" name="khatedar_district"> -->
                                                        <select name="district" class="form-control" required
                                                            onchange="fetchOptions('district', this.value)">
                                                            <option value="">{{ __("labels.select_district") }}</option>
                                                        </select>
                                                        <span id="khatedar-district-error" class="error-message"
                                                            style="color:red"></span>
                                                    </div>

                                                    <div class="col-md-3 mt-4">
                                                        <label for="khatedar_tehsil">{{ __("labels.khatedar_tehsil") }}<span
                                                                style="color: red;">*</span></label>
                                                        <!-- <input class="form-control" id="khatedar_tehsil" type="text" placeholder="खातेदार की तहसील" name="khatedar_tehsil"> -->
                                                        <select name="tehsil" class="form-control" required
                                                            onchange="fetchOptions('tehsil', this.value)">
                                                            <option value="">{{ __("labels.select_tehsil") }}</option>
                                                        </select>
                                                        <span id="khatedar-tehsil-error" class="error-message"
                                                            style="color:red"></span>
                                                    </div>

                                                    <div class="col-md-3 mt-4">
                                                        <label for="village">{{ __("labels.village") }}<span
                                                                style="color: red;">*</span></label>
                                                        <!-- <input class="form-control" id="village" type="text" placeholder="ग्राम" name="village"> -->
                                                        <select name="village" class="form-control" required>
                                                            <option value="">{{ __("labels.select_vill") }}</option>
                                                        </select>
                                                        <span id="village-error" class="error-message"
                                                            style="color:red"></span>
                                                    </div>

                                                    <div class="col-md-3 mt-4">
                                                        <label for="khasra">{{ __("labels.khasra") }}<span
                                                                style="color: red;">*</span></label>
                                                        <select id="khsra" name="khsra[]" class="form-control"
                                                            onchange="handleKhasraSelection(this)" multiple>
                                                        </select>
                                                        <span id="khasra-error" class="error-message"
                                                            style="color:red"></span>
                                                    </div>

                                                    <div class="collapse col-md-12 mt-4" id="collapseExample">
                                                        <div class="card card-body">
                                                            <h5>चयनित खसरा विवरण:</h5>
                                                            <div class="table-responsive">
                                                                <table class="table table-bordered table-hover">
                                                                    <thead class="table-light">
                                                                        <tr>
                                                                            <th>क्रमांक</th>
                                                                            <th>खसरा नंबर</th>
                                                                            <th>खसरे का क्षेत्रफल</th>
                                                                            <th>कार्य</th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody id="khasraTableBody">
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="collapse mt-3" id="collapseExample">
                                                        <div class="card card-body">
                                                            This is your hidden panel for खसरा.
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6 mt-4">
                                                        <label for="type_of_land">{{ __("labels.type_of_land") }}<span
                                                                style="color: red;">*</span></label>
                                                        <input class="form-control" id="type_of_land" type="text"
                                                            placeholder='{{ __("labels.type_of_land") }}' name="type_of_land">
                                                        <span id="land-type-error" class="error-message"
                                                            style="color:red"></span>
                                                    </div>



                                                    <div class="col-md-6 mt-4">
                                                        <label for="proposed_area">{{ __("labels.proposed_area") }}<span
                                                                style="color: red;">*</span></label>
                                                        <input class="form-control" id="proposed_area" type="text"
                                                            placeholder='{{ __("labels.proposed_area") }}' name="proposed_area">
                                                        <span id="proposed-area-error" class="error-message"
                                                            style="color:red"></span>
                                                    </div>

                                                </div>

                                                <div class="row mt-4">

                                                    <div class="col-md-6 mt-4">
                                                        <label
                                                            for="land_surrendered">{{ __("labels.land_surrendered") }}<span
                                                                style="color: red;">*</span>
                                                        </label><br>
                                                    </div>
                                                    <div class="col-md-6 d-flex align-items-center flex-wrap gap-3">
                                                        <div class="form-check d-flex align-items-center me-3">
                                                            <input class="form-check-input" type="radio"
                                                                name="land_surrendered" value="yes">
                                                            <label class="form-check-label">{{ __("labels.yes") }}</label>
                                                        </div>
                                                        <div class="form-check d-flex align-items-center me-3"
                                                            style="margin-left: 10px;">
                                                            <input class="form-check-input" type="radio"
                                                                name="land_surrendered" value="no" checked>
                                                            <label class="form-check-label">{{ __("labels.no") }}</label>
                                                        </div>
                                                        <div id="landSurrDetails" class="mt-2"
                                                            style="display: none; margin-left : 50px !important">
                                                            <textarea class="form-control mt-2" placeholder="विवरण"
                                                                style="min-width: 250px;"></textarea>
                                                        </div>
                                                    </div>

                                                </div>

                                                <!-- <div class="mt-4" style='float:left;'>
                                                                                                                                                    <button type="submit" class="btn btn-primary d-flex align-items-center gap-2">
                                                                                                                                                        <i class="fa fa-angle-double-left" aria-hidden="true"></i>&nbsp;&nbsp;
                                                                                                                                                        <span>{{ __("labels.previous") }}</span>
                                                                                                                                                    </button>
                                                                                                                                                </div> -->

                                                <div class="mt-4 d-flex justify-content-center">
                                                    <button type="submit"
                                                        class="btn btn-primary d-flex align-items-center gap-2">
                                                        <span>{{ __("labels.save") }}</span>
                                                    </button>
                                                </div>


                        </form>

                        <div class="modal fade" id="khasraModal" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLongTitle">{{ __("labels.land_detail") }}
                                        </h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <table id="land_owner_detail" class="table table-bordered table-lg">
                                        </table>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="button" class="btn btn-primary">Save
                                            changes</button>
                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </div>

    </div>


    <button type="button" id="sanstha_vivran" class="collapsible btn-custom"
        style="display:none;">{{ __("labels.sanstha_vivran") }}<span class="plus-minus">+</span></button>
    <div class="content">
        <div class="container py-4">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="card shadow rounded-3">
                        <div class="card-body p-4">
                            <form action="" method="post" id="sanstha_vivranForm" name="sanstha_vivranForm"
                                onsubmit="return validateFormsanstha()">
                                <input type="hidden" id="application_no_sanstha" name="application_no_sanstha" value="">
                                <fieldset class="mb-4">
                                    <div class="row g-3">

                                        <div class="col-md-6">
                                            <label for="land_alloted_details"
                                                class="form-label">{{ __("labels.land_alloted_details") }}</label>
                                            <textarea class="form-control" id="land_alloted_details"
                                                name="land_alloted_details" rows="3"></textarea>
                                        </div>

                                        <div class="col-md-6">
                                            <label for="org_reg_certificate" class="form-label">
                                                {{ __("labels.org_reg_certificate") }} <span class="text-danger">*</span>
                                            </label>
                                            <textarea class="form-control" id="org_reg_certificate"
                                                name="org_reg_certificate" rows="3"></textarea>
                                            <span id="org-reg-error" class="form-text text-danger"></span>
                                        </div>

                                        <div class="col-md-6">
                                            <label for="org_statement"
                                                class="form-label">{{ __("labels.org_statement") }}</label>
                                            <textarea class="form-control" id="org_statement" name="org_statement"
                                                rows="3"></textarea>
                                        </div>

                                        <div class="col-md-6">
                                            <label for="org_project_report"
                                                class="form-label">{{ __("labels.org_project_report") }}</label>
                                            <textarea class="form-control" id="org_project_report" name="org_project_report"
                                                rows="3"></textarea>
                                        </div>

                                        <div class="col-md-6">
                                            <label for="ins_allot_purpose"
                                                class="form-label">{{ __("labels.ins_allot_purpose") }}</label>
                                            <textarea class="form-control" id="ins_allot_purpose" name="ins_allot_purpose"
                                                rows="3"></textarea>
                                        </div>

                                        <div class="col-md-6">
                                            <label for="society_benefits"
                                                class="form-label">{{ __("labels.society_benefits") }}</label>
                                            <textarea class="form-control" id="society_benefits" name="society_benefits"
                                                rows="3"></textarea>
                                        </div>

                                        <div class="col-md-6">
                                            <label class="form-label">{{ __("labels.prev_allot_land") }}</label>
                                            <div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="land_used"
                                                        id="land_used_yes" value="yes">
                                                    <label class="form-check-label"
                                                        for="land_used_yes">{{ __("labels.yes") }}</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="land_used"
                                                        id="land_used_no" value="no" checked>
                                                    <label class="form-check-label"
                                                        for="land_used_no">{{ __("labels.no") }}</label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <label class="form-label">{{ __("labels.org_experience") }}</label>
                                            <div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="experience"
                                                        id="exp_yes" value="yes">
                                                    <label class="form-check-label"
                                                        for="exp_yes">{{ __("labels.yes") }}</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="experience"
                                                        id="exp_no" value="no" checked>
                                                    <label class="form-check-label"
                                                        for="exp_no">{{ __("labels.no") }}</label>
                                                </div>
                                            </div>
                                            <div id="experience_detail_box" class="mt-2" style="display:none;">
                                                <textarea class="form-control" rows="3"
                                                    placeholder="{{ __('labels.experience_detail_placeholder') }}"></textarea>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <label class="form-label">{{ __("labels.inst_reg_registrar") }}</label>
                                            <div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="registered"
                                                        id="reg_yes" value="yes">
                                                    <label class="form-check-label"
                                                        for="reg_yes">{{ __("labels.yes") }}</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="registered"
                                                        id="reg_no" value="no" checked>
                                                    <label class="form-check-label"
                                                        for="reg_no">{{ __("labels.no") }}</label>
                                                </div>
                                            </div>
                                            <div id="registered_detail_box" class="mt-2" style="display:none;">
                                                <textarea class="form-control" rows="3"
                                                    placeholder="{{ __('labels.registration_detail_placeholder') }}"></textarea>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <label for="reg_number" class="form-label">{{ __("labels.reg_number") }}</label>
                                            <input class="form-control" type="text" name="reg_number" id="reg_number"
                                                placeholder="पंजीयन क्रमांक">
                                        </div>

                                        <div class="col-md-4">
                                            <label for="reg_date" class="form-label">{{ __("labels.reg_date") }}</label>
                                            <input class="form-control" type="date" name="reg_date" id="reg_date"
                                                placeholder="पंजीयन तिथि">
                                        </div>

                                    </div> <!-- row end -->
                                </fieldset>

                                <div class="d-flex justify-content-center">
                                    <button type="submit" class="btn btn-primary px-5">
                                        {{ __("labels.save") }}
                                    </button>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>





    <button type="button" id="land_details" class="collapsible btn-custom mt-3">
        {{ __("labels.land_detail") }} <span class="plus-minus">+</span>
    </button>
    <div class="content">
        <div class="row d-flex justify-content-center align-items-center">
            <div class="col-12 p-4">
                <div class="card card-registration card-registration-2" style="border-radius: 15px;">
                    <div class="card-body">
                        <form action="" method="post" id="LandDetailform" name="LandDetailform"
                            onsubmit="return validateFormLandDetail()">

                            <div class="row mt-4">
                                <input type="hidden" id="application_no" name="application_no" value="">
                                <div class="col-md-6">
                                    <label class="form-label">
                                        {{ __("labels.khatedari_land") }}
                                    </label>
                                </div>

                                <div class="col-md-6 d-flex align-items-center flex-wrap gap-3">
                                    <div class="form-check d-flex align-items-center me-3">
                                        <input class="form-check-input me-1" type="radio" name="khatadari" value="yes"
                                            id="khatadariYes">
                                        <label class="form-check-label" for="khatadariYes">{{ __("labels.yes") }}</label>
                                    </div>

                                    <div class="form-check d-flex align-items-center me-3" style="margin-left: 10px;">
                                        <input class="form-check-input me-1" type="radio" name="khatadari" value="no"
                                            id="khatadariNo" checked>
                                        <label class="form-check-label" for="khatadariNo">{{ __("labels.no") }}</label>
                                    </div>

                                    <div id="khatadariDetails" class="align-items-center"
                                        style="display: none; margin-left : 50px !important">
                                        <input class="form-control" type="text" id="khatadariDetailsInput"
                                            name="khatadariDetails" placeholder="विवरण" style="min-width: 250px;">
                                    </div>
                                </div>
                            </div>




                            <div class="row mt-4">
                                <div class="col-md-6">
                                    <label>
                                        {{ __("labels.land_acquistion") }}
                                    </label>
                                </div>
                                <div class="col-md-6 d-flex align-items-center flex-wrap gap-3">
                                    <div class="form-check d-flex align-items-center me-3">
                                        <input class="form-check-input" type="radio" name="act_1894" value="yes">
                                        <label class="form-check-label">{{ __("labels.yes") }}</label>
                                    </div>
                                    <div class="form-check d-flex align-items-center me-3" style="margin-left: 10px;">
                                        <input class="form-check-input" type="radio" name="act_1894" value="no" checked>
                                        <label class="form-check-label">{{ __("labels.no") }}</label>
                                    </div>

                                    <div id="landacc" class="align-items-center"
                                        style="display: none; margin-left : 50px !important">
                                        <input class="form-control" type="text" id="landaccInput" name="landacc"
                                            placeholder="विवरण" style="min-width: 250px;">
                                    </div>
                                </div>

                            </div>

                            <div class="row mt-4">

                                <div class="col-md-6">
                                    <label for="irrigation_means">{{ __("labels.irrigation_means") }}<span
                                            style="color: red;">*</span></label>
                                </div>
                                <div class="col-md-6 d-flex align-items-center flex-wrap gap-3">
                                    <div class="form-check d-flex align-items-center me-3">
                                        <input class="form-check-input" type="radio" name="irrigation_means" value="yes">
                                        <label class="form-check-label">{{ __("labels.yes") }}</label>
                                    </div>
                                    <div class="form-check d-flex align-items-center me-3" style="margin-left: 10px;">
                                        <input class="form-check-input" type="radio" name="irrigation_means" value="no"
                                            checked>
                                        <label class="form-check-label">{{ __("labels.no") }}</label>
                                    </div>
                                    <div id="irrigationDetails" name="irrigationDetails"
                                        style="display:none;  margin-left : 50px !important">
                                        <input class="form-control" type="text" id="irrigationDetails"
                                            name="irrigationDetails" placeholder="विवरण" style="min-width: 250px;">

                                    </div>
                                </div>
                            </div>

                            <!-- <div class="row mt-4">

                                                                                                                <div class="col-md-6 mt-4">
                                                                                                                    <label for="development_fee">{{ __("labels.development_fee") }}<span
                                                                                                                            style="color: red;">*</span></label>
                                                                                                                    <input class="form-control" type="text" id="development_fee" name="development_fee"
                                                                                                                        placeholder="विकास शुल्क">
                                                                                                                    <span id="development-fee-error" class="error-message" style="color:red"></span>
                                                                                                                </div>

                                                                                                                <div class="col-md-6 mt-4">
                                                                                                                    <label for="development_rate">{{ __("labels.development_rate") }}<span
                                                                                                                            style="color: red;">*</span></label>
                                                                                                                    <input class="form-control" type="text" id="development_rate" name="development_rate"
                                                                                                                        placeholder="देय मूल्य/देय प्रीमियम की दर">
                                                                                                                    <span id="premium-rate-error" class="error-message" style="color:red"></span>
                                                                                                                </div>

                                                                                                            </div> -->


                            <div class="row mt-4">

                                <div class="col-md-3 mt-4">
                                    <label for="railway_distance">{{ __("labels.railway_distance") }}<span
                                            style="color: red;">*</span></label></label>
                                    <input class="form-control" type="text" id="railway_distance" name="railway_distance"
                                        placeholder='{{ __("labels.railway_distance") }}'>
                                    <span id="railway-distance-error" class="error-message" style="color:red"></span>
                                </div>

                                <div class="col-md-3 mt-4">
                                    <label for="national_highway_distance">{{ __("labels.national_highway_distance") }}<span
                                            style="color: red;">*</span></label></label>
                                    <input class="form-control" type="text" id="national_highway_distance"
                                        name="national_highway_distance" placeholder='{{ __("labels.national_highway_distance") }}'>
                                    <span id="national-highway-distance-error" class="error-message"
                                        style="color:red"></span>
                                </div>

                                <div class="col-md-3 mt-4">
                                    <label for="state_highway">{{ __("labels.state_highway") }}<span
                                            style="color: red;">*</span></label></label>
                                    <input class="form-control" type="text" id="state_highway" name="state_highway"
                                        placeholder='{{ __("labels.state_highway") }}'>
                                    <span id="state-highway-error" class="error-message" style="color:red"></span>
                                </div>

                                <div class="col-md-3 mt-4">
                                    <label for="distance_from_town_city">{{ __("labels.distance_from_town_city") }}<span
                                            style="color: red;">*</span></label></label>
                                    <input class="form-control" type="text" id="distance_from_town_city"
                                        name="distance_from_town_city" placeholder='{{ __("labels.distance_from_town_city") }}'>
                                    <span id="distance-error" class="error-message" style="color:red"></span>
                                </div>

                            </div>

                            <div class="row mb-3">


                                <!-- <div class="col-md-3 mt-4">
                                                                                                                    <label for="invoice_no">{{ __("labels.invoice_no") }}<span
                                                                                                                            style="color: red;">*</span></label>
                                                                                                                    <input class="form-control" type="text" id="invoice_no" name="invoice_no"
                                                                                                                        placeholder="चालान की संख्या">
                                                                                                                    <span id="invoice-no-error" class="error-message" style="color:red"></span>
                                                                                                                </div>

                                                                                                                <div class="col-md-3 mt-4">
                                                                                                                    <label for="date">{{ __("labels.date") }}<span style="color: red;">*</span></label>
                                                                                                                    <input class="form-control" id="datepicker"  type="text" placeholder="दिनांक"
                                                                                                                        name="date">
                                                                                                                    <span id="date-error" class="error-message" style="color:red"></span>
                                                                                                                </div> -->

                                <div class="col-md-6 mt-4">
                                    <label for="project_cost">{{ __("labels.project_cost") }}<span
                                            style="color: red;">*</span></label>
                                    <input class="form-control" type="text" id="project_cost" name="project_cost"
                                        placeholder='{{ __("labels.project_cost") }}'>
                                    <span id="project-cost-error" class="error-message" style="color:red"></span>
                                </div>

                                <div class="col-md-6 mt-4">
                                    <label for="relevant_info">{{ __("labels.relevant_info") }}<span
                                            style="color: red;">*</span></label>
                                    <input class="form-control" type="text" id="relevant_info" name="relevant_info"
                                        placeholder='{{ __("labels.relevant_info") }}'>
                                    <span id="relevant-info-error" class="error-message" style="color:red"></span>
                                </div>



                            </div>



                            <input type="hidden" name="action" id="actionInput" value="">


                            <div class="mt-4 d-flex justify-content-center">
                                <button type="submit" class="btn btn-primary  align-items-center gap-2"
                                    data-action="save" id="saveBtn">
                                    <span>{{ __("labels.save") }}</span>
                                </button>&nbsp;&nbsp;&nbsp;&nbsp;

                                <button type="submit"
                                    class="btn btn-success align-items-center gap-2 d-none"
                                    data-action="update"
                                    id="updateBtn">
                                    <span>{{ __("labels.update") }}</span>
                                </button>

                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="error-container" class="alert alert-danger" style="display:none;"></div>


    <button type="button" id="documents_upload" class="collapsible btn-custom mt-3">{{ __("labels.doc_upload") }}<span
            class="plus-minus">+</span></button>
    <div class="content">
        <div class="row d-flex justify-content-center align-items-center">
            <div class="col-12 p-4">
                <div class="card card-registration card-registration-2" style="border-radius: 15px;">
                    <div class="card-body">
                        <form action="" method="post" id="DocumentsUploadform" name="DocumentsUploadform"
                            onsubmit="return validateFormDocumentsUpload()">
                            <input type="hidden" id="application_no_doc" name="application_no_doc" value="">
                            <div class="row mb-3 table-responsive">

                                <table class="table table-bordered align-middle text-center">
                                    <thead class="table-primary">
                                        <tr>
                                            <th scope="col">{{ __("labels.S_no") }}</th>
                                            <th scope="col">{{ __("labels.doc_type") }}</th>
                                            <th scope="col">{{ __("labels.doc_availability") }}</th>
                                            <th scope="col">{{ __('labels.doc_upload') }} ({{ __('labels.doc_file_size') }})
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($documentTypes as $index => $doc)
                                            <tr>
                                                <th scope="row">{{ $index + 1 }}</th>
                                                <td>@if (app()->getLocale() === 'en')
                                                    {{ $doc->title_en }}
                                                @elseif(app()->getLocale() === 'hi')
                                                        {{ $doc->title_hi }}
                                                    @endif
                                                    <span style="color: red;">*</span>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline mt-4">
                                                        <input type="radio" class="form-check-input"
                                                            id="{{ $doc->document_details }}_yes"
                                                            name="{{ $doc->document_details }}" value="yes">
                                                        <label class="form-check-label"
                                                            for="{{ $doc->document_details }}_yes">{{ __("labels.yes") }}</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input type="radio" class="form-check-input"
                                                            id="{{ $doc->document_details }}_no"
                                                            name="{{ $doc->document_details }}" value="no" checked>
                                                        <label class="form-check-label"
                                                            for="{{ $doc->document_details }}_no">{{ __("labels.no") }}</label>
                                                    </div>
                                                </td>
                                                <td id="{{ $doc->document_details }}_td" style="display:none;">
                                                    <input type="file" name="{{ $doc->document_details }}_doc"
                                                        class="form-control fileInput" accept=".jpg, .png, application/pdf">

                                                    <div id="{{ $doc->document_details }}_uploaded-preview" class="mb-3"></div>


                                                    <small class="error"
                                                        style="color:red; display:block; margin-top:4px;"></small>

                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>

                            </div>



                            <!-- Preview Button -->


                            <input type="hidden" name="actiondoc" id="actionInputDoc" value="">


                            <div class="mt-4 d-flex justify-content-center">
                                <button type="button" class="btn btn-info" onclick="loadPreview()">
                                    {{ __("labels.preview") }}
                                </button>&nbsp;&nbsp;&nbsp;&nbsp;
                                <button type="submit" class="btn btn-primary  align-items-center gap-2"
                                    datadoc-action="savedoc" id="saveBtnDoc">
                                    <span>{{ __("labels.save") }}</span>
                                </button>&nbsp;&nbsp;&nbsp;&nbsp;

                                <button type="submit" class="btn btn-success  align-items-center gap-2 d-none"
                                    datadoc-action="updatedoc" id="updateBtnDoc" >
                                    <span>{{ __("labels.update") }}</span>
                                </button>&nbsp;&nbsp;&nbsp;&nbsp;

                                <button type="button" class="btn btn-info" onclick="finalSubmit()">
                                    {{ __("labels.final_submit") }}
                                </button>&nbsp;&nbsp;&nbsp;&nbsp;
                            </div>
                        </form>

                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul class="mb-0">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif



                        <!-- Modal HTML -->
                        <div class="modal fade" id="previewModal" tabindex="-1" role="dialog"
                            aria-labelledby="previewModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-xl modal-dialog-scrollable" role="document">
                                <div class="modal-content">
                                    <div class="modal-header bg-primary text-white">
                                        <h5 class="modal-title">Application Preview</h5>
                                        <button type="button" class="close text-white" data-bs-dismiss="modal"
                                            aria-label="Close">
                                            <span>&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body" id="preview-content">
                                        <div class="text-center">Loading...</div>
                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>

    <script src="{{ asset('application_assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('application_assets/js/sweetalert2@11.js') }}"></script>





    <script>
        document.querySelectorAll('button[type="submit"]').forEach(button => {
            button.addEventListener('click', function (e) {
                document.getElementById('actionInput').value = this.getAttribute('data-action');
                document.getElementById('actionInputDoc').value = this.getAttribute('datadoc-action');
            });
        });
    </script>

    <script>
        $('#khsra').select2({
            placeholder: "खसरा"
        });
        // $('#land_selection').removeClass('active');

        $(document).ready(function () {


            $('#land_selection + .content').hide();
            $('#land_selection .plus-minus').text('+');
            var autoSetRule = {
                @foreach($purpose as $item)
                    "{{ $item->id }}": "{{ $item->application_rule_id }}",
                @endforeach
                                        };

        var orgRequiredPurposeIds = [
            @foreach($purpose as $item)
                @if(in_array($item->purpose_name, ['पर्यटन', 'उद्योग']))
                    "{{ $item->id }}",
                @endif
            @endforeach
                                        ];


        $('#purpose_types').on('change', function () {
            var purposeTypeId = $(this).val();
            $('#land_selection + .content').slideDown();
            $('#land_selection .plus-minus').text('-');
            $('#land_selection').addClass('active');

            if (autoSetRule[purposeTypeId]) {
                $('#land_allotment_rule').val(autoSetRule[purposeTypeId]).trigger('change');
                $('#land_allot_rule').val(autoSetRule[purposeTypeId]);
            } else {
                $('#land_allotment_rule').val('').trigger('change');
                $('#land_allot_rule').val('');
            }
            console.log('purposeTypeId', purposeTypeId);

            if (orgRequiredPurposeIds.includes(purposeTypeId)) {
                $('#org_status').closest('.col-md-12').show();
                $('#app_name').closest('.col-md-4').show();
                $('#app_fname').closest('.col-md-4').show();
                $('#address_app').closest('.col-md-4').show();
                $('#app_mobile').closest('.col-md-4').show();
                $('#app_email').closest('.col-md-4').show();
                $('#purpose_details').closest('.col-md-12').show();
            } else if (purposeTypeId == '') { // Empty option
                $('#org_status').closest('.col-md-12').hide();
                $('#app_name').closest('.col-md-4').hide();
                $('#app_fname').closest('.col-md-4').hide();
                $('#address_app').closest('.col-md-4').hide();
                $('#app_mobile').closest('.col-md-4').hide();
                $('#app_email').closest('.col-md-4').hide();
                $('#dep_name').closest('.col-md-4').hide();
                $('#org_name').closest('.col-md-4').hide();
                $('#app_des').closest('.col-md-4').hide();
                $('#purpose_details').closest('.col-md-12').hide();
            } else {
                $('#org_status').closest('.col-md-4').show();
                $('#app_name').closest('.col-md-4').show();
                $('#app_fname').closest('.col-md-4').show();
                $('#address_app').closest('.col-md-4').show();
                $('#app_mobile').closest('.col-md-4').show();
                $('#app_email').closest('.col-md-4').show();
            }
        });
                                    });

        $(document).on('change', 'input[name="applicant_type"]', function () {
            const selected = $(this).val();

            if (selected === 'vyaktigat') {
                $('#app_name').closest('.col-md-4').show();
                $('#app_fname').closest('.col-md-4').show();
                $('#address_app').closest('.col-md-4').show();
                $('#app_mobile').closest('.col-md-4').show();
                $('#app_email').closest('.col-md-4').show();
                $('#dep_name').closest('.col-md-4').hide();
                $('#org_name').closest('.col-md-4').hide();
                $('#app_des').closest('.col-md-4').hide();

                $('#sanstha_vivran').hide();


                $('#sanstha_vivran').next('.content').slideUp();
                $('#sanstha_vivran .plus-minus').text('+');

                $('#sanstha_vivran').removeClass('active');


            } else if (selected === 'sanstha') {
                $('#org_name').closest('.col-md-4').show();
                $('#app_des').closest('.col-md-4').show();
                $('#app_name').closest('.col-md-4').show();
                $('#app_fname').closest('.col-md-4').show();
                $('#address_app').closest('.col-md-4').show();
                $('#app_mobile').closest('.col-md-4').show();
                $('#app_email').closest('.col-md-4').show();
                $('#dep_name').closest('.col-md-4').hide();

                $('#sanstha_vivran').show();
                $('#sanstha_vivran').next('.content').slideDown();
                $('#sanstha_vivran .plus-minus').text('-');
                $('#sanstha_vivran').addClass('active');
                $('#application_no_sanstha').val(data.data);

            } else if (selected === 'vibhag') {
                $('#dep_name').closest('.col-md-4').show();
                $('#app_des').closest('.col-md-4').show();
                $('#app_name').closest('.col-md-4').show();
                $('#app_fname').closest('.col-md-4').show();
                $('#address_app').closest('.col-md-4').show();
                $('#app_mobile').closest('.col-md-4').show();
                $('#app_email').closest('.col-md-4').show();
                $('#org_name').closest('.col-md-4').hide();

                $('#sanstha_vivran').hide();


                $('#sanstha_vivran').next('.content').slideUp();
                $('#sanstha_vivran .plus-minus').text('+');

                $('#sanstha_vivran').removeClass('active');
            }

        });





        var coll = document.getElementsByClassName("collapsible");

        for (var i = 0; i < coll.length; i++) {
            coll[i].addEventListener("click", function () {
                var content = this.nextElementSibling;
                var plusMinus = this.querySelector(".plus-minus");
                var isAlreadyOpen = content.style.display === "block";

                var allContents = document.getElementsByClassName("content");
                var allPlusMinus = document.querySelectorAll(".collapsible .plus-minus");
                for (var j = 0; j < allContents.length; j++) {
                    allContents[j].style.display = "none";
                }
                for (var k = 0; k < allPlusMinus.length; k++) {
                    allPlusMinus[k].textContent = "+";
                }

                if (!isAlreadyOpen) {
                    content.style.display = "block";
                    plusMinus.textContent = "-";
                }
            });
        }






        function showError(field, message) {
            let error = document.createElement("div");
            error.className = "invalid-feedback-client d-block text-danger";
            error.innerText = message;
            field.parentNode.appendChild(error);
        }

        function showError(field, message) {
            let error = document.createElement("div");
            error.className = "invalid-feedback-client d-block text-danger";
            error.innerText = message;
            field.parentNode.appendChild(error);
        }

        function finalSubmit() {
            Swal.fire({
                title: 'Are you sure?',
                text: 'Do you want to final submit the form?',
                icon: 'question',
                showCancelButton: true,
                confirmButtonText: 'Yes',
                cancelButtonText: 'Cancel',
                allowOutsideClick: false,
                allowEscapeKey: false,
                allowEnterKey: true,
                reverseButtons: true,
                timer: undefined
            }).then((result) => {
                if (result.isConfirmed) {
                    const form = document.getElementById('DocumentsUploadform');
                    const formData = new FormData(form);

                    fetch("{{ route('application.finalsubmit.store') }}", {
                        method: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },
                        body: formData
                    })
                        .then(response => {
                            if (!response.ok) {
                                return response.json().then(err => { throw err; });
                            }
                            return response.json();
                        })
                        .then(data => {
                            if (data.status) {
                                form.reset();

                                Swal.fire({
                                    toast: true,
                                    position: 'top-end',
                                    icon: 'success',
                                    title: data.message || 'Saved successfully and Send To' || data.authority,
                                    showConfirmButton: false,
                                    timer: 3000,
                                    timerProgressBar: true
                                });

                                setTimeout(() => {
                                    window.location.href = '/dashboard';
                                }, 1500);
                            }
                        })
                        .catch(error => {
                            console.error(error);

                            document.querySelectorAll('span.text-danger').forEach(span => {
                                span.innerText = '';
                            });

                            let toastMessage = 'Something went wrong. Please check your inputs.';

                            if (error.errors) {
                                for (const [key, messages] of Object.entries(error.errors)) {
                                    const errorSpan = document.getElementById(`${key.replaceAll('_', '-')}-error`);
                                    if (errorSpan) {
                                        errorSpan.innerText = messages[0];
                                    }
                                }

                                toastMessage = Object.values(error.errors)
                                    .map(messages => messages[0])
                                    .join('<br>');
                            } else if (error.message) {
                                toastMessage = error.message;
                            }

                            Swal.fire({
                                toast: true,
                                position: 'top-end',
                                icon: 'error',
                                title: 'Validation failed',
                                html: toastMessage,
                                showConfirmButton: false,
                                timer: 4000,
                                timerProgressBar: true
                            });
                        });


                }
            });

            return false;
        }
    </script>
    <script>
        function handleKhasraSelection(select) {
            const selectedValues = Array.from(select.selectedOptions);
            if (selectedValues.length === 0) return;

            const collapseEl = document.getElementById('collapseExample');
            const bsCollapse = new bootstrap.Collapse(collapseEl, {
                toggle: false
            });
            bsCollapse.show();
            const tbody = document.getElementById('khasraTableBody');

            tbody.innerHTML = '';

            selectedValues.forEach((option, index) => {
                const khasraArea = option.dataset.khasraArea || '';
                const villageLgcode = option.dataset.villageLgcode || '';
                const row = document.createElement('tr');
                row.innerHTML = `
                                                                                                    <td>${index + 1}</td>
                                                                                                    <td>${option.value}</td>
                                                                                                    <td>${khasraArea}</td>                
                                                                                                    <td>                    
                                                                                                        <button class="btn btn-sm btn-outline-danger" onclick=""><i class="fa fa-trash"></i></button>
                                                                                                        <a href="#" 
                                                                                                            onclick="event.preventDefault(); showKhasraDetails('${option.value}', '${villageLgcode}')" 
                                                                                                            class="btn btn-sm btn-outline-primary">
                                                                                                            <i class="fa fa-eye"></i>
                                                                                                        </a>

                                                                                                    </td>
                                                                                                `;
                tbody.appendChild(row);
            });
        }


        function showKhasraDetails(khasra, village_lgcode) {

            console.log('khasra', khasra);
            console.log('village_lgcode', village_lgcode);
            fetch("{{ route('get.khasra.details') }}", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                    "X-CSRF-TOKEN": "{{ csrf_token() }}"
                },
                body: JSON.stringify({
                    Village_lgcode: village_lgcode,
                    khasra: khasra
                })
            })
                .then(res => res.json())
                .then(data => {
                    console.log('API response:', data);
                    let html = "";
                    console.log('data.data', data.data.data);

                    if (data.data.statusCode === '1' && Array.isArray(data.data.data) && data.data.data.length > 0) {
                        html += `
                                                                                                            <thead>
                                                                                                                <tr>
                                                                                                                    <th>खसरा संख्या</th>
                                                                                                                    <th>खातेदार का नाम</th>
                                                                                                                    <th>पिता का नाम</th>
                                                                                                                    <th>पता</th>
                                                                                                                </tr>
                                                                                                            </thead>
                                                                                                            <tbody>
                                                                                                        `;

                        data.data.data.forEach(record => {
                            html += `
                                                                                                                <tr>
                                                                                                                    <td>${record.khasra || ''}</td>
                                                                                                                    <td>${record.name || ''}</td>
                                                                                                                    <td>${record.fathername || ''}</td>
                                                                                                                    <td>${record.Address || ''}</td>
                                                                                                                </tr>
                                                                                                            `;
                        });

                        html += `</tbody>`;
                    } else {
                        html = `<tr><td colspan="4" class="text-danger">कोई रिकॉर्ड नहीं मिला।</td></tr>`;
                    }

                    document.getElementById("land_owner_detail").innerHTML = html;

                    $('#khasraModal').modal('show');

                    //alert('hiii');
                })
                .catch(error => {
                    console.error("API Error:", error);
                    alert("API कॉल में समस्या हुई।");
                });
        }
    </script>

    <script>
        document.querySelectorAll('input[name="land_surrendered"]').forEach((elem) => {
            elem.addEventListener("change", function () {
                document.getElementById('landSurrDetails').style.display = (this.value === "yes") ? 'block' :
                    'none';
            });
        });

        function validateFormss() {
            Swal.fire({
                title: 'क्या आप सबमिट करना चाहते हैं?',
                text: 'क्या आप फॉर्म जमा करना चाहते हैं?',
                icon: 'question',
                showCancelButton: true,
                confirmButtonText: 'Yes',
                cancelButtonText: 'Cancel',
                allowOutsideClick: false,
                allowEscapeKey: false,
                allowEnterKey: true,
                reverseButtons: true,
                timer: undefined
            }).then((result) => {
                if (result.isConfirmed) {
                    const form = document.getElementById('ralamsForm');
                    const formData = new FormData(form);


                    fetch("{{ route('application.landdetail.store') }}", {
                        method: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },
                        body: formData
                    })
                        .then(response => {
                            if (!response.ok) {
                                return response.json().then(err => { throw err; });
                            }
                            return response.json();
                        })
                        .then(data => {
                            if (data.status) {
                                $('#land_selection').next('.content').slideUp();
                                $('#land_selection .plus-minus').text('+');

                                $('#land_details').next('.content').slideDown();
                                $('#land_details .plus-minus').text('-');

                                $('#land_details').addClass('active');
                                $('#land_selection').removeClass('active');
                                $('#application_no').val(data.data);
                                $('#application_no_doc').val(data.data);
                                $('#application_no_sanstha').val(data.data);

                                document.getElementById('tab2-link')?.classList.remove('disabled');
                                document.getElementById('tab3-link')?.classList.remove('disabled');

                                // form.reset();
                                // document.querySelector('select[name="tehsil"]').innerHTML =
                                //     '<option value="">--Select Tehsil--</option>';
                                // document.querySelector('select[name="village"]').innerHTML =
                                //     '<option value="">--Select Village--</option>';
                            }
                        })
                        .catch(error => {
                            console.error(error);

                            if (error.errors) {
                                for (const [key, messages] of Object.entries(error.errors)) {
                                    const errorSpan = document.getElementById(`${key.replaceAll('_', '-')}-error`);
                                    if (errorSpan) {
                                        errorSpan.innerText = messages[0];
                                    }
                                }
                            }

                            Swal.fire('Error!', 'Validation failed. Please check fields.', 'error');
                        });

                }
            });

            return false;
        }



        function validateFormLandDetail() {
            Swal.fire({
                title: 'Are you sure?',
                text: 'Do you want to submit the form?',
                icon: 'question',
                showCancelButton: true,
                confirmButtonText: 'Yes',
                cancelButtonText: 'Cancel',
                allowOutsideClick: false,
                allowEscapeKey: false,
                allowEnterKey: true,
                reverseButtons: true,
                timer: undefined
            }).then((result) => {
                if (result.isConfirmed) {
                    const form = document.getElementById('LandDetailform');
                    const formData = new FormData(form);

                    fetch("{{ route('application.landdetailsave.store') }}", {
                        method: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },
                        body: formData
                    })
                        .then(response => {
                            if (!response.ok) {
                                return response.json().then(err => { throw err; });
                            }
                            return response.json();
                        })
                        .then(data => {
                            if (data.status) {
                                $('#land_details').next('.content').slideUp();
                                $('#land_details .plus-minus').text('+');

                                $('#documents_upload').next('.content').slideDown();
                                $('#documents_upload .plus-minus').text('-');

                                $('#documents_upload').addClass('active');
                                $('#land_details').removeClass('active');

                                document.getElementById('tab2-link')?.classList.remove('disabled');
                                document.getElementById('tab3-link')?.classList.remove('disabled');

                                document.querySelector('select[name="tehsil"]').innerHTML =
                                    '<option value="">--Select Tehsil--</option>';
                                document.querySelector('select[name="village"]').innerHTML =
                                    '<option value="">--Select Village--</option>';
                            }
                        })
                        .catch(error => {
                            console.error(error);

                            if (error.errors) {
                                for (const [key, messages] of Object.entries(error.errors)) {
                                    const errorSpan = document.getElementById(`${key.replaceAll('_', '-')}-error`);
                                    if (errorSpan) {
                                        errorSpan.innerText = messages[0];
                                    }
                                }
                            }

                            Swal.fire('Error!', 'Validation failed. Please check fields.', 'error');
                        });
                }
            });

            return false;
        }


        function validateFormDocumentsUpload() {
            Swal.fire({
                title: 'Are you sure?',
                text: 'Do you want to submit the form?',
                icon: 'question',
                showCancelButton: true,
                confirmButtonText: 'Yes',
                cancelButtonText: 'Cancel',
                allowOutsideClick: false,
                allowEscapeKey: false,
                allowEnterKey: true,
                reverseButtons: true,
                timer: undefined
            }).then((result) => {
                if (result.isConfirmed) {
                    const form = document.getElementById('DocumentsUploadform');
                    const formData = new FormData(form);

                    fetch("{{ route('application.documentsave.store') }}", {
                        method: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },
                        body: formData
                    })
                        .then(response => {
                            if (!response.ok) {
                                return response.json().then(err => { throw err; });
                            }
                            return response.json();
                        })
                        .then(data => {
                            if (data.status) {
                                //form.reset();

                                Swal.fire({
                                    toast: true,
                                    position: 'top-end',
                                    icon: 'success',
                                    title: data.message || 'Uploaded successfully',
                                    showConfirmButton: false,
                                    timer: 3000,
                                    timerProgressBar: true
                                });


                                if (data.data) {
                                    updateUploadedFilesPreview(data.data);
                                }

                                // setTimeout(() => {
                                //     window.location.href = '/dashboard';
                                // }, 1500);
                            }
                        })
                        .catch(error => {
                            console.error(error);

                            document.querySelectorAll('span.text-danger').forEach(span => {
                                span.innerText = '';
                            });

                            let toastMessage = 'Something went wrong. Please check your inputs.';

                            if (error.errors) {
                                for (const [key, messages] of Object.entries(error.errors)) {
                                    const errorSpan = document.getElementById(`${key.replaceAll('_', '-')}-error`);
                                    if (errorSpan) {
                                        errorSpan.innerText = messages[0];
                                    }
                                }

                                toastMessage = Object.values(error.errors)
                                    .map(messages => messages[0])
                                    .join('<br>');
                            } else if (error.message) {
                                toastMessage = error.message;
                            }

                            Swal.fire({
                                toast: true,
                                position: 'top-end',
                                icon: 'error',
                                title: 'Validation failed',
                                html: toastMessage,
                                showConfirmButton: false,
                                timer: 4000,
                                timerProgressBar: true
                            });
                        });


                }
            });

            return false;
        }


        function updateUploadedFilesPreview(documents) {
            let docsArray = Array.isArray(documents) ? documents : [documents];

            docsArray.forEach(doc => {
                const docKey = doc.document_id;
                const docId = doc.id;
                const fileUrl = doc.document_file;

                if (!docKey || !fileUrl) return;

                const previewContainerId = docKey + '_uploaded-preview';
                const previewContainer = document.getElementById(previewContainerId);

                if (previewContainer) {
                    const fileName = fileUrl.split('/').pop();

                    const previewHTML = `
                        <div class="uploaded-file-item" style="display:flex; align-items:center; gap:8px; margin-bottom:6px;">
                            <a href="${fileUrl}" target="_blank" rel="noopener noreferrer">view</a>
                            <button type="button" class="btn btn-danger btn-sm" onclick="deleteFile('${docId}', '${previewContainerId}')">Delete</button>
                        </div>
                    `;

                    previewContainer.innerHTML = previewHTML;
                }
            });
        }

        function deleteFile(docId, previewContainerId) {
            Swal.fire({
                title: 'Are you sure?',
                text: "This file will be permanently deleted!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    fetch(`/delete-file/${docId}`, {
                        method: 'DELETE',
                        headers: {
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                            'Accept': 'application/json'
                        }
                    })
                        .then(res => res.json())

                        .then(data => {
                            console.log('data',data);
                            
                            if (data.success) {
                                document.getElementById(previewContainerId).innerHTML = '';
                                Swal.fire('Deleted!', 'File has been deleted.', 'success');
                            } else {
                                Swal.fire('Error', data.message || 'File could not be deleted.', 'error');
                            }
                        })
                        .catch(err => {
                            console.error(err);
                            Swal.fire('Error', 'Server error occurred.', 'error');
                        });
                }
            });
        }








        $(document).ready(function () {
            $('input[name="experience"]').change(function () {
                if ($(this).val() === 'yes') {
                    $('#experience_detail_box').slideDown();
                } else {
                    $('#experience_detail_box').slideUp();
                }
            });

            $('input[name="registered"]').change(function () {
                if ($(this).val() === 'yes') {
                    $('#registered_detail_box').slideDown();
                } else {
                    $('#registered_detail_box').slideUp();
                }
            });
        });


        function validateFormsanstha() {
            const form = document.getElementById('sanstha_vivranForm');
            const formData = new FormData(form);

            fetch("{{ route('application.saveSansthaDetails.store') }}", {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: formData
            })
                .then(response => {
                    if (!response.ok) {
                        return response.json().then(err => { throw err; });
                    }
                    return response.json();
                })
                .then(data => {
                    if (data.status) {
                        $('#sanstha_vivran').next('.content').slideUp();
                        $('#sanstha_vivran .plus-minus').text('+');

                        $('#land_details').next('.content').slideDown();
                        $('#land_details .plus-minus').text('-');



                        $('#land_details').addClass('active');
                        $('#sanstha_vivran').removeClass('active');


                        Swal.fire({
                            toast: true,
                            position: 'top-end',
                            icon: 'success',
                            title: data.message || 'Added successfully',
                            showConfirmButton: false,
                            timer: 3000,
                            timerProgressBar: true
                        });
                    }
                })
                .catch(error => {
                    console.error(error);

                    if (error.errors) {
                        for (const [key, messages] of Object.entries(error.errors)) {
                            const errorSpan = document.getElementById(`${key.replaceAll('_', '-')}-error`);
                            if (errorSpan) {
                                errorSpan.innerText = messages[0];
                            }
                        }
                    }

                    Swal.fire({
                        toast: true,
                        position: 'top-end',
                        icon: 'error',
                        title: 'Validation failed. Please check fields.',
                        showConfirmButton: false,
                        timer: 3000,
                        timerProgressBar: true
                    });
                });

            return false;
        }




        $('.fileInput').on('change', function () {
            var file = this.files[0];
            var error = '';

            if (file) {
                if (file.type !== 'application/pdf') {
                    error = 'Only PDF files are allowed.';
                } else if (file.size > 2 * 1024 * 1024) {
                    error = 'File size must be 2 MB or less.';
                }
            }

            $(this).siblings('.error').text(error);

            if (error) {
                $(this).val('');
            }
        });


        $(document).ready(function () {
            @if(session('show_preview'))
                $('#previewModal').modal('show');
            @endif
                                        });



    </script>

    <script>
        function fetchOptions(type, value = '') {
            $("#ajax-loader").show();

            fetch('/getlocation?type=' + type + '&value=' + encodeURIComponent(value))
                .then(response => response.text())
                .then(text => {
                    console.log('Raw response:', text);

                    let data;
                    try {
                        data = JSON.parse(text);
                        console.log('data:', data);
                    } catch (e) {
                        console.error('Invalid JSON:', text);
                        return;
                    }

                    if (data.error) {
                        console.error('Server returned error:', data.error);
                        return;
                    }

                    let targetSelect;

                    // खाताेदार selects
                    if (type === 'districts') {
                        targetSelect = document.querySelector('select[name="district"]');
                        targetSelect.innerHTML = '<option value="">{{ __("labels.select_district") }}</option>';
                        data.forEach(district => {
                            targetSelect.innerHTML += `<option value="${district.district_code}">${district.District_Name}</option>`;
                        });
                        targetSelect.innerHTML += `<option value="other">Other</option>`;
                        return;
                    }

                    if (type === 'district') {
                        targetSelect = document.querySelector('select[name="tehsil"]');
                        targetSelect.innerHTML = '<option value="">--Select Tehsil--</option>';
                        data.forEach(tehsil => {
                            targetSelect.innerHTML += `<option value="${tehsil.Block_id1}">${tehsil.Block_Name}</option>`;
                        });
                        // reset village
                        document.querySelector('select[name="village"]').innerHTML =
                            '<option value="">--Select Village--</option>';
                        return;
                    }

                    if (type === 'tehsil') {
                        targetSelect = document.querySelector('select[name="village"]');
                        targetSelect.innerHTML = '<option value="">--Select Village--</option>';
                        data.forEach(village => {
                            targetSelect.innerHTML +=
                                `<option value="${village.Village_Id}">${village.Village_Name}</option>`;
                        });
                        return;
                    }

                })
                .catch(error => {
                    console.error('Fetch error:', error);
                }).finally(() => {
                    $("#ajax-loader").hide();
                });
        }

        document.addEventListener('DOMContentLoaded', function () {
            fetchOptions('districts');

        });
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const villageSelect = document.querySelector('select[name="village"]');
            const khasraSelect = document.querySelector('#khsra');

            if (!villageSelect || !khasraSelect) {
                console.error('Village or Khasra select not found.');
                return;
            }

            villageSelect.addEventListener('change', function () {
                $("#ajax-loader").show();
                const villageCode = this.value;

                if (!villageCode || villageCode === 'other') {
                    khasraSelect.innerHTML = '<option value="">खसरा</option>';
                    return;
                }

                fetch('/get-khasra', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute(
                            'content')
                    },
                    body: JSON.stringify({
                        village_code: villageCode
                    })
                })
                    .then(response => response.json())
                    .then(data => {
                        // khasraSelect.innerHTML = '<option value="" disabled>खसरा</option>';

                        console.log('Raw :', data);

                        if (data.error) {
                            console.error(data.error);
                            return;
                        }

                        const khasraList = data.api_response?.data || [];
                        const villageLgCode = data.decoded_data?.Village_lgcode || "";

                        khasraList.forEach(k => {
                            const label =
                                `${k.khasra} (खाता: ${k.khata}, क्षेत्रफल: ${k.TotalArea})`;
                            khasraSelect.innerHTML +=
                                `<option data-khasra-area="${k.TotalArea}" data-village-lgcode="${villageLgCode}" value="${k.khasra}">${label}</option>`;
                        });
                    })
                    .catch(err => {
                        console.error('Error fetching Khasra:', err);
                    }).finally(() => {
                        $("#ajax-loader").hide();
                    });
            });
        });
    </script>

    <script>
        document.querySelectorAll('input[name="prev_alloc"]').forEach((elem) => {
            elem.addEventListener("change", function () {
                document.getElementById('prev_alloc_detail_box').style.display = (this.value === "yes") ?
                    'block' : 'none';
            });
        });

        document.querySelectorAll('input[name="more_land"]').forEach((elem) => {
            elem.addEventListener("change", function () {
                document.getElementById('moreLandDetails').style.display = (this.value === "yes") ? 'block' :
                    'none';
            });
        });

        document.querySelectorAll('input[name="khatadari"]').forEach(function (elem) {
            elem.addEventListener('change', function () {
                document.getElementById('khatadariDetails').style.display = this.value === 'yes' ? 'flex' : 'none';
            });
        });

        document.querySelectorAll('input[name="act_1894"]').forEach(function (elem) {
            elem.addEventListener('change', function () {
                document.getElementById('landacc').style.display = this.value === 'yes' ? 'flex' : 'none';
            });
        });

        document.querySelectorAll('input[name="copy_khasra_map"]').forEach((elem) => {
            elem.addEventListener("change", function () {
                document.getElementById('copy_khasra_map_td').style.display = (this.value === "yes") ? 'block' :
                    'none';
            });
        });

        document.querySelectorAll('input[name="original_copy_challan"]').forEach((elem) => {
            elem.addEventListener("change", function () {
                document.getElementById('original_copy_challan_td').style.display = (this.value === "yes") ? 'block' :
                    'none';
            });
        });

        document.querySelectorAll('input[name="project_cost_copy"]').forEach((elem) => {
            elem.addEventListener("change", function () {
                document.getElementById('project_cost_copy_td').style.display = (this.value === "yes") ? 'block' :
                    'none';
            });
        });

        document.querySelectorAll('input[name="copies_revenue_map"]').forEach((elem) => {
            elem.addEventListener("change", function () {
                document.getElementById('copies_revenue_map_td').style.display = (this.value === "yes") ? 'block' :
                    'none';
            });
        });

        document.querySelectorAll('input[name="irrigation_means"]').forEach((elem) => {
            elem.addEventListener("change", function () {
                document.getElementById('irrigationDetails').style.display = (this.value === "yes") ? 'block' :
                    'none';
            });
        });


        $(function () {
            var today = new Date();
            var threeMonthsAgo = new Date();
            threeMonthsAgo.setMonth(today.getMonth() - 3);

            $("#datepicker").datepicker({
                dateFormat: "yy-mm-dd",
                maxDate: today,
                minDate: threeMonthsAgo,
                changeMonth: true,
                changeYear: true
            });
        });

        document.getElementById('submitBtn').addEventListener('click', function (e) {
            e.preventDefault();
            let confirmed = confirm("Are you sure you want to submit?");
            if (confirmed) {
                this.closest('form').submit();
            }
        });
    </script>


@endsection