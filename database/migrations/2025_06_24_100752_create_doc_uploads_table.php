<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void {
        Schema::create('doc_uploads', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('application_id')->comment('Application ID');
            $table->unsignedBigInteger('ralams_id')->comment('Ralams ID');
            $table->string('document_id')->comment('Document ID');
            $table->string('document_file')->comment('Document file path');
            $table->tinyInteger('is_active')->default(1)->comment('Active Status');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void {
        Schema::dropIfExists('doc_uploads');
    }
};
