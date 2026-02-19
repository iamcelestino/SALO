<?php $this->view('partials/head') ?>
<body class="bg-gray-50 font-sans text-gray-900">
    <main>
        <div class="min-h-screen flex items-center justify-center p-6">
            <div class="max-w-4xl w-full bg-white rounded-3xl shadow-xl overflow-hidden flex flex-col md:flex-row border border-gray-100">
                
                <div class="md:w-1/2 bg-emerald-700 p-12 text-white flex flex-col justify-center">
                    <span class="text-emerald-300 font-bold uppercase tracking-widest text-xs mb-2">Perfil Corporativo</span>
                    <h2 class="text-3xl font-bold mb-4">Encontre os melhores talentos</h2>
                    <p class="text-emerald-100 leading-relaxed italic">
                        "O capital humano é o ativo mais valioso de qualquer organização."
                    </p>
                    <div class="mt-8 space-y-4">
                        <div class="flex items-center gap-3">
                            <span class="bg-emerald-600 p-2 rounded-lg">🏢</span>
                            <p class="text-sm">Gestão centralizada de vagas</p>
                        </div>
                        <div class="flex items-center gap-3">
                            <span class="bg-emerald-600 p-2 rounded-lg">✅</span>
                            <p class="text-sm">Verificação de NIF para segurança</p>
                        </div>
                    </div>
                </div>

                <div class="md:w-1/2 p-10 md:p-12">
                    <div class="mb-8">
                        <h3 class="text-2xl font-bold text-gray-900 text-center md:text-left">Dados da Empresa</h3>
                        <p class="text-gray-500 text-sm mt-1">Complete as informações para começar a contratar.</p>
                    </div>
                    
                    <form action="/cliente/signup" method="POST" class="space-y-6">
                        
                        <div>
                            <label for="empresa_nome" class="block text-sm font-bold text-gray-700 mb-1">Nome da Empresa</label>
                            <input type="text" name="empresa_nome" id="empresa_nome" placeholder="Nome oficial ou comercial" 
                                class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:ring-4 focus:ring-emerald-100 focus:border-emerald-500 outline-none transition">
                        </div>

                        <div>
                            <label for="nif" class="block text-sm font-bold text-gray-700 mb-1">NIF (Número de Identificação Fiscal)</label>
                            <input type="text" name="nif" id="nif" placeholder="Digite o NIF da organização" 
                                class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:ring-4 focus:ring-emerald-100 focus:border-emerald-500 outline-none transition">
                        </div>

                        <div>
                            <label for="sector" class="block text-sm font-bold text-gray-700 mb-1">Sector de Actuação</label>
                            <select name="sector" id="sector" 
                                class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:ring-4 focus:ring-emerald-100 focus:border-emerald-500 outline-none bg-white cursor-pointer transition">
                                <option value="">Selecione o sector</option>
                                <option value="agricola">Agrícola</option>
                                <option value="Industrial">Industrial</option>
                                <option value="tecnologia">Tecnologia & TI</option>
                                <option value="servicos">Prestação de Serviços</option>
                            </select>
                        </div>

                        <div class="pt-4">
                            <button type="submit" class="w-full bg-emerald-600 text-white py-4 rounded-xl font-bold hover:bg-emerald-700 transition shadow-lg shadow-emerald-100 flex items-center justify-center gap-2">
                                Criar Perfil de Cliente <span>🚀</span>
                            </button>
                        </div>

                        <div class="text-center">
                            <a href="javascript:history.back()" class="text-sm text-gray-400 hover:text-emerald-600 transition">← Voltar</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
</body>
</html>