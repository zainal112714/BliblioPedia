<?php

namespace Database\Factories;
use App\Models\Book;
use Illuminate\Database\Eloquent\Factories\Factory;

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
        $genres = ['Novel', 'Fiksi Ilmiah', 'Fantasi', 'Misteri', 'Drama', 'Puisi', 'Cerita Pendek', 'Biografi', 'Ensiklopedia', 'Buku Anak-Anak'];

        return [
            'code' => $this->faker->unique()->numberBetween(100, 999),
            'title' => $this->faker->unique()->sentence(),
            'genre' => $this->faker->randomElement($genres),
            'author' => $this->faker->name(),
            'publisher' => $this->faker->company(),
            'synopsis' => $this->faker->paragraph(),
        ];
    }
}
