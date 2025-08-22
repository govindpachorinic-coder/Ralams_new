<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */

    public function up(): void {
        Schema::create('districts', function (Blueprint $table) {
            $table->id();
            $table->string('district_code')->comment('Unique district code');
            $table->string('center_code')->comment('Center code');
            $table->string('state_code')->comment('State code');
            // $table->string('district_id_1')->comment('Alternate District ID');
            $table->string('district_name_eng')->comment('District name in English');
            $table->string('district_name_reg')->comment('District name regional(local language)');            
            $table->string('div_code')->comment('Division Code');
            // Officer IDs
            // $table->string('officer_id_01')->nullable();
            // $table->string('officer_id_02')->nullable();
            // $table->string('officer_id_03')->nullable();
            // $table->string('officer_id_05')->nullable();
            // $table->string('officer_id_06')->nullable();
            // $table->string('officer_id_07')->nullable();
            // $table->string('officer_id_09')->nullable();
            // $table->string('officer_id_11')->nullable();
            // $table->string('officer_id_12')->nullable();
            // $table->string('officer_id_13')->nullable();
            // $table->string('officer_id_14')->nullable();
            // $table->string('officer_id_15')->nullable();

            // $table->string('office_alloted')->nullable()->comment('Office allotted to the district');
            // $table->string('division_id')->comment('Division ID for mapping');
            $table->string('district_lgd_code')->nullable()->comment('LGD code of the district');
            $table->string('district_location')->nullable()->comment('District location information');
            $table->tinyInteger('is_active')->default(1)->comment('Active Status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void {
        Schema::dropIfExists('districts');
    }
};
