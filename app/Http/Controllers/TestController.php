<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\City;
use App\Models\Product;
use App\Models\Review;
use App\Models\Student;
use App\Models\Tag;
use App\Models\Teacher;
use App\Models\User;
use Illuminate\Http\Request;

class TestController extends Controller
{
    public function testRelations()
    {
        $user = User::first();
        $product = Product::first();
        $userTags = $user->tags()->pluck('name')->toArray();
        $productTags = $product->tags()->pluck('name')->toArray();

        print_r($userTags);
        print_r($productTags);
    }
}
