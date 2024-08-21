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
            $table->string('tattooshop_id', 50)->primary();
            $table->string('name', 50);
            $table->string('adresse', 50);
            $table->string('city', 50);
            $table->string('departement', 50);
            $table->string('title', 50);
            $table->text('meta_description');
            $table->string('img_tattooshop', 50);
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
