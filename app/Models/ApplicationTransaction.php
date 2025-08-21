<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ApplicationTransaction extends Model {
    use HasFactory,SoftDeletes;
    protected $table = 'application_transactions';        
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'application_id',
        'application_number',
        'forward_from_id',
        'forward_from_sso',
        'forward_from_user_type',
        'forward_to_id',
        'forward_to_sso',
        'forward_to_user_type',
        'forward_file',
        'forward_details',
        'comment',
        'status'
    ];
    
    // Relation with Application
    public function application() {
        return $this->belongsTo(Application::class,'application_id')->with(['landDetail','applicationDocs','landOwnerDetail']);
    }

    public function FromUser() {
        return $this->belongsTo(User::class,'forward_from_id');
    }

    public function ToUser() {
        return $this->belongsTo(User::class,'forward_to_id');
    }

    public function getForwardFileAttribute(){
        if (empty($this->attributes['forward_file'])) {
            return null; // or return a default file path if needed
        }
        return asset('storage/'.$this->attributes['forward_file']);
    }
}
