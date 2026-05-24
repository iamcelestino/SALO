<?php /** @var array $contratos */ ?>
<?php if (!empty($_SESSION['flash'])): ?>
    <div class="alert alert-<?= $_SESSION['flash']['type'] ?>">
        <?= htmlspecialchars($_SESSION['flash']['msg']) ?>
    </div>
    <?php unset($_SESSION['flash']); ?>
<?php endif; ?>

<div class="d-flex justify-content-between align-items-center mb-4">
    <h2>Contratos</h2>
    <?php if (($_SESSION['user']['role'] ?? '') === 'admin'): ?>
        <a href="/contratos/create" class="btn btn-primary">+ Novo Contrato</a>
    <?php endif; ?>
</div>

<?php if (empty($contratos)): ?>
    <p class="text-muted">Nenhum contrato encontrado.</p>
<?php else: ?>
    <table class="table table-striped table-hover">
        <thead class="table-dark">
            <tr>
                <th>#</th>
                <th>Trabalho</th>
                <th>Freelancer</th>
                <th>Cliente</th>
                <th>Início</th>
                <th>Fim</th>
                <th>Status</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($contratos as $c): ?>
                <tr>
                    <td><?= $c['id'] ?></td>
                    <td><?= htmlspecialchars($c['trabalho_titulo'] ?? $c['trabalho_id']) ?></td>
                    <td><?= htmlspecialchars($c['freelancer_nome'] ?? $c['freelancer_id']) ?></td>
                    <td><?= htmlspecialchars($c['cliente_nome']    ?? $c['client_id']) ?></td>
                    <td><?= htmlspecialchars($c['data_inicio']) ?></td>
                    <td><?= htmlspecialchars($c['data_fim'] ?? '-') ?></td>
                    <td>
                        <span class="badge bg-<?= match($c['status']) {
                            'ativo'      => 'success',
                            'concluido'  => 'primary',
                            'cancelado'  => 'danger',
                            default      => 'secondary'
                        } ?>">
                            <?= ucfirst(htmlspecialchars($c['status'])) ?>
                        </span>
                    </td>
                    <td>
                        <a href="/contrato/update/<?= $c['id'] ?>" class="btn btn-sm btn-warning">Editar</a>
                        <a href="/avaliacao/create/<?= $c['id'] ?>" class="btn btn-sm btn-info">Avaliar</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<?php endif; ?>
