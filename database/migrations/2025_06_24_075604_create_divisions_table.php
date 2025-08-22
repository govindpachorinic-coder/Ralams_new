<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void {
        Schema::create('divisions', function (Blueprint $table) {
            $table->id();
            $table->string('division_code')->comment('Unique Division Code or ID');
            $table->string('division_name_eng')->comment('Name of the Division English');
            $table->string('division_name_reg')->comment('Name of the Division Regional');
            $table->int('is_active')->default(1)->comment('Active Status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void {
        Schema::dropIfExists('divisions');
    }
};
