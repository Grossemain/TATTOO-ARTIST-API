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
        Schema::create('pictures_art_styles', function (Blueprint $table) {
            $table->unsignedInteger('picture_id');
            $table->unsignedInteger('style_id');
            $table->primary(['picture_id', 'style_id']);
            $table->foreign('picture_id')->references('picture_id')->on('pictures')->onDelete('cascade');
            $table->foreign('style_id')->references('style_id')->on('artstyles')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pictures_art_styles');
    }
};
