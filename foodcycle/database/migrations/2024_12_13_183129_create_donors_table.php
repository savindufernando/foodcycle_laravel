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
        Schema::create('donors', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('food_request_id'); // Foreign key
            $table->foreign('food_request_id')->references('id')->on('food_reqests');
            $table->string('location');
            $table->string('donor_name');
            $table->string('donor_email');
            $table->string('phone_number');
            $table->json('items')->nullable(); // JSON data
            $table->string('schedule');
            $table->unsignedBigInteger('accept_id')->nullable();
            $table->boolean('delivery_status')->default(false);
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('donors');
    }
};
