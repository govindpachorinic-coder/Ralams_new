@extends('application_layout')

@section('title', __("labels.project_short_name"))
@section('pagetitle', __("labels.dashboard"))

@section('role_name', "Admin")

@section('currentActivePage',4)

@section('content')
    <div class="container ">
    @include('application_layouts.wizard')
        <div class="row d-flex justify-content-center align-items-center">
            <div class="col-12 p-4">
                <div class="card card-registration card-registration-2" style="border-radius: 15px;">
                    <div class="card-body">
                        <form action ="" onsubmit="return validateForm()" id="ralamsForm" name="myForm"> 
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
                                                        <input type="radio" class="form-check-input" id="radio1" name="optradio1" value="option1" checked>{{ __("labels.yes") }}
                                                        <label class="form-check-label" for="radio1"></label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input type="radio" class="form-check-input" id="radio2" name="optradio1" value="option2">{{ __("labels.no") }}
                                                        <label class="form-check-label" for="radio"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <input type="file" name="upload_doc" class="form-control" accept=".jpg, .png, application/pdf">
                                                    <!--<input class="form-control mt-2 rounded" type="text" placeholder="प्रस्तावित क्षेत्रफल" name="upload_budget" required> -->
                                                    <span class="text-secondary">.pdf, .jpg, .png <2MB> </span>
                                            
                                                </td>
                                            </tr>
                                    
                                            <tr>
                                                <th scope="row">2</th>
                                                <td>{{ __("labels.spot_report_patwari") }}<span style="color: red;">*</span></td>
                                                <td>
                                                    <div class="form-check form-check-inline mt-4">
                                                        <input type="radio" class="form-check-input" id="radio3" name="optradio2" value="option3" checked>{{ __("labels.yes") }}
                                                        <label class="form-check-label" for="radio3"></label>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                        <input type="radio" class="form-check-input" id="radio4" name="optradio2" value="option4">{{ __("labels.no") }}
                                                        <label class="form-check-label" for="radio4"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <input type="file" name="upload_doc" class="form-control" accept=".jpg, .png, application/pdf">
                                                    <!--<input class="form-control mt-2 rounded" type="text" placeholder="प्रस्तावित क्षेत्रफल" name="upload_budget" required> -->
                                                    <span class="text-secondary">.pdf, .jpg, .png <2MB> </span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th scope="row">3</th>
                                                <td>{{ __("labels.gram_panchayat_proposal") }}<span style="color: red;">*</span></td>
                                                <td>
                                                    <div class="form-check form-check-inline mt-4">
                                                        <input type="radio" class="form-check-input" id="radio5" name="optradio3" value="option5" checked>{{ __("labels.yes") }}
                                                        <label class="form-check-label" for="radio5"></label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input type="radio" class="form-check-input" id="radio6" name="optradio3" value="option6">{{ __("labels.no") }}
                                                        <label class="form-check-label" for="radio6"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <input type="file" name="upload_doc" class="form-control" accept=".jpg, .png, application/pdf">
                                                    <!--<input class="form-control mt-2 rounded" type="text" placeholder="प्रस्तावित क्षेत्रफल" name="upload_budget" required> -->
                                                    <span class="text-secondary">.pdf, .jpg, .png <2MB> </span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th scope="row">4</th>
                                                <td>{{ __("labels.land_detailed_project") }}<span style="color: red;">*</span></td>
                                                <td>
                                                    <div class="form-check form-check-inline mt-4">
                                                        <input type="radio" class="form-check-input" id="radio7" name="optradio4" value="option7" checked>{{ __("labels.yes") }}
                                                        <label class="form-check-label" for="radio1"></label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input type="radio" class="form-check-input" id="radio8" name="optradio4" value="option8">{{ __("labels.no") }}
                                                        <label class="form-check-label" for="radio4"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <input type="file" name="upload_doc" class="form-control" accept=".jpg, .png, application/pdf">
                                                        <!--<input class="form-control mt-2 rounded" type="text" placeholder="प्रस्तावित क्षेत्रफल" name="upload_budget" required> -->
                                                        <span class="text-secondary">.pdf, .jpg, .png <2MB> </span>
                                                </td>
                                            </tr>
                                            <tr>
                                            <th scope="row">5</th>
                                                <td>{{ __("labels.agree_with_allotment") }}<span style="color: red;">*</span></td>
                                                <td>
                                                    <div class="form-check form-check-inline mt-4">
                                                        <input type="radio" class="form-check-input" id="radio9" name="optradio5" value="option9" checked>{{ __("labels.yes") }}
                                                        <label class="form-check-label" for="radio1"></label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input type="radio" class="form-check-input" id="radio10" name="optradio5" value="option10">{{ __("labels.no") }}
                                                        <label class="form-check-label" for="radio4"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <input type="file" name="upload_doc" class="form-control" accept=".jpg, .png, application/pdf">
                                                    <!--<input class="form-control mt-2 rounded" type="text" placeholder="प्रस्तावित क्षेत्रफल" name="upload_budget" required> -->
                                                    <span class="text-secondary">.pdf, .jpg, .png <2MB> </span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th scope="row">6</th>
                                                <td>{{ __("labels.urban_area") }}<span style="color: red;">*</span></td>
                                                <td>
                                                    <div class="form-check form-check-inline mt-4">
                                                        <input type="radio" class="form-check-input" id="radio11" name="optradio6" value="option11" checked>{{ __("labels.yes") }}
                                                        <label class="form-check-label" for="radio1"></label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input type="radio" class="form-check-input" id="radi12" name="optradio6" value="option12">{{ __("labels.no") }}
                                                        <label class="form-check-label" for="radio4"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <input type="file" name="upload_doc" class="form-control" accept=".jpg, .png, application/pdf">
                                                    <!--<input class="form-control mt-2 rounded" type="text" placeholder="प्रस्तावित क्षेत्रफल" name="upload_budget" required> -->
                                                    <span class="text-secondary">.pdf, .jpg, .png <2MB> </span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th scope="row">7</th>
                                                <td>{{ __("labels.city_master_plan") }}<span style="color: red;">*</span></td>
                                                <td>
                                                    <div class="form-check form-check-inline mt-4">
                                                        <input type="radio" class="form-check-input" id="radio13" name="optradio7" value="option13" checked>{{ __("labels.yes") }}
                                                        <label class="form-check-label" for="radio1"></label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input type="radio" class="form-check-input" id="radio14" name="optradio7" value="option14">{{ __("labels.no") }}
                                                        <label class="form-check-label" for="radio4"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <input type="file" name="upload_doc" class="form-control" accept=".jpg, .png, application/pdf">
                                                    <!--<input class="form-control mt-2 rounded" type="text" placeholder="प्रस्तावित क्षेत्रफल" name="upload_budget" required> -->
                                                    <span class="text-secondary">.pdf, .jpg, .png <2MB> </span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th scope="row">8</th>
                                                <td>{{ __("labels.inst_reg_certificate") }}<span style="color: red;">*</span></td>
                                                <td>
                                                    <div class="form-check form-check-inline mt-4">
                                                        <input type="radio" class="form-check-input" id="radio15" name="optradio8" value="option15" checked>{{ __("labels.yes") }}
                                                        <label class="form-check-label" for="radio1"></label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input type="radio" class="form-check-input" id="radio16" name="optradio8" value="option16">{{ __("labels.no") }}
                                                        <label class="form-check-label" for="radio4"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <input type="file" name="upload_doc" class="form-control" accept=".jpg, .png, application/pdf">
                                                    <!--<input class="form-control mt-2 rounded" type="text" placeholder="प्रस्तावित क्षेत्रफल" name="upload_budget" required> -->
                                                    <span class="text-secondary">.pdf, .jpg, .png <2MB> </span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th scope="row">9</th>
                                                <td>{{ __("labels.org_copy_attach") }}<span style="color: red;">*</span></td>
                                                <td>
                                                    <div class="form-check form-check-inline mt-4">
                                                        <input type="radio" class="form-check-input" id="radio17" name="optradio9" value="option17" checked>{{ __("labels.yes") }}
                                                        <label class="form-check-label" for="radio1"></label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input type="radio" class="form-check-input" id="radio18" name="optradio9" value="option18">{{ __("labels.no") }}
                                                        <label class="form-check-label" for="radio4"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <input type="file" name="upload_doc" class="form-control" accept=".jpg, .png, application/pdf">
                                                        <!--<input class="form-control mt-2 rounded" type="text" placeholder="प्रस्तावित क्षेत्रफल" name="upload_budget" required> -->
                                                        <span class="text-secondary">.pdf, .jpg, .png <2MB> </span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th scope="row">10</th>
                                                <td>{{ __("labels.audited_copy") }}<span style="color: red;">*</span></td>
                                                <td>
                                                    <div class="form-check form-check-inline mt-4">
                                                        <input type="radio" class="form-check-input" id="radio19" name="optradio10" value="option19" checked>{{ __("labels.yes") }}
                                                        <label class="form-check-label" for="radio1"></label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input type="radio" class="form-check-input" id="radio20" name="optradio10" value="option20">{{ __("labels.no") }}
                                                        <label class="form-check-label" for="radio4"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <input type="file" name="upload_doc" class="form-control" accept=".jpg, .png, application/pdf">
                                                        <!--<input class="form-control mt-2 rounded" type="text" placeholder="प्रस्तावित क्षेत्रफल" name="upload_budget" required> -->
                                                        <span class="text-secondary">.pdf, .jpg, .png <2MB> </span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th scope="row">11</th>
                                                <td>{{ __("labels.school_purpose_allotment") }}<span style="color: red;">*</span></td>
                                                <td>
                                                    <div class="form-check form-check-inline mt-4">
                                                        <input type="radio" class="form-check-input" id="radio21" name="optradio11" value="option21" checked>{{ __("labels.yes") }}
                                                        <label class="form-check-label" for="radio1"></label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input type="radio" class="form-check-input" id="radio22" name="optradio11" value="option22">{{ __("labels.no") }}
                                                        <label class="form-check-label" for="radio4"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <input type="file" name="upload_doc" class="form-control" accept=".jpg, .png, application/pdf">
                                                    <!--<input class="form-control mt-2 rounded" type="text" placeholder="प्रस्तावित क्षेत्रफल" name="upload_budget" required> -->
                                                    <span class="text-secondary">.pdf, .jpg, .png <2MB> </span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th scope="row">12</th>
                                                <td>{{ __("labels.comment") }}<span style="color: red;">*</span></td>
                                                <td>
                                                    <div class="form-check form-check-inline mt-4">
                                                        <input type="radio" class="form-check-input" id="radio23" name="optradio12" value="option23" checked>{{ __("labels.yes") }}
                                                        <label class="form-check-label" for="radio1"></label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input type="radio" class="form-check-input" id="radio24" name="optradio12" value="option24">{{ __("labels.no") }}
                                                        <label class="form-check-label" for="radio4"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <input type="file" name="upload_doc" class="form-control" accept=".jpg, .png, application/pdf">
                                                    <!--<input class="form-control mt-2 rounded" type="text" placeholder="प्रस्तावित क्षेत्रफल" name="upload_budget" required> -->
                                                    <span class="text-secondary">.pdf, .jpg, .png <2MB> </span>                          
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
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
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection