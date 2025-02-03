<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Videos>
 */
class VideosFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $type = ['custom', 'orignal'];
        $t = $type[$this->faker->numberBetween(0, 1)];
        $m_id = null;

        if ($t == 'custom'){
            $m_id = $this->faker->numberBetween(1, 25);
        }

        return [
            'gender_id' => $this->faker->numberBetween(1, 5),
            'body_shape_id' => $this->faker->numberBetween(1, 5),
            'color_id' => $this->faker->numberBetween(1, 10),
            'outfit_type_id' => $this->faker->numberBetween(1, 10),
            'video_category_id' => $this->faker->numberBetween(1, 10),
            'video_url' => $this->faker->url(),
            'hashtags' => '#video #fashion #nice #like #share',
            'music_type' => $t,
            'music_id' => $m_id,
            'upload_by' => $this->faker->numberBetween(1, 10)
        ];
    }
}
