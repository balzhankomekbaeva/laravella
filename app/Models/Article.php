<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    public function reviews()
    {
        return $this->morphMany(Review::class, 'reviewable');
    }

    public function latestReview()
    {
        return $this->morphOne(Review::class, 'reviewable')->latestOfMany();
    }
    public function oldestReview()
    {
        return $this->morphOne(Review::class, 'reviewable')->oldestOfMany();
    }
}
