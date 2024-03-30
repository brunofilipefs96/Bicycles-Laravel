<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Bicycle;
use Faker\Generator as Faker;

$factory->define(Bicycle::class, function (Faker $faker) {
    return [
        'person_id' => rand(1,100),
        'brand' => $faker->word,
        'model' => $faker->word,
        'color' => $faker->colorName,
        'price' => rand(50,500),
        'created_at' => now(),
        'updated_at' => now(),
        'deleted_at' => null
    ];
});
