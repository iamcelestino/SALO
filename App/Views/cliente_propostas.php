<?php $this->view('partials/head') ?>
<body class="bg-gray-50 font-sans text-gray-900">
    <div class="flex min-h-screen">
        <aside class="w-64 bg-emerald-950 text-white hidden md:flex flex-col sticky top-0 h-screen">
            <div class="p-8 text-2xl font-bold text-emerald-400 tracking-tight">
                StreamLine.
            </div>
            <nav class="flex-1 px-4 space-y-2">
                <a href="/dashboard" class="flex items-center gap-3 px-4 py-3 text-emerald-100/70 hover:bg-emerald-900 rounded-xl hover:text-white transition">
                    <span>📊</span> Dashboard
                </a>
                <a href="/cliente/trabalhos" class="flex items-center gap-3 px-4 py-3 text-emerald-100/70 hover:bg-emerald-900 rounded-xl hover:text-white transition">
                    <span>💼</span> Meus Trabalhos
                </a>
                <a href="/cliente/propostas" class="flex items-center gap-3 px-4 py-3 text-emerald-100/70 hover:bg-emerald-900 rounded-xl hover:text-white transition">
                    <span>💼</span> Propostas recebidas
                </a>
                <a href="/cliente/contrato" class="flex items-center gap-3 px-4 py-3 bg-emerald-800 rounded-xl text-white font-medium">
                    <span>📄</span> Contratos
                </a>
                <a href="#" class="flex items-center gap-3 px-4 py-3 text-emerald-100/70 hover:bg-emerald-900 rounded-xl hover:text-white transition">
                    <span>⚙️</span> Configurações
                </a>
            </nav>

            <div class="p-6 border-t border-emerald-900">
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 rounded-full bg-emerald-500 flex items-center justify-center font-bold">JD</div>
                    <div>
                        <p class="text-sm font-bold">Celestino Trosso</p>
                        <p class="text-xs text-emerald-400">Freelancer</p>
                    </div>
                </div>
            </div>
        </aside>

        <main class="flex-1">
            <header class="bg-white border-b border-gray-200 py-4 px-8 flex justify-between items-center">
                <h2 class="text-xl font-bold">Minhas Propostas</h2>
                <div class="flex items-center gap-4">
                    <button class="p-2 text-gray-400 hover:text-emerald-600">🔔</button>
                </div>
            </header>

            <div class="p-8">
                <div class="bg-white rounded-2xl border border-gray-100 shadow-sm overflow-hidden">
                    <div class="p-6 border-b border-gray-100 flex justify-between items-center">
                        <h4 class="font-bold text-gray-900">Lista de Propostas</h4>
                    </div>
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200">
                            <?php if($propostas): ?>
                                <thead class="bg-gray-200">
                                    <tr>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Trabalho</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Descrição</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Orçamento</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nível Requerido</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Valor Proposto</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                    <?php foreach($propostas as $proposta): ?>
                                        <tr>
                                            <td class="px-6 py-4 whitespace-nowrap"><?= $proposta->titulo ?></td>
                                            <td class="px-6 py-4 whitespace-nowrap"><?= $proposta->descricao ?></td>
                                            <td class="px-6 py-4 whitespace-nowrap"><?= number_format($proposta->orcamento, 2) ?></td>
                                            <td class="px-6 py-4 whitespace-nowrap"><?= ucfirst($proposta->nivel_requerido) ?></td>
                                            <td class="px-6 py-4 whitespace-nowrap"><?= number_format($proposta->valor_proposto, 2) ?></td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <span class="px-2 py-1 rounded-full text-xs font-bold
                                                    <?php
                                                        echo match($proposta->status_proposta) {
                                                            'aprovada'  => 'bg-emerald-100 text-emerald-700',
                                                            'rejeitada' => 'bg-red-100 text-red-600',
                                                            default     => 'bg-yellow-100 text-yellow-700'
                                                        };
                                                    ?>">
                                                    <?= ucfirst($proposta->status_proposta) ?>
                                                </span>
                                            </td>
                                        </tr>
                                    <?php endforeach ?>
                                </tbody>
                            <?php else: ?>
                                <tbody class="bg-white">
                                    <tr>
                                        <td colspan="6" class="px-6 py-10 text-center text-gray-400">
                                            Nenhuma proposta encontrada.
                                        </td>
                                    </tr>
                                </tbody>
                            <?php endif ?>
                        </table>
                    </div>
                </div>
            </div>
        </main>
    </div>
</body>
</html>