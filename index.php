<?php
require 'dados.php';

$categoriaSelecionada = $_GET['categoria'] ?? null;
$escolhido = [];

$escolhido = array_filter($itens, function($item) use ($categoriaSelecionada) {
    return !$categoriaSelecionada 
        || $categoriaSelecionada === 'Todas' 
        || $item['modalidade'] === $categoriaSelecionada;}
);
?>

<a href="index.php?categoria=Todas">Todas</a>
<a href="index.php?categoria=Musculação">Musculação</a>
<a href="index.php?categoria=Crossfit">Crossfit</a>
<a href="index.php?categoria=Natação">Natação</a>
<a href="index.php?categoria=Artes Marciais">Artes Marciais</a>
<a href="index.php?categoria=Dança">Dança</a>
<a href="index.php?categoria=Funcional">Funcional</a>

    <table border='1' cellpadding='10'>
        <tr>
            <th>Nome do produto</th>
            <th>Modalidades</th>
            <th>Valor da mensalidade</th>
            <th>Vagas na turma</th>
            <th>Ação</th>
        </tr>

        <?php foreach ($escolhido as $item):?>
        <tr>
            <th><?= $item["nome"]?></th>
            <th><?= $item["modalidade"] ?></th>
            <th>R$ <?= number_format($item["mensalidade"], 2, '.', ',')?></th>
            <th><?= $item["vagas_turma"] ?></th>
            <th><a href="detalhes.php?id=<?= $item['id'] ?>">Detalhes</a></th>
        </tr>
        <?php endforeach; ?>
    </table>