<?php

namespace App\Http\Controllers;

use App\Models\TemporaryLandAllocation;
use Illuminate\Http\Request;

class TemporaryLandAllocationController extends Controller
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
        // return view('user_portal.applicant_form');
    }

    /**
     * Store a newly created resource in storage.
     */
    // public function store(Request $request)
    // {
    //     $request->validate([
    //         'allotment_purpose'            => 'required|string|max:255',
    //         'land_owner_type'              => 'required|string',
    //         'khatedar_name'                => 'required|string|max:255',
    //         'khatedar_fname'               => 'required|string|max:255',
    //         'khatedar_address'             => 'required|string|max:500',
    //         'khatedar_mobile'              => 'required|digits:10',
    //         'email'                        => 'required|email|max:255',
    //         'org_type'                     => 'required|string',
    //         'org_name'                     => 'required|string|max:255',
    //         'proposed_area'                => 'required|string|max:255',
    //         'registration_details'         => 'required|string',
    //         'registered'                   => 'required|in:Yes,No',
    //         'registration_certificate_number' => 'nullable|required_if:registered,Yes|string|max:255',
    //         'reg_date'                     => 'nullable|required_if:registered,Yes|date',
    //         'budget_announcement'          => 'required|in:Yes,No',
    //         'budget_file'                  => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:2048',
    //     ]);

    //     // बजट फाइल कंटेंट
    //     $budgetFileBinary = null;
    //     if ($request->hasFile('budget_file')) {
    //         $budgetFileBinary = file_get_contents($request->file('budget_file')->getRealPath());
    //     }

    //     // डाटा सेव
    //     TemporaryLandAllocation::create([
    //         'allotment_purpose'                => $request->allotment_purpose,
    //         'land_owner_type'                  => $request->land_owner_type,
    //         'khatedar_name'                    => $request->khatedar_name,
    //         'khatedar_fname'                   => $request->khatedar_fname,
    //         'khatedar_address'                 => $request->khatedar_address,
    //         'khatedar_mobile'                  => $request->khatedar_mobile,
    //         'email'                            => $request->email,
    //         'org_type'                         => $request->org_type,
    //         'org_name'                         => $request->org_name,
    //         'proposed_area'                    => $request->proposed_area,
    //         'registration_details'             => $request->registration_details,
    //         'registration_certificate_number'  => $request->registration_certificate_number,
    //         'registration_status'              => $request->registered === 'Yes' ? "Registered on " . $request->reg_date : "Not Registered",
    //         'project_rpt_details'              => $request->budget_announcement,
    //         'project_rpt_file'                 => $budgetFileBinary,
    //     ]);

    //     return redirect()->back()->with('success', 'आवेदन सफलतापूर्वक सेव हो गया।');
    // }


    /**
     * Display the specified resource.
     */
    public function show(TemporaryLandAllocation $temporaryLandAllocation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TemporaryLandAllocation $temporaryLandAllocation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, TemporaryLandAllocation $temporaryLandAllocation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TemporaryLandAllocation $temporaryLandAllocation)
    {
        //
    }
}
