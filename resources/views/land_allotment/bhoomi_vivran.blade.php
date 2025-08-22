@extends('application_layout')

@section('title', __("labels.project_short_name"))
@section('pagetitle', __("labels.dashboard"))

@section('role_name', "Admin")

@section('currentActivePage', 3)

@section('content')

<div class="container">
  @include('application_layouts.wizard')
  <div class="row d-flex justify-content-center align-items-center">
    <div class="col-12 p-4">
      <div class="card card-registration card-registration-2" style="border-radius: 15px;">
        <div class="card-body">
          <form action="" method="post" id="ralamsForm" name="myForm" onsubmit="return validateForm()">
            <div class="row mb-3">
              <!-- <div class="col-md-6 mt-4">
                <label>{{ __("labels.justification_inst_land") }}</label><br>
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="more_land" value="yes">
                  <label class="form-check-label">{{ __("labels.yes") }}</label>
                </div>
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="more_land" value="no" checked>
                  <label class="form-check-label">{{ __("labels.no") }}</label>
                </div>
                <div id="moreLandDetails" class="mt-2" style="display:none;">
                  <textarea class="form-control mt-2" placeholder="विवरण"></textarea>
                  <label>{{ __("labels.specification_sheet") }}</label>
                  <input type="file" class="form-control">
                </div>
              </div> -->

              <!-- <div class="col-md-6 mt-4">
                <label>{{ __("labels.inst_allot_land") }}</label>
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="prev_alloc" id="prev_yes" value="yes">
                  <label class="form-check-label" for="prev_yes">{{ __("labels.yes") }}</label>
                </div>
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="prev_alloc" id="prev_no" value="no" checked>
                  <label class="form-check-label" for="prev_no">{{ __("labels.no") }}</label>
                </div>
                <div id="prev_alloc_detail_box" class="mt-2" style="display:none;">
                  <textarea class="form-control mt-2"></textarea>
                </div>
              </div> -->

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
                <div id="khatadariDetails" class="mt-2" style="display:none;">
                    <textarea class="form-control mt-2" placeholder="विवरण"></textarea>
                    
                    
                </div>
            </div>

            <div class="col-md-6 mt-4">
              <label>{{ __("labels.land_acquistion") }}</label><br>
              <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="act_1894" value="हाँ">
                  <label class="form-check-label">{{ __("labels.yes") }}</label>
              </div>
              <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="act_1894" value="नहीं" checked>
                  <label class="form-check-label">{{ __("labels.no") }}</label>
              </div>
            </div>

            </div>

            <div class="row mb-3">

            <div class="col-md-3 mt-4">
                <label for="irrigation_means">{{ __("labels.irrigation_means") }}<span style="color: red;">*</span></label><br>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="irrigation_means" value="yes">
                    <label class="form-check-label">{{ __("labels.yes") }}</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="irrigation_means" value="no" checked>
                    <label class="form-check-label">{{ __("labels.no") }}</label>
                </div>
                <div id="irrigationDetails" class="mt-2" style="display:none;">
                    <textarea class="form-control mt-2" placeholder="विवरण"></textarea>
                </div>
            </div>

            <div class="col-md-4 mt-4">
                <label for="development_fee">{{ __("labels.development_fee") }}<span style="color: red;">*</span></label>
                <input class="form-control" type="text" id="development_fee" name="development_fee" placeholder="विकास शुल्क">
                <span id="development-fee-error" class="error-message" style="color:red"></span>
            </div>

            <div class="col-md-5 mt-4">
              <label for="development_rate">{{ __("labels.development_rate") }}<span style="color: red;">*</span></label>
              <input class="form-control" type="text" id="development_rate" name="development_rate" placeholder="देय मूल्य/देय प्रीमियम की दर">
              <span id="premium-rate-error" class="error-message" style="color:red"></span>
            </div>

            </div>

            <div class="row mb-3">

            <div class="col-md-3 mt-4">
                <label for="railway_distance">{{ __("labels.railway_distance") }}<span style="color: red;">*</span></label></label>
                <input class="form-control" type="text" id="railway_distance" name="railway_distance" placeholder="मीटर में दूरी">
                <span id="railway-distance-error" class="error-message" style="color:red"></span>
            </div>

            <div class="col-md-3 mt-4">
                <label for="national_highway_distance">{{ __("labels.national_highway_distance") }}<span style="color: red;">*</span></label></label>
                <input class="form-control" type="text" id="national_highway_distance" name="national_highway_distance" placeholder="मीटर में दूरी">
                <span id="national-highway-distance-error" class="error-message" style="color:red"></span>
            </div>

            <div class="col-md-2 mt-4">
                <label for="state_highway">{{ __("labels.state_highway") }}<span style="color: red;">*</span></label></label>
                <input class="form-control" type="text" id="state_highway" name="state_highway" placeholder="मीटर में दूरी">
                <span id="state-highway-error" class="error-message" style="color:red"></span>
            </div>

            <div class="col-md-4 mt-4">
                <label for="distance_from_town_city">{{ __("labels.distance_from_town_city") }}<span style="color: red;">*</span></label></label>
                <input class="form-control" type="text" id="distance_from_town_city" name="distance_from_town_city" placeholder="मीटर में दूरी">
                <span id="distance-error" class="error-message" style="color:red"></span>
            </div>

            </div>


            <div class="row mb-3">


              <div class="col-md-3 mt-4">
                  <label for="invoice_no">{{ __("labels.invoice_no") }}<span style="color: red;">*</span></label>
                  <input class="form-control" type="text" id="invoice_no" name="invoice_no" placeholder="चालान की संख्या">
                  <span id="invoice-no-error" class="error-message" style="color:red"></span>
              </div>

              <div class="col-md-3 mt-4">
                  <label for="date">{{ __("labels.date") }}<span style="color: red;">*</span></label>
                  <input class="form-control" id="date" name="date" type="date" placeholder="दिनांक" name="date">
                  <span id="date-error" class="error-message" style="color:red"></span>
              </div>

              <div class="col-md-3 mt-4">
                <label for="project_cost">{{ __("labels.project_cost") }}<span style="color: red;">*</span></label>
                <input class="form-control" type="text" id="project_cost" name="project_cost" placeholder="परियोजना लागत">
                <span id="project-cost-error" class="error-message" style="color:red"></span>
              </div>

              <div class="col-md-3 mt-4">
                  <label for="relevant_info">{{ __("labels.relevant_info") }}<span style="color: red;">*</span></label>
                  <input class="form-control" type="text" id="relevant_info" name="relevant_info" placeholder="अन्य कोई सुसंगत सूचना">
                  <span id="relevant-info-error" class="error-message" style="color:red"></span>
              </div>

              <!-- <div class="col-md-6 mt-4">
                  <label for="original_copy_challan">{{ __("labels.original_copy_challan") }}<span style="color: red;">*</span></label>
                  <input type="file" id=" original_copy_challan" for="original_copy_challan" class="form-control">
                  <span id="challan-copy-error" class="error-message" style="color:red"></span>
              </div> -->

              

              <!-- <div class="col-md-6 mt-4">
                <label for="project_cost_copy">{{ __("labels.project_cost_copy") }}<span style="color: red;">*</span></label>
                <input type="file" id="project_cost_copy" name="project_cost_copy" class="form-control">
                <span id="project-cost-copy-error" class="error-message" style="color:red"></span>
            </div> -->

          </div>

            <div class="mt-4" style='float:left;'>
              <button type="submit" class="btn btn-primary d-flex align-items-center gap-2">
                <i class="fa fa-angle-double-left" aria-hidden="true"></i>&nbsp;&nbsp;
                <span>{{ __("labels.previous") }}</span>
              </button>
            </div>

            <div class="mt-4" style='float:right;'>
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

  document.querySelectorAll('input[name="prev_alloc"]').forEach((elem) => {
    elem.addEventListener("change", function() {
      document.getElementById('prev_alloc_detail_box').style.display = (this.value === "yes") ? 'block' : 'none';
    });
  });

  document.querySelectorAll('input[name="more_land"]').forEach((elem) => {
    elem.addEventListener("change", function() {
      document.getElementById('moreLandDetails').style.display = (this.value === "yes") ? 'block' : 'none';
    });
  });

  document.querySelectorAll('input[name="khatadari"]').forEach((elem) => {
    elem.addEventListener("change", function() {
      document.getElementById('khatadariDetails').style.display = (this.value === "yes") ? 'block' : 'none';
    });
  });

  document.querySelectorAll('input[name="irrigation_means"]').forEach((elem) => {
    elem.addEventListener("change", function() {
      document.getElementById('irrigationDetails').style.display = (this.value === "yes") ? 'block' : 'none';
    });
  });

  // Radio group validation
  /*let radioGroups = ["prev_alloc", "more_land", "khatadari", "act_1894"];
  radioGroups.forEach(function(name) {
    let radios = form.querySelectorAll("input[name='" + name + "']");
    let checked = Array.from(radios).some(r => r.checked);
    if (!checked) {
      radios[0].closest(".col-md-6, .col-md-4").classList.add("border", "border-danger", "rounded");
      isValid = false;
    } else {
      radios[0].closest(".col-md-6, .col-md-4").classList.remove("border", "border-danger", "rounded");
    }
  });*/



  function validateForm() {
    const form = document.getElementById("ralamsForm");
    let isValid = true;

   
    document.querySelectorAll(".error-message").forEach((el) => el.textContent = "");

    // Check required fields
    const requiredFields = [
      { id: "irrigation_means", errorId: "irrigation-means-error", message: "{{ __("labels.valid_irrigation") }}" },
      { id: "railway_distance", errorId: "railway-distance-error", message: "{{ __("labels.valid_railway_distance") }}" },
      { id: "national_highway_distance", errorId: "national-highway-distance-error", message: "{{ __("labels.valid_nh_distance") }}" },
      { id: "state_highway", errorId: "state-highway-error", message: "{{ __("labels.valid_sh_distance") }}" },
      { id: "distance_from_town_city", errorId: "distance-error", message: "{{ __("labels.valid_municipal_distance") }}" },
      { id: "relevant_info", errorId: "relevant-info-error", message: "{{ __("labels.valid_relevant_info") }}" },
      { id: "development_fee", errorId: "development-fee-error", message: "{{ __("labels.valid_develop_fee") }}" },
      { id: "development_rate", errorId: "premium-rate-error", message: "{{ __("labels.valid_rate") }}" },
      { id: "invoice_no", errorId: "invoice-no-error", message: "{{ __("labels.valid_invoice_no") }}" },
      { id: "date", errorId: "date-error", message: "{{ __("labels.valid_invoice_date") }}" },
      { id: "original_copy_challan", errorId: "challan-copy-error", message: "{{ __("labels.valid_challan_copy") }}" },
      { id: "project_cost", errorId: "project-cost-error", message: "{{ __("labels.valid_project_cost") }}" },
      { id: "project_cost_copy", errorId: "project-cost-copy-error", message: "{{ __("labels.valid_project_copy") }}" },
      
    ];

    requiredFields.forEach((field) => {
      const input = document.getElementById(field.id);
      const errorSpan = document.getElementById(field.errorId);

      if (input.value.trim() === "") {
        errorSpan.textContent = field.message;
        isValid = false;
      }
    });

    // If the form is valid, redirect to the next page
    if (isValid) {
      window.location.href = "documents_upload"; 
    }

    return false; 
  }
</script>
@endsection
