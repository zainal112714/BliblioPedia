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
        // isis tabel books
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->string('code',3)->unique();
            $table->string('title');
            $table->string('genre');
            $table->string('author');
            $table->string('publisher');
            $table->string('images')->nullable();
            $table->text('synopsis')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('books');
    }
};

