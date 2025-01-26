<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        DB::table('product_types')->insert([
            ['type' => 'ملف'],
            ['type' => 'دورة'],
            ['type' => 'سيريال لكل مستخدم'],
            ['type' => 'سيريال واحد لكل المستخدمين']
        ]);
    }
}