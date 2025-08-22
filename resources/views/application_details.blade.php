
@extends('application_layout')
@section('title', __("labels.project_short_name"))
@section('pagetitle', __("labels.dashboard"))
@section('role_name', "Admin")
@section('currentActivePage',1)
@section('content')
<style>     
textarea {
    resize: vertical;
    border-radius: 5px;
    padding: 10px;
    border: 1px solid #ccc;
    font-size: 14px;
}

label {
    font-weight: 600;
    color: #333;
}

.form-section {
    /* background: #f9f9f9; */
    padding: 20px;
    border-radius: 8px;
    margin-bottom: 20px;
    box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
}
    
thead th {
    border: 1px solid #dee2e6 !important;
}

</style>
<div class="container">       
    <div class="row d-flex justify-content-center align-items-center">
        <div class="col-12 p-4">
            <div class="card card-registration card-registration-2" style="border-radius: 15px;">
                <div class="card-body">
                    <h4 class="mb-3 text-center text-primary">{{ __("labels.app_details") }}</h4>
                    <form action="" id="applicationDtlForm" name="applicationDtlForm">
                    <div class="row">                        
                        <div class="col-md-3 mt-4">
                            <div class="d-flex flex-column">
                                <strong>{{ __("labels.app_no") }}:</strong>
                                <span>{{ $details->application->application_number }}</span>
                            </div>
                        </div>                        
                        <div class="col-md-3 mt-4">
                            <div class="d-flex flex-column">
                                <strong>{{ __("labels.app_name") }}:</strong>
                                <span>{{ $details->application->applicant_name ?? 'N/A' }}</span>
                            </div>
                        </div>
                        <div class="col-md-3 mt-4">
                            <div class="d-flex flex-column">
                                <strong>{{ __("labels.app_fa_name") }}:</strong>
                                <span>{{ $details->application->applicant_fname ?? 'N/A' }}</span>
                            </div>
                        </div>
                        <div class="col-md-3 mt-4">
                            <div class="d-flex flex-column">
                                <strong>{{ __("labels.app_address") }}:</strong>
                                <span>{{ $details->application->applicant_add1 ?? 'N/A' }}</span>
                            </div>
                        </div>
                        <div class="col-md-3 mt-4">
                            <div class="d-flex flex-column">
                                <strong>{{ __("labels.purpose") }}:</strong>
                                <span>{{ $details->application->purpose->purpose_name ?? 'N/A'}}</span>
                            </div>
                        </div>
                        <div class="col-md-3 mt-4">
                            <div class="d-flex flex-column">
                                <strong>{{ __("labels.rules") }}:</strong>
                                <span>{{ $details->application->rule->application_rule_name ?? 'N/A'}}</span>
                            </div>
                        </div>
                        @if($details->application->last_forward_to_id !== Auth::user()->id)
                        <div class="col-md-3 mt-4">
                            <div class="d-flex flex-column">
                                <strong>{{ __("labels.last_forwarded_to") }}:</strong>
                                <span>{{ $details->application->lastForwardedTo->user_type?? 'N/A'}}</span>
                            </div>
                        </div>
                        @endif
                        <div class="col-md-3 mt-4">
                            <div class="d-flex flex-column">
                                <strong>{{ __("labels.land_type") }}:</strong>
                                <span>{{ $details->application->landDetail->land_type ?? 'N/A' }}</span>
                            </div>
                        </div>                       
                        <div class="col-md-3 mt-4">
                            <div class="d-flex flex-column">
                                <strong>{{ __("labels.is_land_surr") }}:</strong>
                                <span>{{ ($details->application->landDetail->is_land_surrendered == 'no') ? "No" : "Yes"  }}</span>
                            </div>
                        </div>
                        <div class="col-md-3 mt-4">
                            <div class="d-flex flex-column">
                                <strong>{{ __("labels.village") }}:</strong>
                                <span>{{ $details->application->landDetail->village->Village_Name ?? 'N/A' }}</span>
                            </div>
                        </div>      
                        <div class="col-md-3 mt-4">
                            <div class="d-flex flex-column">
                                <strong>{{ __("labels.land_owner_name") }}:</strong>
                                <span>{{ $details->application->landOwnerDetail[0]->owner_name ?? 'N/A' }}</span>
                            </div>
                        </div>      
                        <div class="col-md-3 mt-4">
                            <div class="d-flex flex-column">
                                <strong>{{ __("labels.owner_address") }}:</strong>
                                <span>{{ $details->application->landOwnerDetail[0]->owner_add1 ?? 'N/A' }}</span>
                            </div>
                        </div>
                        <div class="col-md-3 mt-4">
                            <div class="d-flex flex-column">
                                <strong>{{ __("labels.khasra_no") }}:</strong>
                                <span>{{ $details->application->landOwnerDetail[0]->khasra_number ?? 'N/A' }}</span>
                            </div>
                        </div>
                        <div class="col-md-3 mt-4">
                            <div class="d-flex flex-column">
                                <strong>{{ __("labels.proposed_area") }}:</strong>
                                <span>{{ $details->application->landDetail->proposed_land_area ?? 'N/A' }}</Acr></span>
                            </div>
                        </div>         
                        <div class="col-md-3 mt-4">
                            <div class="d-flex flex-column">
                                <strong>{{ __("labels.state_highway") }}:</strong>
                                <span>{{ $details->application->landDetail->dist_from_SH ?? 'N/A' }}</Acr></span>
                            </div>
                        </div>      
                        <div class="col-md-3 mt-4">
                            <div class="d-flex flex-column">
                                <strong>{{ __("labels.national_highway_distance") }}:</strong>
                                <span>{{ $details->application->landDetail->dist_from_NH ?? 'N/A' }}</Acr></span>
                            </div>
                        </div>      
                        <div class="col-md-3 mt-4">
                            <div class="d-flex flex-column">
                                <strong>{{ __("labels.railway_distance") }}:</strong>
                                <span>{{ $details->application->landDetail->dist_from_RL ?? 'N/A' }}</Acr></span>
                            </div>
                        </div>
                        <div class="col-md-3 mt-4">
                            <div class="d-flex flex-column">
                                <strong>{{ __("labels.distance_from_town_city") }}:</strong>
                                <span>{{ $details->application->landDetail->dist_from_City ?? 'N/A' }}</Acr></span>
                            </div>
                        </div>      
                        <div class="col-md-3 mt-4">
                            <div class="d-flex flex-column">
                                <strong>{{ __("labels.irrigation_land") }}:</strong>
                                <span>{{ ($details->application->landDetail->irrigation_land) ? ucfirst($details->application->landDetail->irrigation_land) : 'N/A' }}</Acr></span>
                            </div>
                        </div>      
                        <div class="col-md-3 mt-4">
                            <div class="d-flex flex-column">
                                <strong>{{ __("labels.irrigation_detail") }}:</strong>
                                <span>{{ $details->application->landDetail->irrigation_detail ?? 'N/A' }}</Acr></span>
                            </div>
                        </div>                              
                        <div class="col-md-3 mt-4">
                            <div class="d-flex flex-column">
                                <strong>{{ __("labels.comment") }}:</strong>
                                <span>{{ ($details->comment) ? $details->comment : 'N/A' }}</Acr></span>
                            </div>
                        </div>                                              
                        <div class="col-md-3 mt-4">
                            <div class="d-flex flex-column">
                                <strong>{{ __("labels.application_receive_date") }}:</strong>
                                <span>{{ date('d F Y', strtotime($details->created_at)) }}</Acr></span>
                            </div>
                        </div>                        
                        <div class="col-md-12 mt-4 table-responsive">
                            <h5>{{ __("labels.application_documents") }} :</h5>
                            <table class="table table-bordered table-hover table-striped">
                                <thead class="table-light">
                                    <tr>
                                        <th style="width: 10%; border: 1px solid #dee2e6;">{{ __("labels.S_no") }}</th>                                                                                                                        
                                        <th style="width: 25%">{{ __("labels.document_type") }}</th>                                                                                                                        
                                        <th style="width: 25%">{{ __("labels.uploaded_by") }}</th>
                                        <th style="width: 25%">{{ __("labels.is_document_uploaded") }}</th>
                                        <th style="width: 25%">{{ __("labels.document_file") }}</th>
                                        <!-- <th style="width: 20%">{{ __("labels.action") }}</th> -->
                                    </tr>
                                </thead>
                                <tbody id="applicant_details">
                                    @php $i = 1; @endphp
                                    @forelse($details->application->applicationDocs as $doc)
                                    <tr id="row_{{$doc->id}}">
                                        <td>{{ $i++ }}</td>
                                        <td>{{ __("labels.".$doc->document_id.'_label') }}</td>                                                                                    
                                        <td>{{ $doc->uploadedBy->name ?? ''}}</td>                                            
                                        <td><input class="form-control" type="checkbox" name='is_document' {{($doc->document_file != '' && Storage::disk('public')->exists($doc->getRawOriginal('document_file'))) ? 'checked':''}} disabled></td>    
                                        <td>
                                            @if($doc->document_file != '' && Storage::disk('public')->exists($doc->getRawOriginal('document_file')))                             
                                            <a href="{{$doc->document_file}}" target="_blank">{{__("labels.view_document")}}</a>                                
                                            @else
                                                <span class="text-muted">{{__("labels.no_doc_available")}}</span>
                                            @endif
                                        </td>                                                                                                                                                                                      
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="4" class="text-center">{{__("labels.records_not_found")}}</td>
                                    </tr>
                                    @endforelse                                
                                </tbody>
                            </table>                            
                        </div>    
                        <div class="col-md-12 table-responsive">
                            <h5>{{ __("labels.application_transactions") }} : </h5>
                            <table class="table table-bordered table-hover table-striped">
                                <thead class="table-light">
                                    <tr>
                                        <th style="width: 10%; border: 1px solid #dee2e6;">{{ __("labels.S_no") }}</th>                                                                                                                        
                                        <th style="width: 20%">{{ __("labels.application_date") }}</th>                                                                                                                        
                                        <!-- <th style="width: 25%">{{ __("labels.comment") }}</th>                                         -->
                                        <th style="width: 10%">{{ __("labels.from") }}</th>                                        
                                        <th style="width: 10%">{{ __("labels.to") }}</th>                 
                                        <th style="width: 30%">{{ __("labels.attachment") }}</th>                                                                                           
                                    </tr>
                                </thead>
                                <tbody id="applicant_details">
                                    @php $i = 1; @endphp
                                    @forelse($details->application->applicationTransactions as $transaction)
                                    <tr>
                                        <td>{{ $i++ }}</td>
                                        <td>{{ date('Y-m-d',strtotime($transaction->created_at)) }}</td>                                          
                                        <td>{{ $transaction->comment ?? 'N/A' }}</td>                                        
                                        <td>{{ ($transaction->fromuser->user_type == 'user') ? $transaction->fromuser->name : (($transaction->fromuser->user_type == Auth::user()->user_type) ? 'Self' : $transaction->fromuser->user_type) }}</td>
                                        <!-- <td>{{ ($transaction->touser->user_type == Auth::user()->user_type) ? 'Self' : $transaction->touser->user_type }}</td> -->
                                         <td>{{ ($transaction->touser->user_type == 'user') ? $transaction->touser->name : (($transaction->touser->user_type == Auth::user()->user_type) ? 'Self' : $transaction->touser->user_type) }}</td>
                                        <td>                                            
                                            @if(!empty($transaction->forward_file) && Storage::disk('public')->exists($transaction->getRawOriginal('forward_file')))                             
                                                <a href="{{$transaction->forward_file}}" target="_blank"><i class="fas fa-file-pdf text-danger me-1"></i>{{__("labels.view_document")}}</a>                                
                                            @else
                                                <span class="text-muted">{{__("labels.no_doc_available")}}</span>
                                            @endif                                            
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="4" class="text-center">{{__("labels.records_not_found")}}</td>
                                    </tr>
                                    @endforelse                                
                                </tbody>
                            </table>                            
                        </div>                    
                        @if($details->status == 'pending')      
                        <div class="col-md-3 mt-4">
                            <div class="d-flex flex-column">
                                <strong>{{ __("labels.comment") }}:</strong>
                                <textarea name="comment" id="comment" rows="10" cols="500"></textarea>
                                <span id="commentError" style="color: red;"></span>
                            </div>
                        </div>    
                        <div class="col-md-3 mt-4">
                            <div class="d-flex flex-column">                                
                                <label for="attachment"><strong>{{ __("labels.attachment") }}:</strong></label>
                                <input type="file" name='attachment' id="attachment">
                                <span id="fileError" style="color: red;"></span>
                            </div>
                        </div>
                        <div class="col-md-3 mt-4">
                            <div class="d-flex flex-column">                                
                                <label for="forward_to_role"><strong>{{ __("labels.forward_to_role") }}:</strong></label>
                                <select class="form-control" name="forward_to_role" id="forward_to_role">
                                    <option value="">Select Role</option>
                                    @if(count($roles) > 0)
                                    @foreach($roles as $role)
                                    <option value="{{$role->forward_to}}">{{ strtoupper($role->forward_to) }}</option>
                                    @endforeach
                                    @endif
                                </select>
                                <span id="forwardtoRoleError" style="color: red;"></span>
                            </div>
                        </div>
                        <div class="col-md-3 mt-4">
                            <div class="d-flex flex-column" id="forwardTo_Div" style="display:none !important;">                                
                               
                            </div>
                        </div>                                            
                        @endif
                    </div>                      
                    
                    @if($details->status == 'pending')                            
                    <div class="row"> 
                        
                        <div class="col-md-3 mt-5">
                            <div class="d-flex flex-column">
                                <button type="button" data-status="next" class="btn btn-primary gap-2 application_status">                                    
                                    <span>आगे भेजे</span>
                                </button>                                
                            </div>
                        </div>
                        
                       {{-- @if(Auth::user()->user_type != 'DM')
                        <div class="col-md-3 mt-5">
                            <div class="d-flex flex-column">
                                <button type="button" data-status="back" class="btn btn-primary gap-2 application_status">                                    
                                    <span>वापस भेजे</span>
                                </button>                                
                            </div>
                        </div>
                        @endif --}}
                        {{--@if(Auth::user()->user_type == 'Patwari')
                        <div class="col-md-3 mt-5">
                            <div class="d-flex flex-column">
                                <button type="button" data-status="preview" class="btn btn-primary gap-2 application_status">                                    
                                    <span>Preview</span>
                                </button>                                
                            </div>
                        </div>
                        @endif--}}
                        @if($details->application->allot_auth == Auth::user()->user_type)
                        <div class="col-md-3 mt-5">
                            <div class="d-flex flex-column">                               
                                <button type="button" data-status="rejected" class="btn btn-primary gap-2 application_status">                                    
                                    <span>रद्द करें</span>
                                </button>
                            </div>
                        </div>
                        <div class="col-md-3 mt-5">
                            <div class="d-flex flex-column">                               
                                <button type="button" data-status="completed" class="btn btn-primary gap-2 application_status">                                    
                                    <span>सहेजें</span>
                                </button>
                            </div>
                        </div>
                        @endif
                    </div>    
                    @endif    
                    </form>            
                </div>
            </div>
        </div>
        
    </div>
</div>
<script>
    var isValid = true;
    $('#attachment').on('change', function () {
        var file = this.files[0];
        var allowedTypes = ['application/pdf'];
        var maxSize = 2 * 1024 * 1024; 
        $('#fileError').text('');          
        isValid = true;
        if (file) {
            if (!allowedTypes.includes(file.type)) {
                isValid = false;
                $('#fileError').text('Invalid file type. Only PDF allowed.');
                this.value = ''; 
            } else if (file.size > maxSize) {
                isValid = false;
                $('#fileError').text('File size exceeds 2MB.');
                this.value = '';
            }
        }
    });

    $('.application_status').on('click',function(e){             
        var status  = $(this).attr('data-status');        
        var comment  = $('#comment').val();        
        var applicationId = "{{$details->application->id}}";        
        var forward_to_role  = $('#forward_to_role').val();           
        var forwared_to  = $('#forwared_to').val();           
        const form = $('#applicationDtlForm')[0];        
        const formData = new FormData(form);             
        formData.append('status',status);
        formData.append('application_id',applicationId);       
        formData.append('_token',"{{ csrf_token() }}");  
        $('#forwardtoRoleError').text('');          
        e.preventDefault();           
        isValid = true;
        if(status == 'next' && forward_to_role == ''){
            isValid = false;
            $('#forwardtoRoleError').text('Please select any role');
        }   
        if(status == 'next' && forwared_to == ''){
            isValid = false;
            $('#forwardToError').text('Please select forward to user');
        }
              
        if(status == 'next' && comment == ''){
            isValid = false;
            $('#commentError').text('Please enter comment');
        }      
        
        if (!applicationId || !status) {
            console.error('Missing application ID or status.');
            return;
        }            
        
        if(isValid){
            $.ajax({
                url: "{{ route('update.applicationSatatus') }}",
                type: "POST",
                data: formData,
                processData: false, 
                contentType: false,
                success: function(response) {
                    if(response.status){
                        toastr.success(response.message, 'Success', {
                            timeOut: 100000,
                            closeButton: true,
                            progressBar: true 
                        });
                        window.location.href= "{{route('home')}}";
                    }
                    console.log('Update successful:', response);                
                },
                error: function(xhr) {
                    if (xhr.status === 422) {
                        var errors = xhr.responseJSON.errors;
                        $('#fileError').text(errors.attachment ? errors.attachment[0] : '');
                        $('#forwardtoRoleError').text(errors.forward_to_role ? errors.forward_to_role[0] : '');
                        $('#forwardToError').text(errors.forward_to ? errors.forward_to[0] : '');
                    }else{
                        toastr.error(response.error, 'Error', {
                            timeOut: 50000, 
                            closeButton: true,
                            progressBar: true
                        });
                    }                    
                }
            });
        }        
    });

    $('#forward_to_role').on('change', function() {
        const role = $(this).val();        
        let location_type ='';
        let location_id ='';
        let parent_role='';
        let auth_user_type = "{{Auth::user()->user_type}}";         
        
        switch (role) {
            case 'DM':
                location_type = "district_id";
                location_id = "{{$details->application->applicant_district}}";                
                break;
            case 'IRA':
                location_type = "district_id";
                location_id = "{{$details->application->applicant_district}}";                
                break;    
            case 'Patwari':
                location_type = "village_id";
                location_id = "{{$details->application->landDetail->village_code}}";
                break;  
            case 'DA':
                // Use auth_user_type logic inside this case
                if (auth_user_type === 'DM' || auth_user_type === 'IRA') {
                    location_type = "district_id";
                    location_id = "{{ Auth::user()->district_id }}";
                    // parent_role = auth_user_type;
                    parent_role = 'DM';
                } else if (auth_user_type === 'SDO' || auth_user_type === 'TDR') {
                    location_type = "block";
                    location_id = "{{ Auth::user()->block }}";
                    parent_role = auth_user_type;
                } else {
                    location_type = "";
                    location_id = "";
                }
            break;          
            default:                
                location_type = "block";
                location_id = "{{$details->application->applicant_tehsil}}";
        }

        $.ajax({
            url: "{{ route('getRolewiseUser') }}",
            type: "POST",
            data: { _token: '{{csrf_token()}}',role: role,parent_role:parent_role,location_type: location_type,location_id: location_id },
            success: function(response) {                                
                $('#forwardTo_Div').show();
                let html = "";                
                html += '<label for="forward_to"><strong>{{ __("labels.forward_to") }}:</strong></label><select class="form-control" name="forward_to" id="forward_to"><option value="">Please Select</option>';
                $.each(response.users, function(index, user) {
                    let name = user.name.charAt(0).toUpperCase() + user.name.slice(1);
                    html += '<option value="'+user.id+'" selected>'+name+'</option>';
                });
                html += '</select><span id="forwardToError" style="color: red;"></span>';
                $('#forwardTo_Div').html(html);
            },
            error: function(xhr) {
                console.error('AJAX Error:', xhr);
            }
        });
    });

</script>
<script>
    document.querySelectorAll('input[name="org_reg"]').forEach((elem) => {
        elem.addEventListener("change", function() {
        document.getElementById('orgRegDetails').style.display = (this.value === "yes") ? 'block' : 'none';
        });
    });

    document.querySelectorAll('input[name="org_exp"]').forEach((elem) => {
        elem.addEventListener("change", function() {
        document.getElementById('orgExpDetails').style.display = (this.value === "yes") ? 'block' : 'none';
        });
    });

    document.querySelectorAll('input[name="inst_allot_land"]').forEach((elem) => {
        elem.addEventListener("change", function() {
        document.getElementById('instAllotLandDetails').style.display = (this.value === "yes") ? 'block' : 'none';
        });
    });

    document.querySelectorAll('input[name="encroach_land"]').forEach((elem) => {
        elem.addEventListener("change", function() {
        document.getElementById('encroachLandDetails').style.display = (this.value === "yes") ? 'block' : 'none';
        });
    });

    document.querySelectorAll('input[name="grazing_land"]').forEach((elem) => {
        elem.addEventListener("change", function() {
        document.getElementById('grazingLandDetails').style.display = (this.value === "yes") ? 'block' : 'none';
        });
    });

    document.querySelectorAll('input[name="panchayat_opinion"]').forEach((elem) => {
        elem.addEventListener("change", function() {
        document.getElementById('panchayatOpinionDetails').style.display = (this.value === "yes") ? 'block' : 'none';
        });
    });

    document.querySelectorAll('input[name="urban_periphery"]').forEach((elem) => {
        elem.addEventListener("change", function() {
        document.getElementById('urbanPeripheryDetails').style.display = (this.value === "yes") ? 'block' : 'none';
        });
    });

    document.querySelectorAll('input[name="master_plan"]').forEach((elem) => {
        elem.addEventListener("change", function() {
        document.getElementById('masterPlanDetails').style.display = (this.value === "yes") ? 'block' : 'none';
        });
    });

    document.querySelectorAll('input[name="change_master_plan"]').forEach((elem) => {
        elem.addEventListener("change", function() {
        document.getElementById('changeMasterPlanDetails').style.display = (this.value === "no") ? 'block' : 'none';
        });
    });

</script>
@endsection
