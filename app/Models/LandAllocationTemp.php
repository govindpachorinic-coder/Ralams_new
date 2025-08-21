<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LandAllocationTemp extends Model
{
    // Table name
    protected $table = 'land_allocation_temp';

    protected $casts = ['reg_date' => 'date:Y-m-d'];

    // Fillable fields (mass-assignment allowed)
    protected $fillable = [
        'allotment_purpose',
        'land_owner_type',
        'khatedar_name',
        'khatedar_fname',
        'khatedar_adr',
        'khatedar_mobile',
        'email',
        'org_type',
        'org_name',
        'proposed_area',
        'registration_details',
        'registration_certificate_number',
        'registration_status',
        'project_rpt_details',
        'project_rpt_file',
        'reg_date',
        'budget_announcement',
    ];
}
