<div class="hidden md:flex items-center space-x-2 text-sm font-medium">

    <a href="/" 
       class="px-4 py-2 rounded-lg transition-all duration-200
       {{ request()->is('/') ? 'bg-indigo-50 text-indigo-600 shadow-sm' : 'text-slate-600 hover:text-indigo-600 hover:bg-slate-50' }}">
        Home
    </a>

    <a href="/students" 
       class="px-4 py-2 rounded-lg transition-all duration-200 
       {{ request()->is('students*') ? 'bg-indigo-50 text-indigo-600 shadow-sm' : 'text-slate-600 hover:text-indigo-600 hover:bg-slate-50' }}">
        Students List
    </a>

    <a href="/courses" 
       class="px-4 py-2 rounded-lg transition-all duration-200 
       {{ request()->is('courses*') ? 'bg-indigo-50 text-indigo-600 shadow-sm' : 'text-slate-600 hover:text-indigo-600 hover:bg-slate-50' }}">
        Courses List
    </a>

    <a href="/enroll" 
       class="ml-4 px-5 py-2 rounded-full transition-all duration-200 shadow-md active:scale-95
       {{ request()->is('enroll*') ? 'bg-indigo-700 text-white' : 'bg-indigo-600 text-white hover:bg-indigo-700' }}">
        Enroll Now
    </a>

</div>
