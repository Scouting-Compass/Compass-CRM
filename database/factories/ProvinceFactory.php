<?php

use ActivismeBe\Models\Province;
use Faker\Generator as Faker;

$factory->define(Province::class, function (Faker $faker): array {
    return ['name' => 'Antwerp'];
});
