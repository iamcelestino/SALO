<?php
/** @var array $avaliacao */
/** @var array $errors */
?>

<h2 class="mb-1">Editar Avaliação</h2>
<p class="text-muted mb-4">Contrato #<?= $avaliacao['contract_id'] ?></p>

<?php if (!empty($errors)): ?>
    <div class="alert alert-danger">
        <ul class="mb-0">
            <?php foreach ($errors as $e): ?>
                <li><?= htmlspecialchars($e) ?></li>
            <?php endforeach; ?>
        </ul>
    </div>
<?php endif; ?>

<form method="POST" action="/avaliacao/update/<?= $avaliacao['id'] ?>">
    <div class="mb-3">
        <label class="form-label">Pontuação <span class="text-danger">*</span></label>
        <div class="d-flex gap-3">
            <?php for ($i = 1; $i <= 5; $i++): ?>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="pontuacao"
                           id="pontuacao_<?= $i ?>" value="<?= $i ?>"
                           <?= (int) $avaliacao['pontuacao'] === $i ? 'checked' : '' ?> required>
                    <label class="form-check-label" for="pontuacao_<?= $i ?>">
                        <?= $i ?> ★
                    </label>
                </div>
            <?php endfor; ?>
        </div>
    </div>

    <div class="mb-3">
        <label for="comentario" class="form-label">Comentário</label>
        <textarea name="comentario" id="comentario" class="form-control" rows="4"
        ><?= htmlspecialchars($avaliacao['comentario'] ?? '') ?></textarea>
    </div>

    <div class="d-flex gap-2">
        <button type="submit" class="btn btn-warning">Atualizar</button>
        <a href="/contratos" class="btn btn-secondary">Cancelar</a>
    </div>
</form>
