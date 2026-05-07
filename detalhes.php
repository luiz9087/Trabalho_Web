<?php
require 'dados.php';
include 'header.php';

$id_ = $_GET['id'] ?? null;
$itemSelecionado = null;

foreach ($itens as $item) {
    if ($item["id"] == $id_) {
        $itemSelecionado = $item;
        break;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

    <div class="container py-5">

            <?php if ($itemSelecionado): ?>

                <div class="card shadow mx-auto py-3" style="max-width: 600px">
                    <div class="card-body">
                        <h2 class="fw-bold text-primary mb-3">
                            <?= htmlspecialchars($itemSelecionado['nome']) ?>
                        </h2>

                        <p><strong>Modalidade:</strong> <?= htmlspecialchars($itemSelecionado['modalidade']) ?></p>
                        <p><strong>Mensalidade:</strong> R$ <?= number_format($itemSelecionado["mensalidade"], 2, ',', '.') ?></p>

                        <hr>

                        <form action="resultado.php" method="POST">
                            <div class="mb-3">
                                <label class="form-label">Nome Completo</label>
                                <input type="text" name="nome" class="form-control">
                            </div>

                            <input type="hidden" name="id" value="<?= $itemSelecionado['id'] ?>">

                            <div class="mb-3">
                                <label class="form-label">Número de meses da assinatura</label>
                                <input type="number" name="meses" min="1" class="form-control">
                            </div>

                            <div class="d-grid gap-2">
                                <button type="submit" class="btn btn-success">
                                    Confirmar Pedido
                                </button>

                                <a href="index.php" class="btn btn-outline-secondary">
                                    Voltar
                                </a>
                            </div>
                        </form>
                    </div>
                </div>

            <?php endif; ?>

    </div>
</body>
</html>
<?php include 'footer.php'; ?>
