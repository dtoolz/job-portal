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
        Schema::create('other_page_items', function (Blueprint $table) {
            $table->id();
            $table->text('login_page_heading');
            $table->text('login_page_title')->nullable();
            $table->text('login_page_meta_description')->nullable();
            $table->text('signup_page_heading');
            $table->text('signup_page_title')->nullable();
            $table->text('signup_page_meta_description')->nullable();
            $table->text('forget_password_page_heading');
            $table->text('forget_password_page_title')->nullable();
            $table->text('forget_password_page_meta_description')->nullable();
            $table->text('job_listing_page_heading');
            $table->text('job_listing_page_title')->nullable();
            $table->text('job_listing_page_meta_description')->nullable();
            $table->text('company_listing_page_heading');
            $table->text('company_listing_page_title')->nullable();
            $table->text('company_listing_page_meta_description')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('other_page_items');
    }
};
