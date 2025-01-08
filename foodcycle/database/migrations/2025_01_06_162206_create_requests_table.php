<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('requests', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->unsignedBigInteger('consultant_id')->nullable(); // Make it nullable
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email');
            $table->text('social_media_bio')->nullable();
            $table->string('phone_number');
            $table->string('city');
            $table->string('state');
            $table->string('country');
            $table->string('company_name');
            $table->string('company_website')->nullable();
            $table->text('company_description');
            $table->string('heard_about_us');
            $table->string('services_of_interest');
            $table->string('project_location');
            $table->date('project_start_date');
            $table->text('project_description');
            $table->string('uploaded_file_path')->nullable();
            $table->enum('status', ['pending', 'selected'])->default('pending');
            $table->timestamps();
        
            // Foreign key constraint
            $table->foreign('consultant_id')
                  ->references('id')
                  ->on('consultants')
                  ->onDelete('cascade');
            
            // Set storage engine and charset explicitly
            $table->engine = 'InnoDB';
            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_unicode_ci';
        });        
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('requests');
    }
};
