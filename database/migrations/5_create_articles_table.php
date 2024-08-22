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
            $table->increments('article_id');
            $table->string('title', 100);
            $table->string('h1_title', 100);
            $table->text('content');
            $table->string('img', 50);
            $table->string('slug', 50);
            $table->string('tattooshop_id', 50);
            $table->foreign('tattooshop_id')->references('tattooshop_id')->on('tattooshops')->onDelete('cascade');
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
