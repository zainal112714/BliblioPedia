<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Book;

class DetailController extends Controller
{
      // Metode untuk menampilkan halaman detail buku
      public function show(string $id)
      {
        $pageTitle = 'Detail';
        $book = Book::find($id);
          // Lakukan query ke database untuk mendapatkan informasi buku berdasarkan ID
          // Simpan data buku ke variabel $buku
          // Contoh:
          // $buku = \App\Models\Buku::find($id);

          // Lalu tampilkan halaman detail buku dengan data buku yang telah diperoleh
          return view('detail_book', compact('pageTitle', 'book'));
      }
}


