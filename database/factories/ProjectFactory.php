<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\Project;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Project>
 */
final class ProjectFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $start = fake()->dateTimeBetween();

        return [
            'title' => fake()->sentence(),
            'description' => fake()->paragraph(),
            'repository_url' => fake()->url(),
            'repository_label' => fake()->word(),
            'started_at' => $start->getTimestamp(),
            'finished_at' => fake()->dateTimeBetween($start)->getTimestamp(),
        ];
    }
}
