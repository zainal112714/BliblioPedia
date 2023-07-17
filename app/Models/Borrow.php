<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Borrow extends Model
{
    use HasFactory;
    protected $table = 'borrows';

    protected $fillable = ['book_id', 'user_id', 'borrow_date', 'return_date'];

    // Relationship dengan model Book
    public function book()
    {
        // return $this->belongsTo(Book::class);
        return $this->belongsTo(Book::class, 'book_id');
    }
}
