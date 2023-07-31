<?php

namespace Database\Factories;
use App\Models\Borrow;
use App\Models\Book;
use Illuminate\Database\Eloquent\Factories\Factory;
use Carbon\Carbon;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Borrow>
 */
class BorrowFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Borrow::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $borrowedDate = $this->faker->date();

        return [
            'name' => $this->faker->name(),
            'contact' => $this->faker->phoneNumber(),
            'book_id' => Book::factory(), // Menggunakan factory dari model Book untuk menghasilkan book_id
            // 'borrowed_date' => $this->faker->date(),
            // 'return_date' => $this->faker->dateTimeBetween('+1 week', '+2 weeks')->format('Y-m-d'),
            'borrowed_date' => $borrowedDate,
            'return_date' => Carbon::parse($borrowedDate)->addDays(7)->format('Y-m-d'), // Menggunakan Carbon untuk menambahkan 7 hari ke 'borrowed_date'
        ];
    }
}
