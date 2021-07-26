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
        return [
        'name' => ucfirst($this->faker->bs),
        'organisation_id' => Organisation::inRandomOrder()->first()->id,
       'description' => $this->faker->text,
    ];
    }
};
