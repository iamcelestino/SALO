<?php $this->view('partials/head') ?>
<body class="bg-gray-50 font-sans text-gray-900">
    <?php $this->view('partials/nav') ?>
    <header class="bg-white border-b border-gray-100 py-16">
        <div class="max-w-6xl mx-auto px-6 text-center">
            <h1 class="text-4xl font-extrabold text-gray-900 mb-4">Encontre os melhores freelancers</h1>
            <p class="text-gray-500 text-lg max-w-2xl mx-auto">
                Conecte-se com profissionais qualificados e encontre o talento ideal para o seu próximo projeto.
            </p>
            <div class="mt-10 max-w-2xl mx-auto relative">
                <input type="text" placeholder="Buscar freelancer pelo nome ou área..." class="w-full pl-12 pr-4 py-4 rounded-2xl border border-gray-200 focus:ring-4 focus:ring-emerald-100 focus:border-emerald-500 outline-none transition">
                <span class="absolute left-4 top-1/2 -translate-y-1/2 text-gray-400">🔍</span>
            </div>
        </div>
    </header>

    <main class="max-w-6xl mx-auto py-16 px-6">
        <div class="flex flex-wrap gap-4 mb-12 justify-center">
            <button class="px-6 py-2 bg-emerald-600 text-white rounded-full text-sm font-bold shadow-md shadow-emerald-100">Todos</button>
            <button class="px-6 py-2 bg-white text-gray-600 rounded-full text-sm font-bold border border-gray-200 hover:border-emerald-500 transition">Júnior</button>
            <button class="px-6 py-2 bg-white text-gray-600 rounded-full text-sm font-bold border border-gray-200 hover:border-emerald-500 transition">Intermediário</button>
            <button class="px-6 py-2 bg-white text-gray-600 rounded-full text-sm font-bold border border-gray-200 hover:border-emerald-500 transition">Sénior</button>
        </div>

        <?php if (!empty($freelancer)): ?>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <?php foreach ($freelancer as $index => $f): ?>
            <?php
                // Initials from full name
                $nameParts = explode(' ', trim($f->nome));
                $initials = strtoupper(mb_substr($nameParts[0], 0, 1));
                if (isset($nameParts[1])) {
                    $initials .= strtoupper(mb_substr($nameParts[1], 0, 1));
                }

                // Nivel badge style
                $nivelColors = [
                    'junior'        => 'bg-blue-100 text-blue-700',
                    'intermediario' => 'bg-amber-100 text-amber-700',
                    'senior'        => 'bg-emerald-100 text-emerald-700',
                ];
                $nivelBadge = $nivelColors[strtolower($f->nivel)] ?? 'bg-gray-100 text-gray-600';

                // Avatar colors cycling
                $avatarColors = [
                    'bg-emerald-100 text-emerald-700',
                    'bg-teal-100 text-teal-700',
                    'bg-amber-100 text-amber-700',
                    'bg-sky-100 text-sky-700',
                    'bg-violet-100 text-violet-700',
                ];
                $avatarColor = $avatarColors[$index % count($avatarColors)];
            ?>
            <div class="bg-white rounded-3xl border border-gray-100 p-8 hover:shadow-2xl transition duration-300 group">
                <div class="flex items-center gap-4 mb-6">
                    <div class="w-16 h-16 <?= $avatarColor ?> rounded-2xl flex items-center justify-center text-xl font-bold shrink-0">
                        <?= htmlspecialchars($initials) ?>
                    </div>
                    <div>
                        <h3 class="text-lg font-bold group-hover:text-emerald-600 transition leading-tight">
                            <?= htmlspecialchars($f->nome) ?>
                        </h3>
                        <p class="text-sm text-gray-400"><?= htmlspecialchars($f->titulo_profissional) ?></p>
                    </div>
                </div>

                <p class="text-gray-600 text-sm leading-relaxed mb-6 line-clamp-3">
                    <?= htmlspecialchars($f->bio) ?>
                </p>

                <div class="flex flex-wrap gap-2 mb-6">
                    <span class="text-xs font-semibold px-3 py-1 rounded-full <?= $nivelBadge ?>">
                        <?= htmlspecialchars(ucfirst($f->nivel)) ?>
                    </span>
                    <span class="text-xs font-semibold px-3 py-1 rounded-full bg-gray-100 text-gray-600">
                        <?= $f->disponibilidade === 'full-time' ? '🟢 Full-time' : '🟡 Part-time' ?>
                    </span>
                </div>

                <div class="flex items-center justify-between pt-6 border-t border-gray-100">
                    <span class="text-gray-400 text-xs truncate max-w-[140px]" title="<?= htmlspecialchars($f->email) ?>">
                        ✉️ <?= htmlspecialchars($f->email) ?>
                    </span>
                    <a href="/freelancer/perfil/<?= urlencode($f->id) ?>" class="text-gray-400 group-hover:text-emerald-600 font-bold text-sm flex items-center gap-1 transition">
                        Ver Perfil <span>→</span>
                    </a>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
        <?php else: ?>
        <div class="text-center py-24 text-gray-400">
            <p class="text-5xl mb-4">🔍</p>
            <p class="text-lg font-semibold">Nenhum freelancer encontrado.</p>
        </div>
        <?php endif; ?>
    </main>
    <footer class="bg-emerald-950 py-12">
        <div class="max-w-6xl mx-auto px-6 text-center">
            <div class="text-2xl font-bold text-emerald-400 mb-4">Salo</div>
            <p class="text-emerald-100/50 text-sm">&copy; 2026 Salo — Cultivando Talentos.</p>
        </div>
    </footer>
</body>
</html>