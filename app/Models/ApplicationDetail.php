<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ApplicationDetail extends Model {
    use HasFactory;

    protected $table = 'application_details';


    protected $fillable = [
        'purpose_id',
        'application_id',
        //'office_id',
        //'department_id',
        'application_rule_id',
        'applicant_name',
        'applicant_fname',
        'applicant_mnumber',
        'applicant_add1',
        //'applicant_add2',
        //'applicant_add3',
        //'applicant_state',
        //'applicant_district',
        //'applicant_tehsil',
        //'pin_code',
        //'status_flag',
        //'app_status',
        //'last_forward_to_id',
        //'last_forward_to_sso',
        //'is_org',
    ];
        
    // ================= Relations =================
    
    public function purpose() {
        return $this->belongsTo(Purpose::class, 'purpose_id');
    }

    public function application() {
        return $this->belongsTo(Application::class, 'application_id');
    }

    // public function office() {
    //     return $this->belongsTo(Office::class, 'office_id');
    // }

    // public function department() {
    //     return $this->belongsTo(Department::class, 'department_id');
    // }

    public function applicationRule() {
        return $this->belongsTo(ApplicationRule::class, 'application_rule_id');
    }

    public function organization() {
        return $this->belongsTo(OrganizationDetail::class, 'organization_id');
    }

    // public function documents() {
    //     return $this->hasMany(ApplicationDocument::class, 'application_detail_id');
    // }

}

