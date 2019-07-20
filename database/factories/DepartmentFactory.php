<?php

use Faker\Generator as Faker;

$factory->define(App\Department::class, function (Faker $faker) {
    return [
        'department_name' => $faker->name,
        'department_id' => random_int(1, 1000)
    ];
});

