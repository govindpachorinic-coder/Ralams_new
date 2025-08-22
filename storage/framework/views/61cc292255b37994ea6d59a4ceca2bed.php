
<?php $__env->startSection('title', __("labels.project_short_name")); ?>
<?php $__env->startSection('pagetitle', __("labels.dashboard")); ?>
<?php $__env->startSection('role_name', "Admin"); ?>
<link rel="stylesheet" href="<?php echo e(asset('css/all.css')); ?>" />
<style>
    .card-container {
        align-items: start;
        display: grid;
        justify-content: center;
    }

    @media (min-width:768px) {
        .card-container {
            grid-template-columns: repeat(auto-fit, 200px);
            grid-gap: 50px;
        }

        .serviceBox {
            width: 200px;
        }
    }

    @media (min-width:1024px) {
        .card-container {
            grid-template-columns: repeat(auto-fit, 220px);
            grid-gap: 70px;
        }

        .serviceBox {
            width: 220px;
        }
    }

    @media (min-width:1690px) {
        .card-container {
            grid-template-columns: repeat(auto-fit, 250px);
            grid-gap: 100px;
        }

        .serviceBox {
            width: 250px;
        }
    }
    .accordion-button:not(.collapsed) {
        border-bottom: 1px solid #0c63e4;
    }

    .accordion-button:not(.collapsed)::after {
        background-image: url(../images/minus.png);
        transform: rotate(-180deg);
    }

    .accordion-button::after {
        flex-shrink: 0;
        width: 1.25rem;
        height: 1.25rem;
        margin-left: auto;
        content: "";
        background-image: url(../images/plus.png);
        background-repeat: no-repeat;
        background-size: 1.25rem;
        transition: transform .2s ease-in-out;
    }
    
    .accordion-button:after {
        order: -1;
        margin-left: 0;
        margin-right: 0.5em;
    }

    a{
        text-decoration:none;
    }
    
    .serviceBox {
        background: #fff;
        font-family: 'Montserrat', sans-serif;
        text-align: center;
        /* padding: 0px 0px 30px;*/
        /*  margin: 40px auto;*/
        border-radius: 20px;
        box-shadow: 0 7px 5px -3px rgba(0, 0, 0, 0.3);
        position: relative;
        transition: all 0.3s ease;
        margin-bottom: 15px;
        min-height: 165px;
        margin: 0 auto;
    }

    .MainBox:nth-child(1) div {
        border: 2px solid #F39436;
    }

    .MainBox:nth-child(2) div {
        border: 2px solid #038bec;
    }

    .MainBox:nth-child(3) div {
        border: 2px solid #5CB85C;
    }

    .MainBox:nth-child(4) div {
        border: 2px solid #f53986;
    }

    .MainBox:nth-child(5) div {
        border: 0px solid #fff;
        /*border: 2px solid #019694;*/
    }

    .MainBox:nth-child(6) div {
        border: 2px solid #bfc027;
        /*border: 2px solid #019694;*/
    }

    .serviceBox:hover {
        box-shadow: 0 10px 10px rgba(0,0,0,0.2);
    }

    .serviceBox:before,
    .serviceBox:after {
        content: "";
        background: linear-gradient(to top,#008d86,#01a2a6);
        width: 8px;
        border-radius: 0 100px 100px 0;
        position: absolute;
        top: 16px;
        bottom: 18px;
        left: 0;
    }

    .serviceBox:after {
        border-radius: 100px 0 0 100px;
        left: auto;
        right: 0;
    }

    .serviceBox .service-icon {
        color: #fff;
        background: linear-gradient(-45deg, #008d86 49%, #01a2a6 50%);
        font-size: 30px;
        line-height: 62px;
        width: 70px;
        height: 70px;
        margin: -13px auto;
        border-radius: 100px;
        border: 5px solid #fff;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
        transform: translateY(-20px);
        transition: all 0.3s ease;
    }

    .serviceBox:hover .service-icon i {
        transform: rotateX(360deg);
        transition: all 0.3s;
    }

    .serviceBox .title {
        color: #008d86;
        font-size: 17px;
        font-weight: 700;
        margin: 10px;
    }

    .serviceBox .description {
        color: #000;
        font-size: 34px;
        line-height: 24px;
        margin: 0;
        font-family: 'digital-7';
    }

    .serviceBox .descriptionPercent {
        color: #000;
        font-size: 20px;
        line-height: 24px;
        margin: 0;
        font-family: Arial;
        padding-top: 7px;
    }

    .serviceBox .description1 {
        margin: 0;
        font-family: Source Sans Pro, sans-serif;
        font-weight: 400;
        font-size: 1rem;
        line-height: 1.5;
        letter-spacing: 0.00938em;
        color: #404040;
        font-size: 12px;
        font-style: italic;
        text-align: center;
    }

    .serviceBox.pink:before,
    .serviceBox.pink:after {
        background: rgb(220, 53, 69);
    }

    .serviceBox.pink .service-icon {
        background: rgb(220, 53, 69);
    }

    .serviceBox.pink .title {
        color:rgb(220, 53, 69);
    }

    .serviceBox.purple:before,
    .serviceBox.purple:after {
        background: rgb(240, 173, 78);
    }

    .serviceBox.purple .service-icon {
        background: rgb(240, 173, 78);
    }

    .serviceBox.purple .title {
        color: rgb(240, 173, 78);
    }

    .serviceBox.blue:before,
    .serviceBox.blue:after {
        background: rgb(92, 184, 92);
    }

    .serviceBox.blue .service-icon {
        background: rgb(92, 184, 92);
    }

    .serviceBox.blue .title {
        color: rgb(92, 184, 92);
    }

    .serviceBox.orange:before,
    .serviceBox.orange:after {
        background: rgb(13, 202, 240);
    }

    .serviceBox.orange .service-icon {
        background: rgb(13, 202, 240);
    }

    .serviceBox.orange .title {
        color: rgb(13, 202, 240);
    }

    .serviceBox.reddishbrown:before,
    .serviceBox.reddishbrown:after {
        background: linear-gradient(to top,#bfc027 49%,#bfc027);
    }

    .serviceBox.reddishbrown .service-icon {
        background: linear-gradient(-45deg,#797901 49%,#bfc027 50%);
    }

    .serviceBox.reddishbrown .title {
        color: #797901;
    }

    @media only screen and (max-width:990px) {
        .serviceBox {
            width: 260px;
        }
    }
  
</style>
<!-- <?php $__env->startSection('currentActivePage',1); ?> -->
<?php $__env->startSection('content'); ?>
<div class="wrapper">
    <main>
<div class="card-body">
    <div class="row">
        <div class="col-12 col-sm-12">
            <div class="accordion" id="accordionExample">
                <div class="accordion-item" id="DivPersonalDetails" runat="server" visible="false">
                    <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <div class="col-12 col-sm-12">
                                <div class="table-responsive">
                                    <section class="card-container" style="margin-top:50px;">
                                        <div class="col-md-4 col-sm-6 col-12 MainBox">
                                            <a href="<?php echo e(route('get.all.application','pending')); ?>" title="">
                                                <div class="serviceBox purple">
                                                    <div class="service-icon pt-3">
                                                        <span><i class="fa fa-spinner" aria-hidden="true"></i></span>
                                                    </div>
                                                    <h3 class="title"><?php echo e(__('labels.total_pending')); ?></h3>                                                    
                                                    <p class="description">
                                                        <asp:Label ID="LblQuestionNotices" runat="server"><?php echo e($pendingCount); ?></asp:Label>
                                                    </p>                                                                               
                                                </div>
                                            </a>
                                        </div>

                                        <div class="col-md-4 col-sm-6 col-12 MainBox">
                                            <a href="<?php echo e(route('get.all.application','processing')); ?>" title="">
                                                <div class="serviceBox orange">
                                                    <div class="service-icon pt-3">
                                                        <span><i class="fa fa-tasks" aria-hidden="true"></i></span>
                                                    </div>
                                                    <h3 class="title"><?php echo e(__('labels.total_processing')); ?></h3>                                                    
                                                    <p class="description">
                                                        <asp:Label ID="LblMotions" runat="server"><?php echo e($processingCount); ?></asp:Label>
                                                    </p>
                                                </div>
                                            </a>
                                        </div>

                                        <div class="col-md-4 col-sm-6 col-12 MainBox">
                                            <a href="<?php echo e(route('get.all.application','completed')); ?>" title="">
                                                <div class="serviceBox blue">
                                                    <div class="service-icon pt-3">
                                                        <span><i class="fa fa-check" aria-hidden="true"></i></span>
                                                    </div>
                                                    <h3 class="title"><?php echo e(__('labels.total_completed')); ?></h3>                                                    
                                                    <p class="description">
                                                        <asp:Label ID="LblBills" runat="server"><?php echo e($completedCount); ?></asp:Label>
                                                    </p>
                                                </div>
                                            </a>
                                        </div>

                                        <div class="col-md-4 col-sm-6 col-12 MainBox">
                                            <a href="<?php echo e(route('get.all.application','rejected')); ?>" title="">
                                                <div class="serviceBox pink">
                                                    <div class="service-icon pt-3">
                                                        <span><i class="fa fa-ban" aria-hidden="true"></i></span>
                                                    </div>
                                                    <h3 class="title"><?php echo e(__('labels.total_rejected')); ?></h3>                                                    
                                                    <p class="description">
                                                        <asp:Label ID="LblHouseSittings" runat="server"><?php echo e($rejectCount); ?></asp:Label>
                                                    </p>
                                                </div>
                                            </a>
                                        </div>
                                    </section>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</main>
</div>

<script>
    <?php if(session('error')): ?>
        toastr.error("<?php echo e(session('error')); ?>");
    <?php endif; ?>
</script>

<script type="text/javascript">
    $(document).ready(function () {
        $('.description').each(function () {
            $(this).prop('serviceBox', 0).animate({
                Counter: $(this).text()
            }, {
                duration: 500,
                easing: 'swing',
                step: function (now) {
                    $(this).text(Math.ceil(now));
                }
            });
        });
    });
</script>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.front_layout', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xamppp\htdocs\RALAMS_New_Updated_Code\resources\views/home.blade.php ENDPATH**/ ?>