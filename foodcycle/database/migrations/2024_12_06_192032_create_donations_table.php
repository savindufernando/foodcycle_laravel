<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDonationsTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('donations', function (Blueprint $table) {
            $table->id();
            $table->string('orgname');
            $table->string('regno');
            $table->string('orgtype');
            $table->date('regdate');
            $table->string('authority');
            $table->string('name');
            $table->string('position');
            $table->string('email')->unique();
            $table->string('phone');
            $table->string('address');
            $table->text('description');
            $table->text('beneficiaries');
            $table->string('region');
            $table->string('url')->nullable();
            $table->string('regcertificate');
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('donations');
    }
}
