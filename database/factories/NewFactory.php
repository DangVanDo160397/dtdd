<?php

use Faker\Generator as Faker;


$factory->define(App\News::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence(3),
        'description' => $faker->paragraph(10),
        'content' => $faker->paragraph(40),
        'author' => 'admin',
        'thumbnail' => $faker->imageUrl($width = 400,$height = 480),
    ];
});
