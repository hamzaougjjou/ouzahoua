<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('media', function (Blueprint $table) {
            $table->id();

            $table->string('name'); //file or folder name
            $table->string('file_type')->nullable();
            $table->string('file_path')->nullable();
            $table->string('folder')->nullable(); // Folder where the file will be saved

            //the user(seller) who create this folder // in admincase will be null
            $table->unsignedBigInteger('user_id')->nullable(); 

            $table->foreign('user_id')->references('id')
                ->on('users')
                ->onDelete('set null');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('media');
    }
};
