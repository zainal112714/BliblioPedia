<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Book;
use Faker\Provider\id_ID\Person;
// use Faker\Provider\id_ID\Text;
// use Faker\Provider\id_ID\Lorem;
use Faker\Provider\Lorem;

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
        // Set locale ke Indonesian (id_ID)
        // $this->faker->locale('id_ID');
        $this->faker->addProvider(new Person($this->faker));
        // $this->faker->addProvider(new Text($this->faker));
        $this->faker->addProvider(new Lorem($this->faker));

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
