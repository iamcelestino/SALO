<?php $this->view('partials/head') ?>
<body class="bg-gray-50 font-sans text-gray-900">
    <div class="flex min-h-screen">

        <!-- ── Sidebar ── -->
        <aside class="w-64 bg-emerald-950 text-white hidden md:flex flex-col sticky top-0 h-screen">
            <div class="p-8 text-2xl font-bold text-emerald-400 tracking-tight">
                Salo.
            </div>
            <nav class="flex-1 px-4 space-y-2">
                <a href="/admin/dashboard" class="flex items-center gap-3 px-4 py-3 bg-emerald-800 rounded-xl text-white font-medium">
                    <span>📊</span> Dashboard
                </a>
                <a href="/trabalhos" class="flex items-center gap-3 px-4 py-3 text-emerald-100/70 hover:bg-emerald-900 rounded-xl hover:text-white transition">
                    <span>💼</span> Trabalhos
                </a>
                <a href="/contratos" class="flex items-center gap-3 px-4 py-3 text-emerald-100/70 hover:bg-emerald-900 rounded-xl hover:text-white transition">
                    <span>📄</span> Contratos
                </a>
                <a href="/freelancers" class="flex items-center gap-3 px-4 py-3 text-emerald-100/70 hover:bg-emerald-900 rounded-xl hover:text-white transition">
                    <span>🧑‍💻</span> Freelancers
                </a>
                <a href="/clientes" class="flex items-center gap-3 px-4 py-3 text-emerald-100/70 hover:bg-emerald-900 rounded-xl hover:text-white transition">
                    <span>🏢</span> Clientes
                </a>
                <a href="/propostas" class="flex items-center gap-3 px-4 py-3 text-emerald-100/70 hover:bg-emerald-900 rounded-xl hover:text-white transition">
                    <span>📨</span> Propostas
                </a>
                <a href="/config" class="flex items-center gap-3 px-4 py-3 text-emerald-100/70 hover:bg-emerald-900 rounded-xl hover:text-white transition">
                    <span>⚙️</span> Configurações
                </a>
            </nav>
            <div class="p-6 border-t border-emerald-900">
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 rounded-full bg-emerald-500 flex items-center justify-center font-bold text-sm">
                        <?= strtoupper(substr($_SESSION['USER'][0]->nome ?? 'A', 0, 2)) ?>
                    </div>
                    <div>
                        <p class="text-sm font-bold"><?= htmlspecialchars($_SESSION['USER'][0]->nome ?? 'Admin') ?></p>
                        <p class="text-xs text-emerald-400">Administrador</p>
                    </div>
                </div>
            </div>
        </aside>

        <!-- ── Main ── -->
        <main class="flex-1">

            <header class="bg-white border-b border-gray-200 py-4 px-8 flex justify-between items-center">
                <h2 class="text-xl font-bold">Painel de Administração</h2>
                <div class="flex items-center gap-4">
                    <button class="p-2 text-gray-400 hover:text-emerald-600">🔔</button>
                    <a href="/trabalhos/create" class="bg-emerald-600 text-white px-4 py-2 rounded-lg text-sm font-bold hover:bg-emerald-700 transition">
                        + Novo Trabalho
                    </a>
                </div>
            </header>

            <div class="p-8">

                <!-- ── Stat cards ── -->
                <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-10">
                    <div class="bg-white p-6 rounded-2xl border border-gray-100 shadow-sm">
                        <p class="text-gray-500 text-sm font-medium">Contratos</p>
                        <h3 class="text-3xl font-bold text-gray-900 mt-1"><?= count((array) $contratos) ?></h3>
                        <span class="text-emerald-600 text-xs font-bold mt-2 inline-block">
                            <?= count(array_filter((array) $contratos, fn($c) => (is_object($c) ? $c->status : $c['status']) === 'ativo')) ?> ativos
                        </span>
                    </div>
                    <div class="bg-white p-6 rounded-2xl border border-gray-100 shadow-sm">
                        <p class="text-gray-500 text-sm font-medium">Freelancers</p>
                        <h3 class="text-3xl font-bold text-gray-900 mt-1"><?= count((array) $freelancers) ?></h3>
                        <span class="text-emerald-600 text-xs font-bold mt-2 inline-block">
                            <?= count(array_filter((array) $freelancers, fn($f) => (is_object($f) ? $f->disponibilidade : $f['disponibilidade']) === 'disponivel')) ?> disponíveis
                        </span>
                    </div>
                    <div class="bg-white p-6 rounded-2xl border border-gray-100 shadow-sm">
                        <p class="text-gray-500 text-sm font-medium">Trabalhos</p>
                        <h3 class="text-3xl font-bold text-gray-900 mt-1"><?= count((array) $trabalhos) ?></h3>
                        <span class="text-gray-400 text-xs mt-2 inline-block">
                            <?= count(array_filter((array) $trabalhos, fn($t) => (is_object($t) ? $t->status : $t['status']) === 'aberto')) ?> em aberto
                        </span>
                    </div>
                    <div class="bg-white p-6 rounded-2xl border border-gray-100 shadow-sm">
                        <p class="text-gray-500 text-sm font-medium">Propostas</p>
                        <h3 class="text-3xl font-bold text-gray-900 mt-1"><?= count((array) ($propostas ?? [])) ?></h3>
                        <span class="text-gray-400 text-xs mt-2 inline-block">
                            <?= count(array_filter((array) ($propostas ?? []), fn($p) => (is_object($p) ? $p->status_proposta : $p['status_proposta']) === 'pendente')) ?> pendentes
                        </span>
                    </div>
                </div>

                <!-- ── Contratos recentes ── -->
                <div class="bg-white rounded-2xl border border-gray-100 shadow-sm overflow-hidden mb-8">
                    <div class="p-6 border-b border-gray-100 flex justify-between items-center">
                        <h4 class="font-bold text-gray-900">Contratos Recentes</h4>
                        <a href="/contratos" class="text-emerald-600 text-sm font-bold hover:underline">Ver tudo</a>
                    </div>
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Trabalho</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Freelancer</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Especialidade</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Cliente</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Data Início</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Data Fim</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Estado</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Acções</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                <?php if (!empty($contratos)): ?>
                                    <?php foreach (array_slice((array) $contratos, 0, 8) as $contrato): ?>
                                    <?php $c = is_object($contrato) ? $contrato : (object) $contrato; ?>
                                    <tr class="hover:bg-gray-50 transition">
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                            <?= htmlspecialchars($c->trabalho_titulo ?? '—') ?>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="flex items-center gap-2">
                                                <div class="w-7 h-7 rounded-full bg-emerald-100 text-emerald-700 flex items-center justify-center text-xs font-bold flex-shrink-0">
                                                    <?= strtoupper(substr($c->freelancer_nome ?? 'F', 0, 2)) ?>
                                                </div>
                                                <div>
                                                    <p class="text-sm font-medium text-gray-900"><?= htmlspecialchars($c->freelancer_nome ?? '—') ?></p>
                                                    <p class="text-xs text-gray-400"><?= htmlspecialchars($c->freelancer_email ?? '') ?></p>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                            <?= htmlspecialchars($c->freelancer_especialidade ?? '—') ?>
                                            <?php if (!empty($c->freelancer_nivel)): ?>
                                                <span class="ml-1 px-1.5 py-0.5 rounded text-xs bg-gray-100 text-gray-500"><?= htmlspecialchars($c->freelancer_nivel) ?></span>
                                            <?php endif; ?>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <p class="text-sm font-medium text-gray-900"><?= htmlspecialchars($c->cliente_nome ?? '—') ?></p>
                                            <p class="text-xs text-gray-400"><?= htmlspecialchars($c->cliente_email ?? '') ?></p>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                            <?= $c->data_inicio ? date('d/m/Y', strtotime($c->data_inicio)) : '—' ?>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                            <?= $c->data_fim ? date('d/m/Y', strtotime($c->data_fim)) : '<span class="text-gray-300">Em curso</span>' ?>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <?php
                                                $status = strtolower($c->status ?? 'ativo');
                                                $badgeClass = match($status) {
                                                    'ativo'     => 'bg-emerald-100 text-emerald-700',
                                                    'concluido' => 'bg-blue-100 text-blue-700',
                                                    'cancelado' => 'bg-red-100 text-red-700',
                                                    default     => 'bg-yellow-100 text-yellow-700',
                                                };
                                            ?>
                                            <span class="px-2 py-1 rounded-full text-xs font-bold <?= $badgeClass ?>">
                                                <?= ucfirst($status) ?>
                                            </span>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm flex gap-3">
                                            <a href="/contratos/update/<?= $c->id ?>" class="text-emerald-600 hover:underline font-medium">Editar</a>
                                            <a href="/contratos/delete/<?= $c->id ?>" class="text-red-500 hover:underline font-medium">Apagar</a>
                                        </td>
                                    </tr>
                                    <?php endforeach; ?>
                                <?php else: ?>
                                    <tr>
                                        <td colspan="8" class="px-6 py-10 text-center text-gray-400 text-sm">
                                            Nenhum contrato registado.
                                        </td>
                                    </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- ── Trabalhos + Freelancers ── -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">

                    <!-- Trabalhos -->
                    <div class="bg-white rounded-2xl border border-gray-100 shadow-sm overflow-hidden">
                        <div class="p-6 border-b border-gray-100 flex justify-between items-center">
                            <h4 class="font-bold text-gray-900">Trabalhos Recentes</h4>
                            <a href="/trabalhos" class="text-emerald-600 text-sm font-bold hover:underline">Ver tudo</a>
                        </div>
                        <div class="overflow-x-auto">
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead class="bg-gray-50">
                                    <tr>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Título</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Orçamento</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nível</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Estado</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Acções</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                    <?php if (!empty($trabalhos)): ?>
                                        <?php foreach (array_slice((array) $trabalhos, 0, 6) as $trab): ?>
                                        <?php $t = is_object($trab) ? $trab : (object) $trab; ?>
                                        <tr class="hover:bg-gray-50 transition">
                                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                                <?= htmlspecialchars($t->titulo ?? '—') ?>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-emerald-600 font-bold">
                                                <?= isset($t->orcamento) ? number_format((float)$t->orcamento, 2, ',', '.') . ' Kz' : '—' ?>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                                <?= htmlspecialchars($t->nivel_requerido ?? '—') ?>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <?php
                                                    $ts = strtolower($t->status ?? 'aberto');
                                                    $tc = match($ts) {
                                                        'aberto'       => 'bg-emerald-100 text-emerald-700',
                                                        'em_andamento' => 'bg-blue-100 text-blue-700',
                                                        'concluido'    => 'bg-gray-100 text-gray-600',
                                                        default        => 'bg-yellow-100 text-yellow-700',
                                                    };
                                                ?>
                                                <span class="px-2 py-1 rounded-full text-xs font-bold <?= $tc ?>">
                                                    <?= ucfirst($ts) ?>
                                                </span>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm flex gap-3">
                                                <a href="/trabalho/update/<?= $t->id_trabalho ?? $t->id ?? '' ?>" class="text-emerald-600 hover:underline font-medium">Editar</a>
                                                <a href="/trabalho/delete/<?= $t->id_trabalho ?? $t->id ?? '' ?>" class="text-red-500 hover:underline font-medium">Apagar</a>
                                            </td>
                                        </tr>
                                        <?php endforeach; ?>
                                    <?php else: ?>
                                        <tr>
                                            <td colspan="5" class="px-6 py-10 text-center text-gray-400 text-sm">
                                                Nenhum trabalho registado.
                                            </td>
                                        </tr>
                                    <?php endif; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <!-- Freelancers -->
                    <div class="bg-white rounded-2xl border border-gray-100 shadow-sm overflow-hidden">
                        <div class="p-6 border-b border-gray-100 flex justify-between items-center">
                            <h4 class="font-bold text-gray-900">Freelancers</h4>
                            <a href="/freelancers" class="text-emerald-600 text-sm font-bold hover:underline">Ver tudo</a>
                        </div>
                        <?php if (!empty($freelancers)): ?>
                            <ul class="divide-y divide-gray-100">
                                <?php foreach (array_slice((array) $freelancers, 0, 7) as $fl): ?>
                                <?php $f = is_object($fl) ? $fl : (object) $fl; ?>
                                <li class="flex items-center gap-4 px-6 py-4 hover:bg-gray-50 transition">
                                    <div class="w-9 h-9 rounded-full bg-emerald-100 text-emerald-700 flex items-center justify-center text-xs font-bold flex-shrink-0">
                                        <?= strtoupper(substr($f->nome ?? 'F', 0, 2)) ?>
                                    </div>
                                    <div class="flex-1 min-w-0">
                                        <p class="text-sm font-semibold text-gray-900 truncate"><?= htmlspecialchars($f->nome ?? '—') ?></p>
                                        <p class="text-xs text-gray-400 truncate"><?= htmlspecialchars($f->titulo_profissional ?? '—') ?></p>
                                        <p class="text-xs text-gray-400 truncate"><?= htmlspecialchars($f->email ?? '') ?></p>
                                    </div>
                                    <div class="flex flex-col items-end gap-1">
                                        <?php
                                            $disp = strtolower($f->disponibilidade ?? '');
                                            $dc = $disp === 'disponivel'
                                                ? 'bg-emerald-100 text-emerald-700'
                                                : 'bg-gray-100 text-gray-500';
                                        ?>
                                        <span class="px-2 py-1 rounded-full text-xs font-bold <?= $dc ?>">
                                            <?= ucfirst($disp ?: '—') ?>
                                        </span>
                                        <?php if (!empty($f->nivel)): ?>
                                            <span class="text-xs text-gray-400"><?= htmlspecialchars($f->nivel) ?></span>
                                        <?php endif; ?>
                                    </div>
                                </li>
                                <?php endforeach; ?>
                            </ul>
                        <?php else: ?>
                            <div class="px-6 py-10 text-center text-gray-400 text-sm">
                                Nenhum freelancer registado.
                            </div>
                        <?php endif; ?>
                    </div>

                </div>

            </div>
        </main>
    </div>
</body>
</html>