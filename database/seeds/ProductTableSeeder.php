<?php

use Illuminate\Database\Seeder;
use App\Products;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert(
            [
            'name' => 'Apple iPhone X - 64GB',
            'thumbnail' => 'product/AxY5MslzbCwCQRmox3Lm7Mnf0OPByDaLo71xs3U9.jpeg',
            'price' => '12750000',
            'screen_size' => '5,5 inch',
            'operating_system' => 'iOS',
            'cpu' => 'Apple A10 Fusion',
            'ram' => '3 GB',
            'camera' => '2 Camera 12MP',
            'memories' => '32 GB',
            'pin' => '2900 mAh',
            'status' => 1,
            'cat_id' => 1,
            ]
        );

         factory(Products::class,50)->create();
    }
}
