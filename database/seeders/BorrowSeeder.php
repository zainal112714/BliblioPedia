<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Book;


class BorrowSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // untuk mendapatkan data yang memiliki judul tertentu
        $book1 = Book::where('title', 'Book Title 1')->first();
        $book2 = Book::where('title', 'Book Title 2')->first();
        $book3 = Book::where('title', 'Book Title 3')->first();

        DB::table('borrows')->insert([
            [
                'name' => 'John Doe',
                'book_id' => $book1->id,
                'contact' => '1234567890',
                'borrowed_date' => '2023-07-15',
                'return_date' => '2023-07-22',
            ],
            [
                'name' => 'Jane Smith',
                'book_id' => $book2->id,
                'contact' => '9876543210',
                'borrowed_date' => '2023-07-16',
                'return_date' => '2023-07-23',
            ],
            [
                'name' => 'Michael Johnson',
                'book_id' => $book3->id,
                'contact' => '4567890123',
                'borrowed_date' => '2023-07-17',
                'return_date' => '2023-07-24',
            ],
            // [
            //     'name' => 'John Doe',
            //     'book_id' => '1',
            //     // 'title' => 'Book Title 1',
            //     // 'genre' => 'Fiction',
            //     'contact' => '1234567890',
            //     'borrowed_date' => '2023-07-15',
            //     'return_date' => '2023-07-22',
            // ],
            // [
            //     'name' => 'Jane Smith',
            //     'book_id' => '2',
            //     // 'title' => 'Book Title 2',
            //     // 'genre' => 'Thriller',
            //     'contact' => '9876543210',
            //     'borrowed_date' => '2023-07-16',
            //     'return_date' => '2023-07-23',
            // ],
            // [
            //     'name' => 'Michael Johnson',
            //     'book_id' => '3',
            //     // 'title' => 'Book Title 3',
            //     // 'genre' => 'Romance',
            //     'contact' => '4567890123',
            //     'borrowed_date' => '2023-07-17',
            //     'return_date' => '2023-07-24',
            // ],
        ]);
    }
}
