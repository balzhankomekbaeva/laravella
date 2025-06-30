<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class TestController extends Controller
{
    public function testRelations()
    {
        $students = Student::with(['grades', 'latestGrade', 'firstGrade', 'highestGrade', 'latestValidGrade'])->first();
        return $students;
    }
}
