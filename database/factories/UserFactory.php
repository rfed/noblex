<?php

use Faker\Generator as Faker;
use Noblex\User;

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

$factory->define(Noblex\User::class, function (Faker $faker) {
    return [
        'name' => 'admin',
        'email' => 'fede@lavacoders.com',
        'password' => bcrypt('noblex2030'), 
        'remember_token' => str_random(10),
    ];
});
