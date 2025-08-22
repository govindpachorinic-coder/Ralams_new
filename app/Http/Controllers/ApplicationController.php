<?php

namespace App\Http\Controllers;

use App\Models\ApplicationDetail;
use App\Models\Division;
use App\Models\District;
use App\Models\Tehsil;
use App\Models\Village;
use App\Models\LandDetail;
use App\Models\LandOwnerDetail;
use App\Models\Application;
use App\Models\MasterAttachment;
use App\Models\DocUpload;
use App\Models\Organization;
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
use Illuminate\Validation\Rule;
use Illuminate\Support\Str;

class ApplicationController extends Controller {
    use CommonFunctions;

    public function newApplication() {
        $documentTypes = MasterAttachment::where( 'applicant_display', 'yes' )->get();
        $purposes = Purpose::all();
        $rules = ApplicationRule::all();
        $districts = District::select( 'district_code', 'District_Name' )->get();
        return view( 'new-application', compact( 'documentTypes', 'purposes', 'rules', 'districts' ) );

    }

    public function saveApplication( Request $request ) {

        $user = Auth::user();
        try {
           
            if ( $request->step == 0 ) {
                $request->validate( [
                    'allotment_purpose' => 'required',
                    'land_allotment_rule' => 'required',
                    'applicant_type' => 'required',
                    'app_name' => 'required',
                    'app_fname' => 'required',
                    'address_app' => 'required',
                    'app_mobile' => 'required|digits:10',
                    'app_email' => 'required|email',
                    'org_name' => 'required_if:applicant_type,orgnization',
                    'dep_name' => 'required_if:applicant_type,department',
                    'app_des' => 'required_if:applicant_type,orgnization|required_if:applicant_type,department',
                    //// organization validation start
                    'land_alloted_details' => 'required_if:applicant_type,orgnization',
                    'org_statement' => 'required_if:applicant_type,orgnization|mimes:pdf|max:2048',
                    'project_report' => 'required_if:applicant_type,orgnization',
                    'project_report_file' => 'required_if:applicant_type,orgnization|mimes:pdf|max:2048',
                    'ins_allot_purpose' => 'required_if:applicant_type,orgnization|mimes:pdf|max:2048',
                    'society_benefits' => 'required_if:applicant_type,orgnization',
                    'society_benefits_file' => 'required_if:applicant_type,orgnization|mimes:pdf|max:2048',
                    'prev_allot_land_file' => [
                        Rule::requiredIf( fn () => request( 'applicant_type' ) === 'orgnization' && request( 'land_used' ) === 'yes' ),
                        'mimes:pdf',
                        'max:2048',
                    ],
                    'experience_detail' => [
                        Rule::requiredIf( fn () => request( 'applicant_type' ) === 'orgnization' && request( 'experience' ) === 'yes' ),

                    ],

                    'reg_number' => [
                        Rule::requiredIf( fn () => request( 'applicant_type' ) === 'orgnization' && request( 'registered' ) === 'yes' ),

                    ],

                    'reg_date' => [
                        Rule::requiredIf( fn () => request( 'applicant_type' ) === 'orgnization' && request( 'registered' ) === 'yes' ),

                    ],

                    'org_reg_certificate' => [
                        Rule::requiredIf( fn () => request( 'applicant_type' ) === 'orgnization' && request( 'registered' ) === 'yes' ),

                    ],

                    'org_reg_certificate_file' => [
                        Rule::requiredIf( fn () => request( 'applicant_type' ) === 'orgnization' && request( 'registered' ) === 'yes' ),
                        'mimes:pdf',
                        'max:2048',
                    ],

                ] );

                //dd( $request->all() );

                $application_no = Carbon::now()->format( 'Ymd' ) . time();
                $purpose = Purpose::find( $request->allotment_purpose );

                $application = Application::create( [
                    'application_number' => $application_no,
                    'purpose_id' => $request->allotment_purpose,
                    'application_rule_id' => $request->land_allotment_rule,
                    'user_id' => $user->id,
                    'status_flag' => 't',
                    //'applicant_division' => $division->DivisionId,
                    //'applicant_district' => $request->district,
                    // 'applicant_tehsil' => $request->tehsil,
                    'allot_auth' => $purpose->purpose_allotment_author ?? '',
                    'purpose_detail' => $request->purpose_details ?? '',
                    'user_type' => $user->user_type ?? '',
                    'sso_id' => $user->sso_id ?? '',
                    'applicant_type' => $request->applicant_type,
                    'org_name' => $request->org_name ?? null,
                    'dep_name' => $request->dep_name ?? null,
                    'applicant_designation' => $request->app_des ?? null,
                    'applicant_name' => $request->app_name ?? null,
                    'applicant_fname' => $request->app_fname ?? null,
                    'applicant_add1' => $request->address_app ?? null,
                    'applicant_mnumber' => $request->app_mobile ?? null,
                    'applicant_email' => $request->app_email ?? null,

                ] );
                if ( $request->applicant_type == 'orgnization' ) {

                    $organizationData = [];
                    $organizationData[ 'application_id' ] = $application->id;
                    $organizationData[ 'application_number' ] = $application_no;
                    $organizationData[ 'user_id' ] = $user->id;
                    $organizationData[ 'user_type' ] = $user->user_type ?? '';
                    $organizationData[ 'sso_id' ] = $user->sso_id ?? '';
                    $organizationData[ 'land_alloted_details' ] = $request->land_alloted_details;
                    $organizationData[ 'project_report' ] = $request->project_report;
                    $organizationData[ 'society_benefits' ] = $request->society_benefits;
                    $organizationData[ 'land_used' ] = $request->land_used;
                    $organizationData[ 'experience' ] = $request->experience;
                    $organizationData[ 'experience_detail' ] = $request->experience_detail;
                    $organizationData[ 'registered' ] = $request->registered;
                    $organizationData[ 'reg_number' ] = $request->reg_number;
                    $organizationData[ 'reg_date' ] = $request->reg_date;
                    $organizationData[ 'org_reg_certificate' ] = $request->org_reg_certificate;
                    $fileFields = [
                        'org_statement'           => 'org_statement',
                        'project_report_file'     => 'project_report_file',
                        'ins_allot_purpose'       => 'ins_allot_purpose',
                        'society_benefits_file'   => 'society_benefits_file',
                        'prev_allot_land_file'    => 'prev_allot_land_file',
                        'org_reg_certificate_file'=> 'org_reg_certificate_file',
                    ];

                    foreach ( $fileFields as $inputName => $dbColumn ) {
                        if ( $request->hasFile( $inputName ) ) {
                            $file = $request->file( $inputName );
                            $extension = $file->getClientOriginalExtension();
                            $filename = Str::uuid()->toString() . '_' . pathinfo( $file->getClientOriginalName(), PATHINFO_FILENAME ) . '.' . $extension;
                            $path = $file->storeAs( 'documents', $filename, 'public' );
                            $organizationData[ $dbColumn ] = $path;
                        }
                    }
                    Organization::create( $organizationData );
                }

                return response()->json( [ 'status' => true, 'message' => '', 'data' => $application->id ] );

            } elseif ( $request->step == 1 ) {

                $request->validate( [
                    'application_id' => 'required|string|exists:applications,id',
                    'district' => 'required',
                    'tehsil' => 'required',
                    'village' => 'required',
                    'khsra'    => 'required|array|min:1',
                    'khsra.*'  => 'required|string|min:1',
                    'type_of_land' => 'required',
                    'proposed_area' => 'required|numeric|min:0',
                    'land_surrendered' => 'required|in:yes,no',
                    'land_surrendered_detail' => 'required_if:land_surrendered,yes',
                ] );

                $divID = District::where( 'district_code', $request->district )->value( 'div_id' );
                $application = Application::find( $request->application_id );
                $application->applicant_district = $request->district;
                $application->applicant_tehsil = $request->tehsil;
                $application->applicant_division = $divID;
                $application->save();

                LandDetail::create( [
                    'application_id' => $request->application_id,
                    'application_number' => $application->application_number,
                    'proposed_land_area' => $request->proposed_area,
                    'village_code' => $request->village,
                    'land_type' => $request->type_of_land,
                    'user_id' => $user->id,
                    'user_type' => $user->user_type ?? '',
                    'sso_id' => $user->sso_id ?? '',
                    'is_land_surrendered' => $request->land_surrendered,
                    'surrender_details' => $request->land_surrendered_detail,
                    'khasra_number' => implode( ',', $request->khsra )
                ] );
                $village      = $request->village;
                $applicationId = $request->application_id;
                $applicationNumber = $application->application_number;
                $userId       = $user->id;
                $userType     = $user->user_type ?? '';
                $ssoId        = $user->sso_id ?? '';
                $landOwnerData = [];
                if ( count( $request->khsra )>0 ) {
                    foreach ( $request->khsra as $khasra ) {
                        $ownerDetails = $this->landOwnerDetail( $village, $khasra );
                        $landOwnerData[] = [
                            'application_id'    => $applicationId,
                            'application_number'=> $applicationNumber,
                            'user_id'           => $userId,
                            'user_type'         => $userType,
                            'sso_id'            => $ssoId,
                            'owner_name'        => $ownerDetails[ 'name' ] ?? '',
                            'owner_fname'       => $ownerDetails[ 'fathername' ] ?? '',
                            'owner_add1'        => $ownerDetails[ 'Address' ] ?? '',
                            'khasra_number'     => $ownerDetails[ 'khasra' ] ?? '',
                        ];
                    }
                    LandOwnerDetail::insert( $landOwnerData );
                }
                return response()->json( [ 'status' => true, 'message' => '', 'data' => $request->application_id ] );

            } elseif ( $request->step == 2 ) {

                $request->validate( [
                    'application_id' => 'required|string|exists:applications,id',
                    'khatadari' => 'required|in:yes,no',
                    'khatadariDetails' => 'required_if:khatadari,yes',
                    'act_1894' => 'required|in:yes,no',
                    'landacc' => 'required_if:act_1894,yes',
                    'irrigation_means' => 'required|in:yes,no',
                    'irrigationDetails' => 'required_if:irrigation_means,yes',
                    'railway_distance' => 'required|numeric|min:0',
                    'national_highway_distance' => 'required|numeric|min:0',
                    'state_highway' => 'required|numeric|min:0',
                    'distance_from_town_city' => 'required|numeric|min:0',
                    'project_cost' => 'required|numeric|min:0',
                    'relevant_info' => 'required',

                ] );

                $landDeatilData = [
                    'khatedari_proceeding' => $request->khatadari,
                    'khatedari_proceeding_details' => $request->khatadariDetails,
                    'under_acquisition_act_1894' => $request->act_1894,
                    'under_acquisition_act_1894_detail' =>$request->landacc,
                    'irrigation_land' => $request->irrigation_means,
                    'project_cost' => $request->project_cost,
                    'irrigation_detail' => $request->irrigationDetails,
                    'dist_from_RL' => $request->railway_distance,
                    'dist_from_NH' => $request->national_highway_distance,
                    'dist_from_SH' => $request->state_highway,
                    'dist_from_City' => $request->distance_from_town_city,
                    'other_details' => $request->relevant_info,
                ];

                LandDetail::where( 'application_id', $request->application_id )->update( $landDeatilData );
                return response()->json( [ 'status' => true, 'message' => '', 'data' => $request->application_id ] );

            } else {

                $request->validate( [
                    'application_id' => 'required|exists:applications,id',
                ] );

                $application = Application::findOrFail( $request->application_id );

                foreach ( $request->document_id as $fieldName => $docId ) {
                    $isField = "is_{$fieldName}";
                    $rules[ $isField ] = 'required|in:yes,no';
                    $rules[ $fieldName ] = "required_if:$isField,yes|mimes:pdf,jpg,png|max:2048";
                }
                $request->validate( $rules );
                foreach ( $request->document_id as $fieldName => $docId ) {
                    if ( $request->hasFile( $fieldName ) ) {
                        $filePath = $request->file( $fieldName )->store( 'documents', 'public' );
                        DocUpload::create( [
                            'application_id'     => $application->id,
                            'application_number' => $application->application_number,
                            'document_id'        => $docId,
                            'document_file'      => $filePath,
                            'uploaded_by'        => $user->id ?? '',
                            'user_type'          => $user->user_type ?? '',
                            'sso_id'             => $user->sso_id ?? '',
                            'is_active'          => 1,
                        ] );
                    }
                }
                return response()->json( [ 'status' => true, 'message' => '', 'data' => $request->application_id, 'step' => 3 ] );
            }

        } catch ( ValidationException $e ) {
            return response()->json( [
                'status' => false,
                'message' => 'Validation Error',
                'errors' => $e->errors(),
            ], 422 );
        } catch ( \Exception $e ) {
            Log::error( 'Error: ' . $e->getMessage() );
            return response()->json( [
                'status' => false,
                'message' => 'Something went wrong. Please try again.',
                'error' => $e->getMessage(),
            ], 500 );
        }
    }

    public function editApplication( $id ) {
        $id = base64_decode( $id );
        $documentTypes = MasterAttachment::where( 'applicant_display', 'yes' )->get();

        $purposes = Purpose::all();
        $rules = ApplicationRule::all();
        $application = Application::find( $id );

        $districts = District::select( 'district_code', 'District_Name' )->get();

        $tehsils = Tehsil::where( 'District_ID', $application->applicant_district )->select( 'Block_Name', 'Block_id1' )->get();

        $villages = Village::where( 'Tehsil_Code', $application->applicant_tehsil )->select( 'Village_Name', 'Village_Id' )->get();
        $selectedKhasras = explode( ',', $application->landDetail->khasra_number );

        return view( 'edit_application', compact( 'documentTypes', 'purposes', 'rules', 'districts', 'tehsils', 'villages', 'application', 'selectedKhasras' ) );
    }

    public function updateApplication( Request $request )  {

        $user = Auth::user();
        try {

            DB::beginTransaction();
            if ( $request->step == 0 ) {
                $request->validate( [
                    'allotment_purpose' => 'required',
                    'land_allotment_rule' => 'required',
                    'applicant_type' => 'required',
                    'app_name' => 'required',
                    'app_fname' => 'required',
                    'address_app' => 'required',
                    'app_mobile' => 'required|digits:10',
                    'app_email' => 'required|email',
                    'org_name' => 'required_if:applicant_type,orgnization',
                    'dep_name' => 'required_if:applicant_type,department',
                    'app_des' => 'required_if:applicant_type,orgnization|required_if:applicant_type,department',
                    // organization validation start
                    'land_alloted_details' => 'required_if:applicant_type,orgnization',
                    'org_statement' => 'nullable|mimes:pdf|max:2048',
                    'project_report' => 'required_if:applicant_type,orgnization',
                    'project_report_file' => 'nullable|mimes:pdf|max:2048',
                    'ins_allot_purpose' => 'nullable|mimes:pdf|max:2048',
                    'society_benefits' => 'required_if:applicant_type,orgnization',
                    'society_benefits_file' => 'nullable|mimes:pdf|max:2048',
                    'prev_allot_land_file' => [
                        'nullable',
                        'mimes:pdf',
                        'max:2048',
                    ],
                    'experience_detail' => [
                        Rule::requiredIf( fn () => request( 'applicant_type' ) === 'orgnization' && request( 'experience' ) === 'yes' ),

                    ],

                    'reg_number' => [
                        Rule::requiredIf( fn () => request( 'applicant_type' ) === 'orgnization' && request( 'registered' ) === 'yes' ),

                    ],

                    'reg_date' => [
                        Rule::requiredIf( fn () => request( 'applicant_type' ) === 'orgnization' && request( 'registered' ) === 'yes' ),

                    ],

                    'org_reg_certificate' => [
                        Rule::requiredIf( fn () => request( 'applicant_type' ) === 'orgnization' && request( 'registered' ) === 'yes' ),

                    ],

                    'org_reg_certificate_file' => [
                        'nullable',
                        'mimes:pdf',
                        'max:2048',
                    ],

                ] );

                $purpose = Purpose::find( $request->allotment_purpose );

                Application::where( 'id', $request->application_id )->update( [
                    'purpose_id' => $request->allotment_purpose,
                    'application_rule_id' => $request->land_allotment_rule,
                    'user_id' => $user->id,
                    'status_flag' => 't',
                    'allot_auth' => $purpose->purpose_allotment_author ?? '',
                    'purpose_detail' => $request->purpose_details ?? '',
                    'user_type' => $user->user_type ?? '',
                    'sso_id' => $user->sso_id ?? '',
                    'applicant_type' => $request->applicant_type,
                    'org_name' => $request->org_name ?? null,
                    'dep_name' => $request->dep_name ?? null,
                    'applicant_designation' => $request->app_des ?? null,
                    'applicant_name' => $request->app_name ?? null,
                    'applicant_fname' => $request->app_fname ?? null,
                    'applicant_add1' => $request->address_app ?? null,
                    'applicant_mnumber' => $request->app_mobile ?? null,
                    'applicant_email' => $request->app_email ?? null,

                ] );

                if ( $request->applicant_type == 'orgnization' ) {
                    $organizationData = [];

                    $organizationData[ 'user_id' ] = $user->id;
                    $organizationData[ 'user_type' ] = $user->user_type ?? '';
                    $organizationData[ 'sso_id' ] = $user->sso_id ?? '';
                    $organizationData[ 'land_alloted_details' ] = $request->land_alloted_details;
                    $organizationData[ 'project_report' ] = $request->project_report;
                    $organizationData[ 'society_benefits' ] = $request->society_benefits;
                    $organizationData[ 'land_used' ] = $request->land_used;
                    $organizationData[ 'experience' ] = $request->experience;
                    $organizationData[ 'experience_detail' ] = $request->experience_detail;
                    $organizationData[ 'registered' ] = $request->registered;
                    $organizationData[ 'reg_number' ] = $request->reg_number;
                    $organizationData[ 'reg_date' ] = $request->reg_date;
                    $organizationData[ 'org_reg_certificate' ] = $request->org_reg_certificate;
                    $fileFields = [
                        'org_statement'           => 'org_statement',
                        'project_report_file'     => 'project_report_file',
                        'ins_allot_purpose'       => 'ins_allot_purpose',
                        'society_benefits_file'   => 'society_benefits_file',
                        'prev_allot_land_file'    => 'prev_allot_land_file',
                        'org_reg_certificate_file'=> 'org_reg_certificate_file',
                    ];

                    foreach ( $fileFields as $inputName => $dbColumn ) {

                        if ( $request->hasFile( $inputName ) ) {
                            $file = $request->file( $inputName );

                            $filename = Str::uuid()->toString().'_'.$file->getClientOriginalName();
                            $path = $file->storeAs( 'documents', $filename, 'public' );
                            $organizationData[ $dbColumn ] = $filename;
                        }
                    }

                    Organization::where( 'application_id', $request->application_id )->update( $organizationData );
                }
                DB::commit();
                return response()->json( [ 'status' => true, 'message' => '', 'data' => $request->application_id ] );

            } elseif ( $request->step == 1 ) {

                $request->validate( [
                    'application_id' => 'required|string|exists:applications,id',
                    'district' => 'required',
                    'tehsil' => 'required',
                    'village' => 'required',
                    'khsra'    => 'required|array|min:1',
                    'khsra.*'  => 'required|string|min:1',
                    'type_of_land' => 'required',
                    'proposed_area' => 'required|numeric|min:0',
                    'land_surrendered' => 'required|in:yes,no',
                    'land_surrendered_detail' => 'required_if:land_surrendered,yes',
                ] );

                $divID = District::where( 'district_code', $request->district )->value( 'div_id' );
                $application = Application::find( $request->application_id );
                $application->applicant_district = $request->district;
                $application->applicant_tehsil = $request->tehsil;
                $application->applicant_division = $divID;
                $application->save();

                LandDetail::where( 'application_id', $request->application_id )->update( [
                    'proposed_land_area' => $request->proposed_area,
                    'village_code' => $request->village,
                    'land_type' => $request->type_of_land,
                    'user_id' => $user->id,
                    'user_type' => $user->user_type ?? '',
                    'sso_id' => $user->sso_id ?? '',
                    'is_land_surrendered' => $request->land_surrendered,
                    'surrender_details' => $request->land_surrendered_detail,
                    'khasra_number' => implode( ',', $request->khsra )
                ] );

                // Insert multiple data in land owner details table with multiple khasra number
                $village      = $request->village;
                $applicationId = $request->application_id;
                $applicationNumber = $application->application_number;
                $userId       = $user->id;
                $userType     = $user->user_type ?? '';
                $ssoId        = $user->sso_id ?? '';
                $landOwnerData = [];
                if ( count( $request->khsra )> 0 ) {
                    LandOwnerDetail::where( 'application_id', $applicationId )->delete();
                    foreach ( $request->khsra as $khasra ) {
                        $ownerDetails = $this->landOwnerDetail( $village, $khasra );

                        $landOwnerData[] = [
                            'application_id'    => $applicationId,
                            'application_number'=> $applicationNumber,
                            'user_id'           => $userId,
                            'user_type'         => $userType,
                            'sso_id'            => $ssoId,
                            'owner_name'        => $ownerDetails[ 'name' ] ?? '',
                            'owner_fname'       => $ownerDetails[ 'fathername' ] ?? '',
                            'owner_add1'        => $ownerDetails[ 'Address' ] ?? '',
                            'khasra_number'     => $ownerDetails[ 'khasra' ] ?? '',
                        ];
                    }
                    LandOwnerDetail::insert( $landOwnerData );
                }

                DB::commit();
                return response()->json( [ 'status' => true, 'message' => '', 'data' => $request->application_id ] );

            } elseif ( $request->step == 2 ) {

                $request->validate( [
                    'application_id' => 'required|string|exists:applications,id',
                    'khatadari' => 'required|in:yes,no',
                    'khatadariDetails' => 'required_if:khatadari,yes',
                    'act_1894' => 'required|in:yes,no',
                    'landacc' => 'required_if:act_1894,yes',
                    'irrigation_means' => 'required|in:yes,no',
                    'irrigationDetails' => 'required_if:irrigation_means,yes',
                    'railway_distance' => 'required|numeric|min:0',
                    'national_highway_distance' => 'required|numeric|min:0',
                    'state_highway' => 'required|numeric|min:0',
                    'distance_from_town_city' => 'required|numeric|min:0',
                    'project_cost' => 'required|numeric|min:0',
                    'relevant_info' => 'required',

                ] );

                $landDeatilData = [
                    'khatedari_proceeding' => $request->khatadari,
                    'khatedari_proceeding_details' => $request->khatadariDetails,
                    'under_acquisition_act_1894' => $request->act_1894,
                    'under_acquisition_act_1894_detail' =>$request->landacc,
                    'irrigation_land' => $request->irrigation_means,
                    'project_cost' => $request->project_cost,
                    'irrigation_detail' => $request->irrigationDetails,
                    'dist_from_RL' => $request->railway_distance,
                    'dist_from_NH' => $request->national_highway_distance,
                    'dist_from_SH' => $request->state_highway,
                    'dist_from_City' => $request->distance_from_town_city,
                    'other_details' => $request->relevant_info,
                ];

                LandDetail::where( 'application_id', $request->application_id )->update( $landDeatilData );
                DB::commit();
                return response()->json( [ 'status' => true, 'message' => '', 'data' => $request->application_id ] );

            } else {
                // dd( $request->all() );
                $request->validate( [
                    'application_id' => 'required|exists:applications,id',
                ] );

                $application = Application::findOrFail( $request->application_id );

                foreach ( $request->document_id as $fieldName => $docId ) {
                    $isField = "is_{$fieldName}";

                    // build validation dynamically
                    $rules[ $isField ] = 'required|in:yes,no';
                    $rules[ $fieldName ] = 'nullable|mimes:pdf,jpg,png|max:2048';
                }
                $request->validate( $rules );

                foreach ( $request->document_id as $fieldName => $docId ) {
                    if ( $request->hasFile( $fieldName ) ) {

                        // Store new file
                        $filePath = $request->file( $fieldName )->store( 'documents', 'public' );

                        // Find if record already exists
                        $docUpload = DocUpload::where( 'application_id', $application->id )
                        ->where( 'document_id', $docId )
                        ->first();

                        if ( $docUpload ) {
                            // Optional: delete old file
                            if ( $docUpload->document_file && Storage::disk( 'public' )->exists( $docUpload->getRawOriginal( 'document_file' ) ) ) {
                                Storage::disk( 'public' )->delete( $docUpload->getRawOriginal( 'document_file' ) );
                            }

                            // Update record
                            $docUpload->update( [
                                'document_file' => $filePath,
                                'uploaded_by'   => $user->id ?? '',
                                'user_type'     => $user->user_type ?? '',
                                'sso_id'        => $user->sso_id ?? '',
                                'is_active'     => 1,
                            ] );
                        } else {
                            // Create new record if not found
                            DocUpload::create( [
                                'application_id'     => $application->id,
                                'application_number' => $application->application_number,
                                'document_id'        => $docId,
                                'document_file'      => $filePath,
                                'uploaded_by'        => $user->id ?? '',
                                'user_type'          => $user->user_type ?? '',
                                'sso_id'             => $user->sso_id ?? '',
                                'is_active'          => 1,
                            ] );
                        }
                    }
                }

                DB::commit();
                return response()->json( [
                    'status' => true,
                    'message' => '',
                    'data' => $request->application_id,
                    'step' => 3, // extra param
                ] );
            }

        } catch ( ValidationException $e ) {
            DB::rollback();
            return response()->json( [
                'status' => false,
                'message' => 'Validation Error',
                'errors' => $e->errors(),
            ], 422 );
        } catch ( \Exception $e ) {
            Log::error( 'Error: ' . $e->getMessage() );
            return response()->json( [
                'status' => false,
                'message' => 'Something went wrong. Please try again.',
                'error' => $e->getMessage(),
            ], 500 );
        }
    }

    public function previewApplication( $id ) {
        $applicationData = Application::with( [ 'purpose', 'rule', 'landOwners', 'ApplicationDocs', 'district', 'tehsil', 'landDetail', 'organizationDtls' ] )->where( 'id', $id )->firstOrFail();
        return response()->json( [ 'status' => true, 'data' => $applicationData ] );

    }

    public function finalSubmit( $applicationNumber ) {
        $application = Application::where( 'id', $applicationNumber )->first();
        $user = Auth::user();

        if ( !$application ) {
            return response()->json( [
                'status' => false,
                'message' => 'Application not found.',
            ], 404 );
        }
        $purpose = Purpose::find( $application->purpose_id );
        $allotingAuthor = null;

        if ( $purpose ) {
            switch ( $purpose->purpose_allotment_author ) {
                case 'DM':
                $allotingAuthor = User::where( 'district_id', $application->applicant_district )
                ->where( 'user_type', 'DM' )
                ->first();
                break;

                case 'SDO':
                $allotingAuthor = User::where( 'block', $application->applicant_tehsil )
                ->where( 'user_type', 'SDO' )
                ->first();
                break;

                case 'DC':
                $allotingAuthor = User::where( 'division_id', $application->applicant_division )
                ->where( 'user_type', 'DC' )
                ->first();
                break;

                default:
                $allotingAuthor = User::where( 'district_id', $application->applicant_district )->first();
            }
        }

        $allotingAuthorId = $allotingAuthor ? $allotingAuthor->id : null;
        $allotingAuthorname = $allotingAuthor ? $allotingAuthor->user_type : null;

        $application->update( [
            'status_flag' => 'p',
            'last_forward_to_id' => $allotingAuthorId,
        ] );

        ApplicationTransaction::create( [
            'application_id' => $application->id,
            'application_number' => $application->application_number ?? '',
            'forward_to_id' => $allotingAuthorId,
            'forward_to_user_type' => $allotingAuthor->user_type ?? '',
            'forward_to_sso' => $allotingAuthor->sso_id ?? '',
            'forward_from_id' => $user->id ?? '',
            'forward_from_user_type' => $user->user_type ?? '',
            'forward_from_sso' => $user->sso_id ?? '',
            'status' => 'pending',
        ] );

        return redirect()->route( 'user.dashboard' )->with( 'success', 'Application has been sent to ' . $allotingAuthorname . ' successfully.' );

        // return response()->json( [
        //     'status' => true,
        //     'message' => $request->application_no_doc . ' saved successfully',
        //     'authority' => $allotingAuthorname . ' send successfully',
        // ] );

    }

    public function saveLandSelection( Request $request ) {
        try {

            dd( $request->all() );
            $request->validate( [
                'application_id' => 'required|string|exists:applications,id',
                'allotment_purpose' => 'required',
                'land_allotment_rule' => 'required',
                'applicant_type' => 'required',
                'app_name' => 'required',
                'app_fname' => 'required',
                'address_app' => 'required',
                'app_mobile' => 'required|digits:10',
                'app_email' => 'required|email',
                'org_name' => 'required_if:applicant_type,orgnization',
                'dep_name' => 'required_if:applicant_type,department',
                'app_des' => 'required_if:applicant_type,orgnization|required_if:applicant_type,department',
            ] );

            $application_no = Carbon::now()->format( 'Ymd' ) . time();

            $purpose = Purpose::find( $request->allotment_purpose );

            //$div_id_get = District::where( 'district_code', $request->district )->first();

            // $division = Division::where( 'DivisionId', $div_id_get->div_id )->first();

            // if ( !$purpose ) {
            //     return back()->withErrors( [ 'allotment_purpose' => 'Invalid purpose selected.' ] );
            // }

            $user = Auth::user();

            $application = Application::create( [
                'application_number' => $application_no,
                'purpose_id' => $request->allotment_purpose,
                'application_rule_id' => $request->land_allotment_rule,
                'user_id' => $user->id,
                'status_flag' => 't',
                //'applicant_division' => $division->DivisionId,
                //'applicant_district' => $request->district,
                // 'applicant_tehsil' => $request->tehsil,
                'allot_auth' => $purpose->purpose_allotment_author ?? '',
                'purpose_detail' => $request->purpose_details ?? '',
                'user_type' => $user->user_type ?? '',
                'sso_id' => $user->sso_id ?? '',
                'applicant_type' => $request->applicant_type,
                'org_name' => $request->org_name ?? null,
                'dep_name' => $request->dep_name ?? null,
                'applicant_designation' => $request->app_des ?? null,
                'applicant_name' => $request->app_name ?? null,
                'applicant_fname' => $request->app_fname ?? null,
                'applicant_add1' => $request->address_app ?? null,
                'applicant_mnumber' => $request->app_mobile ?? null,
                'applicant_email' => $request->app_email ?? null,

            ] );

            return response()->json( [ 'status' => true, 'message' => '', 'data' => $application_no ] );
        } catch ( ValidationException $e ) {
            return response()->json( [
                'status' => false,
                'message' => 'Validation Error',
                'errors' => $e->errors(),
            ], 422 );
        } catch ( \Exception $e ) {
            Log::error( 'Error: ' . $e->getMessage() );
            return response()->json( [
                'status' => false,
                'message' => 'Something went wrong. Please try again.',
                'error' => $e->getMessage(),
            ], 500 );
        }
    }

    public function landDetailSave2( Request $request ) {
        //dd( $request->all() );
        if ( !in_array( $request->action, [ 'save', 'update' ] ) ) {
            return response()->json( [
                'status' => false,
                'message' => 'Invalid action specified.',
            ], 400 );
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

            $validated = $request->validate( $rules );

            $application = Application::where( 'application_number', $request->application_no )->firstOrFail();

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

            if ( $request->action === 'save' ) {
                $landDetail = LandDetail::updateOrCreate(
                    [ 'application_id' => $application->id ],
                    array_merge( $data, [ 'application_id' => $application->id ] )
                );

                return response()->json( [
                    'status' => true,
                    'message' => 'Land details saved successfully.',
                    'data' => $request->application_no,
                ] );
            } elseif ( $request->action === 'update' ) {
                $landDetail = LandDetail::where( 'application_id', $application->id )->first();

                if ( !$landDetail ) {
                    return response()->json( [
                        'status' => false,
                        'message' => 'Land detail record not found for update.',
                    ], 404 );
                }

                $landDetail->update( $data );

                return response()->json( [
                    'status' => true,
                    'message' => 'Land details updated successfully.',
                    'data' => $request->application_no,
                ] );
            }
        } catch ( ValidationException $e ) {
            return response()->json( [
                'status' => false,
                'message' => 'Validation error occurred',
                'errors' => $e->errors(),
            ], 422 );
        } catch ( \Exception $e ) {
            Log::error( 'Error in landDetailSave2: ' . $e->getMessage() );
            return response()->json( [
                'status' => false,
                'message' => 'Something went wrong. Please try again.',
                'error' => $e->getMessage(),
            ], 500 );
        }
    }

    public function saveDocuments( Request $request ) {
        if ( $request->actiondoc == 'savedoc' ) {
            try {
                $request->validate( [
                    'application_no_doc' => 'required|exists:applications,application_number',

                    'copy_khasra_map' => 'required|in:yes,no',
                    'copy_khasra_map_doc' => 'required_if:copy_khasra_map,yes|file|mimes:pdf,jpg,jpeg,png|max:2048',

                    'original_copy_challan' => 'required|in:yes,no',
                    'original_copy_challan_doc' => 'required_if:original_copy_challan,yes|file|mimes:pdf,jpg,jpeg,png|max:2048',

                    'project_cost_copy' => 'required|in:yes,no',
                    'project_cost_copy_doc' => 'required_if:project_cost_copy,yes|file|mimes:pdf,jpg,jpeg,png|max:2048',

                    'copies_revenue_map' => 'required|in:yes,no',
                    'copies_revenue_map_doc' => 'required_if:copies_revenue_map,yes|file|mimes:pdf,jpg,jpeg,png|max:2048',
                ] );

                $application = Application::where( 'application_number', $request->application_no_doc )->first();

                $user = Auth::user();

                // if ( !$application ) {
                //     return response()->json( [
                //         'status' => false,
                //         'message' => 'Application not found.',
                // ], 404 );
                // }

                $documents = [
                    'copy_khasra_map' => [
                        'available' => $request->copy_khasra_map,
                        'file' => $request->file( 'copy_khasra_map_doc' ),
                    ],
                    'original_copy_challan' => [
                        'available' => $request->original_copy_challan,
                        'file' => $request->file( 'original_copy_challan_doc' ),
                    ],
                    'project_cost_copy' => [
                        'available' => $request->project_cost_copy,
                        'file' => $request->file( 'project_cost_copy_doc' ),
                    ],
                    'copies_revenue_map' => [
                        'available' => $request->copies_revenue_map,
                        'file' => $request->file( 'copies_revenue_map_doc' ),
                    ],
                ];

                foreach ( $documents as $docType => $info ) {
                    $filePath = null;

                    if ( $info[ 'file' ] ) {
                        $filePath = $info[ 'file' ]->store( 'documents', 'public' );
                    }

                    $docc = DocUpload::create( [
                        'application_id' => $application->id,
                        'application_number' => $application->application_number,
                        'document_id' => $docType,
                        'document_file' => $filePath,
                        'uploaded_by' => $user->id ?? '',
                        'user_type' => $user->user_type ?? '',
                        'sso_id' => $user->sso_id ?? '',
                        'is_active' => 1,
                    ] );
                }

                $purpose = Purpose::find( $application->purpose_id );
                $allotingAuthor = null;

                $docs = DocUpload::where( 'application_number', $request->application_no_doc )->get();

                $application->update( [
                    'applicant_state' => $user->state ?? '',
                    'applicant_tehsil' => $user->block ?? '',
                ] );

                return response()->json( [
                    'status' => true,
                    'data' => $docs,
                    'message' => $request->application_no_doc . ' saved successfully',
                ] );
            } catch ( ValidationException $e ) {
                return response()->json( [
                    'status' => false,
                    'message' => 'Validation Error',
                    'errors' => $e->errors(),
                ], 422 );
            } catch ( \Exception $e ) {
                Log::error( 'Error saving documents: ' . $e->getMessage() );
                return response()->json( [
                    'status' => false,
                    'message' => 'Something went wrong. Please try again.',
                    'error' => $e->getMessage(),
                ], 500 );
            }
        } elseif ( $request->actiondoc == 'updatedoc' ) {
            try {
                $request->validate( [
                    'application_no_doc' => 'required|exists:applications,application_number',

                    'copy_khasra_map' => 'required|in:yes,no',
                    'copy_khasra_map_doc' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:2048',

                    'original_copy_challan' => 'required|in:yes,no',
                    'original_copy_challan_doc' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:2048',

                    'project_cost_copy' => 'required|in:yes,no',
                    'project_cost_copy_doc' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:2048',

                    'copies_revenue_map' => 'required|in:yes,no',
                    'copies_revenue_map_doc' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:2048',
                ] );

                $application = Application::where( 'application_number', $request->application_no_doc )->first();

                $user = Auth::user();

                if ( !$application ) {
                    return response()->json( [
                        'status' => false,
                        'message' => 'Application not found.',
                    ], 404 );
                }

                $documents = [
                    'copy_khasra_map' => [
                        'available' => $request->copy_khasra_map,
                        'file' => $request->file( 'copy_khasra_map_doc' ),
                    ],
                    'original_copy_challan' => [
                        'available' => $request->original_copy_challan,
                        'file' => $request->file( 'original_copy_challan_doc' ),
                    ],
                    'project_cost_copy' => [
                        'available' => $request->project_cost_copy,
                        'file' => $request->file( 'project_cost_copy_doc' ),
                    ],
                    'copies_revenue_map' => [
                        'available' => $request->copies_revenue_map,
                        'file' => $request->file( 'copies_revenue_map_doc' ),
                    ],
                ];

                foreach ( $documents as $docType => $info ) {
                    $docUpload = DocUpload::where( 'application_id', $application->id )
                    ->where( 'document_id', $docType )
                    ->first();

                    if ( !$docUpload ) {
                        $docUpload = new DocUpload();
                        $docUpload->application_id = $application->id;
                        $docUpload->application_number = $application->application_number;
                        $docUpload->document_id = $docType;
                        $docUpload->uploaded_by = Auth::id();
                        $docUpload->user_type = $user->user_type ?? '';
                        $docUpload->sso_id = $user->sso_id ?? '';
                        $docUpload->is_active = 1;
                    }

                    if ( $info[ 'file' ] ) {
                        $filePath = $info[ 'file' ]->store( 'documents', 'public' );
                        $docUpload->document_file = $filePath;
                    }

                    $docUpload->save();
                }

                return response()->json( [
                    'status' => true,
                    'message' => $request->application_no_doc . ' updated successfully',
                ] );
            } catch ( ValidationException $e ) {
                return response()->json( [
                    'status' => false,
                    'message' => 'Validation Error',
                    'errors' => $e->errors(),
                ], 422 );
            } catch ( \Exception $e ) {
                Log::error( 'Error updating documents: ' . $e->getMessage() );
                return response()->json( [
                    'status' => false,
                    'message' => 'Something went wrong while updating. Please try again.',
                    'error' => $e->getMessage(),
                ], 500 );
            }
        } else {
            return response()->json( [
                'status' => false,
                'message' => 'Invalid action provided.',
            ], 400 );
        }
    }

    public function showApplicationPreview( Request $request, $id ) {
        try {
            $application = Application::with( [ 'purpose', 'rule', 'landDetails', 'landOwners', 'docUploads' ] )
            ->where( 'application_number', $id )
            ->firstOrFail();

            $purposeName = $application->purpose?->purpose_name ?? '-';
            $ruleName = $application->rule?->application_rule_name ?? '-';

            return view( 'applications.partials.preview-body', [
                'application' => $application,
                'landDetails' => $application->landDetails,
                'landOwners' => $application->landOwners,
                'docUploads' => $application->docUploads,
                'purposeName' => $purposeName,
                'ruleName' => $ruleName,
            ] );
        } catch ( \Exception $e ) {
            Log::error( 'Error: ' . $e->getMessage() );
            return response()->json( [
                'status' => false,
                'message' => 'Something went wrong. Please try again.',
                'error' => $e->getMessage(),
            ], 500 );
        }
    }

    public function showCheckList( Request $request, $id ) {
        try {
            $application = Application::with( [ 'purpose', 'rule', 'landDetails', 'landOwners', 'docUploads' ] )
            ->where( 'id', $id )
            ->firstOrFail();

            $purposeName = $application->purpose?->purpose_name ?? '-';
            $ruleName = $application->rule?->application_rule_name ?? '-';

            $docMasterTypes = MasterAttachment::where( 'patwari_display', 'yes' )->get();

            return view( 'checklist', [
                'application' => $application,
                'landDetails' => $application->landDetails,
                'landOwners' => $application->landOwners,
                'docUploads' => $application->docUploads,
                'purposeName' => $purposeName,
                'ruleName' => $ruleName,
                'docMasterTypes' => $docMasterTypes,
            ] );
        } catch ( \Exception $e ) {
            Log::error( 'Error: ' . $e->getMessage() );
            return response()->json( [
                'status' => false,
                'message' => 'Something went wrong. Please try again.',
                'error' => $e->getMessage(),
            ], 500 );
        }
    }

    public function user_dashboard() {
        try {

            $loginUserID = Auth::id();
            $counts = Application::where( 'user_id', $loginUserID )
            ->selectRaw( "
            COUNT(CASE WHEN status_flag = 't' THEN 1 END) as pendingCount,
            COUNT(CASE WHEN status_flag = 'e' THEN 1 END) as errorCount,
            COUNT(CASE WHEN status = 'processing' THEN 1 END) as processingCount,
            COUNT(CASE WHEN status = 'rejected' THEN 1 END) as rejectCount,
            COUNT(CASE WHEN status = 'completed' THEN 1 END) as completedCount" )->first();
            return view( 'user_dashboard', compact( 'counts' ) );
        } catch ( \Exception $e ) {
            Log::error( 'Error: ' . $e->getMessage() );
            return response()->json( [
                'status' => false,
                'message' => 'Something went wrong. Please try again.',
                'error' => $e->getMessage(),
            ], 500 );
        }
    }

    public function getApplication( $type = null ) {
        try {
            $loginUserID = Auth::id();
            $counts = Application::where( 'user_id', $loginUserID )
            ->selectRaw( "
            COUNT(CASE WHEN status_flag = 't' THEN 1 END) as pendingCount,
            COUNT(CASE WHEN status_flag = 'e' THEN 1 END) as errorCount,
            COUNT(CASE WHEN status = 'processing' THEN 1 END) as processingCount,
            COUNT(CASE WHEN status = 'rejected' THEN 1 END) as rejectCount,
            COUNT(CASE WHEN status = 'completed' THEN 1 END) as completedCount" )->first();
            $query = Application::with( [ 'purpose:id,purpose_name', 'rule:id,application_rule_name', 'latestTransaction' ] )->where( 'user_id', $loginUserID );
            switch ( $type ) {
                case 'pending':
                $query->where( 'status_flag', 't' );
                break;
                case 'processing':
                $query->where( 'status', 'processing' );
                break;
                case 'error':
                $query->where( 'status_flag', 'e' );
                break;
                case 'reject':
                $query->where( 'status', 'rejected' );
                break;
                case 'complete':
                $query->where( 'status', 'completed' );
                break;
                default:
                $query->where( 'status_flag', 't' );
                break;
            }

            $getApplication = $query->orderBy( 'id', 'desc' )->paginate( 10 );
            return view( 'user_dashboard', compact( 'getApplication', 'type', 'counts' ) );
        } catch ( \Exception $e ) {
            Log::error( 'Error: ' . $e->getMessage() );
            return response()->json( [
                'status' => false,
                'message' => 'Something went wrong. Please try again.',
                'error' => $e->getMessage(),
            ], 500 );
        }
    }

    public function deleteApplication( $id ) {
        DB::beginTransaction();

        try {
            $loginUserID = Auth::id();
            $application = Application::where( 'id', $id )->where( 'user_id', $loginUserID )->firstOrFail();
            $relatedModels = [
                LandDetail::class,
                LandOwnerDetail::class,
                DocUpload::class,
                ApplicationTransaction::class,
            ];

            foreach ( $relatedModels as $model ) {
                $model::where( 'application_id', $id )->delete();

            }

            $application->delete();
            DB::commit();

            return redirect()->back()->with( 'success', 'Application deleted successfully!' );
        } catch ( ModelNotFoundException $e ) {
            DB::rollBack();
            return redirect()->back()->with( 'error', 'Application not found or unauthorized access.' );
        } catch ( \Exception $e ) {
            DB::rollBack();
            Log::error( 'Delete Application Error: ' . $e->getMessage() );
            return redirect()->back()->with( 'error', 'An error occurred while deleting the application.' );
        }
    }

    public function edit( Request $request, $id ) {
        //dd( $id );
        try {
            $application = Application::with( [ 'purpose', 'rule', 'landDetails', 'landOwners', 'docUploads' ] )
            ->where( 'id', $id )
            ->firstOrFail();

            //dd( $application->purpose );

            $documentTypes = MasterAttachment::all();
            $purpose = Purpose::all();
            $rule = ApplicationRule::all();

            $purposeName = $application->purpose?->purpose_name ?? '-';
            $ruleName = $application->rule?->application_rule_name ?? '-';

            return view( 'application_edit', [
                'application' => $application,
                'landDetails' => $application->landDetails,
                'landOwners' => $application->landOwners,
                'docUploads' => $application->docUploads,
                'documentTypes' => $documentTypes,
                'purpose' => $purpose,
                'rule' => $rule,
                'purposeName' => $purposeName,
                'ruleName' => $ruleName,
            ] );
        } catch ( \Exception $e ) {
            Log::error( 'Error: ' . $e->getMessage() );
            return response()->json( [
                'status' => false,
                'message' => 'Something went wrong. Please try again.',
                'error' => $e->getMessage(),
            ], 500 );
        }
    }

    public function saveDocumentsPatwari( Request $request ) {
        $application = Application::where( 'application_number', $request->actiondoc )->first();

        $user = Auth::user();

        foreach ( $request->allFiles() as $key => $file ) {
            if ( $file ) {
                $path = $file->store( 'documents', 'public' );

                \App\Models\DocUpload::create( [
                    'document_id' => str_replace( '_doc', '', $key ),
                    'document_file' => $path,
                    'application_id' => $application->id,
                    'application_number' => $application->application_number,
                    'uploaded_by' => $user->id ?? '',
                    'user_type' => $user->user_type ?? '',
                    'sso_id' => $user->sso_id ?? '',
                    'is_active' => 1,
                ] );
            }
        }

        return redirect()->back()->with( 'success', 'Documents uploaded successfully.' );
    }

    public function destroy( $id ) {
        $document = DocUpload::withTrashed()->find( $id );
        if ( !$document ) {
            return response()->json( [ 'success' => false, 'message' => 'File not found' ], 404 );
        }

        if ( \Storage::exists( $document->document_file ) ) {
            \Storage::delete( $document->document_file );
        }

        $document->forceDelete();

        return response()->json( [ 'success' => true ] );
    }

}

