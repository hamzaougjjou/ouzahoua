<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();  // Primary key

            // Product Details
            $table->string('name');                      // Product name
            $table->text('description')->nullable();      // Detailed description
            $table->string('slug')->unique();             // URL-friendly version of the product name
            $table->decimal('price', 10, 2);              // Price in monetary format
            $table->decimal('discount_price', 10, 2)->nullable(); // Optional discount price



            $table->unsignedBigInteger('category_id')->nullable();
            $table->foreign(columns: 'category_id')->references('id')
                ->on('categories')
                ->onDelete('set null');
            
            $table->boolean('is_active')->default(true);  // Active or inactive status for the product

            // Product Media
            $table->string('thumbnail')->nullable();      // Thumbnail or cover image URL/path

            
            // SEO and Marketing
            $table->string('meta_title')->nullable();     // SEO meta title
            $table->text('meta_description')->nullable(); // SEO meta description
            $table->string('meta_keywords')->nullable();  // SEO meta keywords

            // Timestamps
            $table->timestamps();                        // Created at & updated at

            // Soft deletes (if products can be temporarily deleted)
            $table->softDeletes();                       // Soft delete column
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
