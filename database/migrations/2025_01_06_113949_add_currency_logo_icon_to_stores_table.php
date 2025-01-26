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
        Schema::table('stores', function (Blueprint $table) {
            //
            $table->string('logo')->nullable()->after('email'); // Adjust 'existing_column' to your table's structure
            $table->string('icon')->nullable()->after('logo'); 
            $table->string('currency')->nullable()->after('icon');
            $table->string('abr_currency')->nullable()->after('icon'); //dirham => dh 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('stores', function (Blueprint $table) {
            $table->dropColumn(['logo' , 'abr_currency' , 'icon', 'currency']);
        });
    }
};
