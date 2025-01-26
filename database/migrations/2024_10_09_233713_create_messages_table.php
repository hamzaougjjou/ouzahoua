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
        Schema::create('messages', function (Blueprint $table) {
            $table->id();

            $table->longText(column: "message");

            $table->unsignedBigInteger(column: 'user_id');
            $table->foreign('user_id')->references('id')->on('users');
            
            $table->unsignedBigInteger(column: 'conversation_id');
            $table->foreign('conversation_id')->references('id')->on('conversations');

            $table->unsignedBigInteger(column: 'admin_id')->nullable();
            $table->foreign('admin_id')->references('id')->on('users');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('messages');
    }
};
