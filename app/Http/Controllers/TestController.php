<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Student;
use App\Models\Teacher;
use App\Models\User;
use Illuminate\Http\Request;

class TestController extends Controller
{
    public function testRelations()
    {
        $user = User::first();
        $image = $user->image;
        dd($image->url);

    }
}
