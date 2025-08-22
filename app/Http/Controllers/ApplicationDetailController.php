<?php

namespace App\Http\Controllers;

use App\Models\ApplicationDetail;
use App\Models\Division;
use App\Models\District;
use App\Models\LandDetail;
use App\Models\LandOwnerDetail;
use App\Models\Application;
use App\Models\MasterAttachment;
use App\Models\DocUpload;
use App\Models\ApplicationTransaction;
use App\Models\Sanstha;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Models\Purpose;
use App\Models\ApplicationRule;
use App\Models\User;
use App\CommonFunctions;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\RedirectResponse;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Log;



class ApplicationDetailController extends Controller
{
    use CommonFunctions;
    public function index()
    {
        return ApplicationDetail::all();
    }



    public function store(Request $request)
    {
        $request->validate([
            'allotment_purpose' => 'required|string|max:255',
            'land_allot_rule' => 'required|string',
            'khatedar_name' => 'required|string|max:255',
            'khatedar_fname' => 'required|string|max:255',
            'khatedar_adr' => 'required|string|max:500',
            'khatedar_mobile' => 'required|digits:10',
            'email' => 'required|email|max:255',
        ]);

        $application_no = Carbon::now()->format('Ymd') . time();
        $purpose = Purpose::where('purpose_name', $request->allotment_purpose)->first();
        if (!$purpose) {
            return back()->withErrors(['allotment_purpose' => 'Invalid purpose selected.']);
        }
        $allotment_author = $purpose->purpose_allotment_author;
        $purpose_id = $purpose->id;
        $application_rule_id = $purpose->application_rule_id;
        Application::insert([
            'application_number' => $application_no,
            'purpose_id' => $purpose_id,
            'application_rule_id' => $application_rule_id,
            'applicant_name' => $request->khatedar_name,
            'applicant_fname' => $request->khatedar_fname,
            'applicant_add1' => $request->khatedar_adr,
            'applicant_mnumber' => $request->khatedar_mobile,
            'status_flag' => 'p',
            'status' => 'Submitted',
            // 'email' => $request->email,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        $user = Auth::user();
        $user->user_type = $allotment_author;
        $user->save();

        return redirect()->route('bhumi_chayan.form')->with('success', 'Application submitted successfully.');

    }
    public function showApplication()
    {
        try {
            $documentTypes = MasterAttachment::where('applicant_display', 'yes')->get();

            $purpose = Purpose::all();
            $rule = ApplicationRule::all();

            //dd('documentTypes',$purpose);
            //dd('documentTypes',$rule);

            return view('add_application', compact('documentTypes', 'purpose', 'rule'));
        } catch (ValidationException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Validation Error',
                'errors' => $e->errors(),
            ], 422);
        } catch (\Exception $e) {
            Log::error('Error: ' . $e->getMessage());
            return response()->json([
                'status' => false,
                'message' => 'Something went wrong. Please try again.',
                'error' => $e->getMessage(),
            ], 500);
        }
    }
    public function landDetailSave(Request $request)
    {
        try {

            dd($request->all());

            $request->validate([
                'district' => 'required|exists:master_district,district_code',
                'tehsil' => 'required|exists:master_tehsil,Block_id1',
                'village' => 'required|exists:master_village,Village_Id',
                'khsra' => 'required|array',
                'type_of_land' => 'required|string|max:500',
                'proposed_area' => 'required|numeric',
                'land_surrendered' => 'required|string|max:500',
                'allotment_purpose' => 'required',
                'land_allot_rule' => 'required',

                'org_name' => 'nullable|string|max:255',
                'dep_name' => 'nullable|string|max:255',
                'app_des' => 'nullable|string|max:255',
                'app_name' => 'nullable|string|max:255',
                'app_fname' => 'nullable|string|max:255',
                'address_app' => 'nullable|string|max:500',
                'app_mobile' => 'nullable|string|max:15',
                'app_email' => 'nullable|string|max:255|email',
            ]);

            $application_no = Carbon::now()->format('Ymd') . time();

            $purpose = Purpose::where('id', $request->allotment_purpose)->first();
            $div_id_get = District::where('district_code', $request->district)->first();

            $division = Division::where('DivisionId', $div_id_get->div_id)->first();


            // if (!$purpose) {
            //     return back()->withErrors(['allotment_purpose' => 'Invalid purpose selected.']);
            // }

            $user = Auth::user();

            $application = Application::create([
                'application_number' => $application_no,
                'purpose_id' => $purpose->id,
                'application_rule_id' => $request->land_allot_rule,
                'user_id' => $user->id,
                'status_flag' => 't',
                'applicant_division' => $division->DivisionId,
                'applicant_district' => $request->district,
                'applicant_tehsil' => $request->tehsil,
                'allot_auth' => $purpose->purpose_allotment_author ?? '',
                'purpose_detail' => $request->purpose_details ?? '',
                'user_type' => $user->user_type ?? '',
                'sso_id' => $user->sso_id ?? '',

                'org_name' => $request->org_name ?? null,
                'dep_name' => $request->dep_name ?? null,
                'applicant_designation' => $request->app_des ?? null,
                'applicant_name' => $request->app_name ?? null,
                'applicant_fname' => $request->app_fname ?? null,
                'applicant_add1' => $request->address_app ?? null,
                'applicant_mnumber' => $request->app_mobile ?? null,
                'applicant_email' => $request->app_email ?? null,

            ]);

            LandDetail::create([
                'application_id' => $application->id,
                'application_number' => $application_no,
                'proposed_land_area' => $request->proposed_area,
                'village_code' => $request->village,
                'land_type' => $request->type_of_land,
                'user_id' => $user->id,
                'user_type' => $user->user_type ?? '',
                'sso_id' => $user->sso_id ?? '',
                'is_land_surrendered' => $request->land_surrendered,
            ]);


            foreach ($request->khsra as $khasra) {
                $ownerDetails = $this->landOwnerDetail($request->village, $khasra);

                LandOwnerDetail::create([
                    'application_id' => $application->id,
                    'application_number' => $application_no,
                    'user_id' => $user->id,
                    'user_type' => $user->user_type ?? '',
                    'sso_id' => $user->sso_id ?? '',
                    'owner_name' => $ownerDetails['name'] ?? '',
                    'owner_fname' => $ownerDetails['fathername'] ?? '',
                    'owner_add1' => $ownerDetails['Address'] ?? '',
                    'khasra_number' => $ownerDetails['khasra'] ?? '',
                ]);
            }

            return response()->json(['status' => true, 'message' => '', 'data' => $application_no]);
        } catch (ValidationException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Validation Error',
                'errors' => $e->errors(),
            ], 422);
        } catch (\Exception $e) {
            Log::error('Error: ' . $e->getMessage());
            return response()->json([
                'status' => false,
                'message' => 'Something went wrong. Please try again.',
                'error' => $e->getMessage(),
            ], 500);
        }
    }
    public function landDetailSave2(Request $request)
    {
        //dd($request->all());
        if (!in_array($request->action, ['save', 'update'])) {
            return response()->json([
                'status' => false,
                'message' => 'Invalid action specified.',
            ], 400);
        }

        try {
            $rules = [
                'application_no' => 'required|string|exists:applications,application_number',
                'khatadari' => 'required|in:yes,no',
                'khatadariDetails' => 'required',
                'act_1894' => 'required|in:yes,no',
                'landacc' => 'required',
                'irrigation_means' => 'required|in:yes,no',
                'irrigationDetails' => 'required',
                'railway_distance' => 'required|numeric',
                'national_highway_distance' => 'required|numeric',
                'state_highway' => 'required|numeric',
                'distance_from_town_city' => 'required|numeric',
                'relevant_info' => 'required|string|max:1000',
                'project_cost' => 'required|numeric',
            ];

            $validated = $request->validate($rules);

            $application = Application::where('application_number', $request->application_no)->firstOrFail();

            $data = [
                'khatedari_proceeding' => $request->khatadari,
                'khatedari_proceeding_details' => $request->khatadariDetails,
                'under_acquisition_act_1894' => $request->act_1894,
                'irrigation_land' => $request->irrigation_means,
                'project_cost' => $request->project_cost,
                'irrigation_detail' => $request->irrigationDetails,
                'dist_from_RL' => $request->railway_distance,
                'dist_from_NH' => $request->national_highway_distance,
                'dist_from_SH' => $request->state_highway,
                'dist_from_City' => $request->distance_from_town_city,
                'other_details' => $request->relevant_info,
            ];

            if ($request->action === 'save') {
                $landDetail = LandDetail::updateOrCreate(
                    ['application_id' => $application->id],
                    array_merge($data, ['application_id' => $application->id])
                );

                return response()->json([
                    'status' => true,
                    'message' => 'Land details saved successfully.',
                    'data' => $request->application_no,
                ]);
            } elseif ($request->action === 'update') {
                $landDetail = LandDetail::where('application_id', $application->id)->first();

                if (!$landDetail) {
                    return response()->json([
                        'status' => false,
                        'message' => 'Land detail record not found for update.',
                    ], 404);
                }

                $landDetail->update($data);

                return response()->json([
                    'status' => true,
                    'message' => 'Land details updated successfully.',
                    'data' => $request->application_no,
                ]);
            }
        } catch (ValidationException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Validation error occurred',
                'errors' => $e->errors(),
            ], 422);
        } catch (\Exception $e) {
            Log::error('Error in landDetailSave2: ' . $e->getMessage());
            return response()->json([
                'status' => false,
                'message' => 'Something went wrong. Please try again.',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    public function saveDocuments(Request $request)
    {
        if ($request->actiondoc == 'savedoc') {
            try {
                $request->validate([
                    'application_no_doc' => 'required|exists:applications,application_number',

                    'copy_khasra_map' => 'required|in:yes,no',
                    'copy_khasra_map_doc' => 'required_if:copy_khasra_map,yes|file|mimes:pdf,jpg,jpeg,png|max:2048',

                    'original_copy_challan' => 'required|in:yes,no',
                    'original_copy_challan_doc' => 'required_if:original_copy_challan,yes|file|mimes:pdf,jpg,jpeg,png|max:2048',

                    'project_cost_copy' => 'required|in:yes,no',
                    'project_cost_copy_doc' => 'required_if:project_cost_copy,yes|file|mimes:pdf,jpg,jpeg,png|max:2048',

                    'copies_revenue_map' => 'required|in:yes,no',
                    'copies_revenue_map_doc' => 'required_if:copies_revenue_map,yes|file|mimes:pdf,jpg,jpeg,png|max:2048',
                ]);

                $application = Application::where('application_number', $request->application_no_doc)->first();

                $user = Auth::user();

                // if (!$application) {
                //     return response()->json([
                //         'status' => false,
                //         'message' => 'Application not found.',
                //     ], 404);
                // }

                $documents = [
                    'copy_khasra_map' => [
                        'available' => $request->copy_khasra_map,
                        'file' => $request->file('copy_khasra_map_doc'),
                    ],
                    'original_copy_challan' => [
                        'available' => $request->original_copy_challan,
                        'file' => $request->file('original_copy_challan_doc'),
                    ],
                    'project_cost_copy' => [
                        'available' => $request->project_cost_copy,
                        'file' => $request->file('project_cost_copy_doc'),
                    ],
                    'copies_revenue_map' => [
                        'available' => $request->copies_revenue_map,
                        'file' => $request->file('copies_revenue_map_doc'),
                    ],
                ];

                foreach ($documents as $docType => $info) {
                    $filePath = null;

                    if ($info['file']) {
                        $filePath = $info['file']->store('documents', 'public');
                    }


                    $docc = DocUpload::create([
                        'application_id' => $application->id,
                        'application_number' => $application->application_number,
                        'document_id' => $docType,
                        'document_file' => $filePath,
                        'uploaded_by' => $user->id ?? '',
                        'user_type' => $user->user_type ?? '',
                        'sso_id' => $user->sso_id ?? '',
                        'is_active' => 1,
                    ]);
                }

                $purpose = Purpose::find($application->purpose_id);
                $allotingAuthor = null;


                $docs = DocUpload::where('application_number', $request->application_no_doc)->get();

                $application->update([
                    'applicant_state' => $user->state ?? '',
                    'applicant_tehsil' => $user->block ?? '',
                ]);



                return response()->json([
                    'status' => true,
                    'data' => $docs,
                    'message' => $request->application_no_doc . ' saved successfully',
                ]);
            } catch (ValidationException $e) {
                return response()->json([
                    'status' => false,
                    'message' => 'Validation Error',
                    'errors' => $e->errors(),
                ], 422);
            } catch (\Exception $e) {
                Log::error('Error saving documents: ' . $e->getMessage());
                return response()->json([
                    'status' => false,
                    'message' => 'Something went wrong. Please try again.',
                    'error' => $e->getMessage(),
                ], 500);
            }
        } elseif ($request->actiondoc == 'updatedoc') {
            try {
                $request->validate([
                    'application_no_doc' => 'required|exists:applications,application_number',

                    'copy_khasra_map' => 'required|in:yes,no',
                    'copy_khasra_map_doc' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:2048',

                    'original_copy_challan' => 'required|in:yes,no',
                    'original_copy_challan_doc' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:2048',

                    'project_cost_copy' => 'required|in:yes,no',
                    'project_cost_copy_doc' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:2048',

                    'copies_revenue_map' => 'required|in:yes,no',
                    'copies_revenue_map_doc' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:2048',
                ]);

                $application = Application::where('application_number', $request->application_no_doc)->first();

                $user = Auth::user();


                if (!$application) {
                    return response()->json([
                        'status' => false,
                        'message' => 'Application not found.',
                    ], 404);
                }

                $documents = [
                    'copy_khasra_map' => [
                        'available' => $request->copy_khasra_map,
                        'file' => $request->file('copy_khasra_map_doc'),
                    ],
                    'original_copy_challan' => [
                        'available' => $request->original_copy_challan,
                        'file' => $request->file('original_copy_challan_doc'),
                    ],
                    'project_cost_copy' => [
                        'available' => $request->project_cost_copy,
                        'file' => $request->file('project_cost_copy_doc'),
                    ],
                    'copies_revenue_map' => [
                        'available' => $request->copies_revenue_map,
                        'file' => $request->file('copies_revenue_map_doc'),
                    ],
                ];

                foreach ($documents as $docType => $info) {
                    $docUpload = DocUpload::where('application_id', $application->id)
                        ->where('document_id', $docType)
                        ->first();

                    if (!$docUpload) {
                        $docUpload = new DocUpload();
                        $docUpload->application_id = $application->id;
                        $docUpload->application_number = $application->application_number;
                        $docUpload->document_id = $docType;
                        $docUpload->uploaded_by = Auth::id();
                        $docUpload->user_type = $user->user_type ?? '';
                        $docUpload->sso_id = $user->sso_id ?? '';
                        $docUpload->is_active = 1;
                    }


                    if ($info['file']) {
                        $filePath = $info['file']->store('documents', 'public');
                        $docUpload->document_file = $filePath;
                    }

                    $docUpload->save();
                }

                return response()->json([
                    'status' => true,
                    'message' => $request->application_no_doc . ' updated successfully',
                ]);
            } catch (ValidationException $e) {
                return response()->json([
                    'status' => false,
                    'message' => 'Validation Error',
                    'errors' => $e->errors(),
                ], 422);
            } catch (\Exception $e) {
                Log::error('Error updating documents: ' . $e->getMessage());
                return response()->json([
                    'status' => false,
                    'message' => 'Something went wrong while updating. Please try again.',
                    'error' => $e->getMessage(),
                ], 500);
            }
        } else {
            return response()->json([
                'status' => false,
                'message' => 'Invalid action provided.',
            ], 400);
        }
    }


    public function finalSubmit(Request $request)
    {
        try {


            $application = Application::where('application_number', $request->application_no_doc)->first();

            $user = Auth::user();

            if (!$application) {
                return response()->json([
                    'status' => false,
                    'message' => 'Application not found.',
                ], 404);
            }





            $purpose = Purpose::find($application->purpose_id);
            $allotingAuthor = null;

            if ($purpose) {
                switch ($purpose->purpose_allotment_author) {
                    case 'DM':
                        $allotingAuthor = User::where('district_id', $application->applicant_district)
                            ->where('user_type', 'DM')
                            ->first();
                        break;

                    case 'SDO':
                        $allotingAuthor = User::where('block', $application->applicant_tehsil)
                            ->where('user_type', 'SDO')
                            ->first();
                        break;

                    case 'DC':
                        $allotingAuthor = User::where('division_id', $application->applicant_division)
                            ->where('user_type', 'DC')
                            ->first();
                        break;

                    default:
                        $allotingAuthor = User::where('district_id', $application->applicant_district)->first();
                }
            }

            $allotingAuthorId = $allotingAuthor ? $allotingAuthor->id : null;
            $allotingAuthorname = $allotingAuthor ? $allotingAuthor->user_type : null;

            $application->update([
                'status_flag' => 'p',
                'last_forward_to_id' => $allotingAuthorId,
            ]);

            ApplicationTransaction::create([
                'application_id' => $application->id,
                'application_number' => $application->application_number ?? '',
                'forward_to_id' => $allotingAuthorId,
                'forward_to_user_type' => $allotingAuthor->user_type ?? '',
                'forward_to_sso' => $allotingAuthor->sso_id ?? '',
                'forward_from_id' => $user->id ?? '',
                'forward_from_user_type' => $user->user_type ?? '',
                'forward_from_sso' => $user->sso_id ?? '',
                'status' => 'pending',
            ]);

            return response()->json([
                'status' => true,
                'message' => $request->application_no_doc . ' saved successfully',
                'authority' => $allotingAuthorname . ' send successfully',
            ]);
        } catch (ValidationException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Validation Error',
                'errors' => $e->errors(),
            ], 422);
        } catch (\Exception $e) {
            Log::error('Error saving documents: ' . $e->getMessage());
            return response()->json([
                'status' => false,
                'message' => 'Something went wrong. Please try again.',
                'error' => $e->getMessage(),
            ], 500);
        }
    }


    public function saveSansthaDetails(Request $request)
    {

        $request->validate([
                'district' => 'required|exists:master_district,district_code',
                'tehsil' => 'required|exists:master_tehsil,Block_id1',
                'village' => 'required|exists:master_village,Village_Id',
                'khsra' => 'required|array',
                'type_of_land' => 'required|string|max:500',
                'proposed_area' => 'required|numeric',
                'land_surrendered' => 'required|string|max:500',
                'allotment_purpose' => 'required',
                'land_allot_rule' => 'required',

                'org_name' => 'nullable|string|max:255',
                'dep_name' => 'nullable|string|max:255',
                'app_des' => 'nullable|string|max:255',
                'app_name' => 'nullable|string|max:255',
                'app_fname' => 'nullable|string|max:255',
                'address_app' => 'nullable|string|max:500',
                'app_mobile' => 'nullable|string|max:15',
                'app_email' => 'nullable|string|max:255|email',
            ]);

        $application = Application::where('application_number', $request->application_no_sanstha)->firstOrFail();

        $data = [
            'application_id' => $application->id,

            'previous_land_allocation_details' => $request->input('land_alloted_details', null),
            'organisation_details' => $request->input('org_reg_certificate', null),
            'organisation_last_three_years_profit_loss_statement_document_id' => $request->input('org_statement', null),
            'organisation_project_report_description' => $request->input('org_project_report', null),
            // '' => $request->input('ins_allot_purpose', null),
            // '' => $request->input('society_benefits', null),
            'whether_land_use_type_needed_changed_flag' => $request->input('land_used') === 'yes' ? 1 : 0,
            //'' => $request->experience,
            //'' => $request->registered,
            'organisation_registration_certificate_number' => $request->input('reg_number', null),
            //'' => $request->input('reg_date', null),

        ];

        $landDetail = Sanstha::create($data);

        return response()->json([
            'status' => true,
            'message' => 'Sanstha details saved successfully',
            'data' => $landDetail // Return created model data if needed
        ]);
    }



    public function showApplicationPreview(Request $request, $id)
    {
        try {
            $application = Application::with(['purpose', 'rule', 'landDetails', 'landOwners', 'docUploads'])
                ->where('application_number', $id)
                ->firstOrFail();

            $purposeName = $application->purpose?->purpose_name ?? '-';
            $ruleName = $application->rule?->application_rule_name ?? '-';

            return view('applications.partials.preview-body', [
                'application' => $application,
                'landDetails' => $application->landDetails,
                'landOwners' => $application->landOwners,
                'docUploads' => $application->docUploads,
                'purposeName' => $purposeName,
                'ruleName' => $ruleName,
            ]);
        } catch (\Exception $e) {
            Log::error('Error: ' . $e->getMessage());
            return response()->json([
                'status' => false,
                'message' => 'Something went wrong. Please try again.',
                'error' => $e->getMessage(),
            ], 500);
        }
    }


    public function showCheckList(Request $request, $id)
    {
        try {
            $application = Application::with(['purpose', 'rule', 'landDetails', 'landOwners', 'docUploads'])
                ->where('id', $id)
                ->firstOrFail();

            $purposeName = $application->purpose?->purpose_name ?? '-';
            $ruleName = $application->rule?->application_rule_name ?? '-';

            $docMasterTypes = MasterAttachment::where('patwari_display', 'yes')->get();


            return view('checklist', [
                'application' => $application,
                'landDetails' => $application->landDetails,
                'landOwners' => $application->landOwners,
                'docUploads' => $application->docUploads,
                'purposeName' => $purposeName,
                'ruleName' => $ruleName,
                'docMasterTypes' => $docMasterTypes,
            ]);
        } catch (\Exception $e) {
            Log::error('Error: ' . $e->getMessage());
            return response()->json([
                'status' => false,
                'message' => 'Something went wrong. Please try again.',
                'error' => $e->getMessage(),
            ], 500);
        }
    }


    public function user_dashboard()
    {
       if (Auth::user()->user_type == 'user')
        {
            try {

                $loginUserID = Auth::id();
                $counts = Application::where('user_id', $loginUserID)
                    ->selectRaw("
                COUNT(CASE WHEN status_flag = 't' THEN 1 END) as pendingCount,
                COUNT(CASE WHEN status_flag = 'e' THEN 1 END) as errorCount,
                COUNT(CASE WHEN status = 'processing' THEN 1 END) as processingCount,
                COUNT(CASE WHEN status = 'rejected' THEN 1 END) as rejectCount,
                COUNT(CASE WHEN status = 'completed' THEN 1 END) as completedCount")->first();
                return view('user_dashboard', compact('counts'));
            } catch (\Exception $e) {
                Log::error('Error: ' . $e->getMessage());
                return response()->json([
                    'status' => false,
                    'message' => 'Something went wrong. Please try again.',
                    'error' => $e->getMessage(),
                ], 500);
            }
        }
        else
        {
            $userId = Auth::user()->id;


            $pendingCount = ApplicationTransaction::where('forward_to_id', $userId)->where('status', 'pending')->distinct('application_id', 'forward_to_id')->count();
            $completedCount = ApplicationTransaction::where('forward_to_id', $userId)->where('status', 'completed')->distinct('application_id')->count();
            $processingCount = ApplicationTransaction::where('forward_to_id', $userId)->where('status', 'processing')->distinct('application_id')->count();
            $rejectCount = ApplicationTransaction::where('forward_to_id', $userId)->where('status', 'rejected')->distinct('application_id')->count();

            return view('home', compact('pendingCount', 'completedCount', 'processingCount', 'rejectCount'));
        }
    }

    public function getApplication($type = null)
    {
        try {
            $loginUserID = Auth::id();
            $counts = Application::where('user_id', $loginUserID)
                ->selectRaw("
            COUNT(CASE WHEN status_flag = 't' THEN 1 END) as pendingCount,
            COUNT(CASE WHEN status_flag = 'e' THEN 1 END) as errorCount,
            COUNT(CASE WHEN status = 'processing' THEN 1 END) as processingCount,
            COUNT(CASE WHEN status = 'rejected' THEN 1 END) as rejectCount,
            COUNT(CASE WHEN status = 'completed' THEN 1 END) as completedCount")->first();
            $query = Application::with(['purpose:id,purpose_name', 'rule:id,application_rule_name','latestTransaction'])->where('user_id', $loginUserID);
            switch ($type) {
                case 'pending':
                    $query->where('status_flag', 't');
                    break;
                case 'processing':
                    $query->where('status', 'processing');
                    break;
                case 'error':
                    $query->where('status_flag', 'e');
                    break;
                case 'reject':
                    $query->where('status', 'rejected');
                    break;
                case 'complete':
                    $query->where('status', 'completed');
                    break;
                default:
                    $query->where('status_flag', 't');
                    break;
            }

            $getApplication = $query->orderBy('id', 'desc')->get();
            return view('application_list_user', compact('getApplication', 'type', 'counts'));
        } catch (\Exception $e) {
            Log::error('Error: ' . $e->getMessage());
            return response()->json([
                'status' => false,
                'message' => 'Something went wrong. Please try again.',
                'error' => $e->getMessage(),
            ], 500);
        }
    }



    public function deleteApplication($id)
    {
        DB::beginTransaction();

        try {
            $loginUserID = Auth::id();
            $application = Application::where('id', $id)->where('user_id', $loginUserID)->firstOrFail();
            $relatedModels = [
                LandDetail::class,
                LandOwnerDetail::class,
                DocUpload::class,
                ApplicationTransaction::class,
            ];

            foreach ($relatedModels as $model) {
                $model::where('application_id', $id)->delete();

            }

            $application->delete();
            DB::commit();

            return redirect()->back()->with('success', 'Application deleted successfully!');
        } catch (ModelNotFoundException $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Application not found or unauthorized access.');
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Delete Application Error: ' . $e->getMessage());
            return redirect()->back()->with('error', 'An error occurred while deleting the application.');
        }
    }


    public function edit(Request $request, $id)
    {
        //dd($id);
        try {
            $application = Application::with(['purpose', 'rule', 'landDetails', 'landOwners', 'docUploads'])
                ->where('id', $id)
                ->firstOrFail();

            //dd($application->purpose);

            $documentTypes = MasterAttachment::all();
            $purpose = Purpose::all();
            $rule = ApplicationRule::all();

            $purposeName = $application->purpose?->purpose_name ?? '-';
            $ruleName = $application->rule?->application_rule_name ?? '-';

            return view('application_edit', [
                'application' => $application,
                'landDetails' => $application->landDetails,
                'landOwners' => $application->landOwners,
                'docUploads' => $application->docUploads,
                'documentTypes' => $documentTypes,
                'purpose' => $purpose,
                'rule' => $rule,
                'purposeName' => $purposeName,
                'ruleName' => $ruleName,
            ]);
        } catch (\Exception $e) {
            Log::error('Error: ' . $e->getMessage());
            return response()->json([
                'status' => false,
                'message' => 'Something went wrong. Please try again.',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    public function saveDocumentsPatwari(Request $request)
    {
        $application = Application::where('application_number', $request->actiondoc)->first();

        $user = Auth::user();


        foreach ($request->allFiles() as $key => $file) {
            if ($file) {
                $path = $file->store('documents', 'public');

                \App\Models\DocUpload::create([
                    'document_id' => str_replace('_doc', '', $key),
                    'document_file' => $path,
                    'application_id' => $application->id,
                    'application_number' => $application->application_number,
                    'uploaded_by' => $user->id ?? '',
                    'user_type' => $user->user_type ?? '',
                    'sso_id' => $user->sso_id ?? '',
                    'is_active' => 1,
                ]);
            }
        }

        return redirect()->back()->with('success', 'Documents uploaded successfully.');
    }


    public function destroy($id)
    {
        $document = DocUpload::withTrashed()->find($id);
        if (!$document) {
            return response()->json(['success' => false, 'message' => 'File not found'], 404);
        }

        if (\Storage::exists($document->document_file)) {
            \Storage::delete($document->document_file);
        }

        $document->forceDelete();

        return response()->json(['success' => true]);
    }






}

