<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Employe>
 */
class EmployeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            //
            'nom'=> fake()->lastName(),
            'prenom'=> fake()->firstName(),
            'email'=> fake()->email(),
            'tel'=> fake()->phoneNumber(),
            'salaire'=> fake()->numberBetween(1_000, 10_000),
            'adresse'=> fake()->address(),

        ];
    }
}
