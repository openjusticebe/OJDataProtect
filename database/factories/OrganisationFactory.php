<?php
use Illuminate\Support\Str;
use Faker\Generator as Faker;

$factory->define(App\Models\Organisation::class, function (Faker $faker) {

    $company_name = $faker->company;
    return [
        'name' => $company_name,
        'slug' => Str::slug($company_name),
        'vat_number' => $faker->bankAccountNumber,
        'address' => $faker->streetName,
        'city' => $faker->city,
        'postcode' => $faker->postcode,
        'country' => $faker->country,
        'description' => $faker->text,
        'logo_url' => $faker->imageUrl($width = 50, $height = 50),
    ];
});
