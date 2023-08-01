<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Book;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Panggil BookFactory dengan method create() untuk membuat 10 data fake.
        Book::factory()->count(5)->create();


        // DB::table('books')->insert([
        //     [
        //         'code' => '001',
        //         'title' => 'Book Title 1',
        //         'genre' => 'Fiction',
        //         'author' => 'Author 1',
        //         'publisher' => 'Publisher 1',
        //         'synopsis' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.'
        //     ],
        //     [
        //         'code' => '002',
        //         'title' => 'Book Title 2',
        //         'genre' => 'Thriller',
        //         'author' => 'Author 2',
        //         'publisher' => 'Publisher 2',
        //         'synopsis' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.'
        //     ],
        //     [
        //         'code' => '003',
        //         'title' => 'Book Title 3',
        //         'genre' => 'Romance',
        //         'author' => 'Author 3',
        //         'publisher' => 'Publisher 3',
        //         'synopsis' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.'
        //     ],
        // ]);
    }
}

