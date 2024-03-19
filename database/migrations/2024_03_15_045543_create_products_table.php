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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->integer('price');
            $table->string('image')->nullable();
            $table->string('description')->nullable();
            $table->unsignedBigInteger('category_id')->unsigned();
            $table->foreign('category_id')->references('id')->on('categories');
            $table->unsignedBigInteger('product_unit_id')->unsigned();
            $table->foreign('product_unit_id')->references('id')->on('product_units');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
