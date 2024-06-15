<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\odel=Employee>
 */
class EmployeeFactory extends Factory
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
            'salaire'=> fake()->randomDigit(3), 
            'adresse'=> fake()->address(),
            // 'departement_id'=> fake()->,
        ];
    }
}
