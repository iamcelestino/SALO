<?php $this->view('partials/head') ?>
<body class="bg-gray-50 font-sans text-gray-900">
    <?php $this->view('partials/nav') ?>

    <main class="max-w-5xl mx-auto py-16 px-6">

        <!-- Back button -->
        <a href="/freelancers" class="inline-flex items-center gap-2 text-sm text-gray-400 hover:text-emerald-600 font-bold transition mb-10">
            ← Voltar à lista
        </a>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">

            <!-- LEFT: Profile Card -->
            <div class="lg:col-span-1 flex flex-col gap-6">

                <div class="bg-white rounded-3xl border border-gray-100 p-8 hover:shadow-xl transition duration-300">
                    <?php
                        $nameParts = explode(' ', trim($freelancer->nome));
                        $initials  = strtoupper(mb_substr($nameParts[0], 0, 1));
                        if (isset($nameParts[1])) $initials .= strtoupper(mb_substr($nameParts[1], 0, 1));

                        $nivelColors = [
                            'junior'        => 'bg-blue-100 text-blue-700',
                            'intermediario' => 'bg-amber-100 text-amber-700',
                            'senior'        => 'bg-emerald-100 text-emerald-700',
                        ];
                        $nivelBadge = $nivelColors[strtolower($freelancer->nivel)] ?? 'bg-gray-100 text-gray-600';
                    ?>
                    <div class="flex flex-col items-center text-center mb-6">
                        <div class="w-24 h-24 bg-emerald-100 text-emerald-700 rounded-3xl flex items-center justify-center text-3xl font-bold mb-4">
                            <?= htmlspecialchars($initials) ?>
                        </div>
                        <h1 class="text-2xl font-extrabold text-gray-900"><?= htmlspecialchars($freelancer->nome) ?></h1>
                        <p class="text-emerald-600 font-semibold text-sm mt-1"><?= htmlspecialchars($freelancer->titulo_profissional) ?></p>
                    </div>

                    <div class="flex flex-wrap justify-center gap-2 mb-6">
                        <span class="text-xs font-semibold px-3 py-1 rounded-full <?= $nivelBadge ?>">
                            <?= htmlspecialchars(ucfirst($freelancer->nivel)) ?>
                        </span>
                        <span class="text-xs font-semibold px-3 py-1 rounded-full bg-gray-100 text-gray-600">
                            <?= $freelancer->disponibilidade === 'full-time' ? '🟢 Full-time' : '🟡 Part-time' ?>
                        </span>
                    </div>

                    <div class="border-t border-gray-100 pt-6 space-y-3">
                        <div class="flex items-center gap-3 text-sm text-gray-500">
                            <span class="text-lg">✉️</span>
                            <span class="truncate"><?= htmlspecialchars($freelancer->email) ?></span>
                        </div>
                        <div class="flex items-center gap-3 text-sm text-gray-500">
                            <span class="text-lg">🪪</span>
                            <span>ID #<?= htmlspecialchars($freelancer->id) ?></span>
                        </div>
                    </div>
                </div>

                <!-- Bio Card -->
                <div class="bg-white rounded-3xl border border-gray-100 p-8 hover:shadow-xl transition duration-300">
                    <h2 class="text-sm font-bold text-gray-400 uppercase tracking-widest mb-3">Sobre</h2>
                    <p class="text-gray-600 text-sm leading-relaxed">
                        <?= htmlspecialchars($freelancer->bio) ?>
                    </p>
                </div>

            </div>

            <!-- RIGHT: Contracts -->
            <div class="lg:col-span-2 flex flex-col gap-6">

                <div class="bg-white rounded-3xl border border-gray-100 p-8 hover:shadow-xl transition duration-300">
                    <h2 class="text-sm font-bold text-gray-400 uppercase tracking-widest mb-6">Contratos</h2>

                    <?php if (!empty($contrato)): ?>
                        <div class="flex flex-col gap-4">
                            <?php foreach ($contrato as $c): ?>
                            <?php
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
                            <div class="group flex flex-col sm:flex-row sm:items-center justify-between gap-4 p-6 rounded-2xl border border-gray-100 hover:border-emerald-200 hover:bg-emerald-50/40 transition duration-200">
                                <div class="flex items-center gap-4">
                                    <div class="w-12 h-12 bg-emerald-100 text-emerald-700 rounded-2xl flex items-center justify-center text-lg shrink-0">
                                        💼
                                    </div>
                                    <div>
                                        <p class="font-bold text-gray-900 group-hover:text-emerald-700 transition">
                                            <?= htmlspecialchars($c->trabalho_titulo) ?>
                                        </p>
                                        <p class="text-sm text-gray-400 mt-0.5">
                                            Cliente: <span class="text-gray-600 font-medium"><?= htmlspecialchars($c->cliente_nome) ?></span>
                                        </p>
                                    </div>
                                </div>
                                <div class="flex flex-col items-start sm:items-end gap-2 shrink-0">
                                    <span class="text-xs font-semibold px-3 py-1 rounded-full <?= $statusBadge ?>">
                                        <?= htmlspecialchars(ucfirst($c->status)) ?>
                                    </span>
                                    <p class="text-xs text-gray-400">
                                        <?= $inicio ?> → <?= $fim ?>
                                    </p>
                                </div>
                            </div>
                            <?php endforeach; ?>
                        </div>
                    <?php else: ?>
                        <div class="text-center py-16 text-gray-300">
                            <p class="text-5xl mb-3">📋</p>
                            <p class="text-sm font-semibold">Nenhum contrato encontrado.</p>
                        </div>
                    <?php endif; ?>
                </div>

            </div>
        </div>
    </main>

    <footer class="bg-emerald-950 py-12 mt-16">
        <div class="max-w-6xl mx-auto px-6 text-center">
            <div class="text-2xl font-bold text-emerald-400 mb-4">Salo</div>
            <p class="text-emerald-100/50 text-sm">&copy; 2026 Salo — Cultivando Talentos.</p>
        </div>
    </footer>
</body>
</html>