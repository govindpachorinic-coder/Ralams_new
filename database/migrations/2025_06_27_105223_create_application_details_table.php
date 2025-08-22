<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('application_details', function (Blueprint $table) {
            $table->id();

            // Foreign keys
            $table->foreignId('purpose_id')->constrained()->onDelete('cascade')->comment('Foreign Key: Linked with purposes table');
            $table->foreignId('application_id')->constrained()->onDelete('cascade')->comment('Foreign Key: Linked with applications table');
            $table->foreignId('office_id')->constrained()->onDelete('cascade')->comment('Foreign Key: Linked with offices table');
            $table->foreignId('department_id')->constrained()->onDelete('cascade')->comment('Foreign Key: Linked with department table');
            $table->foreignId('application_rule_id')->nullable()->constrained()->nullOnDelete()->comment('Foreign Key: Linked with application_rules table, nullable');
            $table->foreignId('organization_id')->nullable()->constrained()->nullOnDelete()->comment('Foreign Key: Linked with organization_details table, nullable');

            // Applicant info
            $table->string('applicant_name', 50)->comment('Applicant full name');
            $table->string('applicant_father_name', 50)->comment("Applicant's father's name");
            $table->string('applicant_mobile_number', 10)->comment("Applicant's mobile number (10 digits)");
            $table->string('applicant_address_1', 255)->comment("Applicant's primary address line");
            $table->string('applicant_address_2', 255)->nullable()->comment("Applicant's secondary address line (optional)");
            $table->string('applicant_address_3', 255)->nullable()->comment("Applicant's third address line (optional)");
            $table->string('applicant_district')->comment("Applicant's district");
            $table->string('applicant_tehsil')->comment("Applicant's tehsil");

            $table->timestamps();
        });

    }

    public function down(): void {
        Schema::dropIfExists('application_details');
    }
};

