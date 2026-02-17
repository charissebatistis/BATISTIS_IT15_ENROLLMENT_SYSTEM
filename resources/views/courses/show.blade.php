<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $course->course_name }} - Details</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>body { font-family: 'Plus Jakarta Sans', sans-serif; }</style>
</head>
<body class="bg-slate-50 min-h-screen">

    <nav class="bg-white/80 backdrop-blur-md border-b border-slate-200 sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-6 h-16 flex items-center justify-between">
            <a href="/" class="flex items-center gap-2 group">
                <div class="w-8 h-8 bg-indigo-600 rounded-lg flex items-center justify-center text-white font-bold group-hover:scale-105 transition-transform">A</div>
                <span class="text-lg font-bold text-slate-900 tracking-tight">Academic Portal</span>
            </a>

            <div class="hidden md:flex items-center space-x-2 text-sm font-medium">
                <a href="/" class="px-4 py-2 rounded-lg text-slate-600 hover:text-indigo-600 hover:bg-slate-50 transition">Home</a>
                <a href="/students" class="px-4 py-2 rounded-lg text-slate-600 hover:text-indigo-600 hover:bg-slate-50 transition">Students</a>
                <a href="/courses" class="px-4 py-2 rounded-lg bg-indigo-50 text-indigo-600 shadow-sm">Courses</a>
                <a href="/enroll" class="ml-4 bg-indigo-600 text-white px-5 py-2 rounded-full hover:bg-indigo-700 transition shadow-md shadow-indigo-100">Enroll Now</a>
            </div>
        </div>
    </nav>

    <main class="max-w-7xl mx-auto px-6 py-12">
        
        <div class="mb-10">
            <a href="/courses" class="inline-flex items-center text-indigo-600 font-bold hover:text-indigo-700 transition-colors mb-4 group">
                <svg class="w-4 h-4 mr-2 group-hover:-translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                Back to Course List
            </a>
            <div class="flex items-center justify-between">
                <div>
                    <h1 class="text-2xl font-extrabold text-slate-900 tracking-tight">{{ $course->course_name }}</h1>
                    <p class="text-slate-500 mt-2 text-base font-medium tracking-wide uppercase">{{ $course->course_code }}</p>
                </div>
                <div class="bg-white px-6 py-4 rounded-2xl border border-slate-100 shadow-sm text-right">
                    <span class="block text-xs font-bold text-slate-400 uppercase tracking-widest">Current Enrollment</span>
                    <span class="text-lg font-extrabold text-indigo-600">{{ $course->students->count() }} / {{ $course->capacity }}</span>
                </div>
            </div>
        </div>

        <div class="bg-white border border-slate-100 shadow-2xl shadow-slate-200/50 rounded-[2rem] overflow-hidden">
            <div class="px-8 py-6 border-b border-slate-50">
                <h3 class="text-lg font-bold text-slate-800">Enrolled Students</h3>
            </div>
            
            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="bg-slate-50/50 border-b border-slate-100">
                            <th class="px-8 py-5 text-xs font-bold uppercase tracking-wider text-slate-400">Student Number</th>
                            <th class="px-8 py-5 text-xs font-bold uppercase tracking-wider text-slate-400">Full Name</th>
                            <th class="px-8 py-5 text-xs font-bold uppercase tracking-wider text-slate-400">Email Address</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-50">
                        @forelse($course->students as $student)
                            <tr class="group hover:bg-slate-50/80 transition-all duration-200">
                                <td class="px-8 py-5 text-sm font-bold text-indigo-600">{{ $student->student_number }}</td>
                                <td class="px-8 py-5 text-sm font-semibold text-slate-700">{{ $student->first_name }} {{ $student->last_name }}</td>
                                <td class="px-8 py-5 text-sm text-slate-500">{{ $student->email }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3" class="px-8 py-24 text-center">
                                    <div class="flex flex-col items-center justify-center space-y-3">
                                        <div class="bg-slate-50 p-4 rounded-full text-slate-300">
                                            <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                                        </div>
                                        <p class="text-slate-400 font-medium text-base">No students enrolled in this course yet.</p>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </main>

    <footer class="py-12 text-center text-slate-400 text-sm">
        &copy; 2026 Academic Portal System.
    </footer>

</body>
</html>

