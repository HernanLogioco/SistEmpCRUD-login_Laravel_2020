<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Empleado;
use Faker\Generator as Faker;

$factory->define(Empleado::class, function (Faker $faker) {
    return [
        'nombre' => $faker->name,
        'puesto' => $faker->jobTitle,
        'descripcion' => $faker->text,
        'sueldo' => $faker->numberBetween($min = 20000, $max = 30000),
    ];
});
