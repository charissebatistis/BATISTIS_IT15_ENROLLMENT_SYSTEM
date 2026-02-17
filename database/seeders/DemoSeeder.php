<?php

namespace Database\Seeders;

use App\Models\Student;
use App\Models\Course;
use Illuminate\Database\Seeder;

class DemoSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Create a Course first
        $course = Course::create([
            'course_code' => 'CS101',
            'course_name' => 'Computer Science 1',
            'capacity'    => 5
        ]);

        // 2. Create a Student
        $student = Student::create([
            'student_number' => '2024-001',
            'first_name'     => 'Chang',
            'last_name'      => 'Batistis',
            'email'          => 'batistis@example.com',
        ]);

        // 3. Link them (This puts the data in the enrollment pivot table)
        $student->courses()->attach($course->id);
    }
}