<?php

use Illuminate\Database\Seeder;

class AdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admins')->insert(
            [
            'name' => 'Vũ Mạnh Cườngg',
            'email' => 'admin@321',
            'password' => bcrypt(123456),
            'status' => 1,
            'permission' => 'admin'
            ]
        );
        DB::table('admins')->insert(
            [
            'name' => 'Vũ Mạnh Cườngg',
            'email' => 'admin@3213',
            'password' => bcrypt(123456),
            'status' => 1,
            'permission' => 'user'
            ]
        );
    }
}
