<?php

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

$factory->define(App\Model\User::class, function (Faker $faker) {
    return [
        'nombre' => $faker->name,
        'apellido' => $faker->lastname,
        'email' => $faker->unique()->safeEmail,
        'remember_token' => str_random(10),
        'active' => true,
        'domicilio' => $faker->address,
        'contacto_emergencia' => $faker->tollFreePhoneNumber,
        'telefono' => $faker->tollFreePhoneNumber,
    ];
});


$factory->define(App\Model\Profesional::class, function (Faker $faker) {
    return [
        'nombre' => $faker->name,
        'apellido' => $faker->lastname,
        'active' => true,
        'telefono' => $faker->tollFreePhoneNumber,
        'ingreso_bruto'=>  $faker->randomFloat($nbMaxDecimals = 2, $min = 0, $max = 50000),
        'matricula'=> $faker->randomNumber($nbDigits = 6, $strict = false),

    ];
});


$factory->define(App\Model\Obra::class, function (Faker $faker) {
    return [
        'nombre' => $faker->name,
        'importe' =>  $faker->randomFloat($nbMaxDecimals = 0, $min = 0, $max = 10),
    	'active'=> true,
    ];
});

