<?php
/** @var array $contrato */
/** @var array $errors */
/** @var array $old */
?>

<h2 class="mb-1">Nova Avaliação</h2>
<p class="text-muted mb-4">Contrato #<?= $contrato['id'] ?></p>

<?php if (!empty($errors)): ?>
    <div class="alert alert-danger">
        <ul class="mb-0">
            <?php foreach ($errors as $e): ?>
                <li><?= htmlspecialchars($e) ?></li>
            <?php endforeach; ?>
        </ul>
    </div>
<?php endif; ?>

<form method="POST" action="/avaliacao/create/<?= $contrato['id'] ?>">
    <input type="hidden" name="contract_id" value="<?= $contrato['id'] ?>">

    <div class="mb-3">
        <label for="avaliado_id" class="form-label">Avaliar utilizador (ID) <span class="text-danger">*</span></label>
        <input type="number" name="avaliado_id" id="avaliado_id" class="form-control"
               value="<?= htmlspecialchars($old['avaliado_id'] ?? '') ?>" required min="1">
        <div class="form-text">Insira o ID do utilizador a avaliar (freelancer ou cliente).</div>
    </div>

    <div class="mb-3">
        <label class="form-label">Pontuação <span class="text-danger">*</span></label>
        <div class="d-flex gap-3">
            <?php for ($i = 1; $i <= 5; $i++): ?>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="pontuacao"
                           id="pontuacao_<?= $i ?>" value="<?= $i ?>"
                           <?= ($old['pontuacao'] ?? '') == $i ? 'checked' : '' ?> required>
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
                  placeholder="Partilhe a sua experiência..."><?= htmlspecialchars($old['comentario'] ?? '') ?></textarea>
    </div>

    <div class="d-flex gap-2">
        <button type="submit" class="btn btn-primary">Submeter Avaliação</button>
        <a href="/contratos" class="btn btn-secondary">Cancelar</a>
    </div>
</form>
