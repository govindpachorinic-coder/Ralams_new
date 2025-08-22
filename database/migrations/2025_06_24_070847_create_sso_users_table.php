<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */

    public function up(): void {
       Schema::create('sso_users', function (Blueprint $table) {
            $table->id();
            $table->string('master_key_id')->comment('Unique master key reference for the user');
            $table->string('user_id')->comment('Unique user login ID');
            $table->string('citizen_name')->unique()->comment('Full name of the citizen');
            $table->string('citizen_hf_name')->nullable()->comment('Father\'s/Husband\'s name of the citizen (optional)');
            $table->text('citizen_address')->comment('Complete address of the citizen');
            $table->string('mobile_number')->comment('Mobile number of the citizen');
            $table->string('password_encryption')->comment('Encrypted password or encryption key');
            $table->string('password')->comment('Hashed password for authentication');
            $table->string('aadhaar_no')->comment('Aadhaar number of the citizen');
            $table->string('pincode')->comment('Area pincode');
            $table->string('state')->comment('State name of the citizen');
            $table->string('district')->comment('District name of the citizen');
            $table->dateTime('entry_date')->comment('Date and time of record creation');
            $table->dateTime('first_login')->nullable()->comment('Date and time of user\'s first login (optional)');
            $table->string('ip_address')->comment('User\'s IP address at the time of entry');
            $table->string('mac_address')->comment('User device MAC address');
            $table->dateTime('updated_date')->nullable()->comment('Last updated date and time of record (optional)');
            $table->rememberToken();
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
