<?php $this->view('partials/head') ?>
<body class="bg-gray-50 font-sans text-gray-900">
<!--     <nav class="bg-white border-b border-gray-100 py-4 px-6 flex justify-between items-center sticky top-0 z-50">
        <div class="text-2xl font-bold text-emerald-600 tracking-tight">Salo</div>
        <div class="space-x-8 hidden md:flex font-medium text-gray-600">
            <a href="/" class="hover:text-emerald-600 transition">Início</a>
            <a href="#" class="text-emerald-600 font-bold">Empresas</a>
            <a href="#" class="hover:text-emerald-600 transition">Salários</a>
        </div>
        <div class="space-x-3">
            <button class="px-5 py-2 bg-emerald-600 text-white rounded-lg font-medium hover:bg-emerald-700 transition">Postar Vaga</button>
        </div>
    </nav> -->
    <?php $this->view('partials/nav') ?>
    <header class="bg-white border-b border-gray-100 py-16">
        <div class="max-w-6xl mx-auto px-6 text-center">
            <h1 class="text-4xl font-extrabold text-gray-900 mb-4">Empresas de Destaque</h1>
            <p class="text-gray-500 text-lg max-w-2xl mx-auto">
                Conecte-se com as organizações que estão moldando o futuro e encontre o lugar ideal para o seu próximo passo profissional.
            </p>
            
            <div class="mt-10 max-w-2xl mx-auto relative">
                <input type="text" placeholder="Buscar empresa pelo nome..." class="w-full pl-12 pr-4 py-4 rounded-2xl border border-gray-200 focus:ring-4 focus:ring-emerald-100 focus:border-emerald-500 outline-none transition">
                <span class="absolute left-4 top-1/2 -translate-y-1/2 text-gray-400">🔍</span>
            </div>
        </div>
    </header>

    <main class="max-w-6xl mx-auto py-16 px-6">
        <div class="flex flex-wrap gap-4 mb-12 justify-center">
            <button class="px-6 py-2 bg-emerald-600 text-white rounded-full text-sm font-bold shadow-md shadow-emerald-100">Todas</button>
            <button class="px-6 py-2 bg-white text-gray-600 rounded-full text-sm font-bold border border-gray-200 hover:border-emerald-500 transition">Tecnologia</button>
            <button class="px-6 py-2 bg-white text-gray-600 rounded-full text-sm font-bold border border-gray-200 hover:border-emerald-500 transition">Energia Verde</button>
            <button class="px-6 py-2 bg-white text-gray-600 rounded-full text-sm font-bold border border-gray-200 hover:border-emerald-500 transition">Design</button>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            
            <div class="bg-white rounded-3xl border border-gray-100 p-8 hover:shadow-2xl transition duration-300 group">
                <div class="flex items-center gap-4 mb-6">
                    <div class="w-16 h-16 bg-emerald-100 rounded-2xl flex items-center justify-center text-emerald-700 text-2xl font-bold">NS</div>
                    <div>
                        <h3 class="text-xl font-bold group-hover:text-emerald-600 transition">NatureScale</h3>
                        <p class="text-sm text-gray-400">Sustentabilidade • Remoto</p>
                    </div>
                </div>
                <p class="text-gray-600 text-sm leading-relaxed mb-6">
                    Líder mundial em soluções de backend para monitoramento de créditos de carbono e energias renováveis.
                </p>
                <div class="flex items-center justify-between pt-6 border-t border-gray-50">
                    <span class="text-emerald-600 font-bold text-sm">12 Vagas Abertas</span>
                    <button class="text-gray-400 group-hover:text-emerald-600 font-bold text-sm flex items-center gap-1">
                        Ver Perfil <span>→</span>
                    </button>
                </div>
            </div>

            <div class="bg-white rounded-3xl border border-gray-100 p-8 hover:shadow-2xl transition duration-300 group text-center flex flex-col items-center">
                <div class="w-20 h-20 bg-teal-600 text-white rounded-full flex items-center justify-center text-3xl font-bold mb-4 shadow-lg">T</div>
                <h3 class="text-xl font-bold group-hover:text-emerald-600 transition">Terraform Labs</h3>
                <p class="text-sm text-gray-400 mb-4">Engenharia • Luanda, AO</p>
                <p class="text-gray-600 text-sm leading-relaxed mb-6">
                    Inovando na infraestrutura urbana com foco em tecnologias resilientes e design centrado no humano.
                </p>
                <a href="#" class="w-full py-3 bg-gray-50 text-gray-700 rounded-xl font-bold group-hover:bg-emerald-600 group-hover:text-white transition">8 Vagas Disponíveis</a>
            </div>

            <div class="bg-white rounded-3xl border border-gray-100 p-8 hover:shadow-2xl transition duration-300 group">
                <div class="flex items-center gap-4 mb-6">
                    <div class="w-16 h-16 bg-amber-100 rounded-2xl flex items-center justify-center text-amber-600 text-2xl font-bold">EC</div>
                    <div>
                        <h3 class="text-xl font-bold group-hover:text-emerald-600 transition">EcoCreative</h3>
                        <p class="text-sm text-gray-400">Design • Lisboa, PT</p>
                    </div>
                </div>
                <p class="text-gray-600 text-sm leading-relaxed mb-6">
                    Agência de design focada em marcas que possuem impacto social positivo e consciência ambiental.
                </p>
                <div class="flex items-center justify-between pt-6 border-t border-gray-50">
                    <span class="text-emerald-600 font-bold text-sm">3 Vagas Abertas</span>
                    <button class="text-gray-400 group-hover:text-emerald-600 font-bold text-sm flex items-center gap-1">
                        Ver Perfil <span>→</span>
                    </button>
                </div>
            </div>

        </div>
    </main>

    <footer class="bg-emerald-950 py-12">
        <div class="max-w-6xl mx-auto px-6 text-center">
            <div class="text-2xl font-bold text-emerald-400 mb-4">Salo</div>
            <p class="text-emerald-100/50 text-sm">&copy; 2026 JobStream — Cultivando Talentos.</p>
        </div>
    </footer>

</body>
</html>