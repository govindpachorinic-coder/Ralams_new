<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Organization extends Model
 {
    use HasFactory, SoftDeletes;

    protected $table = 'organizations';

    protected $fillable = [
        'application_id',
        'application_number',
        'user_id',
        'user_type',
        'sso_id',
        'land_alloted_details',
        'project_report',
        'society_benefits',
        'land_used',
        'experience',
        'experience_detail',
        'registered',
        'reg_number',
        'reg_date',
        'org_reg_certificate',
        /// File filed
        'org_statement',
        'project_report_file',
        'ins_allot_purpose',
        'society_benefits_file',
        'prev_allot_land_file',
        'org_reg_certificate_file',
        'deleted_at',

    ];

    protected $appends = [ 'org_statement_file_link', 'project_report_file_link','ins_allot_purpose_file_link','society_benefits_file_link','prev_allot_land_file_link','org_reg_certificate_file_link' ];

    public function getOrgStatementFileLinkAttribute() {
        if ( $this->attributes[ 'org_statement' ] != null || $this->attributes[ 'org_statement' ] != '' ) {
            return asset( 'storage/'.$this->attributes[ 'org_statement' ] );
        } else {
            return null;
        }
    }

    public function getProjectReportFileLinkAttribute() {
        if ( $this->attributes[ 'project_report_file' ] != null || $this->attributes[ 'project_report_file' ] != '' ) {
            return asset( 'storage/'.$this->attributes[ 'project_report_file' ] );
        } else {
            return null;
        }
    }

    public function getInsAllotPurposeFileLinkAttribute() {
        if ( $this->attributes['ins_allot_purpose'] != null || $this->attributes['ins_allot_purpose'] != '' ) {
            return asset( 'storage/'.$this->attributes[ 'ins_allot_purpose' ] );
        } else {
            return null;
        }
    }

    public function getSocietyBenefitsFileLinkAttribute() {
        if ( $this->attributes['society_benefits_file'] != null || $this->attributes['society_benefits_file'] != '' ) {
            return asset( 'storage/'.$this->attributes[ 'society_benefits_file' ] );
        } else {
            return null;
        }
    }

    public function getPrevAllotLandFileLinkAttribute() {
        if ( $this->attributes['prev_allot_land_file'] != null || $this->attributes['prev_allot_land_file'] != '' ) {
            return asset( 'storage/'.$this->attributes[ 'prev_allot_land_file' ] );
        } else {
            return null;
        }
    }

    public function getOrgRegCertificateFileLinkAttribute() {
        if ( $this->attributes['org_reg_certificate_file'] != null || $this->attributes['org_reg_certificate_file'] != '' ) {
            return asset( 'storage/'.$this->attributes[ 'org_reg_certificate_file' ] );
        } else {
            return null;
        }
    }
    

}
