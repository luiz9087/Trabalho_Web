<?php
require 'dados.php';
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultado</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container py-5">

    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        $id_ = $_POST['id'] ?? '';
        $nomePessoa = $_POST['nome'] ?? '';
        $meses = $_POST['meses'] ?? '';

        $erros = [];

        if (empty($nomePessoa)) {
            $erros[] = "Nome vazio. Coloque seu nome!";
        }

        if (empty($meses)) {
            $erros[] = "É necessário colocar o número de meses da assinatura!";
        }

        if (!empty($erros)) {
            echo '<div class="alert alert-danger">';

            foreach ($erros as $erro) {
                echo $erro . '<br>';
            }

            echo '</div>';
            echo '<a href="javascript:history.back()" class="btn btn-secondary">Voltar</a>';
            return;
        }

        $itemSelecionado = '';

        foreach ($itens as $item) {
            if ($item["id"] == $id_) {
                $itemSelecionado = $item;
                break;
            }
        }

        $total = $itemSelecionado["mensalidade"] * $meses;
        $codigo = "Musc-" . strtoupper(uniqid());
    ?>

        <div class="card shadow border-0 mx-auto" style="max-width: 600px;">
            <div class="card-body p-4">
                <h2 class="text-success mb-4">Pedido Confirmado!</h2>

                <p><strong>Olá:</strong> <?= htmlspecialchars($nomePessoa) ?></p>
                <p><strong>Resumo gerado em:</strong> <?= date('d/m/Y H:i:s') ?></p>

                <hr>

                <p><strong>Atividade:</strong> <?= htmlspecialchars($itemSelecionado["nome"]) ?></p>
                <p><strong>Valor unitário:</strong> R$ <?= number_format($itemSelecionado["mensalidade"], 2, ',', '.') ?></p>
                <p><strong>Meses:</strong> <?= htmlspecialchars($meses) ?></p>

                <div class="alert alert-primary mt-4">
                    <strong>Total:</strong> R$ <?= number_format($total, 2, ',', '.') ?>
                </div>
                <p><strong>Código:</strong> <?= $codigo ?></p>

                <a href="index.php" class="btn btn-primary mt-3">
                    Voltar ao início
                </a>
            </div>
        </div>

    <?php } ?>

</div>

</body>
</html>