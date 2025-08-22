<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class DocUpload extends Model {
    use HasFactory,SoftDeletes;

    protected $table = "application_documents";
    protected $fillable = [
        'application_id',
        'application_number',
        'ralams_id',
        'document_id',
        'document_file',
        'is_active',
        'uploaded_by',
        'user_type',
        'sso_id',
        'deleted_at',
    ];

    // ================= Relations =================

    public function user() {
        return $this->belongsTo(User::class, 'ralams_id', 'ralams_id');
    }

    public function getDocumentFileAttribute(){
        if($this->attributes['document_file'] != null || $this->attributes['document_file'] != ''){
            return asset('storage/'.$this->attributes['document_file']);
        }else{
            return null;
        }
    }

    public function uploadedBy(){
        return $this->belongsTo(User::class,'uploaded_by');
    }

     public function document() {
        return $this->belongsTo(MasterAttachment::class, 'document_id', 'id');
    }

    /**
     * (Application relation — only if Application model exists)
     */
    // public function application() {
    //     return $this->belongsTo(Application::class, 'application_id');
    // }

    /**
     * (If MasterAttachment is created then we will active this)
     */
    // public function masterAttachment() {
    //     return $this->belongsTo(MasterAttachment::class, 'document_id', 'document_id');
    // }
}
