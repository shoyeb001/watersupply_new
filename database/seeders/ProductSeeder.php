<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('product')->insert([
            'product_title'=>'Packaged Mineral Water Jar(1x2)',
            'product_category'=>2,
            'product_price'=>120,
            'product_rating'=>5,
            'product_image'=>'product1.jpg',
        ]);
    }
}
