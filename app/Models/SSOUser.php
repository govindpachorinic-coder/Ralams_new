<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SSOUser extends Model {
    use HasFactory;

    protected $fillable = [
        'master_key_id', 'citizen_name', 'citizen_hf_name', 'pincode', 'citizen_address',
        'mobile_number', 'user_id', 'password_encryption', 'password', 'ip_address', 'mac_address',
        'entry_date', 'first_login', 'state', 'district', 'updated_date', 'aadhaar_no',
    ];

    // ================= Relations =================

    public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function district() {
        return $this->belongsTo(District::class, 'district', 'district_code');
    }
}
