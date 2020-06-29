<?php

use Faker\Generator as Faker;
use App\Cliente;

$factory->define(Cliente::class, function (Faker $faker) {
    return [
       
        "nombre" => $faker->text(8),
        "dni"    => "718".$faker->randomDigit."2357",
        "estado" => "1"

    ];
});
