<?php

use Faker\Generator as Faker;

$factory->define(App\Bookings::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'equipment' => factory('App\Equipment')->create()->id,
        'start' => $faker->unixTime,
        'end' => $faker->unixTime,
    ];
});
