<?php

use Illuminate\Database\Seeder;
use App\Customer;
class CustomerTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('customers')->insert([
        	'name' => 'Vũ Mạnh Cường',
            'password' => bcrypt(123456),
        	'gender' => 1,
        	'address' => 'Hải Phòng',
        	'phone' => '0123456789',
        	'email' => 'cuongvu@gmail.com',
        	'birthday' => '1997-05-02',
        	'thumbnail' => 'https://lorempixel.com/400/480/?20596',
        ]);
        factory(Customer::class,10)->create();
    }
}
