<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Music>
 */
class MusicFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'music_category_id' => $this->faker->numberBetween(1, 10),
            'music_url' => $this->faker->url(),
            'hashtags' => '#music #song #nice #like',
            'upload_by' => $this->faker->numberBetween(1, 10),
        ];
    }
}
