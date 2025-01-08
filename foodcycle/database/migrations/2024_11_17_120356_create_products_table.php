<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('category'); // 'human', 'animal', 'fertilizer'
            $table->decimal('price', 10, 2);
            $table->integer('stock');
            $table->text('description')->nullable();
            $table->string('image')->nullable();
            $table->enum('status', ['pending', 'approved', 'rejected'])->default('pending');
            $table->timestamps();
            $table->timestamp('moved_at')->nullable(); // When the category was last updated
        });
    }

    public function down()
    {
        Schema::dropIfExists('products');
    }
}

