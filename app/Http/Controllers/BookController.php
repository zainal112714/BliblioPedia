<?php

namespace App\Http\Controllers;

use App\Exports\BooksExport;
use Illuminate\Http\Request;
// validator
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
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
        $pageTitle= 'Books List';
        // eloquent
        // $books = Book::all(); // Mengambil semua data buku dari database menggunakan model Book

        // return view('book.index', [
        //     'pageTitle' => $pageTitle,
        //     'books' => $books
        // ]);
        return view('book.index', compact('pageTitle'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $pageTitle= 'Create Book';
        // // SQL QUERY BUILDER
        // $books = DB::table('books')->get();

        // ELOQUENT
        $books = book::all();
        return view('book.create', [
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
            'numeric' => 'Isi :attribute dengan angka.',
            // 'size' => 'Panjang :attribute harus 3 karakter.'
            'digits' => ':Attribute harus berupa :digits digit.',
        ];
        // validasi inputan
        $validator = Validator::make($request->all(), [
            'code' => 'required|numeric|unique:books,code|digits:3', //untuk memastikan kolom kode buku diisi dengan unik 3 karakter
            'title' => 'required',
            'genre' => 'required',
            'author' => 'required',
            'publisher' => 'required',
            'synopsis' => 'required',
        ], $messages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Simpan data buku ke database dengan eloquent
        $book = new Book();
        $book->code = $request->input('code');
        $book->title = $request->input('title');
        $book->genre = $request->input('genre');
        $book->author = $request->input('author');
        $book->publisher = $request->input('publisher');
        $book->synopsis = $request->input('synopsis');
        $book->save();

        Alert::success('Added Sucessfully', 'Book Data Added Successfully');
        return redirect()->route('books.index')->with('success', 'Book created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $pageTitle = 'Book Detail';

        // ELOQUENT
        $book = Book::find($id);

        return view('book.show', compact('pageTitle', 'book'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        {
            $pageTitle = 'Edit Book';

            // ELOQUENT
            $borrows = Borrow::all();
            $book = Book::find($id);

            return view('book.edit', compact('pageTitle', 'book', 'borrows'));
        }
    }

/**
* Update the specified resource in storage.
*/
    public function update(Request $request, string $id)
    {
        {
            $messages = [
                'required' => ':Attribute harus diisi.',
                'code' => 'Isi :attribute dengan angka'

            ];

            $validator = Validator::make($request->all(), [
                'code' => 'numeric',
                'title' => 'required',
                'gendre' => 'required',
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

            $employee = Book::find($id);
                if ($book->encrypted_filename) {
                Storage::delete('public/files/' . $book->encrypted_filename);
            }
         }

            // ELOQUENT
            $book = book::find($id);
            $book->name = $request->name;
            $book->contact = $request->contact;
            $book->book_id = $request->book_id;
            $book->booked_date = $request->booked_date;
            $book->return_date = $request->return_date;

            if ($file != null){
            $book->original_filename = $originalFilename;
            $book->encrypted_filename = $encryptedFilename;
        }

            $book->save();

            return redirect()->route('books.index');
        }

    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // ELOQUENT
        $book = Book::find($id);
        $book->delete();
        return redirect()->route('books.index');
    }

    public function exportExcel() //exportExcel iki di panggil nang ndi engkok
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
