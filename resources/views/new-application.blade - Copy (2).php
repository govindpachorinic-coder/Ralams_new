@extends('layouts.front_layout')
<style>
    .select2 {
        width: 100% !important;
    }
</style>
@section('content')
    <div class="row justify-content-center">
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <div class="col-md-12 col-sm-9 col-md-7 col-lg-6 text-center p-0 mt-3 mb-2">
            <div class="border border-secondary px-5" style="border-radius: 15px;">
                <div class="px-0 pt-4 pb-0 mt-0 mb-3">
                    <ul id="progressbar">
                        <li class="active" id="step1">
                            <strong>नया आवेदन</strong>
                        </li>
                        <li id="step2"><strong>{{ __('labels.land_selection') }}</strong></li>
                        <li id="step3"><strong>{{ __('labels.land_detail') }}</strong></li>
                        <li id="step4"><strong>{{ __('labels.doc_upload') }}</strong></li>
                    </ul>
                    <form id="applicant-form" enctype="multipart/form-data">
                        @csrf
                        <fieldset>
                            <div class="card shadow" style="border-radius: 15px;">
                                <div class="card-title text-center btn-custom pt-2" type="button" style="font-size:20px;">

                                    <div class="col-md-12 mt-2 mb-2">
                                        <h3>आवेदन विवरण</h3>
                                    </div>
                                </div>
                                <div class="row card-body pt-4" style="">
                                    <div class="col-md-6" align="left">
                                        <label for="purpose_type" class="form-label">{{ __('labels.applicant_purpose') }}
                                            <span style="color: red;">*</span>
                                        </label>
                                        <select id="purpose_types" data-label="एप्लीकेशन पर्पस" name="allotment_purpose"
                                            class="form-control @error('allotment_purpose') is-invalid @enderror">
                                            <option value="">{{ __('labels.select_one') }}</option>
                                            @foreach ($purposes as $item)
                                                <option value="{{ $item->id }}"
                                                    data-rule-id="{{ $item->application_rule_id }}"
                                                    {{ old('allotment_purpose') == $item->id ? 'selected' : '' }}>
                                                    {{ $item->{'purpose_name_' . app()->getLocale()} }}
                                                </option>
                                            @endforeach
                                        </select>
                                        <span id="allotment_purpose_error" style="color: red;"></span>
                                        @error('allotment_purpose')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-6" align="left">
                                        <label for="land_owner_type"
                                            class="form-label">{{ __('labels.rule_of_land_allocation') }}
                                            <span style="color: red;">*</span></label>
                                        <select id="land_allotment_rule" data-label="भूमि आवंटन नियम"
                                            name="land_allotment_rule"
                                            class="form-control @error('land_owner_type') is-invalid @enderror" readonly>
                                            <option value="">{{ __('labels.select_one') }}</option>
                                            @foreach ($rules as $item)
                                                <option value="{{ $item->id }}"
                                                    {{ old('land_owner_type') == $item->id ? 'selected' : '' }}>
                                                    {{ $item->{'rule_name_' . app()->getLocale()} }}
                                                </option>
                                            @endforeach
                                        </select>
                                        <span id="land_allotment_rule_error" style="color: red;"></span>
                                        @error('land_owner_type')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-12 mt-4" align="left" id="purpose_details">
                                        <label for="purpose_details">{{ __('labels.purpose_details') }}<span
                                                style="color: red;">*</span></label>
                                        <input type="text" id="purpose_details"
                                            data-label="{{ __('labels.purpose_details') }}" name="purpose_details"
                                            class="form-control @error('purpose_details') is-invalid @enderror"
                                            value="{{ old('purpose_details') }}">
                                        @error('purpose_details')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row card-body mb-4">
                                    <div class="col-md-12" id="org_status" align="left">
                                        <span>{{ __('labels.applicant_type') }}:</span>
                                        <div class="inline-radio">
                                            <label>
                                                <input type="radio" name="applicant_type" id="personal" value="personal"
                                                    checked> {{ __('labels.personal') }}
                                            </label>
                                            <label class="ml-3">
                                                <input type="radio" name="applicant_type" value="orgnization">
                                                {{ __('labels.organization') }}
                                            </label>
                                            <label class="ml-3">
                                                <input type="radio" name="applicant_type" value="department">
                                                {{ __('labels.department') }}
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-md-4 mt-4" align="left" id="app_name" style="display:none;">
                                        <label for="app_name">{{ __('labels.applicant_name') }}<span
                                                style="color: red;">*</span></label>
                                        <input type="text" id="app_name" data-label="{{ __('labels.applicant_name') }}"
                                            name="app_name" placeholder="{{ __('labels.applicant_name') }}"
                                            class="form-control @error('app_name') is-invalid @enderror"
                                            value="{{ old('app_name', Auth::user()->name ?? '') }}">
                                        <span id="app_name_error" style="color: red;"></span>
                                        @error('app_name')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="col-md-4 mt-4" align="left" id="app_fname" style="display:none;">
                                        <label for="appf_name">{{ __('labels.applicant_father_name') }}<span
                                                style="color: red;">*</span></label>
                                        <input type="text" id="app_fname"
                                            data-label="{{ __('labels.applicant_father_name') }}" name="app_fname"
                                            align="left" placeholder="{{ __('labels.applicant_father_name') }}"
                                            class="form-control mt-4 @error('app_fname') is-invalid @enderror"
                                            value="{{ old('app_fname', Auth::user()->father_name ?? '') }}">
                                        <span id="app_fname_error" style="color: red;"></span>
                                        @error('app_fname')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>


                                    <div class="col-md-4 mt-4" align="left" id="address_app" style="display:none;">
                                        <label for="address_app">{{ __('labels.applicant_address') }}<span
                                                style="color: red;">*</span></label>
                                        <input type="text" id="address_app"
                                            data-label="{{ __('labels.applicant_address') }}"name="address_app"
                                            placeholder="{{ __('labels.applicant_address') }}"
                                            class="form-control mt-4 @error('address_app') is-invalid @enderror"
                                            value="{{ old('address_app', Auth::user()->postal_address ?? '') }}">
                                        <span id="address_app_error" style="color: red;"></span>
                                        @error('address_app')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="col-md-4 mt-4" align="left" id="app_mobile" style="display:none;">
                                        <label for="app_mobile">{{ __('labels.mobile_no') }}<span
                                                style="color: red;">*</span></label>
                                        <input type="text" id="app_mobile" data-label="मोबाइल नंबर" name="app_mobile"
                                            placeholder="मोबाइल नंबर"
                                            class="form-control @error('app_mobile') is-invalid @enderror"
                                            value="{{ old('app_mobile', Auth::user()->mobile ?? '') }}">
                                        <span id="app_mobile_error" style="color: red;"></span>
                                        @error('app_mobile')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="col-md-4 mt-4" align="left" id="app_email" style="display:none;">
                                        <label for="app_email">{{ __('labels.email_id') }}<span
                                                style="color: red;">*</span></label>
                                        <input type="text" id="app_email" data-label="ईमेल आई डी" name="app_email"
                                            placeholder="ईमेल आई डी"
                                            class="form-control @error('app_email') is-invalid @enderror"
                                            value="{{ old('app_email', Auth::user()->email ?? '') }}">
                                        <span id="app_email_error" style="color: red;"></span>
                                        @error('app_email')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="col-md-4 mt-4" align="left" id="org_name" style="display:none;">
                                        <label for="org_name">{{ __('labels.rcv_org_name') }}<span
                                                style="color: red;">*</span></label>
                                        <input type="text" id="org_name" data-label="संस्था का नाम" name="org_name"
                                            placeholder="संस्था का नाम"
                                            class="form-control @error('org_name') is-invalid @enderror"
                                            value="{{ old('org_name') }}">
                                        <span id="org_name_error" style="color: red;"></span>
                                        @error('org_name')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="col-md-4 mt-4" align="left" id="dep_name" style="display:none;">
                                        <label for="dep_name">{{ __('labels.depat_name') }}<span
                                                style="color: red;">*</span></label>
                                        <input type="text" id="dep_name" data-label="विभाग का नाम" name="dep_name"
                                            placeholder="विभाग का नाम"
                                            class="form-control @error('dep_name') is-invalid @enderror"
                                            value="{{ old('dep_name') }}">
                                        <span id="dep_name_error" style="color: red;"></span>
                                        @error('dep_name')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="col-md-4 mt-4" align="left" id="app_des" style="display:none;">
                                        <label for="app_des">{{ __('labels.desiganation') }}<span
                                                style="color: red;">*</span></label>
                                        <input type="text" id="app_des"
                                            data-label="{{ __('labels.desiganation') }}" name="app_des"
                                            placeholder="{{ __('labels.desiganation') }}"
                                            class="form-control @error('app_des') is-invalid @enderror"
                                            value="{{ old('app_des') }}">
                                        <span id="app_des_error" style="color: red;"></span>
                                        @error('app_des')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>


                                    @if (session('success'))
                                        <div class="toast-container position-fixed bottom-0 end-0 p-3">
                                            <div class="toast align-items-center text-white bg-success border-0 show"
                                                role="alert" aria-live="assertive" aria-atomic="true">
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
                                </div>
                                {{-- organization field  --}}
                                <div class="row card-body">
                                    <div class="col-md-6 mt-4" align="left" id="land_alloted_details"
                                        style="display:none;">
                                        <label for="land_alloted_details">{{ __('labels.land_alloted_details') }}<span
                                                style="color: red;">*</span></label>
                                        <input type="text" id="land_alloted_details" name="land_alloted_details"
                                            class="form-control mt-4 @error('land_alloted_details') is-invalid @enderror"
                                            value="{{ old('land_alloted_details') }}">
                                        <span id="land_alloted_details_error" style="color: red;"></span>
                                        @error('land_alloted_details')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="col-md-6 mt-4" align="left" id="org_statement" style="display:none;">
                                        <label for="org_statement">{{ __('labels.org_statement') }}<span
                                                style="color: red;">*</span></label>
                                        <input type="file" class="form-control mt-4" id="org_statement"
                                            name="org_statement" accept=".pdf,.xls,.xlsx,.jpg,.jpeg,.png">
                                        <span id="org_statement_error" style="color: red;"></span>
                                    </div>

                                    <div class="col-md-6 mt-4" align="left" id="project_report" style="display:none;">
                                        <label for="project_report">{{ __('labels.org_project_report') }}<span
                                                style="color: red;">*</span></label>
                                        <input type="text" name="project_report" class="form-control"
                                            value="{{ old('project_report') }}">
                                        <span id="project_report_error" style="color: red;"></span>
                                        <input type="file" name="project_report_file" id="project_report_file"
                                            class="form-control mt-2" accept=".pdf,.doc,.docx,.xls,.xlsx,.jpg,.jpeg,.png">
                                        <span id="project_report_file_error" style="color: red;"></span>
                                    </div>

                                    <div class="col-md-6 mt-4" align="left" id="ins_allot_purpose"
                                        style="display:none;">
                                        <label for="ins_allot_purpose">{{ __('labels.ins_allot_purpose') }}<span
                                                style="color: red;">*</span></label>
                                        <input type="file" class="form-control" id="ins_allot_purpose"
                                            name="ins_allot_purpose" accept=".pdf">
                                        <span id="ins_allot_purpose_error" style="color: red;"></span>
                                    </div>

                                    <div class="col-md-6 mt-4" align="left" id="society_benefits"
                                        style="display:none;">
                                        <label for="society_benefits">{{ __('labels.society_benefits') }}<span
                                                style="color: red;">*</span></label>
                                        <input type="text" id="society_benefits" name="society_benefits"
                                            class="form-control @error('society_benefits') is-invalid @enderror"
                                            value="{{ old('society_benefits') }}">
                                        <span id="society_benefits_error" style="color: red;"></span>
                                        <input type="file" class="form-control mt-2" id="society_benefits_file"
                                            name="society_benefits_file" accept=".pdf">
                                        <span id="society_benefits_file_error" style="color: red;"></span>
                                    </div>

                                    <div class="col-md-6 mt-4" align="left" id="previous_alloted"
                                        style="display:none;">
                                        <label>{{ __('labels.prev_allot_land') }}<span
                                                style="color: red;">*</span></label>
                                        <div class="d-flex gap-3 align-items-center">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="land_used"
                                                    id="land_used_yes" value="yes" checked>
                                                <label class="form-check-label mr-3"
                                                    for="land_used_yes">{{ __('labels.yes') }}</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="land_used"
                                                    id="land_used_no" value="no">
                                                <label class="form-check-label"
                                                    for="land_used_no">{{ __('labels.no') }}</label>
                                            </div>
                                        </div>
                                        <div class="mt-2" id="prev_allot_land">
                                            <input type="file" class="form-control" id="prev_allot_land_file"
                                                name="prev_allot_land_file" accept=".pdf">
                                            <span id="prev_allot_land_file_error" style="color: red;"></span>
                                        </div>
                                    </div>

                                    <div class="col-md-6 mt-4" align="left" id="experience" style="display:none;">
                                        <label>{{ __('labels.org_experience') }}<span style="color: red;">*</span></label>
                                        <div class="d-flex gap-3 align-items-center">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="experience"
                                                    id="exp_yes" value="yes" checked>
                                                <label class="form-check-label mr-3"
                                                    for="exp_yes">{{ __('labels.yes') }}</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="experience"
                                                    id="exp_no" value="no">
                                                <label class="form-check-label"
                                                    for="exp_no">{{ __('labels.no') }}</label>
                                            </div>
                                        </div>
                                        <div id="experience_detail_box" class="mt-2">
                                            <textarea class="form-control" id="experience_detail" name="experience_detail" rows="3"
                                                placeholder="Please provide details of experience"></textarea>
                                            <span id="experience_detail_error" style="color: red;"></span>
                                        </div>
                                    </div>

                                    <div class="col-md-6 mt-4" align="left" id="registered" style="display:none;">
                                        <label>{{ __('labels.inst_reg_registrar') }}<span
                                                style="color: red;">*</span></label>
                                        <div class="d-flex gap-3 align-items-center">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="registered"
                                                    id="reg_yes" value="yes" checked>
                                                <label class="form-check-label mr-3"
                                                    for="reg_yes">{{ __('labels.yes') }}</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="registered"
                                                    id="reg_no" value="no">
                                                <label class="form-check-label"
                                                    for="reg_no">{{ __('labels.no') }}</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Registration Fields -->
                                <div class="row card-body" id="registration-fields">
                                    <div class="col-md-4 mt-4" align="left" id="inst_reg_registrar"
                                        style="display:none;">
                                        <label for="inst_reg_registrar">{{ __('labels.inst_reg_registrar') }}</label><span
                                            style="color: red;">*</span>
                                        <!-- <textarea class="form-control mb-2" name="inst_reg_registrar" rows="3"></textarea> -->
                                        <label for="income_expenditure">{{ __('labels.income_expenditure') }}</label>
                                        <input type="file" class="form-control" id="income_expenditure"
                                            name="income_expenditure" accept=".pdf,.xls,.xlsx,.jpg,.jpeg,.png" required>
                                        <span id="income_expenditure_error" style="color: red;"></span>
                                        <span id="org-reg-error" class="form-text text-danger"></span>
                                    </div>
                                    <div class="col-md-6" align="left">
                                        <label for="reg_number">{{ __('labels.reg_number') }}</label><span
                                            style="color: red;">*</span>
                                        <input class="form-control" type="text" name="reg_number" id="reg_number">
                                        <span id="reg_number_error" style="color: red;"></span>
                                    </div>
                                    <div class="col-md-6" align="left">
                                        <label for="reg_date">{{ __('labels.reg_date') }}</label><span
                                            style="color: red;">*</span>
                                        <input class="form-control datepicker" type="text" name="reg_date"
                                            id="reg_date">
                                        <span id="reg_date_error" style="color: red;"></span>
                                    </div>
                                    <div class="col-md-12 mt-4" align="left">
                                        <label
                                            for="org_reg_certificate">{{ __('labels.org_reg_certificate') }}</label><span
                                            style="color: red;">*</span>
                                        <textarea class="form-control mb-2" name="org_reg_certificate" rows="3"></textarea>
                                        <span id="org_reg_certificate_error" style="color: red;"></span>
                                        <input type="file" class="form-control" id="org_reg_certificate_file"
                                            name="org_reg_certificate_file" accept=".pdf">
                                        <span id="org_reg_certificate_file_error" style="color: red;"></span>
                                    </div>
                                </div>



                                <!-- <center><button type="submit" class="btn-submit mb-4">जमा करें</button></center> -->
                            </div>
                            <input type="button" name="next-step" id="applicant_next"
                                class="btn btn-success next-step mt-5" value="Save & Next" />
                        </fieldset>
                    </form>
                    <form id="land_selection_form">
                        @csrf
                        <fieldset>
                            <div class="card shadow" style="border-radius: 15px;">
                                <div class="card-title text-center btn-custom pt-2" type="button"
                                    style="font-size:20px;">
                                    <div class="col-md-12 mt-2 mb-2" style="text-align: left;">
                                        <span class="icon">&#128205;</span>{{ __('labels.land_selection') }}
                                    </div>
                                </div>
                                <input type="hidden" class="application_no" name="application_id" value="">
                                <div class="row card-body pt-4 pb-5">
                                    <div class="col-md-6" align="left">
                                        <label for="khatedar_district">{{ __('labels.khatedar_district') }}<span
                                                style="color: red;">*</span></label>
                                        <select name="district" class="form-control" id="district_id" required>
                                            <option value="">{{ __('labels.select_district') }}</option>
                                            @foreach ($districts as $district)
                                                <option value="{{ $district->district_code }}">
                                                    {{ $district->District_Name }}</option>
                                            @endforeach
                                        </select>
                                        <span id="district_error" style="color: red;"></span>

                                    </div>
                                    <div class="col-md-6" align="left">
                                        <label for="khatedar_tehsil">{{ __('labels.khatedar_tehsil') }}<span
                                                style="color: red;">*</span></label>
                                        <select name="tehsil" id="tehsil_id" class="form-control" required>
                                            <option value="">{{ __('labels.select_tehsil') }}</option>
                                        </select>

                                        <span id="tehsil_error" style="color: red;"></span>
                                    </div>
                                    <div class="col-md-6 mt-3" align="left">
                                        <label for="village">{{ __('labels.village') }}<span
                                                style="color: red;">*</span></label>
                                        <select name="village" id="village_id" class="form-control" required>
                                            <option value="">{{ __('labels.select_vill') }}</option>
                                        </select>
                                        <span id="village-error" class="error-message" style="color:red"></span>
                                        <span id="village_error" style="color: red;"></span>
                                    </div>

                                    <div class="col-md-6 mt-3" align="left">
                                        <label for="khasra">{{ __('labels.khasra') }}<span
                                                style="color: red;">*</span></label>
                                        <select id="khsra" name="khsra[]" class="form-control" multiple>
                                            <option value=""></option>
                                        </select>
                                        <span id="khasra-error" class="error-message" style="color:red"></span>
                                        <span id="khsra_error" style="color: red;"></span>
                                    </div>

                                    <div class="col-md-12 mt-4">
                                        <div class="card card-body">
                                            <h3 class="text-danger">चयनित खसरा विवरण</h3>
                                            <div class="table-responsive">
                                                <table class="table table-bordered table-hover">
                                                    <thead>
                                                        <tr class="table-secondary">
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
                                    <div class="modal fade" id="khasraModal" tabindex="-1" role="dialog"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-xl" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <h2 class="mb-4 text-primary">भूमि का विवरण</h2>
                                                    <div class="table-responsive">
                                                        <table class="table table-bordered align-middle">
                                                            <thead>
                                                                <tr class="table-secondary">
                                                                    <th>खसरा संख्या</th>
                                                                    <th>खातेदार का नाम</th>
                                                                    <th>पिता का नाम</th>
                                                                    <th>पता</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody id="land_owner_detail">

                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-dismiss="modal">Close</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal fade" id="khasraModal11" tabindex="-1" role="dialog"
                                        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLongTitle">
                                                        {{ __('labels.land_detail') }}
                                                    </h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <table id="land_owner_detail" class="table table-bordered table-lg">
                                                    </table>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-dismiss="modal">Close</button>
                                                    <button type="button" class="btn btn-primary">Save
                                                        changes</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- <div class="collapse mt-3" id="collapseExample">
                                        <div class="card card-body">
                                            This is your hidden panel for खसरा.
                                        </div>
                                    </div> --}}

                                    <div class="col-md-6 mt-4" align="left">
                                        <label for="type_of_land">{{ __('labels.type_of_land') }}<span
                                                style="color: red;">*</span></label>
                                        <input class="form-control" id="type_of_land" type="text"
                                            placeholder="{{ __('labels.type_of_land') }}" name="type_of_land">
                                        <span id="land-type-error" class="error-message" style="color:red"></span>
                                        <span id="type_of_land_error" style="color: red;"></span>
                                    </div>

                                    <div class="col-md-6 mt-4" align="left">
                                        <label for="proposed_area">{{ __('labels.proposed_area') }}<span
                                                style="color: red;">*</span></label>
                                        <input class="form-control" id="proposed_area" type="text"
                                            placeholder="{{ __('labels.proposed_area') }}" name="proposed_area">
                                        <span id="proposed-area-error" class="error-message" style="color:red"></span>
                                        <span id="proposed_area_error" style="color: red;"></span>
                                    </div>

                                </div>
                                <div class="row card-body">
                                    <div class="col-md-6" align="left">
                                        <label for="land_surrendered">{{ __('labels.land_surrendered') }}<span
                                                style="color: red;">*</span>
                                        </label><br>
                                    </div>
                                    <div class="col-md-6 d-flex align-items-center" style="margin-top: -25px;">
                                        <div class="form-check d-flex align-items-center">
                                            <input class="form-check-input" type="radio" name="land_surrendered"
                                                value="yes">
                                            <label class="form-check-label">{{ __('labels.yes') }}</label>
                                        </div>
                                        <div class="form-check d-flex align-items-center" style="margin-left: 10px;">
                                            <input class="form-check-input" type="radio" name="land_surrendered"
                                                value="no" checked>
                                            <label class="form-check-label">{{ __('labels.no') }}</label>
                                        </div>
                                        <div id="landSurrDetails" class="mt-2"
                                            style="display: none; margin-left : 50px !important">
                                            <textarea name="land_surrendered_detail" id="land_surrendered_detail" class="form-control mt-2" placeholder="विवरण"
                                                style="min-width: 300px;"></textarea>
                                            <span id="land_surrendered_detail_error" style="color: red;"></span>
                                        </div>
                                    </div>
                                </div>
                                <!-- <center><button type="submit" class="btn-submit mb-4">जमा करें</button></center> -->
                            </div>
                            <input type="button" name="previous-step" class="btn btn-success previous-step mt-5"
                                value="Previous" />
                            <input type="button" name="next-step" class="btn btn-success next-step mt-5"
                                value="Save & Next" />
                        </fieldset>
                    </form>
                    <form id="land_detail_form">
                        @csrf
                        <fieldset>
                            <div class="card shadow" style="border-radius: 15px;">
                                <div class="card-title text-center btn-custom pt-2" type="button"
                                    style="font-size:20px;">
                                    <div class="col-md-12 mt-2 mb-2" style="text-align: left;">
                                        <span class="icon">&#128206;</span>{{ __('labels.land_detail') }}
                                    </div>
                                </div>
                                <div class="row card-body mt-4">
                                    <input type="hidden" class="application_no" name="application_id" value="">
                                    <div class="col-md-6" align="left">
                                        <label class="form-label">
                                            {{ __('labels.khatedari_land') }}
                                        </label>
                                    </div>

                                    <div class="col-md-6 d-flex align-items-center">
                                        <div class="form-check d-flex align-items-center">
                                            <input class="form-check-input me-1" type="radio" name="khatadari"
                                                value="yes" id="khatadariYes">
                                            <label class="form-check-label"
                                                for="khatadariYes">{{ __('labels.yes') }}</label>
                                        </div>

                                        <div class="form-check d-flex align-items-center" style="margin-left: 10px;">
                                            <input class="form-check-input me-1" type="radio" name="khatadari"
                                                value="no" id="khatadariNo" checked>
                                            <label class="form-check-label"
                                                for="khatadariNo">{{ __('labels.no') }}</label>
                                        </div>
                                        <div id="khatadariDetails" class="mt-2"
                                            style="display: none; margin-left : 50px !important">
                                            <textarea class="form-control mt-2" id="khatadariDetailsInput" name="khatadariDetails" placeholder="विवरण"
                                                style="min-width: 300px;"></textarea>
                                            <span id="khatadariDetails_error" style="color: red;"></span>
                                        </div>

                                    </div>
                                </div>
                                <div class="row card-body mt-4">
                                    <div class="col-md-6" align="left">
                                        <label>
                                            {{ __('labels.land_acquistion') }}
                                        </label>
                                    </div>
                                    <div class="col-md-6 d-flex align-items-center">
                                        <div class="form-check d-flex align-items-center">
                                            <input class="form-check-input" type="radio" name="act_1894"
                                                value="yes">
                                            <label class="form-check-label">{{ __('labels.yes') }}</label>
                                        </div>
                                        <div class="form-check d-flex align-items-center" style="margin-left: 10px;">
                                            <input class="form-check-input" type="radio" name="act_1894"
                                                value="no" checked>
                                            <label class="form-check-label">{{ __('labels.no') }}</label>
                                        </div>
                                        <div id="landacc" class="mt-2"
                                            style="display: none; margin-left : 50px !important">
                                            <textarea class="form-control mt-2" id="landaccInput" name="landacc" placeholder="विवरण" style="min-width: 300px;"></textarea>
                                            <span id="landacc_error" style="color: red;"></span>
                                        </div>
                                    </div>
                                </div>

                                <div class="row card-body mt-4">
                                    <div class="col-md-6" align="left">
                                        <label for="irrigation_means">{{ __('labels.irrigation_means') }}<span
                                                style="color: red;">*</span></label>
                                    </div>
                                    <div class="col-md-6 d-flex align-items-center flex-wrap gap-3">
                                        <div class="form-check d-flex align-items-center me-3">
                                            <input class="form-check-input" type="radio" name="irrigation_means"
                                                value="yes">
                                            <label class="form-check-label">{{ __('labels.yes') }}</label>
                                        </div>
                                        <div class="form-check d-flex align-items-center me-3" style="margin-left: 10px;">
                                            <input class="form-check-input" type="radio" name="irrigation_means"
                                                value="no" checked>
                                            <label class="form-check-label">{{ __('labels.no') }}</label>
                                        </div>
                                        <div id="irrigationDetails" class="mt-2"
                                            style="display: none; margin-left : 50px !important">
                                            <textarea class="form-control mt-2" id="irrigationDetailsinput" name="irrigationDetails" placeholder="विवरण"
                                                style="min-width: 300px;"></textarea>
                                            <span id="irrigationDetails_error" style="color: red;"></span>
                                        </div>





                                    </div>
                                </div>

                                <div class="row card-body mt-4">
                                    <div class="col-md-3 mt-4" align="left">
                                        <label for="railway_distance">{{ __('labels.railway_distance') }}<span
                                                style="color: red;">*</span></label></label>
                                        <input class="form-control" type="text" id="railway_distance"
                                            name="railway_distance" placeholder="मीटर में दूरी">
                                        <span id="railway-distance-error" class="error-message" style="color:red"></span>
                                        <span id="railway_distance_error" style="color: red;"></span>

                                    </div>

                                    <div class="col-md-3 mt-4" align="left">
                                        <label
                                            for="national_highway_distance">{{ __('labels.national_highway_distance') }}<span
                                                style="color: red;">*</span></label></label>
                                        <input class="form-control" type="text" id="national_highway_distance"
                                            name="national_highway_distance" placeholder="मीटर में दूरी">
                                        <span id="national-highway-distance-error" class="error-message"
                                            style="color:red"></span>
                                        <span id="national_highway_distance_error" style="color: red;"></span>
                                    </div>

                                    <div class="col-md-3 mt-4" align="left">
                                        <label for="state_highway">{{ __('labels.state_highway') }}<span
                                                style="color: red;">*</span></label></label>
                                        <input class="form-control" type="text" id="state_highway"
                                            name="state_highway" placeholder="मीटर में दूरी">
                                        <span id="state-highway-error" class="error-message" style="color:red"></span>
                                        <span id="state_highway_error" style="color: red;"></span>
                                    </div>

                                    <div class="col-md-3 mt-4" align="left">
                                        <label
                                            for="distance_from_town_city">{{ __('labels.distance_from_town_city') }}<span
                                                style="color: red;">*</span></label></label>
                                        <input class="form-control" type="text" id="distance_from_town_city"
                                            name="distance_from_town_city" placeholder="मीटर में दूरी">
                                        <span id="distance-error" class="error-message" style="color:red"></span>
                                        <span id="distance_from_town_city_error" style="color: red;"></span>
                                    </div>
                                </div>

                                <div class="row card-body mb-3">
                                    <div class="col-md-6 mt-4" align="left">
                                        <label for="project_cost">{{ __('labels.project_cost') }}<span
                                                style="color: red;">*</span></label>
                                        <input class="form-control" type="text" id="project_cost" name="project_cost"
                                            placeholder="परियोजना लागत">
                                        <span id="project-cost-error" class="error-message" style="color:red"></span>
                                        <span id="project_cost_error" style="color: red;"></span>
                                    </div>

                                    <div class="col-md-6 mt-4" align="left">
                                        <label for="relevant_info">{{ __('labels.relevant_info') }}<span
                                                style="color: red;">*</span></label>
                                        <input class="form-control" type="text" id="relevant_info"
                                            name="relevant_info" placeholder="अन्य कोई सुसंगत सूचना">
                                        <span id="relevant-info-error" class="error-message" style="color:red"></span>
                                        <span id="relevant_info_error" style="color: red;"></span>
                                    </div>
                                </div>
                            </div>
                            <input type="button" name="previous-step" class="btn btn-success previous-step mt-5"
                                value="Previous" />
                            <input type="button" name="next-step" class="btn btn-success next-step mt-5"
                                value="Save & Next" />
                        </fieldset>
                    </form>
                    <form id="doc_upload_form" enctype="multipart/form-data">
                        @csrf
                        <fieldset>
                            <div class="card shadow" style="border-radius: 15px;">
                                <div class="card-title text-center btn-custom pt-2" type="button"
                                    style="font-size:20px;">
                                    <div class="col-md-12 mt-2 mb-2" style="text-align: left;">
                                        <span class="icon">&#128206;</span>{{ __('labels.doc_upload') }}
                                    </div>
                                </div>

                                <div class="row mb-3 table-responsive" style="margin-left: 0px !important;">
                                    <input type="hidden" class="application_no" name="application_id" value="">
                                    <table class="table table-bordered align-middle text-center">
                                        <thead class="table-primary">
                                            <tr>
                                                <th scope="col">{{ __('labels.S_no') }}</th>
                                                <th scope="col">{{ __('labels.doc_type') }}</th>
                                                <th scope="col">{{ __('labels.doc_availability') }}</th>
                                                <th scope="col">{{ __('labels.doc_upload') }}
                                                    ({{ __('labels.doc_file_size') }})</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($documentTypes as $key => $document)
                                                <tr>
                                                    <input type="text" name="document_id"
                                                        value="{{ $document->id }}">
                                                    <td>{{ $key + 1 }}</td>
                                                    <td>{{ $document->{'title_' . app()->getLocale()} }}</td>
                                                    <td>
                                                        <div class="form-check form-check-inline mt-4">
                                                            <input type="radio" class="form-check-input doc-radio"
                                                                data-target="#file_{{ $key }}"
                                                                id="{{ $document->document_details . '_yes_' . $key }}"
                                                                name="{{ 'is_' . $document->document_details }}"
                                                                value="yes" checked>
                                                            <label class="form-check-label"
                                                                for="{{ $document->document_details . '_yes_' . $key }}">
                                                                {{ __('labels.yes') }}
                                                            </label>
                                                        </div>

                                                        <div class="form-check form-check-inline">
                                                            <input type="radio" class="form-check-input doc-radio"
                                                                data-target="#file_{{ $key }}"
                                                                id="{{ $document->document_details . '_no_' . $key }}"
                                                                name="{{ 'is_' . $document->document_details }}"
                                                                value="no">
                                                            <label class="form-check-label"
                                                                for="{{ $document->document_details . '_no_' . $key }}">
                                                                {{ __('labels.no') }}
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div id="file_{{ $key }}" class="file-wrapper">
                                                            <input type="file"
                                                                name="{{ $document->document_details }}"
                                                                id="{{ $document->document_details }}"
                                                                class="form-control fileInput"
                                                                accept=".jpg, .png, application/pdf">
                                                            <small class="error"
                                                                style="color:red; display:block; margin-top:4px;"></small>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach

                                        </tbody>
                                    </table>
                                </div>
                                <!-- <center><button type="submit" class="btn-submit mb-4"><i class="bi bi-send-fill"></i> जमा करें
                                                                                </button>
                                                                                </center> -->
                            </div>
                            <input type="button" name="previous-step" class="btn btn-success previous-step mt-5"
                                value="Previous" />
                            <input type="button" name="next-step" class="btn btn-success next-step mt-5"
                                value="Save" />
                            {{-- <input type="button" name="preview-step" class="btn btn-success preview-step mt-5"
                                value="Preview & Final Submit" /> --}}
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {

            $('input[name="applicant_type"][value="personal"]').prop('checked', true).trigger('change');

            var currentStep = 0;
            var steps = ["applicant-form", "land_selection_form", "land_detail_form", "doc_upload_form"];

            function showStep(step) {
                steps.forEach(function(formId, i) {
                    $('#' + formId).toggle(i === step);
                    $('#progressbar li').eq(i).toggleClass('active', i === step);
                });
            }
            showStep(currentStep);

            $('.next-step').click(function() {
                var form = $('#' + steps[currentStep])[0]; // raw DOM element
                var formData = new FormData(form);
                formData.append('step', currentStep)
                $.ajax({
                    url: "{{ route('application.store') }}",
                    method: "POST",
                    data: formData,
                    processData: false, // stop jQuery from processing data
                    contentType: false,
                    // data: $('#' + steps[currentStep]).serialize() + '&step=' + currentStep,
                    dataType: "json",
                    success: function(response) {
                        if (response.status) {
                            // alert(response.data);
                            $('.application_no').val(response.data);
                            if (currentStep < steps.length - 1) {
                                currentStep++;
                                showStep(currentStep);
                            }
                            // Validation errors
                            $.each(response.errors, function(key, value) {
                                console.log('error', key);
                                console.log('sdsfd', 'span.' + key + '_error');

                                $('span.' + key + '_error').text(value[0]);
                            });
                        } else {
                            $('#success-message').removeClass('d-none').text(response
                                .message);
                            $('#myForm')[0].reset();
                        }
                    },
                    error: function(xhr) {
                        console.log('xhr.status', xhr.status);

                        if (xhr.status === 422) {
                            $('[id$="_error"]').text('');
                            var errors = xhr.responseJSON.errors;
                            console.log(errors);

                            $.each(errors, function(key, value) {
                                $('#' + key + '_error').text(value[0]);
                            });

                        } else {
                            $('[id$="_error"]').text(''); // Clear all if not 422
                            toastr.error(response.error, 'Error', {
                                timeOut: 50000,
                                closeButton: true,
                                progressBar: true
                            });
                        }
                    }
                });


            });

            $('.previous-step').click(function() {
                if (currentStep > 0) {
                    console.log('currentStep', currentStep);
                    currentStep--;
                    showStep(currentStep);
                }
            });

            $('#purpose_types').on('change', function() {
                var purposeTypeId = $(this).val();
                var ruleId = $(this).find(':selected').data('rule-id');
                $('#land_allotment_rule').val(ruleId).trigger('change');
            });

            $('#land_allotment_rule').on('mousedown', function(e) {
                e.preventDefault(); // stops opening dropdown
            });


            $(document).on('change', '#district_id', function() {
                let districtCode = $(this).val();
                $('#tehsil_id').html('<option value="">Loading...</option>');

                if (districtCode) {
                    $.ajax({
                        url: '{{ route('getlocation.form') }}',
                        method: 'GET',
                        data: {
                            type: 'district', // important for your function
                            value: districtCode
                        },
                        success: function(data) {
                            $('#tehsil_id').empty().append(
                                '<option value="">Select Tehsil</option>');
                            $.each(data, function(index, tehsil) {
                                $('#tehsil_id').append('<option value="' + tehsil
                                    .Block_id1 + '">' + tehsil.Block_Name +
                                    '</option>');
                            });
                        },
                        error: function(xhr) {
                            console.error(xhr.responseText);
                            $('#tehsil_id').html(
                                '<option value="">Error loading tehsils</option>');
                        }
                    });
                } else {
                    $('#tehsil_id').html('<option value="">{{ __('labels.select_tehsil') }}</option>');
                }
            });

            // Fetch villages when tehsil changes
            $(document).on('change', '#tehsil_id', function() {
                let tehsilCode = $(this).val();
                $('#village_id').html('<option value="">Loading...</option>');

                if (tehsilCode) {
                    $.ajax({
                        url: '{{ route('getlocation.form') }}',
                        method: 'GET',
                        data: {
                            type: 'tehsil',
                            value: tehsilCode
                        },
                        success: function(data) {
                            $('#village_id').empty().append(
                                '<option value="">Select Village</option>');
                            $.each(data, function(index, village) {
                                $('#village_id').append('<option value="' + village
                                    .Village_Id + '">' + village.Village_Name +
                                    '</option>');
                            });
                        },
                        error: function() {
                            $('#village_id').html(
                                '<option value="">Error loading villages</option>');
                        }
                    });
                } else {
                    $('#village_id').html('<option value="">>{{ __('labels.select_vill') }}</option>');
                }
            });

            $(document).on('change', '#village_id', function() {
                var villageId = $('#village_id').val();
                $('#khsra')
                    .empty()
                    .append('<option disabled selected>Loading...</option>')
                    .select2('destroy') // destroy current Select2
                    .select2({
                        placeholder: "खसरा चुनें"
                    }); // re-init so placeholder updates
                if (villageId) {
                    $.ajax({
                        url: '{{ route('get.khasra') }}',
                        method: 'POST',
                        data: {
                            _token: "{{ csrf_token() }}",
                            village_code: villageId,
                        },
                        success: function(data) {
                            $('#khsra').empty().append(
                                '<option value="">खसरा</option>');
                            console.log('data', data);
                            const khasraList = data.api_response?.data || [];
                            const villageLgCode = data.decoded_data?.Village_lgcode || "";

                            $.each(khasraList, function(index, k) {
                                const label =
                                    `${k.khasra} (खाता: ${k.khata}, क्षेत्रफल: ${k.TotalArea})`;
                                $('#khsra').append(`
                                    <option data-khasra-area="${k.TotalArea}" 
                                            data-village-lgcode="${villageLgCode}" 
                                            value="${k.khasra}">
                                        ${label}
                                    </option>
                                `);
                            });
                        },
                        error: function() {
                            $('#khsra').html(
                                '<option value="">Error loading khasra</option>');
                        }
                    });
                } else {
                    $('#khsra').html('<option value="">>खसरा</option>');
                }
            });

            $('#khsra').select2();

            $('#khsra').on('change', function() {
                const selectedValues = Array.from(this.selectedOptions);

                // if (selectedValues.length === 0) return;

                // const collapseEl = document.getElementById('collapseExample');
                // const bsCollapse = new bootstrap.Collapse(collapseEl, {
                //     toggle: false
                // });
                // bsCollapse.show();
                const tbody = document.getElementById('khasraTableBody');

                if (selectedValues.length === 0) {
                    tbody.innerHTML = '';
                    return;
                }
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
                                <a href="#" 
                                    onclick="event.preventDefault(); showKhasraDetails('${option.value}', '${villageLgcode}')" 
                                    class="btn btn-sm btn-outline-primary">
                                    <i class="fa fa-eye"></i>
                                </a>

                            </td>
                        `;
                    tbody.appendChild(row);
                });
            });

            $(document).on('change', 'input[name="land_surrendered"]', function() {
                if ($(this).val() === 'yes') {
                    $('#landSurrDetails').show();
                } else {
                    $('#landSurrDetails').hide();
                    $('#land_surrendered_detail').val('');
                }
            });

            $(document).on('change', 'input[name="khatadari"]', function() {
                if ($(this).val() === 'yes') {
                    $('#khatadariDetails').show();
                } else {
                    $('#khatadariDetails').hide();
                    $('#khatadariDetailsInput').val('');
                }
            });

            $(document).on('change', 'input[name="act_1894"]', function() {
                if ($(this).val() === 'yes') {
                    $('#landacc').show();
                } else {
                    $('#landacc').hide();
                    $('#landaccInput').val('');
                }
            });

            $(document).on('change', 'input[name="land_used"]', function() {
                if ($(this).val() === 'yes') {
                    $('#prev_allot_land').show();
                } else {
                    $('#prev_allot_land').hide();
                    $('#prev_allot_land_file').val('');
                }
            });




            $(document).on('change', 'input[name="irrigation_means"]', function() {
                if ($(this).val() === 'yes') {
                    $('#irrigationDetails').show();
                } else {
                    $('#irrigationDetails').hide();
                    $('#irrigationDetailsinput').val('');
                }
            });

            $(document).on('change', 'input[name="experience"]', function() {
                if ($(this).val() === 'yes') {
                    $('#experience_detail_box').show();
                } else {
                    $('#experience_detail_box').hide();
                    $('#experience_detail').val('');
                }
            });


            $(document).on('change', 'input[name="registered"]', function() {
                if ($(this).val() === 'yes') {
                    $('#registration-fields').show();
                } else {
                    $('#registration-fields').hide();
                    $('#reg_number').val('');
                    $('#reg_date').val('');
                    $('#org_reg_certificate').val('');
                    $('#org_reg_certificate_file').val('');


                }
            });




            $(document).on('change', '.doc-radio', function() {
                let target = $($(this).data('target'));
                if ($(this).val() === 'yes') {
                    target.show();
                } else {
                    target.hide().find('input[type="file"]').val(''); // also reset file if hidden
                }
            });




        });

        function showKhasraDetails(khasra, village_lgcode) {
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
                })
                .catch(error => {
                    console.error("API Error:", error);
                    alert("API कॉल में समस्या हुई।");
                });
        }

        $(function() {
            var today = new Date();
            var threeMonthsAgo = new Date();
            threeMonthsAgo.setMonth(today.getMonth() - 3);

            $(".datepicker").datepicker({
                format: "yyyy-mm-dd", 
                endDate: today, 
                startDate: threeMonthsAgo,
                autoclose: true,
                todayHighlight: true,
                clearBtn: true
            });
        });
    </script>
@endsection
