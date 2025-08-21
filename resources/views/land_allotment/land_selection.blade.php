@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
      <title>RALAMS भूमि चयन </title>
    <head>
      <meta name="csrf-token" content="{{ csrf_token() }}">
      <link rel="stylesheet" href="Bootstrap/css/bootstrap.min.css" type="text/css">
      <link rel="stylesheet" href="style.css" type="text/css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  <script>

    function submitForm(event) {
      event.preventDefault();
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
    }

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

          // भूमि selects
          if (type === 'land_districts') {
            targetSelect = document.querySelector('select[name="land_district"]');
            targetSelect.innerHTML = '<option value="">--Select District--</option>';
            data.forEach(district => {
              targetSelect.innerHTML += `<option value="${district}">${district}</option>`;
            });
            targetSelect.innerHTML += `<option value="other">Other</option>`;
            return;
          }

          if (type === 'land_district') {
            targetSelect = document.querySelector('select[name="land_tehsil"]');
            targetSelect.innerHTML = '<option value="">--Select Tehsil--</option>';
            data.forEach(tehsil => {
              targetSelect.innerHTML += `<option value="${tehsil}">${tehsil}</option>`;
            });
            return;
          }

          if (type === 'records') {
            targetSelect = document.querySelector('select[name="records"]');
            targetSelect.innerHTML = '<option value="">--Select Records--</option>';
            data.forEach(record => {
              targetSelect.innerHTML += `<option value="${record}">${record}</option>`;
            });
            return;
          }

          if (type === 'patwar_mandal') {
            targetSelect = document.querySelector('select[name="patwar_mandal"]');
            targetSelect.innerHTML = '<option value="">--Select Patwar Mandal--</option>';
            data.forEach(mandal => {
              targetSelect.innerHTML += `<option value="${mandal}">${mandal}</option>`;
            });
            return;
          }

        })
        .catch(error => {
          console.error('Fetch error:', error);
        });
    }




    function getOptions(type, value = '') {
      fetch('getlocationland?type=' + type + '&value=' + encodeURIComponent(value))
        .then(response => response.text())
        .then(text => {
          console.log('Raw response:', text);

          let data;
          try {
            data = JSON.parse(text);
          } catch (e) {
            console.error('Invalid JSON:', text);
            return;
          }

          if (data.error) {
            console.error('Server returned error:', data.error);
            return;
          }

          let targetSelect;

          if (type === 'land_districts') {
            targetSelect = document.querySelector('select[name="land_district"]');
            targetSelect.innerHTML = '<option value="">--Select District--</option>';
            data.forEach(land_district => {
              targetSelect.innerHTML += `<option value="${land_district}">${land_district}</option>`;
            });
            targetSelect.innerHTML += `<option value="other">Other</option>`;
            return; 
          }
            
          if (type === 'land_district') {
            targetSelect = document.querySelector('select[name="land_tehsil"]');
            targetSelect.innerHTML = '<option value="">--Select Tehsil--</option>';
            data.forEach(land_tehsil => {
              targetSelect.innerHTML += `<option value="${land_tehsil}">${land_tehsil}</option>`;
            });
            document.querySelector('select[name="records"]').innerHTML = '<option value="">--Select Records--</option>';
            return;
          }

          if (type === 'land_tehsil') {
            targetSelect = document.querySelector('select[name="records"]');
            targetSelect.innerHTML = '<option value="">--Select Records--</option>';
            data.forEach(records => {
              targetSelect.innerHTML += `<option value="${records}">${records}</option>`;
            });
            document.querySelector('select[name="patwar_mandal"]').innerHTML = '<option value="">--Select Patwar Mandal--</option>';
            return;
          }

          if (type === 'records') {
            targetSelect = document.querySelector('select[name="patwar_mandal"]');
            targetSelect.innerHTML = '<option value="">--Select Patwar Mandal--</option>';
            data.forEach(patwar_mandal => {
              targetSelect.innerHTML += `<option value="${patwar_mandal}">${patwar_mandal}</option>`;
            });
            return;
          }

           if (type === 'patwar_mandal') {
            targetSelect = document.querySelector('select[name="land_village"]');
            targetSelect.innerHTML = '<option value="">--Select Village--</option>';
            data.forEach(land_village => {
              targetSelect.innerHTML += `<option value="${land_village}">${land_village}</option>`;
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

    document.addEventListener('DOMContentLoaded', function () {
      getOptions('land_districts');
      
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
                    khasraSelect.innerHTML = '<option value="" disabled selected>खसरा</option>';

                    console.log('Raw :', data);

                    if (data.error) {
                        console.error(data.error);
                        return;
                    }

                    const khasraList = data.api_response?.data || [];

                    khasraList.forEach(k => {
                        const label = `${k.khasra} (खाता: ${k.khata}, क्षेत्रफल: ${k.TotalArea})`;
                        khasraSelect.innerHTML += `<option value="${k.khasra}">${label}</option>`;
                    });
                })
                .catch(err => {
                    console.error('Error fetching Khasra:', err);
                });
            });
        });
      </script>

        

    </head>
    
<body style="background-color: #f0f8f7;">
    
      <div class="container ">
        <div class="row d-flex justify-content-center align-items-center">
          <div class="col-12 p-4">
            <div class="card card-registration card-registration-2" style="border-radius: 15px;">
              <div class="card-body">
                <form action ="" method="post" onsubmit="submitForm(event)" id="land_selection"> 
                    <div class="row mb-3">
                        <div class="col-md-3">
                            <label class="text-left mt-4" ><b>भूमि का प्रकार:-</b></label>
                        </div>
                        <div class="col-md-3">
                          <div class="form-check form-check-inline mt-4">
                          <input type="radio" class="form-check-input" id="radio1" name="optradio2" value="option3" checked>खातेदार
                          <label class="form-check-label" for="radio1"></label>
                          </div>
                          <div class="form-check form-check-inline">
                          <input type="radio" class="form-check-input" id="radio4" name="optradio2" value="option4">सरकारी
                          <label class="form-check-label" for="radio4"></label>
                          </div>
                        </div>
                        <div class="col-md-3">
                            <label class="text-left control-label"><b>खातेदार का नाम</b></label>
                            <input class="form-control mt-2 rounded" type="text" placeholder="खातेदार का नाम" name="name" required>
                        </div>
                        <div class="col-md-3">
                            <label class="text-left control-label"><b>खातेदार के पिता का नाम</b></label>
                            <input class="form-control mt-2 rounded" type="text" placeholder="खातेदार के पिता का नाम" name="name" required>
                        </div>
                        <div class="col-md-3 mt-4">
                            <label class="text-left control-label"><b>मोबाइल नं.</b></label>
                            <input class="form-control mt-2 rounded" type="number" placeholder="मोबाइल नं." name="mobile_no" required>
                        </div>
                        <div class="col-md-3 mt-4">
                            <label class="text-left control-label"><b>पता 1</b></label>
                            <input class="form-control mt-2 rounded" id="address" type="text" placeholder="पता 1" name="address1" required>
                        </div>
                        <div class="col-md-3 mt-4">
                            <label class="text-left control-label"><b>पता 2</b></label>
                            <input class="form-control mt-2 rounded" type="text" placeholder="पता 2" name="address2" required>
                        </div>
                        <div class="col-md-3 mt-4">
                            <label class="text-left control-label"><b>पता(optional)</b></label>
                            <input class="form-control mt-2 rounded" type="text" placeholder="पता(optional)" name="address_optional" required>
                        </div>
                        <div class="col-md-3 mt-4">
                        <label for="district" class="form-label fw-bold">खातेदार का जिला</label>
                        <select name="district" class="form-select" required onchange="fetchOptions('district', this.value)">
                          <option value="">--Select District--</option>
                        </select>
                        </div>
                        
                        <div class="col-md-3 mt-4">
                        <label for="tehsil" class="form-label fw-bold">खातेदार की तहसील</label>
                        <select name="tehsil" class="form-select" required onchange="fetchOptions('tehsil', this.value)">
                          <option value="">--Select Tehsil--</option>
                        </select>
                        </div>
                        <div class="col-md-3 mt-4">
                        </div>
                        <div class="col-md-3 mt-4">
                        </div>
                        <div class="col-md-3 mt-4">
                        <label for="district" class="form-label fw-bold">भूमि का जिला</label>
                        <select name="land_district" class="form-select" required onchange="getOptions('land_districts', this.value)">
                          <option value="">--Select District--</option>
                        </select>
                        </div>
                        <div class="col-md-3 mt-4">
                        <label for="tehsil" class="form-label fw-bold">भूमि की तहसील</label>
                        <select name="land_tehsil" class="form-select" required onchange="getOptions('land_district', this.value)">
                          <option value="">--Select Tehsil--</option>
                        </select>
                        </div>
                        <div class="col-md-3 mt-4">
                          <label class="col-form-label fw-bold">भू.अभि.नि.</label>
                          <select name="records" class="form-select" required onchange="getOptions('records', this.value)">
                            <option value="">--Select Records--</option>
                          </select>
                        </div>
                        <div class="col-md-3 mt-4">
                          <label class="col-form-label fw-bold">पटवार मंडल</label>
                          <select name="patwar_mandal" class="form-select" required onchange="getOptions('patwar_mandal', this.value)">
                            <option value="">--Select Patwar Mandal--</option>
                          </select>
                        </div>
                        <div class="col-md-3 mt-4">
                          <label class="col-form-label fw-bold">ग्राम</label>
                          <select name="village" class="form-select" required >
                          <option value="">--Select Village--</option>
                        </select>
                        </div>
                        <div class="col-md-3 mt-4">
                          <label class="col-form-label fw-bold">खाता</label>
                          <select id="khata" name="khata" class="form-select">
                          <option value="" disabled selected>खाता</option>
                          
                          </select>
                        </div>

                        
                            <div class="col-md-3 mt-4">
                              <label class="col-form-label fw-bold">खसरा</label>
                              <select id="khsra" name="khsra" class="form-select" onchange="handleKhasraSelection(this)">
                                <option value="" disabled selected>खसरा</option>
                              </select>
                            </div>

                          <div class="collapse mt-4" id="collapseExample">
                            <div class="card card-body">
                              <h5>चयनित खसरा विवरण:</h5>
                              <div class="table-responsive">
                                <table class="table table-bordered table-hover">
                                  <thead class="table-light">
                                    <tr>
                                      <th>क्रमांक</th>
                                      <th>खसरा नंबर</th>
                                      <th>कार्य</th>
                                    </tr>
                                  </thead>
                                  <tbody id="khasraTableBody">
                                  </tbody>
                                </table>
                              </div>
                            </div>
                          </div>
                        <div class="col-md-3 mt-4">
                          <label class="col-form-label fw-bold">भूमि की किस्म</label>
                          <select id="bhumi_kisam" name="bhumi_kisam" class="form-select">
                          <option value="" disabled selected>भूमि की किस्म</option>
                          
                          </select>
                        </div>

                        <div class="collapse mt-3" id="collapseExample">
                          <div class="card card-body">
                            This is your hidden panel for खसरा.
                          </div>
                        </div>
                        <div class="col-md-3 mt-4">
                            <label class="text-left control-label"><b>खसरे का छेत्रफल</b></label>
                            <input class="form-control mt-2 rounded" type="text" placeholder="खसरे का छेत्रफल" name="khasra_area" required>
                        </div>
                        <div class="col-md-3 mt-4">
                            <label class="text-left control-label"><b>प्रस्तावित छेत्रफल</b></label>
                            <input class="form-control mt-2 rounded" type="text" placeholder="प्रस्तावित छेत्रफल" name="proposed_area" required>
                        </div>
                        <div class="col-md-6 mt-4">
                            <label class="text-left control-label"><b>सिचाई के साधन का विवरण</b></label>
                            <input class="form-control mt-2 rounded" type="text" placeholder="सिचाई के साधन का विवरण" name="purpose" required>
                        </div>
                        <div class="col-md-3 mt-4">
                        <label class="text-left" ><b>नक्शे के(2 प्रतियाँ संलगन करें)</b></label>
                        </div>
                        <div class="col-md-3 mt-4">
                        <input type="file" name="upload_doc" class="form-control" accept=".jpg, .png, application/pdf">
                        <!--<input class="form-control mt-2 rounded" type="text" placeholder="प्रस्तावित क्षेत्रफल" name="upload_budget" required> -->
                        <span class="text-secondary">.pdf, .jpg, .png <2MB> </span>
                        </div>
                        <div class="col-md-3">
                            <label class="text-left mt-4" ><b>क्या भूमि कमांड छेत्र में है-</b></label>
                        </div>
                        <div class="col-md-3">
                          <div class="form-check form-check-inline mt-4">
                          <input type="radio" class="form-check-input" id="radio2" name="optradio1" value="option1" checked>हाँ
                          <label class="form-check-label" for="radio1"></label>
                          </div>
                          <div class="form-check form-check-inline">
                          <input type="radio" class="form-check-input" id="radio3" name="optradio1" value="option2">नहीं
                          <label class="form-check-label" for="radio4"></label>
                          </div>
                        </div>
                    </div>
                    <div class="row mt-4">
                      <div class="col-md-4">
                      <button type="button" class="btn btn-info"><a>पिछला</a></button>
                      </div>
                      <div class="col-md-4">
                        
                      </div>
                      <div class="col-md-4">
                        <button type="button" class="btn btn-info btnNext" id="validateFirst">
                          <a href="http://localhost/ralams/sanstha_vivran.php">अगला</a></button>
                      </div>
                      
                      </div>
                    </div>
                </form>


                <div class="modal fade" id="khasraModal" tabindex="-1" aria-labelledby="khasraModalLabel" aria-hidden="true">
                  <div class="modal-dialog modal-xl modal-dialog-scrollable">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="khasraModalLabel">खसरा विवरण</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">
                        <!-- Khasra Table -->
                        <table class="table table-bordered table-hover">
                          <thead class="table-dark">
                            <tr>
                              <th>चयन करें</th>
                              <th>खसरा नं.</th>
                              <th>क्षेत्रफल</th>
                              <th>भूमि की किस्म</th>
                              <th>अन्य विवरण</th>
                            </tr>
                          </thead>
                          <tbody id="khasraTableBody">
                            <!-- Dynamically added rows -->
                          </tbody>
                        </table>
                        <button class="btn btn-primary mt-3" onclick="submitKhasraSelection()">विवरण दिखाएँ</button>
                      </div>
                    </div>
                  </div>
                </div>


              </div>
            </div>
          </div>
        </div>
      </div>
</body>
    
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    
  <script src="Bootstrap/js/jquery-3.6.0.min.js"></script>


  <script>
  function handleKhasraSelection(select) {
    const value = select.value;
    if (!value) return;

    const collapseEl = document.getElementById('collapseExample');
    const bsCollapse = new bootstrap.Collapse(collapseEl, { toggle: false });
    bsCollapse.show();

    const tbody = document.getElementById('khasraTableBody');
    tbody.innerHTML = `
      <tr>
        <td>1</td>
        <td>${value}</td>
        <td>
          <input type="text" id="village_code" value="082154">
          <button class="btn btn-sm btn-outline-primary" onclick="showKhasraDetails('${value}')">विवरण</button>
        </td>
      </tr>
    `;
  }

  function showKhasraDetails(khasra) {
    const villageCode = document.getElementById("village_code").value; // from input box

    fetch("{{ route('get.khasra.details') }}", {
        method: "POST",
        headers: {
            "Content-Type": "application/json",
            "X-CSRF-TOKEN": "{{ csrf_token() }}"
        },
        body: JSON.stringify({
            village_code: villageCode,
            khasra: khasra
        })
    })
    .then(res => res.json())
    .then(data => {
        if (data.status === 'success') {
            alert(`खसरा विवरण:\nगांव: ${data.data.Village_lgcode}\nखसरा: ${data.data.khasra}`);
        } else {
            alert("API से डेटा प्राप्त नहीं हुआ।");
        }
    })
    .catch(error => {
        console.error("API Error:", error);
        alert("API कॉल में समस्या हुई।");
    });
}
</script>

  
@endsection
