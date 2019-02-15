<?php

use Faker\Generator as Faker;

$factory->define(App\Products::class, function (Faker $faker) {
    return [
        'name' => $faker->bothify('SamSung ##??'),
        'thumbnail' => 'product/AxY5MslzbCwCQRmox3Lm7Mnf0OPByDaLo71xs3U9.jpeg',   
        'screen_size' => $faker->randomElement($array = array ('5','5.2','5.5','5.7','6','6.2')),
        'price' => $faker->numberBetween($min = 1000000, $max = 2000000),
        'operating_system' => $faker->numerify('iOS ###'),
        'cpu' => $faker->bothify('Snapdragon ##??'),
        'ram' => $faker->randomDigit(),
        'camera' => $faker->numberBetween($min = 5, $max = 16),
        'memories' => $faker->numberBetween($min = 5, $max = 16),
        'pin' => $faker->numberBetween($min = 1000, $max = 5000),
        'status' => $faker->randomElement($array = array ('0','1')),
        'cat_id' => $faker->randomElement($array = array ('1','2','3','4','5')),
    ];
});
