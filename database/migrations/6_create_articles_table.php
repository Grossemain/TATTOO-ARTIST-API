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
        Schema::create('articles', function (Blueprint $table) {
            $table->uuid('article_id')->primary();  // Utilisation d'un UUID
            $table->string('title', 100);
            $table->text('content');
            $table->string('img', 250);
            $table->unsignedInteger('tattooshop_id')->nullable();
            $table->foreign('tattooshop_id')->references('tattooshop_id')->on('tattoo_shops')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('articles');
    }
};
