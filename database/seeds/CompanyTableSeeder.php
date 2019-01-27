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
            'name' => 'Samsung',
            ]
        );
        DB::table('company')->insert(
            [
            'name' => 'Oppo',
            ]
        );
        DB::table('company')->insert(
            [
            'name' => 'Iphone',
            ]
        );
    }
}
