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
        Schema::create('food_reqests', function (Blueprint $table) {
            $table->id();
            $table->string('type');
            $table->string('title');
            $table->text('purpose');
            $table->string('beneficiaries');
            $table->boolean('completed')->default(false);
            $table->string('organization_name'); // Store org name here
            $table->string('Org_location');
            $table->timestamps();
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('food_reqests');
    }
};
