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

$factory->define(App\DaxCategor::class, function (Faker $faker) {
    return [
        'name' => $faker->unique()->randomElement($array = array ('Зарплата','Премия','Бизнес-2','Доход от бизнеса','Иные даходы', 'Дивиденды', 'Аванс', 'Заработная плата' , 'Грант','Cтипендия', 'Пенсия')),
       
    ];
});


