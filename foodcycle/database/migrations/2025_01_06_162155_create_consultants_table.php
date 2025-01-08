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
        Schema::create('consultants', function (Blueprint $table) {
            $table->id(); // Unsigned BIGINT primary key
            $table->string('name');
            $table->string('address');
            $table->string('province');
            $table->string('contact_no');
            $table->text('bio')->nullable();
            $table->string('education')->default('');
            $table->string('qualifications')->default('');
            $table->string('email')->unique();
            $table->string('password');
            $table->text('skills')->nullable();
            $table->text('sub_skills')->nullable();
            $table->timestamps();
            
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
        Schema::dropIfExists('consultants');
    }
};
