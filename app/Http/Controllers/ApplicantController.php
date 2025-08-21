<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Application;
use App\Models\ApplicationTransaction;
use App\Models\Tehsil;
use App\Models\District;
use App\Models\Village;
use App\Models\Block;
use App\Models\User;
use Auth, DB;

class ApplicantController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public $user;

    public function __construct()
    {
        $this->user = Auth::id();
    }

    public function getAllApplications($status){        
        $statusArr = array('pending','processing','completed','rejected');
        if(!in_array($status, $statusArr)){
            return redirect()->route('home')->with('error','Invalid status');
        }
        $userid = Auth::user()->id;        
        
        $latestTransactions = ApplicationTransaction::selectRaw('MAX(id) as id')
            ->where('forward_to_id', $userid)
            ->where('status', $status)
            ->groupBy('application_id');

        $applications = ApplicationTransaction::whereIn('id', $latestTransactions->pluck('id'))
            ->with('application')
            ->orderBy('id', 'DESC')
            ->paginate(10); 
        //dd($applications);                                                
        return view('application_list',compact('applications','status'));        
    }

    public function updateApplicationStatus(Request $request)
    {
        $data = $request->all();
        $forwardToUserData = User::where('id', $data['forward_to'])->first();
        $request->validate([
            'attachment' => 'nullable|file|mimes:pdf|max:2048',
            'comment' => 'required',
            'forward_to_role' => 'required_if:status,next',
            'forward_to' => 'required_if:status,next',
        ], [
            'attachment.required' => 'Please upload a file.',
            'attachment.mimes' => 'Only PDF files are allowed.',
            'attachment.max' => 'File size must be less than 2MB.',
            'comment.required' => 'Please enter comment',
        ]);
        try {
            DB::beginTransaction();
            $application = Application::find($data['application_id']);
            if ($data['status'] === 'next') {
                ApplicationTransaction::where('application_id', $data['application_id'])->where('forward_to_id', $this->user)->update(['status' => 'processing']);

                $filepath = '';
                if ($request->hasFile('attachment')) {
                    $file = $request->file('attachment');
                    $filename = time() . '_' . $file->getClientOriginalName();
                    $filepath = $file->storeAs('attachments', $filename);
                }
                $application->last_forward_to_id = $data['forward_to'];
                ApplicationTransaction::where('application_id', $data['application_id'])->where('forward_to_id', $data['forward_to'])->update(['status' => 'pending']);
                $transactiondata = ApplicationTransaction::create([
                    'application_id' => $data['application_id'],
                    'application_number' => $application->application_number ?? '',
                    'forward_from_id' => Auth::user()->id,
                    'forward_from_sso' => Auth::user()->sso_id,
                    'forward_from_user_type' => Auth::user()->user_type,
                    'forward_to_id' => $data['forward_to'],
                    'forward_to_sso' => $forwardToUserData->sso_id ?? '',
                    'forward_to_user_type' => $forwardToUserData->user_type ?? '',
                    'comment' => $data['comment'],
                    'forward_file' => $filepath,
                    'status' => 'pending'
                ]);

                $application->status = in_array($data['status'], array('rejected', 'completed')) ? $data['status'] : 'processing';
                $application->save();
                $userType = $data['forward_to_role'];
                $userID = $data['forward_to'];
                $userData = User::where('id', $userID)->where('user_type', $userType)->with('blockData')->first();
                $location = "";
                $message = "";
                if (!empty($userData)) {
                    if ($userType == 'DM') {
                        $location = $userData->district->District_Name;
                    } elseif ($userType == 'SDO' || $userType == 'TDR') {
                        $location = $userData->blockData->Block_Name;
                    } elseif ($userType == 'Patwari') {
                        $location = $userData->village->Village_Name;
                    }
                }
                $commentdata = ApplicationTransaction::find($transactiondata->id);
                $dataArr = [
                    'comment' => strip_tags($commentdata->comment),
                    'name' => $commentdata->fromuser->name,
                    'user_typr' => $commentdata->fromuser->user_type,
                    'created_at' => date('d-m-Y h:i:s', strtotime($commentdata->created_at))
                ];
                $message = "Application send to " . $userType . ' ' . $location;
                log_activity('Application forwarding');
            } elseif (in_array($data['status'], ['rejected', 'completed'])) {
                $dataArr = array();
                $application->status = $data['status'];
                $application->save();
                ApplicationTransaction::where('application_id', $data['application_id'])->update(['status' => $data['status']]);
                $message = "Application marked as {$data['status']}";
                log_activity('Application ' . $data['status']);
            }
            DB::commit();
            return response()->json(['status' => true, 'message' => $message, 'data' => $dataArr]);
        } catch (\Exception $e) {
            //dd($e);                  
            DB::rollback();
            return response()->json(['status' => false, 'error' => 'Something went wrong.']);
        }

    }

    public function changeApplicationStatus(Request $request)
    {
        $data = $request->all();
        $request->validate([
            'attachment' => 'nullable|file|mimes:pdf|max:2048',
            'comment' => 'required',
            'forward_to_role' => 'required_if:action,forward',
            'forward_to' => 'required_if:action,forward',
        ], [
            'attachment.required' => 'Please upload a file.',
            'attachment.mimes' => 'Only PDF files are allowed.',
            'attachment.max' => 'File size must be less than 2MB.',
            'comment.required' => 'Please enter comment',
        ]);
        try {
            DB::beginTransaction();
            $application = Application::find($data['application_id']);
            $filepath = '';
            $message = "";
            if ($request->hasFile('attachment')) {
                $file = $request->file('attachment');
                $filename = time() . '_' . $file->getClientOriginalName();
                $filepath = $file->storeAs('attachments', $filename);
            }

            if ($data['action'] == 'forward') {
                ApplicationTransaction::where('application_id', $data['application_id'])->where('forward_to_id', $this->user)->update(['status' => 'processing']);

                $application->last_forward_to_id = $data['forward_to'];
                ApplicationTransaction::where('application_id', $data['application_id'])->where('forward_to_id', $data['forward_to'])->update(['status' => 'pending']);
                $transactiondata = ApplicationTransaction::create([
                    'application_id' => $data['application_id'],
                    'application_number' => $application->application_number,
                    'forward_from_id' => Auth::user()->id,
                    'forward_to_id' => $data['forward_to'],
                    'comment' => $data['comment'],
                    'forward_file' => $filepath,
                    'status' => 'pending'
                ]);
                if ($application->status == 'pending') {
                    $application->status = 'processing';
                    $application->save();
                }
                $userType = $data['forward_to_role'];
                $userID = $data['forward_to'];
                $userData = User::where('id', $userID)->first();
                $location = "";
                if (!empty($userData)) {
                    if ($userType == 'DM') {
                        $location = $userData->district->District_Name;
                    } elseif ($userType == 'SDO' || $userType == 'TDR') {
                        $location = $userData->blockData->Block_Name;
                    } elseif ($userType == 'Patwari') {
                        $location = $userData->village->Village_Name;
                    }
                }
                $commentdata = ApplicationTransaction::find($transactiondata->id);
                $message = "Application send to " . $userType . ' ' . $location;
                log_activity('Application forwarding');
            } elseif ($data['action'] == 'revert') {
                $transaction = ApplicationTransaction::find($data['transaction_id']);
                ApplicationTransaction::where('application_id', $data['application_id'])->where('forward_to_id', $this->user)->update(['status' => 'processing']);

                $application->last_forward_to_id = $transaction->forward_from_id;
                ApplicationTransaction::where('application_id', $data['application_id'])->where('forward_to_id', $transaction->forward_from_id)->update(['status' => 'pending']);
                ApplicationTransaction::create([
                    'application_id' => $data['application_id'],
                    'application_number' => $application->application_number,
                    'forward_from_id' => $this->user,
                    'forward_to_id' => $transaction->forward_from_id,
                    'comment' => $data['comment'],
                    'forward_file' => $filepath,
                    'status' => 'pending'
                ]);
                $userData = User::where('id', $transaction->forward_from_id)->first();
                $location = "";
                $userType = $userData->user_type;
                if (!empty($userData)) {
                    if ($userType == 'DM') {
                        $location = $userData->district->District_Name;
                    } elseif ($userType == 'SDO' || $userType == 'TDR') {
                        $location = $userData->blockData->Block_Name;
                    } elseif ($userType == 'Patwari') {
                        $location = $userData->village->Village_Name;
                    }
                }
                $message = "Application revert to " . $userType . ' ' . $location;
                log_activity('Application Reverted');
            } else {
                $application->status = 'rejected';
                $application->save();
                ApplicationTransaction::where('application_id', $data['application_id'])->update(['status' => 'rejected']);
                $message = "Application marked as Rejected";
                log_activity('Application Rejected');
            }
            DB::commit();
            return response()->json(['status' => true, 'message' => $message]);
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json(['status' => false, 'error' => 'Something went wrong.']);
        }

    }

    public function getApplicationDetails($status, $id)
    {
        $user = Auth::user();
        $roles = getRolesByCurrentRole($user->user_type);
        $base64id = base64_decode($id);
        $details = ApplicationTransaction::where(['status' => $status, 'id' => $base64id])->with('application')->orderBy('id', 'DESC')->first();
        if (!empty($details)) {
            // return view('application_details', compact('details', 'roles'));
            return view('applicant_detail',compact('details','roles'));
        } else {
            return redirect()->route('home')->with('error', 'Invalid Request');
        }
    }

    public function getRolewiseUser(Request $request)
    {
        $data = $request->all();
        try {
            $rolewiseusers = User::where(['user_type' => $data['role'], 'parent_role' => $data['parent_role'], $data['location_type'] => $data['location_id']])->get();
            return response()->json(['status' => true, 'users' => $rolewiseusers]);
        } catch (\Exception $e) {
            return response()->json(['status' => false, 'message' => 'Something went wrong']);
        }

    }

    public function getComments($id)
    {
        $user = Auth::user();
        $roles = getRolesByCurrentRole($user->user_type);
        $details = ApplicationTransaction::where('id', $id)->with('application')->orderBy('id', 'DESC')->first();
        return view('page', compact('details', 'roles'));
    }

    public function transactionAction(Request $request)
    {
        $action = $request->action;
        $transactionId = $request->transaction_id;
        $user = Auth::user();
        $roles = getRolesByCurrentRole($user->user_type);
        $details = ApplicationTransaction::where('id', $transactionId)->with('application')->orderBy('id', 'DESC')->first();
        return view('page', compact('details', 'roles', 'action'));
    }

}
