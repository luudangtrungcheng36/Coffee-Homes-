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
            $table->increments('id');
            $table->string('name')->unique();
            $table->string('image')->nullable();
            $table->decimal('price');
            $table->decimal('sale_price')->nullable();
            $table->longText('description')->nullable();
            $table->unsignedInteger('category_id');
            $table->tinyInteger('status')->default(0);
            $table->boolean('hot_product')->default(false);
            $table->timestamps();
            $table->foreign('category_id')->references('id')->on('categories');
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
