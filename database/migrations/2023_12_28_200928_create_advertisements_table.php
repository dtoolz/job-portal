<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('advertisements', function (Blueprint $table) {
            $table->id();
            $table->string('job_listing_ad');
            $table->string('job_listing_ad_url')->nullable();
            $table->string('job_listing_ad_status');
            $table->string('company_listing_ad');
            $table->string('company_listing_ad_url')->nullable();
            $table->string('company_listing_ad_status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('advertisements');
    }
};
