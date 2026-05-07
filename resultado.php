<?php
require 'dados.php';
require 'header.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_ = $_POST['id'] ?? '';
    $nomePessoa = trim($_POST['nome'] ?? '');
    $meses = (int)($_POST['meses'] ?? 0);

    $erros = [];
    if (empty($nomePessoa)) $erros[] = "Nome é obrigatório!";
    if ($meses <= 0) $erros[] = "Quantidade de meses inválida!";

    $item = buscarItemPorId($id_, $itens);
    if (!$item) $erros[] = "Item inválido.";

    if (!empty($erros)): ?>
        <div class="container py-5">
            <div class="alert alert-danger"><?php foreach ($erros as $e) echo $e . "<br>"; ?></div>
            <a href="javascript:history.back()" class="btn btn-secondary">Voltar</a>
        </div>
    <?php else: 
        $total = $item["mensalidade"] * $meses; ?>
        <div class="container py-5">
            <div class="card shadow border-0 mx-auto" style="max-width: 600px;">
                <div class="card-body p-4 text-center">
                    <h2 class="text-success mb-4">Matrícula Confirmada!</h2>
                    <p><strong>Aluno:</strong> <?= htmlspecialchars($nomePessoa) ?></p>
                    <hr>
                    <p><strong>Atividade:</strong> <?= htmlspecialchars($item["nome"]) ?></p>
                    <p><strong>Plano:</strong> <?= $meses ?> meses</p>
                    <div class="alert alert-primary">
                        <h4 class="mb-0">Total: R$ <?= number_format($total, 2, ',', '.') ?></h4>
                    </div>
                    <a href="index.php" class="btn btn-primary mt-3">Voltar ao Início</a>
                </div>
            </div>
        </div>
    <?php endif;
}
require 'footer.php'; ?>