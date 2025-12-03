<?php

namespace Database\Factories;

use App\Models\Employer;  // to provide the class hence solved the errpr class "D\F\E not found"
use Illuminate\Database\Eloquent\Factories\Factory;
// use Database\Factories\EmployerFactory;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Job>
 */

    // Extends:Factory<Job>
class JobFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->jobTitle(),
            'employer_id' => Employer::factory(),
            'salary' => '$50,000USD',
            'status' => 'open'
        ];
    }
}
