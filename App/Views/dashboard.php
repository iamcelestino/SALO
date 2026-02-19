<?php $this->view('partials/head') ?>
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
                    <span>💬</span> Contratos
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
                    <table class="min-w-full divide-y divide-gray-200">
                    <?php if($trabalhos): ?>
                        <thead class="bg-gray-200">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Titulo</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Descrição</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Orcamento</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nivel requerido</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Acções</th>
                            </tr>
                        </thead>
                            <?php foreach($trabalhos as $trabalho): ?>
                            <tbody class="bg-white divide-y divide-gray-200">
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap"><?=$trabalho->titulo; ?></td>
                                        <td class="px-6 py-4 whitespace-nowrap"><?=$trabalho->descricao; ?></td>
                                        <td class="px-6 py-4 whitespace-nowrap"><?=$trabalho->orcamento;?></td>
                                        <td class="px-6 py-4 whitespace-nowrap"><?=$trabalho->nivel_requerido?></td>
                                        <td class="px-6 py-4 whitespace-nowrap"><?=$trabalho->status?></td>
                                        <td class=" text-center text-2xl">
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <a href="/trabalho/update/<?=$trabalho->id;?>" title="">editar</a>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <a href="/trabalho/delete/<?=$trabalho->id;?>"title="">apagar</a>
                                        </td>
                                          <td class="px-6 py-4 whitespace-nowrap">
                                            <a href="/proposta/create/<?=$trabalho->id;?>" title="">Enviar Proposta</a>
                                        </td>
                                    </tr>
                            </tbody>
                            <?php endforeach ?>
                    <?php else: ?>
                        <tbody class="bg-white divide-y divide-gray-200">
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap"> <?=$trabalho->titulo; ?></td>
                                <td class="px-6 py-4 whitespace-nowrap"><?=$trabalho->descricao; ?></td>
                                <td class="px-6 py-4 whitespace-nowrap"><?=$trabalho->orcamento;?></td>
                                <td class="px-6 py-4 whitespace-nowrap"><?=$trabalho->nivel_requerido?></td>
                                <td class="px-6 py-4 whitespace-nowrap"><?=$trabalho->status?></td>
                                <td class=" text-center text-2xl">
                                </td>
                            </tr>
                        </tbody>
                    <?php endif ?>
                </table>
                        </table>
                    </div>
                </div>
            </div>
        </main>
    </div>

</body>
</html>