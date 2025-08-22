<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Village extends Model {
    use HasFactory;
    protected $table = "master_village";
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'village_code', 'village_name_eng', 'village_name_reg', 'village_lgd_code', 'patwar_code', 'block_code', 'is_active',
    ];

     // ================= Relations =================

    /**
     * Get the tehsil/block associated with this village.
     */
    public function tehsil() {
        return $this->belongsTo(Tehsil::class, 'block_code', 'block_code');
    }

    /**
     * Get the land allocations associated with this village.
     */
    public function landAllocations() {
        return $this->hasMany(TemporaryLandAllocation::class, 'village_code', 'village_code');
    }
}
