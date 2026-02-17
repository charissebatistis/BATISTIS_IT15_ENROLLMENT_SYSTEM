<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Academic Portal - Enrollment System</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <style> body { font-family: 'Plus Jakarta Sans', sans-serif; } </style>
</head>
<body class="bg-slate-50 min-h-screen flex flex-col">

    <nav class="bg-white/80 backdrop-blur-md border-b border-slate-200 sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-6 h-16 flex items-center justify-between">
            
            <div class="flex items-center gap-2">
                <div class="w-8 h-8 bg-indigo-600 rounded-lg flex items-center justify-center text-white font-bold">A</div>
                <span class="text-lg font-bold text-slate-900 tracking-tight">Academic Portal</span>
            </div>

            <div class="hidden md:flex items-center space-x-2 text-sm font-medium">
                <a href="/" 
                   class="px-4 py-2 rounded-lg transition-all duration-200 
                   {{ request()->is('/') ? 'bg-indigo-50 text-indigo-600 shadow-sm' : 'text-slate-600 hover:text-indigo-600 hover:bg-slate-50' }}">
                    Home
                </a>

            </div>
        </div>
    </nav>

    <main class="flex-grow flex items-center justify-center px-6 py-20 relative">
        <div class="max-w-3xl w-full text-center">
            <span class="inline-block px-4 py-1.5 mb-6 text-xs font-bold tracking-widest text-indigo-600 uppercase bg-indigo-50 rounded-full">
                Streamlined Academic Management
            </span>
            
            <h1 class="text-3xl md:text-4xl font-extrabold text-slate-900 mb-6 leading-tight">
                Welcome to the <br><span class="text-indigo-600">Enrollment System</span>
            </h1>
            
            <div class="flex flex-wrap justify-center gap-4">
                <a href="/students" class="bg-indigo-600 text-white px-8 py-4 rounded-2xl font-bold shadow-lg hover:bg-indigo-700 hover:-translate-y-1 transition-all">
                    View Students
                </a>
                <a href="/courses" class="bg-white border border-slate-200 text-slate-700 px-8 py-4 rounded-2xl font-bold hover:bg-slate-50 hover:-translate-y-1 transition-all">
                    View Courses
                </a>
                <a href="/enroll" class="bg-emerald-500 text-white px-8 py-4 rounded-2xl font-bold shadow-lg hover:bg-emerald-600 hover:-translate-y-1 transition-all">
                    Enroll Now
                </a>
            </div>
        </div>
    </main>

    <footer class="py-8 text-center text-slate-400 text-sm">
        &copy; 2026 Academic Portal System.
    </footer>

</body>
</html>


