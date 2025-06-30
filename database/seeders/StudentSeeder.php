<?php

namespace Database\Seeders;

use App\Models\Student;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $student = Student::create(['name' => 'Balzhan']);

        $student->grades()->createMany([
            ['score'=>100, 'received_at'=>Carbon::parse('2023-10-09')],
            ['score'=>95, 'received_at'=>Carbon::parse('2023-12-09')],
            ['score'=>70, 'received_at'=>Carbon::parse('2023-08-05')],
            ['score'=>85, 'received_at'=>Carbon::parse('2023-07-01')]
        ]);
    }
}
