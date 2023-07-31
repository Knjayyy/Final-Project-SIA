<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Student>
 */
class StudentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'last_name' => fake()->lastName,
            'first_name' => fake()->firstName,
            'mid_name' => fake()->firstNameMale,
            'birthdate' => fake()->date,
            'age' => fake()->numberBetween($min = 1, $max = 100),
            'address' => fake()->address,
            'num' => fake()->numberBetween($min = 1000000, $max = 10000000),
            'course' => fake()->jobTitle,
            'year_level' => fake()->numberBetween($min = 1, $max = 4),
            'email' => fake()->freeEmail,
        ];
    }
}
