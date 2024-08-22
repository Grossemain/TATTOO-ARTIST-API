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
        Schema::create('flash_tattoos', function (Blueprint $table) {
            $table->increments('flashtattoo_id');
            $table->string('title', 100);
            $table->string('h1_title', 100);
            $table->text('content');
            $table->string('img_flashtattoo', 50);
            $table->boolean('disponibility');
            $table->unsignedInteger('user_id')->nullable();
            $table->foreign('user_id')->references('user_id')->on('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('flash_tattoos');
    }
};
