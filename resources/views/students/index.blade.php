<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Academic Portal - Student List</title>
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
            <a href="/" 
               class="px-4 py-2 rounded-lg text-slate-600 hover:text-indigo-600 hover:bg-slate-50 transition">
                Home
            </a>

            <a href="/students" 
               class="px-4 py-2 rounded-lg bg-indigo-50 text-indigo-600 shadow-sm">
                Students
            </a>

            <a href="/courses" 
               class="px-4 py-2 rounded-lg text-slate-600 hover:text-indigo-600 hover:bg-slate-50 transition">
                Courses
            </a>

            <a href="/enroll" 
               class="ml-4 bg-indigo-600 text-white px-5 py-2 rounded-full hover:bg-indigo-700 transition shadow-md shadow-indigo-100">
                Enroll Now
            </a>
        </div>
    </div>
</nav>


    <main class="max-w-7xl mx-auto px-6 py-12">
        
        <div class="flex flex-col md:flex-row md:items-center justify-between gap-6 mb-10">
            <div>
                <h1 class="text-2xl font-extrabold text-slate-900 tracking-tight">Student List</h1>
            </div>
            
          <a href="{{ route('students.create') }}" 
          class="bg-indigo-600 text-white px-6 py-3.5 rounded-2xl font-bold hover:bg-indigo-700 transition-all shadow-xl shadow-indigo-100 flex items-center gap-2 active:scale-95">
    
         <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
        </svg>
 
        Add New Student
      </a>


        </div>

        <div class="bg-white border border-slate-100 shadow-2xl shadow-slate-200/50 rounded-[2.5rem] overflow-hidden">
    <div class="overflow-x-auto">
        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="bg-slate-50/50 border-b border-slate-100">
                    <th class="px-8 py-5 text-xs font-bold uppercase tracking-wider text-slate-400">Student Number</th>
                    <th class="px-8 py-5 text-xs font-bold uppercase tracking-wider text-slate-400">Full Name</th>
                    <th class="px-8 py-5 text-xs font-bold uppercase tracking-wider text-slate-400">Email Address</th>
                    <th class="px-8 py-5 text-xs font-bold uppercase tracking-wider text-slate-400">Enrolled Courses</th>
                    <th class="px-8 py-5 text-xs font-bold uppercase tracking-wider text-slate-400 text-center">View Profile</th>
                </tr>
            </thead>
                   <tbody class="divide-y divide-slate-50">
    @forelse($students as $student)
        <tr class="group hover:bg-slate-50/80 transition-all duration-200 cursor-pointer"
            data-href="{{ route('students.show', $student->id) }}"
            onclick="window.location=this.dataset.href"
            role="link"
            tabindex="0"
            onkeypress="if(event.key==='Enter'){window.location=this.dataset.href}">
            <td class="px-8 py-6 font-bold text-indigo-600 tracking-tight">{{ $student->student_number }}</td>
            <td class="px-8 py-6">
                <div class="text-sm font-semibold text-slate-700">{{ $student->first_name }} {{ $student->last_name }}</div>
            </td>
            <td class="px-8 py-6 text-sm text-slate-500">{{ $student->email }}</td>
            <td class="px-8 py-6 text-sm text-slate-600">
                @forelse($student->courses as $course)
                    <span class="inline-block bg-indigo-100 text-indigo-700 text-xs font-semibold px-3 py-1 rounded-full mr-1">
                        {{ $course->course_name }}
                    </span>
                @empty
                    <span class="text-slate-400 text-sm">Not enrolled</span>
                @endforelse
            </td>
            <td class="px-8 py-6 text-right">
                <a href="{{ route('students.show', $student->id) }}"
                   class="inline-flex items-center text-sm font-bold text-slate-400 hover:text-indigo-600 transition-colors group/link">
                    View Profile
                    <svg class="w-4 h-4 ml-1 group-hover/link:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                    </svg>
                </a>
            </td>
        </tr>
    @empty
        <tr>
            <td colspan="5" class="px-8 py-20 text-center">
                <div class="text-slate-300 mb-4">
                    <svg class="w-16 h-16 mx-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                    </svg>
                </div>
                <p class="text-slate-400 font-medium">No students found in the database.</p>
                <a href="/students/create" class="text-indigo-600 font-bold hover:underline">Register the first student -></a>
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


