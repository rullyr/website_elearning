<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Quiz>
 */
class QuizFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'class_id' => \App\Models\Kelas::factory(),
            'question' => $this->faker->sentence,
            'option_a' => 'A ' . $this->faker->word,
            'option_b' => 'B ' . $this->faker->word,
            'option_c' => 'C ' . $this->faker->word,
            'option_d' => 'D ' . $this->faker->word,
            'option_e' => 'E ' . $this->faker->word,
            'correct_answer' => $this->faker->randomElement(['a', 'b', 'c', 'd', 'e']),
        ];
    }
}
