<?php

namespace Database\Factories;

use App\Http\Helpers\FactoryHelper;
use App\Models\Employer;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Job>
 */
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
            'employer_id' => FactoryHelper::getRandomIdOrCreate(Employer::class),
            'title' => fake()->jobTitle,
            'salary' => '$' . fake()->randomNumber(1,9) . fake()->randomElement([', 000 USD', '0, 000 USD', '5, 000 USD']),
            'location' => fake()->randomElement(["Remote", "On-site"]),
            'schedule' => fake()->randomElement(["Full-time", "Part-time", "Contract", "Internship"]),
            'url' => fake()->url,
            'featured' => fake()->boolean(20)
        ];
    }
}
