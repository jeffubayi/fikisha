<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Customer;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Fleet;

class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'order_customer' => Customer::all()->random()->id,
            'order_fleet' => Fleet::all()->random()->id,
            'order_status' => $this->faker->randomDigit,
            'order_date' => $this->faker->date('Y-m-d'),
            'user_id' => User::all()->random()->id,
        ];
    }
}
