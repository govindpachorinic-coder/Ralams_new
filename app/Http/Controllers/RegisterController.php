<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use App\Models\TblUser;



class RegisterController extends Controller
{
    public function sendOtp(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'phone' => 'required',
        ]);

        $otp = rand(100000, 999999);
        session(['register_otp' => $otp, 'register_data' => $request->all()]);

        \Log::info("OTP for registration: $otp");
        

        return response()->json(['status' => 'otp_sent','otp' => $otp]);
    }


    public function verifyOtp(Request $request)
    {
        if ($request->otp == session('register_otp')) {
            $data = session('register_data');
            \Log::info('Password before hashing: ' . $data['password']);

            $user = \App\Models\User::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'department' => $data['department'] ?? null,
                'password' => Hash::make($data['password']),
                'phone' => $data['phone'],
                'departmentId' => $data['departmentId'] ?? null,
                'sso_id' => $data['sso_id'] ?? null,
                'sso_token' => $data['sso_token'] ?? null,
            ]);

            session()->forget(['register_otp', 'register_data', 'register_otp_expiry']);

            return response()->json(['status' => 'registered']);
        }

        return response()->json(['status' => 'error', 'message' => 'Invalid OTP']);
    }

    public function generateCaptcha()
    {
        $random_num = md5(random_bytes(64));
        $captcha_code = substr($random_num, 0, 6);
        session(['CAPTCHA_CODE' => $captcha_code]);

        $layer = \imagecreatetruecolor(250, 60);
        $captcha_bg = \imagecolorallocate($layer, 255, 255, 230);
        \imagefill($layer, 0, 0, $captcha_bg);
        $line_color = \imagecolorallocate($layer, 64, 64, 64);
        for ($i = 0; $i < 4; $i++) {
            \imageline($layer, 0, rand() % 50, 250, rand() % 50, $line_color);
        }
        $pixel_color = \imagecolorallocate($layer, 158, 78, 0);
        for ($i = 0; $i < 250; $i++) {
            \imagesetpixel($layer, rand(0, 250), rand(0, 80), $pixel_color);
        }

        $x = 10;
        $y = 30;
        $font = public_path('fonts/arial.ttf');
        for ($i = 0; $i < strlen($captcha_code); $i++) {
            $x += rand(25, 30);
            $y = max(30, min(40, 30 + rand(-10, 10)));
            \imagettftext($layer, 30, 0, $x, $y,
                \imagecolorallocate($layer, mt_rand(0, 100), mt_rand(0, 100), mt_rand(0, 100)),
                $font, $captcha_code[$i]);
        }

        ob_start();
        \imagepng($layer);
        $rawImageBytes = ob_get_clean();
        \imagedestroy($layer);

        return response("<img height='50px' width='150px' src='data:image/png;base64," . base64_encode($rawImageBytes) . "' />");
    }

    public function sso_details(Request $request)
    {
        $validatedData = $request->validate([
            'SSOID' => 'required|string|max:255|unique:tbl_user,SSOID',
            'displayName' => 'required|string|max:255',
            'dateOfBirth' => 'nullable|date',
            'gender' => 'nullable|string|max:10',
            'mobile' => 'nullable|string|max:10',
            //'postalCode' => 'nullable|string|max:20',
            'l' => 'nullable|string|max:255',
            'st' => 'nullable|string|max:255',
            'designation' => 'nullable|string|max:255',
            'department' => 'nullable|string|max:255',
            'employeeNumber' => 'nullable|string|max:100',
            'departmentId' => 'nullable|integer',
            'firstName' => 'nullable|string|max:255',
            'lastName' => 'nullable|string|max:255',
            'userType' => 'nullable|string|max:50',
            'mfa' => 'nullable|string|max:50',
            'sansthaAadhaar' => 'nullable|string|max:20',
        ]);

        $user = TblUser::create($validatedData);

        return redirect()->route('logins.form') 
            ->with('success', 'Data saved successfully!');
    }


    public function sso_details_view() {
        return view('sso_details');
    }


}