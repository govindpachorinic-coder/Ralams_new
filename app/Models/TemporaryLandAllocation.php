<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TemporaryLandAllocation extends Model {
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'ralams_id', 'allotment_purpose', 'land_owner_type', 'khatedar_name', 'khatedar_fname', 
        'khatedar_district_code', 'khatedar_block_code', 'khatedar_address', 'khatedar_mobile', 
        'district_code', 'tehsil_code', 'ilr_code', 'patwar_mandal', 'village_code', 'khasra_number', 
        'land_type', 'khasra_area', 'proposed_area', 'map_doc_file', 'irrigation_details', 
        'surrender_land_details', 'registration_certificate_number', 'registration_certificate_file', 
        'registration_details', 'finance_3y_file', 'project_rpt_file', 'project_rpt_details', 
        'institutional_experience', 'institutional_experience_details', 'deptartment_concern_file', 
    ];

    // ================= Relations =================

    public function user() {
        return $this->belongsTo(User::class, 'ralams_id', 'ralams_id');
    }

    public function district() {
        return $this->belongsTo(District::class, 'district_code', 'district_code');
    }

    public function tehsil() {
        return $this->belongsTo(Tehsil::class, 'tehsil_code', 'block_code');
    }

    public function ilr() {
        return $this->belongsTo(Ilr::class, 'ilr_code', 'ilr_code');
    }

    public function village() {
        return $this->belongsTo(Village::class, 'village_code', 'village_code');
    }
}
