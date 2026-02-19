<?php $this->view('partials/head') ?>
<body>
    <main>
<div class="min-h-screen bg-gray-50 py-12 px-6">
    <div class="max-w-3xl mx-auto">
        <div class="mb-8">
            <h1 class="text-3xl font-bold text-gray-900">Postar Trabalho</h1>
            <p class="text-gray-500">Preencha os detalhes do serviço abaixo.</p>
        </div>

        <form action="/trabalhos/create" method="POST" class="bg-white p-8 md:p-12 rounded-3xl shadow-sm border border-gray-100 space-y-8">
            <div>
                <label for="titulo" class="block text-sm font-bold text-gray-700 mb-2">Título Profissional</label>
                <input type="text" name="titulo" id="titulo" placeholder="Ex: Web Designer, Escritor..." class="w-full px-4 py-3 rounded-xl bg-gray-50 border border-transparent focus:bg-white focus:border-emerald-500 focus:ring-4 focus:ring-emerald-100 outline-none transition">
            </div>

            <div>
                <label class="block text-sm font-bold text-gray-700 mb-2">Descrição do Serviço</label>
                <textarea name="descricao" rows="4" class="w-full px-4 py-3 rounded-xl bg-gray-50 border border-transparent focus:bg-white focus:border-emerald-500 focus:ring-4 focus:ring-emerald-100 outline-none transition" placeholder="Descreva as tarefas e requisitos..."></textarea>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-2">Nível Requerido</label>
                    <select name="nivel_requerido" class="w-full px-4 py-3 rounded-xl bg-gray-50 border border-transparent focus:ring-4 focus:ring-emerald-100 outline-none cursor-pointer">
                        <option value="">Selecione o Nível</option>
                        <option value="iniciante">Iniciante</option>
                        <option value="intermediario">Intermediario</option>
                        <option value="Senior">Senior</option>
                    </select>
                </div>

                <div>
                    <label id="oracamento" class="block text-sm font-bold text-gray-700 mb-2">Orçamento ($)</label>
                    <input type="number" name="orcamento" placeholder="Ex: 500" class="w-full px-4 py-3 rounded-xl bg-gray-50 border border-transparent focus:ring-4 focus:ring-emerald-100 outline-none">
                </div>

                <div>
                    <label for="status" class="block text-sm font-bold text-gray-700 mb-2">Estado do Serviço</label>
                    <select name="status" id="status" class="w-full px-4 py-3 rounded-xl bg-gray-50 border border-transparent focus:ring-4 focus:ring-emerald-100 outline-none cursor-pointer">
                        <option value="">Estado do serviço</option>
                        <option value="aberto">Aberto</option>
                        <option value="em_andamento">Em andamento</option>
                        <option value="fechado">Fechado</option>
                    </select>
                </div>

                <div>
                    <label for="tipo" class="block text-sm font-bold text-gray-700 mb-2">Tipo de Serviço</label>
                    <select name="tipo" id="tipo" class="w-full px-4 py-3 rounded-xl bg-gray-50 border border-transparent focus:ring-4 focus:ring-emerald-100 outline-none cursor-pointer">
                        <option value="">Tipo de Serviço</option>
                        <option value="fixo">Preço Fixo</option>
                        <option value="hora">Por Hora</option>
                    </select>
                </div>
            </div>

            <div class="pt-6">
                <button type="submit" class="w-full bg-emerald-600 text-white py-4 rounded-xl font-bold hover:bg-emerald-700 transition shadow-lg shadow-emerald-100 text-lg">
                    Criar Trabalho
                </button>
            </div>
        </form>
    </div>
</div>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Dashboard | JobStream</title>
</head>
<body class="bg-gray-50 font-sans text-gray-900">

    <div class="flex min-h-screen">
        <aside class="w-64 bg-emerald-950 text-white hidden md:flex flex-col sticky top-0 h-screen">
            <div class="p-8 text-2xl font-bold text-emerald-400 tracking-tight">
                JobStream
            </div>
            
            <nav class="flex-1 px-4 space-y-2">
                <a href="#" class="flex items-center gap-3 px-4 py-3 bg-emerald-800 rounded-xl text-white font-medium">
                    <span>📊</span> Dashboard
                </a>
                <a href="#" class="flex items-center gap-3 px-4 py-3 text-emerald-100/70 hover:bg-emerald-900 rounded-xl hover:text-white transition">
                    <span>💼</span> Meus Trabalhos
                </a>
                <a href="#" class="flex items-center gap-3 px-4 py-3 text-emerald-100/70 hover:bg-emerald-900 rounded-xl hover:text-white transition">
                    <span>💬</span> Mensagens
                </a>
                <a href="#" class="flex items-center gap-3 px-4 py-3 text-emerald-100/70 hover:bg-emerald-900 rounded-xl hover:text-white transition">
                    <span>⚙️</span> Configurações
                </a>
            </nav>

            <div class="p-6 border-t border-emerald-900">
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 rounded-full bg-emerald-500 flex items-center justify-center font-bold">JD</div>
                    <div>
                        <p class="text-sm font-bold">John Doe</p>
                        <p class="text-xs text-emerald-400">Freelancer</p>
                    </div>
                </div>
            </div>
        </aside>

        <main class="flex-1">
            <header class="bg-white border-b border-gray-200 py-4 px-8 flex justify-between items-center">
                <h2 class="text-xl font-bold">Bem-vindo de volta, John!</h2>
                <div class="flex items-center gap-4">
                    <button class="p-2 text-gray-400 hover:text-emerald-600">🔔</button>
                    <a href="/trabalhos/create" class="bg-emerald-600 text-white px-4 py-2 rounded-lg text-sm font-bold hover:bg-emerald-700 transition">
                        + Novo Trabalho
                    </a>
                </div>
            </header>

            <div class="p-8">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-10">
                    <div class="bg-white p-6 rounded-2xl border border-gray-100 shadow-sm">
                        <p class="text-gray-500 text-sm font-medium">Trabalhos Ativos</p>
                        <h3 class="text-3xl font-bold text-gray-900 mt-1">12</h3>
                        <span class="text-emerald-600 text-xs font-bold mt-2 inline-block">↑ 2 este mês</span>
                    </div>
                    <div class="bg-white p-6 rounded-2xl border border-gray-100 shadow-sm">
                        <p class="text-gray-500 text-sm font-medium">Ganhos Totais</p>
                        <h3 class="text-3xl font-bold text-gray-900 mt-1">$4,250</h3>
                        <span class="text-emerald-600 text-xs font-bold mt-2 inline-block">+15% vs mês passado</span>
                    </div>
                    <div class="bg-white p-6 rounded-2xl border border-gray-100 shadow-sm">
                        <p class="text-gray-500 text-sm font-medium">Propostas Enviadas</p>
                        <h3 class="text-3xl font-bold text-gray-900 mt-1">45</h3>
                        <span class="text-gray-400 text-xs mt-2 inline-block">8 aguardando resposta</span>
                    </div>
                </div>

                <div class="bg-white rounded-2xl border border-gray-100 shadow-sm overflow-hidden">
                    <div class="p-6 border-b border-gray-100 flex justify-between items-center">
                        <h4 class="font-bold text-gray-900">Atividade Recente</h4>
                        <button class="text-emerald-600 text-sm font-bold hover:underline">Ver tudo</button>
                    </div>
                    <div class="overflow-x-auto">
                        <table class="w-full text-left">
                            <thead class="bg-gray-50 text-gray-400 text-xs uppercase tracking-wider">
                                <tr>
                                    <th class="px-6 py-4">Trabalho</th>
                                    <th class="px-6 py-4">Data</th>
                                    <th class="px-6 py-4">Orçamento</th>
                                    <th class="px-6 py-4">Status</th>
                                    <th class="px-6 py-4">Ação</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-100">
                                <tr class="hover:bg-gray-50 transition">
                                    <td class="px-6 py-4 font-medium text-gray-900">UI Design for Fintech App</td>
                                    <td class="px-6 py-4 text-sm text-gray-500">02 Fev, 2026</td>
                                    <td class="px-6 py-4 text-sm font-bold text-emerald-700">$1,200</td>
                                    <td class="px-6 py-4">
                                        <span class="px-3 py-1 bg-emerald-50 text-emerald-700 rounded-full text-xs font-bold">Em andamento</span>
                                    </td>
                                    <td class="px-6 py-4">
                                        <button class="text-gray-400 hover:text-emerald-600 font-bold">...</button>
                                    </td>
                                </tr>
                                <tr class="hover:bg-gray-50 transition">
                                    <td class="px-6 py-4 font-medium text-gray-900">Backend API Integration</td>
                                    <td class="px-6 py-4 text-sm text-gray-500">30 Jan, 2026</td>
                                    <td class="px-6 py-4 text-sm font-bold text-emerald-700">$850</td>
                                    <td class="px-6 py-4">
                                        <span class="px-3 py-1 bg-gray-100 text-gray-600 rounded-full text-xs font-bold">Aberto</span>
                                    </td>
                                    <td class="px-6 py-4">
                                        <button class="text-gray-400 hover:text-emerald-600 font-bold">...</button>
                                    </td>
                                </tr>
                                <tr class="hover:bg-gray-50 transition">
                                    <td class="px-6 py-4 font-medium text-gray-900">SEO Content Writing</td>
                                    <td class="px-6 py-4 text-sm text-gray-500">25 Jan, 2026</td>
                                    <td class="px-6 py-4 text-sm font-bold text-emerald-700">$300</td>
                                    <td class="px-6 py-4">
                                        <span class="px-3 py-1 bg-blue-50 text-blue-700 rounded-full text-xs font-bold">Fechado</span>
                                    </td>
                                    <td class="px-6 py-4">
                                        <button class="text-gray-400 hover:text-emerald-600 font-bold">...</button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </main>
    </div>

</body>
</html>
