<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tehsil extends Model {
    use HasFactory;

    protected $table = 'master_tehsil';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
       'block_code', 'block_name_eng', 'block_name_reg', 'subdivision_code', 'district_code', 'block_lgd_code', 'is_active' 
    ];

    // ================= Relations =================

    /**
     * Get the district that this tehsil belongs to.
     */
    public function district() {
        return $this->belongsTo(District::class, 'district_code', 'district_code');
    }

    /**
     * Get the ILRs under this tehsil.
     */
    public function ilrs() {
        return $this->hasMany(Ilr::class, 'block_code', 'block_code');
    }

    /**
     * Get the villages under this tehsil.
     */
    public function villages_old() {
        return $this->hasMany(Village::class, 'block_code', 'block_code');
    }

    public function villages()
    {
        return $this->hasMany(Village::class, 'Tehsil_Code', 'Tehsil_Code');
    }
}
