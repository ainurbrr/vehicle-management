<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Approval>
 */
class ApprovalFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'booking_id' => fake()->numberBetween(1, 10),
            'approver_id' => fake()->numberBetween(3,4),
            'level' => fake()->numberBetween(1,2),
            'status' => fake()->randomElement(['pending', 'approved', 'rejected'])
        ];
    }
}
