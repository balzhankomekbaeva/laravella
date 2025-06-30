<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    public function books()
    {
        return $this->hasOneThrough(BookNew::class, Library::class,
        'city_id', 'library_id', 'id', 'id');
    }
}
