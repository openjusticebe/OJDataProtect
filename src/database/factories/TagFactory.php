<?php
namespace Database\Factories;

use App\Models\Tag;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class TagFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Tag::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
        'name' => $this->faker->word(),
        'type' => $this->faker->randomElement([
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
          'location',
          null
        ]),
        'category' => $this->faker->randomElement([
          'purpose',
          'data_object',
          'data_subject',
          'data_recipient',
          'data_controller',
          'data_operator',
          'data_processor'
        ]),
        'description' => $this->faker->text,
      ];
    }
};
