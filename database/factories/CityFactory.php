<?php

use Faker\Generator as Faker;
use ActivismeBE\Models\{City, Province};

$factory->define(City::class, function (Faker $faker): array {
    return [
        'province_id' => factory(Province::class)->create()->id,
        'charter_code' => 'A',
        'postal' => $faker->postcode,
        'name' => $faker->city,
        'lat' => $faker->latitude,
        'lng' => $faker->longitude,
    ];
});
