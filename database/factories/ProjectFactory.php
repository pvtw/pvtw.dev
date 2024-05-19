<?php

declare(strict_types=1);

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Project>
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
        $startTimestamp = fake()->dateTime()->getTimestamp();

        return [
            'title' => fake()->sentence(),
            'description' => fake()->paragraph(),
            'repository_url' => fake()->url(),
            'started_at' => $startTimestamp,
            'finished_at' => $startTimestamp + fake()->randomNumber(),
        ];
    }
}
