@extends('application_layout')
@section('content')

<head>
    <title>Register</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"> -->

    <style>
        body {
            background-color: #f4f4f4;
        }

        .register-box {
            width: 600px;
            margin: 50px auto;
            background-color: #FFFFCC;
            border: 1px solid #ccc;
        }

        .register-header {
            background-color: #004a87;
            color: #fff;
            padding: 8px 15px;
            font-weight: bold;
        }

        .form-label {
            font-size: 14px;
            font-weight: bold;
        }

        .form-control {
            font-size: 14px;
            height: 30px;
        }

        .captcha-box {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .note-text {
            font-size: 12px;
            color: red;
        }
    </style>
</head>

<div class="register-box shadow">
    <div class="register-header">Register</div>
    <div class="p-3">
        <form id="registerForm">
            @csrf

            <div class="row">
                <div class="col-md-6">

                    <div class="mb-2">
                        <label class="form-label">SSO ID</label>
                        <input type="text" name="sso_id" class="form-control" value="{{ old('sso_id') }}">
                        @error('sso_id')<small class="text-danger">{{ $message }}</small>@enderror
                    </div>

                    <div class="mb-2">
                        <label class="form-label">First Name<span class="text-danger">*</span></label>
                        <input type="text" name="name" class="form-control" value="{{ old('name') }}">
                        @error('name')<small class="text-danger">{{ $message }}</small>@enderror
                    </div>

                    <div class="mb-2">
                        <label class="form-label">Last Name<span class="text-danger">*</span></label>
                        <input type="text" name="lname" class="form-control" value="{{ old('lname') }}">
                        @error('lname')<small class="text-danger">{{ $message }}</small>@enderror
                    </div>

                    <div class="mb-2">
                        <label class="form-label">Display Name<span class="text-danger">*</span></label>
                        <input type="text" name="disname" class="form-control" value="{{ old('disname') }}">
                        @error('disname')<small class="text-danger">{{ $message }}</small>@enderror
                    </div>

                    <div class="mb-2">
                        <label class="form-label">Mobile No<span class="text-danger">*</span></label>
                        <input type="text" name="phone" class="form-control" value="{{ old('phone') }}">
                        @error('phone')<small class="text-danger">{{ $message }}</small>@enderror
                    </div>

                    <div class="mb-2">
                        <label class="form-label">E-Mail<span class="text-danger">*</span></label>
                        <input type="email" name="email" class="form-control" value="{{ old('email') }}">
                        @error('email')<small class="text-danger">{{ $message }}</small>@enderror
                    </div>

                    <div class="mb-2">
                        <label class="form-label">Aadhar Id<span class="text-danger">*</span></label>
                        <input type="text" name="aadhar_id" class="form-control" value="{{ old('aadhar_id') }}">
                        @error('aadhar_id')<small class="text-danger">{{ $message }}</small>@enderror
                    </div>

                    <div class="mb-2">
                        <label class="form-label">Employee Id<span class="text-danger">*</span></label>
                        <input type="text" name="employee_id" class="form-control" value="{{ old('employee_id') }}">
                        @error('employee_id')<small class="text-danger">{{ $message }}</small>@enderror
                    </div>

                    <div class="mb-2">
                        <label class="form-label">Address<span class="text-danger">*</span></label>
                        <input type="text" name="address" class="form-control" value="{{ old('address') }}">
                        @error('address')<small class="text-danger">{{ $message }}</small>@enderror
                    </div>

                    <div class="mb-2">
                        <label class="form-label">Code<span class="text-danger">*</span></label>
                        <input type="text" name="code" class="form-control" value="{{ old('code') }}">
                        @error('code')<small class="text-danger">{{ $message }}</small>@enderror
                    </div>

                    <div class="mb-2">
                        <label class="form-label">State<span class="text-danger">*</span></label>
                        <input type="text" name="state" class="form-control" value="{{ old('state') }}">
                        @error('state')<small class="text-danger">{{ $message }}</small>@enderror
                    </div>

                    <div class="mb-2">
                        <label class="form-label">Village<span class="text-danger">*</span></label>
                        <input type="text" name="village" class="form-control" value="{{ old('village') }}">
                        @error('village')<small class="text-danger">{{ $message }}</small>@enderror
                    </div>

                    <div class="mb-2">
                        <label class="form-label">District<span class="text-danger">*</span></label>
                        <input type="text" name="district" class="form-control" value="{{ old('district') }}">
                        @error('district')<small class="text-danger">{{ $message }}</small>@enderror
                    </div>

                    <div class="mb-2">
                        <label class="form-label">User Type<span class="text-danger">*</span></label>
                        <input type="text" name="user_type" class="form-control" value="{{ old('user_type') }}">
                        @error('user_type')<small class="text-danger">{{ $message }}</small>@enderror
                    </div>

                    <div class="mb-2">
                        <label class="form-label">Department</label>
                        <input type="text" name="department" class="form-control" value="{{ old('department') }}">
                        @error('department')<small class="text-danger">{{ $message }}</small>@enderror
                    </div>

                    <div class="mb-2">
                        <label class="form-label">Designation</label>
                        <input type="text" name="designation" class="form-control" value="{{ old('designation') }}">
                        @error('designation')<small class="text-danger">{{ $message }}</small>@enderror
                    </div>

                    <div class="col-md-12" id="org_status" align="left">
                        <span>{{ __('labels.applicant_type') }}:</span>
                        <div class="inline-radio">
                            <label>
                                <input type="radio" name="applicant_type" id="personal" value="personal"
                                    checked> {{ __('labels.personal') }}
                            </label>
                            <label class="ml-3">
                                <input type="radio" name="applicant_type" value="orgnization">
                                {{ __('labels.organization') }}
                            </label>
                            <label class="ml-3">
                                <input type="radio" name="applicant_type" value="department">
                                {{ __('labels.department') }}
                            </label>
                        </div>
                    </div>


                    <div class="col-md-6" align="left">
                        <label for="khatedar_district">{{ __('labels.khatedar_district') }}<span
                                style="color: red;">*</span></label>
                        <select name="district" class="form-control" id="district_id" required>
                            <option value="">{{ __('labels.select_district') }}</option>
                            @foreach ($districts as $district)
                                <option value="{{ $district->district_code }}">
                                    {{ $district->District_Name }}</option>
                            @endforeach
                        </select>
                        <span id="district_error" style="color: red;"></span>

                    </div>
                    <div class="col-md-6" align="left">
                        <label for="khatedar_tehsil">{{ __('labels.khatedar_tehsil') }}<span
                                style="color: red;">*</span></label>
                        <select name="tehsil" id="tehsil_id" class="form-control" required>
                            <option value="">{{ __('labels.select_tehsil') }}</option>
                        </select>

                        <span id="tehsil_error" style="color: red;"></span>
                    </div>
                    <div class="col-md-6 mt-3" align="left">
                        <label for="village">{{ __('labels.village') }}<span
                                style="color: red;">*</span></label>
                        <select name="village" id="village_id" class="form-control" required>
                            <option value="">{{ __('labels.select_vill') }}</option>
                        </select>
                        <span id="village-error" class="error-message" style="color:red"></span>
                        <span id="village_error" style="color: red;"></span>
                    </div>

                    <div class="col-md-12" id="org_status" align="left">
                        <span>{{ __('labels.applicant_type') }}:</span>
                        <div class="inline-radio">
                            <label>
                                <input type="radio" name="applicant_type" id="personal" value="personal"
                                    checked> {{ __('labels.personal') }}
                            </label>
                            <label class="ml-3">
                                <input type="radio" name="applicant_type" value="orgnization">
                                {{ __('labels.organization') }}
                            </label>
                            <label class="ml-3">
                                <input type="radio" name="applicant_type" value="department">
                                {{ __('labels.department') }}
                            </label>
                        </div>
                    </div>

                </div>

                <div class="col-md-6">
                    <div class="mb-2">
                        <label class="form-label">CAPTCHA</label>
                        <div class="captcha-box">
                            <span id="captchaImage"></span>
                            <button type="button" class="btn btn-outline-secondary btn-sm" id="reload">&#x21bb;</button>
                        </div>
                        <input type="text" name="captcha" class="form-control mt-2" placeholder="Enter Captcha">
                        <div class="text-danger" id="captchaError"></div>
                    </div>

                </div>
            </div>

            <div class="mb-2">
                <button type="submit" class="btn btn-primary btn-sm">Register</button>
                <a href="#" class="ms-2">Already Registered?</a>
            </div>

            <div class="note-text mt-2">
                <ol class="mb-0 ps-3">
                    <li>Your Email ID will be your User ID.</li>
                    <li>Password should be at least 8 characters long and should contain at least 1 uppercase, 1 lowercase, 1 numeric and 1 special character.</li>
                </ol>
            </div>
        </form>
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

<!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> -->
<!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script> -->

<script>
$(document).ready(function () {
    loadCaptcha();

    $('#reload').click(function () {
        loadCaptcha();
    });

    function loadCaptcha() {
        $.ajax({
            type: 'GET',
            url: '{{ route("captcha.image") }}',
            success: function (data) {
                $('#captchaImage').html(data);
            },
            error: function () {
                $('#captchaImage').html('<span class="text-danger">Error loading CAPTCHA</span>');
            }
        });
    }

});



    let otpModal;

    $(document).ready(function () {
        const modalEl = document.getElementById('otpModal');
        otpModal = new bootstrap.Modal(modalEl);

        $('#registerForm').submit(function (e) {
            e.preventDefault();

            const formData = $(this).serialize();

            $.ajax({
                url: '{{ route("register.sendOtp") }}',
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

            $.post('{{ route("register.verifyOtp") }}', {
                _token: '{{ csrf_token() }}',
                otp: otp
            }, function (response) {
                if (response.status === 'registered') {
                    alert('Registration successful!');
                    window.location.href = '/dashboard';
                } else {
                    $('#otpError').text(response.message);
                }
            });
        });
    });


    $('#reload').click(function () {
        $.ajax({
            type: 'GET',
            url: '{{ route("captcha.image") }}',
            success: function (data) {
                $('#captchaImage').html(data);
            }
        });
    });

</script>

@endsection
