<?php

namespace Database\Factories;

use App\Models\iron;
use Illuminate\Database\Eloquent\Factories\Factory;

class IronFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = iron::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'Mark' => $this->faker->word,
            'Line' => $this->faker->word,
            'Model' => $this->faker->word,
            'Color' => $this->faker->colorName,
            'Voltage'  => $this->faker->randomDigitNot(0,1,3,5,7,9),
            'Power' => $this->faker->word,
            'Typeofiron' => $this->faker->word,
            'Use'      =>$this->faker->word,
            'Description'=> $this->faker->text($maxNbChars = 200),
            'Coment' => $this->faker->word,
        ];
    }
}
