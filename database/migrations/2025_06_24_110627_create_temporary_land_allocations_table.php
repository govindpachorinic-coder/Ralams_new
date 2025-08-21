<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void {
        Schema::create('temporary_land_allocations', function (Blueprint $table) {
            $table->id();
            $table->string('ralams_id', 10)->nullable()->comment('Ralams System ID');
            $table->text('allotment_purpose')->nullable()->comment('Purpose of Land Allotment');
            $table->string('land_owner_type', 3)->nullable()->comment('Type of Land Owner');

            $table->string('khatedar_name', 50)->nullable()->comment('Land Owner Name');
            $table->string('khatedar_fname', 50)->nullable()->comment('Land Owner Father\'s Name');
            $table->string('khatedar_district_code', 10)->nullable()->comment('Khatedar District Code');
            $table->string('khatedar_block_code', 10)->nullable()->comment('Khatedar Block Code');
            $table->string('khatedar_address', 250)->nullable()->comment('Khatedar Address');
            $table->string('khatedar_mobile', 10)->nullable()->comment('Khatedar Mobile Number');

            $table->string('district_code', 10)->nullable()->comment('District Code');
            $table->string('tehsil_code', 10)->nullable()->comment('Tehsil Code');
            $table->string('ilr_code', 10)->nullable()->comment('ILR Code');
            $table->string('patwar_mandal', 10)->nullable()->comment('Patwar Mandal Code');
            $table->string('village_code', 10)->nullable()->comment('Village Code');
            
            $table->float('khasra_number')->nullable()->comment('Khasra Number');
            $table->string('land_type', 3)->nullable()->comment('Type of Land');
            $table->float('khasra_area')->nullable()->comment('Area as per Khasra');
            $table->float('proposed_area')->nullable()->comment('Proposed Area for Allotment');

            $table->binary('map_doc_file')->nullable()->comment('Map Document File');
            $table->text('irrigation_details')->nullable()->comment('Irrigation Details');
            $table->text('surrender_land_details')->nullable()->comment('Surrendered Land Details');

            $table->string('registration_certificate_number', 20)->nullable()->comment('Registration Certificate Number');
            $table->binary('registration_certificate_file')->nullable()->comment('Registration Certificate File');
            $table->text('registration_details')->nullable()->comment('Registration Details');

            $table->binary('finance_3y_file')->nullable()->comment('Finance Last 3 Years File');
            $table->binary('project_rpt_file')->nullable()->comment('Project Report File');
            $table->text('project_rpt_details')->nullable()->comment('Project Report Details');

            $table->char('institutional_experience', 2)->nullable()->comment('Institutional Experience Flag');
            $table->text('institutional_experience_details')->nullable()->comment('Institutional Experience Details');

            $table->binary('deptartment_concern_file')->nullable()->comment('Department Concern File');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void {
        Schema::dropIfExists('temporary_land_allocations');
    }
};
