<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Book;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Book>
 */
class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [

            'code' => fake()->unique()->numberBetween(100, 999),
            'title' => fake()->unique()->sentence(),
            'genre' => fake()->randomElement(['Novel', 'Fiksi Ilmiah', 'Fantasi', 'Misteri', 'Drama', 'Puisi', 'Cerita Pendek', 'Biografi', 'Ensiklopedia', 'Buku Anak-Anak']),
            'author' => fake()->name(),
            'publisher' => fake()->company(),
            'synopsis' => fake()->paragraph(),
        ];
    }
}
