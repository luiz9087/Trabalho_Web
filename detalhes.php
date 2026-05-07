<?php
require 'dados.php';
require 'header.php';

$id_ = $_GET['id'] ?? null;

$itemSelecionado = buscarItemPorId($id_, $itens);

if (!$itemSelecionado): ?>
    <div class="container py-5"><div class="alert alert-warning">Item não encontrado.</div></div>
<?php else: ?>
    <div class="container py-5">
        <div class="card shadow mx-auto py-3" style="max-width: 600px">
            <div class="card-body">
                <h2 class="fw-bold text-primary mb-3"><?= htmlspecialchars($itemSelecionado['nome']) ?></h2>
                <p><strong>Modalidade:</strong> <?= htmlspecialchars($itemSelecionado['modalidade']) ?></p>
                <p><strong>Mensalidade:</strong> R$ <?= number_format($itemSelecionado["mensalidade"], 2, ',', '.') ?></p>
                <hr>
                <form action="resultado.php" method="POST">
                    <input type="hidden" name="id" value="<?= $itemSelecionado['id'] ?>">
                    <div class="mb-3">
                        <label class="form-label">Nome Completo</label>
                        <input type="text" name="nome" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Número de meses da assinatura</label>
                        <input type="number" name="meses" min="1" class="form-control" required>
                    </div>
                    <div class="d-grid gap-2">
                        <button type="submit" class="btn btn-success" <?= $itemSelecionado['vagas_turma'] <= 0 ? 'disabled' : '' ?>>
                            <?= $itemSelecionado['vagas_turma'] > 0 ? 'Confirmar Matrícula' : 'Turma Esgotada' ?>
                        </button>
                        <a href="index.php" class="btn btn-outline-secondary">Voltar</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php endif; 
require 'footer.php'; ?>