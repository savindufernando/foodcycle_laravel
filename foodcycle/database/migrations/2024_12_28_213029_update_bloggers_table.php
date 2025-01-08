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
    Schema::table('bloggers', function (Blueprint $table) {
        if (!Schema::hasColumn('bloggers', 'description')) {
            $table->text('description')->nullable();
        }

        if (!Schema::hasColumn('bloggers', 'address')) {
            $table->string('address')->nullable();
        }

        if (!Schema::hasColumn('bloggers', 'job_title')) {
            $table->string('job_title')->nullable();
        }

        if (!Schema::hasColumn('bloggers', 'location')) {
            $table->string('location')->nullable();
        }

        if (!Schema::hasColumn('bloggers', 'profile_pic')) {
            $table->string('profile_pic')->nullable();
        }
    });
}



    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('bloggers', function (Blueprint $table) {
            //
        });
    }
};
