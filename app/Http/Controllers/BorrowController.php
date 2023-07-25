<?php

namespace App\Http\Controllers;

use App\Exports\BorrowsExport;
use PDF;
use Illuminate\Http\Request;
// validator
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
// untuk model Borrow
use App\Models\Borrow;
// untuk model book
use App\Models\Book;
use Maatwebsite\Excel\Facades\Excel;

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
            'book_id' => 'required', //validasi untuk book_id yang akan terhubung dengan tabel books
            // 'title' => 'required',
            // 'genre' => 'required',
            'borrowed_date' => 'required',
            'return_date' => 'required',
        ], $messages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Simpan file yang diunggah (jika ada)
        $file = $request->file('file');
        if ($file != null) {
            $originalfile = $file->getClientOriginalName();
            $encryptedfile = $file->hashName();

            // penyimpanan file
            $file->store('public/files');
        }

        // Simpan data buku ke database
        $borrow = new Borrow();
        $borrow->name = $request->input('name');
        $borrow->contact = $request->input('contact');
        $borrow->book_id = $request->input('book_id');
        // $borrow->title = $request->input('title');
        // $borrow->genre = $request->input('genre');
        $borrow->borrowed_date = $request->input('borrowed_date');
        $borrow->return_date = $request->input('return_date');

        if ($file != null) {
            $borrow->original_file = $originalfile;
            $borrow->encrypted_file = $encryptedfile;
        }
        $borrow->save();

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

    public function exportExcels()
    {
        return Excel::download(new BorrowsExport, 'borrows.xlsx');
    }

    public function exportPdfs()
    {
        $borrows = Borrow::all();

        $pdf = PDF::loadView('borrow.export_pdf', compact('borrows'));

        return $pdf->download('borrows.pdf');
    }
}
