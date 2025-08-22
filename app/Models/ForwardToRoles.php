<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ForwardToRoles extends Model {
    use HasFactory;
    
    protected $table = 'forward_roles';

    protected $fillable = [
        'user_type',
        'forward_to',
        'type',        
    ];
   
}
