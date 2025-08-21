<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable {
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    // protected $fillable = [
    //     'name',
    //     'email',
    //     'password',
    // ];

    protected $fillable = [
        'sso_id', 'ralams_id', 'user_type', 'display_name', 'first_name', 'last_name', 'father_name',
        'gender', 'date_of_birth', 'mobile', 'mail_personal', 'mail_official', 'postal_address',
        'postal_code', 'state', 'city', 'block', 'jpeg_photo', 'designation', 'department',
        'role_id', 'active', 'ip_address', 'mac_address',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'date_of_birth'     => 'date',
        ];
    }

    // ================= Relations =================

    public function role() {
        return $this->belongsTo(MasterRole::class, 'role_id');
    }

    public function activityLogs() {
        return $this->hasMany(ActivityLog::class, 'ralams_id', 'ralams_id');
    }

    public function userLogs() {
        return $this->hasMany(UserLog::class, 'ralams_id', 'ralams_id');
    }

    public function docUploads() {
        return $this->hasMany(DocUpload::class, 'ralams_id', 'ralams_id');
    }

    public function temporaryLandAllocations() {
        return $this->hasMany(TemporaryLandAllocation::class, 'ralams_id', 'ralams_id');
    }

    public function ssoUser() {
        return $this->hasMany(SsoUser::class, 'user_id', 'id');
    }

    public function district() {
        return $this->belongsTo(District::class, 'district_id','district_code');
    }

    public function blockData() {
        return $this->belongsTo(Tehsil::class, 'block','Tehsil_Code');
    }

    public function village() {
        return $this->belongsTo(Village::class, 'village_id','Village_Id');
    }
}
