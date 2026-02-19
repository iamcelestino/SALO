<?php $this->view('partials/head') ?>
<body>
    <main>
<div class="min-h-screen bg-gray-50 flex items-center justify-center p-6">
    <div class="max-w-4xl w-full bg-white rounded-3xl shadow-xl overflow-hidden flex flex-col md:flex-row">
        <div class="md:w-1/2 bg-emerald-700 p-12 text-white flex flex-col justify-center">
            <h2 class="text-3xl font-bold mb-4">Junta-te a SALO</h2>
            <p class="text-emerald-100 italic">"The best way to predict the future is to create it."</p>
        </div>

        <div class="md:w-1/2 p-12">
            <h3 class="text-2xl font-bold text-gray-900 mb-8 text-center md:text-left">Create Account</h3>
            <form action="/signup/submit" method="POST" class="space-y-4">
                <div>
                    <label for="nome" class="block text-sm font-medium text-gray-700 mb-1">Full Name</label>
                    <input type="text" name="nome" id="nome" class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:ring-2 focus:ring-emerald-500 outline-none transition">
                </div>

                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email Address</label>
                    <input type="email" name="email" id="email" class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:ring-2 focus:ring-emerald-500 outline-none transition">
                </div>

                <div>
                    <label for="role" class="block text-sm font-medium text-gray-700 mb-1">Your Role</label>
                    <select id="role" name="role" class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:ring-2 focus:ring-emerald-500 outline-none bg-white cursor-pointer">
                        <option value="">Selecione a sua função</option>
                        <option value="cliente">Cliente (Hiring)</option>
                        <option value="freelancer">Freelancer (Working)</option>
                    </select>
                </div>

                <div>
                    <label for="password" class="block text-sm font-medium text-gray-700 mb-1">Password</label>
                    <input type="password" name="password" id="password" class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:ring-2 focus:ring-emerald-500 outline-none transition">
                </div>

                <button type="submit" class="w-full bg-emerald-600 text-white py-3 rounded-xl font-bold hover:bg-emerald-700 transition shadow-lg shadow-emerald-100 mt-4">Sign Up</button>
            </form>
        </div>
    </div>
</div>
    </main>
</body>
</html>