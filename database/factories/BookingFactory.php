<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Booking>
 */
class BookingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id'=> fake()->numberBetween(1, 4),
            'vehicle_id'=> fake()->numberBetween(1, 10),
            'driver_id'=> fake()->numberBetween(1,10),
            'approver_level_1' => fake()->numberBetween(3,4),
            'approver_level_2' => fake()->numberBetween(3,4),
            'status' => fake()->randomElement(['pending', 'approved_level_1', 'on_duty']),
            'start_date' => fake()->dateTime(),
            'end_date' => fake()->dateTime(),
        ];
    }
}
