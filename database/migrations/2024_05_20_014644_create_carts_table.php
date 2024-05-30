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
        Schema::create('carts', function (Blueprint $table) {
            $table->unsignedInteger('account_id');
            $table->unsignedInteger('product_id');
            $table->integer('quantity')->default(1);
            $table->decimal('price');

            $table->primary(['account_id', 'product_id']);
            $table->foreign('account_id')->references('id')->on('accounts');
            $table->foreign('product_id')->references('id')->on('products');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('carts');
    }
};
