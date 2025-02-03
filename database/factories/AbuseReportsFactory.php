<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\AbuseReports>
 */
class AbuseReportsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $type = ['video', 'user'];
        $status = ['Pending','Resolved','Not Resolved'];
        return [
            'report_type' => $type[$this->faker->numberBetween(0, 1)],
            'report_by' => $this->faker->numberBetween(1, 10),
            'report_for' => $this->faker->numberBetween(1, 10),
            'reason' => $this->faker->text(32),
            'action' => $this->faker->text(32),
            'taken_by' => 1,
            'action_timestamp' => $this->faker->date(),
            'status' => $status[$this->faker->numberBetween(0, 2)]
        ];
    }
}
