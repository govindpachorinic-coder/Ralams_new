<div class="modal fade" id="applicant_preview" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false">
    <div class="modal-dialog modal-xl modal-dialog-centered" role="document">
        <div class="modal-content" id="printSection">


            <div class="modal-body p-0">
                <div class="card shadow-lg mb-4 rounded-4">
                    <div class="card-header text-white rounded-top py-3 text-center" style="background: #006699;">
                        {{-- <i class="far fa-file-alt mr-2"></i> --}}
                        <h5 class="mb-0 d-inline align-middle">{{ __('labels.app_details') }}</h5>
                    </div>
                    <div id="preview_error" class="alert alert-danger d-none"></div>
                    <div class="card-body px-4 pb-4">
                        <div class="row g-4 mb-3">
                            <div class="col-md-6">
                                <div class="card shadow-sm rounded-3 border-0" style="background:#dadde0;">
                                    <div class="card-body d-flex space">
                                        <label
                                            class="form-label font-weight-bold mr-4 text-dark">{{ __('labels.applicant_purpose') }}:</label>
                                        <span class="fw-normal text-dark" id="preview_app_purpose"></span>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="card shadow-sm rounded-3 border-0" style="background:#dadde0;">
                                    <div class="card-body d-flex space">
                                        <label
                                            class="form-label font-weight-bold mr-4 text-dark">{{ __('labels.rule_of_land_allocation') }}:</label>
                                        <span class="fw-normal text-dark" id="preview_app_rule"></span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row g-4">
                            <div class="col-md-12">
                                <div class="card shadow-sm rounded-3 border-0" style="background:#dadde0;">
                                    <div class="card-body d-flex space">
                                        <label
                                            class="form-label font-weight-bold mr-4 text-dark">{{ __('labels.purpose_details') }}:</label>
                                        <span class="fw-normal text-dark" id="purpose_detail"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr class="mt-4 mb-3">

                        <div class="row g-4 mb-3">
                            <div class="col-md-6">
                                <div class="card shadow-sm rounded-3 border-0" style="background:#dadde0;">
                                    <div class="card-body d-flex space">
                                        <label
                                            class="form-label font-weight-bold mr-4 text-dark">{{ __('labels.applicant_type') }}:</label>
                                        <span class="fw-normal text-dark" id="applicant_type"></span>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="card shadow-sm rounded-3 border-0" style="background:#dadde0;">
                                    <div class="card-body d-flex space">
                                        <label
                                            class="form-label font-weight-bold mr-4 text-dark">{{ __('labels.applicant_name') }}:</label>
                                        <span class="fw-normal text-dark" id="applicant_name"></span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row g-4 mb-3">
                            <div class="col-md-6">
                                <div class="card shadow-sm rounded-3 border-0" style="background:#dadde0;">
                                    <div class="card-body d-flex space">
                                        <label
                                            class="form-label font-weight-bold mr-4 text-dark">{{ __('labels.applicant_father_name') }}:</label>
                                        <span class="fw-normal text-dark" id="applicant_fname"></span>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="card shadow-sm rounded-3 border-0" style="background:#dadde0;">
                                    <div class="card-body d-flex space">
                                        <label
                                            class="form-label font-weight-bold mr-4 text-dark">{{ __('labels.mobile_no') }}:</label>
                                        <span class="fw-normal text-dark" id="applicant_mnumber"></span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row g-4 mb-3">
                            <div class="col-md-6">
                                <div class="card shadow-sm rounded-3 border-0" style="background:#dadde0;">
                                    <div class="card-body d-flex space">
                                        <label
                                            class="form-label font-weight-bold mr-4 text-dark">{{ __('labels.email_id') }}:</label>
                                        <span class="fw-normal text-dark" id="applicant_email"></span>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="card shadow-sm rounded-3 border-0" style="background:#dadde0;">
                                    <div class="card-body d-flex space">
                                        <label
                                            class="form-label font-weight-bold mr-4 text-dark">{{ __('labels.applicant_address') }}:</label>
                                        <span class="fw-normal text-dark" id="applicant_add1"></span>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                    <!-- Organization Section -->
                    <div class="card-header text-white rounded-top py-3 text-center organization-section"
                        style="background: #006699;">
                        {{-- <i class="fa fa-building mr-2"></i> --}}
                        <h5 class="mb-0 d-inline align-middle">{{ __('labels.sanstha_vivran') }}</h5>
                    </div>
                    <div class="card-body px-4 pb-4 organization-section">

                        <div class="row g-4 mb-3">
                            <div class="col-md-6">
                                <div class="card shadow-sm rounded-3 border-0" style="background:#dadde0;">
                                    <div class="card-body d-flex align-items-center">
                                        <label
                                            class="form-label font-weight-bold mr-4 text-dark">{{ __('labels.land_alloted_details') }}:</label>
                                        <span class="fw-normal text-dark" id="land_alloted_details_data"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="card shadow-sm rounded-3 border-0" style="background:#dadde0;">
                                    <div class="card-body d-flex align-items-center">
                                        <label
                                            class="form-label font-weight-bold mr-4 text-dark">{{ __('labels.org_statement') }}:</label>

                                        <div class="d-flex align-items-center text-nowrap ms-1"
                                            id="org_statement_file_link">
                                            <a href="#">
                                                <i class="fa fa-download me-2 text-primary fs-5 mr-2"></i>
                                            </a>
                                        </div>



                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- परियोजना रिपोर्ट -->
                        <div class="row g-4 mb-3">
                            <div class="col-md-12">
                                <div class="card shadow-sm rounded-3 border-0" style="background:#dadde0;">
                                    <div class="card-body">
                                        <div class="row" align="left">
                                            <div class="col-md-6">
                                                <label class="form-label font-weight-bold text-dark mb-0">
                                                    {{ __('labels.org_project_report') }}:
                                                </label>
                                            </div>
                                            <div class="d-flex align-items-center text-nowrap ms-1"
                                                id="project_report_file_link">
                                                <a href="#">
                                                    <i class="fa fa-download me-2 text-primary fs-5 mr-2"></i>
                                                </a>
                                                <span class="fw-normal text-dark" id="project_report_data"></span>
                                            </div>


                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- भू-आवंटन प्रयोजन -->
                        <div class="row g-4 mb-3">
                            <div class="col-12">
                                <div class="card shadow-sm rounded-3 border-0" style="background:#dadde0;">
                                    <div class="card-body d-flex align-items-center flex-wrap">
                                        <label for="allotmentFile"
                                            class="form-label font-weight-bold text-dark mb-0 mr-3">
                                            {{ __('labels.ins_allot_purpose') }}:
                                        </label>
                                        <div class="d-flex align-items-center text-nowrap ms-1"
                                            id="ins_allot_purpose_file_link">
                                            <a href="#">
                                                <i class="fa fa-download me-2 text-primary fs-5 mr-2"></i>
                                            </a>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- परियोजना का लाभ -->
                        <div class="row g-4 mb-3">
                            <div class="col-12">
                                <div class="card shadow-sm rounded-3 border-0" style="background:#dadde0;">
                                    <div class="card-body px-3">
                                        <div class="d-flex align-items-center flex-wrap">
                                            <label class="form-label font-weight-bold text-dark mb-0 mr-3"
                                                style="white-space:nowrap;">
                                                {{ __('labels.society_benefits') }}?
                                            </label>
                                            <div class="d-flex align-items-center text-nowrap ms-1"
                                                id="society_benefits_file_link">
                                                <a href="#">
                                                    <i class="fa fa-download me-2 text-primary fs-5 mr-2"></i>
                                                </a>
                                                <span class="fw-normal text-dark" id="society_benefits_data"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <!-- भूमि का पूर्व उपयोग (Yes/No + Textbox) -->
                        <div class="row g-4 mb-3">
                            <div class="col-md-12">
                                <div class="card shadow-sm rounded-3 border-0 mb-3" style="background:#dadde0;">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center flex-wrap">
                                            <label class="form-label font-weight-bold text-dark mb-0 me-2 mr-3"
                                                style="white-space:nowrap;">
                                                {{ __('labels.prev_allot_land') }}?
                                            </label>
                                            <div class="d-flex align-items-center text-nowrap ms-1"
                                                id="prev_allot_land_file_link">
                                                <a href="#">
                                                    <i class="fa fa-download me-2 text-primary fs-5 mr-2"></i>
                                                </a>
                                                <span class="fw-normal text-dark" id="land_used_data"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="row g-4 mb-3">
                            <div class="col-md-12">
                                <div class="card shadow-sm rounded-3 border-0 mb-3" style="background:#dadde0;">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center flex-wrap">
                                            <label class="form-label font-weight-bold text-dark mb-0 me-2 mr-3"
                                                style="white-space:nowrap;">
                                                {{ __('labels.org_experience') }}:
                                            </label>
                                            <label class="form-check-label fw-bold" for="land_use_yes"
                                                id="experience_data"></label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            <span class="fw-normal text-dark" id="experience_detail_data"></span>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="row g-4 mb-3">
                            <div class="col-md-12">
                                <div class="card shadow-sm rounded-3 border-0 mb-3" style="background:#dadde0;">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center flex-wrap">
                                            <label class="form-label font-weight-bold text-dark mb-0 me-2 mr-3"
                                                style="white-space:nowrap;">
                                                {{ __('labels.inst_reg_registrar') }}
                                            </label>
                                            <span class="fw-normal text-dark" id="registered_data"></span>
                                        </div>
                                        <!-- नया row: प्रमाण पत्र क्रमांक और विवरण -->
                                        <div class="row align-items-center mt-3 mb-3 g-2 registration-data">
                                            <div class="col-md-6 d-flex align-items-center mb-2 mb-md-0">
                                                <label for="certificateNo"
                                                    class="form-label font-weight-bold fw-bold mb-0 me-2 mr-2"
                                                    style="white-space:nowrap;">
                                                    {{ __('labels.registration_number') }}:
                                                </label>
                                                <span class="fw-normal text-dark" id="reg_number_data"></span>
                                            </div>
                                            <div class="col-md-6 d-flex align-items-center">
                                                <label for="description"
                                                    class="form-label font-weight-bold fw-bold mb-0 me-2 mr-2"
                                                    style="white-space:nowrap;">
                                                    {{ __('labels.org_reg_certificate') }}:
                                                </label>
                                                <span class="fw-normal text-dark"
                                                    id="org_reg_certificate_data"></span>
                                            </div>
                                        </div>

                                        <!-- नया row: प्रमाण पत्र क्रमांक और विवरण -->
                                        <div class="row align-items-center g-4 registration-data">
                                            <div class="col-md-6 d-flex align-items-center flex-wrap">
                                                <label for="fileUpload"
                                                    class="form-label font-weight-bold fw-bold mb-0 mr-2"
                                                    style="white-space:nowrap;">
                                                    {{ __('labels.download') }}:
                                                </label>
                                                <div class="d-flex align-items-center text-nowrap ms-1"
                                                    id="org_reg_certificate_file_link">
                                                    <a href="#">
                                                        <i class="fa fa-download me-2 text-primary fs-5 mr-2"></i>
                                                    </a>

                                                </div>
                                            </div>

                                            <!-- दूसरा कॉलम: पंजीयन तिथि -->
                                            <div class="col-md-6 d-flex align-items-center">
                                                <label for="regDate2"
                                                    class="form-label font-weight-bold fw-bold mb-0 me-2 mr-2"
                                                    style="white-space:nowrap;">
                                                    {{ __('labels.reg_date') }}:
                                                </label>
                                                <span class="fw-normal text-dark" id="reg_date_data"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- भूमि चयन Section -->
                    <div class="card-header text-white rounded-top py-3 text-center" style="background: #006699;">
                        <i class="fa-solid fa-location-dot mr-2"></i>
                        <h5 class="mb-0 d-inline align-middle">{{ __('labels.land_selection') }}</h5>
                    </div>
                    <div class="card-body px-4 pb-4">

                        <div class="row g-4 mb-3">
                            <div class="col-md-4">
                                <div class="card shadow-sm rounded-3 border-0" style="background:#dadde0;">
                                    <div class="card-body d-flex space">
                                        <label
                                            class="form-label font-weight-bold mr-4 text-dark">{{ __('labels.khatedar_district') }}:</label>
                                        <span class="fw-normal text-dark" id="applicant_district"></span>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="card shadow-sm rounded-3 border-0" style="background:#dadde0;">
                                    <div class="card-body d-flex space">
                                        <label
                                            class="form-label font-weight-bold mr-4 text-dark">{{ __('labels.khatedar_tehsil') }}:</label>
                                        <span class="fw-normal text-dark" id="applicant_tehsil"></span>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="card shadow-sm rounded-3 border-0" style="background:#dadde0;">
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
                                <div class="card shadow-sm rounded-3 border-0" style="background:#dadde0;">
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
                            <h6 class="text-center">{{ __('labels.selected_khasra') }}</h6>
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover mb-0" id="preview_khasra_table">
                                    <thead class="table-secondary">
                                        <tr>
                                            <th>{{ __('labels.S_no') }}</th>
                                            <th>{{ __('labels.khasra_number') }}</th>
                                            <th>{{ __('labels.khasra_area') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <div class="row g-4 mb-3">
                            <div class="col-md-6">
                                <div class="card shadow-sm rounded-3 border-0" style="background:#dadde0;">
                                    <div class="card-body d-flex space">
                                        <label
                                            class="form-label font-weight-bold mr-4 text-dark">{{ __('labels.type_of_land') }}:</label>
                                        <span class="fw-normal text-dark" id="land_type"></span>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="card shadow-sm rounded-3 border-0" style="background:#dadde0;">
                                    <div class="card-body d-flex space">
                                        <label
                                            class="form-label font-weight-bold mr-4 text-dark">{{ __('labels.proposed_area') }}:</label>
                                        <span class="fw-normal text-dark" id="proposed_land_area"></span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row g-4 mb-3">
                            <div class="col-md-6">
                                <div class="card shadow-sm rounded-3 border-0" style="background:#dadde0;">
                                    <div class="card-body d-flex space">
                                        <label
                                            class="form-label font-weight-bold mr-4 text-dark">{{ __('labels.land_surrendered') }}:</label>
                                        <span class="fw-normal text-dark" id="is_land_surrendered"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- भूमि विवरण Section (Land Detail) -->
                    <div class="card-header text-white rounded-top py-3 text-center" style="background: #006699;">
                        <i class="fa-solid fa-map-location-dot mr-2"></i>
                        <h5 class="mb-0 d-inline align-middle">{{ __('labels.land_description') }}</h5>
                    </div>

                    <div class="card-body px-4 pb-4">
                        <input type="hidden" id="application_no" value="AP-123456" />

                        <div class="row g-4 mb-3">
                            <div class="col-md-12">
                                <div class="card shadow-sm rounded-3 border-0" style="background:#dadde0;">
                                    <div class="card-body d-flex space">
                                        <div class="col-md-6">
                                            <label
                                                class="form-label font-weight-bold mr-4 text-dark">{{ __('labels.khatedari_land') }}:</label>
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
                                <div class="card shadow-sm rounded-3 border-0" style="background:#dadde0;">
                                    <div class="card-body d-flex space">
                                        <label
                                            class="form-label font-weight-bold mr-4 text-dark">{{ __('labels.land_acquistion') }}:</label>
                                        <span class="fw-normal text-dark" id="under_acquisition_act_1894"></span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row g-4 mb-3">
                            <div class="col-md-12">
                                <div class="card shadow-sm rounded-3 border-0" style="background:#dadde0;">
                                    <div class="card-body d-flex space">
                                        <label
                                            class="form-label font-weight-bold mr-4 text-dark">{{ __('labels.irrigation_means') }}:</label>
                                        <span class="fw-normal text-dark" id="irrigation_land"></span>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="row g-4 mb-3">
                            <div class="col-md-4">
                                <div class="card shadow-sm rounded-3 border-0" style="background:#dadde0;">
                                    <div class="card-body d-flex space">
                                        <label
                                            class="form-label font-weight-bold mr-3 text-dark">{{ __('labels.railway_distance') }}:</label>
                                        <span class="fw-normal text-dark" id="dist_from_RL"></span>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="card shadow-sm rounded-3 border-0" style="background:#dadde0;">
                                    <div class="card-body d-flex space">
                                        <label
                                            class="form-label font-weight-bold mr-4 text-dark">{{ __('labels.national_highway_distance') }}:</label>
                                        <span class="fw-normal text-dark" id="dist_from_NH"></span>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="card shadow-sm rounded-3 border-0" style="background:#dadde0;">
                                    <div class="card-body d-flex space">
                                        <label
                                            class="form-label font-weight-bold mr-4 text-dark">{{ __('labels.state_highway') }}:</label>
                                        <span class="fw-normal text-dark" id="dist_from_SH"></span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row g-4 mb-3">
                            <div class="col-md-4">
                                <div class="card shadow-sm rounded-3 border-0" style="background:#dadde0;">
                                    <div class="card-body d-flex space">
                                        <label
                                            class="form-label font-weight-bold mr-4 text-dark">{{ __('labels.distance_from_town_city') }}:</label>
                                        <span class="fw-normal text-dark" id="dist_from_City"></span>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="card shadow-sm rounded-3 border-0" style="background:#dadde0;">
                                    <div class="card-body d-flex space">
                                        <label
                                            class="form-label font-weight-bold mr-4 text-dark">{{ __('labels.project_cost') }}:</label>
                                        <span class="fw-normal text-dark" id="project_cost_data"></span>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="card shadow-sm rounded-3 border-0" style="background:#dadde0;">
                                    <div class="card-body d-flex space">
                                        <label
                                            class="form-label font-weight-bold mr-4 text-dark">{{ __('labels.relevant_info') }}:</label>
                                        <span class="fw-normal text-dark" id="other_details"></span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- डॉक्युमेंट अपलोड Section -->
                        <div class="card-header text-white rounded-top py-3 text-center" style="background: #006699;">
                            {{-- <i class="fa-solid fa-upload mr-2"></i> --}}
                            <h5 class="mb-0 d-inline align-middle">{{ __('labels.document_upload') }}</h5>
                        </div>
                        <div class="card-body px-4 pb-4">
                            <div class="table-responsive mb-3">
                                <table class="table table-bordered align-middle text-center" id="preview_documents">
                                    <thead style="background: #e9ecef;">
                                        <tr>
                                            <th scope="col">{{ __('labels.S_no') }}</th>
                                            <th scope="col">{{ __('labels.doc_type') }}</th>
                                            <th scope="col">{{ __('labels.doc_upload') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <div class="card-footer text-end bg-white px-4 pt-3 pb-3 border-0">
                            <button type="button" class="btn btn-lg px-5 shadow rounded-pill" data-dismiss="modal"
                                style="background: #006699; color: white;">Close</button>
                            {{-- <button type="button" class="btn btn-lg px-5 shadow rounded-pill"
                                                style="background: #006699; color: white;">Final Submit</button> --}}



                            {{-- <a href="#" id="finalSubmitBtn" class="btn btn-lg px-5 shadow rounded-pill"
                                style="background: #006699; color: white;">
                                Final Submit
                            </a> --}}



                            {{-- <button type="button" class="btn btn-primary" onclick="printPopup()">🖨️ Print</button> --}}

                            <a href="" id="finalSubmitBtn" class="btn btn-lg px-5 shadow rounded-pill"
                                style="background: #006699; color: white;"
                                onclick="return confirm('Are you sure you want to submit the application? Once submitted, it cannot be edited?');">
                                Final Submit
                            </a>

                            {{-- @if (request()->is('new-application')) --}}
                                <a href="javascript:void(0);" id="editButton"
                                    class="btn btn-lg px-5 shadow rounded-pill"
                                    style="background: #006699; color: white;">
                                    Edit Application
                                </a>
                            {{-- @endif --}}



                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
