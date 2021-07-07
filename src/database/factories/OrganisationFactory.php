<?php
namespace Database\Factories;

use App\Models\Organisation;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class OrganisationFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Organisation::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $company_name = $this->faker->company;
        return [
        'name' => $company_name,
        'slug' => Str::slug($company_name),
        'vat_number' => $this->faker->bankAccountNumber,
        'address' => $this->faker->streetName,
        'city' => $this->faker->city,
        'postcode' => $this->faker->postcode,
        'country' => $this->faker->country,
        'description' => $this->faker->text,
        'logo_url' => $this->faker->imageUrl($width = 50, $height = 50),
    ];
    }
};
