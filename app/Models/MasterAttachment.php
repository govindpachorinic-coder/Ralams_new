<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MasterAttachment extends Model {
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'document_id',
        'document_title',
        'document_details',
        'applicant_display',
        'dm_display',
        'sdm_display',
        'patwari_display',
    ];

    // ================= Relations =================

    /**
     * Get the document uploads associated with this master attachment.
     */
    public function docUploads() {
        return $this->hasMany(DocUpload::class, 'document_id', 'document_id');
    }

    /**
     * Example: If you later have a document category table
     * public function category() {
     *     return $this->belongsTo(DocumentCategory::class, 'category_id');
     * }
     */
}
