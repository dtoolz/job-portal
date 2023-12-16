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
        Schema::create('pricing_packages', function (Blueprint $table) {
            $table->id();
            $table->string('package_name',200);
            $table->smallInteger('package_price');
            $table->smallInteger('package_days');
            $table->string('package_display_time',100);
            $table->tinyInteger('total_allowed_jobs');
            $table->tinyInteger('total_allowed_featured_jobs');
            $table->tinyInteger('total_allowed_photos');
            $table->tinyInteger('total_allowed_videos');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pricing_packages');
    }
};
