<?php

use Illuminate\Support\Str;
use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(App\Balans::class, function (Faker $faker) {
    return [
        'nalichnie' => $faker->numberBetween($min = 1000000, $max = 500000),
        'plastik_1' => $faker->numberBetween($min = 1000000, $max = 500000),
        'plastik_2' => $faker->numberBetween($min = 1000000, $max = 500000),
        
    ];
});
