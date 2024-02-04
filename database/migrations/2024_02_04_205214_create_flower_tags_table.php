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
        Schema::create('flower_tags', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('flower_id');
            $table->unsignedBigInteger('tag_id');
            $table->index('flower_id', 'flower_tag_flower_idx');
            $table->index('tag_id', 'flower_tag_tag_idx');
            $table->foreign('flower_id')->on('flowers')->references('id');
            $table->foreign('tag_id')->on('tags')->references('id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('flower_tags');
    }
};
