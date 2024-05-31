<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Patient>
 */
class PatientFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'cpf' => fake()->unique()->cpf(false),
            'cns' => fake()->unique()->rg(false),
            'name' => fake()->name(),
            'birth' => fake()->date('Y_m_d'),
            'email' => fake()->unique()->safeEmail(),
            'phone' => fake()->cellphone(),
            'county_id' => fake()->randomNumber(1,142)
        ];
    }
}