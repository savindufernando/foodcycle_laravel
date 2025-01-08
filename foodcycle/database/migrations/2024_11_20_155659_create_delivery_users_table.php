<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDeliveryUsersTable extends Migration
{
    public function up()
    {
        Schema::create('delivery_users', function (Blueprint $table) {
            $table->id();
            $table->string('full_name');
            $table->date('dob');
            $table->string('gender');
            $table->string('contact_number');
            $table->string('profile_photo')->nullable();
            $table->string('vehicle_type');
            $table->string('vehicle_model');
            $table->string('vehicle_reg_number')->unique();
            $table->string('vehicle_color');
            $table->string('vehicle_photo')->nullable();
            $table->string('id_number')->unique();
            $table->string('license_number')->unique();
            $table->date('license_expiry');
            $table->string('photo_id')->nullable();
            $table->string('driving_license')->nullable();
            $table->string('bank_account_name');
            $table->string('bank_account_number');
            $table->string('bank_name');
            $table->string('branch_name');
            $table->string('emergency_contact_name');
            $table->string('emergency_contact_number');
            $table->string('location'); 
            $table->string('email')->unique();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('delivery_users');
    }
}