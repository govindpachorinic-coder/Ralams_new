@extends('layouts.front_layout')

@section('content')
<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="card shadow-sm border-0 rounded-4">
                <div class="card-header bg-primary text-white text-center py-4 rounded-top-4">
                    <h4 class="mb-0">Reset Password</h4>
                </div>
                <div class="card-body p-4">
                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    <form method="POST" id="forgotForm">
                        @csrf

                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" name="email" id="email" class="form-control rounded-pill @error('email') is-invalid @enderror" required>
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label">New Password</label>
                            <input type="password" name="password" id="password" class="form-control rounded-pill @error('password') is-invalid @enderror" required>
                            @error('password')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
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
                    <small>Remembered your password? <a href="{{ route('login') }}">Login here</a></small>
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
                url: '{{ route("password.reset.direct.post") }}',
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

            $.post('{{ route("password.resetpassword.direct.post") }}', {
                _token: '{{ csrf_token() }}',
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
@endsection
