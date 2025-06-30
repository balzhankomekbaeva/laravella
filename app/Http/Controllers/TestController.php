<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\City;
use App\Models\Review;
use App\Models\Student;
use App\Models\Teacher;
use App\Models\User;
use Illuminate\Http\Request;

class TestController extends Controller
{
    public function testRelations()
    {
        $article = Article::first();
        dd($article->oldestReview);
    }
}
