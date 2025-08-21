<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class LandDetail extends Model {
     use HasFactory,SoftDeletes;

    protected $table = 'land_details';

    protected $fillable = [
        'application_id',
        'application_number',
        'user_id',
        'user_type',
        'sso_id',
        'land_map_document_id',
        'village_code',
        'proposed_land_area',
        'khasra_number',
        'irrigation_land',
        'irrigation_detail',
        'soil_classification',
        'dist_from_SH',
        'dist_from_NH',
        'dist_from_RL',
        'dist_from_City',
        'is_land_surrendered',
        'surrender_details',
        'land_type',
        'jamabandi_file',
        'revenue_map_file',
        'khatedari_proceeding',
        'khatedari_proceeding_file',
        'khatedari_proceeding_details',
        'under_acquisition_act_1894',
        'under_acquisition_act_1894_file',
        'under_acquisition_act_1894_detail',
        'is_command_area',
        'development_fees',
        'premium_rate',
        'challan_number',
        'challan_date',
        'challan_file',
        'other_details',
        'project_cost',
    ];

    
    // ================= Relations =================
    
    public function application() {
        return $this->belongsTo(Application::class, 'application_id');
    }

    public function village()
    {
        return $this->belongsTo(Village::class,'village_code','Village_Id');
    }

    public function landMapDocument() {
        return $this->belongsTo(LandMapDocument::class, 'land_map_document_id');
    }
}

