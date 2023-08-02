<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Book;
use App\Models\Borrow;


class BorrowSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         // Menggunakan factory Borrow untuk membuat 3 data dummy
         Borrow::factory()->count(5)->create();
        // untuk mendapatkan data yang memiliki judul tertentu
        // $book1 = Book::where('title', 'Book Title 1')->first();
        // $book2 = Book::where('title', 'Book Title 2')->first();
        // $book3 = Book::where('title', 'Book Title 3')->first();

        // DB::table('borrows')->insert([
        //     [
        //         'name' => 'John Doe',
        //         // 'book_id' => $book1->id,
        //         'book_id' => '1',
        //         'contact' => '1234567890',
        //         'borrowed_date' => '2023-07-15',
        //         'return_date' => '2023-07-22',
        //     ],
        //     [
        //         'name' => 'Jane Smith',
        //         // 'book_id' => $book2->id,
        //         'book_id' => '2',
        //         'contact' => '9876543210',
        //         'borrowed_date' => '2023-07-16',
        //         'return_date' => '2023-07-23',
        //     ],
        //     [
        //         'name' => 'Michael Johnson',
        //         // 'book_id' => $book3->id,
        //         'book_id' => '3',
        //         'contact' => '4567890123',
        //         'borrowed_date' => '2023-07-17',
        //         'return_date' => '2023-07-24',
        //     ],
        // ]);
    }
}
