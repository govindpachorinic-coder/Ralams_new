@extends('application_layout_new')

@section('title', __("labels.project_short_name"))
@section('pagetitle', __("labels.dashboard"))
@section('role_name', "Admin")

@section('content')
<div class="container">
    <h2 class="text-center mt-2">{{ __('labels.applicant') }}</h2>
    <div class="row d-flex justify-content-center align-items-center">
        <div class="col-12 p-4">
            <div class="card card-registration card-registration-2" style="border-radius: 15px;">
                <div class="card-body">
                    <form action="{{ route('applicant.store') }}" method="POST" enctype="multipart/form-data" onsubmit="return validateForm()" id="applicantForm">
                        @csrf
                        <div class="row mb-3">
                            {{-- Purpose Type --}}
                            <div class="col-md-6">
                                <label for="purpose_type" class="form-label">{{ __("labels.applicant_purpose") }}
                                    <span style="color: red;">*</span>
                                </label>
                                <input type="text" id="purpose_type" data-label="एप्लीकेशन पर्पस" name="purpose_type"
                                    class="form-control @error('purpose_type') is-invalid @enderror" required
                                    placeholder="एप्लीकेशन पर्पस">
                                @error('purpose_type') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>

                            {{-- Land Allotment Rule --}}
                            <div class="col-md-6">
                                <label for="land_allotment_rule"
                                    class="form-label">{{ __("labels.rule_of_land_allocation") }}
                                    <span style="color: red;">*</span></label>
                                <select id="land_allotment_rule" data-label="भूमि आवंटन नियम" name="land_allotment_rule"
                                    class="form-control @error('land_allotment_rule') is-invalid @enderror">
                                    <option value="">{{ __('labels.select_one') }}</option>
                                    @foreach(config('global_constants.land_allotment_rules') as $code => $name)
                                    <option value="{{ $code }}"
                                        {{ old('land_allotment_rule') == $code ? 'selected' : '' }}>{{ $name }}</option>
                                    @endforeach
                                </select>
                                @error('land_allotment_rule') <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- Applicant Name --}}
                            <div class="col-md-4 mt-4">
                                <label for="applicant_name">{{ __("labels.applicant_name") }}<span
                                        style="color: red;">*</span></label>
                                <input type="text" id="applicant_name" data-label="आवेदक का नाम" name="applicant_name" placeholder="आवेदक का नाम"
                                    class="form-control @error('applicant_name') is-invalid @enderror"
                                    value="{{ old('applicant_name') }}">
                                @error('applicant_name') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>

                            {{-- Father Name --}}
                            <div class="col-md-4 mt-4">
                                <label for="father_name">{{ __("labels.applicant_father_name") }}<span
                                        style="color: red;">*</span></label>
                                <input type="text" id="father_name" data-label="आवेदक का पिता का नाम" name="father_name"
                                    placeholder="आवेदक के पिता का नाम"
                                    class="form-control @error('father_name') is-invalid @enderror"
                                    value="{{ old('father_name') }}">
                                @error('father_name') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>

                            {{-- Address --}}
                            <div class="col-md-4 mt-4">
                                <label for="applicantt_address">{{ __("labels.applicant_address") }}<span
                                        style="color: red;">*</span></label>
                                <input type="text" id="applicantt_address" name="applicantt_address"
                                   data-label="आवेदक का पता" placeholder="आवेदक का पता"
                                    class="form-control @error('applicantt_address') is-invalid @enderror"
                                    value="{{ old('applicantt_address') }}">
                                @error('applicantt_address') <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- Mobile --}}
                            <div class="col-md-4 mt-4">
                                <label for="mobile">{{ __("labels.mobile_no") }}<span
                                        style="color: red;">*</span></label>
                                <input type="text" id="mobile" data-label="मोबाइल नंबर" name="mobile" maxlength="10" pattern="\d{10}"
                                    placeholder="मोबाइल नंबर" class="form-control @error('mobile') is-invalid @enderror"
                                    value="{{ old('mobile') }}">
                                @error('mobile') <div class="invalid-feedback">{{ $message }}</div> @enderror
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
                            <div class="col-md-4 mt-4">
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
                            <div class="col-md-4 mt-4">
                                <label for="org_name">{{ __("labels.rcv_org_name") }}<span
                                        style="color: red;">*</span></label>
                                <input type="text" id="org_name" data-label="प्राप्ति संस्था का नाम" name="org_name" placeholder="प्राप्ति संस्था का नाम"
                                    class="form-control @error('org_name') is-invalid @enderror"
                                    value="{{ old('org_name') }}">
                                @error('org_name') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>

                            {{-- Is Organization Registered --}}
                            <div class="col-md-4 mt-4">
                                <label>{{ __("labels.is_org_registered") }}<span
                                        style="color: red;">*</span></label><br>

                                <div class="form-check form-check-inline">
                                    <input class="form-check-input @error('registered') is-invalid @enderror"
                                        type="radio" name="registered" value="Yes"
                                        {{ old('registered') == 'Yes' ? 'checked' : '' }}
                                        onclick="toggleRegistrationFields()">
                                    <label class="form-check-label">हाँ</label>
                                </div>

                                <div class="form-check form-check-inline">
                                    <input class="form-check-input @error('registered') is-invalid @enderror"
                                        type="radio" name="registered" value="No"
                                        {{ old('registered', 'No') == 'No' ? 'checked' : '' }}
                                        onclick="toggleRegistrationFields()">
                                    <label class="form-check-label">नहीं</label>
                                </div>

                                @error('registered')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- Registration Number --}}
                            <div class="col-md-4 mt-4" id="reg-number-field"
                                style="display: {{ old('registered') == 'Yes' ? 'block' : 'none' }};">
                                <label for="reg_number">{{ __("labels.reg_no") }}<span
                                        style="color: red;">*</span></label>
                                <input type="text" id="reg_number" name="reg_number"
                                    class="form-control @error('reg_number') is-invalid @enderror"
                                    value="{{ old('reg_number') }}">

                                @error('reg_number')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- Registration Date --}}
                            <div class="col-md-4 mt-4" id="reg-date-field"
                                style="display: {{ old('registered') == 'Yes' ? 'block' : 'none' }};">
                                <label for="reg_date">{{ __("labels.reg_date") }}<span
                                        style="color: red;">*</span></label>
                                <input type="date" id="reg_date" name="reg_date"
                                    class="form-control @error('reg_date') is-invalid @enderror"
                                    value="{{ old('reg_date') }}">

                                @error('reg_date')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- Area --}}
                            <div class="col-md-4 mt-4">
                                <label for="area">{{ __("labels.prposed_area") }}<span
                                        style="color: red;">*</span></label>
                                <input type="text" id="area" data-label="प्रस्तावित क्षेत्रफल" name="area" placeholder="प्रस्तावित क्षेत्रफल"
                                    class="form-control @error('area') is-invalid @enderror" value="{{ old('area') }}">
                                @error('area') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>

                            {{-- Remarks --}}
                            <div class="col-md-4 mt-4">
                                <label>{{ __("labels.proposed_budget") }}<span
                                        style="color: red;">*</span></label>
                                <textarea class="form-control" id="proposed_budget" data-label="प्रस्तावित बजट" name="remarks">{{ old('remarks') }}</textarea>
                            </div>

                            {{-- Budget Announcement --}}
                            <div class="col-md-4 mt-4">
                                <label>{{ __("labels.allocation_budget") }}<span
                                        style="color: red;">*</span></label><br>

                                <div class="form-check form-check-inline">
                                    <input class="form-check-input @error('budget_announcement') is-invalid @enderror"
                                        type="radio" name="budget_announcement" value="Yes"
                                        {{ old('budget_announcement') == 'Yes' ? 'checked' : '' }}
                                        onclick="toggleBudgetFile()">
                                    <label class="form-check-label">हाँ</label>
                                </div>

                                <div class="form-check form-check-inline">
                                    <input class="form-check-input @error('budget_announcement') is-invalid @enderror"
                                        type="radio" name="budget_announcement" value="No"
                                        {{ old('budget_announcement', 'No') == 'No' ? 'checked' : '' }}
                                        onclick="toggleBudgetFile()">
                                    <label class="form-check-label">नहीं</label>
                                </div>

                                @error('budget_announcement')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- Budget File --}}
                            <div class="col-md-4 mt-4" id="budget-file-wrapper"
                                style="display: {{ old('budget_announcement') == 'Yes' ? 'block' : 'none' }};">
                                <label for="budget_file">{{ __("labels.upload_budget_announcement") }}</label>
                                <input type="file" class="form-control @error('budget_file') is-invalid @enderror"
                                    id="budget_file" name="budget_file" accept=".pdf,.jpg,.jpeg,.png">

                                <small class="text-muted">PDF, JPEG, PNG, &lt; 2MB</small>

                                @error('budget_file')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>

                            <button type="submit" class="submit-btn mt-12" style="margin:auto; display:block;">नेक्स्ट</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>


<script>

function toggleRegistrationFields() {
    let isRegistered = document.querySelector('input[name="registered"]:checked').value;
    let regNumberField = document.getElementById("reg-number-field");
    let regDateField = document.getElementById("reg-date-field");

    if (isRegistered === 'Yes') {
        regNumberField.style.display = 'block';
        regDateField.style.display = 'block';
    } else {
        regNumberField.style.display = 'none';
        regDateField.style.display = 'none';
    }
}

function toggleBudgetFile() {
    let selectedValue = document.querySelector('input[name="budget_announcement"]:checked').value;
    let budgetFileWrapper = document.getElementById("budget-file-wrapper");

    if (selectedValue === 'Yes') {
        budgetFileWrapper.style.display = 'block';
    } else {
        budgetFileWrapper.style.display = 'none';
    }
}

window.onload = function() {
    toggleRegistrationFields();
    toggleBudgetFile();
};

function validateAndNext() {
    let isValid = true;

    // Required fields IDs
    let requiredFields = [
        // "purpose_type", "land_allotment_rule", "applicant_name", "father_name",
        // "applicantt_address", "mobile", "email", "org_type", "org_name", "area", "proposed_budget",
    ];

    // Clear old errors
    document.querySelectorAll(".invalid-feedback-client").forEach(el => el.remove());

    // Validate required fields dynamically with label from data-label attribute
    requiredFields.forEach(function (id) {
        let field = document.getElementById(id);
        if (field && field.value.trim() === "") {
            let label = field.getAttribute("data-label") || "यह फ़ील्ड";
            showError(field, `${label} आवश्यक है।`);
            isValid = false;
        }
    });

    // Check Mobile Number Length(10)
    let mobile = document.getElementById("mobile");
    if (mobile && mobile.value.trim() !== "" && mobile.value.length !== 10) {
        let label = mobile.getAttribute("data-label") || "मोबाइल नंबर";
        showError(mobile, `${label} 10 अंकों का होना चाहिए।`);
        isValid = false;
    }

    // Organisation registered 'Yes' है तो reg_number और reg_date validate करें
    let registeredYes = document.querySelector('input[name="registered"]:checked');
    if (registeredYes && registeredYes.value === "Yes") {
        let regNumber = document.getElementById("reg_number");
        let regDate = document.getElementById("reg_date");

        if (regNumber.value.trim() === "") {
            let label = regNumber.getAttribute("data-label") || "रजिस्ट्रेशन नंबर";
            showError(regNumber, `${label} आवश्यक है।`);
            isValid = false;
        }

        if (regDate.value.trim() === "") {
            let label = regDate.getAttribute("data-label") || "रजिस्ट्रेशन दिनांक";
            showError(regDate, `${label} आवश्यक है।`);
            isValid = false;
        }
    }

    // If Budget announcement is 'Yes' then validate budget_file
    // let budgetYes = document.querySelector('input[name="budget_announcement"]:checked');
    // if (budgetYes && budgetYes.value === "Yes") {
    //     let budgetFile = document.getElementById("budget_file");
    //     if (budgetFile.value === "") {
    //         let label = budgetFile.getAttribute("data-label") || "बजट दस्तावेज़";
    //         showError(budgetFile, `${label} अपलोड करना आवश्यक है।`);
    //         isValid = false;
    //     }
    // }

    // अगर सब सही है तो अगला फॉर्म/पेज दिखाएँ
    if (isValid) {
        alert("सभी जानकारी सही है, अब अगला फॉर्म लोड होगा।");
        // next page url
        // window.location.href = '/next-step-url';
    }

    return false; // Stop submitting the form until everything is valid, the form is not going to next page
}

// helper function to show error message
function showError(field, message) {
    let error = document.createElement("div");
    error.className = "invalid-feedback-client d-block text-danger";
    error.innerText = message;
    field.parentNode.appendChild(error);
}

</script>

@endsection