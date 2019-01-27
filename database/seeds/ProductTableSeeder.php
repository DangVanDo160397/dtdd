<?php

use Illuminate\Database\Seeder;

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
            'name' => 'Vũ Mạnh Cườngg',
            'email' => 'user@1233',
            'password' => bcrypt(123456),
            'permission' => 'admin'
            ]
        );
    }
}
