<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Sanstha extends Model
{
    use HasFactory;

    protected $table = 'organization_details';

    protected $fillable = [
        'application_id',
        'organisation_registered_flag',
        'organisation_registration_certificate_number',
        'organisation_registration_certificate_document_id',
        'organisation_details',
        'organisation_project_report_description',
        'organisation_project_report_document_id',
        'organisation_experience_flag',
        'organisation_experience_details',
        'organisation_experience_details_document_id',
        'organisation_noc_details',
        'organisation_noc_details_document_id',
        'organisation_last_three_years_profit_loss_statement_document_id',
        'application_excess_land_justification_flag',
        'application_excess_land_justification_details',
        'application_excess_land_justification_document_id',
        'previous_land_allocated_flag',
        'previous_land_allocation_reference_number',
        'previous_land_allocation_details',
        'previous_land_allocation_document_id',
        'whether_litigation_pending_flag',
        'litigation_pending_details',
        'litigation_pending_details_document_id',
        'litigation_order_document_id',
        'development_fees',
        'premium_rate',
        'challan_number',
        'challan_date',
        'challan_document_id',
        'other_details',
        'proposed_land_rate',
        'requested_concession_details',
        'total_price_of_land',
        'land_dlc_rate',
        'land_dlc_rate_document_id',
        'land_use_type_code',
        'whether_land_use_type_needed_changed_flag',
        'whether_construction_exists_on_land_flag',
        'whether_encrohment_exists_on_land_flag',
        'encrohment_details',
        'encrohment_document_id',
        'whether_pasture_land_flag',
        'pasture_village_panchayat_code',
        'village_panchayat_resolution_number',
        'village_panchayat_resolution_date',
        'village_panchayat_resolution_document_id',
        'whether_urban_or_periphery_flag',
        'urban_body_lgd_code',
        'whether_noc_given_flag',
        'urban_noc_certificate_number',
        'urban_noc_certificate_date',
        'urban_noc_certificate_document_id',
        'concerned_urban_body_remarks',
        'concerned_urban_body_remarks_document_id',
        'whether_master_plan_available_flag',
        'whether_according_to_master_plan_flag',
        'master_plan_document_id',
        'whether_requested_land_is_restricated_flag',
        'whether_department_has_given_noc_flag',
        'department_has_given_noc_document_id',
        'created_at',
        'updated_at',
    ];


    // Relationships

    public function applicationRule()
    {
        return $this->belongsTo(ApplicationRule::class, 'application_rule_id');
    }

    public function applications()
    {
        return $this->hasMany(Application::class, 'purpose_id');
    }

    public function applicationDetails()
    {
        return $this->hasMany(ApplicationDetail::class, 'purpose_id');
    }
}
