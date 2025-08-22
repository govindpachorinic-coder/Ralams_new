
<style>
    .select2 {
        width: 100% !important;
    }
</style>
<?php $__env->startSection('content'); ?>
    <div class="row justify-content-center">
        <?php if(session('success')): ?>
            <div class="alert alert-success">
                <?php echo e(session('success')); ?>

            </div>
        <?php endif; ?>
        <div class="col-md-12 col-sm-9 col-md-7 col-lg-10 text-center p-0 mt-3 mb-2">
            <div class="border border-secondary px-5" style="border-radius: 15px;">
                <div class="px-0 pt-4 pb-0 mt-0 mb-3">
                    <ul id="progressbar">
                        <li class="active" id="step1">
                            <strong>आवेदक विवरण</strong>
                        </li>
                        <li id="step2"><strong><?php echo e(__('labels.land_selection')); ?></strong></li>
                        <li id="step3"><strong><?php echo e(__('labels.land_detail')); ?></strong></li>
                        <li id="step4"><strong><?php echo e(__('labels.doc_upload')); ?></strong></li>
                    </ul>
                    <form id="applicant-form" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                        <fieldset>
                            <div class="card shadow" style="border-radius: 15px;">
                                <div class="card-title text-center btn-custom pt-2" type="button" style="font-size:20px;">

                                    <div class="col-md-12 mt-2 mb-2">
                                        <h3>आवेदन विवरण</h3>
                                    </div>
                                </div>
                                <div class="row card-body pt-4" style="">
                                    <div class="col-md-6" align="left">
                                        <label for="purpose_type" class="form-label"><?php echo e(__('labels.applicant_purpose')); ?>

                                            <span style="color: red;">*</span>
                                        </label>
                                        <select id="purpose_types" data-label="एप्लीकेशन पर्पस" name="allotment_purpose" onchange="showrules(this)"
                                            class="form-control <?php $__errorArgs = ['allotment_purpose'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                                            <option value=""><?php echo e(__('labels.select_one')); ?></option>
                                            <?php $__currentLoopData = $purposes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($item->id); ?>"
                                                    data-rule-id="<?php echo e($item->application_rule_id); ?>"
                                                    <?php echo e((old('allotment_purpose') == $item->id || $application->purpose_id == $item->id) ? 'selected' : ''); ?>>
                                                    <?php echo e($item->{'purpose_name_' . app()->getLocale()}); ?>

                                                </option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                        <span id="allotment_purpose_error" style="color: red;"></span>
                                        <?php $__errorArgs = ['allotment_purpose'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <div class="invalid-feedback"><?php echo e($message); ?></div>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>
                                    <div class="col-md-6" align="left">
                                        <label for="land_owner_type"
                                            class="form-label"><?php echo e(__('labels.rule_of_land_allocation')); ?>

                                            <span style="color: red;">*</span></label>
                                        <select id="land_allotment_rule" data-label="भूमि आवंटन नियम"
                                            name="land_allotment_rule"
                                            class="form-control <?php $__errorArgs = ['land_owner_type'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" readonly>
                                            <option value=""><?php echo e(__('labels.select_one')); ?></option>
                                            <?php $__currentLoopData = $rules; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($item->id); ?>"
                                                    <?php echo e(old('land_owner_type') == $item->id ? 'selected' : ''); ?>>
                                                    <?php echo e($item->{'rule_name_' . app()->getLocale()}); ?>

                                                </option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                        <span id="land_allotment_rule_error" style="color: red;"></span>
                                        <?php $__errorArgs = ['land_owner_type'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <div class="invalid-feedback"><?php echo e($message); ?></div>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>
                                    <div class="col-md-12 mt-4" align="left" id="purpose_details">
                                        <label for="purpose_details"><?php echo e(__('labels.purpose_details')); ?><span
                                                style="color: red;">*</span></label>
                                        <input type="text" id="purpose_details"
                                            data-label="<?php echo e(__('labels.purpose_details')); ?>" name="purpose_details"
                                            class="form-control <?php $__errorArgs = ['purpose_details'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                            value="<?php echo e($application->purpose_detail); ?>">
                                        <?php $__errorArgs = ['purpose_details'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <div class="invalid-feedback"><?php echo e($message); ?></div>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>
                                </div>
                                <div class="row card-body mb-4">
                                    <div class="col-md-12" id="org_status" align="left">
                                        <span><?php echo e(__('labels.applicant_type')); ?>:</span>
                                        <div class="inline-radio">
                                            <label>
                                                <input type="radio" name="applicant_type" id="personal" value="personal" <?php echo e(($application->applicant_type == "personal") ? "checked" : ""); ?>> <?php echo e(__('labels.personal')); ?>

                                            </label>
                                            <label class="ml-3">
                                                <input type="radio" name="applicant_type" value="orgnization" <?php echo e(($application->applicant_type == "orgnization") ? "checked" : ""); ?>>
                                                <?php echo e(__('labels.organization')); ?>

                                            </label>
                                            <label class="ml-3">
                                                <input type="radio" name="applicant_type" value="department" <?php echo e(($application->applicant_type == "department") ? "checked" : ""); ?>>
                                                <?php echo e(__('labels.department')); ?>

                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-md-4 mt-4" align="left" id="app_name" style="display:none;">
                                        <label for="app_name"><?php echo e(__('labels.applicant_name')); ?><span
                                                style="color: red;">*</span></label>
                                        <input type="text" id="app_name" data-label="<?php echo e(__('labels.applicant_name')); ?>"
                                            name="app_name" placeholder="<?php echo e(__('labels.applicant_name')); ?>"
                                            class="form-control <?php $__errorArgs = ['app_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                            value="<?php echo e(old('app_name', Auth::user()->name ?? '')); ?>">
                                        <span id="app_name_error" style="color: red;"></span>
                                        <?php $__errorArgs = ['app_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <div class="invalid-feedback"><?php echo e($message); ?></div>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>

                                    <div class="col-md-4 mt-4" align="left" id="app_fname" style="display:none;">
                                        <label for="appf_name"><?php echo e(__('labels.applicant_father_name')); ?><span
                                                style="color: red;">*</span></label>
                                        <input type="text" id="app_fname"
                                            data-label="<?php echo e(__('labels.applicant_father_name')); ?>" name="app_fname"
                                            align="left" placeholder="<?php echo e(__('labels.applicant_father_name')); ?>"
                                            class="form-control mt-4 <?php $__errorArgs = ['app_fname'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                            value="<?php echo e(old('app_fname', Auth::user()->father_name ?? '')); ?>">
                                        <span id="app_fname_error" style="color: red;"></span>
                                        <?php $__errorArgs = ['app_fname'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <div class="invalid-feedback"><?php echo e($message); ?></div>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>


                                    <div class="col-md-4 mt-4" align="left" id="address_app" style="display:none;">
                                        <label for="address_app"><?php echo e(__('labels.applicant_address')); ?><span
                                                style="color: red;">*</span></label>
                                        <input type="text" id="address_app"
                                            data-label="<?php echo e(__('labels.applicant_address')); ?>"name="address_app"
                                            placeholder="<?php echo e(__('labels.applicant_address')); ?>"
                                            class="form-control mt-4 <?php $__errorArgs = ['address_app'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                            value="<?php echo e(old('address_app', Auth::user()->postal_address ?? '')); ?>">
                                        <span id="address_app_error" style="color: red;"></span>
                                        <?php $__errorArgs = ['address_app'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <div class="invalid-feedback"><?php echo e($message); ?></div>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>

                                    <div class="col-md-4 mt-4" align="left" id="app_mobile" style="display:none;">
                                        <label for="app_mobile"><?php echo e(__('labels.mobile_no')); ?><span
                                                style="color: red;">*</span></label>
                                        <input type="text" id="app_mobile" data-label="मोबाइल नंबर" name="app_mobile"
                                            placeholder="मोबाइल नंबर"
                                            class="form-control <?php $__errorArgs = ['app_mobile'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                            value="<?php echo e(old('app_mobile', Auth::user()->mobile ?? '')); ?>">
                                        <span id="app_mobile_error" style="color: red;"></span>
                                        <?php $__errorArgs = ['app_mobile'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <div class="invalid-feedback"><?php echo e($message); ?></div>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>

                                    <div class="col-md-4 mt-4" align="left" id="app_email" style="display:none;">
                                        <label for="app_email"><?php echo e(__('labels.email_id')); ?><span
                                                style="color: red;">*</span></label>
                                        <input type="text" id="app_email" data-label="ईमेल आई डी" name="app_email"
                                            placeholder="ईमेल आई डी"
                                            class="form-control <?php $__errorArgs = ['app_email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                            value="<?php echo e(old('app_email', Auth::user()->email ?? '')); ?>">
                                        <span id="app_email_error" style="color: red;"></span>
                                        <?php $__errorArgs = ['app_email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <div class="invalid-feedback"><?php echo e($message); ?></div>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>

                                    <div class="col-md-4 mt-4" align="left" id="org_name" style="display:none;">
                                        <label for="org_name"><?php echo e(__('labels.rcv_org_name')); ?><span
                                                style="color: red;">*</span></label>
                                        <input type="text" id="org_name_input" data-label="संस्था का नाम" name="org_name"
                                            placeholder="संस्था का नाम"
                                            class="form-control <?php $__errorArgs = ['org_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                            value="<?php echo e(old('org_name', $application->org_name ?? '')); ?>">
                                        <span id="org_name_error" style="color: red;"></span>
                                        <?php $__errorArgs = ['org_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <div class="invalid-feedback"><?php echo e($message); ?></div>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>

                                    <div class="col-md-4 mt-4" align="left" id="dep_name" style="display:none;">
                                        <label for="dep_name"><?php echo e(__('labels.depat_name')); ?><span
                                                style="color: red;">*</span></label>
                                        <input type="text" id="dep_name_input" data-label="विभाग का नाम" name="dep_name"
                                            placeholder="विभाग का नाम"
                                            class="form-control <?php $__errorArgs = ['dep_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                            value=" <?php echo e(old('dep_name', $application->dep_name ?? '')); ?>">
                                        <span id="dep_name_error" style="color: red;"></span>
                                        <?php $__errorArgs = ['dep_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <div class="invalid-feedback"><?php echo e($message); ?></div>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>

                                    <div class="col-md-4 mt-4" align="left" id="app_des" style="display:none;">
                                        <label for="app_des"><?php echo e(__('labels.desiganation')); ?><span
                                                style="color: red;">*</span></label>
                                        <input type="text" id="app_des_input"
                                            data-label="<?php echo e(__('labels.desiganation')); ?>" name="app_des"
                                            placeholder="<?php echo e(__('labels.desiganation')); ?>"
                                            class="form-control <?php $__errorArgs = ['app_des'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                            value="<?php echo e(old('app_des', $application->applicant_designation ?? '')); ?>">
                                        <span id="app_des_error" style="color: red;"></span>
                                        <?php $__errorArgs = ['app_des'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <div class="invalid-feedback"><?php echo e($message); ?></div>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>


                                    <?php if(session('success')): ?>
                                        <div class="toast-container position-fixed bottom-0 end-0 p-3">
                                            <div class="toast align-items-center text-white bg-success border-0 show"
                                                role="alert" aria-live="assertive" aria-atomic="true">
                                                <div class="d-flex">
                                                    <div class="toast-body">
                                                        <?php echo e(session('success')); ?>

                                                    </div>
                                                    <button type="button" class="btn-close btn-close-white me-2 m-auto"
                                                        data-bs-dismiss="toast"></button>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endif; ?>
                                </div>
                                
                                <?php if($application->applicant_type == 'organization'): ?>
                                <div class="row card-body">
                                    <div class="col-md-6 mt-4" align="left" id="land_alloted_details"
                                        style="display:none;">
                                        <label for="land_alloted_details"><?php echo e(__('labels.land_alloted_details')); ?><span
                                                style="color: red;">*</span></label>
                                        <input type="text" id="land_alloted_details_input" name="land_alloted_details"
                                            class="form-control mt-4 <?php $__errorArgs = ['land_alloted_details'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                            value="<?php echo e(old('land_alloted_details', $application->organizationDtls->land_alloted_details ?? '')); ?>">
                                        <span id="land_alloted_details_error" style="color: red;"></span>
                                        <?php $__errorArgs = ['land_alloted_details'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <div class="invalid-feedback"><?php echo e($message); ?></div>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>

                                    <div class="col-md-6 mt-4" align="left" id="org_statement" style="display:none;">
                                        <label for="org_statement"><?php echo e(__('labels.org_statement')); ?><span
                                                style="color: red;">*</span></label>
                                        <input type="file" class="form-control mt-4" id="org_statement_file"
                                            name="org_statement" accept=".pdf,.xls,.xlsx,.jpg,.jpeg,.png">
                                        <span id="org_statement_error" style="color: red;"></span>
                                        <?php if(!empty($application->organizationDtls->org_statement) && Storage::exists($application->organizationDtls->org_statement)): ?>
                                        <a href="<?php echo e(asset('storage/'.$application->organizationDtls->org_statement)); ?>" download><i class="fa fa-download"></i><a>
                                        <?php endif; ?>
                                    </div>

                                    <div class="col-md-6 mt-4" align="left" id="project_report" style="display:none;">
                                        <label for="project_report"><?php echo e(__('labels.org_project_report')); ?><span
                                                style="color: red;">*</span></label>
                                        <input type="text" name="project_report" id="project_report_txt" class="form-control"
                                            value="<?php echo e(old('project_report', $application->organizationDtls->project_report ?? '')); ?>">
                                        <span id="project_report_error" style="color: red;"></span>
                                        <input type="file" name="project_report_file" id="project_report_file"
                                            class="form-control mt-2" accept=".pdf,.doc,.docx,.xls,.xlsx,.jpg,.jpeg,.png">
                                        <?php if(!empty($application->organizationDtls->project_report_file) && Storage::exists($application->organizationDtls->project_report_file)): ?>
                                        <a href="<?php echo e(asset('storage/'.$application->organizationDtls->project_report_file)); ?>" download><i class="fa fa-download"></i><a>
                                        <?php endif; ?>
                                        <span id="project_report_file_error" style="color: red;"></span>
                                        
                                    </div>

                                    <div class="col-md-6 mt-4" align="left" id="ins_allot_purpose" style="display:none;">
                                        <label for="ins_allot_purpose"><?php echo e(__('labels.ins_allot_purpose')); ?><span
                                                style="color: red;">*</span></label>
                                        <input type="file" class="form-control" id="ins_allot_purpose_input"
                                            name="ins_allot_purpose" accept=".pdf">
                                        <?php if(!empty($application->organizationDtls->ins_allot_purpose) && Storage::exists($application->organizationDtls->ins_allot_purpose)): ?>
                                        <a href="<?php echo e(asset('storage/'.$application->organizationDtls->ins_allot_purpose)); ?>" download><i class="fa fa-download"></i><a>
                                        <?php endif; ?>
                                        <span id="ins_allot_purpose_error" style="color: red;"></span>
                                    </div>

                                    <div class="col-md-6 mt-4" align="left" id="society_benefits"
                                        style="display:none;">
                                        <label for="society_benefits"><?php echo e(__('labels.society_benefits')); ?><span
                                                style="color: red;">*</span></label>
                                        <input type="text" id="society_benefits_input" name="society_benefits"
                                            class="form-control <?php $__errorArgs = ['society_benefits'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                            value="<?php echo e(old('society_benefits', $application->organizationDtls->society_benefits ?? '')); ?>">
                                        <span id="society_benefits_error" style="color: red;"></span>
                                        <input type="file" class="form-control mt-2" id="society_benefits_file"
                                            name="society_benefits_file" accept=".pdf">
                                        <?php if(!empty($application->organizationDtls->society_benefits_file) && Storage::exists($application->organizationDtls->society_benefits_file)): ?>
                                        <a href="<?php echo e(asset('storage/'.$application->organizationDtls->society_benefits_file)); ?>" download><i class="fa fa-download"></i><a>
                                        <?php endif; ?>
                                        <span id="society_benefits_file_error" style="color: red;"></span>
                                    </div>

                                    
                                    <div class="col-md-6 mt-4" align="left" id="previous_alloted"
                                        style="display:none;">
                                        <label><?php echo e(__('labels.prev_allot_land')); ?><span
                                                style="color: red;">*</span></label>
                                        <div class="d-flex gap-3 align-items-center">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="land_used"
                                                    id="land_used_yes" value="yes" <?php echo e(($application->organizationDtls->land_used == 'yes') ? 'checked' : ''); ?>>
                                                <label class="form-check-label mr-3"
                                                    for="land_used_yes"><?php echo e(__('labels.yes')); ?></label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="land_used"
                                                    id="land_used_no" value="no" <?php echo e(($application->organizationDtls->land_used == 'no') ? 'checked' : ''); ?>>
                                                <label class="form-check-label"
                                                    for="land_used_no"><?php echo e(__('labels.no')); ?></label>
                                            </div>
                                        </div>
                                        <div class="mt-2" id="prev_allot_land">
                                            <input type="file" class="form-control" id="prev_allot_land_file"
                                                name="prev_allot_land_file" accept=".pdf">
                                            <?php if(!empty($application->organizationDtls->prev_allot_land_file) && Storage::exists($application->organizationDtls->prev_allot_land_file)): ?>
                                            <a href="<?php echo e(asset('storage/'.$application->organizationDtls->prev_allot_land_file)); ?>" download><i class="fa fa-download"></i><a>
                                            <?php endif; ?>
                                            <span id="prev_allot_land_file_error" style="color: red;"></span>
                                        </div>
                                    </div>                                    

                                    <div class="col-md-6 mt-4" align="left" id="experience" style="display:none;">
                                        <label><?php echo e(__('labels.org_experience')); ?><span style="color: red;">*</span></label>
                                        <div class="d-flex gap-3 align-items-center">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="experience"
                                                    id="exp_yes" value="yes" <?php echo e(($application->organizationDtls->experience == 'yes') ? 'checked' : ''); ?>>
                                                <label class="form-check-label mr-3"
                                                    for="exp_yes"><?php echo e(__('labels.yes')); ?></label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="experience"
                                                    id="exp_no" value="no" <?php echo e(($application->organizationDtls->experience == 'no') ? 'checked' : ''); ?>>
                                                <label class="form-check-label"
                                                    for="exp_no"><?php echo e(__('labels.no')); ?></label>
                                            </div>
                                        </div>
                                        <div id="experience_detail_box" class="mt-2">
                                            <textarea class="form-control" id="experience_detail_input" name="experience_detail" rows="3"
                                                placeholder="Please provide details of experience"><?php echo e($application->organizationDtls->experience_detail); ?></textarea>
                                            <span id="experience_detail_error" style="color: red;"></span>
                                        </div>
                                    </div>

                                    <div class="col-md-6 mt-4" align="left" id="registered" style="display:none;">
                                        <label><?php echo e(__('labels.inst_reg_registrar')); ?><span
                                                style="color: red;">*</span></label>
                                        <div class="d-flex gap-3 align-items-center">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="registered"
                                                    id="reg_yes" value="yes" <?php echo e(($application->organizationDtls->registered == 'yes') ? 'checked' : ''); ?>>
                                                <label class="form-check-label mr-3"
                                                    for="reg_yes"><?php echo e(__('labels.yes')); ?></label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="registered"
                                                    id="reg_no" value="no" <?php echo e(($application->organizationDtls->registered == 'no') ? 'checked' : ''); ?>>
                                                <label class="form-check-label"
                                                    for="reg_no"><?php echo e(__('labels.no')); ?></label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Registration Fields -->
                                <div class="row card-body" id="registration-fields">
                                    <div class="col-md-4 mt-4" align="left" id="inst_reg_registrar"
                                        style="display:none;">
                                        <label for="inst_reg_registrar"><?php echo e(__('labels.inst_reg_registrar')); ?></label><span
                                            style="color: red;">*</span>
                                        <!-- <textarea class="form-control mb-2" name="inst_reg_registrar" rows="3"></textarea> -->
                                        <label for="income_expenditure"><?php echo e(__('labels.income_expenditure')); ?></label>
                                        <input type="file" class="form-control" id="income_expenditure"
                                            name="income_expenditure" accept=".pdf,.xls,.xlsx,.jpg,.jpeg,.png" required>                                        
                                        <span id="income_expenditure_error" style="color: red;"></span>
                                        <span id="org-reg-error" class="form-text text-danger"></span>
                                    </div>
                                    <div class="col-md-6" align="left">
                                        <label for="reg_number"><?php echo e(__('labels.reg_number')); ?></label><span
                                            style="color: red;">*</span>
                                        <input class="form-control" type="text" name="reg_number" id="reg_number" value="<?php echo e($application->organizationDtls->reg_number); ?>">
                                        <span id="reg_number_error" style="color: red;"></span>
                                    </div>
                                    <div class="col-md-6" align="left">
                                        <label for="reg_date"><?php echo e(__('labels.reg_date')); ?></label><span
                                            style="color: red;">*</span>
                                        <input class="form-control datepicker" type="text" name="reg_date"
                                            id="reg_date" value="<?php echo e($application->organizationDtls->reg_date); ?>">
                                        <span id="reg_date_error" style="color: red;"></span>
                                    </div>
                                    <div class="col-md-12 mt-4" align="left">
                                        <label
                                            for="org_reg_certificate"><?php echo e(__('labels.org_reg_certificate')); ?></label><span
                                            style="color: red;">*</span>
                                        <textarea class="form-control mb-2" name="org_reg_certificate" rows="3"><?php echo e($application->organizationDtls->org_reg_certificate); ?></textarea>
                                        <span id="org_reg_certificate_error" style="color: red;"></span>
                                        <input type="file" class="form-control" id="org_reg_certificate_file"
                                            name="org_reg_certificate_file" accept=".pdf">
                                        <?php if(!empty($application->organizationDtls->org_reg_certificate_file) && Storage::exists($application->organizationDtls->org_reg_certificate_file)): ?>
                                        <a href="<?php echo e(asset('storage/'.$application->organizationDtls->org_reg_certificate_file)); ?>" download><i class="fa fa-download"></i><a>
                                        <?php endif; ?>
                                        <span id="org_reg_certificate_file_error" style="color: red;"></span>
                                    </div>
                                </div>
                                <?php else: ?>
                                <div class="row card-body">
                                    <div class="col-md-6 mt-4" align="left" id="land_alloted_details"
                                        style="display:none;">
                                        <label for="land_alloted_details"><?php echo e(__('labels.land_alloted_details')); ?><span
                                                style="color: red;">*</span></label>
                                        <input type="text" id="land_alloted_details_input" name="land_alloted_details"
                                            class="form-control mt-4 <?php $__errorArgs = ['land_alloted_details'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                            value="">
                                        <span id="land_alloted_details_error" style="color: red;"></span>
                                        <?php $__errorArgs = ['land_alloted_details'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <div class="invalid-feedback"><?php echo e($message); ?></div>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>

                                    <div class="col-md-6 mt-4" align="left" id="org_statement" style="display:none;">
                                        <label for="org_statement"><?php echo e(__('labels.org_statement')); ?><span
                                                style="color: red;">*</span></label>
                                        <input type="file" class="form-control mt-4" id="org_statement_file"
                                            name="org_statement" accept=".pdf,.xls,.xlsx,.jpg,.jpeg,.png">
                                        <span id="org_statement_error" style="color: red;"></span>                                        
                                    </div>

                                    <div class="col-md-6 mt-4" align="left" id="project_report" style="display:none;">
                                        <label for="project_report"><?php echo e(__('labels.org_project_report')); ?><span
                                                style="color: red;">*</span></label>
                                        <input type="text" name="project_report" id="project_report_txt" class="form-control"
                                            value="">
                                        <span id="project_report_error" style="color: red;"></span>
                                        <input type="file" name="project_report_file" id="project_report_file"
                                            class="form-control mt-2" accept=".pdf,.doc,.docx,.xls,.xlsx,.jpg,.jpeg,.png">                                        
                                        <span id="project_report_file_error" style="color: red;"></span>
                                        
                                    </div>

                                    <div class="col-md-6 mt-4" align="left" id="ins_allot_purpose" style="display:none;">
                                        <label for="ins_allot_purpose"><?php echo e(__('labels.ins_allot_purpose')); ?><span
                                                style="color: red;">*</span></label>
                                        <input type="file" class="form-control" id="ins_allot_purpose_input"
                                            name="ins_allot_purpose" accept=".pdf">                                        
                                        <span id="ins_allot_purpose_error" style="color: red;"></span>
                                    </div>

                                    <div class="col-md-6 mt-4" align="left" id="society_benefits"
                                        style="display:none;">
                                        <label for="society_benefits"><?php echo e(__('labels.society_benefits')); ?><span
                                                style="color: red;">*</span></label>
                                        <input type="text" id="society_benefits_input" name="society_benefits"
                                            class="form-control <?php $__errorArgs = ['society_benefits'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                            value="">
                                        <span id="society_benefits_error" style="color: red;"></span>
                                        <input type="file" class="form-control mt-2" id="society_benefits_file"
                                            name="society_benefits_file" accept=".pdf">                                       
                                        <span id="society_benefits_file_error" style="color: red;"></span>
                                    </div>

                                    
                                    <div class="col-md-6 mt-4" align="left" id="previous_alloted"
                                        style="display:none;">
                                        <label><?php echo e(__('labels.prev_allot_land')); ?><span
                                                style="color: red;">*</span></label>
                                        <div class="d-flex gap-3 align-items-center">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="land_used"
                                                    id="land_used_yes" value="yes" checked>
                                                <label class="form-check-label mr-3"
                                                    for="land_used_yes"><?php echo e(__('labels.yes')); ?></label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="land_used"
                                                    id="land_used_no" value="no">
                                                <label class="form-check-label"
                                                    for="land_used_no"><?php echo e(__('labels.no')); ?></label>
                                            </div>
                                        </div>
                                        <div class="mt-2" id="prev_allot_land">
                                            <input type="file" class="form-control" id="prev_allot_land_file"
                                                name="prev_allot_land_file" accept=".pdf">                                            
                                            <span id="prev_allot_land_file_error" style="color: red;"></span>
                                        </div>
                                    </div>                                    

                                    <div class="col-md-6 mt-4" align="left" id="experience" style="display:none;">
                                        <label><?php echo e(__('labels.org_experience')); ?><span style="color: red;">*</span></label>
                                        <div class="d-flex gap-3 align-items-center">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="experience"
                                                    id="exp_yes" value="yes" checked>
                                                <label class="form-check-label mr-3"
                                                    for="exp_yes"><?php echo e(__('labels.yes')); ?></label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="experience"
                                                    id="exp_no" value="no">
                                                <label class="form-check-label"
                                                    for="exp_no"><?php echo e(__('labels.no')); ?></label>
                                            </div>
                                        </div>
                                        <div id="experience_detail_box" class="mt-2">
                                            <textarea class="form-control" id="experience_detail_input" name="experience_detail" rows="3"
                                                placeholder="Please provide details of experience"></textarea>
                                            <span id="experience_detail_error" style="color: red;"></span>
                                        </div>
                                    </div>

                                    <div class="col-md-6 mt-4" align="left" id="registered" style="display:none;">
                                        <label><?php echo e(__('labels.inst_reg_registrar')); ?><span
                                                style="color: red;">*</span></label>
                                        <div class="d-flex gap-3 align-items-center">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="registered"
                                                    id="reg_yes" value="yes" checked>
                                                <label class="form-check-label mr-3"
                                                    for="reg_yes"><?php echo e(__('labels.yes')); ?></label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="registered"
                                                    id="reg_no" value="no">
                                                <label class="form-check-label"
                                                    for="reg_no"><?php echo e(__('labels.no')); ?></label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Registration Fields -->
                                <div class="row card-body" id="registration-fields">
                                    <div class="col-md-4 mt-4" align="left" id="inst_reg_registrar"
                                        style="display:none;">
                                        <label for="inst_reg_registrar"><?php echo e(__('labels.inst_reg_registrar')); ?></label><span
                                            style="color: red;">*</span>
                                        <!-- <textarea class="form-control mb-2" name="inst_reg_registrar" rows="3"></textarea> -->
                                        <label for="income_expenditure"><?php echo e(__('labels.income_expenditure')); ?></label>
                                        <input type="file" class="form-control" id="income_expenditure"
                                            name="income_expenditure" accept=".pdf,.xls,.xlsx,.jpg,.jpeg,.png" required>                                        
                                        <span id="income_expenditure_error" style="color: red;"></span>
                                        <span id="org-reg-error" class="form-text text-danger"></span>
                                    </div>
                                    <div class="col-md-6" align="left">
                                        <label for="reg_number"><?php echo e(__('labels.reg_number')); ?></label><span
                                            style="color: red;">*</span>
                                        <input class="form-control" type="text" name="reg_number" id="reg_number" value="">
                                        <span id="reg_number_error" style="color: red;"></span>
                                    </div>
                                    <div class="col-md-6" align="left">
                                        <label for="reg_date"><?php echo e(__('labels.reg_date')); ?></label><span
                                            style="color: red;">*</span>
                                        <input class="form-control datepicker" type="text" name="reg_date"
                                            id="reg_date" value="">
                                        <span id="reg_date_error" style="color: red;"></span>
                                    </div>
                                    <div class="col-md-12 mt-4" align="left">
                                        <label
                                            for="org_reg_certificate"><?php echo e(__('labels.org_reg_certificate')); ?></label><span
                                            style="color: red;">*</span>
                                        <textarea class="form-control mb-2" name="org_reg_certificate" rows="3"></textarea>
                                        <span id="org_reg_certificate_error" style="color: red;"></span>
                                        <input type="file" class="form-control" id="org_reg_certificate_file"
                                            name="org_reg_certificate_file" accept=".pdf">                                        
                                        <span id="org_reg_certificate_file_error" style="color: red;"></span>
                                    </div>
                                </div>
                                <?php endif; ?>
                                <!-- <center><button type="submit" class="btn-submit mb-4">जमा करें</button></center> -->
                            </div>
                            <input type="button" name="next-step" id="applicant_next"
                                class="btn btn-success next-step mt-5" value="Save & Next" />
                        </fieldset>
                    </form>
                    <form id="land_selection_form">
                        <?php echo csrf_field(); ?>
                        <fieldset>
                            <div class="card shadow" style="border-radius: 15px;">
                                <div class="card-title text-center btn-custom pt-2" type="button"
                                    style="font-size:20px;">
                                    <div class="col-md-12 mt-2 mb-2" style="text-align: left;">
                                        <span class="icon">&#128205;</span><?php echo e(__('labels.land_selection')); ?>

                                    </div>
                                </div>
                                <input type="hidden" class="application_no" name="application_id" value="">
                                <div class="row card-body pt-4 pb-5">
                                    <div class="col-md-6" align="left">
                                        <label for="khatedar_district"><?php echo e(__('labels.khatedar_district')); ?><span
                                                style="color: red;">*</span></label>
                                        <select name="district" class="form-control" id="district_id" onchange="chanageDistrict(this)" required>
                                            <option value=""><?php echo e(__('labels.select_district')); ?></option>
                                            <?php $__currentLoopData = $districts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $district): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($district->district_code); ?>" <?php echo e(($application->applicant_district==$district->district_code) ? 'selected' : ''); ?>>
                                                    <?php echo e($district->District_Name); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                        <span id="district_error" style="color: red;"></span>

                                    </div>
                                    <div class="col-md-6" align="left">
                                        <label for="khatedar_tehsil"><?php echo e(__('labels.khatedar_tehsil')); ?><span
                                                style="color: red;">*</span></label>
                                        <select name="tehsil" id="tehsil_id" class="form-control" onchange="changeTehsil(this)" required>
                                            <option value=""><?php echo e(__('labels.select_tehsil')); ?></option>
                                            <?php $__currentLoopData = $tehsils; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tehsil): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($tehsil->Block_id1); ?>" <?php echo e(($application->applicant_tehsil == $tehsil->Block_id1) ? 'selected' : ''); ?>><?php echo e($tehsil->Block_Name); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                        <span id="tehsil_error" style="color: red;"></span>
                                    </div>
                                    <div class="col-md-6 mt-3" align="left">
                                        <label for="village"><?php echo e(__('labels.village')); ?><span
                                                style="color: red;">*</span></label>
                                        <select name="village" id="village_id" class="form-control" onchange="changeVillage(this,false)" required>
                                            <option value=""><?php echo e(__('labels.select_vill')); ?></option>
                                            <?php $__currentLoopData = $villages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $village): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($village->Village_Id); ?>" <?php echo e(($application->landDetail->village_code == $village->Village_Id) ? 'selected' : ''); ?>><?php echo e($village->Village_Name); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                        <span id="village-error" class="error-message" style="color:red"></span>
                                        <span id="village_error" style="color: red;"></span>
                                    </div>

                                    <div class="col-md-6 mt-3" align="left">
                                        <label for="khasra"><?php echo e(__('labels.khasra')); ?><span
                                                style="color: red;">*</span></label>
                                        <select id="khsra" name="khsra[]" class="form-control" multiple>
                                            <option value=""></option>                                            
                                        </select>
                                        <span id="khasra-error" class="error-message" style="color:red"></span>
                                        <span id="khsra_error" style="color: red;"></span>
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
                                                    </thead>
                                                    <tbody id="khasraTableBody">
                                                        <?php if(!$application->LandOwnerDetail->isEmpty()): ?>
                                                        <?php $__currentLoopData = $application->LandOwnerDetail; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k=>$owner): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <tr>
                                                            <td><?php echo e($k+1); ?></td>
                                                            <td><?php echo e($owner->khasra_number); ?></td>
                                                            <td><?php echo e($owner->land_area); ?></td>
                                                            <td>                                                    
                                                                <a href="javascript:void(0)"  onclick="showKhasraDetails(<?php echo e($owner->khasra_number); ?>,<?php echo e($application->landDetail->village_code); ?>)"                                                                   
                                                                    class="btn btn-sm btn-outline-primary view_owner_details">
                                                                    <i class="fa fa-eye"></i>
                                                                </a>
                                                            </td>
                                                        </tr>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        <?php endif; ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal fade" id="khasraModal" tabindex="-1" role="dialog"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-xl" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
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
                                                            <tbody id="land_owner_detail">
                                                                <?php if(!$application->LandOwnerDetail->isEmpty()): ?>
                                                                <?php $__currentLoopData = $application->LandOwnerDetail; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k=>$owner): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <tr>
                                                                    <td><?php echo e($owner->khasra_number); ?></td>
                                                                    <td><?php echo e($owner->owner_name); ?></td>
                                                                    <td><?php echo e($owner->owner_fname); ?></td>
                                                                    <td><?php echo e($owner->owner_add1); ?></td>
                                                                </tr>
                                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                <?php endif; ?>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-dismiss="modal">Close</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal fade" id="khasraModal11" tabindex="-1" role="dialog"
                                        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLongTitle">
                                                        <?php echo e(__('labels.land_detail')); ?>

                                                    </h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <table id="land_owner_detail" class="table table-bordered table-lg">
                                                    </table>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-dismiss="modal">Close</button>
                                                    <button type="button" class="btn btn-primary">Save
                                                        changes</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    

                                    <div class="col-md-6 mt-4" align="left">
                                        <label for="type_of_land"><?php echo e(__('labels.type_of_land')); ?><span
                                                style="color: red;">*</span></label>
                                        <input class="form-control" id="type_of_land" type="text"
                                            placeholder="<?php echo e(__('labels.type_of_land')); ?>" name="type_of_land" value="<?php echo e($application->landDetail->land_type); ?>">
                                        <span id="land-type-error" class="error-message" style="color:red"></span>
                                        <span id="type_of_land_error" style="color: red;"></span>
                                    </div>

                                    <div class="col-md-6 mt-4" align="left">
                                        <label for="proposed_area"><?php echo e(__('labels.proposed_area')); ?><span
                                                style="color: red;">*</span></label>
                                        <input class="form-control onlyNumber" id="proposed_area" type="text"
                                            placeholder="<?php echo e(__('labels.proposed_area')); ?>" name="proposed_area" value="<?php echo e($application->landDetail->proposed_land_area); ?>" maxlength="3">
                                        <span id="proposed-area-error" class="error-message" style="color:red"></span>
                                        <span id="proposed_area_error" style="color: red;"></span>
                                    </div>

                                </div>
                                <div class="row card-body">
                                    <div class="col-md-6" align="left">
                                        <label for="land_surrendered"><?php echo e(__('labels.land_surrendered')); ?><span
                                                style="color: red;">*</span>
                                        </label><br>
                                    </div>
                                    <div class="col-md-6 d-flex align-items-center" style="margin-top: -25px;">
                                        <div class="form-check d-flex align-items-center">
                                            <input class="form-check-input" type="radio" name="land_surrendered"
                                                value="yes" <?php echo e(($application->landDetail->is_land_surrendered =='yes') ? 'checked' : ''); ?>>
                                            <label class="form-check-label"><?php echo e(__('labels.yes')); ?></label>
                                        </div>
                                        <div class="form-check d-flex align-items-center" style="margin-left: 10px;">
                                            <input class="form-check-input" type="radio" name="land_surrendered"
                                                value="no" <?php echo e(($application->landDetail->is_land_surrendered =='no') ? 'checked' : ''); ?>>
                                            <label class="form-check-label"><?php echo e(__('labels.no')); ?></label>
                                        </div>
                                        <?php
                                            $display = ($application->landDetail->is_land_surrendered =='yes') ? 'display: block;' : 'display: none;'; 
                                        ?>
                                        <div id="landSurrDetails" class="mt-2"
                                            style="<?php echo e($display); ?> margin-left : 50px !important">
                                            <textarea name="land_surrendered_detail" id="land_surrendered_detail" class="form-control mt-2" placeholder="विवरण"
                                                style="min-width: 300px;"><?php echo e($application->landDetail->surrender_details); ?></textarea>
                                            <span id="land_surrendered_detail_error" style="color: red;"></span>
                                        </div>
                                    </div>
                                </div>
                                <!-- <center><button type="submit" class="btn-submit mb-4">जमा करें</button></center> -->
                            </div>
                            <input type="button" name="previous-step" class="btn btn-success previous-step mt-5"
                                value="Previous" />
                            <input type="button" name="next-step" class="btn btn-success next-step mt-5"
                                value="Save & Next" />
                        </fieldset>
                    </form>
                    <form id="land_detail_form">
                        <?php echo csrf_field(); ?>
                        <fieldset>
                            <div class="card shadow" style="border-radius: 15px;">
                                <div class="card-title text-center btn-custom pt-2" type="button"
                                    style="font-size:20px;">
                                    <div class="col-md-12 mt-2 mb-2" style="text-align: left;">
                                        <span class="icon">&#128206;</span><?php echo e(__('labels.land_detail')); ?>

                                    </div>
                                </div>
                                <div class="row card-body mt-4">
                                    <input type="hidden" class="application_no" name="application_id" value="">
                                    <div class="col-md-6" align="left">
                                        <label class="form-label">
                                            <?php echo e(__('labels.khatedari_land')); ?>

                                        </label>
                                    </div>

                                    <div class="col-md-6 d-flex align-items-center">
                                        <div class="form-check d-flex align-items-center">
                                            <input class="form-check-input me-1" type="radio" name="khatadari"
                                                value="yes" id="khatadariYes" <?php echo e(($application->landDetail->khatedari_proceeding == 'yes') ? 'checked' : ''); ?>>
                                            <label class="form-check-label"
                                                for="khatadariYes"><?php echo e(__('labels.yes')); ?></label>
                                        </div>

                                        <div class="form-check d-flex align-items-center" style="margin-left: 10px;">
                                            <input class="form-check-input me-1" type="radio" name="khatadari"
                                                value="no" id="khatadariNo" <?php echo e(($application->landDetail->khatedari_proceeding == 'no') ? 'checked' : ''); ?>>
                                            <label class="form-check-label"
                                                for="khatadariNo"><?php echo e(__('labels.no')); ?></label>
                                        </div>
                                        <?php
                                         $displaykhatcss = ($application->landDetail->khatedari_proceeding == 'yes') ? 'display: block;' : 'display: none;';
                                        ?>
                                        <div id="khatadariDetails" class="mt-2"
                                            style="<?php echo e($displaykhatcss); ?> margin-left : 50px !important">
                                            <textarea class="form-control mt-2" id="khatadariDetailsInput" name="khatadariDetails" placeholder="विवरण"
                                                style="min-width: 300px;"><?php echo e(($application->landDetail->khatedari_proceeding == 'yes') ? $application->landDetail->khatedari_proceeding_details : ''); ?></textarea>
                                            <span id="khatadariDetails_error" style="color: red;"></span>
                                        </div>

                                    </div>
                                </div>
                                <div class="row card-body mt-4">
                                    <div class="col-md-6" align="left">
                                        <label>
                                            <?php echo e(__('labels.land_acquistion')); ?>

                                        </label>
                                    </div>
                                    <div class="col-md-6 d-flex align-items-center">
                                        <div class="form-check d-flex align-items-center">
                                            <input class="form-check-input" type="radio" name="act_1894"
                                                value="yes" <?php echo e(($application->landDetail->under_acquisition_act_1894 == 'yes') ? 'checked' : ''); ?>>
                                            <label class="form-check-label"><?php echo e(__('labels.yes')); ?></label>
                                        </div>
                                        <div class="form-check d-flex align-items-center" style="margin-left: 10px;">
                                            <input class="form-check-input" type="radio" name="act_1894"
                                                value="no" <?php echo e(($application->landDetail->under_acquisition_act_1894 == 'no') ? 'checked' : ''); ?>>
                                            <label class="form-check-label"><?php echo e(__('labels.no')); ?></label>
                                        </div>
                                        <?php
                                            $landaccCss = ($application->landDetail->under_acquisition_act_1894 == 'yes') ? 'display: block;' : 'display: none;'
                                        ?>
                                        <div id="landacc" class="mt-2"
                                            style="<?php echo e($landaccCss); ?> margin-left : 50px !important">
                                            <textarea class="form-control mt-2" id="landaccInput" name="landacc" placeholder="विवरण" style="min-width: 300px;"><?php echo e(($application->landDetail->under_acquisition_act_1894 == 'yes') ? $application->landDetail->under_acquisition_act_1894_detail : ''); ?></textarea>
                                            <span id="landacc_error" style="color: red;"></span>
                                        </div>
                                    </div>
                                </div>

                                <div class="row card-body mt-4">
                                    <div class="col-md-6" align="left">
                                        <label for="irrigation_means"><?php echo e(__('labels.irrigation_means')); ?><span
                                                style="color: red;">*</span></label>
                                    </div>
                                    <div class="col-md-6 d-flex align-items-center flex-wrap gap-3">
                                        <div class="form-check d-flex align-items-center me-3">
                                            <input class="form-check-input" type="radio" name="irrigation_means"
                                                value="yes" <?php echo e(($application->landDetail->irrigation_land == 'yes') ? 'checked' : ''); ?>>
                                            <label class="form-check-label"><?php echo e(__('labels.yes')); ?></label>
                                        </div>
                                        <div class="form-check d-flex align-items-center me-3" style="margin-left: 10px;">
                                            <input class="form-check-input" type="radio" name="irrigation_means"
                                                value="no" <?php echo e(($application->landDetail->irrigation_land == 'no') ? 'checked' : ''); ?>>
                                            <label class="form-check-label"><?php echo e(__('labels.no')); ?></label>
                                        </div>
                                        <?php
                                        $irrigDtlcss = ($application->landDetail->irrigation_land == 'yes') ? 'display: block;' : 'display: none;';
                                        ?>
                                        <div id="irrigationDetails" class="mt-2"
                                            style="<?php echo e($irrigDtlcss); ?> margin-left : 50px !important">
                                            <textarea class="form-control mt-2" id="irrigationDetailsinput" name="irrigationDetails" placeholder="विवरण"
                                                style="min-width: 300px;"><?php echo e(($application->landDetail->irrigation_land == 'yes') ? $application->landDetail->irrigation_detail : ''); ?></textarea>
                                            <span id="irrigationDetails_error" style="color: red;"></span>
                                        </div>

                                    </div>
                                </div>

                                <div class="row card-body mt-4">
                                    <div class="col-md-3 mt-4" align="left">
                                        <label for="railway_distance"><?php echo e(__('labels.railway_distance')); ?><span
                                                style="color: red;">*</span></label></label>
                                        <input class="form-control onlyNumber" type="text" id="railway_distance"
                                            name="railway_distance" placeholder="मीटर में दूरी" value="<?php echo e($application->landDetail->dist_from_RL); ?>">
                                        <span id="railway-distance-error" class="error-message" style="color:red"></span>
                                        <span id="railway_distance_error" style="color: red;"></span>

                                    </div>

                                    <div class="col-md-3 mt-4" align="left">
                                        <label
                                            for="national_highway_distance"><?php echo e(__('labels.national_highway_distance')); ?><span
                                                style="color: red;">*</span></label></label>
                                        <input class="form-control onlyNumber" type="text" id="national_highway_distance"
                                            name="national_highway_distance" placeholder="मीटर में दूरी" value="<?php echo e($application->landDetail->dist_from_NH); ?>">
                                        <span id="national-highway-distance-error" class="error-message"
                                            style="color:red"></span>
                                        <span id="national_highway_distance_error" style="color: red;"></span>
                                    </div>

                                    <div class="col-md-3 mt-4" align="left">
                                        <label for="state_highway"><?php echo e(__('labels.state_highway')); ?><span
                                                style="color: red;">*</span></label></label>
                                        <input class="form-control onlyNumber" type="text" id="state_highway"
                                            name="state_highway" placeholder="मीटर में दूरी" value="<?php echo e($application->landDetail->dist_from_SH); ?>">
                                        <span id="state-highway-error" class="error-message" style="color:red"></span>
                                        <span id="state_highway_error" style="color: red;"></span>
                                    </div>

                                    <div class="col-md-3 mt-4" align="left">
                                        <label
                                            for="distance_from_town_city"><?php echo e(__('labels.distance_from_town_city')); ?><span
                                                style="color: red;">*</span></label></label>
                                        <input class="form-control onlyNumber" type="text" id="distance_from_town_city"
                                            name="distance_from_town_city" placeholder="मीटर में दूरी" value="<?php echo e($application->landDetail->dist_from_City); ?>">
                                        <span id="distance-error" class="error-message" style="color:red"></span>
                                        <span id="distance_from_town_city_error" style="color: red;"></span>
                                    </div>
                                </div>

                                <div class="row card-body mb-3">
                                    <div class="col-md-6 mt-4" align="left">
                                        <label for="project_cost"><?php echo e(__('labels.project_cost')); ?><span
                                                style="color: red;">*</span></label>
                                        <input class="form-control onlyNumber" type="text" id="project_cost" name="project_cost" value="<?php echo e($application->landDetail->project_cost); ?>"
                                            placeholder="परियोजना लागत">
                                        <span id="project-cost-error" class="error-message" style="color:red"></span>
                                        <span id="project_cost_error" style="color: red;"></span>
                                    </div>

                                    <div class="col-md-6 mt-4" align="left">
                                        <label for="relevant_info"><?php echo e(__('labels.relevant_info')); ?><span
                                                style="color: red;">*</span></label>
                                        <input class="form-control" type="text" id="relevant_info" value="<?php echo e($application->landDetail->other_details); ?>"
                                            name="relevant_info" placeholder="अन्य कोई सुसंगत सूचना">
                                        <span id="relevant-info-error" class="error-message" style="color:red"></span>
                                        <span id="relevant_info_error" style="color: red;"></span>
                                    </div>
                                </div>
                            </div>
                            <input type="button" name="previous-step" class="btn btn-success previous-step mt-5"
                                value="Previous" />
                            <input type="button" name="next-step" class="btn btn-success next-step mt-5"
                                value="Save & Next" />
                        </fieldset>
                    </form>
                    <form id="doc_upload_form" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                        <fieldset>
                            <div class="card shadow" style="border-radius: 15px;">
                                <div class="card-title text-center btn-custom pt-2" type="button"
                                    style="font-size:20px;">
                                    <div class="col-md-12 mt-2 mb-2" style="text-align: left;">
                                        <span class="icon">&#128206;</span><?php echo e(__('labels.doc_upload')); ?>

                                    </div>
                                </div>                             
                                <div class="row mb-3 table-responsive" style="margin-left: 0px !important;">
                                    <input type="hidden" class="application_no" name="application_id" value="">
                                    <table class="table table-bordered align-middle text-center">
                                        <thead class="table-primary">
                                            <tr>
                                                <th scope="col"><?php echo e(__('labels.S_no')); ?></th>
                                                <th scope="col"><?php echo e(__('labels.doc_type')); ?></th>
                                                <th scope="col"><?php echo e(__('labels.doc_availability')); ?></th>
                                                <th scope="col"><?php echo e(__('labels.doc_upload')); ?>

                                                    (<?php echo e(__('labels.doc_file_size')); ?>)</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php if(!$documentTypes->isEmpty()): ?>
                                            <?php $__currentLoopData = $documentTypes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $document): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>      
                                             <?php                                                
                                                $doc = $application->applicationDocs
                                                        ->where('document_id', $document->id)
                                                        ->first();
                                            ?>                                          
                                                <tr>
                                                    
                                                    <input type="hidden"
                                                        name="document_id[<?php echo e($document->document_details); ?>]"
                                                        value="<?php echo e($document->id); ?>">

                                                    <td><?php echo e($key + 1); ?></td>
                                                    <td><?php echo e($document->{'title_' . app()->getLocale()}); ?></td>
                                                    <td>
                                                        <div class="form-check form-check-inline mt-4">
                                                            <input type="radio" class="form-check-input doc-radio"
                                                                data-target="#file_<?php echo e($key); ?>"
                                                                id="<?php echo e($document->document_details . '_yes_' . $key); ?>"
                                                                name="is_<?php echo e($document->document_details); ?>"
                                                                value="yes" <?php echo e(!empty($doc) ? 'checked' : ''); ?>>
                                                            <label class="form-check-label"
                                                                for="<?php echo e($document->document_details . '_yes_' . $key); ?>">
                                                                <?php echo e(__('labels.yes')); ?>

                                                            </label>
                                                        </div>

                                                        <div class="form-check form-check-inline">
                                                            <input type="radio" class="form-check-input doc-radio"
                                                                data-target="#file_<?php echo e($key); ?>"
                                                                id="<?php echo e($document->document_details . '_no_' . $key); ?>"
                                                                name="is_<?php echo e($document->document_details); ?>"
                                                                value="no" <?php echo e(empty($doc) ? 'checked' : ''); ?>>
                                                            <label class="form-check-label"
                                                                for="<?php echo e($document->document_details . '_no_' . $key); ?>">
                                                                <?php echo e(__('labels.no')); ?>

                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <?php
                                                         $documentcss = (!empty($doc)) ? "display:block;" : "display:none;";
                                                        ?>
                                                        <div id="file_<?php echo e($key); ?>" class="file-wrapper" style="<?php echo e($documentcss); ?>">
                                                            <input type="file"
                                                                name="<?php echo e($document->document_details); ?>"
                                                                id="<?php echo e($document->document_details); ?>"
                                                                class="form-control fileInput"
                                                                accept=".jpg, .png, application/pdf">
                                                            <small class="error" style="color:red; display:block; margin-top:4px;"></small>
                                                                <span id="<?php echo e($document->document_details); ?>_error" style="color: red;"></span>
                                                                <?php if($doc && $doc->document_file != '' && Storage::disk('public')->exists($doc->getRawOriginal('document_file'))): ?>
                                                                <a href="<?php echo e($doc->document_file); ?>" title="Download" download><i class="fa fa-download"></i></a>
                                                                <?php endif; ?>
                                                        </div>
                                                    </td>
                                                </tr>                                                
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <?php endif; ?>

                                        </tbody>
                                    </table>
                                </div>
                                <!-- <center><button type="submit" class="btn-submit mb-4"><i class="bi bi-send-fill"></i> जमा करें
                                                                                    </button>
                                                                                    </center> -->
                            </div>
                            <input type="button" name="previous-step" class="btn btn-success previous-step mt-5"
                                value="Previous" />
                            <input type="button" name="next-step" class="btn btn-success next-step mt-5"
                                value="Save" id="last-form" />
                            <button type="button" class="btn btn-primary mt-5" id="previewBtn"
                                    data-toggle="modal" data-target="#applicant_preview" disabled>Preview Application</button>
                            
                        </fieldset>
                    </form>
                </div>
                
                <?php echo $__env->make('partials.preview', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {

            var currentStep = 0;
            var steps = ["applicant-form", "land_selection_form", "land_detail_form", "doc_upload_form"];
            
            if ($('#purpose_types').val()) {  
                showrules($('#purpose_types')); 
            }            
            
            var application_type = "<?php echo e($application->applicant_type); ?>";                                   
            setApplicantType(application_type);
            
            changeVillage($('#village_id'), true);

            function showStep(step) {
                steps.forEach(function(formId, i) {
                    $('#' + formId).toggle(i === step);
                    $('#progressbar li').eq(i).toggleClass('active', i === step);
                });
            }

            showStep(currentStep);

            $('#khsra').on('change', function() {
                const selectedValues = Array.from(this.selectedOptions);                
                const tbody = document.getElementById('khasraTableBody');

                if (selectedValues.length === 0) {
                    tbody.innerHTML = '';
                    return;
                }
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
                                <a href="#" 
                                    onclick="event.preventDefault(); showKhasraDetails('${option.value}', '${villageLgcode}')" 
                                    class="btn btn-sm btn-outline-primary">
                                    <i class="fa fa-eye"></i>
                                </a>

                            </td>
                        `;
                    tbody.appendChild(row);
                });
            });


            $('.next-step').click(function() {
                var form = $('#' + steps[currentStep])[0];
                var formData = new FormData(form);
                formData.append('step', currentStep)
                formData.append('application_id', "<?php echo e($application->id); ?>")
                $.ajax({
                    url: "<?php echo e(route('application.update')); ?>",
                    method: "POST",
                    data: formData,
                    processData: false,
                    contentType: false,                    
                    dataType: "json",
                    success: function(response) {
                        if (response.status) {                            
                            $('.application_no').val(response.data);
                            if (response.step === 3) {  
                                $("#last-form").prop("disabled", true);
                                toastr.success('Application updated successfully', 'Success', {
                                    timeOut: 100000,
                                    closeButton: true,
                                    progressBar: true 
                                });
                                $("#previewBtn").prop("disabled", false);
                                //window.location.href="<?php echo e(route('user.dashboard')); ?>"
                            }
                            if (currentStep < steps.length - 1) {
                                currentStep++;
                                showStep(currentStep);
                            }
                            // Validation errors
                            $.each(response.errors, function(key, value) {
                                console.log('error', key);
                                console.log('sdsfd', 'span.' + key + '_error');

                                $('span.' + key + '_error').text(value[0]);
                            });
                        } else {
                            $('#success-message').removeClass('d-none').text(response
                                .message);
                            $('#myForm')[0].reset();
                        }
                    },
                    error: function(xhr) {
                        console.log('xhr.status', xhr.status);

                        if (xhr.status === 422) {
                            $('[id$="_error"]').text('');
                            var errors = xhr.responseJSON.errors;
                            console.log(errors);

                            $.each(errors, function(key, value) {
                                $('#' + key + '_error').text(value[0]);
                            });

                        } else {
                            $('[id$="_error"]').text(''); // Clear all if not 422
                            toastr.error(response.error, 'Error', {
                                timeOut: 50000,
                                closeButton: true,
                                progressBar: true
                            });
                        }
                    }
                });

            });

            $('.previous-step').click(function() {
                if (currentStep > 0) {
                    console.log('currentStep', currentStep);
                    currentStep--;
                    showStep(currentStep);
                }
            });                    

            $('#khsra').select2();

            $(document).on('change', 'input[name="land_surrendered"]', function() {
                if ($(this).val() === 'yes') {
                    $('#landSurrDetails').show();
                } else {
                    $('#landSurrDetails').hide();
                    $('#land_surrendered_detail').val('');
                }
            });

            $(document).on('change', 'input[name="khatadari"]', function() {
                if ($(this).val() === 'yes') {
                    $('#khatadariDetails').show();
                } else {
                    $('#khatadariDetails').hide();
                    $('#khatadariDetailsInput').val('');
                }
            });

            $(document).on('change', 'input[name="act_1894"]', function() {
                if ($(this).val() === 'yes') {
                    $('#landacc').show();
                } else {
                    $('#landacc').hide();
                    $('#landaccInput').val('');
                }
            });

            $(document).on('change', 'input[name="land_used"]', function() {
                if ($(this).val() === 'yes') {
                    $('#prev_allot_land').show();
                } else {
                    $('#prev_allot_land').hide();
                    $('#prev_allot_land_file').val('');
                }
            });

            $(document).on('change', 'input[name="irrigation_means"]', function() {
                if ($(this).val() === 'yes') {
                    $('#irrigationDetails').show();
                } else {
                    $('#irrigationDetails').hide();
                    $('#irrigationDetailsinput').val('');
                }
            });

            $(document).on('change', 'input[name="experience"]', function() {
                if ($(this).val() === 'yes') {
                    $('#experience_detail_box').show();
                } else {
                    $('#experience_detail_box').hide();
                    $('#experience_detail').val('');
                }
            });

            $(document).on('change', 'input[name="registered"]', function() {
                if ($(this).val() === 'yes') {
                    $('#registration-fields').show();
                } else {
                    $('#registration-fields').hide();
                    $('#reg_number').val('');
                    $('#reg_date').val('');
                    $('#org_reg_certificate').val('');
                    $('#org_reg_certificate_file').val('');
                }
            });

            $(document).on('change', '.doc-radio', function() {
                let target = $($(this).data('target'));
                if ($(this).val() === 'yes') {
                    target.show();
                } else {
                    target.hide().find('input[type="file"]').val('');
                }
            });

            $(".onlyNumber").on("input", function() {
                //this.value = this.value.replace(/[^0-9]/g, '');
                this.value = this.value
                    .replace(/[^0-9.]/g, '')
                    .replace(/(\..*?)\..*/g, '$1');

            });

           
        });

        function showrules(e){
            var purposeTypeId = $(e).val();
            var ruleId = $(e).find(':selected').data('rule-id');
            $('#land_allotment_rule').val(ruleId).trigger('change');
        }

        function setApplicantType(type) {                        
            $('input[name="applicant_type"][value="' + type + '"]')
            .prop('checked', true)
            .trigger('change');

            // $("#org_name_input").val('');
            // $("#dep_name_input").val('');
            // $("#app_des_input").val('');
            // $("#land_alloted_details_input").val("");
            // $("#org_statement_file").val('');
            // $("#project_report_txt").val('');
            // $("#ins_allot_purpose_input").val('');
            // $("#society_benefits_input").val('');
            // $("#society_benefits_file").val('');
            // $("#prev_allot_land_file").val('');
            // $("#experience_detail_input").val('');
            // $("#reg_number").val('');
        } 

        // $(".view_owner_details").on('click',function(){
        //     $('#khasraModal').modal('show');
        // });

        function chanageDistrict(e){
            let districtCode = $(e).val();            
            $('#tehsil_id').html('<option value="">Loading...</option>');

            if (districtCode) {
                $.ajax({
                    url: "<?php echo e(route('getlocation.form')); ?>",
                    method: 'GET',
                    data: {
                        type: 'district', 
                        value: districtCode
                    },
                    success: function(data) {
                        $('#tehsil_id').empty().append(
                            '<option value="">Select Tehsil</option>');
                        $.each(data, function(index, tehsil) {
                            $('#tehsil_id').append('<option value="' + tehsil
                                .Block_id1 + '">' + tehsil.Block_Name +
                                '</option>');
                        });
                    },
                    error: function(xhr) {
                        console.error(xhr.responseText);
                        $('#tehsil_id').html(
                            '<option value="">Error loading tehsils</option>');
                    }
                });
            } else {
                $('#tehsil_id').html('<option value=""><?php echo e(__('labels.select_tehsil')); ?></option>');
            }
        }

        function changeTehsil(et){            
            let tehsilCode = $(et).val();

            $('#village_id').html('<option value="">Loading...</option>');

            if (tehsilCode) {
                $.ajax({
                    url: '<?php echo e(route('getlocation.form')); ?>',
                    method: 'GET',
                    data: {
                        type: 'tehsil',
                        value: tehsilCode
                    },
                    success: function(data) {
                        $('#village_id').empty().append(
                            '<option value="">Select Village</option>');
                        $.each(data, function(index, village) {
                            $('#village_id').append('<option value="' + village
                                .Village_Id + '">' + village.Village_Name +
                                '</option>');
                        });
                    },
                    error: function() {
                        $('#village_id').html(
                            '<option value="">Error loading villages</option>');
                    }
                });
            } else {
                $('#village_id').html('<option value="">><?php echo e(__('labels.select_vill')); ?></option>');
            }            
        }

        function changeVillage(ev,isShowSeleted){
            var villageId = $(ev).val();            
            $('#khsra')
                .empty()
                .append('<option disabled selected>Loading...</option>')                
                .select2({
                    placeholder: "खसरा चुनें"
                }); // re-init so placeholder updates
            if (villageId) {
                $.ajax({
                    url: '<?php echo e(route('get.khasra')); ?>',
                    method: 'POST',
                    data: {
                        _token: "<?php echo e(csrf_token()); ?>",
                        village_code: villageId,
                    },
                    success: function(data) {
                        $('#khsra').empty().append(
                            '<option value="">खसरा</option>');
                        console.log('data', data);
                        const khasraList = data.api_response?.data || [];
                        const villageLgCode = data.decoded_data?.Village_lgcode || "";
                        var selectedKhasras = <?php echo json_encode($selectedKhasras, 15, 512) ?>;    
                        if(!isShowSeleted){
                            const tbody = document.getElementById('khasraTableBody');
                            tbody.innerHTML = "";
                        }                                                                    
                        $.each(khasraList, function(index, k) {
                            const label = `${k.khasra} (खाता: ${k.khata}, क्षेत्रफल: ${k.TotalArea})`;  
                            let isSelected = '';
                            if(isShowSeleted){
                                isSelected = $.inArray(k.khasra, selectedKhasras) !== -1 ? 'selected' : '';                                                                   
                            } 
                            
                            $('#khsra').append(`
                                <option ${isSelected} data-khasra-area="${k.TotalArea}" 
                                        data-village-lgcode="${villageLgCode}" 
                                        value="${k.khasra}">
                                    ${label}
                                </option>
                            `);
                        });
                    },
                    error: function() {
                        $('#khsra').html('<option value="">Error loading khasra</option>');
                    }
                });
            } else {
                $('#khsra').html('<option value="">>खसरा</option>');
            }
        }

        function showKhasraDetails(khasra, village_lgcode) {
            fetch("<?php echo e(route('get.khasra.details')); ?>", {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/json",
                        "X-CSRF-TOKEN": "<?php echo e(csrf_token()); ?>"
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
                    console.log('data.data', data.data.data);

                    if (data.data.statusCode === '1' && Array.isArray(data.data.data) && data.data.data.length > 0) {
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

                        data.data.data.forEach(record => {
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

        window.validationMessages = {
            allotment_purpose: <?php echo json_encode(__('labels.allotment_purpose'), 15, 512) ?>,
            purpose_details: <?php echo json_encode(__('labels.purpose_details_required'), 15, 512) ?>,
            app_name: <?php echo json_encode(__('labels.applicant_name_required'), 15, 512) ?>,
            app_fname: <?php echo json_encode(__('labels.applicant_fname_required'), 15, 512) ?>,
            address_app: <?php echo json_encode(__('labels.address_required'), 15, 512) ?>,
            app_mobile: {
                required: <?php echo json_encode(__('labels.mobile_required'), 15, 512) ?>,
                digits: <?php echo json_encode(__('labels.mobile_digits'), 15, 512) ?>,
                minlength: <?php echo json_encode(__('labels.mobile_10_digits'), 15, 512) ?>,
                maxlength: <?php echo json_encode(__('labels.mobile_10_digits'), 15, 512) ?>
            },
            app_email: {
                required: <?php echo json_encode(__('labels.email_required'), 15, 512) ?>,
                email: <?php echo json_encode(__('labels.email_invalid'), 15, 512) ?>
            },
            org_name: <?php echo json_encode(__('labels.org_name_required'), 15, 512) ?>,
            dep_name: <?php echo json_encode(__('labels.dep_name_required'), 15, 512) ?>,
            app_des: <?php echo json_encode(__('labels.app_des_required'), 15, 512) ?>,
            land_alloted_details: <?php echo json_encode(__('labels.land_alloted_details_required'), 15, 512) ?>,
            society_benefits: <?php echo json_encode(__('labels.society_benefits_required'), 15, 512) ?>,
            project_report: <?php echo json_encode(__('labels.project_report_required'), 15, 512) ?>,
            project_report_file: <?php echo json_encode(__('labels.project_report_file_required'), 15, 512) ?>,
            org_statement: <?php echo json_encode(__('labels.org_statement_required'), 15, 512) ?>,
            income_expenditure: <?php echo json_encode(__('labels.income_expenditure_required'), 15, 512) ?>,
            org_reg_certificate: <?php echo json_encode(__('labels.org_reg_certificate_required'), 15, 512) ?>,
            org_reg_certificate_file: <?php echo json_encode(__('labels.org_reg_certificate_file_required'), 15, 512) ?>,
            society_benefits_file: <?php echo json_encode(__('labels.society_benefits_file_required'), 15, 512) ?>,
            ins_allot_purpose: <?php echo json_encode(__('labels.ins_allot_purpose_required'), 15, 512) ?>,
            prev_allot_land_file: <?php echo json_encode(__('labels.prev_allot_land_file_required'), 15, 512) ?>,
            experience_detail: <?php echo json_encode(__('labels.experience_detail_required'), 15, 512) ?>,
            reg_number: <?php echo json_encode(__('labels.reg_number_required'), 15, 512) ?>,
            reg_date: <?php echo json_encode(__('labels.reg_date_required'), 15, 512) ?>,


            // Step 2
            district: <?php echo json_encode(__('labels.district_required'), 15, 512) ?>,
            tehsil: <?php echo json_encode(__('labels.tehsil_required'), 15, 512) ?>,
            village: <?php echo json_encode(__('labels.village_required'), 15, 512) ?>,
            khsra: <?php echo json_encode(__('labels.khasra_required'), 15, 512) ?>,
            type_of_land: <?php echo json_encode(__('labels.land_type_required'), 15, 512) ?>,
            proposed_area: <?php echo json_encode(__('labels.proposed_area_required'), 15, 512) ?>,

            // Step 3
            railway_distance: <?php echo json_encode(__('labels.railway_distance_required'), 15, 512) ?>,
            national_highway_distance: <?php echo json_encode(__('labels.national_highway_distance_required'), 15, 512) ?>,
            state_highway: <?php echo json_encode(__('labels.state_highway_distance_required'), 15, 512) ?>,
            distance_from_town_city: <?php echo json_encode(__('labels.distance_from_city_required'), 15, 512) ?>,
            project_cost: <?php echo json_encode(__('labels.project_cost_required'), 15, 512) ?>,
            khatadariDetails: <?php echo json_encode(__('labels.khatadariDetails_required'), 15, 512) ?>,
            landacc: <?php echo json_encode(__('labels.landacc_required'), 15, 512) ?>,
            irrigationDetails: <?php echo json_encode(__('labels.irrigationDetails_required'), 15, 512) ?>,
            relevant_info: <?php echo json_encode(__('labels.relevant_info_required'), 15, 512) ?>,


            copy_khasra_map: <?php echo json_encode(__('labels.copy_khasra_map_required'), 15, 512) ?>,
            original_copy_challan: <?php echo json_encode(__('labels.original_copy_challan_required'), 15, 512) ?>,
            project_cost_copy: <?php echo json_encode(__('labels.project_cost_copy_required'), 15, 512) ?>,
            copies_revenue_map: <?php echo json_encode(__('labels.copies_revenue_map_required'), 15, 512) ?>,
            valid_file_required: <?php echo json_encode(__('labels.valid_file_required'), 15, 512) ?>,

        };

         $('#applicant_preview').on('show.bs.modal', function() {
            
            // $("#ajax-loader").show();
            let applicationNo = $('.application_no').val();

            //let applicationNo = 240;
            $("#finalSubmitBtn").attr("href", "/application/final-submit/" + applicationNo);

            $("#editButton").attr("href", "/edit-application/" + applicationNo);

            if (!applicationNo) {
                $("#preview_app_purpose").text("N/A");
                return;
            }

            $.ajax({
                url: "/application/preview/" + applicationNo,
                type: "GET",
                success: function(res) {
                    if (res.status) {
                        fillPreview(res.data);
                        //   $("#ajax-loader").hide();
                    } else {
                        toastr.error("Failed to load preview");
                    }
                },
                error: function() {
                    toastr.error("Error while loading preview");
                }
            });
        });

        function fillPreview(data) {
            // alert(data.land_detail.land_type);
            // Applicant Details
            $("#preview_app_purpose").text(data.purpose.purpose_name_hi ?? "N/A");
            $("#preview_app_rule").text(data.rule.rule_name_hi ?? "N/A");
            $("#purpose_detail").text(data.purpose_detail ?? "N/A");
            $("#applicant_type").text(data.applicant_type ?? "N/A");

            $("#applicant_name").text(data.applicant_name ?? "N/A");
            $("#applicant_fname").text(data.applicant_fname ?? "N/A");
            $("#applicant_add1").text(data.applicant_add1 ?? "N/A");
            $("#applicant_mnumber").text(data.applicant_mnumber ?? "N/A");
            $("#applicant_email").text(data.applicant_email ?? "N/A");

            $("#applicant_district").text(data.district.District_Name ?? "N/A");

            $("#applicant_tehsil").text(data.tehsil.Block_Name ?? "N/A");
            $("#applicant_village").text(data.land_detail.village.Village_Name ?? "N/A");

            $("#khasra_number").text(data.land_detail.khasra_number ?? "N/A");
            // Example for table rows (selected khasra list)
            let rows = "";
            if (data.land_owners && data.land_owners.length > 0) {
                data.land_owners.forEach((k, i) => {
                    rows += `<tr>
                        <td>${i + 1}</td>
                        <td>${k.khasra_number}</td>
                        <td>${k.land_area ?? 0.5}</td>
                    </tr>`;
                });
            } else {
                rows = `<tr><td colspan="3" class="text-center">No data</td></tr>`;
            }
            $("#preview_khasra_table tbody").html(rows);
            $("#land_type").text(data.land_detail.land_type ?? "N/A");
            $("#proposed_land_area").text(data.land_detail.proposed_land_area ?? "N/A");
            $("#is_land_surrendered").text(data.land_detail.is_land_surrendered ?? "N/A");
            $("#khatedari_proceeding").text(data.land_detail.khatedari_proceeding ?? "N/A");
            $("#under_acquisition_act_1894").text(data.land_detail.under_acquisition_act_1894 ?? "N/A");
            $("#irrigation_land").text(data.land_detail.irrigation_land ?? "N/A");
            $("#dist_from_RL").text(data.land_detail.dist_from_RL ?? "N/A");
            $("#dist_from_NH").text(data.land_detail.dist_from_NH ?? "N/A");
            $("#dist_from_SH").text(data.land_detail.dist_from_SH ?? "N/A");
            $("#dist_from_City").text(data.land_detail.dist_from_City ?? "N/A");
            $("#project_cost").text((data.land_detail?.project_cost ? "₹" + data.land_detail.project_cost : "N/A"));
            $("#other_details").text(data.land_detail.other_details ?? "N/A");
            // Documents
            let docRows = "";
            if (data.application_docs && data.application_docs.length > 0) {
                data.application_docs.forEach((doc, i) => {
                    docRows += `<tr>
                          <td>${i + 1}</td>
                          <td>${doc.document.title_hi}</td>
                          <td>
                            <a href="${doc.document_file}" download class="align-items-center text-decoration-none">
                                <i class="fa fa-download mr-2"></i>
                            </a>
                          </td>
                        </tr>`;
                });
            } else {
                docRows = `<tr><td colspan="3" class="text-center">No documents uploaded</td></tr>`;
            }
            $("#preview_documents tbody").html(docRows);
        }

        $(document).on("submit", "#finalSubmitForm", function(e) {
            if (!confirm("Are you sure you want to submit the application? Once submitted, it cannot be edited.")) {
                e.preventDefault(); // stop form submit
            }
        })

        $(function() {
            var today = new Date();
            var threeMonthsAgo = new Date();
            threeMonthsAgo.setMonth(today.getMonth() - 3);

            $(".datepicker").datepicker({
                format: "yyyy-mm-dd",
                endDate: today,
                startDate: threeMonthsAgo,
                autoclose: true,
                todayHighlight: true,
                clearBtn: true
            });
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.front_layout', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xamppp\htdocs\RALAMS_New_Updated_Code\resources\views/edit_application.blade.php ENDPATH**/ ?>