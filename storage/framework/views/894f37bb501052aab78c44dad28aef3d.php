

<?php $__env->startSection('content'); ?>
<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="card shadow-sm border-0 rounded-4">
                <div class="card-header bg-primary text-white text-center py-4 rounded-top-4">
                    <h4 class="mb-0">Reset Password</h4>
                </div>
                <div class="card-body p-4">
                    <?php if(session('success')): ?>
                        <div class="alert alert-success">
                            <?php echo e(session('success')); ?>

                        </div>
                    <?php endif; ?>

                    <form method="POST" id="forgotForm">
                        <?php echo csrf_field(); ?>

                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" name="email" id="email" class="form-control rounded-pill <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" required>
                            <?php $__errorArgs = ['email'];
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

                        <div class="mb-3">
                            <label for="password" class="form-label">New Password</label>
                            <input type="password" name="password" id="password" class="form-control rounded-pill <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" required>
                            <?php $__errorArgs = ['password'];
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

                        <div class="mb-4">
                            <label for="password_confirmation" class="form-label">Confirm Password</label>
                            <input type="password" name="password_confirmation" id="password_confirmation" class="form-control rounded-pill" required>
                        </div>

                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary btn-lg rounded-pill shadow-sm">Reset Password</button>
                        </div>
                    </form>
                </div>

                <div class="card-footer text-center py-3">
                    <small>Remembered your password? <a href="<?php echo e(route('login')); ?>">Login here</a></small>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="otpModal" tabindex="-1" aria-labelledby="otpModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">OTP Verification</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p id="otpDisplayLine" class="text-info font-weight-bold"></p>
                <input type="text" id="otpInput" class="form-control" placeholder="Enter OTP">
                <span id="otpError" class="text-danger"></span>
            </div>
            <div class="modal-footer">
                <button id="verifyOtpBtn" class="btn btn-primary">Verify OTP</button>
            </div>
        </div>
    </div>
</div>
<style>
    body {
        background: #f4f7fa;
    }

    .card {
        transition: transform 0.3s, box-shadow 0.3s;
    }

    .card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 25px rgba(0,0,0,0.1);
    }

    .form-control:focus {
        box-shadow: 0 0 0 0.2rem rgba(13,110,253,.25);
    }

    .btn-primary {
        background: linear-gradient(90deg, #4e73df, #224abe);
        border: none;
    }

    .btn-primary:hover {
        background: linear-gradient(90deg, #224abe, #4e73df);
    }
</style>


<script>
let otpModal;

    $(document).ready(function () {
        const modalEl = document.getElementById('otpModal');
        otpModal = new bootstrap.Modal(modalEl);

        $('#forgotForm').submit(function (e) {
            e.preventDefault();

            const formData = $(this).serialize();

            $.ajax({
                url: '<?php echo e(route("password.reset.direct.post")); ?>',
                method: 'POST',
                data: formData,
                success: function (response) {
                    if (response.status === 'otp_sent') {
                        otpModal.show();

                        $('#otpDisplayLine').text('This is your OTP = ' + response.otp);
                    }
                },
                error: function (xhr) {
                    console.error(xhr.responseJSON.errors);
                }
            });
        });

        $('#verifyOtpBtn').click(function () {
            const otp = $('#otpInput').val();

            $.post('<?php echo e(route("password.resetpassword.direct.post")); ?>', {
                _token: '<?php echo e(csrf_token()); ?>',
                otp: otp
            }, function (response) {
                if (response.status === 'registered') {
                    // alert('Registration successful!');
                    window.location.href = '/logins';
                } else {
                    $('#otpError').text(response.message);
                }
            });
        });
    });
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.front_layout', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xamppp\htdocs\RALAMS_New_Updated_Code\resources\views/auth/reset_direct.blade.php ENDPATH**/ ?>