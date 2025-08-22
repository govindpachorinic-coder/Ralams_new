@extends('application_layout')

@section('title', __("labels.project_short_name"))
@section('pagetitle', __("labels.dashboard"))

@section('role_name', "Admin")

@section('currentActivePage',2)

@section('content')
<style>
    .land-detail {
        width: 100px;
    }
</style>

<script>

    // function submitForm(event) {
    //   event.preventDefault();
    //   const form = document.getElementById('land_selection');
    //   const formData = new FormData(form);

    //   fetch('submit.php', {
    //     method: 'POST',
    //     body: formData
    //   })
    //   .then(response => response.text())
    //   .then(data => {
    //     Swal.fire({
    //       title: 'Success!',
    //       text: 'Data Saved Successfully.',
    //       icon: 'success',
    //       confirmButtonText: 'OK'
    //     });

    //     document.getElementById('response').innerHTML = data;

    //     form.reset();
    //     document.querySelector('select[name="tehsil"]').innerHTML = '<option value="">--Select Tehsil--</option>';
    //     document.querySelector('select[name="village"]').innerHTML = '<option value="">--Select Village--</option>';
    //   })
    //   .catch(error => {
    //     Swal.fire({
    //       title: 'Error!',
    //       text: 'An error occurred: ' + error,
    //       icon: 'error',
    //       confirmButtonText: 'OK'
    //     });
    //   });
    // }

    function fetchOptions(type, value = '') 
    {
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
            return;
          }

          if (type === 'district') {
            targetSelect = document.querySelector('select[name="tehsil"]');
            targetSelect.innerHTML = '<option value="">--Select Tehsil--</option>';
            data.forEach(tehsil => {
              targetSelect.innerHTML += `<option value="${tehsil}">${tehsil}</option>`;
            });
            // reset village
            document.querySelector('select[name="village"]').innerHTML = '<option value="">--Select Village--</option>';
            return;
          }

          if (type === 'tehsil') {
            targetSelect = document.querySelector('select[name="village"]');
            targetSelect.innerHTML = '<option value="">--Select Village--</option>';
            data.forEach(village => {
              targetSelect.innerHTML += `<option value="${village.Village_Id}">${village.Village_Name}</option>`;
            });
            return;
          }

        })
        .catch(error => {
          console.error('Fetch error:', error);
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
                const villageCode = this.value;

                if (!villageCode || villageCode === 'other') {
                    khasraSelect.innerHTML = '<option value="">खसरा</option>';
                    return;
                }

                fetch('/get-khasra', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    },
                    body: JSON.stringify({ village_code: villageCode })
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
                        const label = `${k.khasra} (खाता: ${k.khata}, क्षेत्रफल: ${k.TotalArea})`;
                        khasraSelect.innerHTML += `<option data-khasra-area="${k.TotalArea}" data-village-lgcode="${villageLgCode}" value="${k.khasra}">${label}</option>`;
                    });
                })
                .catch(err => {
                    console.error('Error fetching Khasra:', err);
                });
            });
        });
      </script>



    <div class="container ">
    @include('application_layouts.wizard')    

        <div class="row d-flex justify-content-center align-items-center">
            <div class="col-12 p-4">
                <div class="card card-registration card-registration-2" style="border-radius: 15px;">
                    <div class="card-body">
                        <form action ="" onsubmit="return validateForm()" id="ralamsForm" name="myForm"> 
                            <div class="row mb-3">

                                <div class="col-md-3 mt-4">
                                    <label for="khatedar_district">{{ __("labels.khatedar_district") }}<span style="color: red;">*</span></label>
                                    <!-- <input class="form-control" id="khatedar_district" type="text" placeholder="खातेदार का जिला" name="khatedar_district"> -->
                                    <select name="district" class="form-control" required onchange="fetchOptions('district', this.value)">
                                        <option value="">--Select District--</option>
                                    </select>
                                    <span id="khatedar-district-error" class="error-message" style="color:red"></span>
                                </div>

                                <div class="col-md-3 mt-4">
                                    <label for="khatedar_tehsil">{{ __("labels.khatedar_tehsil") }}<span style="color: red;">*</span></label>
                                    <!-- <input class="form-control" id="khatedar_tehsil" type="text" placeholder="खातेदार की तहसील" name="khatedar_tehsil"> -->
                                    <select name="tehsil" class="form-control" required onchange="fetchOptions('tehsil', this.value)">
                                        <option value="">--Select Tehsil--</option>
                                    </select>
                                    <span id="khatedar-tehsil-error" class="error-message" style="color:red"></span>
                                </div>

                                <div class="col-md-3 mt-4">
                                    <label for="village">{{ __("labels.village") }}<span style="color: red;">*</span></label>
                                    <!-- <input class="form-control" id="village" type="text" placeholder="ग्राम" name="village"> -->
                                    <select name="village" class="form-control" required >
                                        <option value="">--Select Village--</option>
                                    </select>
                                    <span id="village-error" class="error-message" style="color:red"></span>
                                </div>

                                <div class="col-md-3 mt-4">
                                    <label for="khasra">{{ __("labels.khasra") }}<span style="color: red;">*</span></label>
                                    <select id="khsra" name="khsra" class="form-control" onchange="handleKhasraSelection(this)" multiple>                                        
                                    </select>
                                    <span id="khasra-error" class="error-message" style="color:red"></span>
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

                                <!-- <div class="col-md-3 mt-4">
                                    <label for="khasra_area">{{ __("labels.khasra_area") }}<span style="color: red;">*</span></label>
                                    <input class="form-control" id="khasra_area" type="text" placeholder="खसरे का क्षेत्रफल" name="khasra_area">
                                    <span id="area-error" class="error-message" style="color:red"></span>
                                </div> -->

                                <!-- <div class="col-md-3 mt-4">
                                    <label for="proposed_area">{{ __("labels.proposed_area") }}<span style="color: red;">*</span></label>
                                    <input class="form-control" id="proposed_area" type="text" placeholder="प्रस्तावित क्षेत्रफल" name="proposed_area">
                                    <span id="proposed-area-error" class="error-message" style="color:red"></span>
                                </div> -->

                                <div class="col-md-3 mt-4">
                                    <label for="type_of_land">{{ __("labels.type_of_land") }}<span style="color: red;">*</span></label>
                                    <input class="form-control" id="type_of_land" type="text" placeholder="भूमि की किस्म" name="type_of_land">
                                    <span id="land-type-error" class="error-message" style="color:red"></span>
                                </div>

                                <div class="col-md-3 mt-4">
                                    <label for="land_surrendered">{{ __("labels.land_surrendered") }}<span style="color: red;">*</span></label><br>
                                </div>
                                <div class="col-md-3 mt-4">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="land_surrendered" value="yes">
                                        <label class="form-check-label">{{ __("labels.yes") }}</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="land_surrendered" value="no" checked>
                                        <label class="form-check-label">{{ __("labels.no") }}</label>
                                    </div>
                                    <div id="landSurrDetails" class="mt-2" style="display:none;">
                                        <textarea class="form-control mt-2" placeholder="विवरण"></textarea>
                                    </div>
                                </div>
                                
                                <!-- <div class="col-md-3 mt-4">
                                    <label for="acc_holder_name">{{ __("labels.acc_holder_name") }}<span style="color: red;">*</span></label>
                                    <input class="form-control" id="acc_holder_name" type="text" placeholder="खातेदार का नाम" name="acc_holder_name">
                                    <span id="name-error" class="error-message" style="color:red"></span>
                                </div>

                                <div class="col-md-3 mt-4">
                                    <label for="acc_father_name">{{ __("labels.acc_father_name") }}<span style="color: red;">*</span></label>
                                    <input class="form-control" id="acc_father_name" type="text" placeholder="खातेदार के पिता का नाम" name="acc_father_name">
                                    <span id="father-name-error" class="error-message" style="color:red"></span>
                                </div>

                                <div class="col-md-3 mt-4">
                                    <label for="mobile_no">{{ __("labels.mobile_no") }}<span style="color: red;">*</span></label>
                                    <input class="form-control" id="mobile_no" type="text" placeholder="मोबाइल नंबर" name="mobile_no">
                                    <span id="mobile-error" class="error-message" style="color:red"></span>
                                </div>

                                <div class="col-md-3 mt-4">
                                    <label for="address1">{{ __("labels.address1") }}<span style="color: red;">*</span></label>
                                    <input class="form-control" id="address1" type="text" placeholder="पता 1" name="address1">
                                    <span id="address1-error" class="error-message" style="color:red"></span>
                                </div>

                                <div class="col-md-3 mt-4">
                                    <label for="address2">{{ __("labels.address2") }}<span style="color: red;">*</span></label>
                                    <input class="form-control" id="address2" type="text" placeholder="पता 2" name="address2">
                                    <span id="address2-error" class="error-message" style="color:red"></span>
                                </div>

                                <div class="col-md-3 mt-4">
                                    <label for="address_optional">{{ __("labels.address_optional") }}</label>
                                    <input class="form-control" id="address_optional" type="text" placeholder="पता वैकल्पिक" name="address_optional">
                                </div> -->

                                <!--<div class="col-md-3 mt-4">
                                    <label for="land_district">{{ __("labels.land_district") }}<span style="color: red;">*</span></label>
                                    <input class="form-control" id="land_district" type="text" placeholder="भूमि का जिला" name="land_district">
                                    <span id="land-district-error" class="error-message" style="color:red"></span>
                                </div>

                                <div class="col-md-3 mt-4">
                                    <label for="land_tehsil">{{ __("labels.land_tehsil") }}<span style="color: red;">*</span></label>
                                    <input class="form-control" id="land_tehsil" type="text" placeholder="भूमि की तहसील" name="land_tehsil">
                                    <span id="land-tehsil-error" class="error-message" style="color:red"></span>
                                </div>

                                <div class="col-md-3 mt-4">
                                    <label for="land_insp">{{ __("labels.land_insp") }}<span style="color: red;">*</span></label>
                                    <input class="form-control" id="land_insp" type="text" placeholder="भूमि अभिलेख निरीक्षक" name="land_insp">
                                    <span id="land-insp--error" class="error-message" style="color:red"></span>
                                </div>

                                <div class="col-md-3 mt-4">
                                    <label for="patwar_mandal">{{ __("labels.patwar_mandal") }}<span style="color: red;">*</span></label>
                                    <input class="form-control" id="patwar_mandal" type="text" placeholder="पटवार मंडल" name="patwar_mandal">
                                    <span id="patwar-error" class="error-message" style="color:red"></span>
                                </div>
                                -->
                                

                                <!--<div class="col-md-3 mt-4">
                                    <label for="account">{{ __("labels.account") }}<span style="color: red;">*</span></label>
                                    <input class="form-control" id="account" type="text" placeholder="खाता" name="account">
                                    <span id="account-error" class="error-message" style="color:red"></span>
                                </div>-->

                               <!-- <div class="col-md-3 mt-4">
                                    <label>{{ __("labels.attach_map_copies") }}</label>
                                    <input type="file" class="form-control">
                                </div>

                                <div class="col-md-3 mt-4">
                                    <label>{{ __("labels.is_command_area") }}</label>
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
                                </div>-->
                            </div>

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

                        <div class="modal fade" id="khasraModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLongTitle">Land Details</h5>
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
                                    <button type="button" class="btn btn-primary">Save changes</button>
                                </div>
                                </div>
                            </div>
                        </div>  


                    </div>
                </div>
            </div>
        </div>
    </div>
        
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    
    <script src="Bootstrap/js/jquery-3.6.0.min.js"></script>  

  <script>
    $('#khsra').select2({
        placeholder : "खसरा"
    });



    function handleKhasraSelection(select) {
        const selectedValues = Array.from(select.selectedOptions);
        if (selectedValues.length === 0) return;

        const collapseEl = document.getElementById('collapseExample');
        const bsCollapse = new bootstrap.Collapse(collapseEl, { toggle: false });
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
                    <button class="btn btn-sm btn-outline-primary" onclick="showKhasraDetails('${option.value}','${villageLgcode}')"  data-toggle="modal" data-target="#khasraModal"><i class="fa fa-eye"></i></button>
                    <button class="btn btn-sm btn-outline-danger" onclick=""><i class="fa fa-trash"></i></button>
                </td>
            `;
            tbody.appendChild(row);
        });
    }



function showKhasraDetails(khasra, village_lgcode) {
    console.log('khasra',khasra);
    console.log('village_lgcode',village_lgcode);
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
      document.getElementById('landSurrDetails').style.display = (this.value === "yes") ? 'block' : 'none';
    });
  });   
        
    function validateForm(e)
    {
        event.preventDefault();
        
        const input = document.getElementById("acc_holder_name");
        const acc_holder_name = input.value.trim();
        const name_error = document.getElementById("name-error");

        const input1 = document.getElementById("acc_father_name");
        const acc_father_name = input1.value.trim();
        const father_name_error = document.getElementById("father-name-error");

        const input2 = document.getElementById("mobile_no");
        const mobile_no = input2.value.trim();
        const mobile_no_error = document.getElementById("mobile-error");

        const input3 = document.getElementById("address1");
        const address1 = input3.value.trim();
        const address1_error = document.getElementById("address1-error");

        const input4 = document.getElementById("address2");
        const address2 = input4.value.trim();
        const address2_error = document.getElementById("address2-error");

        const input5 = document.getElementById("khatedar_district");
        const khatedar_district = input5.value.trim();
        const khatedar_district_error = document.getElementById("khatedar-district-error");

        const input6 = document.getElementById("khatedar_tehsil");
        const khatedar_tehsil = input6.value.trim();
        const khatedar_tehsil_error = document.getElementById("khatedar-tehsil-error");

        
        const input11 = document.getElementById("village");
        const village = input11.value.trim();
        const village_error = document.getElementById("village-error");

        

        const input13 = document.getElementById("khasra");
        const khasra = input13.value.trim();
        const khasra_error = document.getElementById("khasra-error");

        const input14 = document.getElementById("type_of_land");
        const type_of_land = input14.value.trim();
        const land_type_error = document.getElementById("land-type-error");

        const input15 = document.getElementById("khasra_area");
        const khasra_area = input15.value.trim();
        const khasra_area_error = document.getElementById("area-error");

        const input16 = document.getElementById("proposed_area");
        const proposed_area = input16.value.trim();
        const proposed_area_error = document.getElementById("proposed-area-error");

            

        let isValid = true;

        name_error.textContent = "";
        father_name_error.textContent = "";
        mobile_no_error.textContent = "";
        address1_error.textContent = "";
        address2_error.textContent = "";
        khatedar_district_error.textContent = "";
        khatedar_tehsil_error.textContent = "";
        
        village_error.textContent = "";
        khasra_error.textContent = "";
        land_type_error.textContent = "";
        khasra_area_error.textContent = "";
        proposed_area_error.textContent = "";


        if (acc_holder_name === "") {
            name_error.textContent = "Please fill Account Holder Name.";
            input.focus();
            isValid = false;
        }

        if (acc_father_name === "") {
            father_name_error.textContent = "Please fill Account Holder's Father Name.";
            input.focus();
            isValid = false;
        }

        if (mobile_no === "") {
            mobile_no_error.textContent = "Please fill correct mobile no.";
            input.focus();
            isValid = false;
        }

        if (address1 === "") {
            address1_error.textContent = "Please fill correct Address.";
            input.focus();
            isValid = false;
        }

         if (address2 === "") {
            address2_error.textContent = "Please fill correct Address.";
            input.focus();
            isValid = false;
        }


        if (khatedar_district === "") {
            khatedar_district_error.textContent = "Please select khatedar District.";
            input.focus();
            isValid = false;
        }

        if (khatedar_tehsil === "") {
            khatedar_tehsil_error.textContent = "Please select khatedar Tehsil.";
            input.focus();
            isValid = false;
        }

        
        if (village === "") {
            village_error.textContent = "Please select Village.";
            input.focus();
            isValid = false;
        }

        
        if (khasra === "") {
            khasra_error.textContent = "Please select khasra.";
            input.focus();
            isValid = false;
        }

        if (type_of_land === "") {
            land_type_error.textContent = "Please fill land type.";
            input.focus();
            isValid = false;
        }

        if (khasra_area === "") {
            khasra_area_error.textContent = "Please fill khasra area.";
            input.focus();
            isValid = false;
        }

        if (proposed_area === "") {
            proposed_area_error.textContent = "Please fill proposed area.";
            input.focus();
            isValid = false;
        }

        return isValid;

        if (isValid) {
            const form = document.getElementById('land_selection');
            const formData = new FormData(form);

            fetch('submit.php', {
                method: 'POST',
                body: formData
            })
            .then(response => response.text())
            .then(data => {
                Swal.fire({
                title: 'Success!',
                text: 'Data Saved Successfully.',
                icon: 'success',
                confirmButtonText: 'OK'
                });

                document.getElementById('response').innerHTML = data;

                form.reset();
                document.querySelector('select[name="tehsil"]').innerHTML = '<option value="">--Select Tehsil--</option>';
                document.querySelector('select[name="village"]').innerHTML = '<option value="">--Select Village--</option>';
            })
            .catch(error => {
                Swal.fire({
                title: 'Error!',
                text: 'An error occurred: ' + error,
                icon: 'error',
                confirmButtonText: 'OK'
                });
            });

        return false; 
        }
        return false;
    }
</script>
@endsection