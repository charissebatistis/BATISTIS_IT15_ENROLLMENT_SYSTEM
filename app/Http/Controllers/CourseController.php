<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course; 

class CourseController extends Controller
{
    public function index()
    {
        $courses = Course::with('students')->orderBy('course_code', 'asc')->get();

        return view('courses.index', compact('courses'));
    }

    public function show(Course $course)
    {
        $course->load('students');

        return view('courses.show', compact('course'));
    }

    public function create()
    {
        return view('courses.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'course_code' => 'required|string|max:20|unique:courses,course_code',
            'course_name' => 'required|string|max:255',
            'capacity' => 'required|integer|min:1',
        ]);

        Course::create($validated);

        return redirect()->route('courses.index')->with('success', 'Course created successfully!');
    }
}
