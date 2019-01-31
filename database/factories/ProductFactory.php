<?php

use Faker\Generator as Faker;

$factory->define(App\Products::class, function (Faker $faker) {
    return [
        'name' => $faker->bothify('SamSung ##??'),
        'thumbnail' => $faker->imageUrl($width = 400,$height = 480,'cats'),   
        'screen_size' => $faker->numberBetween($min = 1000, $max = 2000),
        'price' => $faker->numberBetween($min = 1000000, $max = 2000000),
        'operating_system' => $faker->numerify('iOS ###'),
        'cpu' => $faker->bothify('Snapdragon ##??'),
        'ram' => $faker->randomDigit(),
        'camera' => $faker->numberBetween($min = 5, $max = 16),
        'memories' => $faker->numberBetween($min = 5, $max = 16),
        'pin' => $faker->numberBetween($min = 1000, $max = 5000),
        'status' => $faker->randomElement($array = array ('0','1')),
        'cat_id' => $faker->randomElement($array = array ('1','2','3')),
    ];
});
