<?php

use Faker\Generator as Faker;

$factory->define(App\Models\ProcessTag::class, function (Faker $faker) {
    return [
        'process_id' => App\Models\Process::inRandomOrder()->first()->id,
        'data_id' => App\Models\Data::inRandomOrder()->first()->id,
        'specific_description' => $faker->text,
        ];
});
