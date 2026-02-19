<?php $this->view('partials/head') ?>
<body class="bg-gray-50 font-sans text-gray-900">
    <main>
        <div class="min-h-screen flex items-center justify-center p-6">
            <div class="max-w-4xl w-full bg-white rounded-3xl shadow-xl overflow-hidden flex flex-col md:flex-row border border-gray-100">
                
                <div class="md:w-1/2 bg-emerald-700 p-12 text-white flex flex-col justify-center">
                    <span class="text-emerald-300 font-bold uppercase tracking-widest text-xs mb-2">Passo 2 de 2</span>
                    <h2 class="text-3xl font-bold mb-4">Complete seu perfil profissional</h2>
                    <p class="text-emerald-100 leading-relaxed">
                        "Escolha um trabalho que você ame e não terá que trabalhar um único dia na sua vida."
                    </p>
                    <div class="mt-8 flex items-center gap-3">
                        <div class="flex -space-x-2">
                            <div class="w-8 h-8 rounded-full bg-emerald-500 border-2 border-emerald-700"></div>
                            <div class="w-8 h-8 rounded-full bg-emerald-400 border-2 border-emerald-700"></div>
                            <div class="w-8 h-8 rounded-full bg-emerald-300 border-2 border-emerald-700"></div>
                        </div>
                        <p class="text-xs text-emerald-200">Junte-se a milhares de freelancers</p>
                    </div>
                </div>

                <div class="md:w-1/2 p-10 md:p-12">
                    <h3 class="text-2xl font-bold text-gray-900 mb-6 text-center md:text-left">Detalhes Profissionais</h3>
                    
                    <form action="/freelancer/signup" method="POST" class="space-y-4">
                        
                        <div>
                            <label for="titulo_profissional" class="block text-sm font-medium text-gray-700 mb-1">Título Profissional</label>
                            <input type="text" name="titulo_profissional" id="titulo_profissional" placeholder="Ex: Desenvolvedor Web Fullstack" 
                                class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:ring-2 focus:ring-emerald-500 outline-none transition">
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label for="nivel" class="block text-sm font-medium text-gray-700 mb-1">Nível</label>
                                <select name="nivel" id="nivel" class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:ring-2 focus:ring-emerald-500 outline-none bg-white cursor-pointer">
                                    <option value="">Selecione</option>
                                    <option value="iniciante">Iniciante</option>
                                    <option value="intermediario">Intermediário</option>
                                    <option value="Senior">Sênior</option>
                                </select>
                            </div>
                            <div>
                                <label for="disponibilidade" class="block text-sm font-medium text-gray-700 mb-1">Disponibilidade</label>
                                <select name="disponibilidade" id="disponibilidade" class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:ring-2 focus:ring-emerald-500 outline-none bg-white cursor-pointer">
                                    <option value="">Selecione</option>
                                    <option value="part-time">Part-time</option>
                                    <option value="Full-time">Full-time</option>
                                </select>
                            </div>
                        </div>

                        <div>
                            <label for="skills" class="block text-sm font-medium text-gray-700 mb-1">Habilidades (Skills)</label>
                            <input type="text" name="nome" id="skills" placeholder="PHP, Design, Gestão..." 
                                class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:ring-2 focus:ring-emerald-500 outline-none transition">
                        </div>

                        <div>
                            <label for="bio" class="block text-sm font-medium text-gray-700 mb-1">Biografia</label>
                            <textarea name="bio" id="bio" rows="4" placeholder="Conte um pouco sobre sua experiência..." 
                                class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:ring-2 focus:ring-emerald-500 outline-none transition resize-none"></textarea>
                        </div>

                        <button type="submit" class="w-full bg-emerald-600 text-white py-4 rounded-xl font-bold hover:bg-emerald-700 transition shadow-lg shadow-emerald-100 mt-2">
                            Finalizar e Criar Conta
                        </button>
                        
                        <div class="text-center">
                            <a href="javascript:history.back()" class="text-sm text-gray-400 hover:text-emerald-600 transition">← Voltar ao passo anterior</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
</body>
</html>