<?php

namespace Database\Factories;

use App\Models\Service;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Doctor>
 */
class DoctorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'code' => strval(fake()->unique()->randomNumber(8, false)),
            'c_i' => strval(fake()->unique()->randomNumber(8, true)),
            'first_name' => fake()->firstName(),
            'last_name' => fake()->lastName(),
            'birth_date' => fake()->date(),
            'gender' => fake()->randomElement(['Female','Male']),
            'email' => fake()->safeEmail(),
            'phone'=> fake()->phoneNumber(),
            'direction'=> fake()->randomElement([fake()->address(),null]),
            'service_id'=>Service::create([
                'name'=>fake()->text(40)
            ])
        ];
    }
}
