<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert(
            [
            'name' => 'Vũ Mạnh Cườngg',
            'email' => 'admin@123',
            'password' => bcrypt(123456),
            'permission' => 'admin'
            ]
        );
        DB::table('users')->insert(
            [
            'name' => 'Vũ Mạnh Cường',
            'email' => 'user@123',
            'password' => bcrypt(123456),
            'permission' => 'user'
            ]
        );
    }
}
