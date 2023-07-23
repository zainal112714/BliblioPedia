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
            'code' => $this->faker->unique()->numberBetween(100, 999),
            'title' => $this->faker->unique()->sentence(),
            'genre' => $this->faker->randomElement(['Novel', 'Fiksi Ilmiah', 'Fantasi', 'Misteri', 'Drama', 'Puisi', 'Cerita Pendek', 'Biografi', 'Ensiklopedia', 'Buku Anak-Anak']),
            'author' => $this->faker->name(),
            'publisher' => $this->faker->company(),
            'synopsis' => $this->faker->paragraph(),
        ];
    }
}
