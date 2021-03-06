<?php

use Faker\Generator as Faker;

$factory->define(App\Notice::class, function (Faker $faker) {
    return [
        'title' => $faker->unique()->text,
        'description' => $faker->text
    ];
});