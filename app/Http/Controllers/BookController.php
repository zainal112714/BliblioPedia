<?php

namespace App\Http\Controllers;

use App\Exports\BooksExport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use App\Models\Borrow;
use App\Models\Book;
use Maatwebsite\Excel\Facades\Excel;
use PDF;
use DataTables;
use RealRashid\SweetAlert\Facades\Alert;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pageTitle = 'Books List';
        confirmDelete();

        return view('book.index', compact('pageTitle'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $pageTitle = 'Create Book';
        $books = Book::all();

        return view('book.create', compact('pageTitle', 'books'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         // Mendefinisikan pesan yang ditampilkan saat terjadi kesalahan inputan pada form create employee
        $messages = [
            'required' => ':Attribute harus diisi.',
            'numeric' => 'Isi :attribute dengan angka.',
            'digits' => ':Attribute harus berupa :digits digit.',
            'unique' => ':Attribute sudah ada.',
        ];

        $validator = Validator::make($request->all(), [
            'code' => 'required|numeric|unique:books,code|digits:3',
            'title' => 'required',
            'genre' => 'required',
            'author' => 'required',
            'publisher' => 'required',
            'image' => 'required',
            'synopsis' => 'required',
        ], $messages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $image = $request->file('image');
        $folder = 'images/';

        $filePath = $folder . $image->getClientOriginalName();
        $image->move($folder, $image->getClientOriginalName());

        // Simpan data buku ke database dengan eloquent
        $book = new Book();
        $book->code = $request->input('code');
        $book->title = $request->input('title');
        $book->genre = $request->input('genre');
        $book->author = $request->input('author');
        $book->publisher = $request->input('publisher');
        $book->images = $filePath;
        $book->synopsis = $request->input('synopsis');
        $book->save();

        Alert::success('Data Buku Berhasil Dibuat', 'Data Buku Telah Berhasil Ditambahkan');
        return redirect()->route('books.index')->with('success', 'Book created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $pageTitle = 'Book Detail';
        $book = Book::find($id);

        return view('book.show', compact('pageTitle', 'book'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $pageTitle = 'Edit Book';
        $book = Book::find($id);

        return view('book.edit', compact('pageTitle', 'book'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $messages = [
            'required' => ':Attribute harus diisi.',
            'code' => 'Isi :attribute dengan angka'
        ];

        $validator = Validator::make($request->all(), [
            'code' => 'numeric',
            'title' => 'required',
            'genre' => 'required', // Fix the field name to 'genre'
            'author' => 'required',
            'publisher' => 'required',
            'synopsis' => 'required'
        ], $messages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $file = $request->file('file');

        // GET FILE
        if ($file != null) {
            $originalFilename = $file->getClientOriginalName();
            $encryptedFilename = $file->hashName();

            // STORE FILE
            $file->store('public/files');

            $book = Book::find($id);
            if ($book->encrypted_filename) {
                Storage::delete('public/files/' . $book->encrypted_filename);
            }
        }

        // ELOQUENT
        $book = Book::find($id);
        $book->code = $request->code;
        $book->title = $request->title;
        $book->genre = $request->genre; // Correct the field name to 'genre'
        $book->author = $request->author;
        $book->publisher = $request->publisher;
        $book->synopsis = $request->synopsis;

        if ($file != null) {
            $book->original_filename = $originalFilename;
            $book->encrypted_filename = $encryptedFilename;
        }

            $book->save();

            Alert::success('Data buku berhasil diedit', 'Data Buku Telah Berubah.');

            return redirect()->route('books.index');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $book = Book::find($id);
        $book->delete();
        Alert::success('Data buku berhasil dihapus');
        return redirect()->route('books.index');
    }

    public function exportExcel()
    {
        return Excel::download(new BooksExport, 'books.xlsx');
    }

    public function exportPdf()
    {
        $books = Book::all();

        $pdf = PDF::loadView('book.export_pdf', compact('books'));

        return $pdf->download('books.pdf');
    }

    // datatable
    public function getData(Request $request)
    {
        $books = Book::with('borrows');
        if ($request->ajax()) {
            return datatables()->of($books)
                ->addIndexColumn()
                ->addColumn('actions', function ($book) {
                    return view('book.actions', compact('book'));
                })
                ->toJson();
        }
    }
}
