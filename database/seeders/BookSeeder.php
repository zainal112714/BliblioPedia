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
        //         'title' => 'Hujan',
        //         'genre' => 'Romance',
        //         'author' => 'Novi Monica',
        //         'publisher' => 'Gramedia',
        //         'images' => 'images/hujan.jpg',
        //         'synopsis' => 'Inilah yang menimbulkan konflik dalam cerita. Pertama-tama, diawali dengan kedatangan Lail yang akan memodifikasi ingatannya di pusat terapi saraf.'
        //     ],
        //     [
        //         'code' => '002',
        //         'title' => 'Kisah Nyata di 13 Kota',
        //         'genre' => 'Drama',
        //         'author' => 'Sabil',
        //         'publisher' => 'Gramedia',
        //         'images' => 'images/alam_semesta.jpg',
        //         'synopsis' => 'Kumpulan Kisah Nyata Hantu di 13 Kota adalah buku yang ditulis oleh Argo Wikanjati. Buku ini berisi kumpulan kisah nyata tentang hantu di 13 kota di Indonesia.'
        //     ],
        //     [
        //         'code' => '003',
        //         'title' => 'Ensiklopedia Ruang Angkasa',
        //         'genre' => 'Pendidikan',
        //         'author' => 'Cindy',
        //         'publisher' => 'Gramedia',
        //         'images' => 'images/bung_karno.jpeg',
        //         'synopsis' => 'Di dunia ini, tidak hanya Bumi saja tempat di mana kita tinggal. Di atas Bumi juga tidak hanya langit saja, melainkan masih banyak benda dan hal-hal lain yang perlu kita tahu.'
        //     ],
        //     [
        //         'code' => '004',
        //         'title' => 'Bung Karno',
        //         'genre' => 'History',
        //         'author' => 'Novia',
        //         'publisher' => 'Gramedia',
        //         'images' => 'images/bung_karno.jpeg',
        //         'synopsis' => 'Memiliki nama asli Koesno Sosrodihardjo, Soekarno lahir di Jl. Pandean IV No 40, Kel. Paneleh, Kec. Genteng, Kota Surabaya pada 6 Juni 1901.'
        //     ],
        //     [
        //         'code' => '005',
        //         'title' => 'Tentang Kehidupan',
        //         'genre' => 'Inspirasi',
        //         'author' => 'Merry Riana',
        //         'publisher' => 'Gramedia',
        //         'images' => 'images/Tentang Kehidupan.jpeg',
        //         'synopsis' => 'Buku ini menceritakan kisah hidup seorang pengusaha sukses bernama Merry Riana, miliuner muda yang kini terkenal sebagai motivator dan penulis buku.'
        //     ],
        // ]);
    }
}

