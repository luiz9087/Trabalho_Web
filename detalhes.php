<?php
require 'dados.php';

$id_ = $_GET['id'] ?? null;
$itemSelecionado = null;

foreach ($itens as $item) {
    if ($item["id"] == $id_) {
        $itemSelecionado = $item;
        break;
    }
}
?>

<?php if ($itemSelecionado): ?>

    <p><?= htmlspecialchars($itemSelecionado['nome']) ?></p>
    <p><?= htmlspecialchars($itemSelecionado['modalidade']) ?></p>
    <p>R$ <?= number_format($itemSelecionado["mensalidade"], 2, ',', '.') ?></p>
    
    <form action="resultado.php" method="POST">
        <label>Nome Completo</label><br>
        <input type="text" name="nome"><br><br>
        <input type="hidden" name="id" value="<?= $itemSelecionado['id'] ?>">
        <label>Número de meses da assinatura</label><br>
        <input type="number" name="meses" min="1"><br><br>
        <button type="submit">Confirmar Pedido</button>
    </form>
    <?php endif; ?>