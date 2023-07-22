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
            'code' => faker()->unique()->numberBetween(100, 999),
            'title' => faker()->unique()->sentence(),
            'genre' => faker()->randomElement(['Novel', 'Fiksi Ilmiah', 'Fantasi', 'Misteri', 'Drama', 'Puisi', 'Cerita Pendek', 'Biografi', 'Ensiklopedia', 'Buku Anak-Anak']),
            'author' => faker()->name(),
            'publisher' => faker()->company(),
            'synopsis' => faker()->paragraph(),
        ];
    }
}
