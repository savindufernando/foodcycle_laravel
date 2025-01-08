<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentsTable extends Migration
{
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id'); // Add this line
            $table->string('name');
            $table->string('email');
            $table->string('address');
            $table->string('city');
            $table->string('phone');
            $table->string('postal_code');
            $table->string('payment_method');
            $table->string('payment_status')->default('pending');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade'); // Add this line
        });
    }

    public function down()
    {
        Schema::dropIfExists('payments');
    }
}