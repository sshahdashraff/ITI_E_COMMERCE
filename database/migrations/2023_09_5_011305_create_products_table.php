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
            $table->string('name')->nullable();
            $table->decimal('price', 8, 2)->default(0);
            $table->string('availability')->default('available');
            $table->string('product_picture')->default('1.jpeg');
            $table->unsignedBigInteger('category_id')->default(1);
            $table->unsignedBigInteger('admin_id')->nullable();
            $table->foreign('category_id')->references('id')->on('categories');
            $table->foreign('admin_id')->references('id')->on('admin');
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