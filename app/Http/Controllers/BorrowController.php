<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// validator
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
// untuk model Borrow
use App\Models\Borrow;
// untuk model book
use App\Models\Book;

class BorrowController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pageTitle= 'List Peminjam';
        // ambil data
        // $borrows = Borrow::with('book')->get();
        // eloquent
        $borrows = Borrow::all(); // Mengambil semua data peminjam dari database menggunakan model Borrow
        return view('borrow.index', [
            'pageTitle' => $pageTitle,
            'borrows' => $borrows
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $pageTitle= 'Create Peminjam';
        // $borrows = DB::table('borrows')->get();
        $books = Book::all();
        return view('borrow.create', [
            'pageTitle' => $pageTitle,
            'books' => $books
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         // Mendefinisikan pesan yang ditampilkan saat terjadi kesalahan inputan pada form create employee
         $messages = [
            'required' => ':Attribute harus diisi.',
            'numeric' => 'Isi :attribute dengan angka.'
        ];

        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'contact' => 'required|numeric',
            'title' => 'required',
            'genre' => 'required',
            'borrowed_date' => 'required',
            'return_date' => 'required',
        ], $messages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Simpan data buku ke database
        $book = new Book();
        $book->name = $request->input('name');
        $book->contact = $request->input('contact');
        $book->title = $request->input('title');
        $book->genre = $request->input('genre');
        $book->borrowed_date = $request->input('borrowed_date');
        $book->return_date = $request->input('return_date');
        $book->save();

        return redirect()->route('borrows.index')->with('success', 'Book created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
