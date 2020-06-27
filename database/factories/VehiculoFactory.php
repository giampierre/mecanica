<?php

use Faker\Generator as Faker;

$factory->define(App\Vehiculo::class, function (Faker $faker) {

    return [
        "placa"        => "00-".$faker->randomDigit."20",
        "descripcion"  => $faker->text(500),
        "estado"       => "1"

    ];
});
