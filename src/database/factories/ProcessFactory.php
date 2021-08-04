<?php
namespace Database\Factories;

use App\Models\Process;
use App\Models\Organisation;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProcessFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Process::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $organisation = Organisation::inRandomOrder()->first();

        $random_updator = $organisation->members()->inRandomOrder()->first();
        $random_creator = $organisation->members()->inRandomOrder()->first();

        return [
        'name' => ucfirst($this->faker->bs),
        'organisation_id' => $organisation->id,
       'description' => $this->faker->text,
       'updated_by' => $random_updator ? $random_updator->id : null,
        'created_by' => $random_creator ? $random_creator->id : null
    ];
    }
};
