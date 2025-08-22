

<?php $__env->startSection('content'); ?>
<head>
    <title>Login</title>
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <style>
        body {
            /* background: linear-gradient(135deg, #74ebd5, #ACB6E5); */
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        .login-box {
            max-width: 450px;
            margin: 60px auto;
            background: #fff;
            border-radius: 15px;
            box-shadow: 0 0 25px rgba(0, 0, 0, 0.15);
            overflow: hidden;
        }
        .login-header {
            background-color: #004a87;
            color: #fff;
            text-align: center;
            padding: 20px;
            font-size: 20px;
            font-weight: bold;
        }
        .form-label {
            font-weight: 600;
        }
        .form-control {
            height: 45px;
            font-size: 14px;
        }
        .captcha-box {
            display: flex;
            align-items: center;
            gap: 15px;
        }
        .note-text {
            font-size: 12px;
            color: #555;
        }
        .btn-group {
            border-radius: 15px;
            display: flex;
            justify-content: space-between;
        }
        .form-container {
            padding: 25px 30px;
        }
    </style>
</head>

<div class="login-box">
    <div class="login-header">Login to Continue</div>
    <div class="form-container">
        <?php if(session('error')): ?>
            <div class="alert alert-danger"><?php echo e(session('error')); ?></div>
        <?php endif; ?>
        <form action="<?php echo e(route('login.submit')); ?>" method="POST">
            <?php echo csrf_field(); ?>

            <div class="mb-3">
                <label class="form-label">Email (User ID)<span class="text-danger">*</span></label>
                <input type="email" name="email" class="form-control" value="<?php echo e(old('email')); ?>" placeholder="Enter your email">
                <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><small class="text-danger"><?php echo e($message); ?></small><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>

            <div class="mb-3">
                <label class="form-label">Password<span class="text-danger">*</span></label>
                <input type="password" name="password" class="form-control" placeholder="Enter your password">
                <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><small class="text-danger"><?php echo e($message); ?></small><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>

            <div class="mb-3">
                <label class="form-label">CAPTCHA<span class="text-danger">*</span></label>
                <div class="captcha-box mb-2">
                    <span id="captchaImage"></span>
                    <button type="button" class="btn btn-outline-secondary btn-sm" id="reload">
                        &#x21bb;
                    </button>
                </div>
                <input type="text" name="captcha" class="form-control" placeholder="Enter Captcha">
                <?php $__errorArgs = ['captcha'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><small class="text-danger"><?php echo e($message); ?></small><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>

            <div class="mb-3 btn-group">
                <button type="submit" class="btn btn-primary">Login</button>&nbsp;&nbsp;&nbsp;&nbsp;
                <a href="<?php echo e(route('register')); ?>" class="btn btn-secondary text-white">Register</a>
            </div>

            <div class="text-end mb-2">
                <a href="<?php echo e(route('password.reset.direct')); ?>" class="text-decoration-none" style="font-size: 12px;">Forgot Password?</a>
            </div>

            <div class="note-text">
                <strong>Note:</strong> Your User ID is your Email ID, used during Registration.
            </div>
        </form>
    </div>
</div>

<!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> -->
<script>
$(document).ready(function () {
    loadCaptcha();

    $('#reload').click(function () {
        loadCaptcha();
    });

    function loadCaptcha() {
        $.ajax({
            type: 'GET',
            url: '<?php echo e(route("captcha.image")); ?>',
            success: function (data) {
                $('#captchaImage').html(data);
            },
            error: function () {
                $('#captchaImage').html('<span class="text-danger">Error loading CAPTCHA</span>');
            }
        });
    }

});
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.front_layout', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\RALAMS\resources\views/auth/logins.blade.php ENDPATH**/ ?>