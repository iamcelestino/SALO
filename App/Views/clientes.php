<?php $this->view('partials/head') ?>
<body class="bg-gray-50 font-sans text-gray-900">
    <?php $this->view('partials/nav') ?>

    <header class="bg-white border-b border-gray-100 py-16">
        <div class="max-w-6xl mx-auto px-6 text-center">
            <h1 class="text-4xl font-extrabold text-gray-900 mb-4">Empresas de Destaque</h1>
            <p class="text-gray-500 text-lg max-w-2xl mx-auto">
                Conecte-se com as organizações que estão moldando o futuro e encontre o lugar ideal para o seu próximo passo profissional.
            </p>
            <div class="mt-10 max-w-2xl mx-auto relative">
                <input
                    type="text"
                    id="searchInput"
                    placeholder="Buscar empresa pelo nome..."
                    class="w-full pl-12 pr-4 py-4 rounded-2xl border border-gray-200 focus:ring-4 focus:ring-emerald-100 focus:border-emerald-500 outline-none transition"
                >
                <span class="absolute left-4 top-1/2 -translate-y-1/2 text-gray-400">🔍</span>
            </div>
        </div>
    </header>

    <main class="max-w-6xl mx-auto py-16 px-6">

        <!-- ── Sector filters ── -->
        <?php
            $sectores = array_unique(
                array_map(
                    fn($cl) => htmlspecialchars((is_object($cl) ? $cl->sector : $cl['sector']) ?? ''),
                    (array) $clientes
                )
            );
            $sectores = array_filter($sectores);
        ?>
        <div class="flex flex-wrap gap-4 mb-12 justify-center" id="filterBar">
            <button
                onclick="filterSector('all')"
                data-sector="all"
                class="filter-btn px-6 py-2 bg-emerald-600 text-white rounded-full text-sm font-bold shadow-md shadow-emerald-100 transition"
            >Todas</button>
            <?php foreach ($sectores as $sector): ?>
            <button
                onclick="filterSector('<?= $sector ?>')"
                data-sector="<?= $sector ?>"
                class="filter-btn px-6 py-2 bg-white text-gray-600 rounded-full text-sm font-bold border border-gray-200 hover:border-emerald-500 transition"
            ><?= $sector ?></button>
            <?php endforeach; ?>
        </div>

        <!-- ── Clientes grid ── -->
        <?php if (!empty($clientes)): ?>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8" id="clientesGrid">

            <?php foreach ((array) $clientes as $cliente): ?>
            <?php
                $cl      = is_object($cliente) ? $cliente : (object) $cliente;
                $empresa = $cl->empresa_nome ?? $cl->nome ?? 'Empresa';
                $sector  = htmlspecialchars($cl->sector ?? '—');
                $nif     = htmlspecialchars($cl->nif ?? '');
                $email   = htmlspecialchars($cl->email ?? '');
                $total   = (int) ($cl->total_trabalhos ?? 0);

                // Initials from empresa name
                $words    = preg_split('/\s+/', trim($empresa));
                $initials = strtoupper(
                    count($words) >= 2
                        ? substr($words[0], 0, 1) . substr($words[1], 0, 1)
                        : substr($empresa, 0, 2)
                );

                // Color based on first char
                $colors = [
                    'A' => 'bg-emerald-100 text-emerald-700',
                    'B' => 'bg-blue-100 text-blue-700',
                    'C' => 'bg-amber-100 text-amber-700',
                    'D' => 'bg-purple-100 text-purple-700',
                    'E' => 'bg-rose-100 text-rose-700',
                    'F' => 'bg-teal-100 text-teal-700',
                ];
                $firstChar  = strtoupper(substr($empresa, 0, 1));
                $colorClass = $colors[$firstChar] ?? 'bg-gray-100 text-gray-700';
            ?>
            <div
                class="cliente-card bg-white rounded-3xl border border-gray-100 p-8 hover:shadow-2xl transition duration-300 group flex flex-col"
                data-sector="<?= $sector ?>"
                data-nome="<?= strtolower(htmlspecialchars($empresa)) ?>"
            >
                <!-- Card header -->
                <div class="flex items-center gap-4 mb-6">
                    <div class="w-16 h-16 <?= $colorClass ?> rounded-2xl flex items-center justify-center text-2xl font-bold flex-shrink-0">
                        <?= $initials ?>
                    </div>
                    <div class="min-w-0">
                        <h3 class="text-xl font-bold group-hover:text-emerald-600 transition truncate">
                            <?= htmlspecialchars($empresa) ?>
                        </h3>
                        <p class="text-sm text-gray-400 truncate"><?= $sector ?></p>
                    </div>
                </div>

                <!-- Details -->
                <div class="space-y-2 mb-6 flex-1">
                    <?php if ($email): ?>
                    <div class="flex items-center gap-2 text-sm text-gray-500">
                        <span class="text-gray-300">✉</span>
                        <?= $email ?>
                    </div>
                    <?php endif; ?>
                    <?php if ($nif): ?>
                    <div class="flex items-center gap-2 text-sm text-gray-500">
                        <span class="text-gray-300">#</span>
                        NIF: <?= $nif ?>
                    </div>
                    <?php endif; ?>
                </div>

                <!-- Footer -->
                <div class="flex items-center justify-between pt-6 border-t border-gray-50">
                    <?php if ($total > 0): ?>
                        <span class="text-emerald-600 font-bold text-sm"><?= $total ?> Trabalho<?= $total !== 1 ? 's' : '' ?></span>
                    <?php else: ?>
                        <span class="text-gray-300 text-sm">Sem trabalhos</span>
                    <?php endif; ?>
                    <a
                        href="/cliente/perfil/<?= $cl->id ?? '' ?>"
                        class="text-gray-400 group-hover:text-emerald-600 font-bold text-sm flex items-center gap-1 transition"
                    >
                        Ver Perfil <span>→</span>
                    </a>
                </div>
            </div>
            <?php endforeach; ?>

        </div>

        <!-- Empty state after filter -->
        <div id="emptyState" class="hidden text-center py-24 text-gray-400">
            <div class="text-5xl mb-4">🏢</div>
            <p class="text-lg font-medium">Nenhuma empresa encontrada.</p>
            <p class="text-sm mt-1">Tente outro sector ou termo de busca.</p>
        </div>

        <?php else: ?>
        <div class="text-center py-24 text-gray-400">
            <div class="text-5xl mb-4">🏢</div>
            <p class="text-lg font-medium">Nenhuma empresa registada ainda.</p>
        </div>
        <?php endif; ?>

    </main>

    <footer class="bg-emerald-950 py-12">
        <div class="max-w-6xl mx-auto px-6 text-center">
            <div class="text-2xl font-bold text-emerald-400 mb-4">Salo</div>
            <p class="text-emerald-100/50 text-sm">&copy; <?= date('Y') ?> Salo — Cultivando Talentos.</p>
        </div>
    </footer>

    <script>
        function filterSector(sector) {
            document.querySelectorAll('.filter-btn').forEach(btn => {
                const active = btn.dataset.sector === sector;
                btn.classList.toggle('bg-emerald-600', active);
                btn.classList.toggle('text-white', active);
                btn.classList.toggle('shadow-md', active);
                btn.classList.toggle('shadow-emerald-100', active);
                btn.classList.toggle('bg-white', !active);
                btn.classList.toggle('text-gray-600', !active);
            });
            applyFilters();
        }

        function applyFilters() {
            const activeSector = document.querySelector('.filter-btn.bg-emerald-600')?.dataset.sector ?? 'all';
            const search       = document.getElementById('searchInput').value.toLowerCase().trim();
            let   visible      = 0;

            document.querySelectorAll('.cliente-card').forEach(card => {
                const matchSector = activeSector === 'all' || card.dataset.sector === activeSector;
                const matchSearch = !search || card.dataset.nome.includes(search);
                const show        = matchSector && matchSearch;
                card.classList.toggle('hidden', !show);
                if (show) visible++;
            });

            document.getElementById('emptyState')?.classList.toggle('hidden', visible > 0);
        }

        document.getElementById('searchInput').addEventListener('input', applyFilters);
    </script>
</body>
</html>