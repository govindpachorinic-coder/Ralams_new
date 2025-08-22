<?php

namespace App\Http\Controllers;

use App\Models\LandAllocationTemp;
use Illuminate\Http\Request;

class LandAllocationTempController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('user_portal.applicant_form');
    }

    public function bhumi_chayan() {
        return view('land_allotment.bhoomi_chayan');
    }

    public function bhumi_vivran() {
        return view('land_allotment.bhoomi_vivran');
    }

    public function documentation() {
        return view('land_allotment.documents_upload');
    }

    public function preview() {
        return view('land_allotment.preview');
    }

    public function sanstha_viivran() {
        return view('land_allotment.sanstha_viivran');
    }

    /**
     * Store a newly created resource in storage.
     */
public function store(Request $request)
{

     dd($request->all());
    $request->validate([
        'allotment_purpose'            => 'required|string|max:255',
        'land_allot_rule'              => 'required|string',
        'khatedar_name'                => 'required|string|max:255',
        'khatedar_fname'               => 'required|string|max:255',
        'khatedar_adr'             => 'required|string|max:500',
        'khatedar_mobile'              => 'required|digits:10',
        'email'                        => 'required|email|max:255',
        // 'org_type'                     => 'required|string',
        // 'org_name'                     => 'required|string|max:255',
        // 'proposed_area'                => 'required|decimal:1,4',
    ]);

    // बजट फाइल कंटेंट
    // $budgetFileBinary = null;
    // if ($request->hasFile('budget_file')) {
    //     $budgetFileBinary = file_get_contents($request->file('budget_file')->getRealPath());
    // }

    // डाटा सेव
    LandAllocationTemp::create([
        'allotment_purpose'                => $request->allotment_purpose,
        'land_owner_type'                  => $request->land_allot_rule,
        'khatedar_name'                    => $request->khatedar_name,
        'khatedar_fname'                   => $request->khatedar_fname,
        'khatedar_adr'                     => $request->khatedar_adr,
        'khatedar_mobile'                  => $request->khatedar_mobile,
        'email'                            => $request->email,
        // 'org_type'                         => $request->org_type,
        // 'org_name'                         => $request->org_name,
        // 'proposed_area'                    => $request->proposed_area,
        // 'reg_date'                         => $request->reg_date,
        // 'registration_details'             => $request->registration_details,
        // 'registration_certificate_number'  => $request->registration_certificate_number,
        // // 'registration_status'              => $request->registration_status === 'Yes' ? "Registered on " . $request->reg_date : "Not Registered",
        // 'registration_status'              => $request->registration_status,
        // 'project_rpt_details'              => $request->budget_announcement,
    ]);

    return redirect()->back()->with('success', 'आवेदन सफलतापूर्वक सेव हो गया।');
}


    /**
     * Display the specified resource.
     */
    public function show(LandAllocationTemp $landAllocationTemp)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(LandAllocationTemp $landAllocationTemp)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, LandAllocationTemp $landAllocationTemp)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(LandAllocationTemp $landAllocationTemp)
    {
        //
    }
}
