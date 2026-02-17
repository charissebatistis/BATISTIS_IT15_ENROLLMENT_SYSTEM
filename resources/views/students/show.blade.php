<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Academic Portal - Student Profile</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>body { font-family: 'Plus Jakarta Sans', sans-serif; }</style>
</head>
<body class="bg-slate-50 min-h-screen">

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
            <a href="/" class="px-4 py-2 rounded-lg text-slate-600 hover:text-indigo-600 hover:bg-slate-50 transition">
                Home
            </a>
            <a href="/students" class="px-4 py-2 rounded-lg bg-indigo-50 text-indigo-600 shadow-sm">
                Students
            </a>
            <a href="/courses" class="px-4 py-2 rounded-lg text-slate-600 hover:text-indigo-600 hover:bg-slate-50 transition">
                Courses
            </a>
            <a href="/enroll" class="ml-4 bg-indigo-600 text-white px-5 py-2 rounded-full hover:bg-indigo-700 transition shadow-md shadow-indigo-100">
                Enroll Now
            </a>
        </div>
    </div>
</nav>

<main class="max-w-7xl mx-auto px-6 py-12">
    <div class="flex flex-col md:flex-row md:items-center justify-between gap-6 mb-10">
        <div>
            <h1 class="text-2xl font-extrabold text-slate-900 tracking-tight">
                {{ $student->first_name }} {{ $student->last_name }}
            </h1>
            <p class="text-slate-500 mt-2 text-base">Student profile and enrollment management.</p>
        </div>
        <a href="/students" class="bg-white border border-slate-200 text-slate-700 px-6 py-3.5 rounded-2xl font-bold hover:bg-slate-50 transition-all">
            Back to Students
        </a>
    </div>

    <div class="bg-white border border-slate-100 shadow-2xl shadow-slate-200/50 rounded-[2.5rem] overflow-hidden">
        <div class="px-10 py-8 border-b border-slate-100">
            <div class="grid md:grid-cols-2 gap-6">
                <div>
                    <p class="text-xs font-bold uppercase tracking-wider text-slate-400">Student Number</p>
                    <p class="text-base font-semibold text-slate-800 mt-2">{{ $student->student_number }}</p>
                </div>
                <div>
                    <p class="text-xs font-bold uppercase tracking-wider text-slate-400">Email</p>
                    <p class="text-base font-semibold text-slate-800 mt-2">{{ $student->email }}</p>
                </div>
            </div>
        </div>

        <div class="px-10 py-8">
            <div class="mb-8">
                <h2 class="text-lg font-bold text-slate-900">Enrolled Courses</h2>
                <p class="text-slate-500 mt-1">Courses this student is currently enrolled in.</p>
            </div>

            <div class="border border-slate-100 rounded-[2rem] overflow-hidden">
                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="bg-slate-50/50 border-b border-slate-100">
                                <th class="px-8 py-5 text-xs font-bold uppercase tracking-wider text-slate-400">Course Name</th>
                                <th class="px-8 py-5 text-xs font-bold uppercase tracking-wider text-slate-400 text-right">Action</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-50">
                            @forelse($student->courses as $course)
                                <tr class="hover:bg-slate-50/80 transition-all duration-200">
                                    <td class="px-8 py-6 text-sm font-semibold text-slate-700">{{ $course->course_name }}</td>
                                    <td class="px-8 py-6 text-right">
                                        <form action="{{ route('unenroll', [$student->id, $course->id]) }}" method="POST">
                                            @csrf
                                            <button class="px-4 py-2 text-sm font-bold text-white bg-rose-500 rounded-xl hover:bg-rose-600 transition">
                                                Unenroll
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="2" class="px-8 py-10 text-center text-slate-400 text-sm">
                                        No enrolled courses.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="mt-12 mb-8">
                <h2 class="text-lg font-bold text-slate-900">Enroll in New Course</h2>
                <p class="text-slate-500 mt-1">Available courses not yet enrolled.</p>
            </div>

            <div class="border border-slate-100 rounded-[2rem] overflow-hidden">
                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="bg-slate-50/50 border-b border-slate-100">
                                <th class="px-8 py-5 text-xs font-bold uppercase tracking-wider text-slate-400">Course Name</th>
                                <th class="px-8 py-5 text-xs font-bold uppercase tracking-wider text-slate-400">Status</th>
                                <th class="px-8 py-5 text-xs font-bold uppercase tracking-wider text-slate-400 text-right">Action</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-50">
                            @php($hasAvailable = false)
                            @foreach(\App\Models\Course::all() as $course)
                                @if(!$student->courses->contains($course->id))
                                    @php($hasAvailable = true)
                                    <tr class="hover:bg-slate-50/80 transition-all duration-200">
                                        <td class="px-8 py-6 text-sm font-semibold text-slate-700">{{ $course->course_name }}</td>
                                        <td class="px-8 py-6">
                                            @if($course->students->count() >= $course->capacity)
                                                <span class="text-xs font-bold px-2.5 py-1 rounded-full bg-rose-100 text-rose-600">Full</span>
                                            @else
                                                <span class="text-xs font-bold px-2.5 py-1 rounded-full bg-emerald-100 text-emerald-700">Available</span>
                                            @endif
                                        </td>
                                        <td class="px-8 py-6 text-right">
                                            <form action="{{ route('enroll', [$student->id, $course->id]) }}" method="POST">
                                                @csrf
                                                <button class="px-4 py-2 text-sm font-bold text-white bg-indigo-600 rounded-xl hover:bg-indigo-700 transition disabled:opacity-50 disabled:cursor-not-allowed"
                                                    @if($course->students->count() >= $course->capacity) disabled @endif>
                                                    Enroll
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endif
                            @endforeach
                            @if(!$hasAvailable)
                                <tr>
                                    <td colspan="3" class="px-8 py-10 text-center text-slate-400 text-sm">
                                        No available courses to enroll.
                                    </td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</main>

<footer class="py-12 text-center text-slate-400 text-sm">
    &copy; 2026 Academic Portal System. Built for efficiency.
</footer>

</body>
</html>

