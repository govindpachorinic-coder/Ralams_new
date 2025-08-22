
@extends('layouts.front_layout')
@section('content')
<head>
    <title>Login</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
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
        @if(session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif
        <form action="{{ route('login.submit') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label class="form-label">Email (User ID)<span class="text-danger">*</span></label>
                <input type="email" name="email" class="form-control" value="{{ old('email') }}" placeholder="Enter your email">
                @error('email')<small class="text-danger">{{ $message }}</small>@enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Password<span class="text-danger">*</span></label>
                <input type="password" name="password" class="form-control" placeholder="Enter your password">
                @error('password')<small class="text-danger">{{ $message }}</small>@enderror
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
                @error('captcha')<small class="text-danger">{{ $message }}</small>@enderror
            </div>

            <div class="mb-3 btn-group">
                <button type="submit" class="btn btn-primary">Login</button>&nbsp;&nbsp;&nbsp;&nbsp;
                <a href="{{ route('register') }}" class="btn btn-secondary text-white">Register</a>
            </div>

            <div class="text-end mb-2">
                <a href="{{ route('password.reset.direct') }}" class="text-decoration-none" style="font-size: 12px;">Forgot Password?</a>
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
</script>
@endsection
