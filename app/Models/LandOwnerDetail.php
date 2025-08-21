<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class LandOwnerDetail extends Model {
     use SoftDeletes;

    protected $table = 'land_owner_details';

    protected $fillable = [
        'application_id',
        'application_number',
        'user_id',
        'user_type',
        'sso_id',
        'owner_name',
        'owner_fname',
        'owner_add1',
        'owner_add2',
        'owner_add3',
        'pin_code',
        'khasra_number',
        'land_area',
    ];

    // Relations

    public function application()
    {
        return $this->belongsTo(Application::class, 'application_id');
    }
}