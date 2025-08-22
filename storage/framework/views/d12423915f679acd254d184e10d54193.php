

<?php $__env->startSection('title', __('labels.project_short_name')); ?>
<?php $__env->startSection('pagetitle', __('labels.dashboard')); ?>

<?php $__env->startSection('role_name', 'Admin'); ?>
<!-- DataTables JS -->
<!-- jQuery -->
<!-- jQuery (only one!) -->

<!-- DataTables CSS -->
<?php // die('sdsdsdsddd');  ?>

<style>
    .pagination {
        margin-top: 20px;
    }

    .pagination .page-item .page-link {
        color: #007bff;
        border: 1px solid #dee2e6;
        padding: 8px 14px;
        font-weight: 500;
    }

    .pagination .page-item.active .page-link {
        background-color: #007bff;
        color: white;
        border-color: #007bff;
    }

    .pagination .page-item .page-link:hover {
        background-color: #e9ecef;
    }

    .text-muted {
        display: none;
    }



    .main-content {
        flex: 1;
    }

    .fa {
        color: #ffffff;
    }

    .hover_none {
        text-decoration: none !important;
        color: inherit !important;
    }

    .hover_none:hover {
        text-decoration: none !important;
        color: inherit !important;
    }

    /* Responsive 5-column layout for fixed width cards */
    .col-custom {
        width: 20%;
        float: left;
        padding: 10px;
    }

    @media (max-width: 992px) {
        .col-custom {
            width: 50%;
        }
    }

    @media (max-width: 576px) {
        .col-custom {
            width: 100%;
        }
    }

    /* Card container */
    .dashboard-card {
        height: 150px;
        border-radius: 16px;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        position: relative;
        display: flex;
        flex-direction: column;
        justify-content: center;
    }

    /* Card hover effect */
    .dashboard-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 12px 24px rgba(0, 0, 0, 0.15);
    }

    /* Icon container */
    .icon-circle {
        background-color: rgba(255, 255, 255, 0.2);
        border-radius: 50%;
        width: 60px;
        height: 60px;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-bottom: 10px;
        box-shadow: inset 0 0 5px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s ease;
    }

    /* Icon hover effect */
    .dashboard-card:hover .icon-circle {
        transform: scale(1.1) rotate(3deg);
    }

    /* Icon itself */
    .icon-circle i {
        font-size: 24px;
        color: #fff;
    }

    /* Card color themes */
    .bg-gradient-blue {
        background: linear-gradient(135deg, #3b82f6, #60a5fa);
    }

    .bg-gradient-yellow {
        background: linear-gradient(135deg, #f59e0b, #fbbf24);
    }

    .bg-gradient-green {
        background: linear-gradient(135deg, #10b981, #34d399);
    }

    .bg-gradient-red {
        background: linear-gradient(135deg, #ef4444, #f87171);
    }

    .bg-gradient-purple {
        background: linear-gradient(135deg, #a855f7, #d8b4fe);
    }

    /* Badge count styles */
    .badge {
        font-size: 14px;
        font-weight: 600;
        padding: 5px 10px;
        border-radius: 10px;
    }


    /* Count badge (top-right position) */
    .dashboard-card .badge {
        position: absolute;
        top: 10px;
        right: 10px;
        z-index: 1;
        font-size: 13px;
        font-weight: bold;
        padding: 6px 10px;
        border-radius: 999px;
        background: #fff;
        color: #333;
        box-shadow: 0 2px 6px rgba(0, 0, 0, 0.15);
    }

    .bg-gradient-orange {
        background: linear-gradient(135deg, #ff9800, #ff5722);
    }

    .row.mt-5 {
    margin-top: 80px !important;  /* उदाहरण के लिए 80px ऊपर की जगह, आप जरूरत के हिसाब से बढ़ा-घटा सकते हैं */
}

.custom-card {
      border-radius: 12px;
      box-shadow: 0 2px 8px rgba(0,0,0,0.08);
      padding: 20px;
      background: #fff;
    }
    .custom-title {
      background: #006699;
      padding: 10px;
      border-radius: 8px;
      font-size: 1.25rem;
      font-weight: 600;
      text-align: center;
      margin-bottom: 20px;
      color: white;
    }
    .modern-table {
      border-radius: 8px;
      overflow: hidden;
    }
    .modern-table thead {
      background-color: #13131433;
      font-weight: 600;
    }
    .modern-table tbody tr:hover {
      background-color: #f8f9fa;
    }
    .badge-custom {
      background-color: #ffe8cc;
      color: #d35400;
      font-size: 0.85rem;
      padding: 6px 12px;
      border-radius: 6px;
    }
    .fa{
        color: #cb6c50;
    }
    .asc_desc{
        color: #006699;
    }
   
</style>




<?php $__env->startSection('content'); ?>
    <div class="wrapper">
        <main>
        <div class="my-1" id="b-homedb">
            <div class="mt-5">
                

                <?php if(session('success')): ?>
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <?php echo e(session('success')); ?>

                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                <?php endif; ?>

                <?php if(!empty($getApplication)): ?>
                    <div class="my-4">
                        <div class="custom-card">
                            <div class="custom-title">
                                <?php if($type == 'pending'): ?>
                                    <?php echo e(__('labels.pending_application_list')); ?>

                                <?php elseif($type == 'processing'): ?>
                                        <?php echo e(__('labels.processing_application_list')); ?>

                                <?php elseif($type == 'error'): ?>
                                    <?php echo e(__('labels.error_application_list')); ?>

                                <?php elseif($type == 'reject'): ?>
                                    <?php echo e(__('labels.rejected_application_list')); ?>

                                <?php else: ?>
                                    <?php echo e(__('labels.completed_application_list')); ?>

                                <?php endif; ?>
                            </div>
                            <div class="table-responsive">
                                <table id="applicationTable" class="table table-bordered table-hover modern-table align-middle text-center">
                                    <thead>
                                        <tr class="asc_desc">
                                            <th><?php echo e(__("labels.S_no")); ?></th>
                                            <th><?php echo e(__("labels.app_no")); ?></th>
                                            <th><?php echo e(__("labels.purpose")); ?></th>
                                            <th><?php echo e(__("labels.rule")); ?></th>
                                            <th><?php echo e(__("labels.app_name")); ?></th>
                                            <th><?php echo e(__("labels.applicant_type")); ?></th>
                                            <th><?php echo e(__("labels.application_date")); ?></th>
                                            <th><?php echo e(__("labels.application_receive_date")); ?></th>
                                            <th><?php echo e(__("labels.action")); ?></th>

                                            <!-- <th><?php echo e(__('labels.S_no')); ?></th>
                                            <th><?php echo e(__('labels.app_no')); ?></th>
                                            <th><?php echo e(__('labels.applicant_purpose')); ?></th>
                                            <th><?php echo e(__('labels.application_date')); ?></th>
                                            <th><?php echo e(__('labels.rules')); ?></th>
                                            <th><?php echo e(__('labels.action')); ?></th> -->
                                        </tr>
                                    </thead>
                                    <tbody id="applicant_details">
                                        <?php if(count($getApplication) > 0): ?>
                                        <?php $__currentLoopData = $getApplication; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $application): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr id="row_101}}">
                                            <td><?php echo e($k + 1); ?></td>
                                            <td><a onclick="loadPreview('<?php echo e($application->application_number); ?>')"
                                                title="View"><?php echo e($application->application_number); ?></a></td>
                                            <td><?php echo e($application->purpose->purpose_name ?? '-'); ?></td>
                                            <td><?php echo e($application->rule->application_rule_name ?? '-'); ?></td>
                                            <td><?php echo e($application->applicant_name ?? 'N/A'); ?></td>
                                            <td><?php echo e($application->applicant_type ?? 'N/A'); ?></td>
                                            <td><?php echo e(date('d-m-Y',strtotime($application->created_at))); ?></td>
                                            <td><?php echo e(date('d-m-Y',strtotime($application->created_at))); ?></td>
                                            <!-- <td><?php echo e($application->landDetail->land_type ?? 'N/A'); ?></td> -->
                                            <td>
                                                  <a class="btn btn-md" 
                               href="<?php echo e(route('application.view',[base64_encode($application->id)])); ?>">
                               <i class="fa fa-eye"></i>
                            </a>
                                                
                                            <!-- Delete Button with Icon -->
                                            <?php if($type == 'pending'): ?>
                                                <form action="<?php echo e(route('user.delete_application', $application->id)); ?>"
                                                    method="POST" class="d-inline"
                                                    onsubmit="return confirm('Are you sure?')">
                                                    <?php echo csrf_field(); ?>
                                                    <button type="submit" class="btn btn-sm btn-danger" title="Delete">
                                                        <i class="fa fa-trash" aria-hidden="true"></i>
                                                    </button>
                                                </form>
                                            <?php endif; ?>


                                            <a class="btn btn-md" 
                               href="<?php echo e(route('edit.application',[base64_encode($application->id)])); ?>">
                               <i class="fa fa-edit"></i>
                            </a>
                                            </td>                                      
                                        </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php else: ?>
                                            <tr>
                                                <td colspan="6" style="text-align: center">
                                                    <?php echo e(__('labels.records_not_found')); ?></td>
                                            </tr>
                                        <?php endif; ?>
                                    </tbody>
                                </table>
                                
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </main>
    </div>
<?php $__env->stopSection(); ?>




<?php echo $__env->make('layouts.front_layout', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xamppp\htdocs\RALAMS_New_Updated_Code\resources\views/application_list_user.blade.php ENDPATH**/ ?>