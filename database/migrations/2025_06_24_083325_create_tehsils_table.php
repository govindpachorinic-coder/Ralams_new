<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void {
        Schema::create('tehsils', function (Blueprint $table) {
            $table->id();
            $table->string('block_code')->comment('Primary Block ID');
            // $table->string('block_id1')->nullable()->comment('Alternate Block ID');
            $table->string('block_name_eng')->comment('Block Name in Local Language');
            $table->string('block_name_reg')->comment('Block Name in English');
            // $table->string('center_code')->comment('Center Code');
            // $table->string('state_code')->comment('State Code');
            // $table->string('district_id1')->comment('Alternate District ID');
            $table->string('subdivision_code')->comment('Sub-Division ID');
            $table->string('district_code')->comment('Primary District Code or ID');            
            $table->string('block_lgd_code')->comment('Primary Block ID');
            $table->tinyInteger('is_active')->default(1)->comment('Active Status');
            // $table->string('tahsil_id')->comment('Tehsil ID');

            // Officer IDs
            // $table->string('officer_id_04')->nullable()->comment('Officer ID 04');
            // $table->string('officer_id_08')->nullable()->comment('Officer ID 08');
            // $table->string('officer_id_09')->nullable()->comment('Officer ID 09');
            // $table->string('officer_id_10')->nullable()->comment('Officer ID 10');

            // $table->string('office_allotted')->nullable()->comment('Office allotted to the block');

            // $table->string('tehsil_schema')->nullable()->comment('Tehsil Schema Name or reference');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void {
        Schema::dropIfExists('tehsils');
    }
};
