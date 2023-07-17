<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('borrows', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('contact');
            $table->foreignId('book_id')->constrained();
            $table->date('borrowed_date');
            $table->date('return_date')->default(now()->addDays(7));
            $table->timestamps();



             // $table->foreignId('user_id')->constrained('users');
            // $table->foreignId('book_id')->constrained('books');
            // $table->string('phone_number');
            // $table->date('borrow_date');
            // $table->date('return_date')->default(now()->addDays(7)); // Mengatur tanggal pengembalian menjadi 7 hari setelah tanggal peminjaman

            // $table->string('nama_peminjam');
            // $table->string('nomor_telepon');
            // $table->unsignedBigInteger('buku_id');
            // $table->foreign('buku_id')->references('id')->on('bukus')->onDelete('cascade');
            // $table->date('tanggal_pinjam');
            // $table->date('tanggal_pengembalian')->nullable();

            // $table->string('title');
            // $table->string('genre');
            // $table->unsignedBigInteger('book_id');

            // $table->foreign('book_id')->references('id')->on('books')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('borrows');
    }
};
