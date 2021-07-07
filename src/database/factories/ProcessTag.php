<?php
namespace Database\Factories;

use App\Models\ProcessTag;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ProcessTagFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ProcessTag::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
        'process_id' => App\Models\Process::inRandomOrder()->first()->id,
        'data_id' => App\Models\Data::inRandomOrder()->first()->id,
        'specific_description' => $this->faker->text,
        ];
    }
};
