<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Academic Portal - Enroll</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
        .bg-gradient-mesh {
            background-color: #ffffff;
            background-image: radial-gradient(at 0% 0%, rgba(219, 234, 254, 0.5) 0, transparent 50%), 
                              radial-gradient(at 100% 100%, rgba(236, 254, 255, 0.5) 0, transparent 50%);
        }
    </style>
</head>
<body class="bg-gradient-mesh min-h-screen text-gray-900">
    <nav class="bg-white/80 backdrop-blur-md border-b border-slate-200 sticky top-0 z-50">
    <div class="max-w-7xl mx-auto px-6 h-16 flex items-center justify-between">
        <a href="/" class="flex items-center gap-2 group">
            <div class="w-8 h-8 bg-indigo-600 rounded-lg flex items-center justify-center text-white font-bold group-hover:scale-105 transition-transform">
                A
            </div>
            <span class="text-lg font-bold text-slate-900 tracking-tight">
                Academic Portal
            </span>
        </a>

        <div class="hidden md:flex items-center space-x-2 text-sm font-medium">
            <a href="/" 
               class="px-4 py-2 rounded-lg text-slate-600 hover:text-indigo-600 hover:bg-slate-50 transition">
                Home
            </a>

            <a href="/students" 
               class="px-4 py-2 rounded-lg text-slate-600 hover:text-indigo-600 hover:bg-slate-50 transition">
                Students
            </a>

            <a href="/courses" 
               class="px-4 py-2 rounded-lg text-slate-600 hover:text-indigo-600 hover:bg-slate-50 transition">
                Courses
            </a>

            <a href="/enroll" 
               class="ml-4 bg-indigo-600 text-white px-5 py-2 rounded-full shadow-md shadow-indigo-100">
                Enroll Now
            </a>
        </div>
    </div>
</nav>


<div class="max-w-2xl mx-auto mt-24 mb-20 px-4">
    <div class="bg-white/80 backdrop-blur-xl border border-white shadow-2xl rounded-3xl p-8 md:p-12">
        
        <header class="mb-10 text-center">
            <span class="text-indigo-600 font-bold uppercase tracking-widest text-xs">New Registration</span>
            <h2 class="text-2xl font-extrabold text-gray-900 mt-2">Enroll in a Course</h2>
            <p class="text-gray-500 mt-3">Please provide your details to join our academic community.</p>
        </header>

        @if(session('success'))
            <div class="mb-8 flex items-center bg-emerald-50 border border-emerald-100 text-emerald-700 px-4 py-3 rounded-2xl shadow-sm">
                <span class="font-medium">{{ session('success') }}</span>
            </div>
        @endif

        @if(session('error'))
            <div class="mb-8 flex items-center bg-red-50 border border-red-100 text-red-700 px-4 py-3 rounded-2xl shadow-sm">
                <span class="font-medium">{{ session('error') }}</span>
            </div>
        @endif

        <form action="{{ route('enroll.store') }}" method="POST" class="space-y-6">
            @csrf

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="space-y-2">
                    <label class="text-sm font-semibold text-gray-700 ml-1">First Name</label>
                    <input type="text" name="first_name" class="w-full bg-gray-50 border border-gray-200 rounded-2xl p-4 outline-none focus:ring-4 focus:ring-indigo-100 focus:border-indigo-500 transition-all" required>
                </div>
                <div class="space-y-2">
                    <label class="text-sm font-semibold text-gray-700 ml-1">Surname</label>
                    <input type="text" name="last_name" class="w-full bg-gray-50 border border-gray-200 rounded-2xl p-4 outline-none focus:ring-4 focus:ring-indigo-100 focus:border-indigo-500 transition-all" required>
                </div>
            </div>

            <div class="space-y-2">
                <label class="text-sm font-semibold text-gray-700 ml-1">Email Address</label>
                <input type="email" name="email" class="w-full bg-gray-50 border border-gray-200 rounded-2xl p-4 outline-none focus:ring-4 focus:ring-indigo-100 focus:border-indigo-500 transition-all" required>
            </div>

            <div class="space-y-2">
                <label class="text-sm font-semibold text-gray-700 ml-1">Student ID Number</label>
                <input type="text" name="student_number" class="w-full bg-gray-50 border border-gray-200 rounded-2xl p-4 outline-none focus:ring-4 focus:ring-indigo-100 focus:border-indigo-500 transition-all" required>
            </div>

           <div class="space-y-2">
    <label for="course_id" class="block text-sm font-semibold text-gray-700">
        Select Course
    </label>

    <select id="course_id" name="course_id" required
        class="w-full bg-gray-50 border border-gray-300 rounded-2xl px-4 py-3 outline-none focus:ring-4 focus:ring-indigo-100 focus:border-indigo-500">

        <option value="" disabled selected>Choose a Course</option>

        @forelse($courses as $course)
            <option value="{{ $course->id }}">
                {{ $course->course_code }} - {{ $course->course_name }}
            </option>
        @empty
            <option disabled>No courses available</option>
        @endforelse

    </select>
</div>

            <button type="submit" class="w-full bg-indigo-600 text-white font-bold py-4 rounded-2xl shadow-lg shadow-indigo-200 hover:bg-indigo-700 hover:-translate-y-0.5 transition-all duration-200 active:scale-[0.98]">
                Complete Enrollment
            </button>
        </form>
    </div>

    <p class="text-center text-gray-400 text-sm mt-8">© 2026 Academic Portal System. Built for efficiency.</p>
</div>

</body>
</html>

