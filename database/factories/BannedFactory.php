<?php

use Faker\Generator as Faker;

$factory->define(App\Banned::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'equipment' => factory('App\Equipment')->create()->id,
    ];
});
