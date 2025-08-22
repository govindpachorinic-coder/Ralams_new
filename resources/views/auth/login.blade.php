@section('content')

@if(session('otp_sent'))
<form action="{{ route('login.verify') }}" method="POST" class="p-4">
    @csrf
    <input type="hidden" name="phone" value="{{ session('phone') }}">
    <input type="text" name="otp" placeholder="Enter OTP" class="form-control mb-2" required>
    <button class="btn btn-success">Verify OTP</button>
</form>
@else
<form action="{{ route('login.sendotp') }}" method="POST" class="p-4">
    @csrf
    <input type="text" name="phone" placeholder="Phone" required class="form-control mb-2">
  
    <button class="btn btn-primary">Send OTP</button>
</form>
@endif

@endsection