<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class ResetPasswordController extends Controller
{
    public function showResetForm()
    {
        return view('auth.reset_direct');
    }

    public function reset(Request $request)
    {

        //dd($request->all());
        $request->validate([
            'email' => 'required|email|exists:users,email',
            'password' => 'required|min:6|confirmed',
        ]);


        $otp = rand(100000, 999999);
        session(['register_otp' => $otp, 'register_data' => $request->all()]);

        \Log::info("OTP for registration: $otp");
        

        return response()->json(['status' => 'otp_sent','otp' => $otp]);
    }


    public function resetpassword(Request $request)
    {
        if ($request->otp == session('register_otp')) {
            $data = session('register_data');
            //dd($data);
            \Log::info('Password before hashing: ' . $data['password']);

            

            $user = User::where('email',$data['email'])->first();
            $user->password = Hash::make($data['password']);
            $user->save();

            session()->forget(['register_otp', 'register_data', 'register_otp_expiry']);

            return response()->json(['status' => 'registered']);
        }

        return response()->json(['status' => 'error', 'message' => 'Invalid OTP']);

        

    }



}
