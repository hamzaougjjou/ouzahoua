<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReviewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reviews', function (Blueprint $table) {
            $table->id();  // Primary key

            // Foreign keys
            $table->string("name");
            $table->string("email");
            $table->unsignedBigInteger('user_id')->nullable();       // ID of the user who submitted the review
            $table->unsignedBigInteger('product_id');    // ID of the product being reviewed

            // Review details
            $table->tinyInteger('rating')->unsigned();   // Rating (e.g., 1-5 stars)
            $table->text('comment')->nullable();         // Optional text comment

            // Optional: Timestamps
            
            // Foreign key constraints
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
            
            // Soft deletes (if products can be temporarily deleted)
            $table->softDeletes();                       // Soft delete column
            
            $table->timestamps();                        // Created at and updated at
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reviews');
    }
}
