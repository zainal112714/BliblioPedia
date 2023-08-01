<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\BorrowController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::redirect('/', '/login');

Auth::routes();

Route::middleware(['auth'])->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    // route ke halaman list buku
    Route::resource('books', BookController::class);
    // route ke halaman list peminjam
    Route::resource('borrows', BorrowController::class);
});
Route::get('download-file/{borrowId}', [BorrowController::class, 'downloadFile'])->name('borrows.downloadFile');

Route::get('exportExcel', [BookController::class, 'exportExcel'])->name('books.exportExcel');

Route::get('exportExcels', [BorrowController::class, 'exportExcels'])->name('borrows.exportExcels');

Route::get('exportPdf', [BookController::class, 'exportPdf'])->name('books.exportPdf');

Route::get('exportPdfs', [BorrowController::class, 'exportPdfs'])->name('borrows.exportPdfs');

// Server-side Processing DataTable Buku
Route::get('getBooks', [BookController::class, 'getData'])->name('books.getData');
// Server-side Processing DataTable Buku
Route::get('getBorrows', [BorrowController::class, 'getData'])->name('borrows.getData');
