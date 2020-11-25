<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Tag::class, function (Faker $faker) {
  return [
    'name' => $faker->word(),
    'type' => $faker->randomElement([
      'identification',
      'financial',
      'habits',
      'family',
      'education',
      'work',
      'political',
      'image',
      'sound',
      'browser',
      'location'
    ]),
    'category' => $faker->randomElement([
      'purpose',
      'data_object',
      'data_subject',
      'data_recipient',
      'data_controller'
    ]),
    'description' => $faker->text,
  ];
});
