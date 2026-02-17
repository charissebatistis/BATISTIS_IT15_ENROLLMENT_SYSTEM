<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Academic Portal - Courses</title>
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
        <div class="flex justify-between items-end mb-10">
            <div>
                <h1 class="text-2xl font-extrabold text-slate-900 tracking-tight">Course Catalog</h1>
                <p class="text-slate-500 mt-2 font-medium">Manage academic offerings and student capacities.</p>
            </div>
            <a href="{{ route('courses.create') }}" class="bg-indigo-600 text-white px-6 py-3.5 rounded-2xl font-bold hover:bg-indigo-700 transition-all shadow-xl shadow-indigo-100 flex items-center gap-2 active:scale-95">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
                Add New Course
            </a>
        </div>

        @if(session('success'))
            <div class="mb-6 bg-emerald-50 border border-emerald-100 text-emerald-700 px-6 py-4 rounded-2xl font-bold text-sm">
                {{ session('success') }}
            </div>
        @endif

        <div class="bg-white border border-slate-100 shadow-2xl shadow-slate-200/50 rounded-[2.5rem] overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="bg-slate-50/50 border-b border-slate-100">
                            <th class="px-8 py-5 text-xs font-bold uppercase tracking-wider text-slate-400">Code</th>
                            <th class="px-8 py-5 text-xs font-bold uppercase tracking-wider text-slate-400">Course Name</th>
                            <th class="px-8 py-5 text-xs font-bold uppercase tracking-wider text-slate-400 text-center">Capacity</th>
                            <th class="px-8 py-5 text-xs font-bold uppercase tracking-wider text-slate-400 text-right">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-50">
                        @forelse($courses as $course)
                            <tr class="group hover:bg-slate-50/80 transition-all duration-200">
                                <td class="px-8 py-6 font-bold text-indigo-600 tracking-tight">{{ $course->course_code }}</td>
                                <td class="px-8 py-6">
                                    <div class="text-sm font-semibold text-slate-700">{{ $course->course_name }}</div>
                                </td>
                                <td class="px-8 py-6">
                                    <div class="flex flex-col items-center gap-1.5">
                                        <div class="w-32 bg-slate-100 h-2 rounded-full overflow-hidden">
                                            @php
                                                $percentage = ($course->students->count() / $course->capacity) * 100;
                                                $color = $percentage >= 100 ? 'bg-rose-500' : ($percentage >= 80 ? 'bg-amber-500' : 'bg-emerald-500');
                                            @endphp
                                            <div class="{{ $color }} h-full transition-all duration-500" style="width: {{ min($percentage, 100) }}%"></div>
                                        </div>
                                        <span class="text-[10px] font-bold uppercase tracking-widest text-slate-400">
                                            {{ $course->students->count() }} / {{ $course->capacity }} Enrolled
                                        </span>
                                    </div>
                                </td>
                                <td class="px-8 py-6 text-right">
                                    <a href="{{ route('courses.show', $course->id) }}" class="inline-flex items-center text-sm font-bold text-slate-400 hover:text-indigo-600 transition-colors group/link">
                                        View Details
                                        <svg class="w-4 h-4 ml-1 group-hover/link:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                                    </a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="px-8 py-20 text-center">
                                    <div class="text-slate-300 mb-4">
                                        <svg class="w-16 h-16 mx-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.75 0 3.412.477 4.5 1.253v13c-1.168-.776-2.832-1.253-4.5-1.253-1.746 0-3.332.477-4.5 1.253"></path></svg>
                                    </div>
                                    <p class="text-slate-400 font-medium">No courses available. Start by adding one!</p>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </main>

</body>
</html>

