<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddStatusToBlogsTable extends Migration
{
    public function up()
    {
        Schema::table('blogs', function (Blueprint $table) {
            $table->string('status')->default('pending')->after('content'); // Add 'status' column
            $table->text('rejection_reason')->nullable()->after('status'); // Add 'rejection_reason' column
        });
    }

    public function down()
    {
        Schema::table('blogs', function (Blueprint $table) {
            $table->dropColumn(['status', 'rejection_reason']); // Remove added columns
        });
    }
}
