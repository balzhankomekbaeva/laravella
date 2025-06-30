<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use hasFactory;
    protected $table = 'books';

    public function author()
    {
        return $this->belongsTo(Author::class, 'author_id');
    }
}
