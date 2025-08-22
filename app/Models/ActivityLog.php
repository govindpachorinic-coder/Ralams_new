<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ActivityLog extends Model {
    use HasFactory;

    protected $fillable = [
        'sso_id',
        'ralams_id',
        'user_id',
        'user_type',
        'ip_address',
        'activity',
        'activity_detail',
    ];

    // ================= Relations =================

    public function user() {
        return $this->belongsTo(User::class, 'ralams_id', 'ralams_id');
    }

    /**
     * Application relation — only if Application model exists
     */
    // public function application() {
    //     return $this->belongsTo(Application::class, 'application_id');
    // }
}
