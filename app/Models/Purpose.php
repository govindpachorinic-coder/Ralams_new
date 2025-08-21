<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Purpose extends Model {
    use HasFactory;

    protected $table = 'master_purposes';

    protected $fillable = [
        'application_rule_id',
        'purpose_name',
    ];

    // Relationships

    public function applicationRule() {
        return $this->belongsTo(ApplicationRule::class, 'application_rule_id');
    }

    public function applications() {
        return $this->hasMany(Application::class, 'purpose_id');
    }

    public function applicationDetails() {
        return $this->hasMany(ApplicationDetail::class, 'purpose_id');
    }
}
