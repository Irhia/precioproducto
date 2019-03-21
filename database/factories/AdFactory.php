<?php

use App\Ad;
use App\Category;
use App\User;
use App\Web;

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

/* Crear nombres para pruebas. */

$factory->define(Ad::class, function (Faker $faker) {
    return [
    	 'category_id' =>Category::all()->random()->id,
          'web_id' =>  Web::all()->random()->id,
          'user_id' => User::all()->random()->id,
          'title' => $faker->company,
          'url' => $faker->url,

          'foto' => $faker->url,
          'precio_vta' => '599',
          'precio_chollo' => '499',
          'precio_alto' => '850',
    ];
});
