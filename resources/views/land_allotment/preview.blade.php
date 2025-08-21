@extends('application_layout')

@section('title', __("labels.project_short_name"))
@section('pagetitle', __("labels.dashboard"))

@section('role_name', "Admin")
@section('currentActivePage',5)
@section('content')
    <div class="container ">
        @include('application_layouts.wizard')
        
        <div class="row d-flex justify-content-center align-items-center">
            <div class="col-12 p-4">
                <div class="card card-registration card-registration-2" style="border-radius: 15px;">
                    <div class="card-body">
                        <form action ="" onsubmit="return validateForm()" id="ralamsForm" name="myForm"> 
                            <div class="row mb-3 text-center">
                                <h3>फाइनल सबमिट के बाद आप अपने आवेदन में कोई बदलाव नहीं कर पाएंग।</h3>
                                <h4>इसलिए सबमिट करने से पहले प्रीव्यू चेक कर ल।</h4>
                            </div>
                            <div class="mt-4" style='float:left;'>
                                <button type="submit" class="btn btn-primary d-flex align-items-center gap-2">
                                    <i class="fa fa-angle-double-left" aria-hidden="true"></i>&nbsp;&nbsp;
                                    <span>{{ __("labels.previous") }}</span>
                                </button>
                            </div>
                            <div class="text-end mt-4"  style='float:right;'>
                                <button type="submit" class="btn btn-primary d-flex align-items-center gap-2">
                                    <span>{{ __("labels.submit") }}</span>&nbsp;&nbsp;
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection