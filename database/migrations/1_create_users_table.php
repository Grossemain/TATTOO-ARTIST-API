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
        Schema::create('users', function (Blueprint $table) {
            $table->increments('user_id');
            $table->unsignedBigInteger('role_id')->default(1); 
            $table->foreign('role_id')->references('id')->on('roles')->onDelete('cascade');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('pseudo_user', 50);
            $table->string('email_contact', 50)->nullable();
            $table->string('tel', 15)->nullable();
            $table->text('description')->nullable();
            $table->string('slug', 50)->nullable();
            $table->string('style', 255)->nullable();
            $table->string('instagram', 50)->nullable();
            $table->string('img_profil', 255)->nullable();
            $table->string('status_profil', 50)->nullable();
            $table->string('city', 50)->nullable();
            $table->string('departement', 50)->nullable();
            $table->text('coordonnes')->nullable();
            $table->string('tattooshop', 50)->nullable();
            $table->string('title', 50)->nullable();
            $table->string('meta_description', 50)->nullable();
            $table->string('tattooshop_id', 50)->nullable();
            $table->rememberToken();
            $table->foreign('tattooshop_id')->references('tattooshop_id')->on('tattooshops')->onDelete('cascade');
            $table->timestamps();
        });

        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email')->primary();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });

        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->foreignId('user_id')->nullable()->index();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('sessions');
    }
};
