<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    
    public function up(): void {
        Schema::create('users', function (Blueprint $table) {
            $table->id()->comment('Primary Key');
            $table->string('sso_id', 50)->nullable()->comment('SSO ID');
            $table->string('ralams_id', 10)->unique()->nullable()->comment('Ralams System ID');
            $table->unsignedBigInteger('role_id')->nullable()->comment('Role ID');
            $table->string('first_name', 20)->nullable()->comment('First Name');
            $table->string('last_name', 20)->nullable()->comment('Last Name');
            $table->string('father_name', 50)->nullable()->comment('Father Name');
            $table->enum('gender', ['Male', 'Female', 'Other'])->nullable()->default('Male')->comment('Gender');
            $table->date('date_of_birth')->nullable()->comment('Date of Birth');
            $table->string('mobile', 10)->nullable()->comment('Mobile Number');
            $table->text('mail_personal')->nullable()->comment('Personal Email');
            $table->string('user_type', 10)->nullable()->comment('User Type');
            $table->string('display_name', 50)->nullable()->comment('Display Name');
            $table->text('mail_official')->nullable()->comment('Official Email');
            $table->text('postal_address')->nullable()->comment('Postal Address');
            $table->string('postal_code', 6)->nullable()->comment('Postal Code');
            $table->string('state', 10)->nullable()->comment('State Code');
            $table->string('city', 10)->nullable()->comment('City Code');
            $table->string('block', 10)->nullable()->comment('Block Code');
            $table->binary('jpeg_photo')->nullable()->comment('Profile Photo in bytes');
            $table->string('designation', 20)->nullable()->comment('Designation');
            $table->string('department', 20)->nullable()->comment('Department');
            $table->char('active', 1)->nullable()->comment('Active Status');
            $table->ipAddress('ip_address')->nullable()->comment('IP Address');
            $table->string('mac_address', 20)->nullable()->comment('MAC Address');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void {
        Schema::dropIfExists('users');
    }
};
