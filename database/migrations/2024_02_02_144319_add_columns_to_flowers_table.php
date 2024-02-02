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
        Schema::table('flowers', function (Blueprint $table) {
            $table->unsignedSmallInteger('price')->nullable(false)->default(0);
            $table->dropColumn('image');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('flowers', function (Blueprint $table) {
            $table->dropColumn('price');
            $table->string("image", 100)->nullable();
        });
    }
};
