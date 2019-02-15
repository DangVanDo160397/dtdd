<?php

use Faker\Generator as Faker;

$factory->define(App\Customer::class, function (Faker $faker) {
		static $password;
    return [
        'name' => $faker->sentence(1),
        'password' => $password ?: $password = bcrypt('123456'),
        'gender' => $faker->randomElement($array = array ('0','1')),
        'address' => $faker->streetAddress(),
        'phone' => $faker->numberBetween($min = 1000000, $max = 2000000),
        'email' => $faker->freeEmail(),
        'birthday' => $faker->date(),
        'thumbnail' => $faker->imageUrl($width = 400,$height = 480),
    ];
});
