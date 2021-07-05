<?php
use Illuminate\Support\Str;
use Faker\Generator as Faker;

$factory->define(App\Models\Unit::class, function (Faker $faker) {
    return [
        'name' => $faker->randomElement([
            'hr',
            'production',
            'it',
            'management',
            'pr',
            'communication',
          ]),
        'description' => $faker->text,
    ];
});
