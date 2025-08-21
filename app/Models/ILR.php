<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ilr extends Model {
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'ilr_code', 'ilr_name_eng', 'ilr_name_reg', 'block_code', 'is_active',
    ];

    // ================= Relations =================

    /**
     * Get the land allocations associated with this ILR.
     */
    public function landAllocations()
    {
        return $this->hasMany(TemporaryLandAllocation::class, 'ilr_code', 'ilr_code');
    }
}
