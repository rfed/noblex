<?php

use Faker\Generator as Faker;
use Noblex\Category;

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

$factory->define(Noblex\Category::class, function (Faker $faker) {
    return [
        'name' => 'Raíz',
        'url' => '',
        'visible' => 0,
        'root_id' => 0
    ];
});
