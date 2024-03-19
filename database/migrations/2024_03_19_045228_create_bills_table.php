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
        Schema::create('bills', function (Blueprint $table) {
            $table->id();
            $table->integer('total_price');
            $table->enum('status', ['paid','cancelled','pending','shipped','refunded'])->default('pending');
            $table->unsignedBigInteger('table_id')->unsigned();
            $table->foreign('table_id')->references('id')->on('tables');
            $table->unsignedBigInteger('customer_id')->unsigned();
            $table->foreign('customer_id')->references('id')->on('customers');
            $table->unsignedBigInteger('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('customers');
            $table->unsignedBigInteger('discount_id')->unsigned();
            $table->foreign('discount_id')->references('id')->on('discounts');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bills');
    }
};
