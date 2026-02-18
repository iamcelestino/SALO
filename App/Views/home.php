<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Salo|encontre biscatos aqui</title>
    <style>
        html { scroll-behavior: smooth; }
    </style>
</head>
<body class="bg-gray-50 font-sans text-gray-900">

    <nav class="bg-white border-b border-gray-100 py-4 px-6 flex justify-between items-center sticky top-0 z-50">
        <div class="text-2xl font-bold text-emerald-600 tracking-tight">Salo</div>
        <div class="space-x-8 hidden md:flex font-medium text-gray-600">
            <a href="#" class="hover:text-emerald-600 transition">Find Jobs</a>
            <a href="#" class="hover:text-emerald-600 transition">Companies</a>
            <a href="#" class="hover:text-emerald-600 transition">Salaries</a>
        </div>
        <div class="space-x-3">
            <button class="px-4 py-2 text-gray-600 font-medium hover:text-emerald-600">Log in</button>
            <button class="px-5 py-2 bg-emerald-600 text-white rounded-lg font-medium hover:bg-emerald-700 transition shadow-md shadow-emerald-100">Post a Job</button>
        </div>
    </nav>

    <header class="bg-emerald-700 py-20 px-6 relative overflow-hidden">
        <div class="absolute inset-0 opacity-10">
            <svg class="h-full w-full" fill="currentColor" viewBox="0 0 100 100" preserveAspectRatio="none">
                <path d="M0 0 L100 100 L0 100 Z"></path>
            </svg>
        </div>
        
        <div class="max-w-4xl mx-auto text-center relative z-10">
            <h1 class="text-4xl md:text-6xl font-extrabold text-white mb-6 tracking-tight">Your career starts here.</h1>
            <p class="text-emerald-100 text-lg mb-10 max-w-2xl mx-auto italic">Join 50,000+ professionals growing their careers in the greenest job market.</p>
            
            <div class="bg-white p-2 rounded-2xl shadow-2xl flex flex-col md:flex-row gap-2">
                <div class="flex-1 flex items-center px-4 border-b md:border-b-0 md:border-r border-gray-100">
                    <span class="text-gray-400 mr-2">🔍</span>
                    <input type="text" placeholder="Job title or keyword" class="w-full py-4 outline-none text-gray-700">
                </div>
                <div class="flex-1 flex items-center px-4">
                    <span class="text-gray-400 mr-2">📍</span>
                    <input type="text" placeholder="City or remote" class="w-full py-4 outline-none text-gray-700">
                </div>
                <button class="bg-emerald-600 text-white px-10 py-4 rounded-xl font-bold hover:bg-emerald-500 transition duration-300">Search Jobs</button>
            </div>
        </div>
    </header>

    <section class="max-w-6xl mx-auto py-16 px-6">
        <div class="flex flex-col items-center mb-12">
            <h2 class="text-3xl font-bold text-gray-900 mb-2">Browse by Category</h2>
            <div class="h-1.5 w-12 bg-emerald-500 rounded-full"></div>
        </div>
        <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
            <div class="bg-white p-8 rounded-2xl border border-gray-100 text-center hover:border-emerald-500 hover:shadow-xl hover:-translate-y-1 transition duration-300 cursor-pointer group">
                <div class="text-4xl mb-4 group-hover:scale-110 transition">🌱</div>
                <h3 class="font-bold text-gray-800">Sustainability</h3>
                <p class="text-sm text-emerald-600 mt-1">420 Jobs</p>
            </div>
            <div class="bg-white p-8 rounded-2xl border border-gray-100 text-center hover:border-emerald-500 hover:shadow-xl hover:-translate-y-1 transition duration-300 cursor-pointer group">
                <div class="text-4xl mb-4 group-hover:scale-110 transition">⚡</div>
                <h3 class="font-bold text-gray-800">Engineering</h3>
                <p class="text-sm text-emerald-600 mt-1">1,100 Jobs</p>
            </div>
            <div class="bg-white p-8 rounded-2xl border border-gray-100 text-center hover:border-emerald-500 hover:shadow-xl hover:-translate-y-1 transition duration-300 cursor-pointer group">
                <div class="text-4xl mb-4 group-hover:scale-110 transition">🎨</div>
                <h3 class="font-bold text-gray-800">Creative</h3>
                <p class="text-sm text-emerald-600 mt-1">850 Jobs</p>
            </div>
            <div class="bg-white p-8 rounded-2xl border border-gray-100 text-center hover:border-emerald-500 hover:shadow-xl hover:-translate-y-1 transition duration-300 cursor-pointer group">
                <div class="text-4xl mb-4 group-hover:scale-110 transition">📊</div>
                <h3 class="font-bold text-gray-800">Analysis</h3>
                <p class="text-sm text-emerald-600 mt-1">320 Jobs</p>
            </div>
        </div>
    </section>

    <main class="max-w-6xl mx-auto py-12 px-6">
        <div class="flex flex-col md:flex-row justify-between items-center mb-10 gap-4">
            <h2 class="text-3xl font-bold text-gray-900 tracking-tight">Recently Added</h2>
            <div class="flex gap-3">
                <select class="bg-white border border-gray-200 rounded-lg px-4 py-2 text-sm outline-none focus:ring-2 focus:ring-emerald-500 cursor-pointer">
                    <option>Newest First</option>
                    <option>Salary: High to Low</option>
                </select>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <div class="bg-white p-6 rounded-2xl border border-gray-200 shadow-sm hover:shadow-2xl hover:border-emerald-200 transition duration-300 cursor-pointer group flex flex-col h-full">
                <div class="flex justify-between items-start mb-6">
                    <div class="w-12 h-12 bg-emerald-50 rounded-xl flex items-center justify-center text-emerald-600 font-bold text-xl">N</div>
                    <span class="bg-emerald-50 text-emerald-700 text-xs font-bold px-3 py-1 rounded-full border border-emerald-100">Full-time</span>
                </div>
                <h3 class="font-bold text-xl text-gray-900 group-hover:text-emerald-600 transition">Senior Node.js Developer</h3>
                <p class="text-gray-500 text-sm mt-1">NatureScale • Remote</p>
                
                <div class="flex flex-wrap gap-2 mt-4 flex-grow">
                    <span class="bg-gray-50 text-gray-500 text-[10px] uppercase tracking-wider font-bold px-2 py-1 rounded border">Backend</span>
                    <span class="bg-gray-50 text-gray-500 text-[10px] uppercase tracking-wider font-bold px-2 py-1 rounded border">AWS</span>
                </div>

                <div class="flex justify-between items-center border-t border-gray-100 mt-6 pt-4">
                    <span class="font-bold text-emerald-700 text-lg">$130k - $175k</span>
                    <span class="text-gray-400 text-xs">1 hour ago</span>
                </div>
            </div>

            <div class="bg-white p-6 rounded-2xl border border-gray-200 shadow-sm hover:shadow-2xl hover:border-emerald-200 transition duration-300 cursor-pointer group flex flex-col h-full">
                <div class="flex justify-between items-start mb-6">
                    <div class="w-12 h-12 bg-teal-50 rounded-xl flex items-center justify-center text-teal-600 font-bold text-xl">T</div>
                    <span class="bg-emerald-50 text-emerald-700 text-xs font-bold px-3 py-1 rounded-full border border-emerald-100">Hybrid</span>
                </div>
                <h3 class="font-bold text-xl text-gray-900 group-hover:text-emerald-600 transition">Lead UX Architect</h3>
                <p class="text-gray-500 text-sm mt-1">Terraform Labs • London, UK</p>
                <div class="flex flex-wrap gap-2 mt-4 flex-grow">
                    <span class="bg-gray-50 text-gray-500 text-[10px] uppercase tracking-wider font-bold px-2 py-1 rounded border">UX Research</span>
                </div>
                <div class="flex justify-between items-center border-t border-gray-100 mt-6 pt-4">
                    <span class="font-bold text-emerald-700 text-lg">$110k - $140k</span>
                    <span class="text-gray-400 text-xs">4 hours ago</span>
                </div>
            </div>
        </div>
    </main>

    <section class="max-w-6xl mx-auto px-6 mb-20">
        <div class="bg-emerald-950 py-16 px-10 rounded-[2rem] flex flex-col md:flex-row items-center justify-between gap-10 shadow-2xl relative overflow-hidden">
            <div class="absolute -bottom-10 -left-10 w-64 h-64 bg-emerald-900 rounded-full opacity-30 blur-3xl"></div>
            
            <div class="md:max-w-md relative z-10 text-center md:text-left">
                <h2 class="text-3xl md:text-4xl font-bold text-white mb-4">Grow with JobStream</h2>
                <p class="text-emerald-200/80">Join our weekly newsletter to receive curated job openings and career growth tips.</p>
            </div>
            <div class="flex w-full md:w-auto gap-3 relative z-10">
                <input type="email" placeholder="Your work email" class="flex-1 md:w-80 px-6 py-4 rounded-xl bg-emerald-900/50 border border-emerald-800 text-white placeholder-emerald-400 outline-none focus:ring-2 focus:ring-emerald-500">
                <button class="bg-emerald-500 text-white px-8 py-4 rounded-xl font-bold hover:bg-emerald-400 transition shadow-lg">Join Now</button>
            </div>
        </div>
    </section>

    <footer class="bg-white border-t border-gray-100 pt-16 pb-12">
        <div class="max-w-6xl mx-auto px-6 grid grid-cols-1 md:grid-cols-4 gap-12 mb-16 text-center md:text-left">
            <div class="space-y-4">
                <div class="text-2xl font-bold text-emerald-600">JobStream</div>
                <p class="text-gray-400 text-sm leading-relaxed">Helping you find a career that sustains you and the planet. Established 2026.</p>
            </div>
            <div>
                <h4 class="font-bold mb-6 text-gray-900 uppercase tracking-widest text-[10px]">For Talent</h4>
                <ul class="text-gray-500 space-y-4 text-sm">
                    <li><a href="#" class="hover:text-emerald-600 transition">Job Search</a></li>
                    <li><a href="#" class="hover:text-emerald-600 transition">Salary Guide</a></li>
                    <li><a href="#" class="hover:text-emerald-600 transition">Mentorship</a></li>
                </ul>
            </div>
            <div>
                <h4 class="font-bold mb-6 text-gray-900 uppercase tracking-widest text-[10px]">For Partners</h4>
                <ul class="text-gray-500 space-y-4 text-sm">
                    <li><a href="#" class="hover:text-emerald-600 transition">Hiring Portal</a></li>
                    <li><a href="#" class="hover:text-emerald-600 transition">Job Packs</a></li>
                    <li><a href="#" class="hover:text-emerald-600 transition">API Access</a></li>
                </ul>
            </div>
            <div>
                <h4 class="font-bold mb-6 text-gray-900 uppercase tracking-widest text-[10px]">Legal</h4>
                <ul class="text-gray-500 space-y-4 text-sm">
                    <li><a href="#" class="hover:text-emerald-600 transition">Terms</a></li>
                    <li><a href="#" class="hover:text-emerald-600 transition">Privacy</a></li>
                </ul>
            </div>
        </div>
        <div class="text-center text-gray-300 text-[10px] tracking-widest uppercase">
            &copy; 2026 JobStream — Cultivating Talent.
        </div>
    </footer>

</body>
</html>