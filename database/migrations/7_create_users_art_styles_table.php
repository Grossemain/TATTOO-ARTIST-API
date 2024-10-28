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
        Schema::create('users_art_styles', function (Blueprint $table) {
            $table->unsignedInteger('user_id');
            $table->unsignedInteger('artstyle_id');
            $table->primary(['user_id', 'artstyle_id']);
            $table->foreign('user_id')->references('user_id')->on('users')->onDelete('cascade');
            $table->foreign('artstyle_id')->references('artstyle_id')->on('art_styles')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users_art_styles');
    }
};
