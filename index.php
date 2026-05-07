<?php
require 'dados.php';
require 'header.php'; // Use require conforme solicitado[cite: 1]

$categoriaSelecionada = $_GET['categoria'] ?? 'Todas';

$escolhido = array_filter($itens, function($item) use ($categoriaSelecionada) {
    return $categoriaSelecionada === 'Todas' || $item['modalidade'] === $categoriaSelecionada;
});
?>

<div class="container py-5">
    <div class="text-center mb-4">
        <h1 class="fw-bold text-primary">Academia Fit</h1>
        <p class="text-muted">Escolha sua modalidade favorita</p>
    </div>

    <div class="d-flex flex-wrap gap-2 justify-content-center mb-4">
        <a href="index.php?categoria=Todas" class="btn btn-outline-secondary <?= $categoriaSelecionada === 'Todas' ? 'active' : '' ?>">Todas</a>
        <?php foreach ($modalidades as $mod): ?>
            <a href="index.php?categoria=<?= urlencode($mod) ?>" 
               class="btn btn-outline-secondary <?= $categoriaSelecionada === $mod ? 'active' : '' ?>">
               <?= htmlspecialchars($mod) ?>
            </a>
        <?php endforeach; ?>
    </div>


    <p class="text-muted"><?= count($escolhido) ?> modalidades encontradas.</p>

    <div class="card shadow border-0">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover align-middle">
                    <thead class="table-dark">
                        <tr>
                            <th>Atividade</th>
                            <th>Modalidade</th>
                            <th>Mensalidade</th>
                            <th>Vagas</th>
                            <th>Status</th>
                            <th>Ação</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($escolhido as $item): ?>
                        <tr class="<?= $item['vagas_turma'] <= 0 ? 'table-light opacity-75' : '' ?>">
                            <td><?= htmlspecialchars($item["nome"]) ?></td>
                            <td><?= htmlspecialchars($item["modalidade"]) ?></td>
                            <td>R$ <?= number_format($item["mensalidade"], 2, ',', '.') ?></td>
                            <td><?= $item["vagas_turma"] ?></td>
                            <td>
                                <?php if ($item['vagas_turma'] > 0): ?>
                                    <span class="badge bg-success">Disponível</span>
                                <?php else: ?>
                                    <span class="badge bg-danger">Esgotado</span>
                                <?php endif; ?>
                            </td>
                            <td>
                                <?php if ($item['vagas_turma'] > 0): ?>
                                <a href="detalhes.php?id=<?= $item['id'] ?>" class="btn btn-primary btn-sm">Ver detalhes</a>
                                <?php endif; ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?php require 'footer.php'; ?>