<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;


class Organization extends Model
{
    use HasFactory,SoftDeletes;

    protected $table = 'organizations';

    protected $fillable = [
        'application_id',
        'application_number',
        'user_id',
        'user_type',
        'sso_id',
        'land_alloted_details',
        'project_report',
        'society_benefits',
        'land_used',
        'experience',
        'experience_detail',
        'registered',
        'reg_number',
        'reg_date',
        'org_reg_certificate',
        /// File filed
        'org_statement',
        'project_report_file',
        'ins_allot_purpose',
        'society_benefits_file',
        'prev_allot_land_file',
        'org_reg_certificate_file',
        'deleted_at',

        
    ];


    
}
