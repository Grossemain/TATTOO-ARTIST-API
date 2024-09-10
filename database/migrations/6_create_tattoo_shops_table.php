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
        Schema::create('tattoo_shops', function (Blueprint $table) {
            $table->increments('tattooshop_id');
            $table->string('name', 50);
            $table->text('adresse', 50)->nullable();
            $table->string('city', 50)->nullable();
            $table->string('departement', 50)->nullable();
            $table->string('title', 50)->nullable();
            $table->text('meta_description')->nullable();
            $table->string('img_tattooshop', 255);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tattoo_shops');
    }
};
