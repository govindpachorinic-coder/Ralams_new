<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void {
        Schema::create('activity_logs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('application_id')->comment('Application ID');
            $table->unsignedBigInteger('ralams_id')->comment('RALAMS ID');
            $table->string('activity')->comment('Activity type/status');
            $table->text('activity_details')->comment('Detailed activity description');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void {
        Schema::dropIfExists('activity_logs');
    }
};
