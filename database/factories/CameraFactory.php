<?php

namespace Database\Factories;

use App\Models\Camera;
use Illuminate\Database\Eloquent\Factories\Factory;

class CameraFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Camera::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'Price' =>$this->faker->word,
            'Seller' =>$this->faker->word,
            'Color'  => $this->faker->colorName,
            'Typecamera'=> $this->faker->word,
            'Resolution'  => $this->faker->word,
            'Screensize'   => $this->faker->randomDigitNot(0,1,3,5,7,9),
            'Connectivity' => $this->faker->text($maxNbChars = 100),
            'ISOsensitivity' => $this->faker->word,
            'Interfaces' => $this->faker->word,
            'Description' => $this->faker->text($maxNbChars = 100),
        ];
    }
}
