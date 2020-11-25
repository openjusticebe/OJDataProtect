<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Process::class, function (Faker $faker) {
    return [
        'name' => ucfirst($faker->bs),
        'organisation_id' => App\Models\Organisation::inRandomOrder()->first()->id,
       'description' => $faker->text,

    ];
});
