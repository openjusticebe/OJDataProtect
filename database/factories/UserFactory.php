<?php

use Illuminate\Support\Str;
use Faker\Generator as Faker;


$factory->define(App\User::class, function (Faker $faker) {
    return [
        'first_name' => $faker->name,
        'last_name' => $faker->name,
        'address' => $faker->streetAddress,
        'postcode' => $faker->postcode,
        'city' => $faker->city,
        'country' => $faker->country,
        'phone_number' => $faker->phoneNumber,
        'organisation' => $faker->company,
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
        'remember_token' => Str::random(10),
    ];
});
