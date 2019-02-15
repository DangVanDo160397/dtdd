<?php

use Illuminate\Database\Seeder;

class OrderTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('orders')->insert([
        	'order_code' => str_random(6),
            'order_detail' => str_random(60),
        	'order_date' => date("Y/m/d"),
        	'customer_id' => 1,
        	'product_id' => 1,
        	'count' => 1,
        	'total' => 1000,
        	'status' => 1,
        ]);
    }
}
