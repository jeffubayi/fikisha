<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class FleetFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'fleet_name' => $this->faker->name(),
            'fleet_plate' => $this->faker->randomDigit,
            'fleet_status' => 'loading, available, on-transit',
            'user_id' => User::all()->random()->id,
        ];
    }
}
