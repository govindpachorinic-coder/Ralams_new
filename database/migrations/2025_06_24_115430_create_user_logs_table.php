<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void {
        Schema::create('user_logs', function (Blueprint $table) {
            $table->id();
            // Foreign IDs
            $table->unsignedBigInteger('application_id')->nullable()->comment('Application ID');
            $table->unsignedBigInteger('ralams_id')->nullable()->comment('Ralams System ID');
            // Network Details
            $table->ipAddress('ipaddress')->nullable()->comment('IP Address');
            $table->string('macaddress', 20)->nullable()->comment('MAC Address');
            // Login / Logout Timestamps
            $table->dateTime('login_time')->nullable()->comment('Login Time');
            $table->dateTime('logout_time')->nullable()->comment('Logout Time');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void {
        Schema::dropIfExists('user_logs');
    }
};
