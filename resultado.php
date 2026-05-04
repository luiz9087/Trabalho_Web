<?php
require 'dados.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $id_ = $_POST['id'] ?? '';
    $nomePessoa = $_POST['nome'] ?? '';
    $meses = $_POST['meses'] ?? '';

    $erros = [];

    if (empty($nomePessoa)) {
        $erros[] = "Nome vazio. Coloque seu nome!!!!!!";
    }

    if(empty($meses)){
        $erros[] = "É necessário colocar o números de meses da assinatura!";
    }

    if (!empty($erros)) {
        foreach ($erros as $erro) {
            echo $erro . "<br>";
        }
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
    //para definir o codigo aleatorio
    $codigo = "Musc-" . strtoupper(uniqid());


    ?>
    <p>Olá, <?= htmlspecialchars($nomePessoa) ?>!</p>
    <p>Resumo gerado em: <?= date('d/m/Y H:i:s') ?></p>

    <p>Item: <?= htmlspecialchars($itemSelecionado["modalidade"]) ?></p>
    <p>Valor unitário: R$ <?= htmlspecialchars(number_format($itemSelecionado["mensalidade"], 2, ',', '.')) ?></p>
    <p>Meses: <?= htmlspecialchars($meses) ?></p>

    <p><strong>Total: R$ <?= number_format($total, 2, ',', '.') ?></strong></p>
    <p>Código: <?= $codigo ?></p>

    <a href="index.php">Voltar ao início</a>

<?php } ?>