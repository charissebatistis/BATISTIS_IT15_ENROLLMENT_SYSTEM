<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Course;
use Illuminate\Http\Request;

class EnrollmentController extends Controller
{
    public function index()
    {
        $courses = Course::all();
        return view('enroll', compact('courses'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email',
            'student_number' => 'required|string',
            'course_id' => 'required|exists:courses,id',
        ]);

        $student = Student::query()
            ->where('email', $validated['email'])
            ->orWhere('student_number', $validated['student_number'])
            ->first();

        if ($student) {
            if ($student->email !== $validated['email'] || $student->student_number !== $validated['student_number']) {
                return back()->withInput()->with('error', 'Email or student number already belongs to another student.');
            }
        } else {
            $student = Student::create([
                'first_name' => $validated['first_name'],
                'last_name' => $validated['last_name'],
                'email' => $validated['email'],
                'student_number' => $validated['student_number'],
            ]);
        }

        $course = Course::findOrFail($validated['course_id']);

        if ($student->courses()->where('course_id', $course->id)->exists()) {
            return back()->with('error', 'Student already enrolled in this course.');
        }

        if ($course->students()->count() >= $course->capacity) {
            return back()->with('error', 'Course is full.');
        }

        $student->courses()->attach($course->id);

        return back()->with('success', 'Enrollment successful!');
    }

    public function create()
    {
        $courses = Course::all();
        return view('enroll', compact('courses'));
    }

    public function unenroll(Student $student, Course $course)
    {
        $student->courses()->detach($course->id);

        return back()->with('success', 'Student unenrolled successfully.');
    }

    public function enroll(Student $student, Course $course)
    {
        if ($student->courses()->where('course_id', $course->id)->exists()) {
            return back()->with('error', 'Student already enrolled in this course.');
        }

        if ($course->students()->count() >= $course->capacity) {
            return back()->with('error', 'Course is full.');
        }

        $student->courses()->attach($course->id);

        return back()->with('success', 'Enrollment successful!');
    }
}
