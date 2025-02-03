<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ProfilesFactory extends Factory
{
    public function definition()
    {
        return [
            'user_id' => $this->faker->unique()->numberBetween(2,10),
            'first_name' => $this->faker->firstName(),
            'last_name' => $this->faker->lastName(),
            'location_id' => $this->faker->numberBetween(1,5),
            'gender_id' => $this->faker->numberBetween(1,2),
            'body_shape_id' => $this->faker->numberBetween(1,5),
            'dob' => $this->faker->numberBetween(1980,2005)."-".$this->faker->numberBetween(1,12)."-".$this->faker->numberBetween(1,30),
        ];
    }
}
