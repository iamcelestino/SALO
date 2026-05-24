<?php
/** @var array $freelancer */
/** @var array $skills */
/** @var array $freelancerSkills */
/** @var array $errors */
?>

<h2 class="mb-1">Adicionar Skill</h2>
<p class="text-muted mb-4">Freelancer: <?= htmlspecialchars($freelancer['titulo_profissional'] ?? 'ID ' . $freelancer['id']) ?></p>

<?php if (!empty($errors)): ?>
    <div class="alert alert-danger">
        <ul class="mb-0">
            <?php foreach ($errors as $e): ?>
                <li><?= htmlspecialchars($e) ?></li>
            <?php endforeach; ?>
        </ul>
    </div>
<?php endif; ?>

<form method="POST" action="/freelancer/<?= $freelancer['id'] ?>/skills/add">
    <div class="mb-3">
        <label for="skill_id" class="form-label">Skill <span class="text-danger">*</span></label>
        <select name="skill_id" id="skill_id" class="form-select" required>
            <option value="">-- Selecione --</option>
            <?php
            $existingIds = array_column($freelancerSkills, 'skill_id');
            foreach ($skills as $s):
                if (in_array($s['id'], $existingIds)) continue;
            ?>
                <option value="<?= $s['id'] ?>"><?= htmlspecialchars($s['nome']) ?></option>
            <?php endforeach; ?>
        </select>
    </div>

    <div class="d-flex gap-2">
        <button type="submit" class="btn btn-primary">Adicionar</button>
        <a href="/freelancer/<?= $freelancer['id'] ?>/skills" class="btn btn-secondary">Voltar</a>
    </div>
</form>

<?php if (!empty($freelancerSkills)): ?>
    <hr class="my-4">
    <h5>Skills actuais</h5>
    <ul class="list-group">
        <?php foreach ($freelancerSkills as $fs): ?>
            <li class="list-group-item"><?= htmlspecialchars($fs['skill_nome']) ?></li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>
