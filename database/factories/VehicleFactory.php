<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Vehicle>
 */
class VehicleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'license_plate'=>fake()->numerify('N-####-UP'),
            'type'=>fake()->randomElement(['passenger', 'cargo']),
            'status'=>fake()->randomElement(['available', 'maintenance', 'in_use']),
            'fuel_consumption'=>fake()->randomNumber(2,true),
            'pool'=>fake()->city(),
            'service_schedule'=>fake()->dateTimeThisYear('+2 months'),
            'last_service_date'=>fake()->dateTimeBetween('-4 week'),
            'is_rented' =>fake()->randomElement(['1', '0']),
            'rental_company' =>fake()->company(),
        ];
    }
}
