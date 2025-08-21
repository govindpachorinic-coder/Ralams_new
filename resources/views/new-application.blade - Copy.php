@extends('application_layout')



@section('title', __("labels.project_short_name"))
@section('pagetitle', __("labels.dashboard"))

@section('role_name', "user")

<meta charset="UTF-8" />


<title>Applicant Form</title>
@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12 col-sm-9 col-md-7 col-lg-6 text-center p-0 mt-3 mb-2">
            <div class="border border-secondary px-5" style="border-radius: 15px;">
                <div class="px-0 pt-4 pb-0 mt-0 mb-3">
                    <form id="form">
                       
                        <fieldset>
                        <div class="card shadow" style="border-radius: 15px;">
                            <div class="card-title text-center btn-custom pt-2" type="button" style="font-size:20px;">
                         
                                <div class="col-md-12 mt-2 mb-2">
                                    <h3>आवेदन विवरण</h3>
                                </div>
                            </div>
                            <div class="row card-body pt-4" style="">
                                <div class="col-md-6" align="left">
                                    <label for="purpose_type" class="form-label">{{ __("labels.applicant_purpose") }}
                                        <span style="color: red;">*</span>
                                    </label>
                                    <select id="purpose_types" data-label="एप्लीकेशन पर्पस" name="allotment_purpose"
                                        class="form-control @error('allotment_purpose') is-invalid @enderror">
                                         <option value="">{{ __('labels.select_one') }}</option>
                                        @foreach($purposes as $purpose)
                                        <option value="{{$purpose->id}}" data-rule-id="{{$purpose->application_rule_id}}">{{$purpose->purpose_name_hi}}</option>
                                        @endforeach
                                        
                                    </select>
                                    @error('allotment_purpose') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                </div>
                                <div class="col-md-6" align="left">
                                    <label for="land_owner_type"
                                        class="form-label">{{ __("labels.rule_of_land_allocation") }}
                                        <span style="color: red;">*</span></label>
                                    <select id="land_allotment_rule" data-label="भूमि आवंटन नियम" name="land_allotment_rule"
                                        class="form-control @error('land_owner_type') is-invalid @enderror" disabled>
                                        <option value="">{{ __('labels.select_one') }}</option>
                                         @foreach($rules as $rule)
                                        <option value="{{$rule->id}}">{{$rule->rule_name_hi}}</option>
                                        @endforeach

                                        
                                    </select>
                                    <input type="hidden" id="land_allot_rule" name="land_allot_rule" value="">
                                    @error('land_owner_type') <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-12 mt-4" align="left" id="purpose_details">
                                    <label for="purpose_details">{{ __("labels.purpose_details") }}<span
                                            style="color: red;">*</span></label>
                                    <input type="text" id="purpose_details" data-label="{{ __("labels.purpose_details") }}"
                                        name="purpose_details" placeholder="{{ __("labels.purpose_details") }}"
                                        class="form-control @error('purpose_details') is-invalid @enderror"
                                        value="{{ old('purpose_details') }}">
                                    @error('purpose_details') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                </div>
                            </div>
                            <div class="row card-body mb-4">
                                <div class="col-md-12" id="org_status" align="left">
                                    <span>आवेदक का प्रकार:</span>
                                    <div class="inline-radio">
                                        <label>
                                        <input type="radio" name="applicant_type" value="vyaktigat" checked> व्यक्तिगत
                                        </label>
                                        <label class="ml-3">
                                        <input type="radio" name="applicant_type" value="sanstha"> संस्था
                                        </label>
                                        <label class="ml-3">
                                        <input type="radio" name="applicant_type" value="vibhag"> विभाग
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-4 mt-4" align="left" id="app_name" style="display:none;">
                                    <label for="app_name">{{ __("labels.applicant_name") }}<span
                                            style="color: red;">*</span></label>
                                    <input type="text" id="app_name" data-label="{{ __("labels.applicant_name") }}"
                                        name="app_name" placeholder="{{ __("labels.applicant_name") }}"
                                        class="form-control @error('app_name') is-invalid @enderror"
                                        value="{{ old('app_name', Auth::user()->name ?? '') }}">
                                    @error('app_name') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                </div>

                                <div class="col-md-4 mt-4" align="left" id="app_fname" style="display:none;">
                                    <label for="appf_name">{{ __("labels.applicant_father_name") }}<span
                                            style="color: red;">*</span></label>
                                    <input type="text" id="app_fname" data-label="{{ __("labels.applicant_father_name") }}"
                                        name="app_fname" align="left" placeholder="{{ __("labels.applicant_father_name") }}"
                                        class="form-control @error('app_fname') is-invalid @enderror"
                                        value="{{ old('app_fname', Auth::user()->father_name ?? '') }}">
                                    @error('app_fname') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                </div>


                                <div class="col-md-4 mt-4" align="left" id="address_app" style="display:none;">
                                    <label for="address_app">{{ __("labels.applicant_address") }}<span
                                            style="color: red;">*</span></label>
                                    <input type="text" id="address_app" data-label="{{ __("labels.applicant_address") }}"name="address_app" placeholder="{{ __("labels.applicant_address") }}"
                                        class="form-control @error('address_app') is-invalid @enderror"
                                        value="{{ old('address_app', Auth::user()->postal_address ?? '') }}">
                                    @error('address_app') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                </div>

                                <div class="col-md-4 mt-4" align="left" id="app_mobile" style="display:none;">
                                    <label for="app_mobile">{{ __("labels.mobile_no") }}<span
                                            style="color: red;">*</span></label>
                                    <input type="text" id="app_mobile" data-label="मोबाइल नंबर" name="app_mobile"
                                        placeholder="मोबाइल नंबर"
                                        class="form-control @error('app_mobile') is-invalid @enderror"
                                        value="{{ old('app_mobile', Auth::user()->mobile ?? '') }}">
                                    @error('app_mobile') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                </div>

                                <div class="col-md-4 mt-4" align="left" id="app_email" style="display:none;">
                                    <label for="app_email">{{ __("labels.email_id") }}<span
                                            style="color: red;">*</span></label>
                                    <input type="text" id="app_email" data-label="ईमेल आई डी" name="app_email"
                                        placeholder="ईमेल आई डी"
                                        class="form-control @error('app_email') is-invalid @enderror"
                                        value="{{ old('app_email', Auth::user()->email ?? '') }}">
                                    @error('app_email') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                </div>

                                <div class="col-md-4 mt-4" align="left" id="org_name" style="display:none;">
                                    <label for="org_name">{{ __("labels.rcv_org_name") }}<span
                                            style="color: red;">*</span></label>
                                    <input type="text" id="org_name" data-label="संस्था का नाम" name="org_name"
                                        placeholder="संस्था का नाम"
                                        class="form-control @error('org_name') is-invalid @enderror"
                                        value="{{ old('org_name') }}">
                                    @error('org_name') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                </div>

                                <div class="col-md-4 mt-4" align="left" id="dep_name" style="display:none;">
                                    <label for="dep_name">{{ __("labels.depat_name") }}<span
                                            style="color: red;">*</span></label>
                                    <input type="text" id="dep_name" data-label="विभाग का नाम" name="dep_name"
                                        placeholder="विभाग का नाम"
                                        class="form-control @error('dep_name') is-invalid @enderror"
                                        value="{{ old('dep_name') }}">
                                    @error('dep_name') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                </div>

                                <div class="col-md-4 mt-4" align="left" id="app_des" style="display:none;">
                                    <label for="app_des">{{ __("labels.desiganation") }}<span
                                            style="color: red;">*</span></label>
                                    <input type="text" id="app_des" data-label="{{ __("labels.desiganation") }}"
                                        name="app_des" placeholder="{{ __("labels.desiganation") }}"
                                        class="form-control @error('app_des') is-invalid @enderror"
                                        value="{{ old('app_des') }}">
                                    @error('app_des') <div class="invalid-feedback">{{ $message }}</div> @enderror
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
                            </div>
                            <!-- <center><button type="submit" class="btn-submit mb-4">जमा करें</button></center> -->
                        </div>
                        <input type="button" name="next-step" id="applicant_next" class="btn btn-success next-step mt-5" value="Next" />
                        </fieldset>
                        <fieldset>
                            <div class="card shadow" style="border-radius: 15px;">
                                <div class="card-title text-center btn-custom pt-2" type="button" style="font-size:20px;">
                                    <div class="col-md-12 mt-2 mb-2"  style="text-align: left;">
                                        <span class="icon">&#128205;</span>{{ __("labels.land_selection") }}
                                    </div>
                                </div>
                                <div class="row card-body pt-4 pb-5">
                                    <div class="col-md-6" align="left">
                                        <label for="khatedar_district">{{ __("labels.khatedar_district") }}<span style="color: red;">*</span></label>
                                        <select name="district" class="form-control" required onchange="fetchOptions('district', this.value)">
                                            <option value="">{{ __("labels.select_district") }}</option>
                                        </select>
                                        <span id="khatedar-district-error" class="error-message" style="color:red"></span>
                                    </div>
                                    <div class="col-md-6" align="left">
                                        <label for="khatedar_tehsil">{{ __("labels.khatedar_tehsil") }}<span style="color: red;">*</span></label>
                                        <select name="tehsil" class="form-control" required
                                        onchange="fetchOptions('tehsil', this.value)">
                                            <option value="">{{ __("labels.select_tehsil") }}</option>
                                        </select>
                                        <span id="khatedar-tehsil-error" class="error-message" style="color:red"></span>
                                    </div>
                                    <div class="col-md-6 mt-3" align="left">
                                        <label for="village">{{ __("labels.village") }}<span style="color: red;">*</span></label>
                                        <select name="village" class="form-control" required>
                                            <option value="">{{ __("labels.select_vill") }}</option>
                                        </select>
                                        <span id="village-error" class="error-message" style="color:red"></span>
                                    </div>

                                    <div class="col-md-6 mt-3" align="left">
                                        <label for="khasra">{{ __("labels.khasra") }}<span style="color: red;">*</span></label>
                                        <select id="khsra" name="khsra[]" class="form-control"
                                        onchange="handleKhasraSelection(this)">
                                        </select>
                                        <span id="khasra-error" class="error-message" style="color:red"></span>
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
                                                        <tr>
                                                            <th>1</th>
                                                            <th>11</th>
                                                            <th>111</th>
                                                            <th><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"><i class="fa-solid fa-eye"></i></button></th>
                                                        </tr>
                                                    </thead>
                                                    <tbody id="khasraTableBody">
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                      <div class="modal-dialog modal-xl" role="document">
                                        <div class="modal-content">
                                          <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
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
                                                    <tbody>
                                                        <tr>
                                                            <td>2026</td>
                                                            <td>अंजिता देवी</td>
                                                            <td></td>
                                                            <td>सादेह</td>
                                                        </tr>
                                                        <tr>
                                                            <td>2026</td>
                                                            <td>अरविन्द</td>
                                                            <td>सोहनसिंह</td>
                                                            <td>सादेह</td>
                                                        </tr>
                                                        <tr>
                                                            <td>2026</td>
                                                            <td>अशोक सिंह</td>
                                                            <td>सोहनसिंह</td>
                                                            <td>सादेह</td>
                                                        </tr>
                                                        <tr>
                                                            <td>2026</td>
                                                            <td>कमलादेवी</td>
                                                            <td></td>
                                                            <td>सादेह</td>
                                                        </tr>
                                                        <tr>
                                                            <td>2026</td>
                                                            <td>गीता</td>
                                                            <td>सोहनसिंह</td>
                                                            <td>सादेह</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                          </div>
                                          <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                    <div class="collapse mt-3" id="collapseExample">
                                        <div class="card card-body">
                                            This is your hidden panel for खसरा.
                                        </div>
                                    </div>

                                    <div class="col-md-6 mt-4" align="left">
                                        <label for="type_of_land">{{ __("labels.type_of_land") }}<span style="color: red;">*</span></label>
                                        <input class="form-control" id="type_of_land" type="text" placeholder="{{ __('labels.type_of_land') }}" name="type_of_land">
                                        <span id="land-type-error" class="error-message" style="color:red"></span>
                                    </div>

                                    <div class="col-md-6 mt-4" align="left">
                                        <label for="proposed_area">{{ __("labels.proposed_area") }}<span style="color: red;">*</span></label>
                                        <input class="form-control" id="proposed_area" type="text" placeholder="{{ __('labels.proposed_area') }}" name="proposed_area">
                                        <span id="proposed-area-error" class="error-message" style="color:red"></span>
                                    </div>

                                </div>
                                <div class="row card-body">
                                    <div class="col-md-6" align="left">
                                        <label for="land_surrendered">{{ __("labels.land_surrendered") }}<span
                                            style="color: red;">*</span>
                                        </label><br>
                                    </div>
                                    <div class="col-md-6 d-flex align-items-center" style="margin-top: -25px;">
                                        <div class="form-check d-flex align-items-center">
                                            <input class="form-check-input" type="radio" name="land_surrendered" value="yes">
                                            <label class="form-check-label">{{ __("labels.yes") }}</label>
                                        </div>
                                        <div class="form-check d-flex align-items-center" style="margin-left: 10px;">
                                            <input class="form-check-input" type="radio"
                                            name="land_surrendered" value="no" checked>
                                            <label class="form-check-label">{{ __("labels.no") }}</label>
                                        </div>
                                        <div id="landSurrDetails" class="mt-2" style="display: none; margin-left : 50px !important">
                                            <textarea class="form-control mt-2" placeholder="विवरण" style="min-width: 300px;"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <!-- <center><button type="submit" class="btn-submit mb-4">जमा करें</button></center> -->
                            </div>
                            <input type="button" name="previous-step" class="btn btn-success previous-step mt-5" value="Previous"/>
                            <input type="button" name="next-step" class="btn btn-success next-step mt-5" value="Next" />
                        </fieldset>
                        <fieldset>
                        <div class="card shadow" style="border-radius: 15px;">
                            <div class="card-title text-center btn-custom pt-2" type="button" style="font-size:20px;">
                                <div class="col-md-12 mt-2 mb-2" style="text-align: left;">
                                    <span class="icon">&#128206;</span>{{ __("labels.land_detail") }}
                                </div>
                            </div>
                            <div class="row card-body mt-4">
                                <input type="hidden" id="application_no" name="application_no" value="">
                                <div class="col-md-6" align="left">
                                    <label class="form-label">
                                        {{ __("labels.khatedari_land") }}
                                    </label>
                                </div>

                                <div class="col-md-6 d-flex align-items-center">
                                    <div class="form-check d-flex align-items-center">
                                        <input class="form-check-input me-1" type="radio" name="khatadari" value="yes"
                                            id="khatadariYes">
                                        <label class="form-check-label" for="khatadariYes">{{ __("labels.yes") }}</label>
                                    </div>

                                    <div class="form-check d-flex align-items-center" style="margin-left: 10px;">
                                        <input class="form-check-input me-1" type="radio" name="khatadari" value="no"
                                            id="khatadariNo" checked>
                                        <label class="form-check-label" for="khatadariNo">{{ __("labels.no") }}</label>
                                    </div>
                                    <div id="khatadariDetails" class="mt-2" style="display: none; margin-left : 50px !important">
                                        <textarea class="form-control mt-2" id="khatadariDetailsInput"
                                            name="khatadariDetails" placeholder="विवरण" style="min-width: 300px;"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row card-body mt-4">
                                <div class="col-md-6" align="left">
                                    <label>
                                        {{ __("labels.land_acquistion") }}
                                    </label>
                                </div>
                                <div class="col-md-6 d-flex align-items-center">
                                    <div class="form-check d-flex align-items-center">
                                        <input class="form-check-input" type="radio" name="act_1894" value="yes">
                                        <label class="form-check-label">{{ __("labels.yes") }}</label>
                                    </div>
                                    <div class="form-check d-flex align-items-center" style="margin-left: 10px;">
                                        <input class="form-check-input" type="radio" name="act_1894" value="no" checked>
                                        <label class="form-check-label">{{ __("labels.no") }}</label>
                                    </div>
                                    <div id="landacc" class="mt-2" style="display: none; margin-left : 50px !important">
                                        <textarea class="form-control mt-2" id="landaccInput"
                                            name="landacc" placeholder="विवरण" style="min-width: 300px;"></textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="row card-body mt-4">
                                <div class="col-md-6" align="left">
                                    <label for="irrigation_means">{{ __("labels.irrigation_means") }}<span
                                            style="color: red;">*</span></label>
                                </div>
                                <div class="col-md-6 d-flex align-items-center flex-wrap gap-3">
                                    <div class="form-check d-flex align-items-center me-3">
                                        <input class="form-check-input" type="radio" name="irrigation_means" value="yes">
                                        <label class="form-check-label">{{ __("labels.yes") }}</label>
                                    </div>
                                    <div class="form-check d-flex align-items-center me-3" style="margin-left: 10px;">
                                        <input class="form-check-input" type="radio" name="irrigation_means" value="no"
                                            checked>
                                        <label class="form-check-label">{{ __("labels.no") }}</label>
                                    </div>
                                    <div id="irrigationDetails" name="irrigationDetails" class="mt-2" style="display: none; margin-left : 50px !important">
                                        <textarea class="form-control mt-2" id="irrigationDetails"
                                            name="irrigationDetails" placeholder="विवरण" style="min-width: 300px;"></textarea>
                                    </div>
                                </div>
                            </div>
                                
                            <div class="row card-body mt-4">
                                <div class="col-md-3 mt-4" align="left">
                                    <label for="railway_distance">{{ __("labels.railway_distance") }}<span
                                            style="color: red;">*</span></label></label>
                                    <input class="form-control" type="text" id="railway_distance" name="railway_distance"
                                        placeholder="मीटर में दूरी">
                                    <span id="railway-distance-error" class="error-message" style="color:red"></span>
                                </div>

                                <div class="col-md-3 mt-4" align="left">
                                    <label for="national_highway_distance">{{ __("labels.national_highway_distance") }}<span
                                            style="color: red;">*</span></label></label>
                                    <input class="form-control" type="text" id="national_highway_distance"
                                        name="national_highway_distance" placeholder="मीटर में दूरी">
                                    <span id="national-highway-distance-error" class="error-message"
                                        style="color:red"></span>
                                </div>

                                <div class="col-md-3 mt-4" align="left">
                                    <label for="state_highway">{{ __("labels.state_highway") }}<span
                                            style="color: red;">*</span></label></label>
                                    <input class="form-control" type="text" id="state_highway" name="state_highway"
                                        placeholder="मीटर में दूरी">
                                    <span id="state-highway-error" class="error-message" style="color:red"></span>
                                </div>

                                <div class="col-md-3 mt-4" align="left">
                                    <label for="distance_from_town_city">{{ __("labels.distance_from_town_city") }}<span
                                            style="color: red;">*</span></label></label>
                                    <input class="form-control" type="text" id="distance_from_town_city"
                                        name="distance_from_town_city" placeholder="मीटर में दूरी">
                                    <span id="distance-error" class="error-message" style="color:red"></span>
                                </div>
                            </div>

                            <div class="row card-body mb-3">
                                <div class="col-md-6 mt-4" align="left">
                                    <label for="project_cost">{{ __("labels.project_cost") }}<span
                                            style="color: red;">*</span></label>
                                    <input class="form-control" type="text" id="project_cost" name="project_cost"
                                        placeholder="परियोजना लागत">
                                    <span id="project-cost-error" class="error-message" style="color:red"></span>
                                </div>

                                <div class="col-md-6 mt-4" align="left">
                                    <label for="relevant_info">{{ __("labels.relevant_info") }}<span
                                            style="color: red;">*</span></label>
                                    <input class="form-control" type="text" id="relevant_info" name="relevant_info"
                                        placeholder="अन्य कोई सुसंगत सूचना">
                                    <span id="relevant-info-error" class="error-message" style="color:red"></span>
                                </div>
                            </div>
                        </div>
                        <input type="button" name="previous-step" class="btn btn-success previous-step mt-5" value="Previous" />
                        <input type="button" name="next-step" class="btn btn-success next-step mt-5" value="Next" />
                        </fieldset>
                        <fieldset>
                            <div class="card shadow" style="border-radius: 15px;">
                                <div class="card-title text-center btn-custom pt-2" type="button" style="font-size:20px;">
                                <div class="col-md-12 mt-2 mb-2" style="text-align: left;">
                                    <span class="icon">&#128206;</span>{{ __("labels.doc_upload") }}
                                </div>
                            </div>
                                
                                <div class="row mb-3 table-responsive" style="margin-left: 0px !important;">
                                    <table class="table table-bordered align-middle text-center">
                                        <thead class="table-primary">
                                            <tr>
                                                <th scope="col">{{ __("labels.S_no") }}</th>
                                                <th scope="col">{{ __("labels.doc_type") }}</th>
                                                <th scope="col">{{ __("labels.doc_availability") }}</th>
                                                <th scope="col">{{ __('labels.doc_upload') }} ({{ __('labels.doc_file_size') }})</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <th scope="row"></th>
                                                <td><span style="color: red;">*</span></td>
                                                <td>
                                                    <div class="form-check form-check-inline mt-4">
                                                        <input type="radio" class="form-check-input"
                                                            id=""
                                                            name=""
                                                            value="yes">
                                                        <label class="form-check-label" for="">{{ __("labels.yes") }}</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input type="radio" class="form-check-input"
                                                            id=""
                                                            name=""
                                                            value="no" checked>
                                                        <label class="form-check-label" for="">{{ __("labels.no") }}</label>
                                                    </div>
                                                </td>
                                                <td id="" style="display:none;">
                                                    <input type="file"
                                                        name=""
                                                        class="form-control fileInput"
                                                        accept=".jpg, .png, application/pdf">
                                                    <small class="error" style="color:red; display:block; margin-top:4px;"></small>

                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                           <!-- <center><button type="submit" class="btn-submit mb-4"><i class="bi bi-send-fill"></i> जमा करें
                            </button>
                           </center> -->
                        </div>
                            <input type="button" name="previous-step" class="btn btn-success previous-step mt-5" value="Previous" />
                            <input type="button" name="preview-step" class="btn btn-success preview-step mt-5" value="Preview & Final Submit" />
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        $('#purpose_types').on('change', function () {
            var purposeTypeId = $(this).val();
            var ruleId = $(this).find(':selected').data('rule-id');            
            $('#land_allotment_rule').val(ruleId).trigger('change');
        });
    </script>
  
@endsection