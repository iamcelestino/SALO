<?php
/** @var array  $freelancer */
/** @var array  $skills */
/** @var array  $freelancerSkills */
/** @var int[]  $selectedIds */
?>
<?php if (!empty($_SESSION['flash'])): ?>
    <div class="alert alert-<?= $_SESSION['flash']['type'] ?>">
        <?= htmlspecialchars($_SESSION['flash']['msg']) ?>
    </div>
    <?php unset($_SESSION['flash']); ?>
<?php endif; ?>

<h2 class="mb-1">Skills do Freelancer</h2>
<p class="text-muted mb-4">Perfil: <?= htmlspecialchars($freelancer['titulo_profissional'] ?? 'ID ' . $freelancer['id']) ?></p>

<form method="POST" action="/freelancer/<?= $freelancer['id'] ?>/skills/sync">
    <div class="mb-4">
        <label class="form-label fw-semibold">Selecione as Skills</label>
        <div class="row g-2">
            <?php foreach ($skills as $s): ?>
                <div class="col-sm-6 col-md-4">
                    <div class="form-check">
                        <input
                            class="form-check-input"
                            type="checkbox"
                            name="skill_ids[]"
                            id="skill_<?= $s['id'] ?>"
                            value="<?= $s['id'] ?>"
                            <?= in_array((int) $s['id'], (array) $selectedIds) ? 'checked' : '' ?>
                        >
                        <label class="form-check-label" for="skill_<?= $s['id'] ?>">
                            <?= htmlspecialchars($s['nome']) ?>
                        </label>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

    <div class="d-flex gap-2">
        <button type="submit" class="btn btn-primary">Guardar Skills</button>
        <a href="/freelancer" class="btn btn-secondary">Voltar</a>
    </div>
</form>
