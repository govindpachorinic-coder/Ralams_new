<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class District extends Model {
    use HasFactory;
    protected $table = 'master_district';
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'district_code', 'center_code', 'state_code', 'district_name_eng', 'district_name_reg', 'div_code', 'district_lgd_code', 'district_location', 'is_active',
    ];
    
    // ================= Relations =================
    
    public function division() {
        return $this->belongsTo(Division::class, 'div_code', 'division_code');
    }

    public function tehsils_old() {
        return $this->hasMany(Tehsil::class, 'district_code', 'district_code');
    }

    public function tehsils()
    {
        return $this->hasMany(Tehsil::class, 'District_ID1', 'District_ID1');
    }
}
