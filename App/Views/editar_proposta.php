<?php $this->view('partials/head') ?>
<body>
   <main class="min-h-screen flex items-center justify-center p-6">
        <div class="max-w-4xl w-full bg-white rounded-3xl shadow-xl overflow-hidden flex flex-col md:flex-row border border-gray-100">
            
            <div class="md:w-1/3 bg-emerald-700 p-10 text-white flex flex-col justify-between">
                <div>
                    <div class="text-xl font-bold mb-6">Salo</div>
                    <h2 class="text-2xl font-bold mb-4">Editar Proposta</h2>
                    <p class="text-emerald-100 text-sm leading-relaxed">
                        Defina o seu valor e envie uma mensagem personalizada para convencer o cliente de que você é o profissional certo para este trabalho.
                    </p>
                </div>
                
                <div class="mt-8 space-y-4">
                    <div class="flex items-center gap-3 text-sm text-emerald-200">
                        <span class="w-2 h-2 bg-emerald-400 rounded-full"></span>
                        Transações seguras
                    </div>
                    <div class="flex items-center gap-3 text-sm text-emerald-200">
                        <span class="w-2 h-2 bg-emerald-400 rounded-full"></span>
                        Suporte ao freelancer
                    </div>
                </div>
            </div>

            <div class="md:w-2/3 p-10 md:p-14">
                <?php if($proposta): ?>
                <form action="/proposta/update/<?= $proposta->id ?> " method="POST" class="space-y-6">
                    
                    <div>
                        <label for="valor_proposto" class="block text-sm font-bold text-gray-700 mb-2">Valor Proposto</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                <span class="text-gray-400">$</span>
                            </div>
                            <input value="<?= $proposta->valor_proposto ?>" type="text" name="valor_proposto" id="valor_proposto" placeholder="0.00" 
                                class="w-full pl-8 pr-4 py-3 rounded-xl bg-gray-50 border border-transparent focus:bg-white focus:ring-4 focus:ring-emerald-100 focus:border-emerald-500 outline-none transition">
                        </div>
                    </div>

                    <div>
                        <label for="status" class="block text-sm font-bold text-gray-700 mb-2">Estado da Disponibilidade</label>
                        <select name="status" id="status" 
                            class="w-full px-4 py-3 rounded-xl bg-gray-50 border border-transparent focus:ring-4 focus:ring-emerald-100 focus:border-emerald-500 outline-none bg-white cursor-pointer transition">
                            <option value="">Selecione a disponibilidade</option>
                            <option value="pendente">Pendente</option>
                            <option value="aceite">Aceite</option>
                            <option value="rejeitada">Rejeitada</option>
                        </select>
                    </div>

                    <div>
                        <label for="mensagem" class="block text-sm font-bold text-gray-700 mb-2">Mensagem de Apresentação</label>
                        <textarea name="mensagem" id="mensagem" rows="5" 
                            class="w-full px-4 py-3 rounded-xl bg-gray-50 border border-transparent focus:bg-white focus:ring-4 focus:ring-emerald-100 focus:border-emerald-500 outline-none transition" 
                            placeholder="Descreva sua experiência e como você pode ajudar..."><?=$proposta->mensagem?></textarea>
                    </div>

                    <div class="pt-4">
                        <button type="submit" class="w-full bg-emerald-600 text-white py-4 rounded-xl font-bold hover:bg-emerald-700 transition shadow-lg shadow-emerald-100 active:scale-[0.98]">
                            Editar Proposta
                        </button>
                        <p class="mt-4 text-center text-xs text-gray-400">
                            Ao enviar, o cliente será notificado imediatamente.
                        </p>
                    </div>
                </form>
                <?php else: ?>
                    <h1>Proposta inexistente</h1>
            <?php endif?>
            </div>
        </div>
    </main>
</body>
</html>