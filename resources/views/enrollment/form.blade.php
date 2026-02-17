<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Academic Portal | Enroll</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>body { font-family: 'Plus Jakarta Sans', sans-serif; }</style>
</head>
<body class="bg-slate-50 min-h-screen py-10">

    <div class="max-w-2xl mx-auto px-4">
        
        @if ($errors->any())
            <div class="mb-6 p-4 bg-red-50 border-l-4 border-red-500 text-red-700 rounded-r-lg shadow-sm">
                <p class="font-bold">Please fix the following:</p>
                <ul class="list-disc ml-5 mt-1 text-sm">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="bg-white rounded-2xl shadow-xl overflow-hidden border border-slate-200">
            <div class="bg-indigo-600 p-6 text-white text-center">
                <h1 class="text-lg font-bold uppercase tracking-wider">Student Enrollment</h1>
                <p class="text-indigo-100 text-sm mt-1">Register for the 2026 Academic Year</p>
            </div>

            <form action="{{ route('enrollment.submit') }}" method="POST" class="p-8 space-y-6">
                @csrf

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="md:col-span-2">
                        <label class="block text-xs font-bold text-slate-500 uppercase mb-2">Student Number</label>
                        <input type="text" name="student_number" value="{{ old('student_number') }}" 
                               class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:bg-white transition outline-none">
                    </div>

                    <div>
                        <label class="block text-xs font-bold text-slate-500 uppercase mb-2">First Name</label>
                        <input type="text" name="first_name" value="{{ old('first_name') }}" 
                               class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-lg focus:ring-2 focus:ring-indigo-500 outline-none transition">
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-slate-500 uppercase mb-2">Last Name</label>
                        <input type="text" name="last_name" value="{{ old('last_name') }}" 
                               class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-lg focus:ring-2 focus:ring-indigo-500 outline-none transition">
                    </div>

                    <div class="md:col-span-2">
                        <label class="block text-xs font-bold text-slate-500 uppercase mb-2">Email Address</label>
                        <input type="email" name="email" value="{{ old('email') }}" 
                               class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-lg focus:ring-2 focus:ring-indigo-500 outline-none transition">
                    </div>

                    <div class="md:col-span-2">
                        <label class="block text-xs font-bold text-slate-500 uppercase mb-3">Choose Your Courses</label>
                        <div class="grid gap-3">
                            @foreach($courses as $course)
                                <label class="flex items-center p-4 border rounded-xl hover:bg-indigo-50 cursor-pointer group transition">
                                    <input type="checkbox" name="courses[]" value="{{ $course->id }}" 
                                           class="w-5 h-5 rounded border-slate-300 text-indigo-600 focus:ring-indigo-500">
                                    <div class="ml-4">
                                        <span class="block text-sm font-bold text-slate-700 group-hover:text-indigo-600 transition">{{ $course->name }}</span>
                                        <span class="text-xs text-slate-400 italic">Remaining: {{ $course->capacity - $course->students_count }}</span>
                                    </div>
                                </label>
                            @endforeach
                        </div>
                    </div>
                </div>

                <button type="submit" class="w-full bg-indigo-600 text-white font-bold py-4 rounded-xl shadow-lg shadow-indigo-200 hover:bg-indigo-700 active:scale-[0.99] transition transform">
                    Register Student Now
                </button>
            </form>
        </div>
    </div>

</body>
</html>

