<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void {
         Schema::create('land_details', function (Blueprint $table) {
            $table->id();

            // Foreign keys
            $table->foreignId('application_id')->constrained()->onDelete('cascade')->comment('Foreign Key: Linked with applications table');
            $table->foreignId('land_map_document_id')->nullable()->constrained()->nullOnDelete()->comment('Foreign Key: Linked with land_map_documents table, nullable');

            // Land details
            $table->string('village_code')->comment('Code of the village where land is located');
            $table->string('khasra_number')->nullable()->comment('Khasra Number of the land');
            // $table->string('khasra_type')->nullable()->comment('Type of Khasra (if any)');
            $table->string('khasra_land_area')->nullable()->comment('Total area of the land as per Khasra');
            $table->string('proposed_land_area')->nullable()->comment('Proposed area for the project');
            $table->text('irrigation_resource_detail')->nullable()->comment('Details about available irrigation resources');
            $table->text('land_soil_classification')->nullable()->comment('Soil classification details of the land');

            // Distances and flags
            // $table->boolean('whether_nearby_state_highway')->nullable()->comment('Whether land is near a State Highway (1=Yes, 0=No)');
            $table->string('distance_from_state_highway')->nullable()->comment('Distance from nearest State Highway');;
            // $table->boolean('whether_nearby_national_highway')->nullable()->comment('Whether land is near a National Highway (1=Yes, 0=No)');
            $table->string('distance_from_national_highway')->nullable()->comment('Distance from nearest National Highway');
            // $table->boolean('whether_nearby_railway_line')->nullable()->comment('Whether land is near a Railway Line (1=Yes, 0=No)');
            $table->string('distance_from_railway_line')->nullable()->comment('Distance from nearest Railway Line');
            // $table->boolean('whether_under_city_limits')->nullable()->comment('Whether land is within city limits (1=Yes, 0=No)');
            $table->string('distance_from_city_limits')->nullable()->comment('Distance from nearest city limits');
            
            // Surrender info
            $table->boolean('land_surrendered_flag')->nullable()->comment('Whether land has been surrendered (1=Yes, 0=No)');
            $table->text('surrender_land_details')->nullable()->comment('Details about surrendered land, if any');

            // Legal info
            $table->string('land_type')->nullable()->comment('Type of land (government or khatedari)');
            $table->char('khatedari_proceeding', 2)->nullable()->comment('Whether Khatedari proceeding done (Y/N)');
            $table->string('khatedari_proceeding_file')->nullable()->comment('File path of Khatedari proceeding document');
            $table->text('khatedari_proceeding_details')->nullable()->comment('Details of Khatedari proceeding');
            $table->char('under_acquisition_act_1894', 2)->nullable()->comment('Whether land comes under Land Acquisition Act 1894 (Y/N)');

            $table->boolean('is_in_command_area')->nullable()->comment('Whether land lies under command area (1=Yes, 0=No)');

            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('land_details');
    }
};
