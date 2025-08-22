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
use App\Models\Applicant;
use App\Models\ApplicationTransaction;
use App\Models\UserLog;
use App\Models\District;
use App\Models\Tehsil;
use App\Models\Village;
use App\Models\MasterAttachment;
use App\Models\Application;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;
use Exception;

class AuthController extends Controller
{
    public function showRegisterForm()
    {
        return view('auth.register');
    }

    public function land_selection()
    {
        return view('land_selection');
    }

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:100',
            'email' => 'required|email|unique:users,email',
            'phone' => 'required|digits:10|unique:users,phone',
            'password' => [
                'required',
                'string',
                'min:8',
                'confirmed',
                'regex:/[A-Z]/',
                'regex:/[a-z]/',
                'regex:/[0-9]/',
                'regex:/[@$!%*#?&]/',
            ]
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->password = Hash::make($request->password);
        $user->save();

        return redirect()->route('login.form')->with('success', 'Registration successful!');
    }

    public function showLoginForm()
    {
        if (Auth::check()) {
            return redirect('dashboard');
        } else {
            return view('auth.logins');
        }
    }

    public function showLoginForms()
    {
        if (Auth::check()) {
            return redirect()->route('dashboard');
        }
        return view('auth.logins');
    }




    public function submoitlogin(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
            //'captcha' => 'required|captcha'
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            log_activity('login');
            $authData = Auth::user();
            UserLog::create([
                'sso_id' => null,
                'ralams_id' => null,
                'user_id' => $authData->id,
                'user_email' => $authData->email,
                'user_type' => $authData->user_type,
                'ipaddress' => request()->ip(),
                'macaddress' => null,
                'login_time' => now(),
                'logout_time' => null
            ]);

            if ( in_array( Auth::user()->user_type, array( 'SDO', 'DC', 'DA','DM', 'IRA' , 'SG','TDR','ILR','BDO','Patwari' ) ) )
            {
                return redirect()->route('user.dashboard');
            }
            return redirect()->intended('/dashboard');

        }

        return back()->with('error', 'Invalid credentials or captcha.')->withInput();
    }

    public function logout()
    {
        $log = UserLog::where('user_id', Auth::id())->whereNull('logout_time')->latest('login_time')->first();
        if ($log) {
            $log->logout_time = now();
            $log->save();
        }
        Auth::logout();
        return redirect()->route('login');
    }

    public function getlocation(Request $request)
    {
        $type = $request->query('type');
        $value = $request->query('value');

        try {
            if ($type === 'districts') {
                $data = District::select('district_code', 'District_Name')->orderBy('District_Name','ASC')->get();

            } elseif ($type === 'district') {
                if (empty($value)) {
                    return response()->json(['error' => 'Missing district value'], 400);
                }

                $district = District::where('district_code', $value)->first();
                if (!$district) {
                    return response()->json(['error' => 'District not found'], 404);
                }

                $data = Tehsil::where('District_ID1', $district->District_ID1)
                     ->orderBy('Block_Name','ASC')
                    ->select('Block_Name', 'Block_id1')
                    ->get();

            } elseif ($type === 'tehsil') {
                if (empty($value)) {
                    return response()->json(['error' => 'Missing tehsil value'], 400);
                }

                $data = Village::where('Tehsil_Code', $value)
                    ->orderBy('Village_Name','ASC')
                    ->select('Village_Name', 'Village_Id')
                    ->get();

            } else {
                return response()->json(['error' => 'Invalid type parameter'], 400);
            }

            return response()->json($data);

        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }




    public function getKhasra(Request $request)
    {
        $villageCode = $request->input('village_code');

        if (empty($villageCode)) {
            return response()->json(['error' => 'Missing village code'], 400);
        }

        $secret_key = 'CXAEn1YNSvK-dRH6SAOd2gCXAEn1YNSvK-dRH6SAOd2g';
        $username = 'revenue@lrc%^ptpfc';

        date_default_timezone_set('Asia/Kolkata');
        $iat = time();
        $exp = $iat + 3600;

        $payload = [
            'RefrenceNo' => $username,
            'iat' => $iat,
            'exp' => $exp,
            'Village_lgcode' => $villageCode
        ];

        try {
            $token = JWT::encode($payload, $secret_key, 'HS256');

            $api_url = "http://10.68.128.115/RestAPi/api/Revenuestay/khasra_detail";

            $ch = curl_init($api_url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);

            $api_payload = json_encode(['token' => $token]);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $api_payload);

            $response = curl_exec($ch);

            if (curl_errno($ch)) {
                $error = curl_error($ch);
                curl_close($ch);
                return response()->json(['error' => "cURL Error: $error"], 500);
            }

            $http_status = curl_getinfo($ch, CURLINFO_HTTP_CODE);
            curl_close($ch);

            $responseDecoded = json_decode($response, true);

            try {
                $decoded = JWT::decode($token, new Key($secret_key, 'HS256'));
                $token_status = "valid";
            } catch (Exception $e) {
                $decoded = $e->getMessage();
                $token_status = "invalid";
            }

            return response()->json([
                'generated_token' => $token,
                'token_status' => $token_status,
                'decoded_data' => $decoded,
                'api_status_code' => $http_status,
                'api_response' => $responseDecoded
            ]);

        } catch (Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }


    public function getKhasraDetails(Request $request)
    {
        $villageCode = $request->input('Village_lgcode');
        $khasra = $request->input('khasra');

        if (empty($villageCode) || empty($khasra)) {
            return response()->json(['error' => 'Missing Village_lgcode or khasra'], 400);
        }

        $secret_key = 'CXAEn1YNSvK-dRH6SAOd2gCXAEn1YNSvK-dRH6SAOd2g';
        $username = 'revenue@lrc%^ptpfc';

        date_default_timezone_set('Asia/Kolkata');
        $iat = time();
        $exp = $iat + 3600;

        $payload = [
            'RefrenceNo' => $username,
            'iat' => $iat,
            'exp' => $exp,
            'Village_lgcode' => $villageCode,
            'khasra' => $khasra
        ];

        try {
            $token = JWT::encode($payload, $secret_key, 'HS256');

            $api_url = "http://10.68.128.115/RestAPi/api/Revenuestay/Land_owner_Detail";

            $ch = curl_init($api_url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);

            $api_payload = json_encode(['token' => $token]);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $api_payload);

            $response = curl_exec($ch);

            if (curl_errno($ch)) {
                $error = curl_error($ch);
                curl_close($ch);
                return response()->json(['error' => "cURL Error: $error"], 500);
            }

            $http_status = curl_getinfo($ch, CURLINFO_HTTP_CODE);
            curl_close($ch);

            $responseDecoded = json_decode($response, true);

            try {
                $decoded = JWT::decode($token, new Key($secret_key, 'HS256'));
                $token_status = "valid";
            } catch (Exception $e) {
                $decoded = $e->getMessage();
                $token_status = "invalid";
            }

            return response()->json([
                "generated_token" => $token,
                "token_status" => $token_status,
                "decoded_data" => $decoded,
                "api_status_code" => $http_status,
                "full_response" => $responseDecoded['api_response']['data'] ?? [],
                'data' => $responseDecoded
            ]);

        } catch (Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function home()
    {
        $userId = Auth::user()->id;


        $pendingCount = ApplicationTransaction::where('forward_to_id', $userId)->where('status', 'pending')->distinct('application_id', 'forward_to_id')->count();
        $completedCount = ApplicationTransaction::where('forward_to_id', $userId)->where('status', 'completed')->distinct('application_id')->count();
        $processingCount = ApplicationTransaction::where('forward_to_id', $userId)->where('status', 'processing')->distinct('application_id')->count();
        $rejectCount = ApplicationTransaction::where('forward_to_id', $userId)->where('status', 'rejected')->distinct('application_id')->count();

        return view('home', compact('pendingCount', 'completedCount', 'processingCount', 'rejectCount'));
    }


    public function user_dashboard()
    {
        return view('user_dashboard');
    }

    public function getIncompleteApplication()
    {
        $loginUserID = Auth::id();
        $getIncompleteApplication = Application::where('user_id', $loginUserID)->where('status_flag', 't')->paginate(10);
        return view('user_dashboard', compact('getIncompleteApplication'));
    }



}