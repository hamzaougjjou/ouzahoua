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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();

            
            $table->text('name');
            $table->text('phone');
            $table->text('city')->nullable();
            $table->longText('address')->nullable();

            $table->decimal('amount', 10,2)->nullable();

            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users');
            
            $table->enum('order_status', [
                'pending', 
                'shipped' ,
                'confirmed' ,
                'completed' ,
                'returned',
                'canceled',
                'failed'
            ])
            ->default('pending');

            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
    
};
