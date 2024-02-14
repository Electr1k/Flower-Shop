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
            $table->unsignedBigInteger('basket_id')->nullable(false);
            $table->foreign('basket_id', 'basket_product_fk')->on('baskets')->references('id')->onDelete('cascade');

            $table->unsignedBigInteger('flower_id')->nullable(false);
            $table->foreign('flower_id', 'flower_product_fk')->on('flowers')->references('id')->onDelete('cascade');


            $table->integer('count', false, true);
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
