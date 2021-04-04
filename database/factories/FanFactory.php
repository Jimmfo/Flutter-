<?php

namespace Database\Factories;

use App\Models\Fan;
use Illuminate\Database\Eloquent\Factories\Factory;

class FanFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Fan::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'Model' => $this->faker->word,
            'Mark'  => $this->faker->word,
            'Price' => $this->faker->word,
            'Seller' => $this->faker->word,
            'Voltage' => $this->faker->word,
            'Fantype' => $this->faker->word,
            'Power'   => $this->faker->randomDigitNot(0,1,6,7,9),
            'Speeds' => $this->faker->word,
            'RemoteControl' => $this->faker->word,
            'Feeding' => $this->faker->word,
            'Diameter' => $this->faker->word,
        ];
    }
}
