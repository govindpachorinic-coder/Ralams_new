<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ApplicationRule extends Model {
    use HasFactory;

    protected $table = 'master_application_rules';

    protected $fillable = [
        'application_rule_name',
        'application_rule_code',
        'application_rule_description',
    ];

    // Relationships

    public function applications()
    {
        return $this->hasMany(Application::class, 'application_rule_id');
    }

    public function purposes()
    {
        return $this->hasMany(Purpose::class, 'application_rule_id');
    }
}
