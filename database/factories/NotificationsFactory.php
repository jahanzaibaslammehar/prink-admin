<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Notifications>
 */
class NotificationsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $notify = ['Error', 'Alert', 'Success'];
        return [
            'user_id' => $this->faker->numberBetween(1, 10),
            'notification_type' => $this->faker->numberBetween(1, 3),
            'notification' => $this->faker->text(32),
            'is_read' => 0,
        ];
    }
}
