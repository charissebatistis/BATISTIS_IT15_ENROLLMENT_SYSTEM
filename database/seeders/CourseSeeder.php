<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Course;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Using insert for bulk performance or create for model events
        Course::insert([
            [
                'course_code' => 'CS101', 
                'course_name' => 'Computer Science 1', 
                'capacity'    => 5, 
                'created_at'  => now(), 
                'updated_at'  => now()
            ],
            [
                'course_code' => 'IT202', 
                'course_name' => 'Information Technology 2', 
                'capacity'    => 30, 
                'created_at'  => now(), 
                'updated_at'  => now()
            ],
            [
                'course_code' => 'WEB301', 
                'course_name' => 'Web Design & Dev', 
                'capacity'    => 20, 
                'created_at'  => now(), 
                'updated_at'  => now()
            ],
            [
                'course_code' => 'NET404', 
                'course_name' => 'Networking Basics', 
                'capacity'    => 15, 
                'created_at'  => now(), 
                'updated_at'  => now()
            ],
        ]);
    }
}