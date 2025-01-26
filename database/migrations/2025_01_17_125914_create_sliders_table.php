<?php

use App\Enums\SliderLocation;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('sliders', function (Blueprint $table) {
            $table->id();
            $table->string('background')->nullable(); // background URL for large screens
            $table->string('background_sm')->nullable(); // background URL for small screens
            $table->string('title')->nullable(); // Main title of the slider
            $table->string('subtitle')->nullable(); // Subtitle of the slider
            $table->string('button1_text')->nullable(); // Text for the first button (nullable)
            $table->string('button1_link')->nullable(); // Link for the first button (nullable)
            $table->string('button2_text')->nullable(); // Text for the second button (nullable)
            $table->string('button2_link')->nullable(); // Link for the second button (nullable)
            $table->enum('location', SliderLocation::values())->default(SliderLocation::HOME->value);
            $table->timestamps(); // Created at and updated at timestamps
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sliders');
    }
};
