<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Application extends Model
{
    use SoftDeletes;

    protected $table = 'applications';

    protected $fillable = [
        'purpose_id',
        'application_rule_id',
        'office_id',
        'department_id',
        'applicant_name',
        'applicant_fname',
        'applicant_mnumber',
        'applicant_add1',
        'applicant_add2',
        'applicant_add3',
        'applicant_state',
        'applicant_district',
        'applicant_division',
        'applicant_tehsil',
        'purpose_detail',
        'pin_code',
        'status_flag',
        'status',
        'last_forward_to_id',
        'last_forward_to_sso',
        'applicant_type',
        'application_number',
        'user_id',
        'sso_id',
        'user_type',
        'allot_auth',
        'applicant_designation',
        'applicant_email',
        'org_name',
        'dep_name',
    ];


    // Relationships
    public function details()
    {
        return $this->hasOne(ApplicationDetail::class, 'application_id');
    }

    public function rule()
    {
        return $this->belongsTo(ApplicationRule::class, 'application_rule_id');
    }

    public function purpose()
    {
        return $this->belongsTo(Purpose::class, 'purpose_id');
    }

    public function landDetails()
    {
        return $this->hasMany(LandDetail::class, 'application_id');
    }

    public function landOwners()
    {
        return $this->hasMany(LandOwnerDetail::class, 'application_id');
    }

    public function docUploads()
    {
        return $this->hasMany(DocUpload::class);
    }

    public function applicationTransactions()
    {
        return $this->hasMany(ApplicationTransaction::class, 'application_id');
    }

    public function landDetail()
    {
        return $this->hasOne(LandDetail::class, 'application_id')->with('village');
    }

    public function LandOwnerDetail()
    {
        return $this->hasMany(LandOwnerDetail::class, 'application_id');
    }


    public function ApplicationDocs()
    {
        return $this->hasMany(DocUpload::class, 'application_id');
    }

    public function lastForwardedTo()
    {
        return $this->belongsTo(User::class, 'last_forward_to_id');
    }

     public function latestTransaction() {
        return $this->hasOne( ApplicationTransaction::class, 'application_id' )->latestOfMany('id');
    }


}
