<?php
/** @var array $contrato */
/** @var array $errors */
?>

<h2 class="mb-4">Editar Contrato #<?= $contrato['id'] ?></h2>

<?php if (!empty($errors)): ?>
    <div class="alert alert-danger">
        <ul class="mb-0">
            <?php foreach ($errors as $e): ?>
                <li><?= htmlspecialchars($e) ?></li>
            <?php endforeach; ?>
        </ul>
    </div>
<?php endif; ?>

<form method="POST" action="/contrato/update/<?= $contrato['id'] ?>">
    <div class="row">
        <div class="col-md-6 mb-3">
            <label for="data_inicio" class="form-label">Data de Início</label>
            <input type="date" name="data_inicio" id="data_inicio" class="form-control"
                   value="<?= htmlspecialchars(substr($contrato['data_inicio'], 0, 10)) ?>">
        </div>
        <div class="col-md-6 mb-3">
            <label for="data_fim" class="form-label">Data de Fim</label>
            <input type="date" name="data_fim" id="data_fim" class="form-control"
                   value="<?= htmlspecialchars(substr($contrato['data_fim'] ?? '', 0, 10)) ?>">
        </div>
    </div>

    <div class="mb-3">
        <label for="status" class="form-label">Status</label>
        <select name="status" id="status" class="form-select">
            <?php foreach (['ativo', 'concluido', 'cancelado'] as $s): ?>
                <option value="<?= $s ?>" <?= $contrato['status'] === $s ? 'selected' : '' ?>>
                    <?= ucfirst($s) ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>

    <div class="d-flex gap-2">
        <button type="submit" class="btn btn-warning">Atualizar</button>
        <a href="/contratos" class="btn btn-secondary">Cancelar</a>
    </div>
</form>
