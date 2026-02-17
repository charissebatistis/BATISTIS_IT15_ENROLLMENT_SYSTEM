<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Academic Portal - Add Course</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>body { font-family: 'Plus Jakarta Sans', sans-serif; }</style>
</head>
<body class="bg-slate-50 min-h-screen">

    <nav class="bg-white/80 backdrop-blur-md border-b border-slate-200 sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-6 h-16 flex items-center justify-between">
            <a href="/" class="flex items-center gap-2">
                <div class="w-8 h-8 bg-indigo-600 rounded-lg flex items-center justify-center text-white font-bold">A</div>
                <span class="text-lg font-bold text-slate-900 tracking-tight">Academic Portal</span>
            </a>
            <div class="hidden md:flex items-center space-x-2 text-sm font-medium">
                <a href="/" class="px-4 py-2 rounded-lg text-slate-600 hover:bg-slate-50">Home</a>
                <a href="/students" class="px-4 py-2 rounded-lg text-slate-600 hover:bg-slate-50">Students</a>
                <a href="/courses" class="px-4 py-2 rounded-lg bg-indigo-50 text-indigo-600 shadow-sm">Courses</a>
            </div>
        </div>
    </nav>

    <main class="max-w-2xl mx-auto px-6 py-16">
        <div class="bg-white border border-slate-100 shadow-2xl rounded-[2.5rem] p-10">
            
            <header class="text-center mb-10">
                <span class="text-emerald-600 font-bold uppercase tracking-widest text-xs">Curriculum Management</span>
                <h2 class="text-2xl font-extrabold text-slate-900 mt-2">New Course</h2>
                <p class="text-slate-500 mt-3">Define a new course and set its enrollment capacity.</p>
            </header>

            @if($errors->any())
                <div class="mb-8 bg-rose-50 border border-rose-100 text-rose-700 px-6 py-4 rounded-2xl">
                    <ul class="list-disc list-inside text-sm font-bold">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('courses.store') }}" method="POST" class="space-y-6">
                @csrf
                
                <div class="space-y-2">
                    <label class="text-sm font-bold text-slate-700 ml-1">Course Code</label>
                    <input type="text" name="course_code" value="{{ old('course_code') }}" required 
                        class="w-full bg-slate-50 border border-slate-200 rounded-2xl p-4 outline-none focus:ring-4 focus:ring-emerald-100 focus:border-emerald-500 transition-all font-medium" 
                        placeholder="e.g. CS101">
                </div>

                <div class="space-y-2">
                    <label class="text-sm font-bold text-slate-700 ml-1">Course Name</label>
                    <input type="text" name="course_name" value="{{ old('course_name') }}" required 
                        class="w-full bg-slate-50 border border-slate-200 rounded-2xl p-4 outline-none focus:ring-4 focus:ring-emerald-100 focus:border-emerald-500 transition-all font-medium" 
                        placeholder="e.g. Introduction to Programming">


                <div class="space-y-2">
                    <label class="text-sm font-bold text-slate-700 ml-1">Max Capacity</label>
                    <input type="number" name="capacity" value="{{ old('capacity') }}" required min="1"
                        class="w-full bg-slate-50 border border-slate-200 rounded-2xl p-4 outline-none focus:ring-4 focus:ring-emerald-100 focus:border-emerald-500 transition-all font-medium" 
                        placeholder="e.g. 30">
                </div>

                <button type="submit" 
                    class="w-full bg-emerald-500 text-white font-extrabold py-5 rounded-2xl shadow-xl shadow-emerald-100 hover:bg-emerald-600 hover:-translate-y-1 transition-all active:scale-95 mt-4">
                    Create Course
                </button>
                
                <a href="/courses" class="block text-center text-slate-400 font-bold text-sm hover:text-slate-600 mt-4">Cancel and go back</a>
            </form>
        </div>
    </main>
</body>
</html>

