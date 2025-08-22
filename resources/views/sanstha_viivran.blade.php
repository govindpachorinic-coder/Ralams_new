@extends('application_layout')

@section('title', __("labels.project_short_name"))
@section('pagetitle', __("labels.dashboard"))

@section('role_name', "Admin")

@section('currentActivePage',2)

@section('content')

<div class="container ">
    @include('application_layouts.wizard')
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

                        <div class="mt-4" style='float:left;'>
                            <button type="submit" class="btn btn-primary d-flex align-items-center gap-2">
                                <i class="fa fa-angle-double-left" aria-hidden="true"></i>&nbsp;&nbsp;
                                <span>{{ __("labels.previous") }}</span>
                            </button>
                        </div>

                        <div class="text-end mt-4"  style='float:right;'>
                            <button type="submit" class="btn btn-primary d-flex align-items-center gap-2">
                                <span>{{ __("labels.next") }}</span>&nbsp;&nbsp;
                                    <i class="fa fa-angle-double-right" aria-hidden="true"></i>
                            </button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    document.querySelectorAll('input[name="experience"]').forEach((elem) => {
    elem.addEventListener("change", function() {
      document.getElementById('experience_detail_box').style.display = (this.value === "yes") ? 'block' : 'none';
    });
  });
  document.querySelectorAll('input[name="prev_alloc"]').forEach((elem) => {
    elem.addEventListener("change", function() {
      document.getElementById('prev_alloc_detail_box').style.display = (this.value === "yes") ? 'block' : 'none';
    });
  });
  document.querySelectorAll('input[name="registered"]').forEach((elem) => {
    elem.addEventListener("change", function() {
      document.getElementById('registered_detail_box').style.display = (this.value === "yes") ? 'block' : 'none';
    });
  });
  function toggleDiv(divId, show) {
    document.getElementById(divId).style.display = show ? 'block' : 'none';
  }

    function validateForm()
    {
            const input = document.getElementById("org_reg_certificate");
            const org_reg_certificate = input.value.trim();
            const org_reg_error = document.getElementById("org-reg-error");

        let isValid = true;

        org_reg_error.textContent = "";

        if (org_reg_certificate === "") {
            org_reg_error.textContent = "{{ __("labels.org_reg_certificate_validation") }}";
            input.focus();
            isValid = false;
        }

        if (isValid) {
            window.location.href = "bhoomi_vivran";
        }
        return false;
    }
</script>
@endsection