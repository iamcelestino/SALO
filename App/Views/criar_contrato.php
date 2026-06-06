<?php
/** @var stdClass $trabalho */
/** @var array $errors */

$statusOptions = ['ativo', 'em_andamento', 'concluido', 'cancelado'];
?>
<?php $this->view('partials/head') ?>
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

<form method="POST" action="/contrato/create/<?= $trabalho->id_trabalho ?>">

    <div class="mb-3">
        <label for="trabalho_id" class="form-label">
            Trabalho <span class="text-danger">*</span>
        </label>
        <select name="trabalho_id" id="trabalho_id" class="form-select" required>
            <option value="">-- Selecione --</option>
            <option value="<?= $trabalho->id_trabalho ?>" selected>
                <?= htmlspecialchars($trabalho->titulo) ?>
            </option>
        </select>
    </div>

    <div class="mb-3">
        <label for="freelancer_id" class="form-label">
            Freelancer <span class="text-danger">*</span>
        </label>
        <select name="freelancer_id" id="freelancer_id" class="form-select" required>
            <option value="">-- Selecione --</option>
            <option value="<?= $trabalho->freelancer_id ?>" selected>
                <?= htmlspecialchars($trabalho->nome_freelancer) ?>
                <?php if (!empty($trabalho->especialidade_freelancer)): ?>
                    — <?= htmlspecialchars($trabalho->especialidade_freelancer) ?>
                <?php endif; ?>
            </option>
        </select>
    </div>

    <div class="mb-3">
        <label for="client_id" class="form-label">
            Cliente <span class="text-danger">*</span>
        </label>
        <select name="client_id" id="client_id" class="form-select" required>
            <option value="">-- Selecione --</option>
            <option value="<?= $trabalho->cliente_id ?>" selected>
                Cliente #<?= $trabalho->cliente_id ?>
            </option>
        </select>
    </div>

    <div class="row">
        <div class="col-md-6 mb-3">
            <label for="data_inicio" class="form-label">
                Data de Início <span class="text-danger">*</span>
            </label>
            <input type="date" name="data_inicio" id="data_inicio"
                   class="form-control"
                   value="<?= htmlspecialchars($old['data_inicio'] ?? '') ?>"
                   required>
        </div>
        <div class="col-md-6 mb-3">
            <label for="data_fim" class="form-label">Data de Fim</label>
            <input type="date" name="data_fim" id="data_fim"
                   class="form-control"
                   value="<?= htmlspecialchars($old['data_fim'] ?? '') ?>">
        </div>
    </div>

    <div class="mb-3">
        <label for="status" class="form-label">Status</label>
        <select name="status" id="status" class="form-select">
                <option value="ativo">Activo</option>
                 <option value="concluido">Concluido</option>
                  <option value="cancelado">Cancelado</option>
        </select>
    </div>

    <div class="d-flex gap-2">
        <button type="submit" class="btn btn-primary">Criar Contrato</button>
        <a href="/contratos" class="btn btn-secondary">Cancelar</a>
    </div>

</form>