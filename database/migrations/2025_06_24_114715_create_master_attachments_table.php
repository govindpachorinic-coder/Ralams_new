<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void {
        Schema::create('master_attachments', function (Blueprint $table) {
            $table->id();
            $table->string('document_id', 50)->nullable()->comment('Document ID');
            $table->string('document_title', 255)->nullable()->comment('Document Title');
            $table->text('document_details')->nullable()->comment('Document Details');
            $table->char('applicant_display', 1)->nullable()->comment('Show to Applicant (Yes/No)');
            $table->char('dm_display', 1)->nullable()->comment('Show to DM (Yes/No)');
            $table->char('sdm_display', 1)->nullable()->comment('Show to SDM (Yes/No)');
            $table->char('patwari_display', 1)->nullable()->comment('Show to Patwari (Yes/No)');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void {
        Schema::dropIfExists('master_attachments');
    }
};
