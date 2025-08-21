<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void {
        Schema::create('villages', function (Blueprint $table) {
            $table->id();
            $table->string('village_code')->nullable()->comment('Village Code');
            $table->string('village_name_eng')->nullable()->comment('Village Name in English');
            $table->string('village_name_reg')->nullable()->comment('Village Name in Local or Regional Language');
            $table->string('village_lgd_code')->nullable()->comment('Village LGD Code');

            // $table->string('district_id')->nullable()->comment('Primary District ID');
            // $table->string('block_id')->nullable()->comment('Primary Block ID');
            // $table->string('block_id_1')->nullable()->comment('Alternate Block ID');

            // $table->string('village_name')->nullable()->comment('Village Name in Local Language');
            // $table->string('village_name_en')->nullable()->comment('Village Name in English');

            $table->string('patwar_code')->nullable()->comment('Patwar Code');
            
            $table->string('block_code')->nullable()->comment('Block Code');
            $table->tinyinteger('is_active')->default(1)->comment('Active Status');
            // $table->string('village_id')->nullable()->comment('Unique Village ID');
            // $table->string('officer_id')->nullable()->comment('Assigned Officer ID');
            // $table->string('office_alloted')->nullable()->comment('Allotted Office Code or Name');

            // $table->string('ri_id')->nullable()->comment('Revenue Inspector ID');
            // $table->string('vsrno')->nullable()->comment('Village Serial Number');
            // $table->string('office_code')->nullable()->comment('Office Code');

            // $table->string('type')->nullable()->comment('Type of Village or Category');
            // $table->string('oldvsrno')->nullable()->comment('Old Village Serial Number');
            // $table->string('oldvsrno1')->nullable()->comment('Alternate Old Village Serial Number');
            // $table->string('bhuiyanvillageid')->nullable()->comment('Bhuiyan Village System ID');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void {
        Schema::dropIfExists('villages');
    }
};
