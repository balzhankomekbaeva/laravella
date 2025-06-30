<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Student extends Model
{

    use HasFactory;
    protected $fillable = ['name'];

    public function latestGrade(): HasOne
    {
        return $this->hasOne(Grade::class)->latestOfMany();
    }

    public function firstGrade(): HasOne
    {
        return $this->hasOne(Grade::class)->oldestOfMany();
    }

    public function highestGrade(): HasOne
    {
        return $this->hasOne(Grade::class)->ofMany('score', 'max');
    }

    public function latestValidGrade()
    {
        return $this->hasOne(Grade::class)->ofMany(['score'=>'min'], function ($query) {
            $query->where('received_at', '<=', Carbon::parse('2023-07-01'));
        });
    }

    public function grades(): HasMany
    {
        return $this->hasMany(Grade::class);
    }
}
