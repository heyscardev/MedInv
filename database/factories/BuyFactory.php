<?php

namespace Database\Factories;

use App\Models\Module;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Buy>
 */
class BuyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $module =  Module::orderByRaw("RAND()")->limit(5)->first();
        return [
            'user_id' => $module->user,
            'description'=> fake()->text(200),
            'module_id'=> $module
        ];
    }
}
