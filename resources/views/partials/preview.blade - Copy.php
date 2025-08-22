 <div class="modal fade" id="applicant_preview" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-xl modal-dialog-centered" role="document">
                        <div class="modal-content">
                           

                            <div class="modal-body p-0">
                                <div class="card shadow-lg mb-4 rounded-4">
                                    <div class="card-header text-white rounded-top py-3 text-center"
                                        style="background: #006699;">
                                        <i class="far fa-file-alt mr-2"></i>
                                        <h5 class="mb-0 d-inline align-middle">आवेदन विवरण</h5>
                                    </div>
                                     <div id="preview_error" class="alert alert-danger d-none"></div>
                                    <div class="card-body px-4 pb-4">
                                        <div class="row g-4 mb-3">
                                            <div class="col-md-6">
                                                <div class="card shadow-sm rounded-3 border-0"
                                                    style="background:#dadde0;">
                                                    <div class="card-body d-flex space">
                                                        <label class="form-label font-weight-bold mr-4 text-dark">{{ __('labels.applicant_purpose') }}:</label>
                                                        <span class="fw-normal text-dark" id="preview_app_purpose"></span>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="card shadow-sm rounded-3 border-0"
                                                    style="background:#dadde0;">
                                                    <div class="card-body d-flex space">
                                                        <label class="form-label font-weight-bold mr-4 text-dark">{{ __('labels.rule_of_land_allocation') }}:</label>
                                                        <span class="fw-normal text-dark" id="preview_app_rule"></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row g-4">
                                            <div class="col-md-12">
                                                <div class="card shadow-sm rounded-3 border-0"
                                                    style="background:#dadde0;">
                                                    <div class="card-body d-flex space">
                                                        <label class="form-label font-weight-bold mr-4 text-dark">{{ __('labels.purpose_details') }}:</label>
                                                        <span class="fw-normal text-dark" id="purpose_detail"></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <hr class="mt-4 mb-3">

                                        <div class="row g-4 mb-3">
                                            <div class="col-md-6">
                                                <div class="card shadow-sm rounded-3 border-0"
                                                    style="background:#dadde0;">
                                                    <div class="card-body d-flex space">
                                                        <label class="form-label font-weight-bold mr-4 text-dark">{{ __('labels.applicant_type') }}:</label>
                                                        <span class="fw-normal text-dark" id="applicant_type"></span>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="card shadow-sm rounded-3 border-0"
                                                    style="background:#dadde0;">
                                                    <div class="card-body d-flex space">
                                                        <label class="form-label font-weight-bold mr-4 text-dark">{{ __('labels.applicant_name') }}:</label>
                                                        <span class="fw-normal text-dark" id="applicant_name"></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row g-4 mb-3">
                                            <div class="col-md-4">
                                                <div class="card shadow-sm rounded-3 border-0"
                                                    style="background:#dadde0;">
                                                    <div class="card-body d-flex space">
                                                        <label class="form-label font-weight-bold mr-4 text-dark">{{ __('labels.applicant_father_name') }}:</label>
                                                        <span class="fw-normal text-dark" id="applicant_fname"></span>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="card shadow-sm rounded-3 border-0"
                                                    style="background:#dadde0;">
                                                    <div class="card-body d-flex space">
                                                        <label
                                                            class="form-label font-weight-bold mr-4 text-dark">{{ __('labels.applicant_address') }}:</label>
                                                        <span class="fw-normal text-dark" id="applicant_add1"></span>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="card shadow-sm rounded-3 border-0"
                                                    style="background:#dadde0;">
                                                    <div class="card-body d-flex space">
                                                        <label class="form-label font-weight-bold mr-4 text-dark">{{ __('labels.mobile_no') }}:</label>
                                                        <span class="fw-normal text-dark" id="applicant_mnumber"></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row g-4 mb-3">
                                            <div class="col-md-4">
                                                <div class="card shadow-sm rounded-3 border-0"
                                                    style="background:#dadde0;">
                                                    <div class="card-body d-flex space">
                                                        <label class="form-label font-weight-bold mr-4 text-dark">{{ __('labels.email_id') }}:</label>
                                                        <span class="fw-normal text-dark" id="applicant_email"></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- भूमि चयन Section -->
                                    <div class="card-header text-white rounded-top py-3 text-center"
                                        style="background: #006699;">
                                        <i class="fa-solid fa-location-dot mr-2"></i>
                                        <h5 class="mb-0 d-inline align-middle">{{ __('labels.land_selection') }}</h5>
                                    </div>
                                    <div class="card-body px-4 pb-4">

                                        <div class="row g-4 mb-3">
                                            <div class="col-md-4">
                                                <div class="card shadow-sm rounded-3 border-0"
                                                    style="background:#dadde0;">
                                                    <div class="card-body d-flex space">
                                                        <label
                                                            class="form-label font-weight-bold mr-4 text-dark">{{ __('labels.select_district') }}:</label>
                                                        <span class="fw-normal text-dark" id="applicant_district"></span>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="card shadow-sm rounded-3 border-0"
                                                    style="background:#dadde0;">
                                                    <div class="card-body d-flex space">
                                                        <label
                                                            class="form-label font-weight-bold mr-4 text-dark">{{ __('labels.khatedar_tehsil') }}:</label>
                                                        <span class="fw-normal text-dark" id="applicant_tehsil"></span>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="card shadow-sm rounded-3 border-0"
                                                    style="background:#dadde0;">
                                                    <div class="card-body d-flex space">
                                                        <label
                                                            class="form-label font-weight-bold mr-4 text-dark">{{ __('labels.village') }}:</label>
                                                        <span class="fw-normal text-dark" id="applicant_village"></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row g-4 mb-3">
                                            <div class="col-md-4">
                                                <div class="card shadow-sm rounded-3 border-0"
                                                    style="background:#dadde0;">
                                                    <div class="card-body d-flex space">
                                                        <label
                                                            class="form-label font-weight-bold mr-4 text-dark">{{ __('labels.khasra') }}:</label>
                                                        <span class="fw-normal text-dark" id="khasra_number"></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- चयनित खसरा विवरण table -->
                                        <div class="bg-light card shadow-sm px-3 py-3 my-4 rounded-3 border"
                                            style="border-left: 4px solid #fd2038;">
                                            <h6 class="text-center">चयनित खसरा विवरण</h6>
                                            <div class="table-responsive">
                                                <table class="table table-bordered table-hover mb-0" id="preview_khasra_table">
                                                    <thead class="table-secondary">
                                                        <tr>
                                                            <th>क्रमांक</th>
                                                            <th>खसरा नंबर</th>
                                                            <th>खसरे का क्षेत्रफल</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>

                                        <div class="row g-4 mb-3">
                                            <div class="col-md-6">
                                                <div class="card shadow-sm rounded-3 border-0"
                                                    style="background:#dadde0;">
                                                    <div class="card-body d-flex space">
                                                        <label class="form-label font-weight-bold mr-4 text-dark">{{ __('labels.type_of_land') }}:</label>
                                                        <span class="fw-normal text-dark" id="land_type"></span>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="card shadow-sm rounded-3 border-0"
                                                    style="background:#dadde0;">
                                                    <div class="card-body d-flex space">
                                                        <label
                                                            class="form-label font-weight-bold mr-4 text-dark">प्रस्तावित
                                                            क्षेत्रफल:</label>
                                                        <span class="fw-normal text-dark" id="proposed_land_area"></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row g-4 mb-3">
                                            <div class="col-md-6">
                                                <div class="card shadow-sm rounded-3 border-0"
                                                    style="background:#dadde0;">
                                                    <div class="card-body d-flex space">
                                                        <label class="form-label font-weight-bold mr-4 text-dark">समर्पित
                                                            की गई
                                                            भूमि सरकारी भूमि या खातादारी भूमि:</label>
                                                        <span class="fw-normal text-dark" id="is_land_surrendered"></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- भूमि विवरण Section (Land Detail) -->
                                    <div class="card-header text-white rounded-top py-3 text-center"
                                        style="background: #006699;">
                                        <i class="fa-solid fa-map-location-dot mr-2"></i>
                                        <h5 class="mb-0 d-inline align-middle">भूमि विवरण</h5>
                                    </div>

                                    <div class="card-body px-4 pb-4">
                                        <input type="hidden" id="application_no" value="AP-123456" />

                                        <div class="row g-4 mb-3">
                                            <div class="col-md-12">
                                                <div class="card shadow-sm rounded-3 border-0"
                                                    style="background:#dadde0;">
                                                    <div class="card-body d-flex space">
                                                        <div class="col-md-6">
                                                            <label
                                                                class="form-label font-weight-bold mr-4 text-dark">खातेदारी
                                                                भूमि
                                                                के मामले में चाहे भूमि अधिशेष घोषित हो
                                                                या राजस्थान कृषि जोत अधिकतम सीमा निर्धारण अधिनियम, 1973
                                                                (1973 का
                                                                अधिनियम
                                                                संख्या 11) या राजस्थान काश्तकारी अधिनियम, 1995 के निरस्त
                                                                अध्याय
                                                                III-B के
                                                                अंतर्गत कार्यवाही लंबित हो:</label>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <span class="fw-normal text-dark" id="khatedari_proceeding"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row g-4 mb-3">
                                            <div class="col-md-12">
                                                <div class="card shadow-sm rounded-3 border-0"
                                                    style="background:#dadde0;">
                                                    <div class="card-body d-flex space">
                                                        <label class="form-label font-weight-bold mr-4 text-dark">क्या
                                                            खातेदारी
                                                            भूमि अधिग्रहण अधिनियम, 1894 के अंतर्गत अधिग्रहण के अधीन
                                                            है:</label>
                                                        <span class="fw-normal text-dark" id="under_acquisition_act_1894"></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row g-4 mb-3">
                                            <div class="col-md-12">
                                                <div class="card shadow-sm rounded-3 border-0"
                                                    style="background:#dadde0;">
                                                    <div class="card-body d-flex space">
                                                        <label class="form-label font-weight-bold mr-4 text-dark">सिचाई के
                                                            साधन:</label>
                                                        <span class="fw-normal text-dark" id="irrigation_land"></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="row g-4 mb-3">
                                            <div class="col-md-4">
                                                <div class="card shadow-sm rounded-3 border-0"
                                                    style="background:#dadde0;">
                                                    <div class="card-body d-flex space">
                                                        <label class="form-label font-weight-bold mr-3 text-dark">रेलवे
                                                            लाइन
                                                            से दूरी (मी.):</label>
                                                        <span class="fw-normal text-dark" id="dist_from_RL"></span>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="card shadow-sm rounded-3 border-0"
                                                    style="background:#dadde0;">
                                                    <div class="card-body d-flex space">
                                                        <label
                                                            class="form-label font-weight-bold mr-4 text-dark">राष्ट्रीय
                                                            राजमार्ग से दूरी (मी.):</label>
                                                        <span class="fw-normal text-dark" id="dist_from_NH"></span>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="card shadow-sm rounded-3 border-0"
                                                    style="background:#dadde0;">
                                                    <div class="card-body d-flex space">
                                                        <label class="form-label font-weight-bold mr-4 text-dark">राज्य
                                                            राजमार्ग से दूरी (मी.):</label>
                                                        <span class="fw-normal text-dark" id="dist_from_SH"></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row g-4 mb-3">
                                            <div class="col-md-4">
                                                <div class="card shadow-sm rounded-3 border-0"
                                                    style="background:#dadde0;">
                                                    <div class="card-body d-flex space">
                                                        <label
                                                            class="form-label font-weight-bold mr-4 text-dark">नगरपालिका
                                                            से दूरी (मी.):</label>
                                                        <span class="fw-normal text-dark" id="dist_from_City"></span>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="card shadow-sm rounded-3 border-0"
                                                    style="background:#dadde0;">
                                                    <div class="card-body d-flex space">
                                                        <label class="form-label font-weight-bold mr-4 text-dark">परियोजना
                                                            लागत:</label>
                                                        <span class="fw-normal text-dark" id="project_cost">₹1,00,00,000</span>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="card shadow-sm rounded-3 border-0"
                                                    style="background:#dadde0;">
                                                    <div class="card-body d-flex space">
                                                        <label class="form-label font-weight-bold mr-4 text-dark">अन्य कोई
                                                            सुसंगत सूचना:</label>
                                                        <span class="fw-normal text-dark" id="other_details"></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- डॉक्युमेंट अपलोड Section -->
                                        <div class="card-header text-white rounded-top py-3 text-center"
                                            style="background: #006699;">
                                            <i class="fa-solid fa-upload mr-2"></i>
                                            <h5 class="mb-0 d-inline align-middle">डॉक्युमेंट अपलोड</h5>
                                        </div>
                                        <div class="card-body px-4 pb-4">
                                            <div class="table-responsive mb-3">
                                                <table class="table table-bordered align-middle text-center" id="preview_documents">
                                                    <thead style="background: #e9ecef;">
                                                        <tr>
                                                            <th scope="col">क्रमांक</th>
                                                            <th scope="col">डॉक्युमेंट प्रकार</th>
                                                            <th scope="col">दस्तावेज़ अपलोड</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>

                                        <div class="card-footer text-end bg-white px-4 pt-3 pb-3 border-0">
                                            <button type="button" class="btn btn-lg px-5 shadow rounded-pill"
                                                data-dismiss="modal"
                                                style="background: #006699; color: white;">Close</button>
                                            {{-- <button type="button" class="btn btn-lg px-5 shadow rounded-pill"
                                                style="background: #006699; color: white;">Final Submit</button> --}}

                                           

                                        <a href="#" id="finalSubmitBtn" 
                                        class="btn btn-lg px-5 shadow rounded-pill" 
                                        style="background: #006699; color: white;">
                                        Final Submit
                                        </a>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>