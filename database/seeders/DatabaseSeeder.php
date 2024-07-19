<?php

namespace Database\Seeders;
use App\Models\Approval;
use App\Models\Driver;
use App\Models\Vehicle;
use App\Models\Booking;


use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        Driver::factory(10)->create();
        Vehicle::factory(10)->create();
        Booking::factory(10)->create();
        Approval::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
