<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateStatusEnumAddExpiredToProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('products', function (Blueprint $table) {
            // Change ENUM to include 'expired' as a valid status
            $table->enum('status', ['pending', 'approved', 'rejected', 'expired'])->default('pending')->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('products', function (Blueprint $table) {
            // Revert back to original ENUM values
            $table->enum('status', ['pending', 'approved', 'rejected'])->default('pending')->change();
        });
    }
}
