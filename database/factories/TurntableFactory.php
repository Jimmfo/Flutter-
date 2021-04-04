<?php

namespace Database\Factories;

use App\Models\Turntable;
use Illuminate\Database\Eloquent\Factories\Factory;

class TurntableFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Turntable::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'Mark'=>$this->faker->word,
            'Line' =>$this->faker->word,
            'Model' =>$this->faker->word,
            'Voltage' => $this->faker->randomDigitNot(0,1,3,5,7,9),
            'Playbackspeeds' =>$this->faker->word,
            'Audiooutputs' =>$this->faker->word,
            'WithUSB' =>$this->faker->word,
            'Recording' =>$this->faker->word,
            'TurntableMaterial' =>$this->faker->word,
            'Includescapsule' =>$this->faker->word,
            'Description' => $this->faker->text($maxNbChars = 100),
        ];
    }
}
