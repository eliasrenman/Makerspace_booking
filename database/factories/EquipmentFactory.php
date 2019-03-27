<?php

use Faker\Generator as Faker;

$factory->define(App\Equipment::class, function (Faker $faker) {
    return [
        'equipment' => $faker->name,
        'restricted' => $faker->boolean,
    ];
});
