
<?php $__env->startSection('title', __("labels.project_short_name")); ?>
<?php $__env->startSection('pagetitle', __("labels.dashboard")); ?>
<?php $__env->startSection('role_name', "Admin"); ?>

<style>
body {
    background: #f5f8fa;
}

.custom-navbar {
    background: linear-gradient(90deg, #0a2943 60%, #2366b3 100%);
}

.sidebar {
    min-width: 80px;
    background: #181d27;
}

.sidebar .nav-link {
    text-align: center;
    color: #b0c4de !important;
    transition: background 0.2s, color 0.2s;
    border-radius: 8px;
}

.sidebar .nav-link.active,
.sidebar .nav-link:hover {
    background: #2366b3;
    color: #fff !important;
}

.sidebar-label {
    font-size: 0.75rem;
    display: block;
    margin-top: 2px;
    color: #adb5bd;
}

.main-content-area {
    background: #fff;
    border-radius: 16px;
    min-height: 90vh;
}

.notes-history-card {
    background: #c9e8c3 !important;
    border: none;
    border-radius: 12px;
}

.notes-history {
    min-height:500px; 
    max-height:420px;
    overflow-y: auto;
    font-size: 0.96rem;
    padding-right: 8px;
    background-color: #c9e8c3;
    border-radius: 12px;
}

.notes-history blockquote {
    border-left: 4px solid #b7b7b7;
    margin: 0 0 1rem 0;
    padding: 0.5rem 1rem;
    color: #444;
    background: #f5f5f5;
    font-style: italic;
}

.note-editor-card {
    background: #f8eab2 !important;
    border: none;
    border-radius: 12px;
}

.button {
    background-color: #006699;
}

.custom-btn {
    background-color: #006699;
    border: 1.5px solid #006699;
    color: #fff;
    transition: background-color 0.3s, border-color 0.3s, color 0.3s;
}

.custom-btn:hover,
.custom-btn:focus,
.custom-btn:active,
.custom-btn.active {
    background-color: #006699 !important;
    border-color: #006699 !important;
    color: #fff !important;
    box-shadow: none;
}

.ck-editor__editable_inline {
    min-height: 150px;
    max-height: 150px;
    overflow-y: auto;
}

.notes-history table {
    border-collapse: collapse;
    width: 100%;
    margin-bottom: 1rem;
}

.notes-history th,
.notes-history td {
    border: 1px solid #dee2e6;
    padding: 0.5rem;
    vertical-align: top;
}

.bg-container-section {
    background-color: #F5F7FA;
    padding: 1.5rem;
    border-radius: 12px;
}

.proposal-info-bar {
    background: #F5F7FA;
    border-radius: 12px;
    padding: .8rem 1.2rem;
    margin-bottom: 1.5rem;
    display: flex;
    flex-wrap: wrap;
    align-items: center;
    /* gap: 18px; */
}

.prop-badge {
    display: flex;
    align-items: center;
    font-size: 1.04rem;
    padding: 0.35em 1.1em;
    border-radius: 20px;
    font-weight: 500;
    background: #f9fafe;
    color: #1e5d83;
    box-shadow: 0 0.5px 3.5px rgba(50, 60, 85, 0.06);
}

.prop-grey {
    background: #f9fafe;
}

.prop-badge i {
    margin-right: 8px;
    font-size: 1.2rem;
}

.center-black-heading {
    text-align: center !important;
    color: #1e5d83 !important;
}

.file-upload-box {
    border: 2px dashed #adb5bb;
    background-color: white;
    border-radius: 0.375rem;
    padding: 1rem;
    text-align: center;
    position: relative;
}

.btn.custom-btn {
    background: #006699;
    border: 1.5px solid #006699;
    color: #fff;
    min-width: 120px;
    margin-left: 8px;
    margin-right: 8px;
    white-space: nowrap;
    display: flex;            
    align-items: center;      
    justify-content: center;  
    margin-bottom: 20px;
}

.custom-warning-btn {
    min-width: 120px;
    margin-left: 8px;
    margin-right: 8px;
    margin-bottom: 20px;
}

.btn-warning {
    min-width: 120px;
    margin-left: 8px;
    margin-right: 8px;
}

.custom-dropdown {
    border-radius: 8px;
    border: 1.5px solid #e2d6ac;
    min-height: 38px;
    font-size: 1.08rem;
    box-shadow: none;
    background: #fff;
    padding-left: 14px;
    padding-right: 32px;
    width: 100%;
    max-width: 100%;
    transition: border 0.2s;
}

.notes-history p {
    margin: 0;
    margin-bottom: 0rem;
}

@media (max-width: 768px) {
    .row.justify-content-between > div {
        margin-bottom: 8px;
    }
}

@media (max-width: 991px) {
    .main-layout {
        padding: 0;
    }
    .sidebar {
        min-width: 60px;
    }
}

@media (max-width: 767px) {
    .main-content-area {
        border-radius: 6px;
        padding: 10px;
    }
    .notes-history,
    .notes-history-card,
    .note-editor-card {
        border-radius: 6px !important;
    }
    .custom-navbar {
        border-radius: 0 0 10px 10px;
    }
}
</style>

<?php $__env->startSection('content'); ?>
<div class="container-fluid main-layout py-4 px-1 px-md-3">
    <div class="bg-container-section rounded-3 mb-0">
                
        <!-- <a href="<?php echo e(route('application.details',[$details->status,base64_encode($details->id)])); ?>" class="btn btn-primary custom-btn flex-fill" data-action="back" type="button">Back</a>         -->
        <div class="row g-3">
            <div class="col-md-4 col-sm-6 col-12">
                <div class="prop-badge prop-grey d-flex align-items-center border h-100">
                    <i class="fa fa-file me-2"></i>
                    <span><?php echo e(__("labels.app_no")); ?>: <span class="fw-semibold text-break"><?php echo e($details->application->application_number); ?></span></span>
                </div>
            </div>

            <div class="col-md-4 col-sm-6 col-12">
                <div class="prop-badge prop-grey d-flex align-items-center border h-100">
                    <i class="fa fa-user mr-2"></i>
                    <span><?php echo e(__("labels.applicant_name")); ?>: <span class="fw-semibold text-break"><?php echo e($details->application->applicant_name ?? 'N/A'); ?></span></span>
                </div>
            </div>

            <div class="col-md-4 col-sm-6 col-12">
                <div class="prop-badge prop-grey d-flex align-items-center border h-100">
                    <i class="fa fa-calendar mr-2" aria-hidden="true"></i>
                    <span><?php echo e(__("labels.application_receive_date")); ?>: <span class="fw-semibold"><?php echo e(date('d F Y', strtotime($details->application->created_at))); ?></span></span>
                </div>
            </div>
        </div>

        <div class="row g-3 mt-1">
            <div class="col-md-4 col-sm-6 col-12">
                <div class="prop-badge prop-grey d-flex align-items-center border h-100">
                    <i class="fa fa-map-marker mr-2"></i>
                    <span><?php echo e(__("labels.land_type")); ?>: <span class="fw-semibold text-break"><?php echo e($details->application->landDetail->land_type ?? 'N/A'); ?></span></span>
                </div>
            </div>
           
            <div class="col-md-8 col-sm-6 col-12">
                <div class="prop-badge prop-grey d-flex align-items-center border h-100">
                    <i class="fa fa-gavel me-2"></i>
                    <span><?php echo e(__("labels.rules")); ?>:
                        <span class="fw-semibold text-break"><?php echo e($details->application->rule->application_rule_name ?? 'N/A'); ?></span>
                    </span>
                </div>
            </div>
        </div>

        <div class="row g-3 mt-1">
             <div class="col-md-4 col-sm-12 col-12">
                <div class="prop-badge prop-grey d-flex align-items-center border h-100">
                    <i class="fa fa-thumbtack mr-2"></i>
                    <span><?php echo e(__("labels.purpose")); ?>: <span class="fw-semibold text-break"><?php echo e($details->application->purpose->purpose_name ?? 'N/A'); ?></span></span>
                </div>
            </div>

        </div>        

    </div>



<h4 class="mb-2 mt-3 center-black-heading">Comment</h4>

<div class="bg-container-section rounded-3 mb-0">
    
    <!-- <div class="d-flex justify-content-end gap-1">
        <button class="btn btn-primary custom-btn mr-3">View Proposal</button>
        <button class="btn btn-primary custom-btn">View Documents</button>
    </div> -->
    <form action="" id="applicationDtlForm" name="applicationDtlForm">
        <div class="row g-3">
                        
            <div class="col-lg-5">
                <div class="card shadow-sm notes-history-card h-100">
                    <div class="card-header bg-gradient d-flex justify-content-between align-items-center px-3 py-2">
                        <span class="fw-bold">Comment History</span>
                        <!-- <button class="btn btn-sm btn-secondary" style="min-width:70px;" onclick="expandNotes()">Expand</button> -->
                    </div>
                    <div class="card-body notes-history d-flex flex-column justify-content-start" id="notesHistory">                        
                        <!-- <?php $__empty_1 = true; $__currentLoopData = $details->application->applicationTransactions->slice(1); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $transaction): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <div>
                            <div><?php echo $transaction->comment ?? 'No comments'; ?></div>
                            <div>
                                <strong>Comment By:</strong> <?php echo e($transaction->fromuser->name); ?> &nbsp; (<strong>Designation</strong>: <?php echo e($transaction->fromuser->user_type); ?>)
                                <br>
                                <strong>Comment On:</strong> <?php echo e(date('d-m-Y h:i:s', strtotime($transaction->created_at))); ?>

                                <hr>                                    
                            </div>
                        </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <div class="text-center text-secondary">No comments found.</div>
                        <?php endif; ?>                     -->
                                                
                        <?php $__empty_1 = true; $__currentLoopData = $details->application->applicationTransactions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $transaction): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <div>
                                
                                
                                <div class="d-flex justify-content-between">
                                    <span><strong>Comment By:</strong> <?php echo e($transaction->fromuser->name); ?> (<?php echo e(ucfirst($transaction->fromuser->user_type)); ?>)</span>
                                    <!-- <span><strong>Designation:</strong> <?php echo e($transaction->fromuser->user_type); ?></span> -->
                                </div>

                                
                                <div class="d-flex justify-content-between mt-1">
                                    <!-- <?php echo $transaction->comment ?? 'No comment by user'; ?> -->
                                    <?php echo $transaction->comment ?? 'No comment by ' . e($transaction->fromuser->name); ?>


                                    <?php if(!empty($transaction->forward_file) && Storage::disk('public')->exists($transaction->getRawOriginal('forward_file'))): ?>                             
                                        <a class="text-decoration-none text-primary" href="<?php echo e($transaction->forward_file); ?>" target="_blank">
                                        <i class="fa fa-download"
                                            style="color:#2680c0; font-size: 19px; cursor:pointer;"></i></a>
                                    <?php endif; ?>
                                
                                </div>

                                
                                <div class="d-flex justify-content-between mt-1">
                                    <span><strong>Date & Time:</strong> <?php echo e(date('d-m-Y h:i:s', strtotime($transaction->created_at))); ?></span>
                                    <!-- <span><strong>Date:</strong> <?php echo e(date('d F Y', strtotime($transaction->created_at))); ?></span> -->
                                </div>
                                <hr>

                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <div class="text-center text-secondary">No comments found.</div>
                        <?php endif; ?>                            
                    </div>
                </div>
            </div>

            
            <div class="col-lg-7">
                <div class="card shadow-sm note-editor-card h-100">
                    <div class="card-body pb-2">
                        <h6 class="mb-3 fw-semibold">Add Note</h6>
                        
                        <div class="mb-3">
                            <textarea name="comment" id="comment" class="form-control" rows="6" style="margin-bottom: 1rem;" placeholder="Write your note here..."></textarea>
                            <span id="commentError" style="color: red;"></span>
                            <!-- <textarea id="noteInput" class="form-control" rows="6" style="margin-bottom: 1rem;">Write your note here...</textarea> -->
                        </div>
                        
                        <div class="mb-3 file-upload-box position-relative">
                            <input type="file" name='attachment' id="attachment" class="form-control position-absolute top-0 start-0 w-100 h-100" accept=".pdf,.jpg,.jpeg,.png" style="opacity: 0; cursor: pointer; z-index: 2;" onchange="showFileName(event)" tabindex="0">
                            <div class="border rounded-2 p-4 bg-light text-center" style="border: 2px dashed #006699; z-index:1; pointer-events: none;">
                                <i class="fa fa-upload" aria-hidden="true"></i>
                                <span id="fileError" class="fw-medium d-block mt-2">Only PDF files allowed. Maximum file size is 2 MB.</span>
                            </div>
                        </div>

                        
                        <!-- <?php if($action=='forward'): ?>
                        <div class="mb-3">
                            <select class="form-select custom-dropdown" name="forward_to_role" id="forward_to_role">
                                <option value="" selected>-- Select Role --</option>
                                <?php if(count($roles) > 0): ?>
                                    <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($role->forward_to); ?>"><?php echo e(strtoupper($role->forward_to)); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endif; ?>
                            </select>
                            <span id="forwardtoRoleError" class="fw-medium d-block mt-2" style="color: red;"></span>
                        </div>
                        
                        <div class="mb-3" id="forwardTo_Div" style="display:none !important;">                            
                        </div>
                        <?php endif; ?> -->

                        <?php if($action=='forward'): ?>
                            <div class="mb-3">
                                <div class="row g-2">
                                    <div class="col-md-6 col-12">
                                        <select class="form-select custom-dropdown" name="forward_to_role" id="forward_to_role">
                                            <option value="" selected>-- Select Recipient --</option>
                                            <?php if(count($roles) > 0): ?>
                                            <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($role->forward_to); ?>"><?php echo e(strtoupper($role->forward_to)); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <?php endif; ?>
                                            <?php if($details->application->allot_auth == Auth::user()->user_type): ?>
                                            <option value="user">Applicant</option>
                                            <?php endif; ?>
                                        </select>
                                        <span id="forwardtoRoleError" class="fw-medium d-block mt-2" style="color: red;"></span>
                                    </div>
                                    <div class="col-md-6 col-12" id="forwardTo_Div" style="display:none !important;">
                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>

                        <?php if($details->status == 'pending'): ?>
                        <div class="row justify-content-between" id="btn_div">
                            <!-- <div class="col-md-3 col-12 mb-2 mb-md-0 d-flex justify-content-md-start justify-content-center">
                                <button class="btn btn-warning custom-warning-btn flex-fill application_status" data-status="next" type="button">Save as Draft</button>
                            </div> -->
                            <div class="col-md-3 col-6 mb-2 mb-md-0 d-flex">
                                <button class="btn btn-primary custom-btn flex-fill application_status" data-action="<?php echo e($action); ?>" type="button" disabled>Esign & Submit</button>
                            </div>
                            <div class="col-md-3 col-6 mb-2 mb-md-0 d-flex justify-content-md-end justify-content-center">
                                <button class="btn btn-primary custom-btn flex-fill application_status" data-action="<?php echo e($action); ?>" type="button">Esign & Submit</button>
                            </div>
                            <div class="col-md-3 col-6 mb-2 mb-md-0 d-flex justify-content-md-end justify-content-center">
                                <a href="<?php echo e(route('application.details',[$details->status,base64_encode($details->id)])); ?>" class="btn btn-primary custom-btn flex-fill" data-action="back" type="button">Back</a>
                            </div>
                            
                        </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>

</div>
<script>
    
    $('#forward_to_role').on('change', function() {
        const role = $(this).val();        
        let location_type ='';
        let location_id ='';
        let parent_role='';
        let auth_user_type = "<?php echo e(Auth::user()->user_type); ?>";      
        let user_id = "<?php echo e($details->application->user_id); ?>";   
        $("#ajax-loader").show();
        switch (role) {
            case 'DM':
                location_type = "district_id";
                location_id = "<?php echo e($details->application->applicant_district); ?>";                
                break;
            case 'Patwari':
                location_type = "village_id";
                location_id = "<?php echo e($details->application->landDetail->village_code); ?>";
                break;
            case 'user':
                location_type = "";
                location_id = "";
                break;  
            case 'DA':
                // Use auth_user_type logic inside this case
                if (auth_user_type === 'DM') {
                    location_type = "district_id";
                    location_id = "<?php echo e(Auth::user()->district_id); ?>";
                    parent_role = auth_user_type;
                } else if (auth_user_type === 'SDO' || auth_user_type === 'TDR') {
                    location_type = "block";
                    location_id = "<?php echo e(Auth::user()->block); ?>";
                    parent_role = auth_user_type;
                } else {
                    location_type = "";
                    location_id = "";
                }
            break;          
            default:                
                location_type = "block";
                location_id = "<?php echo e($details->application->applicant_tehsil); ?>";
        }

        $.ajax({
            url: "<?php echo e(route('getRolewiseUser')); ?>",
            type: "POST",
            data: { _token: '<?php echo e(csrf_token()); ?>',role: role,parent_role:parent_role,location_type: location_type,location_id: location_id,user_id: user_id },
            success: function(response) {                                
                $('#forwardTo_Div').show();
                let html = "";                
                html += '<select class="form-select custom-dropdown" name="forward_to" id="forward_to"><option value="">Please Select</option>';
                $.each(response.users, function(index, user) {                                        
                    let name = user.name.charAt(0).toUpperCase() + user.name.slice(1);
                    html += '<option value="'+user.id+'" selected>'+name+'</option>';
                });
                html += '</select><span id="forwardToError" style="color: red;"></span>';
                $('#forwardTo_Div').html(html);
                $("#ajax-loader").hide();
            },
            error: function(xhr) {
                console.error('AJAX Error:', xhr);
                $("#ajax-loader").show();
            }
        });
    });

    $('.application_status').on('click',function(e){           
        var action  = $(this).attr('data-action');
        var applicationId = "<?php echo e($details->application->id); ?>";   
        var transactionId = "<?php echo e($details->id); ?>";   
        var forward_to_role = '';
        var forwared_to = '';
        if(action == 'forward'){
            forward_to_role = $('#forward_to_role').val();           
            forwared_to  = $('#forwared_to').val();           
        }     
        
        const form = $('#applicationDtlForm')[0];        
        const formData = new FormData(form);             
        var comment = window.editorInstance.getData();
        formData.append('comment', comment);
        formData.append('action',action);
        formData.append('application_id',applicationId);       
        formData.append('transaction_id',transactionId);       
        formData.append('_token',"<?php echo e(csrf_token()); ?>");  
        $('#forwardtoRoleError').text('');          
        e.preventDefault();            
        isValid = true;
        if(action == 'forward' && forward_to_role == ''){
            isValid = false;            
            $('#forwardtoRoleError').text('Please select any role');
        }   
        if(action == 'forward' && forwared_to == ''){
            isValid = false;
            $('#forwardToError').text('Please select forward to user');
        }      
        
        if(comment == ''){
            isValid = false;
            $('#commentError').text('Please enter comment');
        }

        if (!applicationId || !action) {
            console.error('Missing application ID or action.');
            return;
        }                    
        if(isValid){
            $.ajax({
                url: "<?php echo e(route('change.applicationSatatus')); ?>",
                type: "POST",
                data: formData,
                processData: false, 
                contentType: false,
                success: function(response) {
                    if(response.status){
                        console.log('response',response);                                                                                              
                       
                        toastr.success(response.message, 'Success', {
                            timeOut: 100000,
                            closeButton: true,
                            progressBar: true 
                        });
                        window.location.href= "<?php echo e(route('user.dashboard')); ?>";
                        // $('#btn_div').hide();
                    }
                    console.log('Update successful:', response);                
                },
                error: function(xhr) {
                    if (xhr.status === 422) {
                        var errors = xhr.responseJSON.errors;
                        $('#fileError').text(errors.attachment ? errors.attachment[0] : '');
                        $('#forwardtoRoleError').text(errors.forward_to_role ? errors.forward_to_role[0] : '');
                        $('#forwardToError').text(errors.forward_to ? errors.forward_to[0] : '');
                        $('#commentError').text(errors.comment ? errors.comment[0] : '');
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
</script>
<?php $__env->stopSection(); ?>
    <!-- Include the CKEditor JS file -->    

    <script>
    document.addEventListener('DOMContentLoaded', function() {
        // CKEditor instance global variable
        window.editorInstance;

        ClassicEditor
            .create(document.querySelector('#comment'), {
                toolbar: [
                    'heading', '|',
                    'bold', 'italic', 'underline',
                    'undo', 'redo'
                ]
            })
            .then(editor => {
                window.editorInstance = editor;
            })
            .catch(error => {
                console.error(error);
            });
    });

    // Allowed MIME types and max size (2 MB)
    const allowedTypes = [
        'application/pdf'
    ];
    const maxSize = 2 * 1024 * 1024; // 2MB in bytes

    // File input onchange handler for validation & message update
    function showFileName(event) {
        const input = event.target;
        const file = input.files[0];
        const fileMsg = document.getElementById('fileError');

        if (!file) {
            fileMsg.textContent = "No file selected.";
            fileMsg.style.color = "black";
            return;
        }

        // File type validation
        if (!allowedTypes.includes(file.type)) {
            fileMsg.textContent = "Error: Only PDF files are allowed.";
            fileMsg.style.color = "red";
            input.value = "";
            return;
        }

        // File size validation
        if (file.size > maxSize) {
            fileMsg.textContent = "Error: File size exceeds 2 MB.";
            fileMsg.style.color = "red";
            input.value = "";
            return;
        }

        // Success message with file name
        fileMsg.textContent = `File uploaded successfully: ${file.name}`;
        fileMsg.style.color = "green";
    }

    // Save Note: Get note content, recipient, file name and save all in Note History
    function saveNote() {
        if (!window.editorInstance) {
            alert("Editor not initialized yet.");
            return;
        }

        const noteContent = window.editorInstance.getData().trim();
        if (noteContent === "") {
            alert("Note is empty!");
            return;
        }

        const notesHistory = document.getElementById('notesHistory');
        const now = new Date();
        const formattedDate = now.toLocaleDateString() + ' ' + now.toLocaleTimeString();

        // Get Recipient Dropdown and selected text
        const recipientDropdown = document.getElementById('forward_to_role');
        let recipientText = "-- Not selected --";
        if (recipientDropdown && recipientDropdown.value) {
            const selectedOption = recipientDropdown.options[recipientDropdown.selectedIndex];
            if (selectedOption && !selectedOption.disabled) {
                recipientText = selectedOption.text;
            }
        }

        // Get uploaded file name or default text
        const fileInput = document.querySelector('.file-upload-box input[type="file"]');
        let fileName = "No file uploaded";
        if (fileInput && fileInput.files && fileInput.files.length > 0) {
            fileName = fileInput.files[0].name;
        }

        // Create a new note div combining all 3 info
        const newNoteDiv = document.createElement('div');
        newNoteDiv.className = 'mb-3 border rounded p-3 bg-light';
        newNoteDiv.innerHTML = `
            <div class="mb-2"><strong>Note:</strong><br>${noteContent}</div>
            <div class="mb-1"><strong>Recipient:</strong> ${recipientText}</div>
            <div class="mb-1"><strong>File:</strong> ${fileName}</div>
            <div class="small text-muted">By You | ${formattedDate}</div>
        `;
        notesHistory.appendChild(newNoteDiv);

        // Clear inputs after save
        window.editorInstance.setData('');
        if (fileInput) fileInput.value = "";
        const fileMsg = document.getElementById('fileMsg');
        if (fileMsg) {
            fileMsg.textContent = "Only PDF, JPG, JPEG, PNG files allowed. Maximum file size is 2 MB.";
            fileMsg.style.color = "black";
        }
        if (recipientDropdown) recipientDropdown.selectedIndex = 0;

        // Scroll to latest note
        notesHistory.scrollTop = notesHistory.scrollHeight;

        alert("Note saved and added to history!");
    }

    // Expand Note History (remove max-height limit)
    function expandNotes() {
        const notesHistory = document.getElementById('notesHistory');
        notesHistory.style.maxHeight = 'none';
    }    

    </script>
<?php echo $__env->make('layouts.front_layout', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xamppp\htdocs\RALAMS_New_Updated_Code\resources\views/page.blade.php ENDPATH**/ ?>