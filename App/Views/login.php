<?php $this->view('partials/head') ?>
<body>
    <main>
        <div class="min-h-screen bg-gray-50 flex items-center justify-center p-6">
    <div class="max-w-md w-full bg-white rounded-3xl shadow-xl p-10 border border-gray-100">
        <div class="text-center mb-10">
            <div class="text-3xl font-bold text-emerald-600 mb-2">JobStream</div>
            <p class="text-gray-500">Welcome back! Please login.</p>
        </div>

        <form action="/login" method="POST" class="space-y-6">
            <div>
                <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email Address</label>
                <input type="email" name="email" id="email" class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:ring-2 focus:ring-emerald-500 outline-none transition">
            </div>

            <div>
                <label for="password" class="block text-sm font-medium text-gray-700 mb-1">Password</label>
                <input type="password" name="password" id="password" class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:ring-2 focus:ring-emerald-500 outline-none transition">
            </div>

            <button type="submit" class="w-full bg-emerald-600 text-white py-4 rounded-xl font-bold hover:bg-emerald-700 transition shadow-lg">Login</button>
        </form>
        <p class="mt-8 text-center text-sm text-gray-500">New here? <a href="#" class="text-emerald-600 font-bold">Create account</a></p>
    </div>
</div>
    </main>
</body>
</html>