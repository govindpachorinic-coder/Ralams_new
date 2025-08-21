@extends('public_layout')
@section('content')
<head>
    <title>Login</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"> -->
    <style>
        body {
            background-color: #f4f4f4;
        }
        .login-box {
            width: 1000px;
            margin: 20px auto;
            background-color: #FFFFCC;
            border: 1px solid #ccc;
        }
        .login-header {
            background-color: #004a87;
            color: #fff;
            padding: 10px 15px;
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
        .btn-group {
            display: flex;
            gap: 10px;
        }
    </style>
</head>

<div class="login-box shadow">
    <div class="login-header">Login to continue....</div>
    <div class="p-3">
        @if(session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif
        <form action="{{ route('login.submit') }}" method="POST">
            @csrf

            <div class="mb-2">
                <label class="form-label">User ID<span class="text-danger">*</span></label>
                <input type="email" name="email" class="form-control" value="{{ old('email') }}">
                @error('email')<small class="text-danger">{{ $message }}</small>@enderror
            </div>

            <div class="mb-2">
                <label class="form-label">Password<span class="text-danger">*</span></label>
                <input type="password" name="password" class="form-control">
                @error('password')<small class="text-danger">{{ $message }}</small>@enderror
            </div>

            <div class="mb-2">
                <label class="form-label">CAPTCHA<span class="text-danger">*</span></label>
                <div class="captcha-box">
                    <span id="captchaImage"></span>
                    <button type="button" class="btn btn-outline-secondary btn-sm" id="reload">&#x21bb;</button>
                </div>
                <input type="text" name="captcha" class="form-control mt-2" placeholder="Enter Captcha">
                @error('captcha')<small class="text-danger">{{ $message }}</small>@enderror
            </div>

            <div class="mb-2 btn-group">
                <button type="submit" class="btn btn-primary btn-sm">Login</button>
                <a  class="btn btn-warning btn-sm text-white">Register</a>
            </div>

            <div class="mt-2">
                <a href="#" class="text-primary" style="font-size: 12px;">Forgot Your Password?</a>
            </div>

            <div class="note-text mt-3">
                1. Your User ID is your Email ID, which was given at the time of Registration.
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