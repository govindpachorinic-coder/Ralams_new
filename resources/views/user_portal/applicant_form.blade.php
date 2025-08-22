@extends('application_layout')

@section('title', __("labels.project_short_name"))
@section('pagetitle', __("labels.dashboard"))
@section('role_name', "Admin")
@section('currentActivePage',1)
@section('content')
<!-- <?php
    print_r($errors);
?> -->
<div class="container">
    @include('application_layouts.wizard')     
    <div class="row d-flex justify-content-center align-items-center">
        <div class="col-12 p-4">
            <div class="card card-registration card-registration-2" style="border-radius: 15px;">
                <div class="card-body">
                    <form action="{{ route('application_submit.store') }}" method="POST" enctype="multipart/form-data" onsubmit="return validateForm()" id="applicantForm">
                        @csrf
                        <div class="row mb-3">
                            {{-- Purpose Type --}}
                            <div class="col-md-6">
                                <label for="purpose_type" class="form-label">{{ __("labels.applicant_purpose") }}
                                    <span style="color: red;">*</span>
                                </label>                                

                                <select id="purpose_types" data-label="एप्लीकेशन पर्पस" name="allotment_purpose"
                                    class="form-control @error('allotment_purpose') is-invalid @enderror">
                                    <option value="">{{ __('labels.select_one') }}</option>
                                    @foreach(config('global_constants.purpose_types') as $code => $name)
                                    <option value="{{ $code }}"
                                        {{ old('allotment_purpose') == $code ? 'selected' : '' }}>{{ $name }}</option>
                                    @endforeach
                                </select>
                                @error('allotment_purpose') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>

                            {{-- Land Allotment Rule --}}
                            <div class="col-md-6">
                                <label for="land_owner_type"
                                    class="form-label">{{ __("labels.rule_of_land_allocation") }}
                                    <span style="color: red;">*</span></label>
                                <select id="land_allotment_rule" data-label="भूमि आवंटन नियम" name="land_owner_type"
                                    class="form-control @error('land_owner_type') is-invalid @enderror" disabled>
                                    <option value="">{{ __('labels.select_one') }}</option>
                                    @foreach(config('global_constants.land_allotment_rules') as $code => $name)
                                    <option value="{{ $code }}"
                                        {{ old('land_owner_type') == $code ? 'selected' : '' }}>{{ $name }}</option>
                                    @endforeach
                                </select>
                                <input type="hidden" id="land_allot_rule" name="land_allot_rule" value="">
                                @error('land_owner_type') <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- Applicant Name --}}
                            <div class="col-md-4 mt-4">
                                <label for="applicant_name">{{ __("labels.applicant_name") }}<span
                                        style="color: red;">*</span></label>
                                <input type="text" id="applicant_name" data-label="आवेदक का नाम" name="khatedar_name" placeholder="आवेदक का नाम"
                                    class="form-control @error('khatedar_name') is-invalid @enderror"
                                    value="{{ old('khatedar_name') }}">
                                @error('khatedar_name') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>

                            {{-- Father Name --}}
                            <div class="col-md-4 mt-4">
                                <label for="father_name">{{ __("labels.applicant_father_name") }}<span
                                        style="color: red;">*</span></label>
                                <input type="text" id="father_name" data-label="आवेदक का पिता का नाम" name="khatedar_fname"
                                    placeholder="आवेदक के पिता का नाम"
                                    class="form-control @error('khatedar_fname') is-invalid @enderror"
                                    value="{{ old('khatedar_fname') }}">
                                @error('khatedar_fname') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>

                            {{-- Address --}}
                            <div class="col-md-4 mt-4">
                                <label for="applicant_address">{{ __("labels.applicant_address") }}<span
                                        style="color: red;">*</span></label>
                                <input type="text" id="applicant_address" name="khatedar_adr"
                                   data-label="आवेदक का पता" placeholder="आवेदक का पता"
                                    class="form-control @error('khatedar_adr') is-invalid @enderror"
                                    value="{{ old('khatedar_adr') }}">
                                @error('khatedar_adr') <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- Mobile --}}
                            <div class="col-md-4 mt-4">
                                <label for="mobile">{{ __("labels.mobile_no") }}<span
                                        style="color: red;">*</span></label>
                                <input type="text" id="mobile" data-label="मोबाइल नंबर" name="khatedar_mobile" maxlength="10" pattern="\d{10}"
                                    placeholder="मोबाइल नंबर" class="form-control @error('khatedar_mobile') is-invalid @enderror"
                                    value="{{ old('khatedar_mobile') }}">
                                @error('khatedar_mobile') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>

                            {{-- Email --}}
                            <div class="col-md-4 mt-4">
                                <label for="email">{{ __("labels.email_id") }}<span style="color: red;">*</span></label>
                                <input type="email" id="email" data-label="ईमेल आई डी" name="email" placeholder="ईमेल आई डी"
                                    class="form-control @error('email') is-invalid @enderror"
                                    value="{{ old('email') }}">
                                @error('email') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>

                            {{-- Org Type --}}
                            <div class="col-md-4 mt-4" id="org_type">
                                <label for="org_type">{{ __("labels.rcv_org_type") }}<span
                                        style="color: red;">*</span></label>
                                <select id="org_type" data-label="संस्था का प्रकार" name="org_type"
                                    class="form-control @error('org_type') is-invalid @enderror">
                                    <option value="">{{ __('labels.select_one') }}</option>
                                    @foreach(config('global_constants.org_types') as $code => $name)
                                    <option value="{{ $code }}" {{ old('org_type') == $code ? 'selected' : '' }}>
                                        {{ $name }}</option>
                                    @endforeach
                                </select>
                                @error('org_type') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>

                            {{-- Org Name --}}
                            <div class="col-md-4 mt-4" id="org_name">
                                <label for="org_name">{{ __("labels.rcv_org_name") }}<span
                                        style="color: red;">*</span></label>
                                <input type="text" id="org_name" data-label="प्राप्ति संस्था का नाम" name="org_name" placeholder="प्राप्ति संस्था का नाम"
                                    class="form-control @error('org_name') is-invalid @enderror"
                                    value="{{ old('org_name') }}">
                                @error('org_name') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>

                            {{-- Area --}}
                            <!-- <div class="col-md-4 mt-4">
                                <label for="proposed_area">{{ __("labels.prposed_area") }}<span
                                        style="color: red;">*</span></label>
                                <input type="text" id="proposed_area" data-label="प्रस्तावित क्षेत्रफल" name="proposed_area" placeholder="प्रस्तावित क्षेत्रफल"
                                    class="form-control @error('proposed_area') is-invalid @enderror" value="{{ old('proposed_area') }}">
                                @error('proposed_area') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div> -->

                            {{-- Remarks --}}
                            <!-- <div class="col-md-4 mt-4">
                                <label>{{ __("labels.proposed_budget") }}<span
                                style="color: red;">*</span></label>
                                <textarea class="form-control @error('registration_details') is-invalid @enderror" id="registration_details" data-label="प्रस्तावित बजट" name="registration_details">{{ old('registration_details') }}</textarea>
                                @error('registration_details')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div> -->

                            {{-- Is Organization Registered --}}
                            {{-- <div class="col-md-4 mt-4">
                                <label>{{ __("labels.is_org_registered") }}<span
                                        style="color: red;">*</span></label><br>

                                <div class="form-check form-check-inline">
                                    <input class="form-check-input @error('registration_status') is-invalid @enderror"
                                        type="radio" name="registration_status" value="1"
                                        {{ old('registration_status') == 1 ? 'checked' : '' }}
                                        onclick="toggleRegistrationFields()">
                                    <label class="form-check-label">हाँ</label>
                                </div>

                                <div class="form-check form-check-inline">
                                    <input class="form-check-input @error('registration_status') is-invalid @enderror"
                                        type="radio" name="registration_status" value="0"
                                        {{ old('registration_status', '0') == 0 ? 'checked' : '' }}
                                        onclick="toggleRegistrationFields()">
                                    <label class="form-check-label">नहीं</label>
                                </div>

                                @error('registration_status')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div> --}}

                            {{-- Registration Number --}}
                            <div class="col-md-4 mt-4" id="reg-number-field" data-label="रजिस्ट्रेशन नंबर"
                                style="display: {{ old('registration_certificate_number') == 'Yes' ? 'block' : 'none' }};">
                                <label for="registration_certificate_number">{{ __("labels.reg_no") }}<span
                                        style="color: red;">*</span></label>
                                <input type="text" id="reg_number" name="registration_certificate_number"
                                    class="form-control @error('registration_certificate_number') is-invalid @enderror"
                                    value="{{ old('registration_certificate_number') }}">

                                @error('registration_certificate_number')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- Registration Date --}}
                            <!-- <div class="col-md-4 mt-4" id="reg-date-field" data-label="रजिस्ट्रेशन दिनांक"
                                style="display: {{ old('registration_status') == 'Yes' ? 'block' : 'none' }};">
                                <label for="reg_date">{{ __("labels.reg_date") }}<span
                                        style="color: red;">*</span></label>
                                <input type="date" id="reg_date" name="reg_date"
                                    class="form-control @error('reg_date') is-invalid @enderror"
                                    value="{{ old('reg_date') }}">

                                @error('reg_date')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div> -->

                            {{-- Budget Announcement --}}
                            {{--<div class="col-md-4 mt-4">
                                <label>क्या बजट घोषणा हुई है? <span style="color: red;">*</span></label><br>

                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="budget_announcement" value="Yes"
                                        {{ old('budget_announcement') == '1' ? 'checked' : '' }} onclick="toggleBudgetFile()">
                                    <label class="form-check-label">हाँ</label>
                                </div>

                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="budget_announcement" value="No"
                                        {{ old('budget_announcement') == '0' ? 'checked' : '' }} onclick="toggleBudgetFile()">
                                    <label class="form-check-label">नहीं</label>
                                </div>

                                @error('budget_announcement')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>--}}

                            {{-- Budget File --}}
                            <!-- <div class="col-md-4 mt-4" id="budget-file-wrapper"
                                style="display: {{ old('budget_announcement') == 'Yes' ? 'block' : 'none' }};">
                                <label for="budget_file">बजट दस्तावेज अपलोड करें</label>
                                <input type="file" class="form-control" id="budget_file" name="budget_file" accept=".pdf,.jpg,.jpeg,.png">
                                <small class="text-muted">PDF, JPEG, PNG, 2MB तक</small>
                                @error('budget_file')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div> -->

                            @if(session('success'))
                            <div class="toast-container position-fixed bottom-0 end-0 p-3">
                                <div class="toast align-items-center text-white bg-success border-0 show" role="alert" aria-live="assertive" aria-atomic="true">
                                    <div class="d-flex">
                                        <div class="toast-body">
                                            {{ session('success') }}
                                        </div>
                                        <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"></button>
                                    </div>
                                </div>
                            </div>
                            @endif


                            <!-- <button type="button" onclick="validateAndNext()" class="submit-btn mt-12" style="margin:auto; display:block;">नेक्स्ट</button> -->
                            <div class="col-12 mt-4" style="text-align:right">
                                <button type="button" onclick="validateAndNext()" class="btn btn-primary">
                                    अगला
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>


// function toggleRegistrationFields() {
//     let isRegistered = document.querySelector('input[name="registration_status"]:checked');
//     let regNumberField = document.getElementById("reg-number-field");
//     let regDateField = document.getElementById("reg-date-field");

//     if (isRegistered && isRegistered.value === '1') {
//         regNumberField.style.display = 'block';
//         regDateField.style.display = 'block';
//     } else {
//         regNumberField.style.display = 'none';
//         regDateField.style.display = 'none';
//         document.getElementById("reg_number").value = "";
//         document.getElementById("reg_date").value = "";
//         document.querySelectorAll("#reg-number-field .invalid-feedback-client, #reg-date-field .invalid-feedback-client").forEach(el => el.remove());
//     }
// }

// function toggleBudgetFile() {
//     let selectedValue = document.querySelector('input[name="budget_announcement"]:checked');
//     let budgetFileWrapper = document.getElementById("budget-file-wrapper");

//     if (selectedValue && selectedValue.value === 'Yes') {
//         budgetFileWrapper.style.display = 'block';
//     } else {
//         budgetFileWrapper.style.display = 'none';
//     }
// }

// window.onload = function() {
//     toggleRegistrationFields();
//     toggleBudgetFile();
// };

function validateAndNext() {
    let isValid = true;

    // Clear old errors
    document.querySelectorAll(".invalid-feedback-client").forEach(el => el.remove());

    // Required fields IDs
    let requiredFields = [
        "purpose_type", "land_allotment_rule", "applicant_name", "father_name",
        "applicant_address", "mobile", "email", "org_type", "org_name",
    ];

    requiredFields.forEach(function (id) {
        let field = document.getElementById(id);
        if (field && field.value === "") {
            let label = field.getAttribute("data-label") || "यह फ़ील्ड";
            showError(field, `${label} आवश्यक है।`);
            isValid = false;
        }
    });

    // Mobile number validation
    let mobile = document.getElementById("mobile");
    if (mobile && mobile.value.trim() !== "" && mobile.value.length !== 10) {
        let label = mobile.getAttribute("data-label") || "मोबाइल नंबर";
        showError(mobile, `${label} 10 अंकों का होना चाहिए।`);
        isValid = false;
    }

    // Email validation with improved regex
    let email = document.getElementById("email");
    if (email && email.value.trim() !== "") {
        let emailPattern = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
        if (!emailPattern.test(email.value)) {
            showError(email, "कृपया मान्य ईमेल आईडी दर्ज करें।");
            isValid = false;
        }
    }

    // Organisation Registered Yes/No validation
    // let registeredYesNo = document.querySelector('input[name="registration_status"]:checked');
    // if (!registeredYesNo) {
    //     let registeredWrapper = document.querySelector('input[name="registration_status"]');
    //     let error = document.createElement("div");
    //     error.className = "invalid-feedback-client d-block text-danger";
    //     error.innerText = "कृपया संस्था का पंजीकरण स्थिति चुनें।";
    //     registeredWrapper.appendChild(error);
    //     isValid = false;
    // }

    // // If registered, then validate registration number and date
    // if (registeredYesNo && registeredYesNo.value === "1") {
    //     let regNumber = document.getElementById("reg_number");
    //     let regDate = document.getElementById("reg_date");

    //     if (regNumber.value.trim() === "") {
    //         let label = regNumber.getAttribute("data-label") || "रजिस्ट्रेशन नंबर";
    //         showError(regNumber, `${label} आवश्यक है।`);
    //         isValid = false;
    //     }

    //     if (regDate.value.trim() === "") {
    //         let label = regDate.getAttribute("data-label") || "रजिस्ट्रेशन दिनांक";
    //         showError(regDate, `${label} आवश्यक है।`);
    //         isValid = false;
    //     }
    // }

    // // Budget Announcement Yes/No validation
    // let budgetYesNo = document.querySelector('input[name="budget_announcement"]:checked');
    // if (!budgetYesNo) {
    //     let budgetWrapper = document.querySelector('input[name="budget_announcement"]').closest('.col-md-4');
    //     let error = document.createElement("div");
    //     error.className = "invalid-feedback-client d-block text-danger";
    //     error.innerText = "कृपया बजट की स्थिति चुनें।";
    //     budgetWrapper.appendChild(error);
    //     isValid = false;
    // }

    // // ✅ Budget file validation if 'Yes'
    // if (budgetYesNo && budgetYesNo.value === "Yes") {
    //     let budgetFile = document.getElementById("budget_file");
    //     if (!budgetFile.value) {
    //         let error = document.createElement("div");
    //         error.className = "invalid-feedback-client d-block text-danger";
    //         error.innerText = "कृपया बजट दस्तावेज अपलोड करें।";
    //         budgetFile.parentNode.appendChild(error);
    //         isValid = false;
    //     }
    // }

    // Final submission
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

@endsection