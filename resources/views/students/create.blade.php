@extends('layouts.app')

@section('content')

<div class="card shadow">
    <div class="card-header bg-primary text-white">
        Add Student
    </div>

    <div class="card-body">

        <form method="POST" action="{{ route('students.store') }}">
            @csrf

            <div class="mb-3">
                <label>Student Number</label>
                <input type="text" name="student_number" class="form-control">
            </div>

            <div class="mb-3">
                <label>First Name</label>
                <input type="text" name="first_name" class="form-control">
            </div>

            <div class="mb-3">
                <label>Last Name</label>
                <input type="text" name="last_name" class="form-control">
            </div>

            <div class="mb-3">
                <label>Email</label>
                <input type="email" name="email" class="form-control">
            </div>

            <button class="btn btn-primary">Save</button>
        </form>

    </div>
</div>

@endsection
