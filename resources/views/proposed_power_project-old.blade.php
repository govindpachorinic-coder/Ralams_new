@extends('application_layout')

@section('title', __("labels.project_short_name"))
@section('pagetitle', __("labels.dashboard"))

@section('role_name', "Admin")
<title>Power Plant Proposal Form</title>

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

.li_detail{
    margin: 0;
    padding: 0;
}

textarea {
    resize: vertical;
    border-radius: 5px;
    padding: 10px;
    border: 1px solid #ccc;
    font-size: 14px;
}

label {
    font-weight: 600;
    color: #333;
}

.form-section {
    /* background: #f9f9f9; */
    padding: 20px;
    border-radius: 8px;
    margin-bottom: 20px;
    box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
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
                                    @foreach(config('global_constants.purpose_types') as $code => $name)
                                    <option value="{{ $code }}"
                                        {{ old('allotment_purpose') == $code ? 'selected' : '' }}>
                                        {{ $name }}</option>
                                    @endforeach
                                </select>
                                @error('allotment_purpose') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>

                            <div class="col-md-6">
                                <label for="land_owner_type"
                                    class="form-label">{{ __("labels.rule_of_land_allocation") }}
                                    <span style="color: red;">*</span></label>
                                <select id="land_allotment_rule" data-label="भूमि आवंटन नियम" name="land_owner_type"
                                    class="form-control @error('land_owner_type') is-invalid @enderror" disabled>
                                    <option value="">{{ __('labels.select_one') }}</option>
                                    @foreach(config('global_constants.land_allotment_rules') as $code => $name)
                                    <option value="{{ $code }}" {{ old('land_owner_type') == $code ? 'selected' : '' }}>
                                        {{ $name }}</option>
                                    @endforeach
                                </select>
                                <input type="hidden" id="land_allot_rule" name="land_allot_rule" value="">
                                @error('land_owner_type') <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-4 mt-4" id="org_status" style="display:none;">
                                <div class="form-group">
                                    <label>Organization Type:</label><br>
                                    <label>
                                        <input type="radio" name="org_status_radio" value="government"> Government
                                    </label>
                                    <label class="ml-3">
                                        <input type="radio" name="org_status_radio" value="non_government" checked> Non-Government
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



                            <div class="col-md-4 mt-4" id="org_name" style="display:none;">
                                <label for="org_name">{{ __("labels.rcv_org_name") }}<span
                                        style="color: red;">*</span></label>
                                <input type="text" id="org_name" data-label="प्राप्ति संस्था का नाम" name="org_name"
                                    placeholder="प्राप्ति संस्था का नाम"
                                    class="form-control @error('org_name') is-invalid @enderror"
                                    value="{{ old('org_name') }}">
                                @error('org_name') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>

                            


                            <div class="col-md-4 mt-4" id="dep_name" style="display:none;">
                                <label for="dep_name">{{ __("labels.department_type") }}<span
                                        style="color: red;">*</span></label>
                                <input type="text" id="dep_name" data-label="विभाग का नाम" name="dep_name"
                                    placeholder="विभाग का नाम"
                                    class="form-control @error('dep_name') is-invalid @enderror"
                                    value="{{ old('dep_name') }}">
                                @error('dep_name') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>

                            <div class="col-md-4 mt-4" id="app_des" style="display:none;">
                                <label for="app_des">{{ __("labels.applicant_des") }}<span
                                        style="color: red;">*</span></label>
                                <input type="text" id="app_des" data-label="आवेदक का पद" name="app_des"
                                    placeholder="आवेदक का पद"
                                    class="form-control @error('app_des') is-invalid @enderror"
                                    value="{{ old('app_des') }}">
                                @error('app_des') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>

                            <div class="col-md-4 mt-4" id="app_name" style="display:none;">
                                <label for="app_name">{{ __("labels.app_name") }}<span
                                        style="color: red;">*</span></label>
                                <input type="text" id="app_name" data-label="आवेदक का नाम" name="app_name"
                                    placeholder="आवेदक का नाम"
                                    class="form-control @error('app_name') is-invalid @enderror"
                                    value="{{ old('app_name') }}">
                                @error('app_name') <div class="invalid-feedback">{{ $message }}</div> @enderror
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




                        <button type="button" id="land_selection" class="collapsible">{{ __("labels.land_selection") }} <span
                                class="plus-minus">+</span></button>
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
                                                        <option value="">--Select District--</option>
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
                                                        <option value="">--Select Tehsil--</option>
                                                    </select>
                                                    <span id="khatedar-tehsil-error" class="error-message"
                                                        style="color:red"></span>
                                                </div>

                                                <div class="col-md-3 mt-4">
                                                    <label for="village">{{ __("labels.village") }}<span
                                                            style="color: red;">*</span></label>
                                                    <!-- <input class="form-control" id="village" type="text" placeholder="ग्राम" name="village"> -->
                                                    <select name="village" class="form-control" required>
                                                        <option value="">--Select Village--</option>
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

                                                <div class="col-md-3 mt-4">
                                                    <label for="type_of_land">{{ __("labels.type_of_land") }}<span
                                                            style="color: red;">*</span></label>
                                                    <input class="form-control" id="type_of_land" type="text"
                                                        placeholder="भूमि की किस्म" name="type_of_land">
                                                    <span id="land-type-error" class="error-message"
                                                        style="color:red"></span>
                                                </div>

                                                <div class="col-md-3 mt-4">
                                                    <label
                                                        for="land_surrendered">{{ __("labels.land_surrendered") }}<span
                                                            style="color: red;">*</span>
                                                    </label><br>
                                                </div>
                                                <div class="col-md-3 mt-4">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio"
                                                            name="land_surrendered" value="yes">
                                                        <label class="form-check-label">{{ __("labels.yes") }}</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio"
                                                            name="land_surrendered" value="no" checked>
                                                        <label class="form-check-label">{{ __("labels.no") }}</label>
                                                    </div>
                                                    <div id="landSurrDetails" class="mt-2" style="display:none;">
                                                        <textarea class="form-control mt-2"
                                                            placeholder="विवरण"></textarea>
                                                    </div>
                                                </div>

                                                <div class="col-md-3 mt-4">
                                                    <label for="proposed_area">{{ __("labels.proposed_area") }}<span style="color: red;">*</span></label>
                                                    <input class="form-control" id="proposed_area" type="text" placeholder="प्रस्तावित क्षेत्रफल" name="proposed_area">
                                                    <span id="proposed-area-error" class="error-message" style="color:red"></span>
                                                </div>

                                            </div>

                                            <!-- <div class="mt-4" style='float:left;'>
                                                                <button type="submit" class="btn btn-primary d-flex align-items-center gap-2">
                                                                    <i class="fa fa-angle-double-left" aria-hidden="true"></i>&nbsp;&nbsp;
                                                                    <span>{{ __("labels.previous") }}</span>
                                                                </button>
                                                            </div> -->

                                            <div class="text-end mt-4" style='float:right;'>
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


<button type="button" id ="sanstha_vivran" class="collapsible" style="display:none;">{{ __("labels.sanstha_vivran") }}<span class="plus-minus">+</span></button>
<div class="content">
    <div class="row d-flex justify-content-center align-items-center">
        <div class="col-12 p-4">
            <div class="card card-registration card-registration-2" style="border-radius: 15px;">
                <div class="card-body">
                    <form action ="" method="post" id="ralamsForm" name="myForm" onsubmit="return validateForm()"> 
                        <fieldset class="active">
                        <div class="row mb-3">
                            <!--<div class="col-md-4 mt-4">
                                <label for="inst_type" class="form-label">{{ __("labels.institution_type") }}</label>
                                <select id="inst_type" name="inst_type" class="form-control @error('inst_type') is-invalid @enderror">                                            
                                    <option value="">{{ __('labels.select_one') }}</option>
                                    @foreach(config('global_constants.institution_types') as $institution_type_code => $institution_type_name)
                                        @if ($institution_type_code == old('inst_type') )
                                            <option value="<?= $institution_type_code?>" selected><?= $institution_type_name?></option>
                                        @else
                                            <option value="<?= $institution_type_code?>"><?= $institution_type_name?></option>
                                        @endif
                                    @endforeach
                                </select>
                                <div class="invalid-feedback">
                                    @error('inst_type') 
                                        <span class="text-danger">{{ $message  }} </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-4 mt-4">
                                <label id="id1">{{ __("labels.institute_name") }}</label>
                                <input class="form-control" type="text" name="institute_name" placeholder="प्रार्थी संस्था का नाम">
                            </div>-->
                        
                            <div class="col-md-6 mt-4">
                                <label id="id2">{{ __("labels.allocation_purpose") }}</label>
                                <input class="form-control" type="text" name="allocation_purpose" placeholder="आवंटन का प्रयोजन">
                            </div>

                            <div class="col-md-6 mt-4">
                                <label>{{ __("labels.land_alloted_details") }}</label>
                                <textarea class="form-control" name="land_alloted_details"></textarea>
                            </div>

                            <div class="col-md-6 mt-4">
                                <label for="org_reg_certificate">{{ __("labels.org_reg_certificate") }}<span style="color: red;">*</span></label>
                                <textarea class="form-control" id="org_reg_certificate" name="org_reg_certificate"></textarea>
                                <span id="org-reg-error" class="error-message" style="color:red"></span>
                            </div>

                            <div class="col-md-6 mt-4">
                                <label>{{ __("labels.org_statement") }}</label>
                                <textarea class="form-control" name="org_statement"></textarea>
                            </div>

                            <div class="col-md-6 mt-4">
                                <label>{{ __("labels.org_project_report") }}</label>
                                <textarea class="form-control" name="org_project_report"></textarea>
                            </div>

                            <div class="col-md-6 mt-4">
                                <label>{{ __("labels.ins_allot_purpose") }}</label>
                                <textarea class="form-control" name="ins_allot_purpose"></textarea>
                            </div>

                            <div class="col-md-6 mt-4">
                                <label>{{ __("labels.society_benefits") }}</label>
                                <textarea class="form-control" name="society_benefits"></textarea>
                            </div>

                            <div class="col-md-6 mt-4">
                                <label>{{ __("labels.prev_allot_land") }}</label>
                                <div class="d-flex align-items-center mt-1">
                                    <div class="form-check me-3">
                                        <input class="form-check-input" type="radio" name="land_used" value="yes">
                                        <label class="form-check-label">{{ __("labels.yes") }}</label>
                                    </div>&nbsp;&nbsp;
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="land_used" value="no" checked>
                                        <label class="form-check-label">{{ __("labels.no") }}</label>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6 mt-4">
                                 <label>{{ __("labels.org_experience") }}</label>
                                <div class="d-flex align-items-center mt-1">
                                    <div class="form-check me-3">
                                    <input class="form-check-input" type="radio" name="experience" id="exp_yes" value="yes">
                                    <label class="form-check-label" for="exp_yes">{{ __("labels.yes") }}</label>
                                    </div>&nbsp;&nbsp;
                                    <div class="form-check">
                                    <input class="form-check-input" type="radio" name="experience" id="exp_no" value="no" checked>
                                    <label class="form-check-label" for="exp_no">{{ __("labels.no") }}</label>
                                    </div>
                                </div>
                                <div id="experience_detail_box" class="mt-2" style="display:none;">
                                    <textarea class="form-control"></textarea>
                                </div>
                            </div>

                            <div class="col-md-6 mt-4">
                                <label>{{ __("labels.inst_reg_registrar") }}</label>
                                <div class="d-flex align-items-center mt-1">
                                    <div class="form-check me-3">
                                    <input class="form-check-input" type="radio" name="registered" id="reg_yes" value="yes">
                                    <label class="form-check-label" for="reg_yes">{{ __("labels.yes") }}</label>
                                    </div>&nbsp;&nbsp;
                                    <div class="form-check">
                                    <input class="form-check-input" type="radio" name="registered" id="reg_no" value="no" checked>
                                    <label class="form-check-label" for="reg_no">{{ __("labels.no") }}</label>
                                    </div>
                                </div>
                                <div id="registered_detail_box" class="mt-2" style="display:none;">
                                    <textarea class="form-control"></textarea>
                                </div>
                            </div>

                            <div class="col-md-4 mt-4">
                                <label id="id2">{{ __("labels.reg_number") }}</label>
                                <input class="form-control" type="text" name="reg_number" placeholder="पंजीयन क्रमांक">
                            </div>

                            <div class="col-md-4 mt-4">
                                <label id="id2">{{ __("labels.reg_date") }}</label>
                                <input class="form-control" type="text" name="reg_date" placeholder="पंजीयन तिथि">
                            </div>

                        </div>
                    </fieldset>

                        <div class="mt-4 d-flex justify-content-center">
                            <button type="submit" class="btn btn-primary d-flex align-items-center gap-2">
                                <span>{{ __("labels.save") }}</span>
                            </button>
                        </div>

                        

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>




<button type="button" id ="land_details" class="collapsible">{{ __("labels.land_detail") }}<span class="plus-minus">+</span></button>
<div class="content">
    <div class="row d-flex justify-content-center align-items-center">
        <div class="col-12 p-4">
            <div class="card card-registration card-registration-2" style="border-radius: 15px;">
                <div class="card-body">
                    <form action="" method="post" id="LandDetailform" name="LandDetailform" onsubmit="return validateFormLandDetail()">
                        <div class="row mb-3">

                            <input type="hidden" id="application_no" name="application_no" value="">

                            <div class="col-md-6 mt-4">
                                <label>{{ __("labels.khatedari_land") }}</label>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="khatadari" value="yes">
                                    <label class="form-check-label">{{ __("labels.yes") }}</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="khatadari" value="no" checked>
                                    <label class="form-check-label">{{ __("labels.no") }}</label>
                                </div>
                                <div id="khatadariDetails"  name="khatadariDetails" class="mt-2" style="display:none;">
                                    <input class="form-control" type="text" id="khatadariDetails" name="khatadariDetails"
                                    placeholder="विवरण">


                                </div>
                            </div>

                            <div class="col-md-6 mt-4">
                                <label>{{ __("labels.land_acquistion") }}</label><br>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="act_1894" value="yes">
                                    <label class="form-check-label">{{ __("labels.yes") }}</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="act_1894" value="no" checked>
                                    <label class="form-check-label">{{ __("labels.no") }}</label>
                                </div>
                            </div>

                        </div>

                        <div class="row mb-3">

                            <div class="col-md-3 mt-4">
                                <label for="irrigation_means">{{ __("labels.irrigation_means") }}<span
                                        style="color: red;">*</span></label><br>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="irrigation_means" value="yes">
                                    <label class="form-check-label">{{ __("labels.yes") }}</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="irrigation_means" value="no"
                                        checked>
                                    <label class="form-check-label">{{ __("labels.no") }}</label>
                                </div>
                                <div id="irrigationDetails" name="irrigationDetails" class="mt-2" style="display:none;">
                                    <input class="form-control" type="text" id="irrigationDetails" name="irrigationDetails"
                                    placeholder="विवरण">

                                </div>
                            </div>

                            <div class="col-md-4 mt-4">
                                <label for="development_fee">{{ __("labels.development_fee") }}<span
                                        style="color: red;">*</span></label>
                                <input class="form-control" type="text" id="development_fee" name="development_fee"
                                    placeholder="विकास शुल्क">
                                <span id="development-fee-error" class="error-message" style="color:red"></span>
                            </div>

                            <div class="col-md-5 mt-4">
                                <label for="development_rate">{{ __("labels.development_rate") }}<span
                                        style="color: red;">*</span></label>
                                <input class="form-control" type="text" id="development_rate" name="development_rate"
                                    placeholder="देय मूल्य/देय प्रीमियम की दर">
                                <span id="premium-rate-error" class="error-message" style="color:red"></span>
                            </div>

                        </div>

                        <div class="row mb-3">

                            <div class="col-md-3 mt-4">
                                <label for="railway_distance">{{ __("labels.railway_distance") }}<span
                                        style="color: red;">*</span></label></label>
                                <input class="form-control" type="text" id="railway_distance" name="railway_distance"
                                    placeholder="मीटर में दूरी">
                                <span id="railway-distance-error" class="error-message" style="color:red"></span>
                            </div>

                            <div class="col-md-3 mt-4">
                                <label for="national_highway_distance">{{ __("labels.national_highway_distance") }}<span
                                        style="color: red;">*</span></label></label>
                                <input class="form-control" type="text" id="national_highway_distance"
                                    name="national_highway_distance" placeholder="मीटर में दूरी">
                                <span id="national-highway-distance-error" class="error-message"
                                    style="color:red"></span>
                            </div>

                            <div class="col-md-2 mt-4">
                                <label for="state_highway">{{ __("labels.state_highway") }}<span
                                        style="color: red;">*</span></label></label>
                                <input class="form-control" type="text" id="state_highway" name="state_highway"
                                    placeholder="मीटर में दूरी">
                                <span id="state-highway-error" class="error-message" style="color:red"></span>
                            </div>

                            <div class="col-md-4 mt-4">
                                <label for="distance_from_town_city">{{ __("labels.distance_from_town_city") }}<span
                                        style="color: red;">*</span></label></label>
                                <input class="form-control" type="text" id="distance_from_town_city"
                                    name="distance_from_town_city" placeholder="मीटर में दूरी">
                                <span id="distance-error" class="error-message" style="color:red"></span>
                            </div>

                        </div>


                        <div class="row mb-3">


                            <div class="col-md-3 mt-4">
                                <label for="invoice_no">{{ __("labels.invoice_no") }}<span
                                        style="color: red;">*</span></label>
                                <input class="form-control" type="text" id="invoice_no" name="invoice_no"
                                    placeholder="चालान की संख्या">
                                <span id="invoice-no-error" class="error-message" style="color:red"></span>
                            </div>

                            <div class="col-md-3 mt-4">
                                <label for="date">{{ __("labels.date") }}<span style="color: red;">*</span></label>
                                <input class="form-control" id="date" name="date" type="date" placeholder="दिनांक"
                                    name="date">
                                <span id="date-error" class="error-message" style="color:red"></span>
                            </div>

                            <div class="col-md-3 mt-4">
                                <label for="project_cost">{{ __("labels.project_cost") }}<span
                                        style="color: red;">*</span></label>
                                <input class="form-control" type="text" id="project_cost" name="project_cost"
                                    placeholder="परियोजना लागत">
                                <span id="project-cost-error" class="error-message" style="color:red"></span>
                            </div>

                            <div class="col-md-3 mt-4">
                                <label for="relevant_info">{{ __("labels.relevant_info") }}<span
                                        style="color: red;">*</span></label>
                                <input class="form-control" type="text" id="relevant_info" name="relevant_info"
                                    placeholder="अन्य कोई सुसंगत सूचना">
                                <span id="relevant-info-error" class="error-message" style="color:red"></span>
                            </div>



                        </div>



                        <div class="mt-4 d-flex justify-content-center">
                            <button type="submit" class="btn btn-primary d-flex align-items-center gap-2">
                                <span>{{ __("labels.save") }}</span>
                            </button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<button type="button" id ="documents_upload" class="collapsible">{{ __("labels.doc_upload") }}<span class="plus-minus">+</span></button>
<div class="content">
    <div class="row d-flex justify-content-center align-items-center">
        <div class="col-12 p-4">
            <div class="card card-registration card-registration-2" style="border-radius: 15px;">
                <div class="card-body">
                    <form action="" method="post" id="DocumentsUploadform" name="DocumentsUploadform" onsubmit="return validateFormDocumentsUpload()">
                            <input type="hidden" id="application_no_doc" name="application_no_doc" value="">
                        <div class="row mb-3">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">{{ __("labels.S_no") }}</th>
                                        <th scope="col">{{ __("labels.doc_type") }}</th>
                                        <th scope="col">{{ __("labels.doc_availability") }}</th>
                                        <th scope="col">{{ __("labels.doc_upload") }} </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th scope="row">1</th>
                                        <td>{{ __("labels.copy_khasra_map") }}<span style="color: red;">*</span></td>
                                        <td>
                                            <div class="form-check form-check-inline mt-4">
                                                <input type="radio" class="form-check-input" id="radio1"
                                                    name="copy_khasra_map" value="yes" >{{ __("labels.yes") }}
                                                <label class="form-check-label" for="radio1"></label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input type="radio" class="form-check-input" id="radio2"
                                                    name="copy_khasra_map" value="no" checked>{{ __("labels.no") }}
                                                <label class="form-check-label" for="radio"></label>
                                            </div>
                                        </td>
                                        <td name="copy_khasra_map_doc_td" id="copy_khasra_map_doc_td" style="display:none;">
                                            <input type="file" name="copy_khasra_map_doc" class="form-control fileInput"
                                                accept="application/pdf">
                                            
                                            <small class="error" style="color:red; display:block; margin-top:4px;"></small>

                                        </td>
                                    </tr>

                                    <tr>
                                        <th scope="row">2</th>
                                        <td>{{ __("labels.original_copy_challan") }}<span style="color: red;">*</span>
                                        </td>
                                        <td>
                                            <div class="form-check form-check-inline mt-4">
                                                <input type="radio" class="form-check-input" id="radio3"
                                                    name="original_copy_challan" value="yes" >{{ __("labels.yes") }}
                                                <label class="form-check-label" for="radio3"></label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input type="radio" class="form-check-input" id="radio4"
                                                    name="original_copy_challan" value="no" checked>{{ __("labels.no") }}
                                                <label class="form-check-label" for="radio4"></label>
                                            </div>
                                        </td>
                                        <td name="original_copy_challan_td" id="original_copy_challan_td" style="display:none;">
                                            <input type="file" name="original_copy_challan_doc" class="form-control fileInput"
                                                accept=".jpg, .png, application/pdf">
                                            
                                            <small class="error" style="color:red; display:block; margin-top:4px;"></small>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">3</th>
                                        <td>{{ __("labels.project_cost_copy") }}<span style="color: red;">*</span></td>
                                        <td>
                                            <div class="form-check form-check-inline mt-4">
                                                <input type="radio" class="form-check-input" id="radio5"
                                                    name="project_cost_copy" value="yes" >{{ __("labels.yes") }}
                                                <label class="form-check-label" for="radio5"></label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input type="radio" class="form-check-input" id="radio6"
                                                    name="project_cost_copy" value="no" checked>{{ __("labels.no") }}
                                                <label class="form-check-label" for="radio6"></label>
                                            </div>
                                        </td>
                                        <td name="project_cost_copy_td" id="project_cost_copy_td" style="display:none;">
                                            <input type="file" name="project_cost_copy_doc" class="form-control fileInput"
                                                accept=".jpg, .png, application/pdf">
                                            
                                            <small class="error" style="color:red; display:block; margin-top:4px;"></small>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">4</th>
                                        <td>{{ __("labels.copies_revenue_map") }}<span style="color: red;">*</span></td>
                                        <td>
                                            <div class="form-check form-check-inline mt-4">
                                                <input type="radio" class="form-check-input" id="radio7"
                                                    name="copies_revenue_map" value="yes" >{{ __("labels.yes") }}
                                                <label class="form-check-label" for="radio1"></label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input type="radio" class="form-check-input" id="radio8"
                                                    name="copies_revenue_map" value="no" checked>{{ __("labels.no") }}
                                                <label class="form-check-label" for="radio4"></label>
                                            </div>
                                        </td>
                                        <td name="copies_revenue_map_td" id="copies_revenue_map_td" style="display:none;">
                                            <input type="file" name="copies_revenue_map_doc" class="form-control fileInput"
                                                accept=".jpg, .png, application/pdf">
                                            
                                            <small class="error" style="color:red; display:block; margin-top:4px;"></small>
                                        </td>
                                    </tr>
                                    <tr>

                                </tbody>
                            </table>
                        </div>

                       {{-- @if(Auth::user()->user_type == 'Patwari') --}}   
                            <div class="row form-section">
                                <div class="col-md-4 mt-4">
                                    <label for="district_name">{{ __("labels.district_name") }}:</label>
                                    <!-- <input type="text" class="form-control" name="district_name" placeholder="जिले का नाम"> -->
                                     <select name="district_name" class="form-control" required
                                                        onchange="fetchOptions('district', this.value)">
                                        <option value="">--Select District--</option>
                                    </select>
                                    <span id="district_name-error" class="error-message" style="color:red"></span>

                                </div>
                                <div class="col-md-4 mt-4">
                                    <label for="org_name">{{ __("labels.appl_detail") }}:</label>
                                    <input type="text" class="form-control" name="org_name" placeholder="संस्था का नाम / पता / विवरण">
                                </div>
                            </div>
                            <div class="row form-section mt-4">
                                <div class="col-md-6">
                                    <label>{{ __("labels.org_reg") }}:</label>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="org_reg" value="yes" id="regYes">
                                        <label class="form-check-label" for="regYes">{{ __("labels.yes") }}</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="org_reg" value="no" id="regNo" checked>
                                        <label class="form-check-label" for="regNo">{{ __("labels.no") }}</label>
                                    </div>
                                    <div id="orgRegDetails" class="mt-3" style="display:none;">
                                        <textarea id="orgDetails" name="orgDetails" rows="3" class="form-control"
                                            placeholder="यहाँ विवरण लिखें..."></textarea>
                                    </div>
                                </div>
                            </div>

                            <!-- गत ३ वर्ष का आय-व्यय -->
                            <div class="row form-section mt-4">
                                <div class="col-md-6">
                                    <label>{{ __("labels.expenditure") }}:</label>
                                </div>
                                <div class="col-md-6">
                                    <textarea id="expenditure" name="expenditure" rows="3" class="form-control"
                                        placeholder="आय-व्यय का विवरण लिखें..."></textarea>
                                </div>
                            </div>

                            <!-- परियोजना रिपोर्ट -->
                            <div class="row form-section">
                                <div class="col-md-6">
                                    <label>{{ __("labels.pro_detail") }}:</label>
                                </div>
                                <div class="col-md-6">
                                    <textarea id="pro_detail" name="pro_detail" rows="3" class="form-control"
                                        placeholder="परियोजना रिपोर्ट विवरण..."></textarea>
                                </div>
                            </div>

                            <div class="row form-section">
                                <div class="col-md-6">
                                    <label>{{ __("labels.org_exp") }}:</label>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="org_exp" value="yes" id="regYes">
                                        <label class="form-check-label" for="regYes">{{ __("labels.yes") }}</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="org_exp" value="no" id="regNo" checked>
                                        <label class="form-check-label" for="regNo">{{ __("labels.no") }}</label>
                                    </div>
                                    <div id="orgExpDetails" class="mt-3" style="display:none;">
                                        <textarea id="orgExDetails" name="orgExDetails" rows="3" class="form-control"
                                            placeholder="यहाँ विवरण लिखें..."></textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="row form-section">
                                <div class="col-md-6">
                                    <label>{{ __("labels.pro_allocation") }}:</label>
                                </div>
                                <div class="col-md-6">
                                    <textarea id="pro_allocation" name="pro_allocation" rows="3" class="form-control"
                                        placeholder="रिपोर्ट विवरण..."></textarea>
                                </div>
                            </div>

                            <div class="row form-section">
                                <div class="col-md-6">
                                    <label>{{ __("labels.justification") }}:</label>
                                </div>
                                <div class="col-md-6">
                                    <textarea id="justification" name="justification" rows="3" class="form-control"
                                        placeholder="रिपोर्ट विवरण..."></textarea>
                                </div>
                            </div>
                                
                            <div class="row form-section">
                                <div class="col-md-6">
                                    <label>{{ __("labels.inst_allot_land") }}:</label>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="inst_allot_land" value="yes">
                                        <label class="form-check-label" for="regYes">{{ __("labels.yes") }}</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="inst_allot_land" value="no" checked>
                                        <label class="form-check-label" for="regNo">{{ __("labels.no") }}</label>
                                    </div>
                                    <div id="instAllotLandDetails" class="mt-3" style="display:none;">
                                        <textarea id="instLandDetails" name="instLandDetails" rows="3" class="form-control"
                                            placeholder="यहाँ विवरण लिखें..."></textarea>
                                    </div>
                                </div>
                            </div>
                                                                       
                            <div class="row form-section">
                                <div class="col-md-6">
                                    <label>{{ __("labels.encroach_land") }}</label>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="encroach_land" value="yes">
                                        <label class="form-check-label" for="regYes">{{ __("labels.yes") }}</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="encroach_land" value="no" checked>
                                        <label class="form-check-label" for="regNo">{{ __("labels.no") }}</label>
                                    </div>
                                    <div id="encroachLandDetails" class="mt-3" style="display:none;">
                                        <textarea id="encroachDetails" name="encroachDetails" rows="3" class="form-control"
                                            placeholder="यहाँ विवरण लिखें..."></textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="row form-section">
                                <div class="col-md-6">
                                    <label>{{ __("labels.benefits") }}:</label>
                                </div>
                                <div class="col-md-6">
                                    <textarea id="benefits" name="benefits" rows="3" class="form-control"
                                        placeholder="रिपोर्ट विवरण..."></textarea>
                                </div>
                            </div>

                            <div class="row form-section">
                                <div class="col-md-6">
                                    <label>{{ __("labels.comp_rev_dept") }}:</label>
                                </div>
                                <div class="col-md-6">
                                    <textarea id="comp_rev_dept" name="comp_rev_dept" rows="3" class="form-control"
                                        placeholder="रिपोर्ट विवरण..."></textarea>
                                </div>
                            </div>

                            <div class="row form-section">
                                <div class="col-md-6">
                                    <label>{{ __("labels.proposed_allot") }}:</label>
                                </div>
                                <div class="col-md-6">
                                    <textarea id="proposed_allot" name="proposed_allot" rows="3" class="form-control"
                                        placeholder="रिपोर्ट विवरण..."></textarea>
                                </div>
                            </div>

                            <div class="row form-section">
                                <div class="col-md-6">
                                    <label>{{ __("labels.town_planning") }}:</label>
                                </div>
                                <div class="col-md-6">
                                    <textarea id="town_planning" name="town_planning" rows="3" class="form-control"
                                        placeholder="रिपोर्ट विवरण..."></textarea>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-4 mt-4">
                                    <label for="proposed_rate">{{ __("labels.proposed_rate") }}:</label>
                                    <input type="text" class="form-control" name="proposed_rate" placeholder="जिले का नाम">
                                </div>
                                <div class="col-md-4 mt-4">
                                    <label for="app_concession">{{ __("labels.app_concession") }}:</label>
                                    <input type="text" class="form-control" name="app_concession" placeholder="संस्था का नाम / पता / विवरण">
                                </div>
                                <div class="col-md-4 mt-4">
                                    <label for="total_cost">{{ __("labels.total_cost") }}:</label>
                                    <input type="text" class="form-control" name="total_cost" placeholder="संस्था का नाम / पता / विवरण">
                                </div>
                                <div class="col-md-4 mt-4">
                                    <label for="dlc_rate">{{ __("labels.dlc_rate") }}:</label>
                                    <input type="text" class="form-control" name="dlc_rate" placeholder="संस्था का नाम / पता / विवरण">
                                </div>
                                <div class="col-md-4 mt-4">
                                    <label for="rule_allotment">{{ __("labels.rule_allotment") }}</label>
                                    <input type="text" class="form-control" name="rule_allotment" placeholder="संस्था का नाम / पता / विवरण">
                                </div>
                            </div>

                            <div class="row form-section mt-4">
                                <div class="col-md-6">
                                    <label>{{ __("labels.pending_stay") }}:</label>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="pending_stay" value="yes">
                                        <label class="form-check-label" for="regYes">{{ __("labels.yes") }}</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="pending_stay" value="no" checked>
                                        <label class="form-check-label" for="regNo">{{ __("labels.no") }}</label>
                                    </div>
                                </div>
                            </div>

                            <div class="row form-section mt-4">
                                <div class="col-md-6">
                                    <label>{{ __("labels.prev_cons") }}:</label>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="prev_cons" value="yes">
                                        <label class="form-check-label" for="regYes">{{ __("labels.yes") }}</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="prev_cons" value="no" checked>
                                        <label class="form-check-label" for="regNo">{{ __("labels.no") }}</label>
                                    </div>
                                </div>
                            </div>

                            <div class="row form-section mt-4">
                                <div class="col-md-6">
                                    <label>{{ __("labels.is_command_area") }}</label>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="command_area" value="yes">
                                        <label class="form-check-label" for="regYes">{{ __("labels.yes") }}</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="command_area" value="no" checked>
                                        <label class="form-check-label" for="regNo">{{ __("labels.no") }}</label>
                                    </div>
                                </div>
                            </div>

                            <div class="row form-section mt-4">
                                <div class="col-md-6">
                                    <label>{{ __("labels.restricted_land") }}</label>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="restricted_land" value="yes">
                                        <label class="form-check-label" for="regYes">{{ __("labels.yes") }}</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="restricted_land" value="no" checked>
                                        <label class="form-check-label" for="regNo">{{ __("labels.no") }}</label>
                                    </div>
                                </div>
                            </div>

                            <div class="row form-section mt-4">
                                <div class="col-md-6">
                                    <label>{{ __("labels.urban_periphery") }}</label>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="urban_periphery" value="yes">
                                        <label class="form-check-label" for="regYes">{{ __("labels.yes") }}</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="urban_periphery" value="no" checked>
                                        <label class="form-check-label" for="regNo">{{ __("labels.no") }}</label>
                                    </div>
                                    <div id="urbanPeripheryDetails" class="mt-3" style="display:none;">
                                        <input type="file" name="urban_periphery_noc" class="form-control">
                                    </div>
                                </div>
                            </div>

                            <div class="row form-section mt-4">
                                <div class="col-md-6">
                                    <label>{{ __("labels.grazing_land") }}</label>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="grazing_land" value="yes">
                                        <label class="form-check-label" for="regYes">{{ __("labels.yes") }}</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="grazing_land" value="no" checked>
                                        <label class="form-check-label" for="regNo">{{ __("labels.no") }}</label>
                                    </div>
                                    <div id="grazingLandDetails" class="mt-3" style="display:none;">
                                        <label>{{ __("labels.panchayat_opinion") }}</label><br>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="panchayat_opinion" value="yes">
                                            <label class="form-check-label">{{ __("labels.yes") }}</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="panchayat_opinion" value="no" checked>
                                            <label class="form-check-label">{{ __("labels.no") }}</label>
                                        </div>
                                    </div>
                                    <div id="panchayatOpinionDetails" class="mt-3" style="display:none;">
                                        <textarea id="compensationDetails" name="compensationDetails" rows="3" class="form-control"
                                            placeholder="यहाँ विवरण लिखें..."></textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="row form-section mt-4">
                                <div class="col-md-6">
                                    <label>{{ __("labels.master_plan") }}</label>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="master_plan" value="yes">
                                        <label class="form-check-label" for="regYes">{{ __("labels.yes") }}</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="master_plan" value="no" checked>
                                        <label class="form-check-label" for="regNo">{{ __("labels.no") }}</label>
                                    </div>
                                    <div id="masterPlanDetails" class="mt-3" style="display:none;">
                                        <label>{{ __("labels.panchayat_opinion") }}</label><br>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="change_master_plan" value="yes">
                                            <label class="form-check-label">{{ __("labels.yes") }}</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="change_master_plan" value="no" checked>
                                            <label class="form-check-label">{{ __("labels.no") }}</label>
                                        </div>
                                    </div>
                                    <div id="changeMasterPlanDetails" class="mt-3" style="display:none;">
                                        <textarea id="changeDetails" name="changeDetails" rows="3" class="form-control"
                                            placeholder="यहाँ विवरण लिखें..."></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row form-section mt-4">
                                <div class="col-md-4 mt-4">
                                    <label for="landType">{{ __("labels.land_category") }}:</label>
                                    <select class="form-control" id="landType" name="landType" required>
                                        <option value="">-- कृपया चयन करें --</option>
                                        <option value="ग्रामीण">ग्रामीण</option>
                                        <option value="नगरीय परिधीय">नगरीय परिधीय</option>
                                    </select>
                                </div>
                                <div class="col-md-4 mt-4">
                                    <label for="distance">{{ __("labels.distance") }}:</label>
                                    <input type="text" class="form-control" name="distance" placeholder="राष्ट्रीय/राज्य राजमार्ग से दूरी (किमी में)">
                                </div>
                                <div class="col-md-4 mt-4">
                                    <label for="changeReason">{{ __("labels.changeReason") }}:</label>
                                    <input type="text" class="form-control" name="changeReason" placeholder="परिवर्तन का कारण">
                                </div>
                            </div>
                            <div class="row form-section mt-4">
                                <div class="col-md-12">
                                    <h3 class="text-center">{{ __("labels.inst_land_detail") }}</h3>
                                </div>
                                <div class="col-md-6 mt-4">
                                    <label for="rev_vill">{{ __("labels.rev_vill") }}</label>
                                </div>
                                <div class="col-md-6 mt-4">
                                    <input type="text" id="rev_vill" name="rev_vill">
                                </div>
                                <div class="col-md-6 mt-4">
                                    <label for="khasra_no">{{ __("labels.khasra_no") }}</label>
                                </div>
                                <div class="col-md-6 mt-4">
                                    <input type="text" id="khasra_no" name="khasra_no">
                                </div>
                                <div class="col-md-6 mt-4">
                                    <label for="land_type">{{ __("labels.land_type") }}</label>
                                </div>
                                <div class="col-md-6 mt-4">
                                    <input type="text" id="land_type" name="land_type">
                                </div>
                                <div class="col-md-6 mt-4">
                                    <label for="area">{{ __("labels.area") }}</label>
                                </div>
                                <div class="col-md-6 mt-4">
                                    <input type="text" id="area" name="area">
                                </div>
                                <div class="col-md-6 mt-4">
                                    <label for="jamabandi_details">{{ __("labels.jamabandi_details") }}</label>
                                </div>
                                <div class="col-md-6 mt-4">
                                    <input type="text" id="jamabandi_details" name="jamabandi_details">
                                </div>
                                <div class="col-md-6 mt-4">
                                    <label for="revenue_map">{{ __("labels.revenue_map") }}</label>
                                </div>
                                <div class="col-md-6 mt-4">
                                    <input type="file" id="revenue_map" name="revenue_map" accept=".pdf,.jpg,.png,.jpeg">
                                </div>
                            </div>                        
                        {{-- @endif --}}

                        <!-- Preview Button -->
                        <button type="button" class="btn btn-info" onclick="loadPreview()">
                            Preview Application
                        </button>

                        <div class="mt-4 d-flex justify-content-center">
                            <button type="submit" class="btn btn-primary d-flex align-items-center gap-2">
                                <span>{{ __("labels.save") }}
                            </button>
                        </div>
                    </form>

                    <!-- Modal HTML -->
                    <div class="modal fade" id="previewModal" tabindex="-1" role="dialog" aria-labelledby="previewModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-xl modal-dialog-scrollable" role="document">
                            <div class="modal-content">
                                <div class="modal-header bg-primary text-white">
                                    <h5 class="modal-title">Application Preview</h5>
                                    <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
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

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
$('#khsra').select2({
    placeholder: "खसरा"
});
// $('#land_selection').removeClass('active');

$(document).ready(function() {
    // $('.collapsible').on('click', function () {
    //         $('.content').slideUp();

    //         $('.plus-minus').text('+');

    //         const content = $(this).next('.content');

    //         if (content.is(':visible')) {
    //             content.slideDown();
    //             $(this).find('.plus-minus').text('-');
    //         } else {
    //             content.slideDown();
    //             $(this).find('.plus-minus').text('-');
    //         }
    // });

    $('#land_selection + .content').hide();
    $('#land_selection .plus-minus').text('+');
    $('#purpose_types').on('change', function() {
        var purposeType = $(this).val();
        $('#land_selection + .content').slideDown();

        $('#land_selection .plus-minus').text('-');

        $('#land_selection').addClass('active');
        var autoSetRule = {
            'उद्योग': '2',
            'पर्यटन': '2',
            'प्राथमिक विद्यालय': '1',
            'माध्यमिक विद्यालय': '1',
            'स्नातक एवं स्नातकोत्तर महाविद्यालय': '1'
        };

        if (autoSetRule[purposeType]) {
            $('#land_allotment_rule').val(autoSetRule[purposeType]).trigger('change');
            $('#land_allot_rule').val(autoSetRule[purposeType]);
        } else {
            $('#land_allotment_rule').val('').trigger('change');
            $('#land_allot_rule').val('');
        }
        console.log('purposeType', purposeType);

        if (['पर्यटन', 'उद्योग'].includes(purposeType)) {
            $('#org_type').closest('.col-md-4').hide();
            $('#org_name').closest('.col-md-4').hide();
            $('#org_status').closest('.col-md-4').hide();
            $('#app_des').closest('.col-md-4').hide();
            $('#app_name').closest('.col-md-4').hide();
            $('#dep_name').closest('.col-md-4').hide();
        } else {
            $('#org_type').closest('.col-md-4').show();
            $('#org_name').closest('.col-md-4').show();
            $('#org_status').closest('.col-md-4').show();
            $('#app_des').closest('.col-md-4').show();
            $('#app_name').closest('.col-md-4').show();
            $('#dep_name').closest('.col-md-4').show();
        }

    });

    // $('#purpose_types').trigger('change');
});

$(document).on('change', 'input[name="org_status_radio"]', function () {
    const selected = $(this).val();

    if (selected === 'government') {
        $('#org_type').closest('.col-md-4').hide();
        $('#org_name').closest('.col-md-4').hide();
        $('#app_des').closest('.col-md-4').show();
        $('#app_name').closest('.col-md-4').show();
        $('#dep_name').closest('.col-md-4').show();
    } else if (selected === 'non_government') {
        $('#org_type').closest('.col-md-4').show();
        $('#org_name').closest('.col-md-4').show();
        $('#app_des').closest('.col-md-4').show();
        $('#app_name').closest('.col-md-4').show();
        $('#dep_name').closest('.col-md-4').hide();
    }

     $('#sanstha_vivran').next('.content').slideDown();
        $('#sanstha_vivran .plus-minus').text('-');

        $('#sanstha_vivran').addClass('active');
        $('#land_selection').removeClass('active');
        $('#application_no').val(data.data);
        $('#application_no_doc').val(data.data);

        document.getElementById('tab2-link')?.classList.remove('disabled');
        document.getElementById('tab3-link')?.classList.remove('disabled');

});


// var coll = document.getElementsByClassName("collapsible");
// for (var i = 0; i < coll.length; i++) {
//     coll[i].addEventListener("click", function () {
//         this.classList.toggle("active");
//         var content = this.nextElementSibling;
//         var plusMinus = this.querySelector(".plus-minus");

//         if (content.style.display === "block") {
//             content.style.display = "none";
//             plusMinus.textContent = "+";
//         } else {
//             content.style.display = "block";
//             plusMinus.textContent = "-";
//         }
//     });
// }


var coll = document.getElementsByClassName("collapsible");

for (var i = 0; i < coll.length; i++) {
    coll[i].addEventListener("click", function() {
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

function loadPreview(id) {

    const appId = document.getElementById('application_no_doc').value;

    console.log('appid', appId);

    if (!appId) {
        alert("Application ID not found.");
        return;
    }

    // Open modal immediately
    $('#previewModal').modal('show');

    // Show loading spinner or message
    document.getElementById('preview-content').innerHTML = '<div class="text-center">Loading...</div>';

    // Fetch modal content from controller
    fetch(`/application/preview/${appId}`)
        .then(response => {
            if (!response.ok) {
                throw new Error("Network error");
            }
            return response.text();
        })
        .then(html => {
            document.getElementById('preview-content').innerHTML = html;
        })
        .catch(error => {
            document.getElementById('preview-content').innerHTML =
                '<div class="alert alert-danger">Failed to load data. Please try again.</div>';
        });
}


function validateAndNext() {
    let isValid = true;

    document.querySelectorAll(".invalid-feedback-client").forEach(el => el.remove());

    let requiredFields = [
        "purpose_type", "land_allotment_rule", "applicant_name", "father_name",
        "applicant_address", "mobile", "email", "org_type", "org_name",
    ];

    requiredFields.forEach(function(id) {
        let field = document.getElementById(id);
        if (field && field.value === "") {
            let label = field.getAttribute("data-label") || "यह फ़ील्ड";
            showError(field, `${label} आवश्यक है।`);
            isValid = false;
        }
    });

    let mobile = document.getElementById("mobile");
    if (mobile && mobile.value.trim() !== "" && mobile.value.length !== 10) {
        let label = mobile.getAttribute("data-label") || "मोबाइल नंबर";
        showError(mobile, `${label} 10 अंकों का होना चाहिए।`);
        isValid = false;
    }

    let email = document.getElementById("email");
    if (email && email.value.trim() !== "") {
        let emailPattern = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
        if (!emailPattern.test(email.value)) {
            showError(email, "कृपया मान्य ईमेल आईडी दर्ज करें।");
            isValid = false;
        }
    }

    if (isValid) {
        document.getElementById("applicantForm").submit();
    }

    return false;
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

            if (data.status === 'success' && Array.isArray(data.data) && data.data.length > 0) {
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

                data.data.forEach(record => {
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

            alert('hiii');
        })
        .catch(error => {
            console.error("API Error:", error);
            alert("API कॉल में समस्या हुई।");
        });
}
</script>

<script>
document.querySelectorAll('input[name="land_surrendered"]').forEach((elem) => {
    elem.addEventListener("change", function() {
        document.getElementById('landSurrDetails').style.display = (this.value === "yes") ? 'block' :
            'none';
    });
});

function validateFormss() {
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

            document.getElementById('tab2-link')?.classList.remove('disabled');
            document.getElementById('tab3-link')?.classList.remove('disabled');

            // form.reset();
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

    return false; 
}



function validateFormLandDetail() {
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

            // form.reset();
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

    return false; 
}

function validateFormDocumentsUpload() {
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
            form.reset();

            Swal.fire({
                toast: true,
                position: 'top-end',
                icon: 'success',
                title: data.message || 'Uploaded successfully',
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

$('.fileInput').on('change', function() {
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


    $(document).ready(function() {
        @if(session('show_preview'))
            $('#previewModal').modal('show');
        @endif
    });



// function validateForm(e) {
//     e.preventDefault();

//     const input = document.getElementById("acc_holder_name");
//     const acc_holder_name = input.value.trim();
//     const name_error = document.getElementById("name-error");

//     const input1 = document.getElementById("acc_father_name");
//     const acc_father_name = input1.value.trim();
//     const father_name_error = document.getElementById("father-name-error");

//     const input2 = document.getElementById("mobile_no");
//     const mobile_no = input2.value.trim();
//     const mobile_no_error = document.getElementById("mobile-error");

//     const input3 = document.getElementById("address1");
//     const address1 = input3.value.trim();
//     const address1_error = document.getElementById("address1-error");

//     const input4 = document.getElementById("address2");
//     const address2 = input4.value.trim();
//     const address2_error = document.getElementById("address2-error");

//     const input5 = document.getElementById("khatedar_district");
//     const khatedar_district = input5.value.trim();
//     const khatedar_district_error = document.getElementById("khatedar-district-error");

//     const input6 = document.getElementById("khatedar_tehsil");
//     const khatedar_tehsil = input6.value.trim();
//     const khatedar_tehsil_error = document.getElementById("khatedar-tehsil-error");


//     const input11 = document.getElementById("village");
//     const village = input11.value.trim();
//     const village_error = document.getElementById("village-error");

//     const input13 = document.getElementById("khasra");
//     const khasra = input13.value.trim();
//     const khasra_error = document.getElementById("khasra-error");

//     const input14 = document.getElementById("type_of_land");
//     const type_of_land = input14.value.trim();
//     const land_type_error = document.getElementById("land-type-error");

//     const input15 = document.getElementById("khasra_area");
//     const khasra_area = input15.value.trim();
//     const khasra_area_error = document.getElementById("area-error");

//     const input16 = document.getElementById("proposed_area");
//     const proposed_area = input16.value.trim();
//     const proposed_area_error = document.getElementById("proposed-area-error");

//     let isValid = true;

//     name_error.textContent = "";
//     father_name_error.textContent = "";
//     mobile_no_error.textContent = "";
//     address1_error.textContent = "";
//     address2_error.textContent = "";
//     khatedar_district_error.textContent = "";
//     khatedar_tehsil_error.textContent = "";

//     village_error.textContent = "";
//     khasra_error.textContent = "";
//     land_type_error.textContent = "";
//     khasra_area_error.textContent = "";
//     proposed_area_error.textContent = "";


//     if (acc_holder_name === "") {
//         name_error.textContent = "Please fill Account Holder Name.";
//         input.focus();
//         isValid = false;
//     }

//     if (acc_father_name === "") {
//         father_name_error.textContent = "Please fill Account Holder's Father Name.";
//         input.focus();
//         isValid = false;
//     }

//     if (mobile_no === "") {
//         mobile_no_error.textContent = "Please fill correct mobile no.";
//         input.focus();
//         isValid = false;
//     }

//     if (address1 === "") {
//         address1_error.textContent = "Please fill correct Address.";
//         input.focus();
//         isValid = false;
//     }

//     if (address2 === "") {
//         address2_error.textContent = "Please fill correct Address.";
//         input.focus();
//         isValid = false;
//     }


//     if (khatedar_district === "") {
//         khatedar_district_error.textContent = "Please select khatedar District.";
//         input.focus();
//         isValid = false;
//     }

//     if (khatedar_tehsil === "") {
//         khatedar_tehsil_error.textContent = "Please select khatedar Tehsil.";
//         input.focus();
//         isValid = false;
//     }


//     if (village === "") {
//         village_error.textContent = "Please select Village.";
//         input.focus();
//         isValid = false;
//     }


//     if (khasra === "") {
//         khasra_error.textContent = "Please select khasra.";
//         input.focus();
//         isValid = false;
//     }

//     if (type_of_land === "") {
//         land_type_error.textContent = "Please fill land type.";
//         input.focus();
//         isValid = false;
//     }

//     if (khasra_area === "") {
//         khasra_area_error.textContent = "Please fill khasra area.";
//         input.focus();
//         isValid = false;
//     }

//     if (proposed_area === "") {
//         proposed_area_error.textContent = "Please fill proposed area.";
//         input.focus();
//         isValid = false;
//     }

//     return isValid;

//     if (isValid) {
//         const form = document.getElementById('land_selection');
//         const formData = new FormData(form);

//             fetch("{{ route('application.landdetail.store') }}", {
//                 method: 'POST',
//                 body: formData
//             })
//             .then(response => response.text())
//             .then(data => {
//                 Swal.fire({
//                     title: 'Success!',
//                     text: 'Data Saved Successfully.',
//                     icon: 'success',
//                     confirmButtonText: 'OK'
//                 });

//                 document.getElementById('response').innerHTML = data;

//                 form.reset();
//                 document.querySelector('select[name="tehsil"]').innerHTML = '<option value="">--Select Tehsil--</option>';
//                 document.querySelector('select[name="village"]').innerHTML = '<option value="">--Select Village--</option>';
//             })
//             .catch(error => {
//                 Swal.fire({
//                     title: 'Error!',
//                     text: 'An error occurred: ' + error,
//                     icon: 'error',
//                     confirmButtonText: 'OK'
//                 });
//             });

//         return false;
//     }
//     return false;
// }
</script>

<script>
function fetchOptions(type, value = '') {    
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
                targetSelect.innerHTML = '<option value="">--Select District--</option>';
                data.forEach(district => {
                    targetSelect.innerHTML += `<option value="${district}">${district}</option>`;
                });
                targetSelect.innerHTML += `<option value="other">Other</option>`;

                //for patwari checklist            
                targetSelect1 = document.querySelector('select[name="district_name"]');
                targetSelect1.innerHTML = '<option value="">--Select District--</option>';
                data.forEach(district => {
                    targetSelect1.innerHTML += `<option value="${district}">${district}</option>`;
                });
                targetSelect1.innerHTML += `<option value="other">Other</option>`;
                return;
            }

            if (type === 'district') {
                targetSelect = document.querySelector('select[name="tehsil"]');
                targetSelect.innerHTML = '<option value="">--Select Tehsil--</option>';
                data.forEach(tehsil => {
                    targetSelect.innerHTML += `<option value="${tehsil}">${tehsil}</option>`;
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
        });
}

document.addEventListener('DOMContentLoaded', function() {
    fetchOptions('districts');

});
</script>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const villageSelect = document.querySelector('select[name="village"]');
    const khasraSelect = document.querySelector('#khsra');

    if (!villageSelect || !khasraSelect) {
        console.error('Village or Khasra select not found.');
        return;
    }

    villageSelect.addEventListener('change', function() {
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
            });
    });
});
</script>

<script>
document.querySelectorAll('input[name="prev_alloc"]').forEach((elem) => {
    elem.addEventListener("change", function() {
        document.getElementById('prev_alloc_detail_box').style.display = (this.value === "yes") ?
            'block' : 'none';
    });
});

document.querySelectorAll('input[name="more_land"]').forEach((elem) => {
    elem.addEventListener("change", function() {
        document.getElementById('moreLandDetails').style.display = (this.value === "yes") ? 'block' :
            'none';
    });
});

document.querySelectorAll('input[name="khatadari"]').forEach((elem) => {
    elem.addEventListener("change", function() {
        document.getElementById('khatadariDetails').style.display = (this.value === "yes") ? 'block' :
            'none';
    });
});



document.querySelectorAll('input[name="copy_khasra_map"]').forEach((elem) => {
    elem.addEventListener("change", function() {
        document.getElementById('copy_khasra_map_doc_td').style.display = (this.value === "yes") ? 'block' :
            'none';
    });
});

document.querySelectorAll('input[name="original_copy_challan"]').forEach((elem) => {
    elem.addEventListener("change", function() {
        document.getElementById('original_copy_challan_td').style.display = (this.value === "yes") ? 'block' :
            'none';
    });
});

document.querySelectorAll('input[name="project_cost_copy"]').forEach((elem) => {
    elem.addEventListener("change", function() {
        document.getElementById('project_cost_copy_td').style.display = (this.value === "yes") ? 'block' :
            'none';
    });
});

document.querySelectorAll('input[name="copies_revenue_map"]').forEach((elem) => {
    elem.addEventListener("change", function() {
        document.getElementById('copies_revenue_map_td').style.display = (this.value === "yes") ? 'block' :
            'none';
    });
});

document.querySelectorAll('input[name="irrigation_means"]').forEach((elem) => {
    elem.addEventListener("change", function() {
        document.getElementById('irrigationDetails').style.display = (this.value === "yes") ? 'block' :
            'none';
    });
});

document.querySelectorAll('input[name="org_reg"]').forEach((elem) => {
    elem.addEventListener("change", function() {
    document.getElementById('orgRegDetails').style.display = (this.value === "yes") ? 'block' : 'none';
    });
});

document.querySelectorAll('input[name="org_exp"]').forEach((elem) => {
    elem.addEventListener("change", function() {
    document.getElementById('orgExpDetails').style.display = (this.value === "yes") ? 'block' : 'none';
    });
});

document.querySelectorAll('input[name="inst_allot_land"]').forEach((elem) => {
    elem.addEventListener("change", function() {
    document.getElementById('instAllotLandDetails').style.display = (this.value === "yes") ? 'block' : 'none';
    });
});

document.querySelectorAll('input[name="encroach_land"]').forEach((elem) => {
    elem.addEventListener("change", function() {
    document.getElementById('encroachLandDetails').style.display = (this.value === "yes") ? 'block' : 'none';
    });
});

document.querySelectorAll('input[name="grazing_land"]').forEach((elem) => {
    elem.addEventListener("change", function() {
    document.getElementById('grazingLandDetails').style.display = (this.value === "yes") ? 'block' : 'none';
    });
});

document.querySelectorAll('input[name="panchayat_opinion"]').forEach((elem) => {
    elem.addEventListener("change", function() {
    document.getElementById('panchayatOpinionDetails').style.display = (this.value === "yes") ? 'block' : 'none';
    });
});

document.querySelectorAll('input[name="urban_periphery"]').forEach((elem) => {
    elem.addEventListener("change", function() {
    document.getElementById('urbanPeripheryDetails').style.display = (this.value === "yes") ? 'block' : 'none';
    });
});

document.querySelectorAll('input[name="master_plan"]').forEach((elem) => {
    elem.addEventListener("change", function() {
    document.getElementById('masterPlanDetails').style.display = (this.value === "yes") ? 'block' : 'none';
    });
});

document.querySelectorAll('input[name="change_master_plan"]').forEach((elem) => {
    elem.addEventListener("change", function() {
    document.getElementById('changeMasterPlanDetails').style.display = (this.value === "no") ? 'block' : 'none';
    });
});



// function validateForm() {
//     const form = document.getElementById("ralamsForm");
//     let isValid = true;


//     document.querySelectorAll(".error-message").forEach((el) => el.textContent = "");

//     const requiredFields = [
//         { id: "irrigation_means", errorId: "irrigation-means-error", message: "{{ __("labels.valid_irrigation") }}" },
//         { id: "railway_distance", errorId: "railway-distance-error", message: "{{ __("labels.valid_railway_distance") }}" },
//         { id: "national_highway_distance", errorId: "national-highway-distance-error", message: "{{ __("labels.valid_nh_distance") }}" },
//         { id: "state_highway", errorId: "state-highway-error", message: "{{ __("labels.valid_sh_distance") }}" },
//         { id: "distance_from_town_city", errorId: "distance-error", message: "{{ __("labels.valid_municipal_distance") }}" },
//         { id: "relevant_info", errorId: "relevant-info-error", message: "{{ __("labels.valid_relevant_info") }}" },
//         { id: "development_fee", errorId: "development-fee-error", message: "{{ __("labels.valid_develop_fee") }}" },
//         { id: "development_rate", errorId: "premium-rate-error", message: "{{ __("labels.valid_rate") }}" },
//         { id: "invoice_no", errorId: "invoice-no-error", message: "{{ __("labels.valid_invoice_no") }}" },
//         { id: "date", errorId: "date-error", message: "{{ __("labels.valid_invoice_date") }}" },
//         { id: "original_copy_challan", errorId: "challan-copy-error", message: "{{ __("labels.valid_challan_copy") }}" },
//         { id: "project_cost", errorId: "project-cost-error", message: "{{ __("labels.valid_project_cost") }}" },
//         { id: "project_cost_copy", errorId: "project-cost-copy-error", message: "{{ __("labels.valid_project_copy") }}" },

//     ];

//     requiredFields.forEach((field) => {
//         const input = document.getElementById(field.id);
//         const errorSpan = document.getElementById(field.errorId);

//         if (input.value.trim() === "") {
//             errorSpan.textContent = field.message;
//             isValid = false;
//         }
//     });

//     if (isValid) {
//         window.location.href = "documents_upload";
//     }

//     return false;
// }
</script>

@endsection