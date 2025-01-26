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

            $table->id();

            $table->string('first_name');
            $table->string('last_name');
            $table->string('email')->unique();
            $table->text('profile_image')->nullable();

            $table->string('country')->nullable();
            $table->text('gender')->nullable();
            $table->text('birth_day')->nullable();

            $table->enum('role', ['admin', 'user', 'seller'])->default('user');


            $table->string('phone')->nullable();
            $table->timestamp('phone_verified_at')->nullable();

            $table->timestamp('email_verified_at')->nullable();
            $table->longText('password');
            $table->rememberToken();
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
