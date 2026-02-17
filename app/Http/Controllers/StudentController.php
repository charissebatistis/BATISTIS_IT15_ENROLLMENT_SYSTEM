<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::with('courses')->get();

        return view('students.index', compact('students'));
    }



    public function create()
    {
        return view('students.create');
    }

   
    public function store(Request $request)
    {
        $request->validate([
            'student_number' => 'required|unique:students',
            'first_name'     => 'required',
            'last_name'      => 'required',
            'email'          => 'required|email|unique:students'
        ]);

        Student::create([
            'student_number' => $request->student_number,
            'first_name'     => $request->first_name,
            'last_name'      => $request->last_name,
            'email'          => $request->email,
        ]);

        return redirect()->route('students.index')
            ->with('success', 'Student created successfully.');
    }

    public function show(Student $student)
    {
        $student->load('courses');

        return view('students.show', compact('student'));
    }
}
