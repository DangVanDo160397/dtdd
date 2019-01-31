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
            'thumbnail' => 'https://staticshop.o2.co.uk/product/images/iphone-x-space-grey-sku-header.png?cb=25dc5afb0412fc40a28aa29d82cb53d0',
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

         factory(Products::class,10)->create();
    }
}
