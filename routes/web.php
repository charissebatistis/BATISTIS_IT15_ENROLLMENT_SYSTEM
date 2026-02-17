<?php

use App\Http\Controllers\StudentController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\EnrollmentController;
use Illuminate\Support\Facades\Route;

// Dashboard / Welcome
Route::get('/', function () {
    return view('welcome');
})->name('home');

// Student Routes
Route::get('/students', [StudentController::class, 'index'])->name('students.index');
Route::get('/students/{student}', [StudentController::class, 'show'])->name('students.show');
Route::get('/students/create', [StudentController::class, 'create'])->name('students.create');
Route::post('/students', [StudentController::class, 'store'])->name('students.store');

// Course Routes
Route::get('/courses', [CourseController::class, 'index'])->name('courses.index');
Route::get('/courses/create', [CourseController::class, 'create'])->name('courses.create');
Route::get('/courses/{course}', [CourseController::class, 'show'])->name('courses.show');
Route::post('/courses', [CourseController::class, 'store'])->name('courses.store');

// Enrollment Routes
Route::get('/enroll', [EnrollmentController::class, 'index'])->name('enrollment.form');
Route::post('/enroll', [EnrollmentController::class, 'store'])->name('enroll.store');
Route::post('/enroll/{student}/{course}', [EnrollmentController::class, 'enroll'])->name('enroll');
Route::post('/unenroll/{student}/{course}', [EnrollmentController::class, 'unenroll'])->name('unenroll');
