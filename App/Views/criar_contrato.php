<?php
/** @var array $trabalhos */
/** @var array $freelancers */
/** @var array $clientes */
/** @var array $errors */
/** @var array $old */
?>

<h2 class="mb-4">Novo Contrato</h2>

<?php if (!empty($errors)): ?>
    <div class="alert alert-danger">
        <ul class="mb-0">
            <?php foreach ($errors as $e): ?>
                <li><?= htmlspecialchars($e) ?></li>
            <?php endforeach; ?>
        </ul>
    </div>
<?php endif; ?>

<form method="POST" action="/contratos/create">
    <div class="mb-3">
        <label for="trabalho_id" class="form-label">Trabalho <span class="text-danger">*</span></label>
        <select name="trabalho_id" id="trabalho_id" class="form-select" required>
            <option value="">-- Selecione --</option>
            <?php foreach ($trabalhos as $t): ?>
                <option value="<?= $t['id'] ?>" <?= ($old['trabalho_id'] ?? '') == $t['id'] ? 'selected' : '' ?>>
                    <?= htmlspecialchars($t['titulo']) ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>

    <div class="mb-3">
        <label for="freelancer_id" class="form-label">Freelancer <span class="text-danger">*</span></label>
        <select name="freelancer_id" id="freelancer_id" class="form-select" required>
            <option value="">-- Selecione --</option>
            <?php foreach ($freelancers as $f): ?>
                <option value="<?= $f['id'] ?>" <?= ($old['freelancer_id'] ?? '') == $f['id'] ? 'selected' : '' ?>>
                    <?= htmlspecialchars($f['titulo_profissional'] ?? $f['id']) ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>

    <div class="mb-3">
        <label for="client_id" class="form-label">Cliente <span class="text-danger">*</span></label>
        <select name="client_id" id="client_id" class="form-select" required>
            <option value="">-- Selecione --</option>
            <?php foreach ($clientes as $cl): ?>
                <option value="<?= $cl['id'] ?>" <?= ($old['client_id'] ?? '') == $cl['id'] ? 'selected' : '' ?>>
                    <?= htmlspecialchars($cl['empresa_nome'] ?? $cl['id']) ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>

    <div class="row">
        <div class="col-md-6 mb-3">
            <label for="data_inicio" class="form-label">Data de Início <span class="text-danger">*</span></label>
            <input type="date" name="data_inicio" id="data_inicio" class="form-control"
                   value="<?= htmlspecialchars($old['data_inicio'] ?? '') ?>" required>
        </div>
        <div class="col-md-6 mb-3">
            <label for="data_fim" class="form-label">Data de Fim</label>
            <input type="date" name="data_fim" id="data_fim" class="form-control"
                   value="<?= htmlspecialchars($old['data_fim'] ?? '') ?>">
        </div>
    </div>

    <div class="mb-3">
        <label for="status" class="form-label">Status</label>
        <select name="status" id="status" class="form-select">
            <?php foreach (['ativo', 'concluido', 'cancelado'] as $s): ?>
                <option value="<?= $s ?>" <?= ($old['status'] ?? 'ativo') === $s ? 'selected' : '' ?>>
                    <?= ucfirst($s) ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>

    <div class="d-flex gap-2">
        <button type="submit" class="btn btn-primary">Criar Contrato</button>
        <a href="/contratos" class="btn btn-secondary">Cancelar</a>
    </div>
</form>
