<?php $this->view('partials/head') ?>
<body>
    <main>
<div class="min-h-screen bg-gray-50 py-12 px-6">
    <div class="max-w-3xl mx-auto">
        <div class="mb-8">
            <h1 class="text-3xl font-bold text-gray-900">Editar Trabalho</h1>
            <p class="text-gray-500">Editar Trabalho</p>
        </div>

        <form action="/trabalho/update/<?=$trabalho->id?>" method="POST" class="bg-white p-8 md:p-12 rounded-3xl shadow-sm border border-gray-100 space-y-8">
            <div>
                <label for="titulo" class="block text-sm font-bold text-gray-700 mb-2">Título Profissional</label>
                <input value="<?= $trabalho->titulo ?>" type="text" name="titulo" id="titulo" placeholder="Ex: Web Designer, Escritor..." class="w-full px-4 py-3 rounded-xl bg-gray-50 border border-transparent focus:bg-white focus:border-emerald-500 focus:ring-4 focus:ring-emerald-100 outline-none transition">
            </div>

            <div>
                <label class="block text-sm font-bold text-gray-700 mb-2">Descrição do Serviço</label>
                <textarea name="descricao" rows="4" class="w-full px-4 py-3 rounded-xl bg-gray-50 border border-transparent focus:bg-white focus:border-emerald-500 focus:ring-4 focus:ring-emerald-100 outline-none transition" placeholder="Descreva as tarefas e requisitos..."><?= $trabalho->descricao?></textarea>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-2">Nível Requerido</label>
                    <select name="nivel_requerido" class="w-full px-4 py-3 rounded-xl bg-gray-50 border border-transparent focus:ring-4 focus:ring-emerald-100 outline-none cursor-pointer">
                        <option value="<?= $trabalho->nivel_requerido ?>"><?= $trabalho->nivel_requerido ?></option>
                    </select>
                </div>

                <div>
                    <label id="oracamento" class="block text-sm font-bold text-gray-700 mb-2">Orçamento</label>
                    <input value="<?=$trabalho->orcamento?>" type="number" name="orcamento" placeholder="Ex: 500" class="w-full px-4 py-3 rounded-xl bg-gray-50 border border-transparent focus:ring-4 focus:ring-emerald-100 outline-none">
                </div>

                <div>
                    <label for="status" class="block text-sm font-bold text-gray-700 mb-2">Estado do Serviço</label>
                    <select name="status" id="status" class="w-full px-4 py-3 rounded-xl bg-gray-50 border border-transparent focus:ring-4 focus:ring-emerald-100 outline-none cursor-pointer">
                        <option value="<?= $trabalho->status ?>"><?= $trabalho->status ?></option>
                    </select>
                </div>

                <div>
                    <label for="tipo" class="block text-sm font-bold text-gray-700 mb-2">Tipo de Serviço</label>
                    <select name="tipo" id="tipo" class="w-full px-4 py-3 rounded-xl bg-gray-50 border border-transparent focus:ring-4 focus:ring-emerald-100 outline-none cursor-pointer">
                        <option value="<?= $trabalho->tipo?>"> <?= $trabalho->tipo ?></option>
                    </select>
                </div>
            </div>

            <div class="pt-6">
                <button type="submit" class="w-full bg-emerald-600 text-white py-4 rounded-xl font-bold hover:bg-emerald-700 transition shadow-lg shadow-emerald-100 text-lg">
                    Editar Trabalho
                </button>
            </div>
        </form>
    </div>
</div>
</body>
</html>