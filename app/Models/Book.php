<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use hasFactory;
    protected $table = 'books';
    protected $fillable = ['title'];

    public function authors()
    {
        return $this->belongsToMany(Author::class, 'author_books');
    }
}
