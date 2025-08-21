<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Applicant extends Model
{
    use HasFactory;
    
    protected $table = 'applications';
    
    protected $fillable = [
        'purpose_type', 'land_allotment_rule', 'applicant_name', 'father_name', 'applicantt_address',
        'mobile', 'email', 'org_type', 'org_name', 'area', 'remarks',
        'registered', 'reg_number', 'reg_date', 'budget_announcement', 'budget_file'
    ];

    public function purpose()
    {
        return $this->belongsTo(Purpose::class,'purpose_id');
    }

    public function applicationTransactions()
    {
        return $this->hasMany(ApplicationTransaction::class,'application_id');
    }

    public function landDeatil()
    {
        return $this->hasOne(LandDetail::class,'application_id')->with('village');        
    }

    public function LandOwnerDetail()
    {
        return $this->hasMany(LandOwnerDetail::class,'application_id');
    }

    public function ApplicationTransaction()
    {
        return $this->hasMany(ApplicationTransaction::class,'application_id');
    }

    public function Transactions()
    {
        return $this->hasMany(ApplicationTransaction::class,'application_id');
    }

    public function ApplicationDocs()
    {
        return $this->hasMany(DocUpload::class,'application_id');
    }

    public function Rule()
    {
        return $this->belongsTo(ApplicationRule::class,'application_rule_id');
    }

    public function lastForwardedTo(){
        return $this->belongsTo(User::class,'last_forward_to_id');
    }
    
}

