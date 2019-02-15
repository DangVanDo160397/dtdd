<?php

use Illuminate\Database\Seeder;

class CompanyTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('company')->insert(
            [
            'name' => 'iPhone',
            'slug' => 'iphone',
            ]
        );
        DB::table('company')->insert(
            [
            'name' => 'Samsung',
            'slug' => 'samsung',
            ]
        );
        DB::table('company')->insert(
            [
            'name' => 'Xiaomi',
            'slug' => 'xiaomi',
            ]
        );
        DB::table('company')->insert(
            [
            'name' => 'Oppo',
            'slug' => 'oppo',
            ]
        );
        DB::table('company')->insert(
            [
            'name' => 'Nokia',
            'slug' => 'nokia',
            ]
        );
    }
}
