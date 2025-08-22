<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('organization_details', function (Blueprint $table) {
            $table->id()->comment('Primary Key: Unique ID of organization details record');

            // Foreign Key
            $table->foreignId('application_id')->constrained()->onDelete('cascade')->comment('Foreign Key: Linked with applications table');

            // Organisation Registration Info
            $table->boolean('organisation_registered_flag')->nullable()->comment('Whether organization is registered (1=Yes, 0=No)');
            $table->string('organisation_registration_certificate_number', 20)->nullable()->comment('Registration certificate number of organization');
            $table->string('organisation_registration_certificate_document_id', 20)->nullable()->comment('Document ID of registration certificate');
            $table->text('organisation_details')->nullable()->comment('Brief details about the organization');
            $table->text('organisation_project_report_description')->nullable()->comment('Project report description by the organization');
            $table->text('organisation_project_report_document_id')->nullable()->comment('Document ID of project report');

            // Experience Details
            $table->boolean('organisation_experience_flag')->nullable()->comment('Whether organization has prior experience (1=Yes, 0=No)');
            $table->text('organisation_experience_details')->nullable()->comment('Details of organization experience');
            $table->text('organisation_experience_details_document_id')->nullable()->comment('Document ID of experience proof');

            // NOC and Financial Docs
            $table->text('organisation_noc_details')->nullable()->comment('NOC details of organization');
            $table->text('organisation_noc_details_document_id')->nullable()->comment('Document ID of NOC');
            $table->text('organisation_last_three_years_profit_loss_statement_document_id')->nullable()->comment('Document ID for last 3 years financial statements');

            // Excess land justification
            $table->boolean('application_excess_land_justification_flag')->nullable()->comment('Whether excess land justification is provided (1=Yes, 0=No)');
            $table->text('application_excess_land_justification_details')->nullable()->comment('Details of excess land justification');
            $table->text('application_excess_land_justification_document_id')->nullable()->comment('Document ID for excess land justification');

            // Previous land allocation
            $table->boolean('previous_land_allocated_flag')->nullable()->comment('Whether any previous land allocated (1=Yes, 0=No)');
            $table->text('previous_land_allocation_reference_number')->nullable()->comment('Reference number of previous land allocation');
            $table->text('previous_land_allocation_details')->nullable()->comment('Details of previous land allocation');
            $table->text('previous_land_allocation_document_id')->nullable()->comment('Document ID of previous land allocation');

            // Litigation Details
            $table->boolean('whether_litigation_pending_flag')->nullable()->comment('Whether litigation is pending (1=Yes, 0=No)');
            $table->text('litigation_pending_details')->nullable()->comment('Details of pending litigation');
            $table->text('litigation_pending_details_document_id')->nullable()->comment('Document ID of litigation details');
            $table->text('litigation_order_document_id')->nullable()->comment('Document ID of litigation order');

            // Fee & Challan Info
            $table->decimal('development_fees', 15, 2)->nullable()->comment('Development fees amount');
            $table->decimal('premium_rate', 15, 2)->nullable()->comment('Premium rate of land');
            $table->string('challan_number')->nullable()->comment('Challan number for payment');
            $table->date('challan_date')->nullable()->comment('Challan payment date');
            $table->text('challan_document_id')->nullable()->comment('Document ID of challan receipt');

            $table->text('other_details')->nullable()->comment('Any other additional details');

            // Land Rate & Concession
            $table->decimal('proposed_land_rate', 15, 2)->nullable()->comment('Proposed land rate per sq meter');
            $table->text('requested_concession_details')->nullable()->comment('Details of concession requested on land rate');
            $table->decimal('total_price_of_land', 15, 2)->nullable()->comment('Total price of requested land');
            $table->decimal('land_dlc_rate', 15, 2)->nullable()->comment('DLC rate of land as per government rate');
            $table->text('land_dlc_rate_document_id')->nullable()->comment('Document ID for DLC rate proof');

            // Land Use & Construction Info
            $table->string('land_use_type_code')->nullable()->comment('Code of proposed land use type');
            $table->boolean('whether_land_use_type_needed_changed_flag')->nullable()->comment('Whether land use change is required (1=Yes, 0=No)');
            $table->boolean('whether_construction_exists_on_land_flag')->nullable()->comment('Whether construction exists on land (1=Yes, 0=No)');
            $table->boolean('whether_encrohment_exists_on_land_flag')->nullable()->comment('Whether encroachment exists on land (1=Yes, 0=No)');
            $table->text('encrohment_details')->nullable()->comment('Details about encroachment on land');
            $table->text('encrohment_document_id')->nullable()->comment('Document ID for encroachment details');

            // Pasture Land Info
            $table->boolean('whether_pasture_land_flag')->nullable()->comment('Whether land is pasture land (1=Yes, 0=No)');
            $table->string('pasture_village_panchayat_code')->nullable()->comment('Village Panchayat LGD code for pasture land');
            $table->string('village_panchayat_resolution_number')->nullable()->comment('Resolution number from village panchayat');
            $table->date('village_panchayat_resolution_date')->nullable()->comment('Resolution date from village panchayat');
            $table->text('village_panchayat_resolution_document_id')->nullable()->comment('Document ID for village panchayat resolution');

            // Urban & NOC Info
            $table->boolean('whether_urban_or_periphery_flag')->nullable()->comment('Whether land falls under urban/periphery area (1=Yes, 0=No)');
            $table->string('urban_body_lgd_code')->nullable()->comment('LGD code of urban body');
            $table->boolean('whether_noc_given_flag')->nullable()->comment('Whether urban body has given NOC (1=Yes, 0=No)');
            $table->string('urban_noc_certificate_number')->nullable()->comment('NOC certificate number');
            $table->date('urban_noc_certificate_date')->nullable()->comment('NOC certificate date');
            $table->text('urban_noc_certificate_document_id')->nullable()->comment('Document ID for urban NOC');
            $table->text('concerned_urban_body_remarks')->nullable()->comment('Remarks from concerned urban body');
            $table->text('concerned_urban_body_remarks_document_id')->nullable()->comment('Document ID for urban body remarks');

            // Master Plan Info
            $table->boolean('whether_master_plan_available_flag')->nullable()->comment('Whether master plan is available (1=Yes, 0=No)');
            $table->boolean('whether_according_to_master_plan_flag')->nullable()->comment('Whether land use is according to master plan (1=Yes, 0=No)');
            $table->text('master_plan_document_id')->nullable()->comment('Document ID for master plan document');

            // Restricted & Department NOC
            $table->boolean('whether_requested_land_is_restricated_flag')->nullable()->comment('Whether requested land is restricted (1=Yes, 0=No)');
            $table->boolean('whether_department_has_given_noc_flag')->nullable()->comment('Whether concerned department has given NOC (1=Yes, 0=No)');
            $table->text('department_has_given_noc_document_id')->nullable()->comment('Document ID for department NOC');

            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('organization_details');
    }
};

