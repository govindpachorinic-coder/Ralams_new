<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void {
        Schema::create('ilrs', function (Blueprint $table) {
            $table->id();
            $table->string('ilr_code')->comment('Unique code for the ILR');            
            $table->string('block_code')->comment('Block Code');
            $table->string('ilr_name_eng')->comment('English Name of the ILR');
            $table->string('ilr_name_reg')->comment('Local Name of the ILR');
            $table->tinyInteger('is_active')->default(1)->comment('Active Status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void {
        Schema::dropIfExists('ilrs');
    }
};
