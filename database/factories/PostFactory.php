<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $users = \DB::table('users')->pluck('id');
        return [
            'title' => $this->faker->unique()->catchPhrase(),
            'content' => $this->faker->text(),
            'status' => 'published',
            'user_id' => $this->faker->randomElement($users)
        ];
    }
}
