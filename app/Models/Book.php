<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Book;

class Book extends Model
{
    use HasFactory;

    protected $table = 'books';

    protected $fillable = ['title', 'genre', 'author', 'publisher', 'synopsis'];

    // Relationship dengan model Borrow
    public function borrows()
    {
        return $this->hasMany(Borrow::class);
    }
}
