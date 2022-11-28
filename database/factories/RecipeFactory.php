<?php

namespace Database\Factories;

use App\Models\Doctor;
use App\Models\Module;
use App\Models\Patient;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Recipe>
 */
class RecipeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'user_id' => User::orderByRaw("RAND()")->limit(5)->first(),
            'recipe_type' => fake()->randomElement(['DAILY', 'MASSIVE', 'HIGH COST']),
            'description' => fake()->text(200),
            'module_id' => Module::orderByRaw("RAND()")->limit(5)->first(),
            'doctor_id' => Doctor::orderByRaw("RAND()")->limit(5)->first(),
            'patient_id' => Patient::orderByRaw("RAND()")->limit(5)->first()
        ];
    }
}
