<?php $this->view('partials/head') ?>
<body class="bg-gray-50 font-sans text-gray-900">
    <?php $this->view('partials/nav') ?>

    <main class="max-w-5xl mx-auto py-16 px-6">

        <!-- Header -->
        <div class="mb-10 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
            <div>
                <h1 class="text-3xl font-extrabold text-gray-900">Contratos</h1>
                <p class="text-sm text-gray-400 mt-1">Todos os contratos da plataforma</p>
            </div>

            <!-- Stats summary -->
            <?php
                $statusCounts = ['ativo' => 0, 'concluido' => 0, 'pendente' => 0, 'cancelado' => 0];
                foreach ($contratos as $c) {
                    $key = strtolower($c->status);
                    if (isset($statusCounts[$key])) $statusCounts[$key]++;
                }
                $badges = [
                    'ativo'     => ['bg-emerald-100', 'text-emerald-700', '🟢'],
                    'concluido' => ['bg-blue-100',    'text-blue-700',    '✅'],
                    'pendente'  => ['bg-amber-100',   'text-amber-700',   '🕐'],
                    'cancelado' => ['bg-red-100',     'text-red-700',     '✖'],
                ];
            ?>
            <div class="flex gap-3 flex-wrap">
                <?php foreach ($statusCounts as $status => $count):
                    if ($count === 0) continue;
                    [$bg, $text, $icon] = $badges[$status];
                ?>
                <span class="text-xs font-semibold px-3 py-1 rounded-full <?= $bg ?> <?= $text ?>">
                    <?= $icon ?> <?= ucfirst($status) ?>: <?= $count ?>
                </span>
                <?php endforeach; ?>
            </div>
        </div>

        <?php if (!empty($contratos)): ?>

            <!-- Filter tabs -->
            <div class="flex gap-2 flex-wrap mb-8">
                <button onclick="filterContratos('todos')"
                    class="filter-btn active text-xs font-bold px-4 py-2 rounded-full border border-emerald-500 bg-emerald-500 text-white transition"
                    data-filter="todos">
                    Todos (<?= count($contratos) ?>)
                </button>
                <?php foreach ($statusCounts as $status => $count):
                    if ($count === 0) continue;
                ?>
                <button onclick="filterContratos('<?= $status ?>')"
                    class="filter-btn text-xs font-bold px-4 py-2 rounded-full border border-gray-200 text-gray-500 hover:border-emerald-400 hover:text-emerald-600 transition"
                    data-filter="<?= $status ?>">
                    <?= ucfirst($status) ?> (<?= $count ?>)
                </button>
                <?php endforeach; ?>
            </div>

            <!-- Contracts list -->
            <div class="flex flex-col gap-4" id="contratos-list">
                <?php foreach ($contratos as $c):
                    $statusColors = [
                        'ativo'     => 'bg-emerald-100 text-emerald-700',
                        'concluido' => 'bg-blue-100 text-blue-700',
                        'cancelado' => 'bg-red-100 text-red-700',
                        'pendente'  => 'bg-amber-100 text-amber-700',
                    ];
                    $statusBadge = $statusColors[strtolower($c->status)] ?? 'bg-gray-100 text-gray-600';
                    $inicio = date('d/m/Y', strtotime($c->data_inicio));
                    $fim    = date('d/m/Y', strtotime($c->data_fim));
                ?>
                <div class="contrato-card group bg-white rounded-3xl border border-gray-100 p-6 hover:shadow-xl hover:border-emerald-200 transition duration-300"
                     data-status="<?= strtolower(htmlspecialchars($c->status)) ?>">

                    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">

                        <!-- Left: icon + job title -->
                        <div class="flex items-center gap-4">
                            <div class="w-14 h-14 bg-emerald-100 text-emerald-700 rounded-2xl flex items-center justify-center text-2xl shrink-0 group-hover:scale-105 transition duration-200">
                                💼
                            </div>
                            <div>
                                <p class="font-extrabold text-gray-900 text-base group-hover:text-emerald-700 transition">
                                    <?= htmlspecialchars($c->trabalho_titulo) ?>
                                </p>
                                <p class="text-sm text-gray-400 mt-0.5">
                                    Contrato <span class="text-gray-500 font-medium">#<?= htmlspecialchars($c->id) ?></span>
                                </p>
                            </div>
                        </div>

                        <!-- Right: status badge + dates -->
                        <div class="flex flex-col items-start sm:items-end gap-2 shrink-0">
                            <span class="text-xs font-semibold px-3 py-1 rounded-full <?= $statusBadge ?>">
                                <?= htmlspecialchars(ucfirst($c->status)) ?>
                            </span>
                            <p class="text-xs text-gray-400 font-medium">
                                <?= $inicio ?> → <?= $fim ?>
                            </p>
                        </div>
                    </div>

                    <!-- Parties row -->
                    <div class="mt-5 pt-4 border-t border-gray-100 grid grid-cols-1 sm:grid-cols-2 gap-3">
                        <div class="flex items-center gap-3">
                            <div class="w-9 h-9 bg-gray-100 text-gray-500 rounded-xl flex items-center justify-center text-sm shrink-0">
                                👤
                            </div>
                            <div>
                                <p class="text-xs text-gray-400">Freelancer</p>
                                <p class="text-sm font-semibold text-gray-700"><?= htmlspecialchars($c->freelancer_nome) ?></p>
                            </div>
                        </div>
                        <div class="flex items-center gap-3">
                            <div class="w-9 h-9 bg-gray-100 text-gray-500 rounded-xl flex items-center justify-center text-sm shrink-0">
                                🏢
                            </div>
                            <div>
                                <p class="text-xs text-gray-400">Cliente</p>
                                <p class="text-sm font-semibold text-gray-700"><?= htmlspecialchars($c->cliente_nome) ?></p>
                            </div>
                        </div>
                    </div>

                    <!-- Optional: valor -->
                    <?php if (!empty($c->valor)): ?>
                    <div class="mt-3 flex items-center gap-2 text-xs text-gray-400">
                        <span>💰</span>
                        <span class="font-semibold text-gray-600">R$ <?= number_format((float)$c->valor, 2, ',', '.') ?></span>
                    </div>
                    <?php endif; ?>

                </div>
                <?php endforeach; ?>
            </div>

        <?php else: ?>

            <!-- Empty state -->
            <div class="bg-white rounded-3xl border border-gray-100 p-16 text-center">
                <p class="text-6xl mb-4">📋</p>
                <p class="text-lg font-extrabold text-gray-900 mb-2">Nenhum contrato encontrado</p>
                <p class="text-sm text-gray-400">Os contratos aparecerão aqui assim que forem criados.</p>
            </div>

        <?php endif; ?>

    </main>

    <footer class="bg-emerald-950 py-12 mt-16">
        <div class="max-w-6xl mx-auto px-6 text-center">
            <div class="text-2xl font-bold text-emerald-400 mb-4">Salo</div>
            <p class="text-emerald-100/50 text-sm">&copy; 2026 Salo — Cultivando Talentos.</p>
        </div>
    </footer>

    <script>
        function filterContratos(status) {
            document.querySelectorAll('.filter-btn').forEach(btn => {
                const isActive = btn.dataset.filter === status;
                btn.classList.toggle('bg-emerald-500',    isActive);
                btn.classList.toggle('text-white',         isActive);
                btn.classList.toggle('border-emerald-500', isActive);
                btn.classList.toggle('text-gray-500',     !isActive);
                btn.classList.toggle('border-gray-200',   !isActive);
            });

            document.querySelectorAll('.contrato-card').forEach(card => {
                card.style.display = (status === 'todos' || card.dataset.status === status) ? '' : 'none';
            });
        }
    </script>
</body>
</html>