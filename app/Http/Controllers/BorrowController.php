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
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;


class BorrowController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pageTitle= 'Borrow List';
        // ambil data
        // $borrows = Borrow::with('book')->get();
        // eloquent
        // $borrows = Borrow::all(); // Mengambil semua data peminjam dari database menggunakan model Borrow
        // return view('borrow.index', [
        //     'pageTitle' => $pageTitle,
        //     'borrows' => $borrows
        // ]);
        confirmDelete();

        return view('borrow.index', compact('pageTitle'));
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
         // Mendefinisikan pesan yang ditampilkan saat terjadi kesalahan inputan pada form create borrow
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
            'file' => 'required'
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

        Alert::success('Data Peminjam Berhasil Dibuat', 'Data Peminjam Telah Berhasil Ditambahkan');
        return redirect()->route('borrows.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $pageTitle = 'Detail Peminjaman';

        // ELOQUENT
        $borrow = Borrow::find($id);

        return view('borrow.show', compact('pageTitle', 'borrow'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $pageTitle = 'Edit Load';

        // ELOQUENT
        $books = Book::all();
        $borrow = Borrow::find($id);

        return view('borrow.edit', compact('pageTitle', 'borrow', 'books'));
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        {
            $messages = [
                'required' => ':Attribute harus diisi.',
                'contact' => 'Isi :attribute dengan angka'

            ];

            $validator = Validator::make($request->all(), [
                'name' => 'required',
                'contact' => 'numeric',
                'title' => 'required',
                'borrowed_date' => 'required',
                'return_date' => 'required',
                'file' => 'require'
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

            $borrow = Borrow::find($id);
                if ($borrow->encrypted_filename) {
                Storage::delete('public/files/' . $borrow->encrypted_filename);
            }
        }

            // ELOQUENT
            $borrow = borrow::find($id);
            $borrow->name = $request->name;
            $borrow->contact = $request->contact;
            $borrow->book->title = $request->book_id;
            $borrow->borrowed_date = $request->borrowed_date;
            $borrow->return_date = $request->return_date;

            if ($file != null){
            $borrow->original_filename = $originalFilename;
            $borrow->encrypted_filename = $encryptedFilename;
        }

            $borrow->save();

            Alert::success('Data peminjaman berhasil diedit', 'Tanggal Peminjaman Telah Berubah.');

            return redirect()->route('borrows.index');
            }


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // ELOQUENT
        $borrow = Borrow::find($id);
        // menghapus file yang terhubung jika ada
        if ($borrow->encrypted_file) {
            Storage::delete('public/files/'.$borrow->encrypted_file);
        }

        $borrow->delete();
        Alert::success('Data buku berhasil dihapus.');
        return redirect()->route('borrows.index');
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

    // datatable
    public function getData(Request $request)
    {
        $borrows = Borrow::with('book');

        if ($request->ajax()) {
            return datatables()->of($borrows )
                ->addIndexColumn()
                ->addColumn('actions', function ($borrow) {
                    return view('borrow.actions', compact('borrow'));
                })
                ->addColumn('genre', function ($borrow) {
                    return $borrow->book->genre;
                })
                ->toJson();
        }
    }

    public function downloadFile($borrowId)
{
    $borrow = Borrow::find($borrowId);
    $encryptedFile = 'public/files/'.$borrow->encrypted_file;
    $downloadFile = \Illuminate\Support\Str::lower($borrow->name.'_'.$borrow->book->code.'_identitas.pdf');

    if(Storage::exists($encryptedFile)) {
        return Storage::download($encryptedFile, $downloadFile);
    }
}
}
