<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Student;
use App\Models\Teacher;
use Illuminate\Http\Request;

class TestController extends Controller
{
    public function testRelations()
    {

        $city = City::first();
        $books = $city->books;
        dd($books);





//        $teacher = Teacher::find(1);
//        $monitor = $teacher->monitor;
//
//        dd($monitor);
    }
}
