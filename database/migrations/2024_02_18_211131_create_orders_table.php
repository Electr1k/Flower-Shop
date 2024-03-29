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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->jsonb('products')->nullable(false);;
            $table->string('status')->nullable(false)->default(\App\Enums\OrderStatus::Accepted->name);
            $table->unsignedBigInteger('user_id')->nullable(false);
            $table->foreign('user_id', 'user_fk')->on('users')->references('id')->onDelete('cascade');
            $table->unsignedBigInteger('total_price')->nullable(false)->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
