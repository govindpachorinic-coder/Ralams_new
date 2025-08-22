
<?php $__env->startSection('title', __("labels.project_short_name")); ?>
<?php $__env->startSection('pagetitle', __("labels.dashboard")); ?>
<?php $__env->startSection('role_name', "Admin"); ?>

<style>
body {
    background: #fff;
}

.top-band {
    background: linear-gradient(90deg, #239241 0%, #0d427a 100%);
    color: #fff;
    font-size: 14px;
    height: 30px;
    padding: 2px 0 2px 0;
}

.parivesh-header {
    background: #fff;
    padding: 10px 0 4px 0;
    border-bottom: 1px solid #e3e3e3;
    min-height: 54px;
}

.parivesh-logo {
    height: 48px;
    margin-right: 14px;
}

.header-title {
    font-weight: 700;
    color: #262626;
    font-size: 18px;
    letter-spacing: 0.01em;
    margin-bottom: 4px;
    line-height: 1.14;
}

.header-title span {
    font-size: 13px;
    font-weight: 400;
    margin-left: 7px;
    color: #198754;
}

.header-ministry-hi {
    font-size: 13.5px;
    color: #026231;
    font-weight: 500;
    margin-bottom: 2px;
}

.header-ministry-en {
    font-size: 13px;
    font-weight: 500;
    color: #198754;
    margin-bottom: 2px;
}

.right-icons img {
    height: 32px;
    margin-right: 10px;
}

.right-icons img:last-child {
    margin-right: 0;
}

.logout-btn {
    background: #F76060;
    border: none;
    border-radius: 3px;
    color: #fff;
    padding: 5px 16px;
    font-size: 15px;
    font-weight: 600;
    margin-left: 8px;
}

.welcome-text {
    font-size: 14.5px;
    color: #212529;
    margin-top: 6px;
    margin-right: 18px;
}

.lang-select {
    font-size: 15px;
    color: #176200;
    font-weight: 600;
    margin-left: 10px;
}

.breadcrumb {
    background: none;
    font-size: 14px;
    padding-left: 0;
    margin-bottom: 6px;
    margin-top: 10px;
}

.btn-back {
    background: #606060;
    color: #fff;
    font-weight: 600;
    padding: 5px 20px;
    font-size: 15px;
    border-radius: 4px;
    border: none;
    margin-bottom: 8px;
    margin-top: 10px;
    margin-right: 11px;
    display: inline-block;
    line-height: 1.2;
}

/* Button Row */
.button-row-bar {
    display: flex;
    justify-content: space-between;
    align-items: center;
    gap: 10px;
    margin-bottom: 17px;
    margin-top: 0px;
    flex-wrap: wrap;
}

.button-row-actions {
    display: flex;
    gap: 10px;
    flex-wrap: wrap;
    justify-content: flex-end;
}

.bar-btn-blue {
    background: #006699;
    color: #fff;
    font-size: 15px;
    font-weight: 600;
    border-radius: 4px;
    letter-spacing: 0.02em;
    border: none;
    padding: 11px 20px;
    min-width: 120px;
    min-height: 36px;
    line-height: 1.2;
}

.bar-btn-yellow {
    background: #fec008;
    color: #222;
    font-size: 15px;
    font-weight: 700;
    border-radius: 4px;
    letter-spacing: 0.02em;
    border: none;
    padding: 7px 20px;
    min-width: 120px;
    min-height: 36px;
    line-height: 1.2;
}

.detail-row {
    display: flex;
    align-items: center;
    /* label/value dono vertical center ho */
    background: #f8fafc;
    border-radius: 7px;
    padding: 8px 13px 7px 12px;
    margin-bottom: 8px;
}

.detail-label {
    width: 180px;
    /* Jo bhi aapko theek lage */
    font-weight: bold;
    color: #1c355c;
    font-size: 13.6px;
    margin-right: 70px;
    /* IMPORTANT: Double your old value (e.g. 28px × 2 = 56px) */
    white-space: nowrap;
    flex-shrink: 0;
    text-align: left;
}

.detail-value {
    font-size: 13.2px;
    color: #214;
    word-break: break-all;
    flex: 1 1 0;
    display: flex;
    align-items: center;
    min-width: 0;
}

/* Add this in your <style> or stylesheet */

.card-header i {
    vertical-align: middle;
}

.table thead th {
    background: #e8eff5 !important;
    border-bottom: 1.5px solid #d4e1ef !important;
}

tbody tr {
    border-radius: 7px;
}

tbody td {
    vertical-align: middle;
}

.applicant-card {
    border-radius: 16px;
    max-width: 100%;
    margin: auto;
    border: 1px solid #e3e9f2;
    box-shadow: 0 .125rem .25rem rgba(0, 0, 0, .075);
    height: 100%;
}

.applicant-card .card-header {
    background: linear-gradient(90deg, #e8eff5 0%, #f7fcff 100%);
    font-weight: 700;
    font-size: 20px;
    border-radius: 16px 16px 0 0;
    padding: 18px 30px;
    display: flex;
    align-items: center;
    gap: 10px;
}

.applicant-card .card-header i {
    color: #0b4870;
    font-size: 22px;
    margin-right: 0;
}

.applicant-card .card-body {
    padding: 28px 32px 22px 32px;
}

.detail-row {
    display: flex;
    align-items: center;
    /* vertical center alignment */
    background: #f8fafc;
    border-radius: 7px;
    padding: 8px 13px 7px 12px;
    margin-bottom: 5px;
}

.detail-label {
    width: 180px;
    /* fixed width for labels */
    font-weight: 700;
    color: #1c355c;
    font-size: 13.6px;
    margin-right: 70px;
    /* gap between label and value */
    white-space: nowrap;
    flex-shrink: 0;
    text-align: left;
}

.detail-value {
    font-size: 13.2px;
    color: #214;
    word-break: break-word;
    flex: 1 1 0;
    display: flex;
    align-items: center;
    min-width: 0;
}

@media (max-width: 767.98px) {
    .applicant-card .card-body {
        padding: 20px 15px 20px 15px;
    }

    .detail-label {
        width: 110px !important;
        margin-right: 12px !important;
        font-size: 12.5px;
    }

    .detail-row {
        font-size: 12.5px;
        flex-direction: column;
        gap: 2.5px;
        align-items: flex-start;
    }
}

@media (max-width: 767px) {
    .detail-label {
        max-width: 54%;
        font-size: 12.6px;
    }

    .detail-row {
        font-size: 12.6px;
        flex-direction: column;
        gap: 2.5px;
        align-items: flex-start;
    }
}

@media (max-width:767.98px) {

    .welcome-text,
    .header-ministry-hi,
    .header-ministry-en,
    .header-title {
        font-size: 13px;
    }

    .header-title span {
        font-size: 11.5px;
    }

    .bar-btn-green,
    .bar-btn-yellow {
        font-size: 12px;
        padding: 5px 9px;
        min-width: 80px;
        min-height: 28px;
    }

    .btn-back {
        font-size: 12px;
        padding: 4px 10px;
    }

    .parivesh-logo {
        height: 32px;
    }

    .right-icons img {
        height: 20px;
    }

    .fixed-height-card {
        height: 550px;
        overflow-y: auto;
    }

    @media (max-width: 767px) {
        .detail-label {
            margin-right: 12px;
            width: 110px;
        }
    }

    .plus-btn {
        font-size: 27px;
        font-weight: bold;
        color: #2874ef;
        background: none;
        border: none;
        outline: none;
        cursor: pointer;
        padding: 0 9px;
        line-height: 1;
        transition: color 0.18s;
    }

    .plus-btn:hover,
    .plus-btn:focus {
        color: #19448e;
    }


}
</style>

<?php $__env->startSection('content'); ?>

<div class="container-fluid">
    <div class="row pt-2 pl-2">
        <div class="col-12">
            <!-- Top Buttons Row -->
            <!-- Row with two cards side by side -->
            <div class="row mt-3">

                <!-- First Card: Applicant Details -->
                <div class="col-md-12 mb-3">
                    <div class="card h-100 shadow-sm applicant-card">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <span>
                                <i class="fa fa-user-circle"></i>
                                <?php echo e(__("labels.application_details")); ?> - (<?php echo e($details->application_number); ?>)
                            </span>

                            <?php if(Auth::user()->user_type == 'Patwari'): ?>
                                <a href="<?php echo e(route('checklist', $details->application_id)); ?>">
                                    <?php echo e(__("labels.checklist")); ?>

                                </a>
                            <?php endif; ?>
                        </div>

                        <div class="card-body">
                            <div class="container-fluid p-0">
                                <div class="row">
                                    <div class="col-6">
                                        <div class="detail-row">
                                            <div class="detail-label"><?php echo e(__("labels.rules")); ?>:</div>
                                            <div class="detail-value"><?php echo e($details->rule->application_rule_name ?? 'N/A'); ?></div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="detail-row">
                                            <div class="detail-label"><?php echo e(__("labels.application_receive_date")); ?>:</div>
                                            <div class="detail-value"><?php echo e(date('d F Y', strtotime($details->created_at))); ?></div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="detail-row">
                                            <div class="detail-label"><?php echo e(__("labels.purpose")); ?>:</div>
                                            <div class="detail-value"><?php echo e($details->purpose->purpose_name ?? 'N/A'); ?></div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="detail-row">
                                            <div class="detail-label"><?php echo e(__("labels.app_name")); ?>:</div>
                                            <div class="detail-value"><?php echo e($details->applicant_name ?? 'N/A'); ?></div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="detail-row">
                                            <div class="detail-label"><?php echo e(__("labels.app_fa_name")); ?>:</div>
                                            <div class="detail-value"><?php echo e($details->applicant_fname ?? 'N/A'); ?></div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="detail-row">
                                            <div class="detail-label"><?php echo e(__("labels.land_owner_name")); ?>:</div>
                                            <div class="detail-value"><?php echo e($details->landOwnerDetail[0]->owner_name ?? 'N/A'); ?></div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="detail-row">
                                            <div class="detail-label"><?php echo e(__("labels.land_type")); ?>:</div>
                                            <div class="detail-value"><?php echo e($details->landDetail->land_type ?? 'N/A'); ?></div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="detail-row">
                                            <div class="detail-label"><?php echo e(__("labels.app_address")); ?>:</div>
                                            <div class="detail-value"><?php echo e($details->applicant_add1 ?? 'N/A'); ?></div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="detail-row">
                                            <div class="detail-label"><?php echo e(__("labels.owner_address")); ?>:</div>
                                            <div class="detail-value"><?php echo e($details->landOwnerDetail[0]->owner_add1 ?? 'N/A'); ?></div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="detail-row">
                                            <div class="detail-label"><?php echo e(__("labels.village")); ?>:</div>
                                            <div class="detail-value"><?php echo e($details->landDetail->village->Village_Name ?? 'N/A'); ?></div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="detail-row">
                                            <div class="detail-label"><?php echo e(__("labels.khasra_no")); ?>:</div>
                                            <div class="detail-value"><?php echo e($details->landOwnerDetail[0]->khasra_number ?? 'N/A'); ?></div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="detail-row">
                                            <div class="detail-label"><?php echo e(__("labels.proposed_area")); ?>:</div>
                                            <div class="detail-value"><?php echo e($details->landDetail->proposed_land_area ?? 'N/A'); ?></div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="detail-row">
                                            <div class="detail-label"><?php echo e(__("labels.is_land_surr")); ?>:</div>
                                            <div class="detail-value"><?php echo e(($details->landDetail->is_land_surrendered == 'no') ? "No" : "Yes"); ?></div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="detail-row">
                                            <div class="detail-label"><?php echo e(__("labels.irrigation_land")); ?>:</div>
                                            <div class="detail-value"><?php echo e(($details->landDetail->irrigation_land) ? ucfirst($details->landDetail->irrigation_land) : 'N/A'); ?></div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="detail-row">
                                            <div class="detail-label"><?php echo e(__("labels.national_highway_distance")); ?>:</div>
                                            <div class="detail-value"><?php echo e($details->landDetail->dist_from_NH ?? 'N/A'); ?></div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="detail-row">
                                            <div class="detail-label"><?php echo e(__("labels.state_highway")); ?>:</div>
                                            <div class="detail-value"><?php echo e($details->landDetail->dist_from_SH ?? 'N/A'); ?></div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="detail-row">
                                            <div class="detail-label"><?php echo e(__("labels.railway_distance")); ?>:</div>
                                            <div class="detail-value"><?php echo e($details->landDetail->dist_from_RL ?? 'N/A'); ?></div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="detail-row">
                                            <div class="detail-label"><?php echo e(__("labels.distance_from_town_city")); ?>:</div>
                                            <div class="detail-value"><?php echo e($details->landDetail->dist_from_City ?? 'N/A'); ?></div>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="detail-row">
                                            <div class="detail-label"><?php echo e(__("labels.irrigation_detail")); ?>:</div>
                                            <div class="detail-value"><?php echo e($details->landDetail->irrigation_detail ?? 'N/A'); ?></div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="detail-row">
                                            <div class="detail-label"><?php echo e(__("labels.comment")); ?>:</div>
                                            <div class="detail-value"><?php echo ($details->comment) ? $details->comment : 'N/A'; ?></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

            </div>

            <!-- <div class="row mt-3">
                <div class="col-md-6 mb-3">
                    <div class="card h-100 shadow-sm"
                        style="border-radius:16px; max-width:100%; margin:auto; border:1px solid #e3e9f2;">
                        <div class="card-header font-weight-bold"
                            style="background:linear-gradient(90deg,#e8eff5 0%,#f7fcff 100%); font-size:19px; border-radius:16px 16px 0 0; padding:17px 28px;">
                            <i class="fa fa-file-arrow-up"
                                style="color:#3466c3; margin-right:11px; font-size:20px;"></i>
                                <?php echo e(__("labels.application_documents")); ?>

                        </div>
                        <div class="card-body" style="padding:25px 24px 22px 24px;">
                            <div class="table-responsive">
                                <table class="table mb-0" style="font-size:15.2px; border-collapse:separate;">
                                    <thead>
                                        <tr style="background:#e8eff5;">
                                            <th style="font-weight:700;"><?php echo e(__("labels.S_no")); ?></th>
                                            <th style="font-weight:700; min-width:160px;"><?php echo e(__("labels.document_type")); ?></th>
                                            <th style="font-weight:700;"><?php echo e(__("labels.uploaded_by")); ?></th>
                                            <th style="font-weight:700;"><?php echo e(__("labels.role")); ?></th>
                                            <th style="font-weight:700;"><?php echo e(__("labels.date")); ?></th>
                                            <th style="font-weight:700; min-width:100px; text-align:center;"><?php echo e(__("labels.document")); ?>

                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i = 1; ?>
                                        <?php $__empty_1 = true; $__currentLoopData = $details->applicationDocs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $doc): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                        <tr style="background:#f8fafc; border-radius:7px;" id="row_<?php echo e($doc->id); ?>">
                                            <td><?php echo e($i++); ?></td>
                                            <td><?php echo e($doc->document->{'title_'.app()->getLocale()}); ?></td>
                                            <td><?php echo e($doc->uploadedBy->name ?? ''); ?></td>
                                            <td><?php echo e(!empty($doc->user_type) ? ucfirst($doc->user_type) : ucfirst($doc->uploadedBy->user_type)); ?></td>
                                            <td><?php echo e(date('Y-m-d',strtotime($doc->created_at))); ?></td>
                                            <td style="text-align:center;">
                                                <?php if($doc->document_file != '' && Storage::disk('public')->exists($doc->getRawOriginal('document_file'))): ?>
                                                <a class="btn btn-light" href="<?php echo e($doc->document_file); ?>" target="_blank"
                                                    style="border-radius:50%; margin:0 2px; box-shadow:none; color:#2680c0;"
                                                    disabled title="Download">
                                                    <i class="fa fa-download"></i>
                                                </a>
                                                <?php else: ?>
                                                    <span class="text-muted"><?php echo e(__("labels.no_doc_available")); ?></span>
                                                <?php endif; ?>
                                            </td>
                                        </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                        <tr>
                                            <td colspan="6" class="text-center"><?php echo e(__("labels.records_not_found")); ?></td>
                                        </tr>
                                        <?php endif; ?>                                         
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 mb-3">
                    <div class="card h-100 shadow-sm"
                        style="border-radius:16px; max-width:100%; margin:auto; border:1px solid #e3e9f2;">
                        <div class="card-header font-weight-bold"
                            style="background:linear-gradient(90deg,#e8eff5 0%,#f7fcff 100%); font-size:19px; border-radius:16px 16px 0 0; padding:17px 28px;">
                            <i class="fa fa-timeline"
                                style="color:#2874ef; margin-right:11px; font-size:20px;"></i>
                                <?php echo e(__("labels.application_transactions")); ?>

                        </div>

                        <div class="card-body" style="padding:25px 27px 22px 27px;">
                            <div class="proposal-history-list"
                                style="display:flex; flex-direction:column; gap:20px; max-height: 320px; overflow-y: auto; padding-right: 8px;">
                                <?php $__empty_1 = true; $__currentLoopData = $details->applicationTransactions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $transaction): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                <div class="proposal-row"
                                    style="background:#f8fafc; border-radius:8px; border:1px solid #e6eaef;">
                                    <div class="proposal-row-header"
                                        style="display:flex; justify-content:space-between; align-items:center; padding:16px 20px; font-weight:600; font-size:15.5px; color:#2d3756; cursor:pointer;">
                                        <?php
                                            $toUser = $transaction->touser;
                                            if ($toUser->user_type === 'user') {
                                                $displayName = $toUser->user_type;
                                            } elseif ($toUser->user_type === Auth::user()->user_type) {
                                                $displayName = 'Self';
                                            } else {
                                                $displayName = $toUser->user_type;
                                            }
                                        ?>
                                        <span style="flex:1;">Forwarded to <?php echo e($displayName); ?></span>
                                        <div style="display:flex; align-items:center; gap:12px;">
                                            <span
                                                style="background:#006699; color:#fff; font-size:13.2px; font-weight:600; border-radius:6px; padding:6px 18px; letter-spacing:0.18px;">
                                                <?php echo e(date('d-m-Y',strtotime($transaction->created_at)).'-'.date('d-m-Y',strtotime($transaction->updated_at))); ?>

                                            </span>
                                            <button class="plus-btn" aria-label="Toggle details" aria-expanded="false"
                                                style="font-size:27px; font-weight:bold; color:#2874ef; background:none; border:none; outline:none; cursor:pointer; padding:0 9px;">+</button>
                                        </div>
                                    </div>
                                    <div class="proposal-row-details"
                                        style="display:none; background:#f3f7fd; border-radius:0 0 8px 8px; padding:12px 20px 16px 20px; color:#1a2f5c; font-size:14px;">
                                        <div style="display: flex; gap: 30px; font-weight: 600; margin-bottom: 8px;">
                                            <div>
                                                Start Date:<br />
                                                <span style="font-weight: normal;"><?php echo e(date('d-m-Y',strtotime($transaction->created_at))); ?></span>
                                            </div>
                                            <div>
                                                End Date:<br />
                                                <span style="font-weight: normal;"><?php echo e(date('d-m-Y',strtotime($transaction->updated_at))); ?></span>
                                            </div>
                                            <div style="margin-left: auto; text-align: right;">
                                                <?php if(!empty($transaction->forward_file) && Storage::disk('public')->exists($transaction->getRawOriginal('forward_file'))): ?>                             
                                                <a href="<?php echo e($transaction->forward_file); ?>" target="_blank">
                                                <i class="fa fa-download"
                                                    style="color:#2680c0; font-size: 19px; cursor:pointer;"></i></a>
                                                 <?php else: ?>
                                                    <span class="text-muted"><?php echo e(__("labels.no_doc_available")); ?></span>
                                                 <?php endif; ?>   
                                            </div>
                                        </div>
                                        <div
                                            style="font-weight: 400; color: #455a75; font-size: 14px; line-height: 1.4;">
                                            Comment: <?php echo $transaction->comment; ?>

                                        </div>
                                    </div>
                                </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                    <div class="proposal-row"><?php echo e(__("labels.records_not_found")); ?><div>
                                <?php endif; ?>                                
                            </div>
                        </div>
                    </div>
                </div>

            </div> -->


        </div>
    </div>
</div>
<script>
$(document).on('click', '.action-cls', function(e) {
    e.preventDefault();
    var action = $(this).data('action'); 
    $('#actionInput').val(action);  
    $('#actionForm').submit(); 
});
</script>
<?php $__env->stopSection(); ?>
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Select all toggle buttons
    const toggles = document.querySelectorAll('.plus-btn');

    toggles.forEach(btn => {
        btn.addEventListener('click', function(e) {
            e.stopPropagation();
            const row = btn.closest('.proposal-row');
            const details = row.querySelector('.proposal-row-details');
            const isOpen = details.style.display === 'block';

            // Close any open rows first (optional; remove this block if multiple open allowed)
            document.querySelectorAll('.proposal-row-details').forEach(d => d.style.display =
                'none');
            document.querySelectorAll('.plus-btn').forEach(b => b.textContent = '+');

            if (!isOpen) {
                details.style.display = 'block';
                btn.textContent = '−';
            } else {
                details.style.display = 'none';
                btn.textContent = '+';
            }
        });
    });
});


document.addEventListener('DOMContentLoaded', function() {
  // Table tbody selector
  const tbody = document.querySelector('.table tbody');
  // Container jisme scroll karna hai — yahan card-body of Upload Documents
  const cardBody = document.querySelector('.col-md-6 .card-body');

  // Minimum rows jis par scroll enable karna hai
  const scrollThreshold = 5;

  if (tbody && cardBody) {
    const rowCount = tbody.querySelectorAll('tr').length;

    if (rowCount >= scrollThreshold) {
      cardBody.style.maxHeight = '320px';  // Ya apne hisaab se adjust karen
      cardBody.style.overflowY = 'auto';
      cardBody.style.paddingRight = '8px';  // scrollbar ke liye thoda gap
    } else {
      // Agar rows kam hain to scroll hata dein (optional)
      cardBody.style.maxHeight = '';
      cardBody.style.overflowY = '';
      cardBody.style.paddingRight = '';
    }
  }
});

</script>


</body>

</html>
<?php echo $__env->make('layouts.front_layout', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xamppp\htdocs\RALAMS_New_Updated_Code\resources\views/applicant_view.blade.php ENDPATH**/ ?>